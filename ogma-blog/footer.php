<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
	</div><!-- #content -->
	<?php
		/**
		 * hook - ogma_blog_before_colophon
		 *
		 * @since 1.0.0
		 */
		do_action( 'ogma_blog_before_colophon' );
	?>
	<footer id="colophon" class="site-footer" <?php ogma_blog_schema_markup( 'footer' ); ?>>
		<?php
			//footer widget  area
			get_template_part( 'template-parts/partials/footer/widget', 'area' );

			//bottom footer
			get_template_part( 'template-parts/footer/bottom', 'area' );
		?>
	</footer><!-- #colophon -->
	<?php
		/**
		 * hook - ogma_blog_after_colophon
		 *
		 * @since 1.0.0
		 */
		do_action( 'ogma_blog_after_colophon' );
	?>
</div><!-- #page -->
<?php
	/**
	 * hook - ogma_blog_after_page
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_blog_after_page' );

	wp_footer();
?>

</body>
</html>
