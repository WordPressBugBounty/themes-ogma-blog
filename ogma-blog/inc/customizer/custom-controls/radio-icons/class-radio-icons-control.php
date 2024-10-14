<?php
/**
 * Customizer Radio Icons Control.
 * 
 * @package Ogma Blog
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Radio_Icons' ) ) :
    
    /**
     * Radio Icons control (modified radio).
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Radio_Icons extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-radio-icons';
        
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
            
            $this->json['value']   = $this->value();
            $this->json['link']    = $this->get_link();
            $this->json['id']      = $this->id;
            $this->json['choices'] = $this->choices;
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
         * @since  1.0.0
         */
        protected function content_template() {
    ?>

            <label class="customizer-text">
                <# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
                <# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><# } #>
            </label>
            <div id="input_{{ data.id }}" class="radio-icons">
                <# for ( key in data.choices ) { #>
                    <label>
                        <input class="icon-select" type="radio" value="{{ key }}" name="_customize-icon-select-{{ data.id }}" {{{ data.link }}} <# if ( data.value === key ) { #> checked<# } #> />
                        <span class="icon-select-label"><i class="{{ data.choices[ key ].icon }}" title="{{ data.choices[ key ].title }}"></i></span>
                    </label>
                <# } #>
            </div>
    <?php
        }

    }

endif;