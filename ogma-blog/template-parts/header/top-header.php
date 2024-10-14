<?php
/**
 * Template part for displaying a content located in top header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_header_top_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_header_top_enable' );

if ( false === $ogma_blog_header_top_enable ) {
	return;
}

$ogma_blog_header_top_placement = apply_filters( 'ogma_blog_ogma_blog_header_top_placement', ogma_blog_get_customizer_option_value( 'ogma_blog_header_top_placement' ) );

/**
 * hook - ogma_blog_before_top_header
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_top_header' );
?>
<div id="top-header" class="top-header-wrapper">
	<div class="ogma-blog-container ogma-blog-flex">
		<?php
			switch ( $ogma_blog_header_top_placement ) {
				case 'placement_one':
					// Top Menu / Date / Social Icon

					// top menu
					get_template_part( 'template-parts/partials/header/top', 'menu' );

					// date
					get_template_part( 'template-parts/partials/header/date' );

					// social icon
					if ( true === ogma_blog_get_customizer_option_value( 'ogma_blog_header_social_enable' ) ) {
						get_template_part( 'template-parts/partials/header/social', 'icons' );
					}
					

					break;
				
				default:
					break;
			}
		?>
	</div><!-- .ogma-blog-container -->
</div><!-- .top-header-wrapper -->
<?php
/**
 * hook - ogma_blog_after_top_header
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_after_top_header' );