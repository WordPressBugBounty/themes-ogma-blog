<?php
/**
 * Archive Page and it's fields inside Innerpage Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_archive_options' );

if ( ! function_exists( 'ogma_blog_register_archive_options' ) ) :

    /**
     * Register theme options for Archive section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_archive_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Archive Section
         * 
         * Innerpage Settings > Archive Pages
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_page_archive',
                array(
                    'priority'  => 5,
                    'panel'     => 'ogma_blog_panel_innerpage',
                    'title'     => __( 'Archive Pages', 'ogma-blog' ),
                )
            )
        );

        /**
         * Select option for archive page style
         *
         * Innerpage Settings > Archive Pages
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_archive_page_style',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_archive_page_style' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_archive_page_style',
            array(
                'priority'          => 10,
                'section'           => 'ogma_blog_section_page_archive',
                'settings'          => 'ogma_blog_archive_page_style',
                'label'             => __( 'Archive Page Style', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_archive_page_style_choices()
            )
        );

        /**
         * Toggle option for archive title prefix.
         *
         * Innerpage Settings > Archive Pages
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_archive_title_prefix_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_archive_title_prefix_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_archive_title_prefix_enable',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_blog_section_page_archive',
                    'settings'      => 'ogma_blog_archive_title_prefix_enable',
                    'label'         => __( 'Enable archive page title prefix.', 'ogma-blog' )
                )
            )
        );

        /**
         * Toggle option for archive post read more.
         *
         * Innerpage Settings > Archive Pages
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_archive_post_readmore_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_archive_post_readmore_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_archive_post_readmore_enable',
                array(
                    'priority'      => 25,
                    'section'       => 'ogma_blog_section_page_archive',
                    'settings'      => 'ogma_blog_archive_post_readmore_enable',
                    'label'         => __( 'Enable read more.', 'ogma-blog' )
                )
            )
        );

        /**
         * Upgrade field for archive pages
         * 
         * Innerpage Settings > Archive Pages
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_archive',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_archive',
                array(
                    'priority'      => 100,
                    'section'       => 'ogma_blog_section_page_archive',
                    'settings'      => 'upgrade_archive',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_archive' )
                )
            )
        );

    }

endif;