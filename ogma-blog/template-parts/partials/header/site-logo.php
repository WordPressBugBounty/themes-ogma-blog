<?php
/**
 * Partial template to display site logo
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="site-branding" <?php ogma_blog_schema_markup( 'logo' ); ?>>
    <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) :
    ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php
        else :
    ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php
        endif;
        $ogma_blog_description = get_bloginfo( 'description', 'display' );
        if ( $ogma_blog_description || is_customize_preview() ) :
    ?>
        <p class="site-description"><?php echo $ogma_blog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    <?php endif; ?>
</div><!-- .site-branding -->