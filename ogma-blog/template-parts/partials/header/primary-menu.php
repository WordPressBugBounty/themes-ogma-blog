<?php
/**
 * Partial template to display primary menu
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * hook: ogma_blog_before_primary_menu
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_before_primary_menu' );

?>

<nav id="site-navigation" class="main-navigation" <?php ogma_blog_schema_markup( 'site_navigation' ); ?>>
    <button class="ogma-blog-menu-toogle" aria-controls="primary-menu" aria-expanded="false"> <i class="bx bx-menu"> </i> </button>
    <div class="primary-menu-wrap">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary_menu',
                'menu_id'        => 'primary-menu',
            )
        );
        ?>
    </div><!-- .primary-menu-wrap -->
</nav><!-- #site-navigation -->

<?php
/**
 * hook: ogma_blog_after_primary_menu
 *
 * @since 1.0.0
 */
do_action( 'ogma_blog_after_primary_menu' );