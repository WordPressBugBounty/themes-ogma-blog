<?php
/**
 * Customizer Repeater Control.
 * 
 * @package Ogma Blog
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Divider' ) ) :

	/**
	 * A text control with validation for CSS units.
	 *
     * @since 1.0.0
	 */
	class Ogma_Blog_Control_Divider extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 * @since 1.0.0
		 */
		public $type = 'ogma-blog-divider';

		/**
		 * The control caption.
		 *
		 * @access public
		 * @var string
		 * @since 1.0.0
		 */
		public $caption = '';

		/**
		 * The control separator.
		 *
		 * @access public
		 * @var string
		 * @since 1.0.0
		 */
		public $separator = true;

		/**
         * Refresh the parameters passed to the JavaScript via JSON.
         *
         * @see WP_Customize_Control::to_json()
         * @since 1.0.0
         */
		public function to_json() {
			parent::to_json();
			$this->json['label']       = esc_html( $this->label );
			$this->json['caption']     = $this->caption;
			$this->json['description'] = $this->description;
			$this->json['separator']   = $this->separator;
		}

        /**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 * @since 1.0.0
		 */
		protected function content_template() {
	?>

			<# if ( data.caption ) { #>
				<span class="customize-control-caption">{{{ data.caption }}}</span>
			<# } #>

			<# if ( data.separator ) { #>
				<hr />
			<# } #>

			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>
	<?php
		}
	}

endif;