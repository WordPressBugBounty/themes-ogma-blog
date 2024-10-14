/**
 * Custom scripts for Dropdown Categories Control
 *
 * @package Ogma Blog
 */

wp.customize.controlConstructor['ogma-blog-dropdown-categories'] = wp.customize.Control.extend({

	ready: function() {

		'use strict';

		var control = this;

		control.container.on( 'change', 'select', function() {
			control.setting.set( jQuery( this ).val() );
		} );

	}

});