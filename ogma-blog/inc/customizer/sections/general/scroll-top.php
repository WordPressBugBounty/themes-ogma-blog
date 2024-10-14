<?php
/**
 * Add Scroll Top section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_scroll_top_options' );

if ( ! function_exists( 'ogma_blog_register_scroll_top_options' ) ) :

    /**
     * Register theme options for Scroll Top section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_scroll_top_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Scroll Top Section
         * 
         * General Settings > Scroll Top
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_scroll_top',
                array(
                    'priority'  => 45,
                    'panel'     => 'ogma_blog_panel_general',
                    'title'     => __( 'Scroll Top', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for scroll top.
         *
         * General Settings > Scroll Top
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_scroll_top_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_scroll_top_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_scroll_top_enable',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_scroll_top',
                    'settings'      => 'ogma_blog_scroll_top_enable',
                    'label'         => __( 'Enable Scroll Top', 'ogma-blog' )
                )
            )
        );

        /**
         * Radio icons field for scroll top arrow
         *
         * General Settings > Scroll Top
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_scroll_top_arrow',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_scroll_top_arrow' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Radio_Icons(
            $wp_customize, 'ogma_blog_scroll_top_arrow',
                array(
                    'priority'          => 20,
                    'section'           => 'ogma_blog_section_scroll_top',
                    'settings'          => 'ogma_blog_scroll_top_arrow',
                    'label'             => __( 'Arrow Icon', 'ogma-blog' ),
                    'description'       => __( 'Choose required arrow from available lists.', 'ogma-blog' ),
                    'choices'           => ogma_blog_scroll_top_arrow_choices(),
                    'active_callback'   => 'ogma_blog_cb_has_enable_scroll_top'
                )
            )
        );

        /**
         * Upgrade field for scroll top
         * 
         * General Settings > Scroll Top
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_scroll_top',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_scroll_top',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_blog_section_scroll_top',
                    'settings'      => 'upgrade_scroll_top',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_scroll_top' )
                )
            )
        );

    }

endif;