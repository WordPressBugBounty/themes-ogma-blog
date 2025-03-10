<?php
/**
 * Customizer Sortable Control.
 * 
 * @package Ogma Blog
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Ogma_Blog_Control_Sortable' ) ) {

    /**
     * Sortable control
     *
     * @since 1.0.0
     */
    class Ogma_Blog_Control_Sortable extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'ogma-blog-sortable';

        /**
         * Refresh the parameters passed to the JavaScript via JSON.
         *
         * @see WP_Customize_Control::to_json()
         * @since 1.0.0
         */
        public function to_json() {
            parent::to_json();

            $this->json['default'] = $this->setting->default;
            if ( isset( $this->default ) ) {
                $this->json['default'] = $this->default;
            }
            $this->json['value']       = maybe_unserialize( $this->value() );
            $this->json['choices']     = $this->choices;
            $this->json['link']        = $this->get_link();
            $this->json['id']          = $this->id;

            $this->json['inputAttrs'] = '';
            foreach ( $this->input_attrs as $attr => $value ) {
                $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
            }

            $this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );

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
            <label class='ogma-blog-sortable'>
                <span class="customize-control-title">
                    {{{ data.label }}}
                </span>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>

                <ul class="sortable">
                    <# _.each( data.value, function( choiceID ) { #>
                        <li {{{ data.inputAttrs }}} class='ogma-blog-sortable-item' data-value='{{ choiceID }}'>
                            <i class='dashicons dashicons-menu'></i>
                            <i class="dashicons dashicons-visibility visibility"></i>
                            {{{ data.choices[ choiceID ] }}}
                        </li>
                    <# }); #>
                    <# _.each( data.choices, function( choiceLabel, choiceID ) { #>
                        <# if ( -1 === data.value.indexOf( choiceID ) ) { #>
                            <li {{{ data.inputAttrs }}} class='ogma-blog-sortable-item invisible' data-value='{{ choiceID }}'>
                                <i class='dashicons dashicons-menu'></i>
                                <i class="dashicons dashicons-hidden visibility"></i>
                                {{{ data.choices[ choiceID ] }}}
                            </li>
                        <# } #>
                    <# }); #>
                </ul>
            </label>
    <?php
        }

    }

}