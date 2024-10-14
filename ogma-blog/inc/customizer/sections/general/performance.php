<?php
/**
 * Add Performance section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_performance_options' );

if ( ! function_exists( 'ogma_blog_register_performance_options' ) ) :

    /**
     * Register theme options for Performance section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_performance_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Performance Section
         * 
         * General Settings > Performance
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_performance',
                array(
                    'priority'              => 150,
                    'panel'                 => 'ogma_blog_panel_general',
                    'title'                 => __( 'Performance', 'ogma-blog' ),
                )
            )
        );

        /**
         * Heading field for SEO performance
         *
         * General Settings > Performance > SEO
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'seo_performance_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Heading(
            $wp_customize, 'seo_performance_heading',
                array(
                    'priority'      => 5,
                    'section'       => 'ogma_blog_section_performance',
                    'settings'      => 'seo_performance_heading',
                    'label'         => __( 'SEO', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for schema ready.
         *
         * General Settings > Performance
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_site_schema_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_site_schema_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_site_schema_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_performance',
                    'settings'      => 'ogma_blog_site_schema_enable',
                    'label'         => __( 'Make a website schema ready.', 'ogma-blog' )
                )
            )
        );

    }

endif;