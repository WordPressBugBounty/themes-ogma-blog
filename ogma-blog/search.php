<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ogma Blog
 */

get_header();

/**
 * hook - ogma_blog_before_page_post_content
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_page_post_content' );

?>

<div class="page-content-wrapper">
	
	<div class="ogma-blog-container">

		<?php get_sidebar( 'left' ); ?>

		<main id="primary" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'ogma-blog' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				echo '<div class="archive-content-wrapper">';
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );
			echo '</div><!-- archive-content-wrapper ->';
			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div> <!-- ogma container -->

</div><!-- .page-content-wrapper -->

<?php
	/**
	 * hook - ogma_blog_after_page_post_content
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_blog_after_page_post_content' );

	get_footer();
