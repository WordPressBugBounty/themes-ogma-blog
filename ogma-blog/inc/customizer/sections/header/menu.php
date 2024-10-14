<?php
/**
 * Add Primary Menu section and it's fields inside Header Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_primary_menu_options' );

if ( ! function_exists( 'ogma_blog_register_primary_menu_options' ) ) :

    /**
     * Register theme options for Primary Menu section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_primary_menu_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Primary Menu Section
         * 
         * Header Settings > Primary Menu
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_primary_menu',
                array(
                    'priority'  => 25,
                    'panel'     => 'ogma_blog_panel_header',
                    'title'     => __( 'Primary Menu', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for primary menu description
         *
         * Header Settings > Primary Menu
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_primary_menu_description_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_primary_menu_description_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_primary_menu_description_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_primary_menu',
                    'settings'      => 'ogma_blog_primary_menu_description_enable',
                    'label'         => __( 'Enable Menu Description', 'ogma-blog' )
                )
            )
        );

        /**
         * Upgrade field for Primary Menu
         * 
         * Header Settings > Primary Menu
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_primary_menu',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_primary_menu',
                array(
                    'priority'      => 100,
                    'section'       => 'ogma_blog_section_primary_menu',
                    'settings'      => 'upgrade_primary_menu',
                    'label'         => __( 'More options with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_primary_menu' )
                )
            )
        );

    }

endif;