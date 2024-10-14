<?php
/**
 * Template part for displaying a scroll top in footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_scroll_top_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_scroll_top_enable' );

if ( false === $ogma_blog_scroll_top_enable ) {
    return;
}

/**
 * hook - ogma_blog_before_scroll_top
 * 
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_scroll_top' );

$ogma_blog_scroll_top_arrow = ogma_blog_get_customizer_option_value( 'ogma_blog_scroll_top_arrow' );
?>
    <div id="ogma-blog-scrollup">
        <i class="bx <?php echo esc_attr( $ogma_blog_scroll_top_arrow ); ?>"></i>
    </div><!-- #ogma-blog-scrollup -->
<?php
/**
 * hook - ogma_blog_after_scroll_top
 * 
 * @since 1.0.0
 */
do_action( 'ogma_blog_after_scroll_top' );