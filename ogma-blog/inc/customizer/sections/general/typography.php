<?php
/**
 * Add Typography section and it's fields inside General Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_typography_options' );

if ( ! function_exists( 'ogma_blog_register_typography_options' ) ) :

    /**
     * Register theme options for Typography section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_typography_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add Typography Section
         * 
         * General Settings > Typography
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_typography',
                array(
                    'priority'  => 30,
                    'panel'     => 'ogma_blog_panel_general',
                    'title'     => __( 'Typography', 'ogma-blog' ),
                )
            )
        );

        /**
         * Body Typography Section
         *
         * General Settings > Typography > Body
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section(
            $wp_customize, 'ogma_blog_section_typography_body',
                array(
                    'priority'      => 10,
                    'panel'         => 'ogma_blog_panel_general',
                    'section'       => 'ogma_blog_section_typography',
                    'title'         => __( 'Body', 'ogma-blog' )
                )
            )
        );

        /**
         * Typography Font filed for body typography
         *
         * General Settings > Typography > Body
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'ogma_blog_body_font_family',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_body_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_body_font_weight',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_body_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_body_font_style',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_body_font_style' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_body_font_transform',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_body_font_transform' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_body_font_decoration',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_body_font_decoration' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                
            )
        );

        $wp_customize->add_control( new Ogma_Blog_Control_Typography (
            $wp_customize,
                'body_typography',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_typography_body',
                    'settings'      => array(
                        'family'        => 'ogma_blog_body_font_family',
                        'weight'        => 'ogma_blog_body_font_weight',
                        'style'         => 'ogma_blog_body_font_style',
                        'transform'     => 'ogma_blog_body_font_transform',
                        'decoration'    => 'ogma_blog_body_font_decoration'
                    ),
                    'description'   => __( 'Select how you want your body fonts to appear.', 'ogma-blog' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

        /**
         * Heading Typography Section
         *
         * General Settings > Typography > Heading
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section(
            $wp_customize, 'ogma_blog_section_typography_heading',
                array(
                    'priority'      => 20,
                    'panel'         => 'ogma_blog_panel_general',
                    'section'       => 'ogma_blog_section_typography',
                    'title'         => __( 'Heading', 'ogma-blog' )
                )
            )
        );

        /**
         * Typography Font filed for heading typography
         *
         * General Settings > Typography > Heading
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'ogma_blog_heading_font_family',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_heading_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_heading_font_weight',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_heading_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_heading_font_style',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_heading_font_style' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_heading_font_transform',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_heading_font_transform' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                
            )
        );
        $wp_customize->add_setting(
            'ogma_blog_heading_font_decoration',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_heading_font_decoration' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
                
            )
        );

        $wp_customize->add_control( new Ogma_Blog_Control_Typography (
            $wp_customize,
                'heading_typography',
                array(
                    'priority'      => 10,
                    'section'       => 'ogma_blog_section_typography_heading',
                    'settings'      => array(
                        'family'        => 'ogma_blog_heading_font_family',
                        'weight'        => 'ogma_blog_heading_font_weight',
                        'style'         => 'ogma_blog_heading_font_style',
                        'transform'     => 'ogma_blog_heading_font_transform',
                        'decoration'    => 'ogma_blog_heading_font_decoration'
                    ),
                    'description'   => __( 'Select how you want your body fonts to appear.', 'ogma-blog' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

        /**
         * Upgrade field for typography section
         * 
         * General Settings > Typography
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_typogrpahy',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_typogrpahy',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_blog_section_typography',
                    'settings'      => 'upgrade_typogrpahy',
                    'label'         => __( 'More Options with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_typography' )
                )
            )
        );

    }

endif;