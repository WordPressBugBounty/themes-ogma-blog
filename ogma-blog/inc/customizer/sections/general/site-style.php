<?php
/**
 * Add Site Style section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_site_style_options' );

if ( ! function_exists( 'ogma_blog_register_site_style_options' ) ) :

    /**
     * Register theme options for Site Style section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_site_style_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Site Style Section
         * 
         * General Settings > Site Style
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_site_style',
                array(
                    'priority'              => 10,
                    'panel'                 => 'ogma_blog_panel_general',
                    'title'                 => __( 'Site Style', 'ogma-blog' ),
                )
            )
        );

        /**
         * Radio image field for site layout
         *
         * General Settings > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_site_container_layout',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_site_container_layout' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Radio_Image(
            $wp_customize, 'ogma_blog_site_container_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_site_style',
                    'settings'      => 'ogma_blog_site_container_layout',
                    'label'         => __( 'Container Layout', 'ogma-blog' ),
                    'choices'       => ogma_blog_site_container_layout_choices(),
                )
            )
        );

        /**
         * Divider field
         *
         * General Settings > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'divider_site_style_one',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Divider(
            $wp_customize, 'divider_site_style_one',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_blog_section_site_style',
                    'settings'      => 'divider_site_style_one',
                )
            )
        );

        /**
         * Range field for main container width
         *
         * General Settings > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_main_container_width',
            array(
                'default'               => ogma_blog_get_customizer_default( 'ogma_blog_main_container_width' ),
                'sanitize_callback'     => 'ogma_blog_sanitize_number'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Range(
            $wp_customize, 'ogma_blog_main_container_width',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_blog_section_site_style',
                    'settings'          => 'ogma_blog_main_container_width',
                    'label'             => __( 'Main Container Width', 'ogma-blog' ),
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 2040,
                        'step'  => 1,
                        'unit'  => 'px'
                    ),
                    'active_callback'   => 'ogma_blog_cb_hasnt_boxed_layout'
                )
            )
        );

        /**
         * Range field for boxed container width
         *
         * General Settings > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_boxed_container_width',
            array(
                'default'               => ogma_blog_get_customizer_default( 'ogma_blog_boxed_container_width' ),
                'sanitize_callback'     => 'ogma_blog_sanitize_number'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Range(
            $wp_customize, 'ogma_blog_boxed_container_width',
                array(
                    'priority'          => 25,
                    'section'           => 'ogma_blog_section_site_style',
                    'settings'          => 'ogma_blog_boxed_container_width',
                    'label'             => __( 'Boxed Container Width', 'ogma-blog' ),
                    'input_attrs'       => array(
                        'min'   => 0,
                        'max'   => 2040,
                        'step'  => 1,
                        'unit'  => 'px'
                    ),
                    'active_callback'   => 'ogma_blog_cb_has_boxed_layout'
                )
            )
        );

        /**
         * Radio buttonset field for site mode
         *
         * General Settings > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_site_mode',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_site_mode' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Buttonset(
            $wp_customize, 'ogma_blog_site_mode',
                array(
                    'priority'      => 50,
                    'section'       => 'ogma_blog_section_site_style',
                    'settings'      => 'ogma_blog_site_mode',
                    'label'         => __( 'Site Mode', 'ogma-blog' ),
                    'choices'       => ogma_blog_site_mode_choices(),
                )
            )
        );

    }

endif;