jQuery( function ( $ ) {
	'use strict';

	$( document ).on( 'change', '.fitwp-number-input, .fitwp-number-suffix', function () {
		var $number = $( this ).parent(),
			input = $number.find( '.fitwp-number-input' ).val(),
			unit = $number.find( '.fitwp-number-suffix' ).val();

		$number.find( '.wpb_vc_param_value' ).val( input + unit );
	} );
} );
