/**
 * Follows the wordpress.org keyboard accessibility rules.
 */
jQuery(document).ready(function($) {

    "use strict";
    var KEYCODE_TAB = 9;

    /**
     * On click modal content toggler.
     */
    $( ".ogma-blog-modal-toggler" ).on( "click", function() {
        var _this = $(this),
        popupContent = _this.data("popup-content"),
        focusToTrapIn = document.querySelector( ".ogma-blog-modal-popup-content.isActive" );
        if( !focusToTrapIn ) return;
        if( focusToTrapIn.length != 0 ) {
            var focusable = focusElements( focusToTrapIn ),
            initialFocusable = focusable[0],
            finalFocusable = focusable[focusable.length - 1];
            $( initialFocusable ).focus();
            $(document).on('keydown', function(e) {
                ogma_blog_accessibility_focus_trap( initialFocusable, finalFocusable, e );
            });
        }
    });

    /**
     * On click modal close button
     * stay focus on popup toggler
     */
    $( ".ogma-blog-modal-close" ).on( "click", function() {
        var toFocus = $(this).data( "focus" );
        $( toFocus ).focus();
    });

    /**
     * Focus trap inside the popup content.
     */
    function ogma_blog_accessibility_focus_trap( initialFocusable, finalFocusable, e ) {
        if ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB ) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === initialFocusable) {
                    finalFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === finalFocusable ) {
                    initialFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    }

    /**
     * Get all focusable elements inside the element
     */
    function focusElements( focusToTrapIn ) {
        return focusToTrapIn.querySelectorAll( 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    }

});