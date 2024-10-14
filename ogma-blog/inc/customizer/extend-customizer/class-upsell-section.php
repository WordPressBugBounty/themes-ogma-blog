<?php
/**
 * Extend default customizer for upsell section.
 *
 * @package Ogma Blog
 *
 * @see     WP_Customize_Section
 * @access  public
 */

if ( class_exists( 'WP_Customize_Section' ) ) :

    /**
     * Upsell customizer section.
     *
     * @since  1.0.6
     * @access public
     */
    class ogma_blog_Upsell_Section extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'ogma-blog-upsell';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $button_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $button_url = '';

        

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            
            $json['button_text'] = $this->button_text;
            $json['button_url']  = esc_url( $this->button_url );
            

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() {
    ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}

                    <# if ( data.button_text && data.button_url ) { #>
                        <a href="{{ data.button_url }}" class="button button-secondary alignright" target="_blank">{{ data.button_text }}</a>
                    <# } #>
                </h3>
            </li>
    <?php
        }

    }

endif;