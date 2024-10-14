<?php
/**
 * Customizer Redirect Control.
 * 
 * @package Ogma Blog
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Redirect' ) ) :

    /**
     * Redirect control.
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Redirect extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-redirect';

        /**
         * Refresh the parameters passed to the JavaScript via JSON.
         *
         * @see WP_Customize_Control::to_json()
         * @since 1.0.0
         */
        public function to_json() {
            parent::to_json();

            $this->json['value']    = $this->value();
            $this->json['choices']  = $this->choices;
            $this->json['id']       = $this->id;

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
                <div class="ogma-blog-redirect-wrapper">
                    <div class="redirect-title-wrap">
                        <# if ( data.label ) { #>
                            <span class="redirect-title">{{{ data.label }}}</span>
                        <# } #>
                        <# if ( data.description ) { #>
                            <span class="description customize-control-description redirect-description">{{{ data.description }}}</span>
                        <# } #>
                    </div><!-- .redirect-title-wrap -->

                    <# if ( data.choices ) { #>
                        <div class="redirect-items">
                            <# for ( key in data.choices ) { #>
                                <li class="redirect-item" data-type="{{ data.choices[ key ].type }}" data-id="{{ data.choices[ key ].type_id }}">
                                    {{ data.choices[ key ].type_label }}
                                    <span class="redirect-item-icon"><span class="dashicon dashicons dashicons-arrow-right-alt2"></span></span>
                                </li>
                            <# } #>
                        </div><!-- .redirect-items -->
                    <# } #>
                </div><!-- .ogma-blog-redirect-wrapper -->
            <?php
        }

    }

endif;