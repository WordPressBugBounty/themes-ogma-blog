<?php
/**
 * Widget for display latest posts.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Ogma_Blog_Latest_Posts extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname'                     => 'ogma-blog-widget ogma_blog_latest_posts',
            'description'                   => __( 'Display latest posts in various layouts.', 'ogma-blog' ),
            'customize_selective_refresh'   => true,
        );
        parent::__construct( 'ogma_blog_latest_posts', __( 'OGMA BLOG: Latest Posts', 'ogma-blog' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(
            'widget_title' => array(
                'widget_field_name'         => 'widget_title',
                'widget_field_title'        => __( 'Widget Title', 'ogma-blog' ),
                'widget_field_default'      => __( 'Latest Posts', 'ogma-blog' ),
                'widget_field_type'         => 'title',
                'widget_field_placeholder'  => __( 'Widget Title', 'ogma-blog' )
            ),
            'posts_query_filter' => array(
                'widget_field_name'     => 'posts_query_filter',
                'widget_field_title'    => __( 'Posts Query Filter', 'ogma-blog' ),
                'widget_field_default'  => 'latest',
                'widget_field_type'     => 'select',
                'widget_field_options'  => ogma_blog_posts_query_filter_choices()
            ),
            'posts_count' => array(
                'widget_field_name'     => 'posts_count',
                'widget_field_title'    => __( 'No. of posts', 'ogma-blog' ),
                'widget_field_default'  => 5,
                'widget_field_type'     => 'number',
                'input_attr'            => array(
                    'min'   => 1,
                    'max'   => 10,
                    'step'  => 1
                )
            ),
            
        );

        return $fields;

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if ( empty( $instance ) ) {
            return;
        }

        $widget_title = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];
        $posts_query_filter = empty( $instance['posts_query_filter'] ) ? 'latest' : $instance['posts_query_filter'];
        $posts_count = empty( $instance['posts_count'] ) ? 5 : $instance['posts_count'];

        $latest_args = array(
            'posts_per_page'        => absint( $posts_count ),
            'ignore_sticky_posts'   => true
        );

        if ( 'random' === $posts_query_filter ) {
            $latest_args['orderby'] = 'rand';
        }

        $latest_query = new WP_Query( $latest_args );

        $widget_custom_classes[] = 'latest-posts-wrapper';

        echo $before_widget;
    ?>
        <div class="ogma-blog-aside <?php echo esc_attr( implode( ' ', $widget_custom_classes ) ); ?>">
            <?php
                if ( ! empty( $widget_title ) ) {
                    echo $before_title . wp_kses_post( $widget_title ) . $after_title;
                }
            ?>
            <div class="posts-wrapper latest-posts">
                <?php
                    $total_posts_count = $latest_query->post_count;
                    if ( $latest_query->have_posts() ) :

                        while ( $latest_query->have_posts() ) :
                            $latest_query->the_post();
                            $current_post = $latest_query->current_post;
                            if ( has_post_thumbnail() ) {
                                $post_img   = 'has-image';
                            } else {
                                $post_img   = 'no-image';
                            }

                            if ( 0 === $current_post ) {
                                echo '<div class="posts-main-wrapper">';
                                $thumb_size = 'ogma-blog-block-medium';
                            }

                            if ( 1 === $current_post ) {
                                echo '<div class="posts-column-wrapper">';
                                $thumb_size = 'thumbnail';
                            }
                ?>
                            <div class="post-wrap <?php echo esc_attr( $post_img ); ?>">

                                <div class="post-thumbnail-wrap">
                                    <?php ogma_blog_post_thumbnail( $thumb_size ); ?>
                                    <?php ogma_blog_the_estimated_reading_time(); ?>
                                </div><!-- .post-thumbnail-wrap -->

                                <div class="post-content-wrap">
                                    <div class="post-cats-wrap">
                                        <?php ogma_blog_the_post_categories_list( get_the_ID(), 1 ); ?>
                                    </div><!-- .post-cats-wrap -->
                                    <div class="post-title-wrap">
                                        <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
                                    </div><!-- .post-title-wrap -->
                                    <div class="post-meta-wrap">
                                        <?php
                                            ogma_blog_posted_on();
                                        ?>
                                    </div><!-- .post-meta-wrap -->
                                </div> <!-- post-content-wrap -->
                                
                            </div><!-- .post-wrap -->
                <?php
                            if ( 0 === $current_post ) {
                                echo '</div><!-- .posts-main-wrapper -->';
                            }
                            if ( $total_posts_count === $current_post + 1 && $total_posts_count > 1 ) {
                                echo '</div><!-- .posts-column-wrapper -->';
                            }
                        endwhile;

                    endif;
                ?>
            </div><!-- .posts-wrapper -->
        </div><!-- .ogma-blog-aside -->

    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    ogma_blog_widget_updated_field_value()      defined in ogma-blog-widgets-helper.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$widget_field_name] = ogma_blog_widget_updated_field_value( $widget_field, $new_instance[$widget_field_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    ogma_blog_show_widget_field()        defined in ogma-blog-widgets-helper.php
     */
    public function form( $instance ) {

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );

            if ( empty( $instance ) && isset( $widget_field_default ) ) {
                $widget_field_value = $widget_field_default;
            } elseif ( empty( $instance ) ) {
                $widget_field_value = '';
            } else {
                $widget_field_value = $instance[$widget_field_name];
            }
            ogma_blog_show_widget_field( $this, $widget_field, $widget_field_value );
        }
    }

} //end Class Ogma_Blog_Latest_Posts