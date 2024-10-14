<?php
/**
 * Single Posts and it's fields inside Innerpage Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_single_posts_options' );

if ( ! function_exists( 'ogma_blog_register_single_posts_options' ) ) :

    /**
     * Register theme options for Single Posts section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_single_posts_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Single Posts Section
         * 
         * Innerpage Settings > Single Posts
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_post_single',
                array(
                    'priority'  => 15,
                    'panel'     => 'ogma_blog_panel_innerpage',
                    'title'     => __( 'Single Posts', 'ogma-blog' ),
                )
            )
        );

        /**
         * Heading field for posts layout
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'single_posts_layout_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Heading(
            $wp_customize, 'single_posts_layout_heading',
                array(
                    'priority'          => 15,
                    'section'           => 'ogma_blog_section_post_single',
                    'settings'          => 'single_posts_layout_heading',
                    'label'             => __( 'Post Layout', 'ogma-blog' )
                )
            )
        );

        /**
         * Radio image field for single posts layout
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_single_posts_layout',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_single_posts_layout' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Radio_Image(
            $wp_customize, 'ogma_blog_single_posts_layout',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_blog_section_post_single',
                    'settings'      => 'ogma_blog_single_posts_layout',
                    'label'         => __( 'Posts Layout', 'ogma-blog' ),
                    'choices'       => ogma_blog_single_posts_layout_choices(),
                )
            )
        );

        /**
         * Heading field for posts author box
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'single_posts_author_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Heading(
            $wp_customize, 'single_posts_author_heading',
                array(
                    'priority'          => 25,
                    'section'           => 'ogma_blog_section_post_single',
                    'settings'          => 'single_posts_author_heading',
                    'label'             => __( 'Author Box', 'ogma-blog' )
                )
            )
        );

        /**
         * Toggle option for single posts author box
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_single_posts_author_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_single_posts_author_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_single_posts_author_enable',
                array(
                    'priority'          => 25,
                    'section'           => 'ogma_blog_section_post_single',
                    'settings'          => 'ogma_blog_single_posts_author_enable',
                    'label'             => __( 'Enable author box', 'ogma-blog' )
                )
            )
        );

        /**
         * Heading field for related posts
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'single_posts_related_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Heading(
            $wp_customize, 'single_posts_related_heading',
                array(
                    'priority'          => 45,
                    'section'           => 'ogma_blog_section_post_single',
                    'settings'          => 'single_posts_related_heading',
                    'label'             => __( 'Related Posts', 'ogma-blog' )
                )
            )
        );

        /**
         * Toggle option for single posts related posts
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_single_posts_related_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_single_posts_related_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_single_posts_related_enable',
                array(
                    'priority'          => 45,
                    'section'           => 'ogma_blog_section_post_single',
                    'settings'          => 'ogma_blog_single_posts_related_enable',
                    'label'             => __( 'Enable related posts', 'ogma-blog' )
                )
            )
        );

        /**
         * Text field for related posts section title
         *
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_single_posts_related_label',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_single_posts_related_label' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_blog_single_posts_related_label',
            array(
                'priority'          => 50,
                'section'           => 'ogma_blog_section_post_single',
                'settings'          => 'ogma_blog_single_posts_related_label',
                'label'             => __( 'Section Title', 'ogma-blog' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_blog_cb_has_enable_single_posts_related'
            )
        );

        /**
         * Upgrade field for single posts
         * 
         * Innerpage Settings > Single Posts
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_single_post',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_single_post',
                array(
                    'priority'      => 100,
                    'section'       => 'ogma_blog_section_post_single',
                    'settings'      => 'upgrade_single_post',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_single_post' )
                )
            )
        );

    }

endif;