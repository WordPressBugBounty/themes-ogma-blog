<?php
/**
 * Customizer helper where define functions related to customizer panel, sections and settings.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*---------------------------------- General Panel Choices ---------------------------------- --*/

    if ( ! function_exists( 'ogma_blog_site_container_layout_choices' ) ) :

        /**
         * function to return choices of site container layout.
         *
         * @since 1.0.0
         */
        function ogma_blog_site_container_layout_choices() {

            $site_container_layout = apply_filters( 'ogma_blog_site_container_layout_choices',
                array(
                    'full-width'    => array(
                        'title'     => __( 'Full Width', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/full-width.png'
                    ),
                    'boxed'         => array(
                        'title'     => __( 'Boxed', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/boxed.png'
                    ),
                    'separate'         => array(
                        'title'     => __( 'Separate', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/seperate.png'
                    )
                )
            );

            return $site_container_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_preloader_style_choices' ) ) :

        /**
         * function to return choices for preloader styles.
         *
         * @since 1.0.0
         */
        function ogma_blog_preloader_style_choices() {

            $site_container_layout = apply_filters( 'ogma_blog_preloader_style_choices',
                array(
                    'three_bounce'    => array(
                        'title'     => __( 'Three Bounce', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/three-bounce-preloader.gif'
                    ),
                    'wave'         => array(
                        'title'     => __( 'Wave', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/wave-preloader.gif'
                    ),
                    'folding_cube'         => array(
                        'title'     => __( 'Folding Cube', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/folding-cube-preloader.gif'
                    ),
                    'ball'         => array(
                        'title'     => __( 'Bounce Ball', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/ball-preloader.gif'
                    )
                )
            );

            return $site_container_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_sidebar_layout_choices' ) ) :

        /**
         * function to return choices for archive sidebar layouts.
         *
         * @since 1.0.0
         */
        function ogma_blog_sidebar_layout_choices() {

            $sidebar_layouts = apply_filters( 'ogma_blog_sidebar_layout_choices',
                array(
                    'right-sidebar'    => array(
                        'title'     => __( 'Right Sidebar', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/right-sidebar.png'
                    ),
                    'left-sidebar'  => array(
                        'title'     => __( 'Left Sidebar', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/left-sidebar.png'
                    ),
                    'both-sidebar'  => array(
                        'title'     => __( 'Both Sidebar', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/both-sidebar.png'
                    ),
                    'no-sidebar'  => array(
                        'title'     => __( 'No Sidebar', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png'
                    ),
                    'no-sidebar-center'  => array(
                        'title'     => __( 'No Sidebar Center', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar-center.png'
                    )
                )
            );

            return $sidebar_layouts;

        }

    endif;

    

    if ( ! function_exists( 'ogma_blog_scroll_top_arrow_choices' ) ) :

        /**
         * function to return choices of scroll top arrow.
         *
         * @since 1.0.0
         */
        function ogma_blog_scroll_top_arrow_choices() {

            $scroll_top_arrow = apply_filters( 'ogma_blog_scroll_top_arrow_choices',
                array(
                    'bx-up-arrow-alt'  => array(
                        'title' => __( 'Arrow 1', 'ogma-blog' ),
                        'icon'  => 'bx bx-up-arrow-alt'
                    ),
                    'bx-chevron-up'  => array(
                        'title' => __( 'Arrow 2', 'ogma-blog' ),
                        'icon'  => 'bx bx-chevron-up'
                    ),
                    'bx-chevrons-up'  => array(
                        'title' => __( 'Arrow 3', 'ogma-blog' ),
                        'icon'  => 'bx bx-chevrons-up'
                    ),
                )
            );

            return $scroll_top_arrow;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_site_mode_choices' ) ) :

        /**
         * function to return choices for site mode.
         *
         * @since 1.0.0
         */
        function ogma_blog_site_mode_choices() {

            $site_mode_choices = apply_filters( 'ogma_blog_site_mode_choices',
                array(
                    'light-mode'    => __( 'Light', 'ogma-blog' ),
                    'dark-mode'     => __( 'Dark', 'ogma-blog' ),
                )
            );

            return $site_mode_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_posts_date_style_choices' ) ) :

        /**
         * function to return choices for posts date style
         *
         * @since 1.0.0
         */
        function ogma_blog_posts_date_style_choices() {

            $posts_date_style_choices = apply_filters( 'ogma_blog_posts_date_style_choices',
                array(
                    'publish'   => __( 'Published date', 'ogma-blog' ),
                    'modify'    => __( 'Updated date', 'ogma-blog' )
                )
            );

            return $posts_date_style_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_posts_date_format_choices' ) ) :

        /**
         * function to return choices for posts date format
         *
         * @since 1.0.0
         */
        function ogma_blog_posts_date_format_choices() {

            $posts_date_format_choices = apply_filters( 'ogma_blog_posts_date_format_choices',
                array(
                    'default'       => __( 'Default by WordPress', 'ogma-blog' ),
                    'format_one'    => __( 'Theme Format One', 'ogma-blog' )
                )
            );

            return $posts_date_format_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_posts_thumbnail_hover_effect_choices' ) ) :

        /**
         * function to return choices for posts thumbnail hover effect
         *
         * @since 1.0.0
         */
        function ogma_blog_posts_thumbnail_hover_effect_choices() {

            $posts_thumb_effect_choices = apply_filters( 'ogma_blog_posts_thumbnail_hover_effect_choices',
                array(
                    'none'              => __( 'None', 'ogma-blog' ),
                    'hover-effect--one' => __( 'Hover Effect One', 'ogma-blog' ),
                )
            );

            return $posts_thumb_effect_choices;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_site_breadcrumb_types_choices' ) ) :

        /**
         * function to return choices for site breadcrumb types
         *
         * @since 1.0.0
         */
        function ogma_blog_site_breadcrumb_types_choices() {

            $breadcrumb_types_choices = apply_filters( 'ogma_blog_site_breadcrumb_types_choices',
                array(
                    'default'   => __( 'Default', 'ogma-blog' ),
                    'navxt'     => __( 'NavXT', 'ogma-blog' ),
                    'yoast'     => __( 'Yoast SEO', 'ogma-blog' ),
                    'rankmath'  => __( 'Rank Math', 'ogma-blog' )
                )
            );

            return $breadcrumb_types_choices;

        }

    endif;

/*---------------------------------- Header Panel Choices --------------------------------------*/

    if ( ! function_exists( 'ogma_blog_header_top_area_tabs_choices' ) ) :

        /**
         * function to return choices for header top area tab fields.
         *
         * @since 1.0.0
         */
        function ogma_blog_header_top_area_tabs_choices() {

            $header_top_tab_fields = apply_filters( 'ogma_blog_header_top_area_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_header_top_enable',
                            'ogma_blog_header_top_date_enable',
                            'ogma_blog_header_top_date_format',
                            'ogma_blog_header_top_menu_enable',
                            'ogma_blog_header_social_enable',
                            'ogma_blog_header_social_redirect'
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_header_top_bg_color',
                        )
                    )
                )
            );

            return $header_top_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_header_top_date_format_choices' ) ) :

        /**
         * function to return choices for header top date format.
         *
         * @since 1.0.0
         */
        function ogma_blog_header_top_date_format_choices() {

            $header_top_tab_fields = apply_filters( 'ogma_blog_header_top_date_format_choices',
                array(
                    'date_format_1' => __( '01 Jan, 2023', 'ogma-blog' ),
                    'date_format_2' => __( '01 January, 2023', 'ogma-blog' ),
                )
            );

            return $header_top_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_header_main_area_tabs_choices' ) ) :

        /**
         * function to return choices for header main area tab fields.
         *
         * @since 1.0.0
         */
        function ogma_blog_header_main_area_tabs_choices() {

            $header_main_tab_fields = apply_filters( 'ogma_blog_header_main_area_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_header_sticky_enable',
                            'ogma_blog_divider_main_area_one',
                            'ogma_blog_header_search_enable',
                            'ogma_blog_header_search_option',
                            'ogma_blog_header_site_mode_switch_enable',
                            'ogma_blog_header_sticky_sidebar_toggle_enable',
                            'ogma_blog_header_sticky_sidebar_redirect',
                            'ogma_blog_header_custom_button_heading',
                            'ogma_blog_header_custom_button_label',
                            'ogma_blog_header_custom_button_link',
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_header_main_area_layout',
                            'ogma_blog_header_main_bg_type',
                            'ogma_blog_header_main_bg_color',
                            'ogma_blog_header_main_bg_image'
                        )
                    )
                )
            );

            return $header_main_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_header_main_area_layout_choices' ) ) :

        /**
         * function to return choices for header main area layouts.
         *
         * @since 1.0.0
         */
        function ogma_blog_header_main_area_layout_choices() {

            $header_main_layout = apply_filters( 'ogma_blog_header_main_area_layout_choices',
                array(
                    'header-main-layout--one'   => array(
                        'title'     => __( 'Layout 1', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/header-layout-one.png'
                    )
                )
            );

            return $header_main_layout;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_bg_type_choices' ) ) :

        /**
         * function to return choices for background type.
         *
         * @since 1.0.0
         */
        function ogma_blog_bg_type_choices() {

            $bg_types = apply_filters( 'ogma_blog_bg_type_choices',
                array(
                    'bg-none'   => __( 'None', 'ogma-blog' ),
                    'bg-color'  => __( 'Color', 'ogma-blog' ),
                    'bg-image'  => __( 'Image', 'ogma-blog' ),
                )
            );

            return $bg_types;

        }

    endif;

/*---------------------------------- Frontpage Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_blog_frontpage_banner_tabs_choices' ) ) :

        /**
         * function to return choices for frontpage banner tab fields.
         *
         * @since 1.0.0
         */
        function ogma_blog_frontpage_banner_tabs_choices() {

            $frontpage_banner_tab_fields = apply_filters( 'ogma_blog_frontpage_banner_tabs_choices',
                array(
                    'general'   => array(
                        'title'     => __( 'General', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_frontpage_banner_layout',
                            'ogma_blog_banner_slider_heading',
                            'ogma_blog_banner_slider_enable',
                            'ogma_blog_banner_slider_category',
                            'ogma_blog_banner_slider_order_by',
                            'ogma_blog_banner_slider_date_filter',
                        )
                    ),
                    'design'    => array(
                        'title' => __( 'Design', 'ogma-blog' ),
                        'fields'    => array(
                            'ogma_blog_banner_bg_type',
                            'ogma_blog_banner_bg_color',
                            'ogma_blog_banner_bg_image'
                        )
                    )
                )
            );

            return $frontpage_banner_tab_fields;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_posts_order_by_choices' ) ) :

        /**
         * function to return choices of posts order by.
         *
         * @since 1.0.0
         */
        function ogma_blog_posts_order_by_choices() {

            $posts_order_by = apply_filters( 'ogma_blog_posts_order_by_choices',
                array(
                    'date-desc'     => __( 'Newest - Oldest', 'ogma-blog' ),
                    'date-asc'      => __( 'Oldest - Newest', 'ogma-blog' ),
                    'title-asc'     => __( 'A - Z', 'ogma-blog' ),
                    'title-desc'    => __( 'Z - A', 'ogma-blog' ),
                    'rand-desc'     => __( 'Random', 'ogma-blog' ),
                )
            );

            return $posts_order_by;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_posts_date_filter_choices' ) ) :

        /**
         * function to return choices of posts date filter.
         *
         * @since 1.0.0
         */
        function ogma_blog_posts_date_filter_choices() {

            $posts_date_filter = apply_filters( 'ogma_blog_posts_date_filter_choices',
                array(
                    'all'           => __( 'All', 'ogma-blog' ),
                    'today'         => __( 'Today', 'ogma-blog' ),
                    'this-week'     => __( 'This Week', 'ogma-blog' ),
                    'last-week'     => __( 'Last Week', 'ogma-blog' ),
                    'this-month'    => __( 'This Month', 'ogma-blog' ),
                    'last-month'    => __( 'Last Month', 'ogma-blog' )
                )
            );

            return $posts_date_filter;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_section_bg_type_choices' ) ) :

        /**
         * function to return choices of section background type.
         *
         * @since 1.0.0
         */
        function ogma_blog_section_bg_type_choices() {

            $section_bg_type = apply_filters( 'ogma_blog_section_bg_type_choices',
                array(
                    'color'   => __( 'Background Color', 'ogma-blog' ),
                    'image'   => __( 'Background Image', 'ogma-blog' )
                )
            );

            return $section_bg_type;

        }

    endif;

/*---------------------------------- Innerpage Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_blog_archive_page_style_choices' ) ) :

        /**
         * function to return choices for archive page style.
         *
         * @since 1.0.0
         */
        function ogma_blog_archive_page_style_choices() {

            $ogma_blog_archive_page_style = apply_filters( 'ogma_blog_archive_page_style_choices',
                array(
                    'archive-style--classic'  => __( 'Classic', 'ogma-blog' ),
                    'archive-style--grid'     => __( 'Grid', 'ogma-blog' ),
                    'archive-style--list'     => __( 'List', 'ogma-blog' )
                )
            );

            return $ogma_blog_archive_page_style;

        }

    endif;

    if ( ! function_exists( 'ogma_blog_single_posts_layout_choices' ) ) :

        /**
         * function to return choices of single posts layout.
         *
         * @since 1.0.0
         */
        function ogma_blog_single_posts_layout_choices() {

            $posts_layout = apply_filters( 'ogma_blog_single_posts_layout_choices',
                array(
                    'posts-layout--one'  => array(
                        'title'     => __( 'Layout 1', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-layout-one.png'
                    ),
                    'posts-layout--two'  => array(
                        'title'     => __( 'Layout 2', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-layout-two.png'
                    )
                )
            );

            return $posts_layout;

        }

    endif;

/*---------------------------------- Footer Panel Choices -----------------------------------*/

    if ( ! function_exists( 'ogma_blog_footer_widget_area_layout_choices' ) ) :

        /**
         * function to return choices of footer widget layout.
         *
         * @since 1.0.0
         */
        function ogma_blog_footer_widget_area_layout_choices() {

            $posts_layout = apply_filters( 'ogma_blog_footer_widget_area_layout_choices',
                array(
                    'column-one'  => array(
                        'title'     => __( 'Layout 1', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-1.png'
                    ),
                    'column-two'  => array(
                        'title'     => __( 'Layout 2', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-2.png'
                    ),
                    'column-three'  => array(
                        'title'     => __( 'Layout 3', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-3.png'
                    ),
                    'column-four'  => array(
                        'title'     => __( 'Layout 4', 'ogma-blog' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-4.png'
                    )
                )
            );

            return $posts_layout;

        }

    endif;

/*---------------------------------- Upgrade Control Choices -----------------------------------*/
    
    if ( ! function_exists( 'ogma_blog_upgrade_choices' ) ) :

        /**
         * function to return choices for upgrade to pro.
         *
         * @since 1.0.0
         */
        function ogma_blog_upgrade_choices( $setting_id ) {

            $upgrade_info_lists = array(
                'preloader'     => array( __( '15+ Styles', 'ogma-blog' ), __( 'Color options', 'ogma-blog' ), __( 'Device visibility', 'ogma-blog' ) ),
                'social_icon'   => array( __( 'Add unlimited social icons field.', 'ogma-blog' ), __( 'More icons with official color.', 'ogma-blog' ), __( 'Device visibility', 'ogma-blog' ) ),
                'typography'    => array( __( '950+ Google Fonts', 'ogma-blog' ), __( 'Adjustable font size', 'ogma-blog' ), __( 'Font Color Option', 'ogma-blog' ) ),
                'breadcrumb'    => array( __( 'Device visibility', 'ogma-blog' ), __( 'Typography Option', 'ogma-blog' ), __( 'Color Option', 'ogma-blog' ) ),
                'scroll_top'    => array( __( '10+ Arrow Icons', 'ogma-blog' ), __( 'Alignment Options', 'ogma-blog' ), __( 'Device visibility', 'ogma-blog' ), __( 'Color Option', 'ogma-blog' ) ),
                'header_main'    => array( __( '2 more layouts', 'ogma-blog' ), __( 'Extra option for Custom Buttom', 'ogma-blog' ) ),
                'primary_menu'    => array( __( 'Hover Effects', 'ogma-blog' ), __( 'Typography Options', 'ogma-blog' ), __( 'Color Options', 'ogma-blog' ) ),
                'ticker'    => array( __( '3 More Ticker Icons', 'ogma-blog' ), __( 'Multiple Categories Option', 'ogma-blog' ), __( '2 More Layouts', 'ogma-blog' ), __( 'Color Options', 'ogma-blog' ) ),
                'main_banner'    => array( __( '4 More Layouts', 'ogma-blog' ), __( 'Multiple Categories Option', 'ogma-blog' ), __( 'Extra option for slider control.', 'ogma-blog' ) ),
                'archive' => array( __( '3 More Post Layouts', 'ogma-blog' ), __( 'Different Pagination Types', 'ogma-blog' ), __( 'Post Element/Meta Re-Order.', 'ogma-blog' ) ),
                'single_post' => array( __( '5 More Post Layouts', 'ogma-blog' ), __( 'Post Element/Meta Re-Order.', 'ogma-blog' ),  __( '2 More author box layout', 'ogma-blog' ),  __( 'Extra options for post navigation', 'ogma-blog' ), __( '3 More Layout for related posts', 'ogma-blog' ), __( 'Extra options for related posts section', 'ogma-blog' ) ),
                'error_page' => array( __( '3 More Page Layouts', 'ogma-blog' ), __( 'Blank Page Option', 'ogma-blog' ),  __( 'Button Color', 'ogma-blog' ) ),

            );

           // $get_setting_upgrade_choices = upgrade_info_for_setting_id( $setting_id );

            $setting_id = explode( 'ogma_blog_', $setting_id );
            $setting_id = $setting_id[1];

            return $upgrade_info_lists[$setting_id];

        }

    endif;