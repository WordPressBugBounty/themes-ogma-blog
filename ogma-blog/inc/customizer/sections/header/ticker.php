<?php
/**
 * Add News Ticker section and it's fields inside Header Settings panel.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'ogma_blog_register_ticker_options' );

if ( ! function_exists( 'ogma_blog_register_ticker_options' ) ) :

    /**
     * Register theme options for News Ticker section.
     * 
     * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
     * @since 1.0.0
     */
    function ogma_blog_register_ticker_options( $wp_customize ) {

        /*
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

        /**
         * Add News Ticker Section
         * 
         * Header Settings > News Ticker
         * 
         * @uses $wp_customize->add_section() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_section/
         * @since 1.0.0
         */
        $wp_customize->add_section( new Ogma_Blog_Customize_Section (
            $wp_customize, 'ogma_blog_section_header_ticker',
                array(
                    'priority'  => 40,
                    'panel'     => 'ogma_blog_panel_header',
                    'title'     => __( 'News Ticker', 'ogma-blog' ),
                )
            )
        );

        /**
         * Toggle option for news ticker.
         *
         * Header Settings > News Ticker
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_header_ticker_enable',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_header_ticker_enable' ),
                'sanitize_callback' => 'ogma_blog_sanitize_checkbox'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Toggle(
            $wp_customize, 'ogma_blog_header_ticker_enable',
                array(
                    'priority'      => 15,
                    'section'       => 'ogma_blog_section_header_ticker',
                    'settings'      => 'ogma_blog_header_ticker_enable',
                    'label'         => __( 'Enable News Ticker', 'ogma-blog' )
                )
            )
        );

        /**
         * Text field for news ticker label
         *
         * Header Settings > News Ticker
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_header_ticker_label',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_header_ticker_label' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( 'ogma_blog_header_ticker_label',
            array(
                'priority'          => 20,
                'section'           => 'ogma_blog_section_header_ticker',
                'settings'          => 'ogma_blog_header_ticker_label',
                'label'             => __( 'Ticker Label', 'ogma-blog' ),
                'type'              => 'text',
                'active_callback'   => 'ogma_blog_cb_has_enable_header_ticker'
            )
        );

        /**
         * Select option for ticker posts date filter
         *
         * Header Settings > News Ticker
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'ogma_blog_ticker_posts_date_filter',
            array(
                'default'           => ogma_blog_get_customizer_default( 'ogma_blog_ticker_posts_date_filter' ),
                'sanitize_callback' => 'ogma_blog_sanitize_select'
            )
        );
        $wp_customize->add_control( 'ogma_blog_ticker_posts_date_filter',
            array(
                'priority'          => 35,
                'section'           => 'ogma_blog_section_header_ticker',
                'settings'          => 'ogma_blog_ticker_posts_date_filter',
                'label'             => __( 'Posts Date Filter', 'ogma-blog' ),
                'type'              => 'select',
                'choices'           => ogma_blog_posts_date_filter_choices(),
                'active_callback'   => 'ogma_blog_cb_has_enable_header_ticker'
            )
        );

        /**
         * Upgrade field for ticker
         * 
         * Header Settings > News Ticker
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'upgrade_ticker',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new Ogma_Blog_Control_Upgrade(
            $wp_customize, 'upgrade_ticker',
                array(
                    'priority'      => 70,
                    'section'       => 'ogma_blog_section_header_ticker',
                    'settings'      => 'upgrade_ticker',
                    'label'         => __( 'More Features with Ogma Pro', 'ogma-blog' ),
                    'choices'       => ogma_blog_upgrade_choices( 'ogma_blog_ticker' )
                )
            )
        );

    }

endif;