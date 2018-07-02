<?php
/**
 * Hooks for importer
 *
 * @package ICOs
 */


/**
 * Importer the demo content
 *
 * @since  1.0
 *
 */
function icos_importer() {
	return array(
		array(
			'name'       => 'Home Muscari',
			'preview'    => get_template_directory_uri().'/framework/data/muscari/home-muscari.jpg',
			'content'    => get_template_directory_uri().'/framework/data/muscari/demo-content.xml',
			'customizer' => get_template_directory_uri().'/framework/data/muscari/customizer.dat',
			'widgets'    => get_template_directory_uri().'/framework/data/muscari/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'CRYPTICO NEWS',
			),
			'menus'      => array(
				'primary'    => 'multipage-menu',
				'onepage'    => 'onepage-menu',
				'footer'     => 'footer-menu',
			)
		),
		array(
			'name'       => 'Home Lavender',
			'preview'    => get_template_directory_uri().'/framework/data/lavender/home-lavender.jpg',
			'content'    => get_template_directory_uri().'/framework/data/lavender/demo-content.xml',
			'customizer' => get_template_directory_uri().'/framework/data/lavender/customizer.dat',
			'widgets'    => get_template_directory_uri().'/framework/data/lavender/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'CRYPTICO NEWS',
			),
			'menus'      => array(
				'primary'    => 'multipage-menu',
				'onepage'    => 'onepage-menu',
				'footer'     => 'footer-menu',
			)
		),
		array(
			'name'       => 'Home Azure',
			'preview'    => get_template_directory_uri().'/framework/data/azure/home-azure.jpg',
			'content'    => get_template_directory_uri().'/framework/data/azure/demo-content.xml',
			'customizer' => get_template_directory_uri().'/framework/data/azure/customizer.dat',
			'widgets'    => get_template_directory_uri().'/framework/data/azure/widgets.wie',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'ICO CRYPTO NEWS',
			),
			'menus'      => array(
				'primary'    => 'multipage-menu',
				'onepage'    => 'onepage-menu',
				'footer'     => 'footer-menu',
			)
		),		
		array(
			'name'       => 'Home Dark',
			'preview'    => get_template_directory_uri().'/framework/data/dark/home-dark.jpg',
			'content'    => get_template_directory_uri().'/framework/data/dark/demo-content.xml',
			'customizer' => get_template_directory_uri().'/framework/data/dark/customizer.dat',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'ICO CRYPTO NEWS',
			),
			'menus'      => array(
				'primary'    => 'multipage-menu',
				'onepage'    => 'onepage-menu',
			)
		),
		array(
			'name'       => 'Home Light',
			'preview'    => get_template_directory_uri().'/framework/data/light/home-light.jpg',
			'content'    => get_template_directory_uri().'/framework/data/light/demo-content.xml',
			'customizer' => get_template_directory_uri().'/framework/data/light/customizer.dat',
			'pages'      => array(
				'front_page' => 'Home',
				'blog'       => 'ICO CRYPTO NEWS',
			),
			'menus'      => array(
				'primary'    => 'multipage-menu',
				'onepage'    => 'onepage-menu',
			)
		),
	);
}

add_filter( 'soo_demo_packages', 'icos_importer', 30 );