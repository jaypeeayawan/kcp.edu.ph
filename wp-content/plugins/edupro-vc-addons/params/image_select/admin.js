jQuery( function ( $ ) {
	'use strict';
	$( document ).on( 'click', '.fitwp-image-select', function () {
		var $this = $( this );

		$this.parent().siblings( '.wpb_vc_param_value' ).val( $this.data( 'value' ) );
		$this.addClass( 'fitwp-image-select--active' )
		     .siblings().removeClass( 'fitwp-image-select--active' );
	} );
} );