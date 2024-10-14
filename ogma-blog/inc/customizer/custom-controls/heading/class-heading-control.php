<?php
/**
 * Customizer Heading Control.
 * 
 * @package Ogma Blog
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Heading' ) ) :
    
    /**
     * Heading control.
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Heading extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-heading';

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
            <h4 class="ogma-blog-customizer-heading">{{{ data.label }}}</h4>
            <# if ( data.description ) { #>
            <div class="description">{{{ data.description }}}</div>
            <# } #>
    <?php
        }

    }

endif;