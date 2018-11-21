jQuery( function ( $ ) {
	'use strict';

	var $body = $( 'body' ),
		clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click',
		iOS = false,
		ieMobile = false,
		isMac = false;

	function platformDetect() {
		ieMobile = ! ! navigator.userAgent.match( /Windows Phone/i );
		iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
		isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
	}

	/**
	 * Superfish Menu
	 */
	function superfishMenu() {

		var $menu = $( '.main-navigation .menu' ),
			$classMenu = 'ul';
		if ( $menu.hasClass( 'edupro-max-megamenu' ) ) {
			$classMenu = '.mega-sub-menu-lever-1';
		}

		$menu.supersubs( {} ).superfish( {
			popUpSelector: $classMenu,
			animation: {height: 'show'},
			animationOut: {height: 'hide'},
			cssArrows: false,
			speed:       300,
			delay: 10
		} );
	}

	/**
	 * Toggle search form in the header.
	 */
	function toggleHeaderSearchForm() {
		$( '.header__search > a' ).on( 'click', function () {
			$( this ).siblings( 'form' ).slideToggle();
		} );
	}

	/**
	 * Make header sticky.
	 */
	function stickyHeader() {
		var $body = $( 'body' );
		if ( ! $body.hasClass( 'is-sticky' ) ) {
			return;
		}

		var $sticky = $( '#masthead' ),
			offset = $( '#wpadminbar' ).length && $(window).width() > 480 ? $( '#wpadminbar' ).height() : 0;

		// Header style 1. @link http://demo.featherlayers.com/
		if ( $sticky.hasClass( 'header--s3' ) ) {
			$sticky = $sticky.find( '.container__navbar' );

		}

		$sticky.sticky( {topSpacing: offset, className: 'header-sticky', zIndex : '999' } );
	}

	/**
	 * Toggle mobile sidebar
	 */
	function toggleMobileSidebar() {
		var $button = $( '.navbar-toggle' ),
			sidebarClass = 'mobile-sidebar-open';

		// Click to show mobile menu
		$button.on( clickEvent, function ( e ) {
			if ( $body.hasClass( sidebarClass ) ) {
				$body.removeClass( sidebarClass );
				$button.removeClass( 'active' );

				return;
			}
			e.stopPropagation(); // Do not trigger click event on '.site' below
			$body.addClass( sidebarClass );
			$button.addClass( 'active' );
		} );
		// When mobile menu is open, click on page content will close it
		$( '.site' ).on( clickEvent, function ( e ) {
			if ( ! $body.hasClass( sidebarClass ) ) {
				return;
			}
			e.preventDefault();
			$body.removeClass( sidebarClass );
			$button.removeClass( 'active' );
		} );
	}

	/**
	 * Wrap image in <figure> tag for effect.
	 */
	function wrapImage( $container ) {
		$( $container ).each( function () {
			var $img = $( this );
			if ( $img.parent().is( 'figure' ) || $img.hasClass( 'rev-slidebg' ) ) {
				return;
			}

			var classAttribute = $img.attr( 'class' );
			classAttribute = classAttribute ? ' class="' + classAttribute + '"' : '';
			$img.wrap( '<figure' + classAttribute + '></figure>' );
			$img.removeAttr( 'class' );

			$img.addClass( function () {
				return this.width / this.height > 1 ? 'wide' : 'tall';
			} );
		} );
	}

	/**
	 * Change input number when pressing up/down arrow.
	 */
	function changeInputNumber() {
		var $body = $( 'body' );
		$body.on( 'click', '.quantity .up', function () {
			var $input = $( this ).siblings( 'input' ),
				value = parseInt( $input.val() );
			value = isNaN( value ) ? 0 : value + 1;
			$input.val( value );
		} );
		$body.on( 'click', '.quantity .down', function () {
			var $input = $( this ).siblings( 'input' ),
				value = parseInt( $input.val() );
			value = isNaN( value ) || ! value ? 0 : value - 1;
			$input.val( value );
		} );
	}

	/**
	 * Portfolio isotope
	 */
	function portfolio() {
		var $projects = $( '.projects' );

		// Masonry layout with filter using Isotope library.
		// Layout is triggered when images are loaded.
		$projects.imagesLoaded( function () {
			$projects.isotope( {
				filter: '*',
				itemSelector: '.project',
				percentPosition: true,
				masonry: {
					columnWidth: '.project'
				}
			} );

			// Filter projects
			$( '.portfolio-filter' ).on( 'click', 'li', function ( e ) {
				e.preventDefault();
				var $this = $( this ),
					selector = $this.attr( 'data-filter' );
				$this.addClass( 'active' ).siblings().removeClass( 'active' );
				$projects.isotope( {
					filter: selector
				} );
			} );
		} );
	}

	/**
	 *  Multi Teammembers
	 */
	$( '.multi-teammembers' ).slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
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
	});

	/**
	 * Scroll to top
	 */
	function scrollToTop() {
		var $window = $( window ),
			$button = $( '#scroll-to-top' );
		$window.scroll( function () {
			if ( $window.scrollTop() > 100 ) {
				$button.addClass( 'active' );
			}
			else {
				$button.removeClass( 'active' );
			}
		} );
		$button.on( 'click', function ( e ) {
			e.preventDefault();
			$( 'body, html' ).animate( {
				scrollTop: 0
			}, 500 );
		} );
	}

	/**
	 * Sticky Sidebar
	 */
	function stickySidebar() {

		if ( ! $( 'body' ).hasClass( 'is-sticky-sidebar' ) || $(window).width() < 1030 ) {
			return false;
		}

		var offset = 0;

		if ( $( '#wpadminbar' ).length ) {
			offset =  offset +  $( '#wpadminbar' ).height();
		}

		offset =  offset + ( $body.hasClass( 'is-sticky' ) ? 60 :  0 ) + 30;

		$( '.main__content-sticky,.add_sticky_sidebar' ).theiaStickySidebar( {
			additionalMarginTop: offset
		} );

	}

	function niceScrollInit() {
		if ( typeof TweenLite === 'undefined' ) {
			return;
		}

		// Don't run on touch devices
		if ( ( 'ontouchstart' in window ) || navigator.msMaxTouchPoints || window.DocumentTouch && document instanceof DocumentTouch ) {
			return;
		}
		// Don't run on Windows Phone, iOS, Mac
		if ( ieMobile || iOS || isMac ) {
			return;
		}


		var $window = $( window ),
			scrollTime = .6,
			scrollDistance = 200;

		$window.on( 'mousewheel DOMMouseScroll', function ( event ) {
			event.preventDefault();
			var delta = event.originalEvent.wheelDelta / 120 || - event.originalEvent.detail / 3,
				scrollTop = $window.scrollTop(),
				finalScroll = scrollTop - parseInt( delta * scrollDistance );

			TweenLite.to( $window, scrollTime, {
				scrollTo: {y: finalScroll, autoKill: true},
				ease: Power1.easeOut,
				overwrite: 5
			} );
		} );
	}

	/**
	 * Load more ajax
	 */
	function infiniteScroll(  ) {

		var $posts = $( '.edupro-infinite-scroll' ),
			$handle = $( '#infinite-handle' );

		$posts.on( 'click', '#infinite-handle a', function ( e )
		{
			var $this = $( this ),
				$handle = $this.closest( '#infinite-handle' ),
				url = $this.attr( 'href' );

			if( $this.hasClass( 'no_post' ) ) {

				var mes = $this.data( 'mes' );
				$this.find( ".ajax-more-text" ).text( mes );

				setTimeout(function(){
					$handle.remove();
				}, 1200);

				return false;
			}

			if ( ! $handle.hasClass( 'click' ) && ! $handle.hasClass( 'scroll' ) )
			{
				return false;
			}

			e.preventDefault();

			$handle.addClass( 'loading' );

			$.get( url, function ( res )
			{
				var $content = $( res ).find( '#content-posts' ),
					$items = $content.children( '.post' ),
					$link = $content.find( '#infinite-handle' );

				$posts.append( $items );

				$handle.remove();

				if ( $link.length )
				{
					$posts.append( $link );
				}
			} );
		} );

		// Infinity scroll
		if ( $handle.hasClass( 'scroll' ) )
		{
			$( window ).on( 'scroll', function ()
			{
				if ( $( window ).scrollTop() >= ( $( document ).height() - $( window ).height() - $( '#colophon' ).height() - $( '.footer-widgets' ).height() ) )
				{
					if ( ! $handle.hasClass( 'loading' ) ) {
						$handle.find( 'a' ).click();
					}
				}
			} ).scroll();
		}
	}

	// Masonry shortcode  Popular Courses
	$( '.popular_courses' ).masonry();

	// Mega menu
	function megaMenu() {
		$( '#site-navigation .edupro-mega-child-categories a' ).mouseenter( function () {
			if ( !$( this ).hasClass( 'cat-active' ) ) {
				var $this = $( this ),
					$row_active = $this.data( 'id' ),
					$parentA = $this.parent().children( 'a' ),
					$parent = $this.closest( '.edupro-megamenu' ),
					$rows = $this.closest( '.edupro-megamenu' ).find( '.edupro-mega-latest-posts' ).children( '.edupro-mega-row' );
				$parentA.removeClass( 'cat-active' );
				$this.addClass( 'cat-active' );
				$rows.hide();
				$parent.find( '.' + $row_active ).fadeIn( 'normal' ).css( 'display', 'inline-block' );
			}
		} );
	}


	function tabSingleCourses() {


		$( '.courses-nav-tabs li' ).each(function( index ) {

			var $this = $( this );

			var $findA = $this.find('a').attr('href'),
				$getUl = $(this).closest('.courses-nav-tabs'),
				$tabContent = $getUl.next( '.tab-content' );

			if( $( this ).hasClass( 'active' )   ) {

				$tabContent.find( $findA ).addClass( 'get_content' );
				$tabContent.find( '.tab-pane' ).hide();
				$tabContent.find( $findA ).show();
			}

			$( this ).on( 'click', function () {

				var $findA = $this.find('a').attr('href');

				$( '.courses-nav-tabs li' ).removeClass( 'active' );
				$( this ).addClass( 'active' );

				$getUl = $(this).closest('.courses-nav-tabs'),
				$tabContent = $getUl.next( '.tab-content' );

				$tabContent.find( '.tab-pane' ).removeClass( 'get_content' );
				$tabContent.find( '.tab-pane' ).removeClass( 'active' );
				$tabContent.find( '.tab-pane' ).hide();

				$tabContent.find( $findA ).addClass( 'get_content active' );
				$tabContent.find( $findA ).show();

			} );

		});
	}

	/**
	 * Add toggle dropdown icon for mobile menu.
	 * @param $container
	 * @param $aHasChildren
	 */
	function dropdownNavigation( $container, $ahasChildren, $subMenu ) {
		// Add dropdown toggle that displays child menu items.
		var $dropdownToggle = $( '<i class="dropdown-toggle fa fa-angle-down"></i>' );

		$container.find( $ahasChildren + ' > a' ).after( $dropdownToggle );

		// Toggle buttons and sub menu items with active children menu items.
		$container.find( '.current-menu-ancestor > .dropdown-toggle' ).addClass( 'toggled-on' );
		$container.find( '.current-menu-ancestor > ' + $subMenu ).show();
		$container.find( '.dropdown-toggle' ).click( function ( e ) {
			e.preventDefault();
			var $this = $( this );
			$this.toggleClass( 'toggled-on' );
			$this.next( '.children, ' + $subMenu ).slideToggle();
			$this.next().next( '.children,' + $subMenu ).slideToggle();
		} );
	}

	platformDetect();
	niceScrollInit();
	dropdownNavigation( $( '.primary-menu-mobile' ), '.menu-item-has-children', '.sub-menu' );
	dropdownNavigation( $( '.mobile-sidebar .edupro-max-megamenu' ), '.mega-menu-item-has-children', '.mega-sub-menu' );
	toggleHeaderSearchForm();
	stickyHeader();
	toggleMobileSidebar();
	scrollToTop();
	wrapImage( '.woocommerce-LoopProduct-link img' );
	wrapImage( '.product .images img' );
	changeInputNumber();
	superfishMenu();
	portfolio();
	stickySidebar();
	infiniteScroll();
	megaMenu();
	tabSingleCourses();
} );


