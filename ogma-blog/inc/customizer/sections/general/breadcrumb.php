<?php
/**
 * Add Breadcrumb section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_breadcrumb_options' );

if ( ! function_exists( 'ogma_blog_register_breadcrumb_options' ) ) :

    /**
     * Register theme options for Breadcrumb section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_breadcrumb_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Breadcrumb Section
         * 
         * General Settings > Breadcrumb
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_breadcrumb',
                array(
                    'priority'  => 35,
                    'panel'     => 'ogma_blog_panel_general',
                    'title'     => __( 'Breadcrumb', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for breadcrumb content
         *
         * General Settings > Breadcrumb
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_site_breadcrumb_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_site_breadcrumb_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_site_breadcrumb_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_breadcrumb',
                    'settings'      => 'ogma_blog_site_breadcrumb_enable',
                    'label'         => __( 'Enable Breadcrumb Trial', 'ogma-blog' )
                )
            )
        );

        /**
         * Select field for breadcrumb types
         */
        $wp_customize->add_setting( 'ogma_blog_site_breadcrumb_types',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_site_breadcrumb_types' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_site_breadcrumb_types',
            array(
                'priority'          => 15,
                'section'           => 'ogma_blog_section_breadcrumb',
                'settings'          => 'ogma_blog_site_breadcrumb_types',
                'label'             => __( 'Breadcrumb Types', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_site_breadcrumb_types_choices(),
                'active_callback'   => 'ogma_blog_has_enable_site_breadcrumb_callback',
            )
        );

        /**
         * Upgrade field for breadcrumb
         * 
         * General Settings > Breadcrumb
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_breadcrumb',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_breadcrumb',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_blog_section_breadcrumb',
                    'settings'      => 'upgrade_breadcrumb',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_breadcrumb' )
                )
            )
        );

    }

endif;