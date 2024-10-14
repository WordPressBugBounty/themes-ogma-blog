<?php
/**
 * Template part for breadcrumb.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$ogma_blog_site_breadcrumb_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_site_breadcrumb_enable' );

if ( false === $ogma_blog_site_breadcrumb_enable ) {
    return;
}

$ogma_blog_site_breadcrumb_types = ogma_blog_get_customizer_option_value( 'ogma_blog_site_breadcrumb_types' );

if ( ! function_exists( 'ogma_blog_breadcrumb_trail' ) ) :

    /**
     *  function to manage the breadcrumb trail
     * 
     * @since 1.0.0
     */
    function ogma_blog_breadcrumb_trail() {

        $ogma_blog_body_classes = get_body_class();
        if ( in_array( 'woocommerce', $ogma_blog_body_classes ) ) {
            woocommerce_breadcrumb();
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ogma-blog-class-breadcrumb.php';
        }

        $ogma_blog_breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );

        breadcrumb_trail( $ogma_blog_breadcrumb_args );
    }
    
endif;

?>
<div class="ogma-blog-breadcrumb-wrapper">
    <div class="ogma-blog-container">
        <?php
            switch ( $ogma_blog_site_breadcrumb_types ) {
                case 'navxt':
                    if ( function_exists( 'bcn_display' ) ) {
                        echo '<nav id="breadcrumb" class="ogma-blog-breadcrumb">';
                            bcn_display();
                        echo '</nav>';
                    }
                    break;

                case 'yoast':
                    if ( function_exists( 'yoast_breadcrumb' ) && true === WPSEO_Options::get( 'breadcrumbs-enable', false ) ) {
                        yoast_breadcrumb( '<nav id="breadcrumb" class="ogma-blog-breadcrumb">', '</nav>' );
                    }
                    break;

                case 'rankmath':
                    if ( function_exists( 'rank_math_the_breadcrumbs' ) && RankMath\Helper::get_settings( 'general.breadcrumbs' ) ) {
                        rank_math_the_breadcrumbs();
                    }
                    break;
                
                default:
                    ogma_blog_breadcrumb_trail();
                    break;
            }
        ?>
    </div><!-- .ogma-blog-container -->
</div><!-- .ogma-blog-breadcrumb-wrapper -->