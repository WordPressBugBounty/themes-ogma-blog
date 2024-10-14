<?php
/**
 * Partial template to display header custom button.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_header_custom_button_label = ogma_blog_get_customizer_option_value( 'ogma_blog_header_custom_button_label' );

if ( empty( $ogma_blog_header_custom_button_label ) ) {
    return;
}

$ogma_blog_header_custom_button_link = ogma_blog_get_customizer_option_value( 'ogma_blog_header_custom_button_link' );

?>
<div class="custom-button-wrap ogma-blog-icon-elements">
    <a href="<?php echo esc_url( $ogma_blog_header_custom_button_link ); ?>" target="_blank">
        <span class="custom-button-bell-icon"> <i class="bx bx-bell"></i></span><?php echo esc_html( $ogma_blog_header_custom_button_label ); ?>
    </a>
</div><!-- .cusotm-button-wrap -->