<?php
$show_topbar  = edupro_get_setting( 'show_topbar' );

if ( empty( $show_topbar ) ) {
	return;
}
?>
<?php if ( is_active_sidebar( 'topbar-left' ) || is_active_sidebar( 'topbar-right' ) ): ?>
	<div class="topbar clearfix">
		<div class="container">
			<div class="row">
				<div class="topbar__left col-md-6">
					<div class="topbar__left__content">
						<?php
						if ( is_active_sidebar( 'topbar-left' ) ) {
							dynamic_sidebar( 'topbar-left' );
						}
						?>
					</div>
				</div>
				<div class="topbar__right col-md-6">
					<div class="topbar__right_content">
						<?php
						if ( is_active_sidebar( 'topbar-right' ) ) {
							dynamic_sidebar( 'topbar-right' );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>