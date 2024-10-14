<?php
/**
 * Customizer Range Control.
 * 
 * @package Ogma Blog
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Range' ) ) :

    /**
     * Range control
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Range extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-range';

        /**
         * Refresh the parameters passed to the JavaScript via JSON.
         *
         * @see WP_Customize_Control::to_json()
         * @since 1.0.0
         */
        public function to_json() {

            parent::to_json();

            if ( isset( $this->default ) ) {
                $this->json['default'] = $this->default;
            } else {
                $this->json['default'] = $this->setting->default;
            }
            $this->json['value']       = $this->value();
            $this->json['choices']     = $this->choices;
            $this->json['link']        = $this->get_link();
            $this->json['id']          = $this->id;

            $this->json['inputAttrs'] = '';
            foreach ( $this->input_attrs as $attr => $value ) {
                $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
                if ( $attr == 'unit' ) {
                    $this->json['unit'] =  $value;
                }
            }

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
            <label>
                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
                <div class="control-wrap">
                    <input type="range" {{{ data.inputAttrs }}} value="{{ data.value }}" {{{ data.link }}} data-reset_value="{{ data.default }}" />
                    <input type="number" {{{ data.inputAttrs }}} class="ogma-blog-range-input" value="{{ data.value }}" />
                    <div class="items-wrap">
                        <span class="range-unit">{{{ data.unit }}}</span>
                        <span class="ogma-blog-reset-slider"><span class="dashicons dashicons-image-rotate"></span></span>
                    </div><!-- .items-wrap -->
                </div><!-- .control-wrap -->
            </label>
            <?php
        }
    }

endif;