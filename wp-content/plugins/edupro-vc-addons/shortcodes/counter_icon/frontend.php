<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$google_fonts_obj = new Vc_Google_Fonts();

$class = vc_shortcode_custom_css_class( $atts['css'], ' ' );
$class .= empty( $atts['class'] ) ? '' : ' ' . $atts['class'];

?>

<div class="counter_icon <?php echo esc_attr( $class ); ?>">
	<div class="counter_icon__1 col-sm-3 col-md-3">
        <div class="col-md-2">
            <div class="<?php if( ! empty( $atts['icon-1'] ) ) : echo esc_html( $atts['icon-1'] ); endif; ?>"></div>
        </div>
        <div class="col-md-10">
            <div class="counter"><?php if( ! empty( $atts['cu_number_1'] ) ) : echo esc_html( $atts['cu_number_1'] );  endif; ?></div>
            <div class="counter_text"><?php if( ! empty( $atts['cu_text_1'] ) ) : echo esc_html( $atts['cu_text_1'] );  endif; ?></div>
        </div>
    </div>
    <div class="counter_icon__2 col-sm-3 col-md-3">   
        <div class="col-md-2">
            <div class="<?php if( ! empty( $atts['icon-2'] ) ) : echo esc_html( $atts['icon-2'] );  endif; ?>"></div>
        </div>
        <div class="col-md-10">
         	<div class="counter"><?php if( ! empty( $atts['cu_number_2'] ) ) : echo esc_html( $atts['cu_number_2'] );  endif; ?></div>
         	<div class="counter_text"><?php if( ! empty( $atts['cu_text_2'] ) ) : echo esc_html( $atts['cu_text_2'] );  endif; ?></div>
        </div>
     </div>
    <div class="counter_icon__3 col-sm-3 col-md-3">    
        <div class="col-md-2">
            <div class="<?php if( ! empty( $atts['icon-3'] ) ) : echo esc_html( $atts['icon-3'] );  endif; ?>"></div>
        </div>
        <div class="col-md-10">
       	 	<div class="counter"><?php if( ! empty( $atts['cu_number_3'] ) ) : echo esc_html( $atts['cu_number_3'] );  endif; ?></div>
       	 	<div class="counter_text"><?php if( ! empty( $atts['cu_text_3'] ) ) : echo esc_html( $atts['cu_text_3'] );  endif; ?></div>
        </div>
   	 </div>
    <div class="counter_icon__4 col-sm-3 col-md-3">   
        <div class="col-md-2">
            <div class="<?php if( ! empty( $atts['icon-4'] ) ) : echo esc_html( $atts['icon-4'] );  endif; ?>"></div>
        </div>
        <div class="col-md-10">
         	<div class="counter"><?php if( ! empty( $atts['cu_number_4'] ) ) : echo esc_html( $atts['cu_number_4'] );  endif; ?></div>
         	<div class="counter_text"><?php if( ! empty( $atts['cu_text_4'] ) ) : echo esc_html( $atts['cu_text_4'] );  endif; ?></div>
        </div>
     </div>
</div>

<style>
    <?php
    if ( ! empty( $font_family ) ) : ?>
        @import '//fonts.googleapis.com/css?family=<?php echo urlencode( $font['font_family'] ); ?>';
    <?php endif; ?>

    .counter_icon .counter_text {
        <?php if ( ! empty( $font_family ) ) : ?>
            font-family: <?php echo esc_html( $font_family ); ?>;
        <?php endif; ?>
        <?php if ( isset( $font_style[1] ) ) : ?>
            font-weight: <?php echo esc_html( $font_style[1] ); ?>;
        <?php endif; ?>
        <?php if ( isset( $font_style[2] ) ) : ?>
            font-style: <?php echo esc_html( $font_style[2] ); ?>;
        <?php endif; ?>
    }
</style>