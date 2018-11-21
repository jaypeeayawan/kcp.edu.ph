jQuery( function ( $ ) {
		'use strict';

	var $body = $( 'body' ),
		clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click',
		$popupLogin = $( '#edupro-popup-login' ),
		$loginContainer = $popupLogin.find( '.edupro-login-container' ),
		$popupRegister = $( '#edupro-popup-register' ),
		$registerContainer = $popupRegister.find( '.edupro-login-container' );

	/**
	 * Action of login Popup
	 */
	function loginPopup() {
		var login = '#edupro_login',
			pass = '#edupro_pass';

		$( login ).attr( 'placeholder', EduPro.login );
		$( pass ).attr( 'placeholder', EduPro.password );

		// Replace img with icon
		$( '.mo-openid-app-icons a img' ).each( function () {
			var $this = $( this ),
				alt = $this.attr( 'alt' ),
				icon;

			if ( 'Facebook' === alt ) {
				icon = 'facebook';
			}
			else if ( 'Google' === alt ) {
				icon = 'google-plus';
			}
			else if ( 'Twitter' === alt ) {
				icon = 'twitter';
			}
			else if ( 'LinkedIn' === alt ) {
				icon = 'linkedin';
			}
			else if ( 'Instagram' === alt ) {
				icon = 'instagram';
			}
			else if ( 'Amazon' === alt ) {
				icon = 'amazon';
			}
			else if ( 'Salesforce' === alt ) {
				icon = 'cloud';
			}
			else if ( 'Windowslive' === alt ) {
				icon = 'windows';
			}
			else if ( 'Vkontakte' === alt ) {
				icon = 'vk';
			}

			$this.after( '<i class="fa fa-' + icon + '"></i>' ).remove();
		} );

		$body.on( 'click', '#edupro-popup-login .close-popup', function ( e ) {
			e.preventDefault();
			$body.removeClass( 'edupro-popup-active' );
			$popupLogin.removeClass( 'active' );
		} );

		$body.on( 'click', '.topbar  .login-popup', function ( e ) {
			if ( $( window ).width() > 0 ) {
				e.preventDefault();
				$( 'body' ).addClass( 'edupro-popup-active' );
				$popupLogin.addClass( 'active' );

				if ( $loginContainer.length ) {

					var el_H = $loginContainer.outerHeight(),
						win_H = $( window ).height();

					if ( win_H > el_H ) {
						$loginContainer.css( 'top', parseInt( (
						                                      win_H - el_H
						                                      ) / 2 ) );
					}
				}
			}
		} );

		$body.on( 'click', '#edupro-popup-login  .register a', function ( e ) {
			e.preventDefault();
			$popupRegister.addClass( 'active' );
			$popupLogin.removeClass( 'active' );

			if ( $registerContainer.length ) {

				var el_H = $registerContainer.outerHeight(),
					win_H = $( window ).height();

				if ( win_H > el_H ) {
					$registerContainer.css( 'top', parseInt( (
					                                         win_H - el_H
					                                         ) / 2 ) );
				}
			}

			return false;
		} );

		$body.on( 'click', '#edupro-popup-login', function ( e ) {
			if ( $( e.target ).attr( 'id' ) == 'edupro-popup-login' ) {
				$body.removeClass( 'edupro-popup-active' );
				$popupLogin.removeClass( 'active' );
			}
		} );

		$( '#edupro_login,#edupro_pass' ).on( 'focus', function () {
			$( this ).removeClass( 'invalid' );
		} );

		$( '#edupro-popup-login #loginform' ).submit( function ( e ) {

			var $this = $( this ),
				inputUsername = $this.find( '#edupro_login' ),
				inputPass = $this.find( '#edupro_pass' ),
				valUsername = inputUsername.val(),
				valPass = inputPass.val();

			if ( inputUsername.length > 0 && valUsername == '' ) {
				inputUsername.addClass( 'invalid' );
				event.preventDefault();
			}

			if ( inputPass.length > 0 && valPass == '' ) {
				inputPass.addClass( 'invalid' );
				event.preventDefault();
			}

			if ( valUsername == '' || valPass == '' ) {
				return false;
			}

			$loginContainer.append( '<div class="edupro-loading-container"><div class="edupro-loading"></div></div>' );
			$loginContainer.find( '.message' ).slideDown().remove();

			var data = {
				action: 'edupro_login_ajax',
				username: valUsername,
				password: valPass,
				remember: $loginContainer.find( '#rememberme' ).val()
			};

			$.post( EduPro.ajaxUrl, data, function ( response ) {

				$loginContainer.find( '.edupro-login' ).append( response.data );
				$loginContainer.find( '.edupro-loading-container' ).remove();

				if ( ! response.success ) {
					return;
				}

				window.location = window.location;
			} );

			event.preventDefault();
			return false;
		} );
	}

	/**
	 *  Register popup
	 *
	 * @constructor
	 */
	function registerPopup() {

		if ( $registerContainer.length ) {

			var el_H = $registerContainer.outerHeight(),
				win_H = $( window ).height();

			if ( win_H > el_H ) {
				$registerContainer.css( 'top', ( win_H - el_H ) / 2 );
			}
		}

		$body.on( 'click', '#edupro-popup-register .close-popup', function ( e ) {
			e.preventDefault();
			$body.removeClass( 'edupro-popup-active' );
			$popupRegister.removeClass( 'active' );
		} );

		$body.on( 'click', '.topbar  .register-popup', function ( e ) {
			if ( $( window ).width() > 0 ) {
				e.preventDefault();
				$( 'body' ).addClass( 'edupro-popup-active' );
				$popupRegister.addClass( 'active' );
			}
		} );

		$body.on( 'click', '#registration  .login a', function ( e ) {
			e.preventDefault();
			$popupRegister.removeClass( 'active' );
			$popupLogin.addClass( 'active' );

			if ( $loginContainer.length ) {

				var el_H = $loginContainer.outerHeight(),
					win_H = $( window ).height();

				if ( win_H > el_H ) {
					$loginContainer.css( 'top', parseInt( ( win_H - el_H ) / 2 ) );
				}
			}

			return false;
		} );

		$body.on( 'click', '#edupro-popup-register', function ( e ) {
			if ( $( e.target ).attr( 'id' ) == 'edupro-popup-register' ) {
				$body.removeClass( 'edupro-popup-active' );
				$popupRegister.removeClass( 'active' );
			}
		} );


		var $allInput = $( '.edupro_user_name,.edupro_user_name,.edupro_user_email,.edupro_user_pass,.edupro_user_pass_confirm' );

		$allInput.on( 'focus', function () {
			$( this ).removeClass( 'invalid' );
		} );


		$( '#edupro-popup-register #registration, .edupro-register #registration' ).submit( function ( e ) {

			var $this = $( this ),
				$registerContainer = $( '#edupro-popup-register .edupro-login-container, .edupro-register .edupro-login-container' ),
				inputUsername = $this.find( '.edupro_user_name' ),
				inputEmail = $this.find( '.edupro_user_email' ),
				$inputPass = $this.find( '.edupro_user_pass' ),
				$inputPassConfirm = $this.find( '.edupro_user_pass_confirm' ),
				valUsername = inputUsername.val(),
				valEmail = inputEmail.val(),
				valPass = $inputPass.val(),
				valPassConfirm = $inputPassConfirm.val();

			$allInput.removeClass( 'invalid' );

			if ( inputUsername.length > 0 && valUsername == '' ) {
				inputUsername.addClass( 'invalid' );
				event.preventDefault();
			}



			if ( inputEmail.length > 0 && valEmail == '' ) {
				inputEmail.addClass( 'invalid' );
				event.preventDefault();
			}


			if ( $inputPass.length > 0 && valPass == '' ) {
				$inputPass.addClass( 'invalid' );
				event.preventDefault();
			}

			if ( $inputPassConfirm.length > 0 && valPassConfirm == '' ) {
				$inputPassConfirm.addClass( 'invalid' );
				event.preventDefault();
			}
			if ( valUsername == '' || valEmail == '' || valPass == '' || valPassConfirm == '' ) {
				return false;
			}

			// Password does not match the confirm password
			if ( valPassConfirm !== valPass ) {
				$inputPass.addClass( 'invalid' );
				$inputPassConfirm.addClass( 'invalid' );
				$registerContainer.find( '.edupro-login' ).append( EduPro.errorPass );
				event.preventDefault();

				return false;
			}
			$registerContainer.append( '<div class="edupro-loading-container"><div class="edupro-loading"></div></div>' );
			$registerContainer.find( '.message' ).slideDown().remove();

			var data = {
				action: 'edupro_register_ajax',
				fistName: $this.find( '.edupro_first_name' ).val(),
				lastName: $this.find( '.edupro_last_name' ).val(),
				username: valUsername,
				password: valPass,
				confirmPass: valPassConfirm,
				email: valEmail
			};

			$.post( EduPro.ajaxUrl, data, function ( response ) {

				$registerContainer.find( '.edupro-login' ).append( response.data );
				$registerContainer.find( '.edupro-loading-container' ).remove();

				if ( ! response.success ) {
					return;
				}

				window.location = window.location;

			} );

			event.preventDefault();
			return false;
		} );

	}

	/**
	 * Show search popup
	 */
	function searchPopup() {
		$( '.header__search .search-toggle' ).on( 'click', function ( e ) {
			e.stopPropagation();
			var parent = jQuery( this ).parent();
			$body.addClass( 'edupro-search-active' );
			setTimeout( function () {
				parent.find( '.search-field' ).focus();
			}, 500 );

			return false;

		} );
		jQuery( '.search-popup-bg' ).on( 'click', function () {
			var parent = jQuery( this ).parent();
			parent.find( '.search-field' ).val( '' );
			$body.removeClass( 'edupro-search-active' );

			return false;
		} );
	}

	loginPopup();
	registerPopup();
	searchPopup();
})