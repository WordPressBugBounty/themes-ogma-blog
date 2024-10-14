<?php
/**
 * Includes theme customizer defaults and starter functions.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'ogma_blog_get_customizer_option_value' ) ) :

    /**
     * Get the customizer value `get_theme_mod()`
     * 
     * @since 1.0.0
     */
    function ogma_blog_get_customizer_option_value( $setting_id ) {

        return get_theme_mod( $setting_id, ogma_blog_get_customizer_default( $setting_id ) );

    }

endif;

if ( ! function_exists( 'ogma_blog_get_customizer_default' ) ) :

    /**
     * Returns an array of the desired default Ogma Options
     *
     * @return array
     */
    function ogma_blog_get_customizer_default( $setting_id ) {

        $default_values = apply_filters( 'ogma_blog_get_customizer_defaults',
            array(
                //container
                'ogma_blog_site_container_layout'                 => 'separate',
                'ogma_blog_main_container_width'                  => 1320,
                'ogma_blog_boxed_container_width'                 => 1290,
                'ogma_blog_site_mode'                             => 'light-mode',
                //preloader
                'ogma_blog_preloader_enable'                      => true,
                'ogma_blog_preloader_style'                       => 'wave',
                //social icons
                'ogma_blog_social_icon_link_target'               => false,
                'ogma_blog_social_icons'                          => json_encode( array( array( 'social_icon' => 'bx bxl-twitter', 'social_url'   => '', 'item_visible'   => 'show' ) ) ),
                //colors
                'ogma_blog_primary_theme_color'                   => '#FF376C',
                'ogma_blog_text_color'                            => '#3b3b3b',
                'ogma_blog_link_color'                            => '#FF376C',
                'ogma_blog_link_hover_color'                      => '#E91E63',
                //breadcrumb
                'ogma_blog_site_breadcrumb_enable'                => true,
                'ogma_blog_site_breadcrumb_types'                 => 'default',
                //sidebar layout
                'ogma_blog_sidebar_sticky_enable'                 => true,
                'ogma_blog_archive_sidebar_layout'                => 'right-sidebar',
                'ogma_blog_posts_sidebar_layout'                  => 'right-sidebar',
                'ogma_blog_pages_sidebar_layout'                  => 'right-sidebar',
                //scroll top
                'ogma_blog_scroll_top_enable'                     => true,
                'ogma_blog_scroll_top_arrow'                      => 'bx-up-arrow-alt',
                //site identity
                'site_identity_tabs'                    => 'general',
                //typography
                'ogma_blog_body_font_family'                      => 'Roboto',
                'ogma_blog_body_font_weight'                      => '400',
                'ogma_blog_body_font_style'                       => 'normal',
                'ogma_blog_body_font_transform'                   => 'inherit',
                'ogma_blog_body_font_decoration'                  => 'inherit',
                'ogma_blog_heading_font_family'                   => 'Nunito',
                'ogma_blog_heading_font_weight'                   => '700',
                'ogma_blog_heading_font_style'                    => 'normal',
                'ogma_blog_heading_font_transform'                => 'inherit',
                'ogma_blog_heading_font_decoration'               => 'inherit',
                //performance
                'ogma_blog_site_schema_enable'                    => true,
                'ogma_blog_posts_date_style'                      => 'publish',
                'ogma_blog_posts_date_format'                     => 'default',
                'ogma_blog_posts_thumbnail_hover_effect'          => 'hover-effect--one',
                'ogma_blog_posts_reading_time_enable'             => true,
                //top header
                'ogma_blog_header_top_area_tabs'                  => 'general',
                'ogma_blog_header_top_enable'                     => true,
                'ogma_blog_header_top_bg_color'                   => '#111111',
                'ogma_blog_header_top_date_enable'                => true,
                'ogma_blog_header_top_date_format'                => 'date_format_1',
                'ogma_blog_header_top_menu_enable'                => true,
                'ogma_blog_header_social_enable'                  => true,
                'ogma_blog_header_top_placement'                  => 'placement_one',
                //header main area
                'ogma_blog_header_main_area_tabs'                 => 'general',
                'ogma_blog_header_sticky_enable'                  => true,
                'ogma_blog_header_main_area_layout'               => 'header-main-layout--one',
                'ogma_blog_header_site_mode_switch_enable'        => true,
                'ogma_blog_header_search_enable'                  => true,
                'ogma_blog_header_search_option'                  => 'live-search',  
                'ogma_blog_header_sticky_sidebar_toggle_enable'   => true,
                'ogma_blog_header_custom_button_label'            => __( 'Subscribe', 'ogma-blog' ),
                'ogma_blog_header_custom_button_link'             => '',
                'ogma_blog_header_main_bg_type'                   => 'bg-none',
                'ogma_blog_header_main_bg_color'                  => '#FF376C',
                'ogma_blog_header_main_bg_image'                  => '',
                //primary menu
                'ogma_blog_primary_menu_description_enable'       => true,
                //header ads
                'ogma_blog_header_ads_image'                      => '',
                'ogma_blog_header_ads_image_link'                 => '',
                //header ticker
                'ogma_blog_header_ticker_enable'                  => true,
                'ogma_blog_header_ticker_label'                   => __( 'Breaking News', 'ogma-blog' ),
                'ogma_blog_ticker_posts_date_filter'              => 'all',
                //frontpage banner
                'ogma_blog_frontpage_banner_tabs'                 => 'general',
                'ogma_blog_banner_slider_enable'                  => true,
                'ogma_blog_banner_slider_order_by'                => 'date-desc',
                'ogma_blog_banner_slider_category'                => 'all',
                'ogma_blog_banner_slider_date_filter'             => 'all',
                'ogma_blog_banner_bg_type'                        => 'bg-none',
                'ogma_blog_banner_bg_color'                       => '#F7F8F9',
                'ogma_blog_banner_bg_image'                       => '',
                //archive page
                'ogma_blog_archive_page_style'                => 'archive-style--grid',
                'ogma_blog_archive_title_prefix_enable'       => false,
                'ogma_blog_archive_post_readmore_enable'      => true,
                //single posts
                'ogma_blog_single_posts_layout'               => 'posts-layout--one',
                'ogma_blog_single_posts_author_enable'        => true,
                'ogma_blog_single_posts_related_enable'       => true,
                'ogma_blog_single_posts_related_label'        => __( 'Related Posts', 'ogma-blog' ),
                //404 error
                'ogma_blog_error_page_search_enable'          => true,
                'ogma_blog_error_page_button_enable'          => true,
                'ogma_blog_error_page_button_label'           => __( 'Back To Home', 'ogma-blog' ),
                //footer main area
                'ogma_blog_footer_main_enable'                => true,
                'ogma_blog_footer_widget_area_layout'         => 'column-three',
                //footer bottom area
                'ogma_blog_footer_bottom_enable'              => true,
                'ogma_blog_footer_copyright_info'             => esc_html__( 'Copyright &copy; ogma blog {year}', 'ogma-blog' )
            )
        );

        return  $default_values[$setting_id];

    }

endif;