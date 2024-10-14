<?php
/**
 * file to handle the main banner.
 * 
 * @package Ogma Blog
 */

$ogma_blog_banner_slider_order_by = ogma_blog_get_customizer_option_value( 'ogma_blog_banner_slider_order_by' );
$order_by = explode( '-', $ogma_blog_banner_slider_order_by );

$ogma_blog_banner_args['slider_args'] = array(
    'orderby'               => esc_attr( $order_by[0] ),
    'order'                 => esc_attr( $order_by[1] ),
    'posts_per_page'        => apply_filters( 'ogma_blog_banner_slider_post_count', 5 ),
    'ignore_sticky_posts'   => true
);

$ogma_blog_banner_slider_category = ogma_blog_get_customizer_option_value( 'ogma_blog_banner_slider_category' );

if ( 'all' !== $ogma_blog_banner_slider_category ) {
    $ogma_blog_banner_args['slider_args']['category_name'] = $ogma_blog_banner_slider_category;
}

$ogma_blog_banner_slider_date_filter = ogma_blog_get_customizer_option_value( 'ogma_blog_banner_slider_date_filter' );
if ( 'all' !== $ogma_blog_banner_slider_date_filter ) {
    $banner_slider_date_args = ogma_blog_get_date_format_args( $ogma_blog_banner_slider_date_filter );
    $ogma_blog_banner_args['slider_args']['date_query'] = $banner_slider_date_args;
}

$ogma_blog_banner_bg_type = ogma_blog_get_customizer_option_value( 'ogma_blog_banner_bg_type' );

$ogma_blog_banner_custom_classes[] = 'has-banner-'.esc_attr( $ogma_blog_banner_bg_type );

echo '<div class="ogma-blog-banner-wrapper '. esc_attr( implode( ' ' , $ogma_blog_banner_custom_classes ) ) .'">';
echo '<div class="ogma-blog-container">';
get_template_part( 'template-parts/partials/banner/slider', 'main', $ogma_blog_banner_args );
echo '</div><!-- .ogma-blog-container -->';
echo '</div><!-- .ogma-blog-banner-wrapper -->';
