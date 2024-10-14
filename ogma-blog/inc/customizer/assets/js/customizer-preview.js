/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// typography for body
	wp.customize( 'body_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-weight', to );
		});
	});
	wp.customize( 'body_font_style', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-style', to );
		});
	});
	wp.customize( 'body_font_transform', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'text-transform', to );
		});
	});
	wp.customize( 'body_font_decoration', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'text-decoration', to );
		});
	});

	// typography for heading
	wp.customize( 'heading_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-weight', to );
		});
	});
	wp.customize( 'heading_font_style', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-style', to );
		});
	});
	wp.customize( 'heading_font_transform', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'text-transform', to );
		});
	});
	wp.customize( 'heading_font_decoration', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'text-decoration', to );
		});
	});

}( jQuery ) );
