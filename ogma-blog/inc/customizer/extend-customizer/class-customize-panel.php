<?php
/**
 * Extend default customizer panel.
 *
 * @package Ogma Blog
 *
 * @see     WP_Customize_Panel
 * @access  public
 */

if ( class_exists( 'WP_Customize_Panel' ) ) {
	
	/**
	 * Class ogma_blog_Customize_Panel
	 *
	 * @since 1.0.0
	 */
	class ogma_blog_Customize_Panel extends WP_Customize_Panel {

		/**
		 * Panel
		 *
		 * @var string
		 */
		public $panel;

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'ogma_blog_panel';

		/**
		 * Get section parameters for JS.
		 *
		 * @return array Exported parameters.
		 */
		public function json() {
			$array                   = wp_array_slice_assoc( (array) $this, array(
				'id',
				'description',
				'priority',
				'type',
				'panel',
			) );
			$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content']        = $this->get_content();
			$array['active']         = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			return $array;
		}
	}

}