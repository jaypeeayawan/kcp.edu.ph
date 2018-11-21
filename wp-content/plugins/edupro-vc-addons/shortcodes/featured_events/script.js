jQuery( function ( $ ) {
	'use strict';
	$( '.featured-events--s1 .row' ).slick( {
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
} );