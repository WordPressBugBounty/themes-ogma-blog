<?php
/**
 * Add extended Global and Categories section and it's fields inside Colors Section.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_theme_colors_options' );

if ( ! function_exists( 'ogma_blog_register_theme_colors_options' ) ) :

    /**
     * Register theme options for Colors section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_theme_colors_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Color Section
         * 
         * General Settings > Colors
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_theme_colors',
                array(
                    'priority'  => 60,
                    'panel'     => 'ogma_blog_panel_general',
                    'title'     => __( 'Colors', 'ogma-blog' ),
                )
            )
        );

    /*------------------------------- Colors > Base Colors -------------------------------------------*/

        /**
         * Add Base Colors Section
         * 
         * General Settings > Colors
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_colors_base',
                array(
                    'priority'  => 10,
                    'panel'     => 'ogma_blog_panel_general',
                    'section'   => 'ogma_blog_section_theme_colors',
                    'title'     => __( 'Base Colors', 'ogma-blog' ),
                )
            )
        );

        /**
         * Color Picker field for Primary Color
         * 
         * General Settings > Colors > Base Colors
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_primary_theme_color',
            array(
                'default'           => ogma_blog_get_customizer_default ( 'ogma_blog_primary_theme_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_blog_primary_theme_color',
                array(
                    'label'      => __( 'Primary Color', 'ogma-blog' ),
                    'section'    => 'ogma_blog_section_colors_base',
                    'settings'   => 'ogma_blog_primary_theme_color',
                    'priority'   => 5
                )
            )
        );

        /**
         * Color Picker field for Text Color
         * 
         * General Settings > Colors > Base Colors
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_text_color',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_text_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_blog_text_color',
                array(
                    'label'      => __( 'Text Color', 'ogma-blog' ),
                    'section'    => 'ogma_blog_section_colors_base',
                    'settings'   => 'ogma_blog_text_color',
                    'priority'   => 10
                )
            )
        );

        /**
         * Color Picker field for Link Color
         * 
         * General Settings > Colors > Base Colors
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_link_color',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_link_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_blog_link_color',
                array(
                    'label'      => __( 'Link Color', 'ogma-blog' ),
                    'section'    => 'ogma_blog_section_colors_base',
                    'settings'   => 'ogma_blog_link_color',
                    'priority'   => 15
                )
            )
        );

        /**
         * Color Picker field for Link Hover Color
         * 
         * General Settings > Colors > Base Colors
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_link_hover_color',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_link_hover_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'ogma_blog_link_hover_color',
                array(
                    'label'      => __( 'Link Hover Color', 'ogma-blog' ),
                    'section'    => 'ogma_blog_section_colors_base',
                    'settings'   => 'ogma_blog_link_hover_color',
                    'priority'   => 20
                )
            )
        );

        /**
         * Divider field
         *
         * General Settings > Colors > Base Colors
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'divider_base_colors_one',
            array(
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Divider(
            $wp_customize, 'divider_base_colors_one',
                array(
                    'priority'      => 25,
                    'section'       => 'ogma_blog_section_colors_base',
                    'settings'      => 'divider_base_colors_one',
                )
            )
        );

    /*------------------------------- Colors > Categories Colors -------------------------------------*/

        /**
         * Add Categories Colors Section
         * 
         * General Settings > Colors
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_colors_categories',
                array(
                    'priority'              => 20,
                    'panel'                 => 'ogma_blog_panel_general',
                    'section'               => 'ogma_blog_section_theme_colors',
                    'title'                 => __( 'Categories Colors', 'ogma-blog' ),
                )
            )
        );

        /**
         * Color Picker field for Categories Color
         * 
         * General Settings > Colors > Categories Colors
         * 
         * @since 1.0.0
         */
        $priority = 5;
        $categories = get_categories( array( 'hide_empty' => 1 ) );

        foreach ( $categories as $category_list ) {
            $wp_customize->add_setting( 'category_color_'.esc_attr( $category_list->term_id ),
                array(
                    'default'           => '#3b2d1b',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );
            $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize, 'category_color_'.esc_attr( $category_list->term_id ),
                    array(
                        'label'      => sprintf( __( '%1$s Color', 'ogma-blog' ), esc_html( $category_list->name ) ),
                        'section'    => 'ogma_blog_section_colors_categories',
                        'settings'   => 'category_color_'.esc_attr( $category_list->term_id ),
                        'priority'   => absint( $priority )
                    )
                )
            );
            $priority += 5;
        }

    }

endif;