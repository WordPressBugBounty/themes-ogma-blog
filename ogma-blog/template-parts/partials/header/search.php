<?php
/**
 * Partial template to display search icon.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_header_search_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_header_search_enable' );
if ( false === $ogma_blog_header_search_enable ) {
    return;
}

/**
 * hook: ogma_blog_before_header_search
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_header_search' );
?>

<div class="header-search-wrapper ogma-blog-icon-elements">
    <span class="search-icon"><a href="javascript:void(0)"><i class="bx bx-search"></i></a></span>
    <div class="search-form-wrap">
        <?php get_search_form(); ?>
    </div><!-- .search-form-wrap -->
</div><!-- .header-search-wrapper -->

<?php
/**
 * hook: ogma_blog_after_header_search
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_after_header_search' );