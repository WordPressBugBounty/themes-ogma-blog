<?php
/**
 * Partial template for footer widget area.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_footer_main_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_footer_main_enable' );

if ( false === $ogma_blog_footer_main_enable ) {
    return;
}

$widget_area_layout = ogma_blog_get_customizer_option_value( 'ogma_blog_footer_widget_area_layout' );

$footer_main_custom_classes[] = 'footer-widget--'.$widget_area_layout;

if ( ! is_active_sidebar( 'footer-sidebar' ) && ! is_active_sidebar( 'footer-sidebar-2' ) && ! is_active_sidebar( 'footer-sidebar-3' ) && ! is_active_sidebar( 'footer-sidebar-4' ) ) {
    return;
}

?>
<div id="footer-widget-area" class="widget-area <?php echo esc_attr( implode( ' ', $footer_main_custom_classes ) ); ?>">
    <div class="ogma-blog-container">
        <div class="footer-widget-wrapper ogma-blog-grid">
            <?php
                if ( is_active_sidebar( 'footer-sidebar' ) ) {
                    echo '<div class="footer-widget">';
                        dynamic_sidebar( 'footer-sidebar' );
                    echo '</div><!-- .footer-widget -->';
                }

                
                if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                    if ( 'column-one' != $widget_area_layout ) {
                        echo '<div class="footer-widget">';
                            dynamic_sidebar( 'footer-sidebar-2' );
                        echo '</div><!-- .footer-widget -->';
                    }
                }

                if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                    if ( 'column-one' != $widget_area_layout && 'column-two' != $widget_area_layout ) {
                        echo '<div class="footer-widget">';
                            dynamic_sidebar( 'footer-sidebar-3' );
                        echo '</div><!-- .footer-widget -->';
                    }
                }

                if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
                    if ( 'column-four' == $widget_area_layout ) {
                        echo '<div class="footer-widget">';
                            dynamic_sidebar( 'footer-sidebar-4' );
                        echo '</div><!-- .footer-widget -->';
                    }
                }
            ?>
        </div><!-- .footer-widget-wrapper -->
    </div><!-- .ogma-blog-container -->
</div><!-- #footer-widget-area -->