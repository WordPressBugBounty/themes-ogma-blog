<?php
/**
 * Footer bottom area fields in Footer Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_footer_bottom_options' );

if ( ! function_exists( 'ogma_blog_register_footer_bottom_options' ) ) :

    /**
     * Register theme options for Bottom Area section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_footer_bottom_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Bottom Area Section
         * 
         * Footer Settings > Bottom Area
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_footer_bottom',
                array(
                    'priority'  => 20,
                    'panel'     => 'ogma_blog_panel_footer',
                    'title'     => __( 'Bottom Area', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for footer bottom area
         *
         * Footer Settings > Bottom Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_footer_bottom_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_footer_bottom_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_footer_bottom_enable',
                array(
                    'priority'          => 15,
                    'section'           => 'ogma_blog_section_footer_bottom',
                    'settings'          => 'ogma_blog_footer_bottom_enable',
                    'label'             => __( 'Enable footer bottom area.', 'ogma-blog' )
                )
            )
        );

        /**
         * Textarea field for copyright content
         *
         * Footer Settings > Bottom Area
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_footer_copyright_info',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_footer_copyright_info' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'wp_kses_post'
            )
        );
        $wp_customize->add_control( 'ogma_blog_footer_copyright_info',
            array(
                'priority'          => 25,
                'section'           => 'ogma_blog_section_footer_bottom',
                'settings'          => 'ogma_blog_footer_copyright_info',
                'label'             => __( 'Copyright Content', 'ogma-blog' ),
                'type'              => 'textarea'
            )
        );

    }

endif;