<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

<div class="404-error page-content-wrapper">
	<div class="ogma-blog-container">
		<main id="primary" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ogma-blog' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'The page you are looking for doesn’t exist. It may have been moved or removed. Please try searching for some other page.', 'ogma-blog' ); ?></p>

						<?php
							$ogma_blog_error_page_search_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_error_page_search_enable' );
							if ( true === $ogma_blog_error_page_search_enable ) {
						?>
								<div class="page-search-wrapper">
									<?php get_search_form(); ?>
								</div><!-- .page-search-wrapper -->
						<?php
							}

							$ogma_blog_error_page_button_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_error_page_button_enable' );
							$ogma_blog_error_page_button_label  = ogma_blog_get_customizer_option_value( 'ogma_blog_error_page_button_label' );
							if ( true === $ogma_blog_error_page_button_enable && !empty( $ogma_blog_error_page_button_label ) ) {
						?>
								<div class="error-button-wrap">
									<a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $ogma_blog_error_page_button_label ); ?></a>
								</div><!-- .error-button-wrap -->
						<?php
							}
						?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
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
