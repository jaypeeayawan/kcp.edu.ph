jQuery( function ( $ ) {
	'use strict';

	$( '#edu_countdown' ).each( function ( item ) {
		var $this = $( this );

		$this.countdown( {
			until: new Date(
				$this.data( 'month' ) + ' ' +
				$this.data( 'day' ) + ', ' +
				$this.data( 'year' ) + ' ' +
				$this.data( 'hour' ) + ': ' +
				$this.data( 'minus' ) + ': ' +
				$this.data( 'sec' )
			)
		} );
	} );
} );
