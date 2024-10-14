<?php
/**
 * Partial template to display header ads.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_header_ads_image = ogma_blog_get_customizer_option_value( 'ogma_blog_header_ads_image' );

if ( empty( $ogma_blog_header_ads_image ) || 0 == $ogma_blog_header_ads_image ) {
    return;
}

$ogma_blog_header_ads_image_link = ogma_blog_get_customizer_option_value( 'ogma_blog_header_ads_image_link' );
$ads_image_src = wp_get_attachment_image( $ogma_blog_header_ads_image, 'full' );
?>

<div class="ogma-blog-header-ads-wrap">
    <div class="ogma-blog-container">
        <a href="<?php echo esc_url( $ogma_blog_header_ads_image_link ); ?>">
            <?php echo wp_kses_post( $ads_image_src ); ?>
        </a>
    </div>
</div><!-- .ogma-blog-header-ads-wrap -->