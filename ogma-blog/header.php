<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
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
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php ogma_blog_schema_markup( 'html' ); ?>>
<?php
	wp_body_open();

	/**
	 * hook - ogma_blog_before_page
	 *
	 * @since 1.0.0
	 */
	do_action( 'ogma_blog_before_page' );
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ogma-blog' ); ?></a>

	<?php
		/**
		 * hook - ogma_blog_header_section
		 *
		 * @hooked - ogma_blog_custom_header_html - 10
		 * @hooked - ogma_blog_top_header - 20
		 * @hooked - ogma_blog_main_header - 30
		 * @hooked - header_ads_section - 40
		 * @hooked - header_news_ticker_section - 50
		 *
		 * @since 1.0.0
		 */
		do_action( 'ogma_blog_header_section' );
	?>

	<div id="content" class="site-content" <?php ogma_blog_schema_markup( 'creative_work' ); ?>>

		<?php

			if ( is_home() && is_front_page() ) {

				/**
				 * hook - ogma_blog_frontpage_section
				 *
				 * @hooked - ogma_blog_frontpage_main_banner - 10
				 *
				 * @since 1.0.0
				 */
				do_action( 'ogma_blog_frontpage_section' );

			}

		?>
