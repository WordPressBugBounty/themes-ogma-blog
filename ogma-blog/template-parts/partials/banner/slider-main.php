<?php
/**
 * Partial template for main banner slider.
 * 
 * @package Ogma Blog
 */

$slider_args = $args['slider_args'];
?>

<div class="slider-wrapper cS-hidden" data-auto="true" data-control="true">
    <?php
        $slider_query = new WP_Query( $slider_args );
        if ( $slider_query->have_posts() ) {
            while ( $slider_query->have_posts() ) {
                $slider_query->the_post();
                if ( has_post_thumbnail() ) {
                    $slide_img      = 'has-image';
                } else {
                    $slide_img      = 'no-image';
                }
    ?>
                <div class="single-slide-wrap <?php echo esc_attr( $slide_img ); ?>">
                    <div class="post-thumbnail-wrap">
                        <?php ogma_blog_post_thumbnail( 'full' ); ?>
                    </div>
                    <div class="slide-content-wrap">
                        <div class="post-cats-read-wrap">
                            <div class="post-cats-wrap">
                                <?php ogma_blog_the_post_categories_list( get_the_ID(), 3 ); ?>
                            </div><!-- .cat-wrap -->
                        </div>
                        <div class="slide-title-wrap">
                            <h2 class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div><!-- .slide-title-wrap -->
                        <div class="post-excerpt">
                            <?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 30 ) ); ?>
                        </div><!-- .post-excerpt -->
                        <div class="post-meta-wrap">
                            <?php
                                ogma_blog_posted_by();
                                ogma_blog_posted_on();
                            ?>
                        </div><!-- .slide-post-meta-wrap -->
                    </div><!-- .slide-content-wrap -->
                </div><!-- .single-slide-wrap -->
    <?php
            }
        }
    ?>
</div><!-- .slider-wrapper -->