<?php
/**
 * Managed the custom functions and hooks for entire theme.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*------------------------------ Header Section ------------------------------*/

    if ( ! function_exists( 'ogma_blog_custom_header_html' ) ) :

        /**
         * function to get custom header markup
         * 
         * @since 1.0.0
         */
        function ogma_blog_custom_header_html() {
            the_custom_header_markup();
        }

    endif;

    add_action( 'ogma_blog_header_section', 'ogma_blog_custom_header_html', 10 );

    if ( ! function_exists( 'ogma_blog_top_header' ) ) :

        /**
         * function to display the top header section at header area.
         * 
         * @since 1.0.0
         */
        function ogma_blog_top_header() {
            get_template_part( 'template-parts/header/top', 'header' );
        }

    endif;

    add_action( 'ogma_blog_header_section', 'ogma_blog_top_header', 20 );

    if ( ! function_exists( 'ogma_blog_main_header' ) ) :

        /**
         * function to display the main header section at header area.
         * 
         * @since 1.0.0
         */
        function ogma_blog_main_header() {
            $ogma_blog_header_main_area_layout = ogma_blog_get_customizer_option_value( 'ogma_blog_header_main_area_layout' );
            $layout = explode( '--', $ogma_blog_header_main_area_layout );
            $layout = 'header-'.$layout[1];
            get_template_part( 'template-parts/header/main', $layout );
        }

    endif;

    add_action( 'ogma_blog_header_section', 'ogma_blog_main_header', 30 );

    if ( ! function_exists( 'header_ads_section' ) ) :

        /**
         * function to display ads in header section
         * 
         * @since 1.0.0
         */
        function header_ads_section() {
            if ( ! is_home() && ! is_front_page() ) {
                return;
            }
            get_template_part( 'template-parts/partials/header/ads' );
        }

    endif;

    add_action( 'ogma_blog_header_section', 'header_ads_section', 40 );

    if ( ! function_exists( 'header_news_ticker_section' ) ) :

        /**
         * function to display news ticker content in header section
         * 
         * @since 1.0.0
         */
        function header_news_ticker_section() {
            if ( ! is_home() && ! is_front_page() ) {
                return;
            }
            get_template_part( 'template-parts/header/news', 'ticker' );
        }

    endif;

    add_action( 'ogma_blog_header_section', 'header_news_ticker_section', 50 );

    if ( ! function_exists( 'header_sticky_sidebar_content' ) ) :

        /**
         * function to display the content about header sticky sidebar
         * 
         * @since 1.0.0
         */
        function header_sticky_sidebar_content() {

            if ( false === ogma_blog_get_customizer_option_value( 'ogma_blog_header_sticky_sidebar_toggle_enable' ) ) {
                return;
            }
    ?>
            <div class="sidebar-header sticky-header-sidebar">
                <div class="sticky-header-widget-wrapper">
                    <?php
                        if ( is_active_sidebar( 'header-sticky-sidebar' ) ) {
                            dynamic_sidebar( 'header-sticky-sidebar' );
                        }
                    ?>
                </div>
                <div class="sticky-header-sidebar-overlay"> </div>
                <span class="sticky-sidebar-close"><i class="bx bx-x"></i></span>
            </div><!-- .sticky-header-sidebar -->
    <?php
        }

    endif;

    //add_action( 'ogma_blog_before_main_header', 'header_sticky_sidebar_content', 20 );

/*------------------------------ Frontpage Banner Section --------------------*/

    if ( ! function_exists( 'ogma_blog_frontpage_main_banner' ) ) :

        /**
         * function to display the main banner section at front page.
         * 
         * @since 1.0.0
         */
        function ogma_blog_frontpage_main_banner() {
            $banner_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_banner_slider_enable' );
            if ( false === $banner_enable ) {
                return;
            }
            get_template_part( 'template-parts/frontpage/main', 'banner' );
        }

    endif;

    add_action( 'ogma_blog_frontpage_section', 'ogma_blog_frontpage_main_banner', 10 );

/*------------------------------ Innerpage breadcrumb ------------------------*/

    if ( ! function_exists( 'ogma_blog_breadcrumb_trial_content' ) ) :

        /**
         * function to manage the default breadcrumb trial
         * 
         * @since 1.0.0
         */
        function ogma_blog_breadcrumb_trial_content() {
            if ( is_home() || is_front_page() ) {
                return;
            }
            get_template_part( '/template-parts/header/breadcrumb' );
        }

    endif;

    add_action( 'ogma_blog_before_page_post_content', 'ogma_blog_breadcrumb_trial_content', 10 );

/*------------------------------ Innerpage Single Post -----------------------*/
    
    if ( ! function_exists( 'ogma_blog_post_author_box' ) ) :

        /**
         * function to display the author box section in single post page.
         * 
         * @since 1.0.0
         */
        function ogma_blog_post_author_box() {
            get_template_part( 'template-parts/partials/post/author', 'box' );
        }

    endif;

    add_action( 'ogma_blog_after_single_post_loop_content', 'ogma_blog_post_author_box', 10 );

    if ( ! function_exists( 'ogma_blog_single_post_related_posts_section' ) ) :

        /**
         * function to display the related posts sections in single post page.
         * 
         * @since 1.0.0
         */
        function ogma_blog_single_post_related_posts_section() {
            get_template_part( 'template-parts/partials/post/related', 'posts' );
        }

    endif;

    add_action( 'ogma_blog_after_single_post_loop_content', 'ogma_blog_single_post_related_posts_section', 20 );

/*------------------------------ Innerpage Archive Pages ---------------------*/

    if ( ! function_exists( 'ogma_blog_archive_title_prefix' ) ) :
        
        /**
         * Archive title prefix
         *
         * @since 1.0.0
         */
        function ogma_blog_archive_title_prefix( $title ) {

            $title_prefix_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_archive_title_prefix_enable' );

            if ( false === $title_prefix_enable ) {
                return preg_replace( '/^\w+: /', '', $title );
            } else {
                return $title;
            }
            
        }

    endif;

    add_filter( 'get_the_archive_title', 'ogma_blog_archive_title_prefix' );

/*------------------------------ Footer Section ------------------------------*/

    if ( ! function_exists( 'ogma_blog_scroll_top_section' ) ) :

        /**
         * function to display the scroll top section in footer.
         * 
         * @since 1.0.0
         */
        function ogma_blog_scroll_top_section() {
            get_template_part( 'template-parts/footer/scroll', 'top' );
        }

    endif;

    add_action( 'ogma_blog_after_page', 'ogma_blog_scroll_top_section', 10 );