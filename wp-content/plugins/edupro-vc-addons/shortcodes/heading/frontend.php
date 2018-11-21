<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$google_fonts_obj = new Vc_Google_Fonts();

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ! empty( $atts['class'] ) ? ' ' . $atts['class'] : '';

$unique_class = 'heading--' . uniqid();
$class .= " $unique_class";
?>

<div class='heading<?php echo esc_attr( $class ); ?> <?php echo esc_attr( $atts['text_align'] ); ?>'>
	<?php if ( !empty( $atts['subtitle'] ) ): ?>
		<h3 class="heading__subtitle"><?php echo wp_kses_post( $atts['subtitle'] ); ?></h3>
	<?php endif; ?>
	<?php if ( !empty( $atts['title'] ) ): ?>
		<h2 class="heading__title"><?php echo wp_kses_post( $atts['title'] ); ?></h2>
	<?php endif; ?>
	<div class="heading__line"><div></div></div>
	<?php if ( !empty( $content ) ): ?>
		<h4 class="heading__description"><?php echo wp_kses_post( wpautop( $content ) ); ?></h4>
	<?php endif; ?>
</div>

<style>
	<?php
	$elements = array(	'title','subtitle','description' );
	foreach ( $elements as $element ) :
		$font = $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $atts[$element . '_fonts'] );
		$font = $font['values'];
		list( $font_family ) = explode( ':', $font['font_family'] . ':' );
		$font_style = explode( ':', $font['font_style'] . ':' );
		?>

		<?php if ( !empty( $font_family ) ) : ?>
			@import '//fonts.googleapis.com/css?family=<?php echo urlencode( $font['font_family'] ); ?>';
		<?php endif; ?>

		.<?php echo esc_html( $unique_class ); ?> .heading__<?php echo esc_html( $element ); ?>{
			<?php if ( !empty( $atts[$element . '_color'] ) ): ?>
				color: <?php echo strip_tags( $atts[$element . '_color'] ); ?>;
			<?php endif; ?>
			<?php if ( !empty( $atts[$element . '_font_size'] ) ): ?>
				font-size: <?php echo strip_tags( $atts[$element . '_font_size'] ) ?>;
			<?php endif; ?>
			<?php if ( !empty( $font_family ) ) : ?>
				font-family: <?php echo esc_html( $font_family ); ?>;
			<?php endif; ?>
			<?php if ( isset( $font_style[1] ) ) : ?>
				font-weight: <?php echo esc_html( $font_style[1] ); ?>;
			<?php endif; ?>
			<?php if ( isset( $font_style[2] ) ) : ?>
				font-style: <?php echo esc_html( $font_style[2] ); ?>;
			<?php endif; ?>
			<?php if ( !empty( $atts[$element . '_line_height'] ) ): ?>
				line-height: <?php echo strip_tags( $atts[$element . '_line_height'] ); ?>;
			<?php endif; ?>
			<?php if ( !empty( $atts[$element . '_letter_spacing'] ) ): ?>
				letter-spacing: <?php echo strip_tags( $atts[$element . '_letter_spacing'] ); ?>;
			<?php endif; ?>
		}
	<?php endforeach; ?>

	.<?php echo esc_attr( $unique_class ); ?> .heading__line > div {
		<?php if ( !empty( $atts['line_width'] ) ): ?>
			width: <?php echo strip_tags( $atts['line_width'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['line_height'] ) ): ?>
			height: <?php echo strip_tags( $atts['line_height'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['line_color'] ) ): ?>
			background: <?php echo strip_tags( $atts['line_color'] ); ?>;
		<?php endif; ?>
	}
	<?php if ( !empty( $atts['line_margin_top'] ) ): ?>
	.<?php echo esc_attr( $unique_class ); ?> .heading__line {
		margin-top: <?php echo strip_tags( $atts['line_margin_top'] ); ?>;
	}
	<?php endif; ?>
	<?php if ( ! empty( $atts['line_margin_bottom'] ) ): ?>
	.<?php echo esc_attr( $unique_class ); ?> .heading__line {
		margin-bottom: <?php echo strip_tags( $atts['line_margin_bottom'] ); ?>;
	}
	<?php endif; ?>
</style>

