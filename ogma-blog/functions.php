<?php
/**
 * Ogma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'ogma_blog_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$ogma_blog_theme_info = wp_get_theme();
	define( 'ogma_blog_VERSION', $ogma_blog_theme_info->get( 'Version' ) );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ogma_blog_setup() {
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Ogma, use a find and replace
	 * to change 'ogma-blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ogma-blog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'top_header_menu' => esc_html__( 'Top Header', 'ogma-blog' ),
            'primary_menu'    => esc_html__( 'Primary', 'ogma-blog' ),
            'footer_menu'     => esc_html__( 'Footer', 'ogma-blog' ),
		)
	);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ogma_blog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size( 'ogma-blog-block-medium', 660, 470, true );
	add_image_size( 'ogma-blog-banner', 860, 630, true );
	
}
add_action( 'after_setup_theme', 'ogma_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ogma_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ogma_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'ogma_blog_content_width', 0 );

/**
 * Set the default typography font list.
 */
function ogma_blog_default_google_fonts() {

	global $wp_filesystem;

	require_once ( ABSPATH . '/wp-admin/includes/file.php' );
	WP_Filesystem();

	$ogma_blog_google_fonts_file = apply_filters( 'ogma_blog_google_fonts_json_file', get_template_directory() . '/inc/customizer/custom-controls/typography/ogma-blog-google-fonts.json' );

    if ( ! $ogma_blog_google_fonts_file ) {
        $google_fonts = array();
        return $google_fonts;
    }

    $get_file_content   = $wp_filesystem->get_contents( $ogma_blog_google_fonts_file );
    $get_google_fonts   = json_decode( $get_file_content, 1 );

    foreach ( $get_google_fonts as $key => $font ) {
        $name = key( $font );
        foreach ( $font[ $name ] as $font_key => $single_font ) {

            if ( 'variants' === $font_key ) {

                $unset_values = array( 'italic', '100italic', '200italic', '300italic', '400italic', '500italic', '600italic', '700italic', '800italic', '900italic' );

                foreach ( $single_font as $variant_key => $variant ) {

                    if ( 'regular' == $variant ) {
                        $font[ $name ][ $font_key ][ $variant_key ] = '400';
                    }

                    if ( in_array( $variant, $unset_values ) ) {
                        unset( $font[ $name ][ $font_key ][ $variant_key ] );
                    }

                }
            }

            $google_fonts[ $name ] = array_values( $font[ $name ] );
        }
    }

    if ( empty( $ogma_blog_google_font ) || $google_fonts != $ogma_blog_google_font ) {
        update_option( 'ogma_blog_google_font', $google_fonts );
    }

}
add_action( 'after_setup_theme', 'ogma_blog_default_google_fonts', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer stater.
 */
require get_template_directory() . '/inc/customizer/customizer-stater.php';

/**
 * Custom theme hooks.
 */
require get_template_directory() . '/inc/ogma-blog-custom-hooks.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/widgets/widget-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load theme's dynamic styles
 */
require get_template_directory() . '/inc/dynamic-styles.php';

/**
 * Load theme's preloader styles
 */
require get_template_directory() . '/inc/ogma-blog-preloader.php';

// Admin screen.
if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/class-ogma-blog-admin.php';
	require get_template_directory() . '/inc/admin/class-ogma-blog-notice.php';
	require get_template_directory() . '/inc/admin/class-ogma-blog-dashboard.php';
}