<?php
/**
 * Add inline style
 *
 * @return string
 */
function edupro_customizer_css_product() {
	$css = '';

	// Product archive
	if ( is_post_type_archive( 'product' ) || ( function_exists( 'WC' ) && is_product_category() ) ) {

		$woo_layout       = edupro_get_setting( 'woo_layout' );
		$woo_paging_align = edupro_get_setting( 'woo_paging_align' );
		
		$css .= sprintf(
			'.shop__woocommerce .col-md-pull-9.sidebar__woocommerce,
			.shop__woocommerce .col-md-pull-9.sidebar__woocommerce { %s;%s; }
			.shop__woocommerce  .col-md-9.shop__woocommerce_content { %s;%s; }
			
			.woocommerce nav.woocommerce-pagination { text-align:%s; }
			',
			'sidebar-right' == $woo_layout ? 'float:right' : '',
			'sidebar-right' == $woo_layout ? 'right:0' : '',
			'sidebar-right' == $woo_layout ? 'left:0' : '',
			'no-sidebar' == $woo_layout ? 'left:0;width:100%' : '',
			$woo_paging_align
		);
	}

	// Product single
	if ( is_singular( 'product' ) ) {
		$woo_single_layout = edupro_get_setting( 'woo_single_layout' );

		$css .= sprintf(
			'.single-product .shop__woocommerce .col-sm-pull-9.sidebar__woocommerce,
			.single-product .shop__woocommerce .col-sm-pull-9.sidebar__woocommerce { %s;%s; }
			.single-product .shop__woocommerce  .col-sm-9.shop__woocommerce_content { %s;%s; }
			',
			'sidebar-right' == $woo_single_layout ? 'float:right' : '',
			'sidebar-right' == $woo_single_layout ? 'right:0' : '',
			'sidebar-right' == $woo_single_layout ? 'left:0' : '',
			'no-sidebar' == $woo_single_layout ? 'left:0;width:100%' : ''
		);
	}

	// Product archive and Single
	if ( is_post_type_archive( 'product' ) || is_singular( 'product' ) ) {

		$woo_hidden_icon_link    = edupro_get_setting( 'woo_hidden_icon_link' );
		$product_overlay_color   = edupro_get_setting( 'product_overlay_color' );
		$product_overlay_opacity = edupro_get_setting( 'product_overlay_opacity' );

		$product_title_color       = edupro_get_setting( 'product_title_color' );
		$product_hover_title_color = edupro_get_setting( 'product_hover_title_color' );

		$product_bg_price_color      = edupro_get_setting( 'product_bg_price_color' );
		$product_price_color = edupro_get_setting( 'product_price_color' );

		$product_bg_addcart                = edupro_get_setting( 'product_bg_addcart' );
		$product_bg_hover_addcart          = edupro_get_setting( 'product_bg_hover_addcart' );
		$product_text_color_addcart        = edupro_get_setting( 'product_text_color_addcart' );
		$product__hover_text_color_addcart = edupro_get_setting( 'product__hover_text_color_addcart' );


		$css .= sprintf(
			'.woocommerce figure:after { %s; }
			.woocommerce figure:before { background: linear-gradient(to bottom, transparent 0,%s  %s);}
			
			.shop__woocommerce ul.products li.product h3 { color :%s; }
			.shop__woocommerce ul.products li.product h3:hover { color :%s; }
			
			.woocommerce .product span.onsale { background-color:%s; }
			.woocommerce .product span.onsale { color:%s; }
			
			.shop__woocommerce ul.products li.product .add_to_cart_button, 
			.shop__woocommerce ul.products li.product .ajax_add_to_cart{ background-color:%s; border-color:%s; color:%s; }
			.shop__woocommerce ul.products li.product .add_to_cart_button:hover, 
			.shop__woocommerce ul.products li.product .ajax_add_to_cart:hover { background-color:%s; border-color:%s; color:%s; }
			',
			$woo_hidden_icon_link ? 'content:none' : '',
			edupro_convert_hex_rgb( $product_overlay_color, $product_overlay_opacity ),
			'75%',
			$product_title_color,
			$product_hover_title_color,
			$product_bg_price_color,
			$product_price_color,
			$product_bg_addcart,
			$product_bg_addcart,
			$product_text_color_addcart,
			$product_bg_hover_addcart,
			$product_bg_hover_addcart,
			$product__hover_text_color_addcart

		);
	}

	return $css;
}

