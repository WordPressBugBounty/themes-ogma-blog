<?php
/**
 * Customizer Tabs Control.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Tabs' ) ) :

    /**
     * Tab control.
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Tabs extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-tabs';

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

            $this->json['value']    = $this->value();
            $this->json['choices']  = $this->choices;

            $selected_fields = array();

            foreach ( $this->choices as $key => $value ) {
                $selected_fields = array_merge( $selected_fields, $value['fields'] );
            }
            
            $this->json['fields'] = $selected_fields;
            
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
         */
        protected function content_template() {
    ?>
            <div class="section-tab-wrap">
                <ul>
                    <# for ( key in data.choices ) { #>
                        <li class="section-tab-button<# if ( key === data.value ) { #> active<# } #>" data-tab="{{ key }}">{{ data.choices[ key ].title }}</li>
                    <# } #>
                </ul>
            </div><!-- .section-tab-wrap -->
    <?php
        }

    }

endif;