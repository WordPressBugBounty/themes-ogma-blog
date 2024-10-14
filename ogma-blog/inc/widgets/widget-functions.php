<?php
/**
 * File to handle widget area and related hooks and functions.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'widgets_init', 'ogma_blog_widgets_init' );

if ( ! function_exists( 'ogma_blog_widgets_init' ) ) :

	 /**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function ogma_blog_widgets_init() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'ogma-blog' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'ogma-blog' ),
				'id'            => 'left-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Frontpage - Middle Right Sidebar', 'ogma-blog' ),
				'id'            => 'front-middle-right-sidebar',
				'description' 	=> esc_html__( 'Add "Ogma:ABC" widget for frontpage middle right sidebar section.', 'ogma-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		if ( true === ogma_blog_get_customizer_option_value( 'ogma_blog_header_sticky_sidebar_toggle_enable' ) ) {

			/**
			 * Register header sticky sidebar
			 *
			 * @since 1.0.0
			 */
			register_sidebar( array(
				'name'          => esc_html__( 'Header Sticky Sidebar', 'ogma-blog' ),
				'id'            => 'header-sticky-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'ogma-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );

		}

		/**
		 * Register 4 different footer widget area 
		 *
		 * @since 1.0.0
		 */
		register_sidebars( 4 , array(
			'name'          => esc_html__( 'Footer Column %d', 'ogma-blog' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'ogma-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// register widget OGMA: Trending Posts
    	register_widget( 'Ogma_Blog_Trending_Posts' );

    	// register widget OGMA: Latest Posts
    	register_widget( 'Ogma_Blog_Latest_Posts' );

    	// register widget OGMA: Author Profile
    	register_widget( 'Ogma_Blog_Author_Profile' );

	}

endif;

require get_template_directory().'/inc/widgets/ogma-blog-widgets-helper.php';
require get_template_directory().'/inc/widgets/trending-posts.php';
require get_template_directory().'/inc/widgets/latest-posts.php';
require get_template_directory().'/inc/widgets/author-profile.php';