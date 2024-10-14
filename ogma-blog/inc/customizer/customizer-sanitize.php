<?php
/**
 * Customizer Sanitize functions.
 *
 * @package Ogma Blog
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'ogma_blog_sanitize_title' ) ) :

    /**
     * Sanitize textarea value.
     *
     * @param string $input     The string prior to being sanitized.
     * @return string           Sanitize string with wp_kses_post.
     *
     * @since 1.0.0
     *
     */
    function ogma_blog_sanitize_title( $input ) {

        $input = wp_kses_post( $input );

        return $input;

    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_textarea' ) ) :

    /**
     * Sanitize textarea value.
     *
     * @param string $input     The string prior to being sanitized.
     * @return string           Sanitize string with wp_kses_post.
     *
     * @since 1.0.0
     *
     */
    function ogma_blog_sanitize_textarea( $input ) {

        $input = wp_kses_post( $input );

        return $input;

    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     *
     * @since 1.0.0
     */
    function ogma_blog_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_select' ) ) :
    
    /**
     * Sanitize select.
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     *
     * @since 1.0.0
     */
    function ogma_blog_sanitize_select( $input, $setting ) {
        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_number' ) ) :

    /**
     * Sanitize number.
     *
     * @param int $value
     * @return int
     *
     * @since 1.0.0
     */
    function ogma_blog_sanitize_number( $input ) {

        return is_numeric( $input ) ? $input : 0;

    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_image' ) ) :

    /**
     * Sanitize Image
     *
     * @since 1.0.0
     */
    function ogma_blog_sanitize_image( $image, $setting ) {

        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );

        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? esc_url_raw( $image ) : $setting->default );
        
    }

endif;


if ( ! function_exists( 'ogma_blog_sanitize_repeater' ) ) :

    /**
     * Sanitize repeater value
     *
     * @param  json $input Customizer setting input repeater json.
     * @param  object       $setting Setting Object.
     * @return array        Return array.
     *
     * @since 1.0.0
     */
    function ogma_blog_sanitize_repeater( $input, $setting ) {
        $input_decoded = json_decode( $input, true );
            
        if ( !empty( $input_decoded ) ) {
            foreach ( $input_decoded as $boxes => $box ) {
                foreach ( $box as $key => $value ) {
                    if ( $key == 'url' ) {
                        $input_decoded[$boxes][$key] = esc_url_raw( $value );
                    } else {
                        $input_decoded[$boxes][$key] = wp_kses_post( $value );
                    }
                }
            }
            return json_encode( $input_decoded );
        }
        
        return $input;
    }

endif;

if ( ! function_exists( 'ogma_blog_sanitize_sortable' ) ) {

    /**
     * Sanitize the sortable value set within customizer controls.
     *
     * @param number $input   Customizer setting input sortable arguments.
     * @param object $setting Setting object.
     *
     * @return mixed
     * @since 1.0.0
     */
    function ogma_blog_sanitize_sortable( $input, $setting ) {

        // Get list of choices from the control associated with the setting.
        $choices    = $setting->manager->get_control( $setting->id )->choices;
        $input_keys = $input;

        foreach ( (array) $input_keys as $key => $value ) {
            if ( ! array_key_exists( $value, $choices ) ) {
                unset( $input[ $key ] );
            }
        }

        // If the input is a valid key, return it, otherwise, return the default.
        return ( is_array( $input ) ? $input : $setting->default );

    }
    
}