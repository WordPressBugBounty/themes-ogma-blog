<?php
/**
 * Add Banner section and it's fields inside Frontpage Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_frontpage_banner_options' );

if ( ! function_exists( 'ogma_blog_register_frontpage_banner_options' ) ) :

    /**
     * Register theme options for Banner section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_frontpage_banner_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Banner Section
         * 
         * Frontpage Settings > Banner
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_frontpage_banner',
                array(
                    'priority'  => 5,
                    'panel'     => 'ogma_blog_panel_frontpage',
                    'title'     => __( 'Main Banner', 'ogma-blog' ),
                )
            )
        );

        /**
         * Tabs field for Banner section
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_frontpage_banner_tabs',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_frontpage_banner_tabs' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Tabs(
            $wp_customize, 'ogma_blog_frontpage_banner_tabs',
                array(
                    'priority'          => 5,
                    'section'           => 'ogma_blog_section_frontpage_banner',
                    'settings'          => 'ogma_blog_frontpage_banner_tabs',
                    'choices'           => ogma_blog_frontpage_banner_tabs_choices(),
                    'active_callback'   => 'ogma_blog_cb_enable_banner_option'
                )
            )
        );

        /**
         * Heading field for banner slider settings
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_slider_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Heading(
            $wp_customize, 'ogma_blog_banner_slider_heading',
                array(
                    'priority'          => 10,
                    'section'           => 'ogma_blog_section_frontpage_banner',
                    'settings'          => 'ogma_blog_banner_slider_heading',
                    'label'             => __( 'Slider Settings', 'ogma-blog' ),
                    'active_callback'   => 'ogma_blog_cb_enable_banner_option'
                )
            )
        );

        /**
         * Toggle option for banner.
         *
         * Frontpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_slider_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_slider_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_banner_slider_enable',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_blog_section_frontpage_banner',
                    'settings'      => 'ogma_blog_banner_slider_enable',
                    'label'         => __( 'Enable Banner', 'ogma-blog' )
                )
            )
        );

        /**
         * Select option of category for slider posts
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_slider_category',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_slider_category' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Dropdown_Categories(
            $wp_customize, 'ogma_blog_banner_slider_category',
                array(
                    'priority'          => 25,
                    'section'           => 'ogma_blog_section_frontpage_banner',
                    'settings'          => 'ogma_blog_banner_slider_category',
                    'label'             => __( 'Slider Category', 'ogma-blog' ),
                    'active_callback'   => 'ogma_blog_cb_enable_banner_option'
                )
            )
        );

        /**
         * Select option for slider posts order by
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_slider_order_by',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_slider_order_by' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_banner_slider_order_by',
            array(
                'priority'          => 30,
                'section'           => 'ogma_blog_section_frontpage_banner',
                'settings'          => 'ogma_blog_banner_slider_order_by',
                'label'             => __( 'Posts Order By', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_order_by_choices(),
                'active_callback'   => 'ogma_blog_cb_enable_banner_option'
            )
        );

        /**
         * Select option for slider posts date filter
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_slider_date_filter',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_slider_date_filter' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_banner_slider_date_filter',
            array(
                'priority'          => 35,
                'section'           => 'ogma_blog_section_frontpage_banner',
                'settings'          => 'ogma_blog_banner_slider_date_filter',
                'label'             => __( 'Posts Date Filter', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_date_filter_choices(),
                'active_callback'   => 'ogma_blog_cb_enable_banner_option'
            )
        );

        /**
         * Select option for banner background option
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_bg_type',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_bg_type' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_banner_bg_type',
            array(
                'priority'          => 150,
                'section'           => 'ogma_blog_section_frontpage_banner',
                'settings'          => 'ogma_blog_banner_bg_type',
                'label'             => __( 'Banner Background Type', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_bg_type_choices(),
                'active_callback'   => 'ogma_blog_cb_enable_banner_option'
            )
        );

        /**
         * Color Picker field for banner background color
         * 
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_bg_color',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_bg_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_blog_banner_bg_color',
                array(
                    'priority'          => 155,
                    'section'           => 'ogma_blog_section_frontpage_banner',
                    'settings'          => 'ogma_blog_banner_bg_color',
                    'label'             => __( 'Background Color', 'ogma-blog' ),
                    'active_callback'   => 'ogma_blog_cb_has_banner_bg_type_color'
                )
            )
        );

        /**
         * Image field for background image in banner section
         *
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_banner_bg_image',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_banner_bg_image' ),
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control(
            $wp_customize, 'ogma_blog_banner_bg_image',
                array(
                    'priority'          => 160,
                    'section'           => 'ogma_blog_section_frontpage_banner',
                    'settings'          => 'ogma_blog_banner_bg_image',
                    'label'             => __( 'Background Image', 'ogma-blog' ),
                    'height'            => 600,
                    'width'             => 1920,
                    'flex_width'        =>true,
                    'active_callback'   => 'ogma_blog_cb_has_banner_bg_type_image'
                )
            )
        );

        /**
         * Upgrade field for main banner
         * 
         * Frongpage Settings > Banner
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_main_banner',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_main_banner',
                array(
                    'priority'      => 200,
                    'section'       => 'ogma_blog_section_frontpage_banner',
                    'settings'      => 'upgrade_main_banner',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_main_banner' )
                )
            )
        );


    }

endif;