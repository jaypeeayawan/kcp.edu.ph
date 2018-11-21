<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$google_fonts_obj = new Vc_Google_Fonts();

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];

?>

<div class="counter_up <?php echo esc_attr( $class ); ?>">
	<div class="counter_up__1 col-sm-3 col-md-3">
		<div class="counter"><?php if( ! empty( $atts['cu_number_1'] ) ) : echo esc_html( $atts['cu_number_1'] ); endif; ?></div>
		<div class="counter_text"><?php if( ! empty( $atts['cu_text_1'] ) ) : echo esc_html( $atts['cu_text_1'] ); endif; ?></div>
	</div>
	<div class="counter_up__2 col-sm-3 col-md-3">
		<div class="counter"><?php if( ! empty( $atts['cu_number_2'] ) ) : echo esc_html( $atts['cu_number_2'] ); endif; ?></div>
		<div class="counter_text"><?php if( ! empty( $atts['cu_text_2'] ) ) : echo esc_html( $atts['cu_text_2'] ); endif; ?></div>
	</div>
	<div class="counter_up__3 col-sm-3 col-md-3">
		<div class="counter"><?php if( ! empty( $atts['cu_number_3'] ) ) : echo esc_html( $atts['cu_number_3'] ); endif; ?></div>
		<div class="counter_text"><?php if( ! empty( $atts['cu_text_3'] ) ) : echo esc_html( $atts['cu_text_3'] ); endif; ?></div>
	</div>
	<div class="counter_up__4 col-sm-3 col-md-3">
		<div class="counter"><?php if( ! empty( $atts['cu_number_4'] ) ) : echo esc_html( $atts['cu_number_4'] ); endif; ?></div>
		<div class="counter_text"><?php if( ! empty( $atts['cu_text_4'] ) ) : echo esc_html( $atts['cu_text_4'] ); endif; ?></div>
	</div>
</div>

<style>
	<?php for( $i=1; $i<=4; $i++ ) : ?>
	.counter_up .counter_up__<?php echo $i; ?> .counter {
	<?php if ( ! empty( $atts['background_'. $i] ) ): ?> background: <?php echo strip_tags( $atts['background_'. $i] ); ?>;  <?php endif; ?>

	<?php if ( ! empty( $atts['border_'. $i] ) ): ?> border: 2px solid <?php echo strip_tags( $atts['border_'. $i] ); ?>;  <?php endif; ?>
	}
	<?php endfor; ?>

	<?php
	$font_family = $font_style = '';

	if( ! empty( $atts['cu_title_fonts'] ) && $atts['cu_title_fonts'] != 'font_family:Roboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic|font_style:500%20bold%20regular%3A500%3Anormal' ) {
		$font = $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $atts['cu_title_fonts'] );
		$font = $font['values'];
		list( $font_family ) = explode( ':', $font['font_family'] . ':' );
		$font_style = explode( ':', $font['font_style'] . ':' );
	}

	?>

	<?php if ( ! empty( $font_family ) ) : ?>
	@import '//fonts.googleapis.com/css?family=<?php echo urlencode( $font['font_family'] ); ?>';
	<?php endif; ?>

	.counter_up .counter_text {
	<?php if ( ! empty( $atts['cu_font_size'] ) ): ?> font-size: <?php echo strip_tags( $atts['cu_font_size'] ) ?>;
	<?php endif; ?><?php if ( ! empty( $font_family ) ) : ?> font-family: "<?php echo esc_html( $font_family ); ?>";
	<?php endif; ?><?php if ( isset( $font_style[1] ) ) : ?> font-weight: <?php echo esc_html( $font_style[1] ); ?>;
	<?php endif; ?><?php if ( isset( $font_style[2] ) ) : ?> font-style: <?php echo esc_html( $font_style[2] ); ?>;
	<?php endif; ?>
	}
</style>