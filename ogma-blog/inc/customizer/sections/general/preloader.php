<?php
/**
 * Add Preloader section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_preloader_options' );

if ( ! function_exists( 'ogma_blog_register_preloader_options' ) ) :

    /**
     * Register theme options for Preloader section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_preloader_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Site Style Section
         * 
         * General Settings > Preloader
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_preloader',
                array(
                    'priority'              => 20,
                    'panel'                 => 'ogma_blog_panel_general',
                    'title'                 => __( 'Preloader', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for preloader.
         *
         * General Settings > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_preloader_enable',
            array(
                'default'           => ogma_blog_get_customizer_default ( 'ogma_blog_preloader_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_preloader_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_preloader',
                    'settings'      => 'ogma_blog_preloader_enable',
                    'label'         => __( 'Enable Preloader', 'ogma-blog' )
                )
            )
        );

        /**
         * Radio image field for preloader styles
         *
         * General Settings > Preloader
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_preloader_style',
            array(
                'default'           => ogma_blog_get_customizer_default ( 'ogma_blog_preloader_style' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Radio_Image(
            $wp_customize, 'ogma_blog_preloader_style',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_blog_section_preloader',
                    'settings'          => 'ogma_blog_preloader_style',
                    'label'             => __( 'Preloader Layout', 'ogma-blog' ),
                    'choices'           => ogma_blog_preloader_style_choices(),
                    'input_attrs'       => array(
                        'column'    => 4,
                    ),
                    'active_callback'   => 'ogma_blog_cb_has_enable_preloader'
                )
            )
        );

        /**
         * Upgrade field for preloader section
         * 
         * General Settings > Preloader
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_preloader',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_preloader',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_blog_section_preloader',
                    'settings'      => 'upgrade_preloader',
                    'label'         => __( 'More features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_preloader' )
                )
            )
        );

    }

endif;