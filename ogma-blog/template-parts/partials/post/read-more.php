<?php
/**
 * Partial template to display the post read more button
 *
 * @package Ogma Blog
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_read_more_tag = sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_the_permalink() ), esc_html__( 'Read More', 'ogma-blog' ) );

?>

<div class="ogma-blog-button read-more-button">
	<?php echo $ogma_blog_read_more_tag ; ?>
</div><!-- .ogma-blog-button -->