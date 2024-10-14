<?php
/**
 * Template part for displaying a content located in main header layout one.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * hook - ogma_blog_before_main_header
 * 
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_main_header' );

$ogma_blog_header_main_bg_type = ogma_blog_get_customizer_option_value( 'ogma_blog_header_main_bg_type' );

?>

<header id="masthead" class="site-header header--<?php echo esc_attr( $ogma_blog_header_main_bg_type ); ?>" <?php ogma_blog_schema_markup( 'header' ); ?>>

    <div class="logo-ads-wrapper">
        <div class="ogma-blog-container ogma-blog-flex">
            
            <?php
                // social icons
                get_template_part( 'template-parts/partials/header/social', 'icons' );

                // site logo
                get_template_part( 'template-parts/partials/header/site', 'logo' );

                // custom button
                get_template_part( 'template-parts/partials/header/custom', 'button' );
            ?>
            
        </div><!-- .ogma-blog-container -->
    </div><!-- .logo-ads-wrapper -->

    <div class="primary-menu-wrapper">
        <div class="ogma-blog-container ogma-blog-flex">
            <?php
                // sticky sidebar toggle icon
                ogma_blog_sticky_sidebar_toggle();

                // primary menu
                get_template_part( 'template-parts/partials/header/primary', 'menu' );
            ?>
            <div class="ogma-blog-icon-elements-wrap">
                <?php
                    // site mode switcher
                    ogma_blog_site_mode_switcher();

                    // search icon
                    get_template_part( 'template-parts/partials/header/search' );
                ?>
            </div><!-- .icon-elements-wrap -->
        </div><!-- .ogma-blog-container -->
    </div><!-- .primary-menu-wrapper -->
    
</header><!-- #masthead -->