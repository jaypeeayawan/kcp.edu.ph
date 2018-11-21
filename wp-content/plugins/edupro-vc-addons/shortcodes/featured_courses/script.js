jQuery( function ( $ ) {
	'use strict';

	// Style 1: slider
	$( '.featured-courses--s1 .row' ).slick( {
		slidesToScroll: 1,
		slidesToShow: 4,
		nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
		prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1
				}
			}
		]
	} );

	// Style 2: filter courses
	$( window ).on( 'load', function () {
		var $wrapper = $( '.featured-courses--s2' ),
			$items = $wrapper.find( '.featured-courses__items' );

		$items.isotope( {
			filter: '*',
			itemSelector: '.col-md-3',
			resizable: true,
			resizesContainer: true
		} );

		// Filter items when filter link is clicked
		$wrapper.on( 'click', '.featured-courses__filter li', function ( e ) {
			e.preventDefault();

			var $this = $( this ),
				selector = $this.attr( 'data-filter' );

			$this.addClass( 'featured-courses__filter__active' )
			     .siblings().removeClass( 'featured-courses__filter__active' );

			$items.isotope( {
				filter: selector
			} );
		} );
	} );

	// Style 3: filter courses
	$( window ).on( 'load', function () {
		var $wrapper = $( '.featured-courses--s3' ),
			$items = $wrapper.find( '.featured-courses__items' ),
			$all = $items.find( '.featured-courses__item' );

		$items
			.isotope( {
				filter: '*',
				itemSelector: '.featured-courses__item',
				resizable: true,
				resizesContainer: true
			} )
			.on( 'arrangeComplete', function () {
				$all.removeClass( 'featured-courses__item--last' );
				var $visible = $all.filter( ':visible' ),
					$last = $visible.last(),
					$pre = $visible.eq( - 2 );

				$last.addClass( 'featured-courses__item--last' );
				$pre.addClass( 'featured-courses__item--last' );
			} )
			.trigger( 'arrangeComplete' );

		// Filter items when filter link is clicked
		$wrapper.on( 'click', '.featured-courses__filter li', function ( e ) {
			e.preventDefault();

			var $this = $( this ),
				selector = $this.attr( 'data-filter' );

			$this.addClass( 'featured-courses__filter__active' )
			     .siblings().removeClass( 'featured-courses__filter__active' );

			$items.isotope( {
				filter: selector
			} );
		} );
	} );
} );