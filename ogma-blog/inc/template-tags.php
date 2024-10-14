<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ogma Blog
 */

if ( ! function_exists( 'ogma_blog_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ogma_blog_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( ogma_blog_get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( ogma_blog_get_the_modified_date() )
		);

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$ogma_blog_posts_date_style = ogma_blog_get_customizer_option_value( 'ogma_blog_posts_date_style' );
		if ( 'modify' === $ogma_blog_posts_date_style ) {
			$date_schema = ogma_blog_get_schema_markup( 'modified_date' );
		} else {
			$date_schema = ogma_blog_get_schema_markup( 'publish_date' );
		}

		echo '<span class="posted-on '. esc_attr( $ogma_blog_posts_date_style ) .'" '. $date_schema .'>' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

endif;

if ( ! function_exists( 'ogma_blog_get_the_date' ) ) :

	/**
	 * get the post published date according to the theme option
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_get_the_date() {
		$ogma_blog_posts_date_format = ogma_blog_get_customizer_option_value( 'ogma_blog_posts_date_format' );
		if ( 'format_one' === $ogma_blog_posts_date_format ) {
			$post_date = human_time_diff( get_the_time('U'), current_time('timestamp') ).' '.__( 'ago', 'ogma-blog' );
		} else {
			$post_date = get_the_date();
		}

		return apply_filters( 'ogma_blog_get_the_date_format_published_date', $post_date );
	}

endif;

if ( ! function_exists( 'ogma_blog_get_the_modified_date' ) ) :

	/**
	 * get the post modified date according to the theme option
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_get_the_modified_date() {
		$ogma_blog_posts_date_format = ogma_blog_get_customizer_option_value( 'ogma_blog_posts_date_format' );
		if ( 'format_one' === $ogma_blog_posts_date_format ) {
			$post_date = human_time_diff( get_the_modified_time('U'), current_time('timestamp') ).' '.__( 'ago', 'ogma-blog' );
		} else {
			$post_date = get_the_modified_date();
		}

		return apply_filters( 'ogma_blog_get_the_date_format_modified_date', $post_date );
	}

endif;

if ( ! function_exists( 'ogma_blog_posted_by' ) ) :

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ogma_blog_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

endif;

if ( ! function_exists( 'ogma_blog_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ogma_blog_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ogma-blog' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ogma-blog' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ogma-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;

if ( ! function_exists( 'ogma_blog_post_thumbnail' ) ) :

	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ogma_blog_post_thumbnail( $size = 'full' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$ogma_blog_posts_thumbnail_hover_effect = ogma_blog_get_customizer_option_value( 'ogma_blog_posts_thumbnail_hover_effect' );

		echo '<figure class="post-image '. esc_attr( $ogma_blog_posts_thumbnail_hover_effect ) .'">';

		$image_attr = array();

		$lazy_load = apply_filters( 'ogma_blog_post_thumbnail_lazy_load', true );

		if ( false === $lazy_load ) {
			$image_attr['loading'] = false;
		}

		$image_attr['alt'] = the_title_attribute( array( 'echo' => false ) );



		if ( is_singular() ) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $size, $image_attr ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( $size, $image_attr ); ?>
			</a>

		<?php
		endif; // End is_singular().

		echo '</figure>';
	}

endif;

if ( ! function_exists( 'wp_body_open' ) ) :

	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}

endif;

if ( ! function_exists( 'ogma_blog_the_post_categories_list' ) ) :

	/**
	 * function to display the lists of post categories
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_the_post_categories_list( $post_id, $list_count ) {
		$categories_list = wp_get_post_categories( $post_id, array( 'number' => absint( $list_count ) ) );
		if ( empty( $categories_list ) ) {
			return;
		}
		echo '<ul class="post-cats-list">';
		foreach ( $categories_list as $category ) {
			echo '<li class="post-cat-item cat-'. esc_attr( $category ) .'"><a href="'. esc_url( get_category_link( $category ) ) .'" rel="category tag">'. esc_html( get_cat_name( $category ) ) .'</a></li>';
		}
		echo '</ul><!-- .post-cats-list -->';
	}

endif;

if ( ! function_exists( 'ogma_blog_post_comment' ) ) :

	/**
	 * Display comment count for homepage posts
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_post_comment() {

		echo '<span class="post-comment">'. absint( get_comments_number() ) .'</span>';
	}

endif;

if ( ! function_exists( 'ogma_blog_the_estimated_reading_time' ) ) :

	/**
	 * function to display the estimated reading time for post content.
	 * 
	 * @since 1.0.0
	 */
	function ogma_blog_the_estimated_reading_time( $post_id = NULL ) {

		$ogma_blog_posts_reading_time_enable = ogma_blog_get_customizer_option_value( 'ogma_blog_posts_reading_time_enable' );

		if ( false === $ogma_blog_posts_reading_time_enable ) {
			return;
		}

		$post_words_per_minute = apply_filters( 'ogma_blog_post_words_per_minute', 150 );

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$get_post_content = apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) );

		$content_decode = html_entity_decode( $get_post_content );

		$do_shortcode_decode = do_shortcode( $content_decode );

		$all_tags_strips = wp_strip_all_tags( $do_shortcode_decode );

		$get_post_content_words = str_word_count( wp_strip_all_tags( do_shortcode( html_entity_decode( $get_post_content ) ) ) );
		$read_per_minute = floor( $get_post_content_words / $post_words_per_minute );

		if ( $read_per_minute < 1 || $read_per_minute == 1 ) {
			$read_per_minute = 1;
			$minute_label = __( 'min read', 'ogma-blog' );
		} else {
			$minute_label = __( 'mins read', 'ogma-blog' );
		}

		$output_string = sprintf( __( '%1$s %2$s', 'ogma-blog' ), $read_per_minute, $minute_label );
		echo '<span class="post-min-read">'. esc_html( $output_string ) .'</span><!-- .post-min-read -->';
		
	}

endif;