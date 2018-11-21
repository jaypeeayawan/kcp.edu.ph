<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$link = vc_build_link( $atts['link'] );
if ( empty( $link['url'] ) ) {
	return;
}

// Button class
$unique_class = 'button--' . uniqid();
$class        = vc_shortcode_custom_css_class( $atts['css'], ' ' );
if ( ! empty( $atts['class'] ) ) {
	$class .= ' ' . $atts['class'];
}
if ( ! empty( $atts['size'] ) ) {
	$class .= " button--{$atts['size']}";
}
if ( ! empty( $atts['align'] ) ) {
	$class .= " button--{$atts['align']}";
}
if ( ! empty( $atts['border_style'] ) ) {
	$class .= " button--{$atts['border_style']}";
}
$class .= " $unique_class";
$class = trim( $class );

// Icon
$icon = '';
if ( ! empty( $atts['icon'] ) ) {
	$class .= " button--icon button--icon-{$atts['icon_position']}";
	$icon = "<i class='{$atts['icon']}'></i>";
}

$button = sprintf(
	'<a href="%s" class="button %s" target="%s" rel="%s">%s%s</a>',
	esc_url( $link['url'] ),
	strip_tags( $class ),
	esc_attr( $link['target'] ),
	esc_attr( $atts['rel'] ),
	$icon && 'right' == $atts['icon_position'] ? esc_html( $link['title'] ) : $icon,
	$icon && 'right' == $atts['icon_position'] ? $icon : esc_html( $link['title'] )
);
if ( ! empty( $atts['no_link'] ) ) {
	$button = sprintf(
		'<div class="fw_text %s">%s%s</div>',
		strip_tags( $class ),
		$icon && 'right' == $atts['icon_position'] ? esc_html( $link['title'] ) : $icon,
		$icon && 'right' == $atts['icon_position'] ? $icon : esc_html( $link['title'] )
	);
}
// Center the button
$open = $close = '';
if ( 'center' == $atts['align'] ) {
	$open  = '<div style="text-align: center">';
	$close = '</div>';
}
if ( 'left' == $atts['align'] ) {
	$open  = '<div style="text-align: left">';
	$close = '</div>';
}
if ( 'right' == $atts['align'] ) {
	$open  = '<div style="text-align: right">';
	$close = '</div>';
}

echo $open, $button, $close;

$google_fonts_obj = new Vc_Google_Fonts();
$font = $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $atts['font'] );
$font = $font['values'];
list( $font_family ) = explode( ':', $font['font_family'] . ':' );
$font_style = explode( ':', $font['font_style'] . ':' );
?>
<style>
	<?php if ( ! empty( $font_family ) ) : ?>
		@import '//fonts.googleapis.com/css?family=<?php echo urlencode( $font['font_family'] ); ?>';
	<?php endif; ?>

	/* Custom style */
	.<?php echo esc_html( $unique_class ); ?> {
		<?php if ( 'custom' == $atts['size'] && $atts['padding_left'] ) : ?>
			padding-left: <?php echo esc_html( $atts['padding_left'] ); ?>;
			padding-right: <?php echo esc_html( $atts['padding_left'] ); ?>;
		<?php endif; ?>
		<?php if ( 'custom' == $atts['size'] && $atts['padding_top'] ) : ?>
			padding-top: <?php echo esc_html( $atts['padding_top'] ); ?>;
			padding-bottom: <?php echo esc_html( $atts['padding_top'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['background_color'] ) ) : ?>
			background-color: <?php echo esc_html( $atts['background_color'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['text_color'] ) ) : ?>
			color: <?php echo esc_html( $atts['text_color'] ); ?>;
		<?php endif; ?>

		<?php if ( empty( $atts['border_style'] ) ) : ?>
			border: 0;
		<?php endif; ?>
		<?php if ( !empty( $atts['border_color'] ) ) : ?>
			border-color: <?php echo esc_html( $atts['border_color'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['border_width'] ) ) : ?>
			border-width: <?php echo esc_html( $atts['border_width'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['border_radius'] ) ) : ?>
			border-radius: <?php echo esc_html( $atts['border_radius'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['font_size'] ) ) : ?>
			font-size: <?php echo esc_html( $atts['font_size'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['line_height'] ) ) : ?>
			line-height: <?php echo esc_html( $atts['line_height'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['letter_spacing'] ) ) : ?>
			letter-spacing: <?php echo esc_html( $atts['letter_spacing'] ); ?>;
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
	}
	/* Hover */
	.<?php echo esc_html( $unique_class ); ?>:visited,
	.<?php echo esc_html( $unique_class ); ?>:focus {
		<?php if ( !empty( $atts['text_color'] ) ) : ?>
			color: <?php echo esc_html( $atts['text_color'] ); ?>;
		<?php endif; ?>
	}
	/* Hover */
	.<?php echo esc_html( $unique_class ); ?>:hover {
		<?php if ( !empty( $atts['background_hover_color'] ) ) : ?>
			background-color: <?php echo esc_html( $atts['background_hover_color'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['text_color_hover'] ) ) : ?>
			color: <?php echo esc_html( $atts['text_color_hover'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty( $atts['border_hover_color'] ) ) : ?>
			border-color: <?php echo esc_html( $atts['border_hover_color'] ); ?>;
		<?php endif; ?>
	}
	/* Icon */
	<?php if ( !empty( $atts['icon_size'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> i {
			font-size: <?php echo esc_html( $atts['icon_size'] ); ?>;
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_space_left'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> i {
			margin-left: <?php echo esc_html( $atts['icon_space_left'] ); ?>;
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_space_right'] ) ) : ?>
	.button.<?php echo esc_html( $unique_class ); ?> i {
		margin-right: <?php echo esc_html( $atts['icon_space_right'] ); ?>;
	}
	<?php endif; ?>
</style>