<?php
/**
 * Customizer callback functions.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*---------------------------------- General Panel Callabck -----------------------------------*/

    if ( ! function_exists( 'ogma_blog_is_general_tab_callback' ) ) :

        /**
         * Check if general tab is select or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_is_general_tab_callback( $control ) {
            if ( 'design' !== $control->manager->get_setting( 'site_style_tabs' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_hasnt_boxed_layout' ) ) :

        /**
         * Check if boxed option is selected or not in site container layout.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_hasnt_boxed_layout( $control ) {
            if ( 'boxed' !== $control->manager->get_setting( 'ogma_blog_site_container_layout' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_boxed_layout' ) ) :

        /**
         * Check if boxed option is selected or not in site container layout.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_boxed_layout( $control ) {
            if ( 'boxed' == $control->manager->get_setting( 'ogma_blog_site_container_layout' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_enable_preloader' ) ) :

        /**
         * Check if preloader option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_preloader( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_preloader_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_enable_scroll_top' ) ) :

        /**
         * Check if scroll top option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_scroll_top( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_scroll_top_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_has_enable_site_breadcrumb_callback' ) ) :

        /**
         * Check if site breadcrumb option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_has_enable_site_breadcrumb_callback( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_site_breadcrumb_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

/*---------------------------------- Header Panel Callabck ------------------------------------*/

    if ( ! function_exists( 'ogma_blog_cb_has_header_top_enable' ) ) :

        /**
         * Check if header top option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_header_top_enable( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_top_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_header_top_date_enable' ) ) :

        /**
         * Check if header top option and top date option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_header_top_date_enable( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_top_enable' )->value() && false !== $control->manager->get_setting( 'ogma_blog_header_top_date_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_header_social_enable' ) ) :

        /**
         * Check if header top option and header social option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_header_social_enable( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_top_enable' )->value() && false !== $control->manager->get_setting( 'ogma_blog_header_social_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_header_search_enable' ) ) :

        /**
         * Check if header top option and header search option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_header_search_enable( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_top_enable' )->value() && false !== $control->manager->get_setting( 'ogma_blog_header_search_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_sticky_sidebar_toggle_enable' ) ) :

        /**
         * Check if header sticky sidebar is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_sticky_sidebar_toggle_enable( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_sticky_sidebar_toggle_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_enable_header_ticker' ) ) :

        /**
         * Check if header ticker is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_header_ticker( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_header_ticker_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_bg_type_color' ) ) :

        /**
         * Check if header main bg type is selected for color or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_bg_type_color( $control ) {
            if ( 'bg-color' === $control->manager->get_setting( 'ogma_blog_header_main_bg_type' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_bg_type_image' ) ) :

        /**
         * Check if header main bg type is selected for image or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_bg_type_image( $control ) {
            if ( 'bg-image' === $control->manager->get_setting( 'ogma_blog_header_main_bg_type' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

/*---------------------------------- Frontpage Panel Callabck ---------------------------------*/

    if ( ! function_exists( 'ogma_blog_cb_enable_banner_option' ) ) :

        /**
         * Check if frontpage banner option is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_enable_banner_option( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_banner_slider_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_banner_bg_type_color' ) ) :

        /**
         * Check if frontpage banner background type is color or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_banner_bg_type_color( $control ) {
            if ( 'bg-color' == $control->manager->get_setting( 'ogma_blog_banner_bg_type' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_banner_bg_type_image' ) ) :

        /**
         * Check if frontpage banner background type is image or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_banner_bg_type_image( $control ) {
            if ( 'bg-image' == $control->manager->get_setting( 'ogma_blog_banner_bg_type' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

/*---------------------------------- Innerpage Panel Callabck ---------------------------------*/

    if ( ! function_exists( 'ogma_blog_cb_has_enable_single_posts_related' ) ) :

        /**
         * Check if single posts related section is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_single_posts_related( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_single_posts_related_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;

    if ( ! function_exists( 'ogma_blog_cb_has_enable_error_page_button' ) ) :

        /**
         * Check if error page home button is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_error_page_button( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_error_page_button_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;
    
/*---------------------------------- Footer Panel Callabck    ---------------------------------*/
    
    if ( ! function_exists( 'ogma_blog_cb_has_enable_footer_main' ) ) :

        /**
         * Check if footer main area is enable or not.
         *
         * @since 1.0.0
         *
         * @param WP_Customize_Control $control WP_Customize_Control instance.
         *
         * @return bool Whether the control is active to the current preview.
         */
        function ogma_blog_cb_has_enable_footer_main( $control ) {
            if ( false !== $control->manager->get_setting( 'ogma_blog_footer_main_enable' )->value() ) {
                return true;
            } else {
                return false;
            }
        }

    endif;