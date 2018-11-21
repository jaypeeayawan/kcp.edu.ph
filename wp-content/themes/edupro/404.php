<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EduPro
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">
			<section class="error-404 not-found">
				<header class="text-center">
					<img src="http://i.imgur.com/SAjOlgW.png">
					<h1 class="page-title"><?php esc_html_e( "Sorry, we can't find the page you are looking for. Please go to ", 'edupro' ); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home','edupro' ); ?></a></h1>
					<div id="search_input">
						<div class="input-group stylish-input-group">
							<form role="search" method="get" class="search-form"
							      action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="search" class="form-control"
								       placeholder="<?php esc_attr_e( 'Search &hellip;', 'edupro' ); ?>"
								       value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
								<i class="fa fa-search" aria-hidden="true">
									<button type="submit"></button>
								</i>
							</form>
						</div>
					</div>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
