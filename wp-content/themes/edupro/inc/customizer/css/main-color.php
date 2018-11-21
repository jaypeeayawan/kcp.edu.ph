<?php
/**
 * Get CSS for main color.
 *
 * @return string
 */
function edupro_customizer_main_color() {

	/* Get Option */
	$main_color = edupro_get_setting( 'main_color' );

	$css = '
		/* color */
		.site-title a,
		a, a:hover, a:focus, a:active,
		.site .blog__content .blog__content__readmore,
		.site .main__content__line ul.socials li i:hover,
		.site .content__orderby span.orderby_current,
		.post-type-archive-sfwd-courses #form_itemsperpage .content__orderby span:hover,
		.site .content__orderby span:hover,
		.site .grid-main .content-grid,
		.site .edupro_subscribe input.submit,
		.site .widget__social-link ul li a:hover,
		.site .rating-circle,
		.site #instructor .author__infomation .social-user li i:hover,
		.site .projects.masonry .project .project__title a:hover,
		.site .list-main .content-list,
		.site .register__form__3 #registration .button,
		.site .widget__courses-relation .course-relation__infomation__item .excrept a:hover,
		.single-post .site .related-post-title a:hover,
		.single-post .site .main__content__pre__next h3 a:hover,
		.single-sfwd-courses .related-post.archive .featured-course .featured-course__text h3 a:hover {
			color: %1$s;
		}

		.site #lesson_heading h4 a,
		.site #wp-calendar tbody td a,
		.site #wp-calendar tbody td#today, 
		.site #wp-calendar tbody td:hover,
		.site .layout_current,
		.search .page-header h1.page-title span,
		.search .search-title-post-type span {
			color: %1$s;
		}

		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__meta h3 a:hover,
		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__joinnow:hover a,
		.site .grid-main .featured-event__text h3 a:hover {
			color: %1$s;
		}

		.site .widget_archive li, 
		.site .widget_categories li,
		.site .widget__latest_posts .widget__latest_title_posts a:hover,
		.site .main__content__author .social-user li a:hover,
		.site .comment-content .reply__comment .reply a:hover,
		.content-grid .blog__content .blog__content__info ul li a:hover,
		.author #learndash_profile .notcompleted {
			color: %1$s;
		}

		.site .widget__category-courses li,
		.site .widget__filter-courses li,
		.site .widget.widget__category-courses li,
		.site .search_course__2 button,
		.site .jetpack_subscription_widget #subscribe-submit input,
		.site .edupro_topic_dots ul.edupro-topic .topic_title,
		.footer-widgets .widget_rss .rsswidget:hover,
		#wp-calendar tfoot td#prev a:hover, 
		#wp-calendar tfoot td#next a:hover {
			color: %1$s;
		}

		.site .team .team__social-links li a:hover,
		.site .team.slick-slide .team__social-links li a:hover,
		.site .team__info .team__info__line > div {
			color: %1$s;
		}

		.site .sidebar-single .inline .featured-course__meta .featured-course__type,
		.site .sidebar-single .inline.author__infomation .author__infomation-details .social-user li i:hover,
		.site .sidebar-single .inline.course-relation__infomation .sidebar-single__title span,
		.site .sidebar-single .inline.category__infomation ul li,
		.site .sidebar-single .inline.author__infomation .author__infomation-details .button {
			color: %1$s;
		}

		.site .shop__woocommerce .sidebar__woocommerce .cart_list li .quantity .woocommerce-Price-amount.amount, 
		.site .shop__woocommerce .sidebar__woocommerce .product_list_widget li .quantity .woocommerce-Price-amount.amount,
		.site .shop__woocommerce ul.products li.product .amount,
		.shop__woocommerce ul.products li.product h3:hover,
		.site .shop__woocommerce .sidebar__woocommerce .cart_list li ins, 
		.site .shop__woocommerce .sidebar__woocommerce .product_list_widget li ins,
		.site .shop__woocommerce .sidebar__woocommerce .product_list_widget li a:hover,
		.woocommerce.single-product .summary .price,
		.woocommerce.single-product .woocommerce-tabs .tabs .active,
		.woocommerce.single-product .summary .product_meta ul.socials li i:hover,
		.woocommerce ul.products li.product .price,
		.woocommerce-checkout .woocommerce-info:before,
		.woocommerce .quantity .up:hover, 
		.woocommerce .quantity .down:hover,
		.footer-widgets .woocommerce .star-rating span,
		.shop__woocommerce .sidebar__woocommerce .product_list_widget li .amount,
		.woocommerce.single-product .woocommerce-tabs .tabs .reviews_tab .count-reviews {
			color: %1$s;
		}

		.site .featured-courses--s1 .featured-course__info a:hover,
		.site .featured-courses--s3 .featured-courses__filter ul li.featured-courses__filter__active, 
		.site .featured-courses--s3 .featured-courses__filter ul li:hover,
		.site .featured-courses--s3 .featured-course__info a:hover,
		.site .featured-courses--s2 .featured-courses__filter ul li.featured-courses__filter__active, 
		.site .featured-courses--s2 .featured-courses__filter ul li:hover,
		.site .featured-courses--s2 .featured-course__text h3 a:hover
		.site .featured-courses--s5 .featured-course .featured-course__text h3 a:hover,
		.site .featured-course .featured-course__users a:hover {
			color: %1$s;
		}

		.site .featured-course .featured-course__comments a:hover,
		.site .featured-posts--s1 .featured-post__text h3 a:hover,
		.site .featured-posts--s2 .lastest-news__text h3 a:hover,
		.site .featured-posts--s4 .lastest-news .lastest-news__text h3 a:hover,
		.site .featured-posts--s2 .lastest-news__text .lastest-news__meta .lastest-news__author a:hover,
		.site .featured-posts--s4 .lastest-news .lastest-news__text .lastest-news__meta a:hover,
		.site .featured-events--s4 .featured-event .featured-event__text h3 a:hover,
		.site .featured-events--s2 .featured-event .featured-event__text h3 a:hover,
		.site .featured-events--s2 .featured-event.short-style .featured-event__text h3 a:hover {
			color: %1$s;
		}

		.site .footer-widgets .edupro_widget_recent_courses .widget__recent_title_courses a:hover,
		.site .footer-widgets a:hover,
		.site .footer-widgets .widget__social-link ul.social-link li a:hover,
		.site .footer-widgets .widget__latest_posts a:hover, 
		.site .footer-widgets .widget__latest_title_posts a:hover,
		.site .footer-widgets .cat-item a:hover,
		.site .footer-widgets .product_list_widget li ins,
		.site .footer-widgets .product_list_widget li a:hover {
			color: %1$s;
		}

		.site .header-sticky .site-header .main-navigation .current-menu-item > a,
		.site .topbar ul li:hover,
		.site .topbar ul li a:hover,
		.site .topbar .widget_nav_menu ul.menu li ul.sub-menu li a:hover {
			color: %1$s;
		}

		.site .header--s1 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s1 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s1 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s1 .main-navigation ul.menu li li a:hover,
		.site .header--s1 .main-navigation ul.menu li a:hover,
		.site .header--s1 .main-navigation li li a:hover,
		.site .header--s1 .main-navigation .current-menu-item > a, 
		.site .header--s1 .main-navigation .current-menu-ancestor > a,
		.site .header--s1 .main-navigation li a:hover,
		.site .header--s1 .main-navigation li:hover > a,
		.site .header--s1 .main-navigation li:active > a,
		.site .header--s1 .main-navigation li:focus > a, 
		.site .header--s1 .main-navigation li:hover > a, 
		.site .header--s1 .main-navigation li a:hover, 
		.site .header--s1 .main-navigation li:focus > a, 
		.site .header--s1 .main-navigation li:active > a,
		.header_style2.single-jetpack-portfolio .site-header.header--s2 .main-navigation ul.menu > li > a:hover {
			color: %1$s;
		}

		.site .header--s2 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s2 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s2 .main-navigation li:active > a,
		.site .header--s2 .main-navigation li:hover > a, 
		.site .header--s2 .main-navigation li a:hover, 
		.site .header--s2 .main-navigation li:focus > a, 
		.site .header--s2 .main-navigation li:active > a,
		.site .header--s2 .main-navigation li:focus > a ,
		.site .header_style2 .header-sticky .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header_style2 .header-sticky ul.menu .current-menu-ancestor > a:hover,
		.site .header_style2 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header_style2 ul.menu .current-menu-ancestor > a:hover,
		.site .header_style2 .header--s2 .main-navigation .current-menu-item > a,
		.site .header_style2 .header-sticky .main-navigation .current-menu-item > a,
		.site .header--s2 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s2 .main-navigation ul.menu li li a:hover,
		.site .header--s2 .main-navigation ul.menu li a:hover,
		.header_style2.single-sfwd-courses .site-header.header--s2 .main-navigation ul.menu > li > a:hover {
			color: %1$s;
		}

		.site .header--s3 .main-navigation .current-menu-item > a,
		.site .header--s3 .main-navigation li:hover > a,
		.site .header--s3 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s3 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s3 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s3 .main-navigation ul.menu li li a:hover,
		.site .header--s3 .main-navigation ul.menu li a:hover {
			color: %1$s;
		}

		.site .header--s4 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s4 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s4 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s4 .main-navigation ul.menu li li a:hover,
		.site .header--s4 .main-navigation ul.menu li a:hover,
		.site .header--s4 .main-navigation li li a:hover,
		.site .header--s4 .main-navigation .current-menu-item > a, 
		.site .header--s4 .main-navigation .current-menu-ancestor > a,
		.site .header--s4 .main-navigation li a:hover,
		.site .header--s4 .main-navigation li:hover > a,
		.site .header--s4 .main-navigation li:active > a,
		.site .header--s4 .main-navigation li:focus > a, 
		.site .header--s4 .main-navigation li:hover > a, 
		.site .header--s4 .main-navigation li a:hover, 
		.site .header--s4 .main-navigation li:focus > a, 
		.site .header--s4 .main-navigation li:active > a {
			color: %1$s;
		}

		.site .header--s5 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s5 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s5 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s5 .main-navigation ul.menu li li a:hover,
		.site .header--s5 .main-navigation ul.menu li a:hover,
		.site .header--s5 .main-navigation li li a:hover,
		.site .header--s5 .main-navigation .current-menu-item > a, 
		.site .header--s5 .main-navigation .current-menu-ancestor > a,
		.site .header--s5 .main-navigation li a:hover,
		.site .header--s5 .main-navigation li:hover > a,
		.site .header--s5 .main-navigation li:active > a,
		.site .header--s5 .main-navigation li:focus > a, 
		.site .header--s5 .main-navigation li:hover > a, 
		.site .header--s5 .main-navigation li a:hover, 
		.site .header--s5 .main-navigation li:focus > a, 
		.site .header--s5 .main-navigation li:active > a {
			color: %1$s;
		}

		.site .header--s6 .main-navigation ul.menu .current-menu-ancestor > a,
		.site .header--s6 .main-navigation ul.menu .current-menu-ancestor > a:hover,
		.site .header--s6 .main-navigation ul.menu li .current-menu-item > a,
		.site .header--s6 .main-navigation ul.menu li li a:hover,
		.site .header--s6 .main-navigation ul.menu li a:hover,
		.site .header--s6 .main-navigation li li a:hover,
		.site .header--s6 .main-navigation .current-menu-item > a, 
		.site .header--s6 .main-navigation .current-menu-ancestor > a,
		.site .header--s6 .main-navigation li a:hover,
		.site .header--s6 .main-navigation li:hover > a,
		.site .header--s6 .main-navigation li:active > a,
		.site .header--s6 .main-navigation li:focus > a, 
		.site .header--s6 .main-navigation li:hover > a, 
		.site .header--s6 .main-navigation li a:hover, 
		.site .header--s6 .main-navigation li:focus > a, 
		.site .header--s6 .main-navigation li:active > a {
			color: %1$s;
		}

		.post-type-archive-jetpack-portfolio .portfolio-filter li:hover, 
		.post-type-archive-jetpack-portfolio .portfolio-filter li.active,
		.site .projects.masonry .project .project__title a:hover,
		.site .jetpack-portfolio .post-share .social__icon li a:hover,
		.site .post-navigation .nav-links a:hover,
		.site .jetpack-portfolio .page-title:before {
			color: %1$s;
		}

		.site .single__video .single__video-thumblist .single__video-list .thumb-video .topic__title a:hover,
		.site .single__video .single__video-thumblist .slick-arrow:hover,
		.page .tagcloud a:hover {
			color: %1$s;
		}

		/* background */
		.site .page__banner-top, 
		.site .widget-title:before,
		.site .pagination .nav-links span.current,
		.site .pagination .nav-links a:hover,
		.site .wpcf7 .submit input,
		.site .main__content__author .author__info .author__info__line div,
		.site .comment-content .comment__date:before, 
		.site #comments #submit, .woocommerce #review_form #respond .form-submit #submit,
		.edupro-login-container .edupro-login input[type="submit"],
		.site .header__cart .widget_shopping_cart_content .buttons a.checkout,
		.site .shop__woocommerce .sidebar__woocommerce .buttons a,
		.site .header__cart .widget_shopping_cart_content .buttons a.wc-forward,
		.site .sidebar-single .inline.author__infomation .author__infomation-details .button--small:hover,
		.site .sidebar-single .sidebar-single__title:before,
		.site .single__head.bg-dark .page__title:before,
		.site .single__head .page__title:before,
		.site dd.course_progress div.course_progress_blue,
		.sidebar-single .inline .learndash_join_button #btn-join, 
		.sidebar-single .inline .learndash_checkout_buttons #btn-join,
		.archive .no-results.not-found.row > .col-md-12 form.search-form button {
			background-color: %1$s;
		}
		
		.site #comments #submit:hover,
		.site .wpcf7 .submit input:hover {
			background-color: %2$s;
		}

		.site .ctf7__sidebar .ctf7-title,
		.site .ctf7__sidebar .ctf7-content .wpcf7 .wpcf7-submit,
		.site .single .single__head.bg-dark .page__title:before,
		.site .rating-breakdown__meter .rating-breakdown__meter-bar .rating-breakdown__meter-progress,
		.site .projects.masonry .project .project__image .project__term-name,
		.site .projects.grid .project .project__hover,
		.site .register__form__3 .title__register__form,
		.site .register__form__3 #registration .button:hover,
		.site #scroll-to-top,
		.site .jetpack_subscription_widget #subscribe-submit input:hover,
		.site .shop__woocommerce ul.products li.product .add_to_cart_button:hover,
		.site .content-list .blog__content .blog__content__date,
		.site .grid-main .featured-event__text h3:after,
		.site .team__info.text-center .team__info__line > div,
		.site .login__form .login__form__login-submit input {
			background-color: %1$s;
		}

		.woocommerce span.onsale,
		.woocommerce nav.woocommerce-pagination ul.page-numbers li span.current, 
		.woocommerce nav.woocommerce-pagination ul.page-numbers li a:hover,
		.woocommerce.single-product .summary .single_add_to_cart_button,
		.site .shop__woocommerce .sidebar__woocommerce .price_slider_wrapper .price_slider_amount button,
		.woocommerce.single-product .summary .woocommerce-product-rating:after,
		.woocommerce #reviews #comments .comment__date:before,
		.woocommerce-checkout #payment #place_order,
		.woocommerce table.cart td.actions input[type=submit],
		.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
		.woocommerce #review_form #respond .form-submit #submit:hover,
		.woocommerce nav.woocommerce-pagination ul.page-numbers li span.current, 
		.woocommerce nav.woocommerce-pagination ul.page-numbers li a:hover {
			background-color: %1$s;
		}

		.site .featured-events--s2 .featured-event .featured-event__text:after,
		.site .featured-events--s1 .featured-event__text:after,
		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__joinnow,
		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__meta ul:before,
		.single__event-content .event_heading__title:before {
			background-color: %1$s;
		}

		.site .blog__content .blog__content__readmore:hover,
		.site .blog__content .blog__content__date {
			background-color: %1$s;
		}

		.site .jetpack-portfolio .page-title:before,
		.site .portfolio__related .portfolio__related-title:before,
		.site .post-type-archive-jetpack-portfolio .projects.grid .project .project__hover,
		.site .jetpack-portfolio .page-title:before {
			background-color: %1$s;
		}

		.site .widget__filter-courses li.cat_current a:before, 
		.site .widget__filter-courses li.type_current a:before,
		.site .featured-course .featured-course__type.featured-course__type--free,
		.site .featured-course .featured-course__type.featured-course__type--open,
		.site .featured-courses--s1 .featured-course__type--free,
		.site .featured-course .featured-course__type--free--free,
		.site .featured-courses--s3 .featured-course__type--free,
		.site .featured-courses--s2 .featured-course__type--free {
			background-color: %1$s;
		}

		/* background hover */
		.edupro-login-container .edupro-login input[type="submit"]:hover,
		.site #scroll-to-top:hover,
		.woocommerce.single-product .summary .single_add_to_cart_button:hover,
		.site .header__cart .widget_shopping_cart_content .buttons a:hover,
		.site .featured-course .featured-course__type--free--free:hover,
		.site .featured-courses--s1 .featured-course__type--free:hover,
		.site .featured-courses--s3 .featured-course__type--free:hover,
		.site .featured-courses--s2 .featured-course__type--free:hover,
		.site .featured-course .featured-course__type.featured-course__type--open:hover,
		.site .featured-course .featured-course__type.featured-course__type--free:hover,
		.woocommerce-checkout #payment #place_order:hover,
		.woocommerce table.cart td.actions input[type=submit]:hover,
		.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
		.site .popular_courses_big .item.popular_courses_s2 .popular_courses_s2__type:hover,
		.site .form-faqs input[type="submit"]:hover,
		#scroll-to-top:hover,
		.site .shop__woocommerce .sidebar__woocommerce .price_slider_wrapper .price_slider_amount button:hover {
			background-color: %2$s;
		}

		.search .page-header h1.page-title {
			color: %2$s;
		}

		/* border color */
		.site .blog__content .blog__content__readmore,
		.site .blog__content .blog__content__readmore:hover,
		.site .sidebar-single .inline.author__infomation .author__infomation-details .button,
		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__joinnow,
		.woocommerce nav.woocommerce-pagination ul.page-numbers li span.current, 
		.woocommerce nav.woocommerce-pagination ul.page-numbers li a:hover,
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
		.site .register__form__3 #registration .button:hover,
		.site .register__form__3 #registration .button,
		.site .content__event .content__event__container .content__event__wrap .content__event__wrap__joinnow:hover,
		.site .shop__woocommerce ul.products li.product .add_to_cart_button:hover {
			border-color: %1$s;
		}

		.site .search_course__2 button,
		.site .pagination .nav-links a:hover {
			border-color: %1$s !important;
		}

		.site .search_course__2 button {
			color: %1$s !important;
		}

		.site .edupro_subscribe input.submit,
		.site .jetpack_subscription_widget #subscribe-submit input,
		.site .rating-circle,

		.site #wp-calendar tbody td#today, 
		.site #wp-calendar tbody td:hover,
		.site .footer-widgets a:hover {
			border-color: %1$s;
		}

		.site .nav.nav-tabs > li.active > a:before, 
		.site .nav.nav-tabs > li:hover > a:before, 
		.site .nav.nav-tabs > li:focus > a:before {
			background-color: %1$s;
		}

		.woocommerce-checkout .woocommerce-info {
			border-top-color: %1$s;
		}

		/* color other */
		.site .jetpack_subscription_widget #subscribe-submit input:hover,
		.site .register__form__3 #registration .button:hover,
		.site .form__signup .form__signup__submit input:hover {
			color: #fff;
		}

		.site .featured-events--s1 .featured-event__text h3 a:hover,
		.site .featured-events--s3 .featured-event__text h3 a:hover,
		.site .featured-courses--s1 .featured-course__text h3 a:hover,
		.site .featured-courses--s4 .featured-course .featured-course__wrap .featured-course__text h3 a:hover,
		.site .featured-courses--s2 .featured-course__text h3 a:hover,
		.site .featured-courses--s3 .featured-course__text h3 a:hover,
		.site .featured-courses--s5 .featured-course .featured-course__text h3 a:hover,
		.site .rvl_home_main .rvl_h-main_subtxt {
			color: %1$s;
		}

		.post-type-archive-sfwd-courses .featured-course .featured-course__text h3 a:hover,
		.post-type-archive-sfwd-courses .edupro__courses__items.grid .featured-course .featured-course__users a:hover, 
		.post-type-archive-sfwd-courses .edupro__courses__items.grid .featured-course .featured-course__comments a:hover,
		.post-type-archive-sfwd-courses .featured-course .featured-course__text h3 a:hover,
		.content-list .blog__content .blog__content__info .title a:hover,
		.content-grid .blog__content .blog__content__info .title a:hover,
		.site .popular_courses_big .item.popular_courses_s1 .popular_courses_s1__text h3 a:hover,
		.site .popular_courses_big .item.popular_courses_s2 .popular_courses_s2__info a:hover,
		.site .featured-events--s5 .featured-event .featured-event__thumb .featured-event__text h3 a:hover,
		.site .form__signup .form__signup__submit input,
		.site .style-2#edu_countdown .countdown-amount {
			color: %1$s;
		}

		.author #content .author__info .author__name:before,
		.author #content .featured-courses__title span:before,
		.post-type-archive-event .grid-main .edupro-event-desc:before,
		.single .entry-text li:before, .single .entry-content .list-dot li:before,
		.site .popular_courses_big .item.popular_courses_s2 .popular_courses_s2__type,
		.site .testimonials .slick-slider .slick-dots li.slick-active button,
		.site .form__signup .form__signup__submit input:hover,
		.site .form-faqs input[type="submit"],
		#scroll-to-top {
			background-color: %1$s; 
		}

		.site .rvl_home_3:hover .rvl_h-3_num {
			background-color: %1$s !important; 
		}

		.spinner:not(:required):before,
		.site .testimonials .slick-slider .slick-dots li.slick-active button,
		.site .form__signup .form__signup__submit input,
		.site .form__signup .form__signup__submit input:hover {
			border-color: %1$s;
		}

		.spinner:not(:required):before {
			border-top-color: #fff;
		}

		#colophon a,
		.site .vc_toggle.vc_toggle_arrow .vc_toggle_title:hover h4,
		.site .vc_toggle.vc_toggle_arrow.vc_toggle_active .vc_toggle_title,
		#secondary .tagcloud a:hover {
			color: %1$s;
		}

		#bbpress-forums li.bbp-body ul.forum li.bbp-forum-info .bbp-forum-content a, 
		#bbpress-forums li.bbp-body ul.topic p.bbp-topic-meta a,
		#bbp-search-form #bbp_search_submit:hover,
		.widget_display_forums ul li a:hover,
		.bbp_widget_login .bbp-logged-in .button:hover,
		#bbpress-forums li.bbp-body ul.forum li.bbp-forum-info a:hover, 
		#bbpress-forums li.bbp-body ul.topic li.bbp-topic-title a:hover,
		#bbpress-forums li.bbp-body ul.forum li.bbp-forum-freshness p.bbp-topic-meta a, 
		#bbpress-forums li.bbp-body ul.topic li.bbp-topic-freshness p.bbp-topic-meta a,
		.style-2.edu_countdown .countdown-amount {
			color: %1$s;
		}

		#bbp-search-form #bbp_search_submit,
		.bbp_widget_login .bbp-logged-in .button,
		#bp-login-widget-form #bp-login-widget-submit {
			background-color: %1$s;
		}

		#bbp-search-form #bbp_search_submit:hover,
		.bbp_widget_login .bbp-logged-in .button:hover,
		#bp-login-widget-form #bp-login-widget-submit:hover {
			border-color: %1$s;
		}


	';

	$color = $hover_color = '';

	if ( $main_color == 'default' ) {
		$color = '#7cb342';
		$hover_color = '#59802f';

	} elseif ( $main_color == 'red' ) {
		$color = '#ff3c3c';
		$hover_color = '#992424';

	} elseif ( $main_color == 'blue' ) {
		$color = '#0099ff';
		$hover_color = '#005c99';

	} elseif ( $main_color == 'orange' ) {
		$color = '#ff822f';
		$hover_color = '#994e1c';
	}

	if ( empty( $css ) || empty( $color ) ) {
		return '';
	}

	return sprintf( $css, $color, $hover_color );
}