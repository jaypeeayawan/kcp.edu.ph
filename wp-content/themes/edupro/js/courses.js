
jQuery( function ( $ ) {
	'use strict';

	/**
	 * Ajax for achive courses page.
	 */
	var _ = $( '.courses__item' );

	function getCourses( e ) {
		e.preventDefault();

		var num = $( '.current' ).text(),
			sortby = $( '.orderby_current' ).attr( 'data' ),
			layout = $( '.layout_current' ).attr( 'data' ),
			postPerpage = $( '.items_per_page' ).val(),
			type = $( '.type_current' ).children().attr( 'data' ),
			cat = 'all',
			currentCat = $( '.cat_current' ),
			link,
			$this = $( this );

		cat = currentCat.data( 'slug' );

		if ( $this.hasClass( 'items_per_page' ) ) {
			num = 1;
		}

		var href = $this.attr( 'href' );
		if ( href ) {
			if ( href.match( /(paged=\d+)/g ) ) {
				link = href.match( /(paged=\d+)/g )[0].split( '=' )[1];
			}
			else if ( href.match( /(page\/\d)/g ) ) {
				link = href.match( /(page\/\d+)/g )[0].split( '/' )[1];
			}

			num = null === link ? 1 : link;
		}

		var $siteMain = $( '.site-main' );
		if ( $this.hasClass( 'content-list' ) ) {
			$this.parent().find( '.layout_current' ).removeClass( 'layout_current' );
			$this.addClass( 'layout_current' );
			layout = 'list';
		}
		if ( $this.hasClass( 'content-grid' ) ) {
			$this.parent().find( '.layout_current' ).removeClass( 'layout_current' );
			$this.addClass( 'layout_current' );
			layout = '';
		}

		if ( $this.hasClass( 'content-counter' ) ) {
			$this.parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$this.addClass( 'orderby_current' );
			sortby = 'trendding';
		}
		if ( $this.hasClass( 'content-rating' ) ) {
			$this.parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$this.addClass( 'orderby_current' );
			sortby = 'rating';
		}
		if ( $this.hasClass( 'content-new' ) ) {
			$this.parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$this.addClass( 'orderby_current' );
			sortby = '';
		}
		if ( $this.hasClass( 'cat-item' ) ) {
			$this.parent().find( '.cat_current' ).removeClass( 'cat_current' );
			$this.addClass( 'cat_current' );

			cat = $this.data( 'slug' );
			num = 1;
		}

		if ( $this.hasClass( 'type-item' ) ) {
			$this.parent().find( '.type_current' ).removeClass( 'type_current' );
			$this.addClass( 'type_current' );
			type = $this.children().attr( 'data' );
			num = 1;
		}

		_.addClass( 'spinner' );
		$.get(
			EduPro.ajaxUrl,
			{
				action: 'get_courses',
				_wpnonce: EduPro.nonce_course,
				style: layout,
				posts_per_page: postPerpage,
				sort: sortby,
				paged: num,
				category: cat,
				type: type,
			},
			function ( response ) {
				_.removeClass( 'spinner' );
				_.hide();
				_.html( response );
				_.fadeIn( 500 );

				if ( $( '.content-grid' ).hasClass( 'layout_current' ) ) {
					$siteMain.removeClass( 'list-main' );
					$siteMain.addClass( 'grid-main' );
				}else{
					$siteMain.addClass( 'list-main' );
					$siteMain.removeClass( 'grid-main' );
				}

				_.removeClass( 'list' );
				_.removeClass( 'grid' );
				_.addClass( $siteMain.find( '.layout_current' ).attr( 'data' ) );

				var offset = 0;
				offset = offset + ( $( '#wpadminbar' ).length ? $( '#wpadminbar' ).height() : 0 );
				offset = offset + ( $( '.site-header' ).length ? $( '.site-header' ).height() : 0 );
				offset = offset + ( $( '.topbar' ).length ? $( '.topbar' ).height() : 0 );
				offset = offset + ( $( '.page__banner-top' ).length ? $( '.page__banner-top' ).height() : 0 );

				$( 'body, html' ).animate( {
					scrollTop: offset - 100
				}, 1000 );
			}
		);
	}

	$( '.post-type-archive-sfwd-courses .items_per_page' ).on( 'change', getCourses );
	$( '.tax-course_category .items_per_page' ).on( 'change', getCourses );

	var str = '.content-list, .content-grid, .content-counter, .content-rating, .page-numbers, .content-new, .widget__filter-courses .cat-item, .type-item';
	$( '.post-type-archive-sfwd-courses' ).on( 'click', str, getCourses );
	$( '.tax-course_category' ).on( 'click', str, getCourses );

	/**
	 * Ajax for achive event page.
	 */
	var ev = $( '.events__item' );

	function getEvents( e ) {
		e.preventDefault();
		var num = $( '.current' ).text(),
			sortby = $( '.orderby_current' ).attr( 'data' ),
			layout = $( '.layout_current' ).attr( 'data' ),
			postPerpage = $( '.items_per_page' ).val(),
			link;


		if ( $( this ).hasClass( 'items_per_page' ) ) {
			num = 1;
		}

		if ( $( this ).attr( 'href' ) ) {
			if ( $( this ).attr( 'href' ).match( /(paged=\d)/g ) ) {
				link = $( this ).attr( 'href' ).match( /(paged=\d+)/g )[0].split( '=' )[1];
			}
			else if ( $( this ).attr( 'href' ).match( /(page\/\d)/g ) ) {
				link = $( this ).attr( 'href' ).match( /(page\/\d+)/g )[0].split( '/' )[1];
			}

			num = null === link ? 1 : link;
		}

		var $siteMain = $( '.site-main' );

		if ( $( this ).hasClass( 'content-list' ) ) {
			$( this ).parent().find( '.layout_current' ).removeClass( 'layout_current' );
			$( this ).addClass( 'layout_current' );
			layout = '';
		}
		if ( $( this ).hasClass( 'content-grid' ) ) {
			$( this ).parent().find( '.layout_current' ).removeClass( 'layout_current' );
			$( this ).addClass( 'layout_current' );
			layout = 'grid';
		}

		if ( $( this ).hasClass( 'content-happening' ) ) {
			$( this ).parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$( this ).addClass( 'orderby_current' );
			sortby = 'happening';
		}
		if ( $( this ).hasClass( 'content-upcoming' ) ) {
			$( this ).parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$( this ).addClass( 'orderby_current' );
			sortby = 'upcoming';
		}
		if ( $( this ).hasClass( 'content-all' ) ) {
			$( this ).parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$( this ).addClass( 'orderby_current' );
			sortby = '';
		}
		if ( $( this ).hasClass( 'content-expired' ) ) {
			$( this ).parent().find( '.orderby_current' ).removeClass( 'orderby_current' );
			$( this ).addClass( 'orderby_current' );
			sortby = 'expired';
		}

		ev.addClass( 'spinner' );
		$.get(
			EduPro.ajaxUrl,
			{
				action: 'get_events',
				_wpnonce: EduPro.nonce_event,
				style: layout,
				posts_per_page: postPerpage,
				sort: sortby,
				paged: num,
			},
			function ( response ) {
				ev.removeClass( 'spinner' );
				ev.hide();
				ev.html( response );
				ev.fadeIn( 500 );
				if ( $( '.content-grid' ).hasClass( 'layout_current' ) ) {
					$siteMain.removeClass( 'list-main' );
					$siteMain.addClass( 'grid-main' );
				}else{
					$siteMain.addClass( 'list-main' );
					$siteMain.removeClass( 'grid-main' );
				}
			}
		);
	}

	$( '.post-type-archive-event .items_per_page' ).on( 'change', getEvents );
	$( '.tax-event_category .items_per_page' ).on( 'change', getEvents );
	var str_even = '.content-list, .content-grid, .content-happening, .content-upcoming, .content-all, .page-numbers, .content-expired';
	$( '.post-type-archive-event' ).on( 'click', str_even, getEvents );
	$( '.tax-event_category' ).on( 'click', str_even, getEvents );

	/* Video */
	$( '.single__video-thumblist' ).slick( {
		autoPlay: true,
		dots: false,
		arrows: true,
		vertical: true,
		slidesToShow: 3,
		prevArrow: '<div><i class="fa fa-angle-double-up"></i></div>',
		nextArrow: '<div><i class="fa fa-angle-double-down"></i></div>'
	} );

	if ( $( '.single__video-list' ).length > 0 ) {
		var src_first = $( '.single__video-list:first-child' ).find( 'iframe' ).attr( 'src' );
		$( '#player' ).find( 'iframe' ).attr( 'src', src_first );
	}
	$( '.single__video-list .topic__title a' ).on( 'click', function ( e ) {
		e.preventDefault();
		var text_link = $( this ).parents( '.thumb-video' ).find( 'iframe' ).attr( 'src' );
		$( '#player' ).find( 'iframe' ).attr( 'src', text_link );
	} );

	/* Comment Rating */
	$( '.comment-list ul[data-rating="0.0"]' ).hide();

})
