jQuery( function ( $ ) {
	'use strict';

	var wrapper = '.testimonials__wrapper',
		$styleS1 = $( '.testimonials--s1 ' ).find( wrapper ),
		$styleS2 = $( '.testimonials--s2 ' ).find( wrapper ),
		$styleS3 = $( '.testimonials--s3 ' ).find( wrapper ),
		$styleS4 = $( '.testimonials--s4 ' ).find( wrapper );

	// Style 1
	$styleS1.slick( {
		dots: true,
		slidesToScroll: 1,
		slidesToShow: 1,
		arrows: false,
		adaptiveHeight: true,
	} );

	$styleS1.slick('slickGoTo', 1);

	// Style 2
	$styleS2.slick( {
		dots: true,
		fade: true,
		swipeToSlide: true,
		slidesToScroll: 1,
		slidesToShow: 1,
		arrows: false,
		adaptiveHeight: true,
	} );
	$styleS2.slick('slickGoTo', 1);

	// Style 2
	$styleS3.slick( {
		dots: true,
		fade: true,
		swipeToSlide: true,
		slidesToScroll: 1,
		slidesToShow: 1,
		arrows: false,
		adaptiveHeight: true,
	} );
	$styleS3.slick('slickGoTo', 1);

	// Style 4

	$styleS4.slick( {
		dots: true,
		slidesToScroll: 1,
		slidesToShow: 1,
		arrows: false,
		autoplay: false,
		autoplaySpeed: 1000,
		adaptiveHeight: true,
	} );
	$styleS4.slick('slickGoTo', 1);

	$( '.testimonials--s4' ).on( 'beforeChange', function () {

		$( '.testimonials--s4 .slick-dots' ).hide();
	} );
	$( '.testimonials--s4' ).on( 'setPosition', function () {
		var dot_height = $( '.testimonials--s4 .slick-current .testimonial__text' ).height();
		$( '.testimonials--s4 .slick-dots' ).css( {'top': dot_height + 83} ).fadeIn( 150 );
	} );

} );