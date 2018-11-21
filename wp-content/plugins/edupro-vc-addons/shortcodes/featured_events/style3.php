<?php
echo '<div class="row">';

$col = 'col-md-6';
$number_event = !empty( $atts['number'] ) ? $atts['number'] :  4;

if ( $number_event <= 2 ) {
	$col = 'col-md-6';
} else if ( $number_event == 3 ) {
	$col = 'col-md-4';
} else if ( $number_event >= 4 ) {
	$col = 'col-md-3';
}

while ( $query->have_posts() ) : $query->the_post();
	echo '<div class="featured-event ' . esc_attr( $col ) . '">';
		include( 'include-style4.php' );
		echo '</div>';
endwhile;

echo '
</div>';