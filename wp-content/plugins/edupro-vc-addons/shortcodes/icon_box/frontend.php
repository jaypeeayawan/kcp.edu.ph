<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= !empty( $atts['class'] ) ? ' ' . $atts['class'] : '';

$unique_class = 'icon-box--' . uniqid();
$class .= " $unique_class";
?>

<div class="icon-box<?php echo esc_attr( $class ); ?> icon-box__icon--<?php echo esc_attr( $atts['icon_position'] ); ?> <?php echo ( $atts['image_hover'])?'icon-box__hover':'' ?>">
	<?php if ( 'icon' == $atts['icon_type'] && $atts['icon'] ) : ?>
		<div class="icon-box__icon icon-box__icon--icon">
			<i class="<?php echo esc_attr( $atts['icon'] ); ?>"></i>
		</div>
	<?php elseif ( 'image' == $atts['icon_type'] && $atts['image'] ): ?>
		<div class="icon-box__icon icon-box__icon--image">
			<img class="img_active" src="<?php echo esc_url( wp_get_attachment_url( $atts['image'] ) ); ?>">
			<?php if ( $atts['image_hover']): ?>
				<img class="hidden img_hover" src="<?php echo esc_url( wp_get_attachment_url( $atts['image_hover'] ) ); ?>">
			<?php endif;?>
		</div>
	<?php endif; ?>
	<div class="icon-box__content icon-box__content--<?php echo esc_attr( $atts['text_align'] ); ?>">
		<div class="icon-box__title">
			<?php echo esc_html( $atts['title'] ); ?>
		</div>
		<div class="icon-box__line"></div>
		<div class="icon-box__text">
			<?php echo strip_tags( $atts['text'] , '<br>'); ?>
		</div>
	</div>
</div>

<style>
	/* Content */
	<?php if ( $atts['icon_position'] == 'float-left' || $atts['icon_position'] == 'float-right' ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon--icon:after {
			pointer-events: none;
            position: absolute;
            border-radius: 50%;
            content: '';
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            padding: 0;
            border: 2px solid #08ada7;
            opacity: 0.5;
            z-index: -1;
            transform: scale(1);
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['font_size_title'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__title {
			font-size: <?php echo strip_tags( $atts['font_size_title'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['font_size_content'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__text {
			font-size: <?php echo strip_tags( $atts['font_size_content'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['title_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__title {
			color: <?php echo strip_tags( $atts['title_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['text_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__text {
			color: <?php echo strip_tags( $atts['text_color'] ); ?>
		}
	<?php endif; ?>

	<?php if ( !empty( $atts['line_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__line {
			background: <?php echo strip_tags( $atts['line_color'] ); ?>
		}
	<?php endif; ?>

	/* Icon */
	<?php if ( !empty( $atts['icon_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon i {
			color: <?php echo strip_tags( $atts['icon_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_bg_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon {
			background: <?php echo strip_tags( $atts['icon_bg_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_border_color'] ) ) : ?>
		.<?php echo esc_html($unique_class ); ?> .icon-box__icon {
			border-color: <?php echo strip_tags( $atts['icon_border_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_hover_border_color'] ) ) : ?>
	.<?php echo esc_html( $unique_class ); ?> .icon-box__icon--icon:after {
		border-color: <?php echo strip_tags( $atts['icon_hover_border_color'] ); ?>
	}
	<?php endif; ?>

	/* Icon hover */
	<?php if ( !empty( $atts['icon_hover_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon:hover i {
			color: <?php echo strip_tags( $atts['icon_hover_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_hover_bg_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon:hover {
			background: <?php echo strip_tags( $atts['icon_hover_bg_color'] ); ?>
		}
	<?php endif; ?>
	<?php if ( !empty( $atts['icon_hover_border_color'] ) ) : ?>
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon:hover {
			border-color: <?php echo strip_tags( $atts['icon_hover_border_color'] ); ?>
		}
		.<?php echo esc_html( $unique_class ); ?> .icon-box__icon--icon:hover:after {
			border-color: <?php echo strip_tags( $atts['icon_hover_border_color'] ); ?>
		}
	<?php endif; ?>

	/* Icon box */
	.<?php echo esc_attr( $unique_class ); ?> .icon-box__line {
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
	<?php if ( !empty( $atts['line_margin_top'] ) ) : ?>
	.<?php echo esc_attr( $unique_class ); ?> .icon-box__line {
		margin-top: <?php echo strip_tags( $atts['line_margin_top'] ); ?>;
	}
	<?php endif; ?>

	<?php if ( !empty( $atts['line_margin_bottom'] ) ): ?>
	.<?php echo esc_attr( $unique_class ); ?> .icon-box__line {
			margin-bottom: <?php echo strip_tags( $atts['line_margin_bottom'] ); ?>;
	}
	<?php endif; ?>
</style>