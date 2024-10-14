<?php
/**
 * Customizer: Add Panels/Sections
 *
 * Add Panels/Sections to the Customizer.
 * 
 * @package Ogma Blog
 */ 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_customizer_panels_sections' );

if ( ! function_exists( 'ogma_blog_register_customizer_panels_sections' ) ) :
    
    /**
     * Implement the Theme Customizer for Theme Settings.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function ogma_blog_register_customizer_panels_sections( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }
    /*--------------------------- Add Panels -------------------------------------*/
        
        /**
         * Add Panel for General Settings
         * 
         * Customize > General Settings
         * 
         * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'ogma_blog_panel_general',
            array(
                'priority'          => 5,
                'title'             => __( 'General Settings', 'ogma-blog' )
            )
        );

        /**
         * Add Panel for Header Settings
         * 
         * Customize > Header Settings
         * 
         * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'ogma_blog_panel_header',
            array(
                'priority'          => 10,
                'title'             => __( 'Header Settings', 'ogma-blog' )
            )
        );

        /**
         * Add Panel for Frontpage Settings
         * 
         * Customize > Frontpage Settings
         * 
         * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'ogma_blog_panel_frontpage',
            array(
                'priority'          => 15,
                'title'             => __( 'Frontpage Settings', 'ogma-blog' )
            )
        );

        /**
         * Add Panel for Innerpage Settings
         * 
         * Customize > Innerpage Settings
         * 
         * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'ogma_blog_panel_innerpage',
            array(
                'priority'          => 20,
                'title'             => __( 'Innerpage Settings', 'ogma-blog' )
            )
        );

        /**
         * Add Panel for Footer Settings
         * 
         * Customize > Footer Settings
         * 
         * @uses $wp_customize->add_panel() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
         * @since 1.0.0
         */
        $wp_customize->add_panel(
            'ogma_blog_panel_footer',
            array(
                'priority'          => 25,
                'title'             => __( 'Footer Settings', 'ogma-blog' )
            )
        );

    }
    
endif;