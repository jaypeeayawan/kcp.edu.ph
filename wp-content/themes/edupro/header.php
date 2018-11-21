<?php
/**
 * Home 1, 2, 3, 4, 5
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPro
 */

?><!DOCTYPE html>
<html <?php edupro_html_tag_schema(); ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'edupro' ); ?></a>
	<?php
	get_template_part( 'template-parts/header/top-slider' );
	get_template_part( 'template-parts/topbar' );
	get_template_part( 'template-parts/header/style' . edupro_get_setting( 'header_style' ) );
	?>
	<div id="content" class="site-content">
