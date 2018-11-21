<?php

$source = $images = $custom_srcs = $img_size = $external_img_size = $css = $class = $gal_images  = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );

$class .= ' edupro_gallery_slides ' . vc_shortcode_custom_css_class( $css, ' ' );


switch ( $source ) {
    case 'media_library':
        $images = explode( ',', $images );
        break;

    case 'external_link':
        $images = vc_value_from_safe( $custom_srcs );
        $images = explode( ',', $images );

        break;
}
foreach ( $images as $i => $image ) {
    switch ( $source ) {
        case 'media_library':
            if ( $image > 0 ) {
                $img           = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $img_size ) );
                $thumbnail     = $img['thumbnail'];
                $large_img_src = $img['p_img_large'][0];
            } else {
                $large_img_src = $default_src;
                $thumbnail     = '<img src="' . $default_src . '" />';
            }
            break;

        case 'external_link':
            $image         = esc_attr( $image );
            $dimensions    = vcExtractDimensions( $external_img_size );
            $hwstring      = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';
            $thumbnail     = '<img ' . $hwstring . ' src="' . $image . '" />';
            $large_img_src = $image;
            break;
    }


    $gal_images .= '<div class="item"><a  href="' . $large_img_src . '">' . $thumbnail .'</a></div>';

}

if(  empty( $gal_images ) ) {
	return;
}

?>
<div class="<?php echo esc_attr( 'edupro_gallery_slides' ); ?>">
    <div class="popup-gallery">
        <?php echo $gal_images; ?>
    </div>
</div>
