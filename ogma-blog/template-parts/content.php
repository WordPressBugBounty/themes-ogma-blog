<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma Blog
 */

$custom_post_class = '';
if ( ! has_post_thumbnail() ) {
	$custom_post_class = 'no-thumbnail';
}

$ogma_blog_archive_page_style = ogma_blog_get_customizer_option_value( 'ogma_blog_archive_page_style' );

if ( 'archive-style--classic' === $ogma_blog_archive_page_style ) {
	$thumb_size = 'full';
} else {
	$thumb_size = 'ogma-blog-block-medium';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $custom_post_class ); ?>>

	<div class="post-thumbnail-wrap">
        <?php
        	ogma_blog_post_thumbnail( $thumb_size );
        ?>
    </div>
	
	<div class="ogma-blog-post-content-wrap"> 
	    <div class="post-cats-wrap">
	        <?php ogma_blog_the_post_categories_list( get_the_ID(), 3 ); ?>
	    </div><!-- .post-cats-wrap -->

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
			?>
				<div class="entry-meta">
					<?php
						ogma_blog_posted_on();
						ogma_blog_posted_by();
						ogma_blog_post_comment();
					 	ogma_blog_entry_footer();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php
			get_template_part( 'template-parts/partials/post/content' );
		?>
		<div class="archive-read-more-time-wrap ogma-blog-flex">
			<?php 
				$ogma_blog_archive_post_readmore_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_archive_post_readmore_enable' );

				if ( false !== $ogma_blog_archive_post_readmore_enable ) {
					get_template_part( 'template-parts/partials/post/read-more' );
				}

					ogma_blog_the_estimated_reading_time();
			?>
		</div>
	</div> <!-- post-content-wrapper -->

</article><!-- #post-<?php the_ID(); ?> -->
