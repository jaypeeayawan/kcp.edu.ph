<?php
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	$class .= ! empty( $atts['class'] ) ? ' ' . $atts['class'] : '';
	$unique_class = 'pricing-table--' . uniqid();
?>

<div class="pricing-table <?php echo esc_html__($unique_class); ?>">
	<div class="pricing-heading">
	<h4><?php echo esc_html($atts['pricing_package']) ?></h4>
	<h3>
		<?php echo esc_html($atts['pricing_price']) ?>
		<span><?php echo '/'.esc_html__($atts['pricing_period']) ?></span>
	</h3>
	</div>
	<div class="pricing-table<?php echo esc_attr( $class ); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>

<style>
	<?php if ( !empty( $atts['package_background_color'] ) ) : ?>
	.<?php echo esc_html($unique_class); ?>.pricing-table .pricing-heading {
		background-color: <?php echo esc_html__( $atts['package_background_color']); ?>
	}
	<?php endif; ?>
	<?php if ( !empty( $atts['package_color'] ) ) : ?>
	.<?php echo esc_html($unique_class); ?>.pricing-table .pricing-heading h4 {
		color: <?php echo esc_html( $atts['package_background_color']);  ?>
	}
	<?php endif; ?>
	<?php if ( !empty( $atts['price_color'] ) ) : ?>
	.<?php echo esc_html($unique_class); ?>.pricing-table .pricing-heading h3{
		color: <?php echo esc_html( $atts['price_color']); ?>
	}
	<?php endif;  ?>
	<?php if ( !empty( $atts['period_color'] ) ) : ?>
	.<?php echo esc_html($unique_class); ?>.pricing-table .pricing-heading h3 span {
		color: <?php echo esc_html( $atts['period_color'] ); ?>
	}
	<?php endif;  ?>
</style>