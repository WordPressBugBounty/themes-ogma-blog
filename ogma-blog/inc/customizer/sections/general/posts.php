<?php
/**
 * Add Posts section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_general_posts_options' );

if ( ! function_exists( 'ogma_blog_register_general_posts_options' ) ) :

    /**
     * Register theme options for Posts section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_general_posts_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Posts Section
         * 
         * General Settings > Posts
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_general_post',
                array(
                    'priority'  => 40,
                    'panel'     => 'ogma_blog_panel_general',
                    'title'     => __( 'Posts', 'ogma-blog' ),
                )
            )
        );

        /**
         * Select option for posts date style
         *
         * General Settings > Performance > Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_posts_date_style',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_posts_date_style' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_posts_date_style',
            array(
                'priority'          => 25,
                'section'           => 'ogma_blog_section_general_post',
                'settings'          => 'ogma_blog_posts_date_style',
                'label'             => __( 'Posts Date Style', 'ogma-blog' ),
                'description'       => __( 'Whether to show date published or modified date.', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_date_style_choices()
            )
        );

        /**
         * Select option for posts date format
         *
         * General Settings > Performance > Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_posts_date_format',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_posts_date_format' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_posts_date_format',
            array(
                'priority'          => 30,
                'section'           => 'ogma_blog_section_general_post',
                'settings'          => 'ogma_blog_posts_date_format',
                'label'             => __( 'Posts Date Format', 'ogma-blog' ),
                'description'       => __( 'Posts date format applied to single and archive pages.', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_date_format_choices()
            )
        );

        /**
         * Select option for posts thumbnail hover effect
         *
         * General Settings > Performance > Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_posts_thumbnail_hover_effect',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_posts_thumbnail_hover_effect' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_posts_thumbnail_hover_effect',
            array(
                'priority'          => 35,
                'section'           => 'ogma_blog_section_general_post',
                'settings'          => 'ogma_blog_posts_thumbnail_hover_effect',
                'label'             => __( 'Thumbnail Hover Effect', 'ogma-blog' ),
                'description'       => __( 'Applied to posts thumbanail listed in archive pages.', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_thumbnail_hover_effect_choices()
            )
        );

        /**
         * Toggle option for post read time.
         *
         * General Settings > Performance > Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_posts_reading_time_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_posts_reading_time_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_posts_reading_time_enable',
                array(
                    'priority'      => 40,
                    'section'       => 'ogma_blog_section_general_post',
                    'settings'      => 'ogma_blog_posts_reading_time_enable',
                    'label'         => __( 'Enable Posts Reading Time.', 'ogma-blog' )
                )
            )
        );

    }

endif;