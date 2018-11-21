<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


$google_fonts_obj = new Vc_Google_Fonts();

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= empty( $atts['class'] ) ? '' : ' ' . $atts['class'];

$unique_class = 'team--' . uniqid();
$class .= " $unique_class";

$css_trans = '';

$google_fonts_obj = new Vc_Google_Fonts();
?>

<div class="team<?php echo esc_attr( $class ); ?>" <?php echo $css_trans; ?>>
	<div class="team_container">
		<?php if( ! empty( $atts['image'] ) ): ?>
		<div class="team__image">
			<img src="<?php echo esc_url( wp_get_attachment_url( $atts['image'] ) ); ?>">
		</div>
		<?php endif; ?>
		<div class="team__info  <?php echo esc_attr( $atts['text_align'] ); ?>">
			<?php if ( !empty( $atts['name'] ) ): ?>
				<h3 class="team__info__name"><?php echo wp_kses_post( $atts['name'] ); ?></h3>
			<?php endif; ?>
			<div class="team__info__line"><div></div></div>
			<?php if ( !empty( $content ) ): ?>
				<div class="team__info__description"><?php echo wp_kses_post( wpautop( $content ) ); ?></div>
			<?php endif; ?>
		</div>

		<ul class="team__social-links">
			<?php
			$socials = array( 'facebook', 'instagram', 'google_pls', 'linkedin', 'youtube', 'twitter', 'flick', 'digg' );
			foreach ( $socials as $social ) :
				if ( empty( $atts[$social] ) ) {
					continue;
				}
				echo "<li><a href='". esc_attr( $atts[$social] ) ."'><i class='{$atts['icon-'.$social]}'></i></a></li>";
			endforeach;
			?>
		</ul>
		
		<style>
			<?php
			$elements = array(	'name','designation','description' );
			foreach ( $elements as $element ) :

				if( ! isset( $atts[$element . '_fonts'] ) ) {
					continue;
				}

				$font = $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $atts[$element . '_fonts'] );
				$font = $font['values'];
				list( $font_family ) = explode( ':', $font['font_family'] . ':' );
				$font_style = explode( ':', $font['font_style'] . ':' );
				?>
				<?php if ( !empty( $font_family ) ) : ?>
				@import '//fonts.googleapis.com/css?family=<?php echo urlencode( $font['font_family'] ); ?>';
				<?php endif; ?>
				.team.<?php echo esc_html( $unique_class ); ?> .team__info  .team__info__<?php echo esc_html( $element ); ?> {
					<?php if ( isset( $atts[$element . '_color'] ) ) : ?>
						color: <?php echo strip_tags( $atts[$element . '_color'] ); ?>;
					<?php endif; ?>

					<?php if ( !empty ( $atts[$element . '_font_size'] ) ) : ?>
						font-size: <?php echo strip_tags( $atts[$element . '_font_size'] ) ?>;
					<?php endif; ?>

					<?php if ( !empty ( $font_family ) ): ?>
						font-family: <?php echo esc_html( $font_family ); ?>;
				    <?php endif; ?>

					<?php if ( !empty( $font_style[1] ) ) : ?>
						font-weight: <?php echo esc_html( $font_style[1] ); ?>;
				    <?php endif; ?>

					<?php if ( !empty ( $font_style[2] ) ): ?>
						font-style: <?php echo esc_html( $font_style[2] ); ?>;
				    <?php endif; ?>

					<?php if ( !empty ( $atts[$element . '_line_height'] ) ): ?>
						line-height: <?php echo strip_tags( $atts[$element . '_line_height'] ); ?>;
					<?php endif; ?>

					<?php if ( !empty ( $atts[$element . '_letter_spacing'] ) ) : ?>
							letter-spacing: <?php echo strip_tags( $atts[$element . '_letter_spacing'] ); ?>;
					<?php endif; ?>

					<?php
					if ( !empty ( $atts[$element . '_padding'] ) ){
						echo strip_tags( $atts[$element . '_padding'] );
					}
					?>
				}
			<?php endforeach; ?>

			.team.<?php echo esc_attr( $unique_class );?> .team__info .team__info__line > div {
				<?php if ( !empty( $atts['line_width'] ) ): ?>
					width: <?php echo strip_tags( $atts['line_width'] ); ?>;
				<?php endif; ?>
				<?php if ( $atts['line_height'] ): ?>
					height: <?php echo strip_tags( $atts['line_height'] ); ?>;
				<?php endif; ?>
				<?php if ( $atts['line_color'] ): ?>
					background: <?php echo strip_tags( $atts['line_color'] ); ?>;
				<?php endif; ?>
			}
			.team.<?php echo esc_attr( $unique_class ); ?> .team__info .team__info__line {
				<?php if ( $atts['line_margin_top'] ): ?>
					margin-top: <?php echo strip_tags( $atts['line_margin_top'] ); ?>;
				<?php endif; ?>
			}
			.team.<?php echo esc_attr( $unique_class ); ?> .team__info .team__info__line {
				<?php if ( $atts['line_margin_bottom'] ): ?>
					margin-bottom: <?php echo strip_tags( $atts['line_margin_bottom'] ); ?>;
				<?php endif; ?>
			}
			.team.<?php echo esc_attr( $unique_class ); ?> .team__social-links li a:hover {
				color: <?php echo strip_tags( $atts['line_color'] ); ?>;
			}
		</style>
	</div>
</div>
