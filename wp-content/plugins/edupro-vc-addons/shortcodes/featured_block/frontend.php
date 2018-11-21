<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= ' ' . $atts['class'];
$class .= " featured-block--s{$atts['style']}";
$unique_class = 'featured-block--' . uniqid();
$class .= " $unique_class";
$class = trim( $class );
$link = vc_build_link( $atts['link'] );

?>
<div class="featured-block <?php echo esc_attr( $class ); ?>">
	<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>" class="featured-block-link">
		<p class="featured-block__button <?php echo esc_attr( $atts['size_box'] ) ?>">
			<i class="<?php echo esc_attr( $atts['icon'] ); ?>"></i>
			<?php echo esc_html( $link['title'] ); ?>
			<?php if($atts['style'] == 3): ?>
				<span><?php echo esc_html($atts['featured_number']); ?></span>
			<?php endif; ?>
		</p>
	</a>
</div>


<style>
	.<?php echo esc_html($unique_class) ?> {
		<?php if( ! empty( $atts['featured_height'] ) ): ?>
			height: <?php echo esc_html( $atts['featured_height'] )?>;
		<?php endif; ?>
	}
</style>
