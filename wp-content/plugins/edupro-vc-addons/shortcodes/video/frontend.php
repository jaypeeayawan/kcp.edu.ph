<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];

if( empty( $atts['link'] ) ) {
	return;
}
?>
<a href="<?php echo esc_url( $atts['link'] ); ?>" class="popup-video<?php echo esc_attr( $class ); ?>">
	<?php if( ! empty( $atts['cover'] ) ) : ?><img src="<?php echo esc_url( wp_get_attachment_url( $atts['cover'] ) ); ?>" alt=""> <?php endif; ?>
	<i class="fa fa-play-circle"></i>
</a>

<style>
	.popup-video i {
		<?php if ( !empty( $atts['font_size_play']  ) ): ?>
			font-size: <?php echo strip_tags( $atts['font_size_play'] ); ?>;
		<?php endif; ?>
		<?php if ( !empty(  $atts['color_play_color'] ) ): ?>
			color: <?php echo strip_tags( $atts['color_play_color'] ); ?>;
		<?php endif; ?>
	}
	.popup-video i:hover {
		<?php if ( !empty( $atts['hover_color_play_color'] ) ): ?>
			color: <?php echo strip_tags( $atts['hover_color_play_color'] ); ?>;
		<?php endif; ?>
	}
</style>