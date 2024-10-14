<?php
/**
 * Manage the function for customizer selective refresh
 * 
 * @package Ogma Blog
 */

if ( ! function_exists( 'ogma_blog_customizer_selective_refresh' ) ) :

	/**
	 * function about control partial refresh for the customizer preview
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_customizer_selective_refresh( $wp_customize ) {

		// Abort if selective refresh is not available.
	    if ( ! isset( $wp_customize->selective_refresh ) ) {
	        return;
	    }

	    //site mode switcher -- Header Settings > Main Area
	    $wp_customize->selective_refresh->add_partial( 'ogma_blog_header_site_mode_switch_enable',
	        array(
	            'selector'        => '#masthead #ogma-blog-site-mode-wrap',
	            'render_callback' => 'ogma_blog_site_mode_switcher',
	        )
	    );

	    //custom button label -- Header Settings > Main Area
	    $wp_customize->selective_refresh->add_partial( 'ogma_blog_header_custom_button_label',
	        array(
	            'selector'        => '#masthead .custom-button-wrap a',
	            'render_callback' => 'ogma_blog_customize_partial_custom_button_label',
	        )
	    );

	    //news ticker label -- Header Settings > News Ticker
	    $wp_customize->selective_refresh->add_partial( 'ogma_blog_header_ticker_label',
	        array(
	            'selector'        => '.header-news-ticker-wrapper .news-ticker-label span.label-text',
	            'render_callback' => 'ogma_blog_customize_partial_ticker_label',
	        )
	    );

	    //copyright info -- Footer Settings > Bottom Area
	    $wp_customize->selective_refresh->add_partial( 'ogma_blog_footer_copyright_info',
	        array(
	            'selector'        => '.site-info .copyright-content',
	            'render_callback' => 'ogma_blog_customize_partial_copyright_info',
	        )
	    );
	    
	}

endif;

add_action( 'customize_register', 'ogma_blog_customizer_selective_refresh' );

/**
 * Render the value of custom button label for the selective refresh partial.
 *
 * @return void
 */
function ogma_blog_customize_partial_custom_button_label() {
	$custom_button_label = ogma_blog_get_customizer_option_value( 'ogma_blog_header_custom_button_label' );
	return ( '<span class="custom-button-bell-icon"> <i class="bx bx-bell"></i></span>'.$custom_button_label );
}

/**
 * Render the value of ticker label for the selective refresh partial.
 *
 * @return void
 */
function ogma_blog_customize_partial_ticker_label() {
	$ticker_label = ogma_blog_get_customizer_option_value( 'ogma_blog_header_ticker_label' );
	return $ticker_label;
}

/**
 * Render the value of copyright info for the selective refresh partial.
 *
 * @return void
 */
function ogma_blog_customize_partial_copyright_info() {
	$copyright_info = ogma_blog_get_customizer_option_value( 'ogma_blog_footer_copyright_info' );
	return $copyright_info;
}

