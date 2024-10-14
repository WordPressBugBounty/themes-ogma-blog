<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				echo '<div class="archive-content-wrapper">';
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );
			echo '</div><!-- archive-content-wrapper ->';
			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- .ogma-blog-container -->
</div><!-- .page-content-wrapper -->

<?php
	
	/**
	 * hook - ogma_blog_after_page_post_content
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_blog_after_page_post_content' );

	get_footer();
