<?php
/**
 * Icos theme customizer
 *
 * @package Icos
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Icos_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
	public function get_option_default( $name ) {
		if ( ! isset( $this->config['fields'][ $name ] ) ) {
			return false;
		}

		return isset( $this->config['fields'][ $name ]['default'] ) ? $this->config['fields'][ $name ]['default'] : false;
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function icos_get_option( $name ) {
	global $icos_customize;

	if ( empty( $icos_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $icos_customize->get_theme(), $name );
	} else {
		$value = $icos_customize->get_option( $name );
	}

	return apply_filters( 'icos_get_option', $value, $name );
}

/**
 * Get default option values
 *
 * @param $name
 *
 * @return mixed
 */
function icos_get_option_default( $name ) {
	global $icos_customize;

	if ( empty( $icos_customize ) ) {
		return false;
	}

	return $icos_customize->get_option_default( $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function icos_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'icos_customize_modify' );

/**
 * Customizer configuration
 */
$icos_customize = new Icos_Customize(
	array(
		'theme'    => 'icos',

		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_html__( 'General', 'icos' ),
			),
			'header'  => array(
				'priority' => 110,
				'title'    => esc_html__( 'Header', 'icos' ),
			),
			'footer'  => array(
				'priority' => 110,
				'title'    => esc_html__( 'Footer', 'icos' ),
			),
		),

		'sections' => array(

			// Panel Header
			'logo'        => array(
				'title'       => esc_html__( 'Site Logo', 'icos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'topmenu'     => array(
				'title'       => esc_html__( 'Menu', 'icos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'buttons'     => array(
				'title'       => esc_html__( 'Buttons', 'icos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'language'     => array(
				'title'       => esc_html__( 'Language Switcher', 'icos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'page_header' => array(
				'title'       => esc_html__( 'Page Header', 'icos' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			
			// Panel Content
			'content'     => array(
				'title'       => esc_html__( 'Blog', 'icos' ),
				'description' => '',
				'priority'    => 110,
				'capability'  => 'edit_theme_options',
			),

			// Panel Footer
			'subscribe'     => array(
				'title'       => esc_html__( 'Subscribe', 'icos' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
				'panel'       => 'footer',
			),
			'copyright'     => array(
				'title'       => esc_html__( 'Copyright', 'icos' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
				'panel'       => 'footer',
			),
			'socials'     => array(
				'title'       => esc_html__( 'Socials', 'icos' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
				'panel'       => 'footer',
			),

			//Typography
			'typography'   => array(
				'priority'    => 120,
				'title'       => esc_html__( 'Typography', 'icos' ),
				'capability'  => 'edit_theme_options',
			),

			// Panel Styling
			'styling'     => array(
				'title'       => esc_html__( 'Miscellaneous', 'icos' ),
				'description' => '',
				'priority'    => 120,
				'capability'  => 'edit_theme_options',
			),

		),

		'fields'   => array(

			//Menu Top
			'sticky'       => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Sticky Header', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '1',
				'priority' => 10,
			),
			'msticky'      => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Sticky On Mobile', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '0',
				'priority' => 10,
			),
			'bg_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Navigation', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header .navbar.is-transparent',
						'property' => 'background'
					),
				),
			),
			'color_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Menu', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header .navbar-nav > li > a',
						'property' => 'color'
					),
				),
			),
			'bg_sh'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Scroll Menu', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header.has-fixed .navbar, .io-azure .site-header.has-fixed .navbar.is-transparent, .io-azure .site-header .navbar.is-transparent.enable',
						'property' => 'background'
					),
				),
			),
			'color_sh'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Scroll Menu', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header.has-fixed ul.navbar-nav > li > a',
						'property' => 'color'
					),
				),
			),			
			'bg_smenu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Dropdown Menu', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-nav .sub-menu, .io-azure .navbar .navbar-nav .sub-menu',
						'property' => 'background'
					),
				),
			),
			'color_smenu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Dropdown Menu', 'icos' ),
				'section'  => 'topmenu',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-nav .sub-menu li a',
						'property' => 'color'
					),
				),
			),

			//Buttons
			'btn_nav'      => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Navigation Buttons', 'icos' ),
				'section'  => 'buttons',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Label Button', 'icos' ),
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link Button', 'icos' ),
					),
				),
			),
			'btn_bg'       => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Button', 'icos' ),
				'section'  => 'buttons',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn',
						'property' => 'background'
					),
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn',
						'property' => 'border-color'
					),
				),
			),
			'btn_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Button', 'icos' ),
				'section'  => 'buttons',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn',
						'property' => 'color'
					),
				),
			),
			'btn_hbg'      => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Hover Background Button', 'icos' ),
				'section'  => 'buttons',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn:hover',
						'property' => 'background'
					),
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn:hover',
						'property' => 'border-color'
					),
				),
			),
			'btn_hcolor'   => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Hover Color Button', 'icos' ),
				'section'  => 'buttons',
				'default'  => '',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.navbar .navbar-btns > li > a.nav-link.btn:hover',
						'property' => 'color'
					),
				),
			),

			// Logo
			'logo'         => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo Image', 'icos' ),
				'section'  => 'logo',
				'default'  => get_template_directory_uri() . '/assets/images/logo-white.png',
				'priority' => 10,
			),
			'logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header .navbar-brand img',
						'property' => 'width',
						'units'	   => 'px'
					),
				),
			),
			'logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.site-header .navbar-brand img',
						'property' => 'height',
						'units'	   => 'px'
					),
				),
			),
			'logo_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '20px',
					'bottom' => '20px',
					'left'   => '0',
					'right'  => '15px',
				),
				'output'    => array(
					array(
						'element'  => '.site-header .navbar-brand',
						'property' => 'margin',
					),
				),
			),
			'logo2'        => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Scroll Logo Image', 'icos' ),
				'section'  => 'logo',
				'default'  => get_template_directory_uri() . '/assets/images/logo-white.png',
				'priority' => 10,
			),
			'logo2_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.has-fixed.site-header .navbar-brand img',
						'property' => 'width',
						'units'	   => 'px'
					),
				),
			),
			'logo2_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.has-fixed.site-header .navbar-brand img',
						'property' => 'height',
						'units'	   => 'px'
					),
				),
			),
			'logo2_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin', 'icos' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '20px',
					'bottom' => '20px',
					'left'   => '0',
					'right'  => '15px',
				),
				'output'    => array(
					array(
						'element'  => '.has-fixed.site-header .navbar-brand',
						'property' => 'margin',
					),
				),
			),

			//Language Switcher
			'slanguage'  => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Position Switcher', 'icos' ),
				'section'  => 'language',
				'default'  => 'alogo',
				'priority' => 10,
				'choices'  => array(
					'alogo' 	 => esc_html__( 'After Logo', 'icos' ),
					'amenu' 	 => esc_html__( 'Atter Menu', 'icos' ),
				),
			),
			'cl_lang'  => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Language', 'icos' ),
				'section'  => 'language',
				'default'  => '',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.site-header .switcher-top .wpml-ls-legacy-dropdown a, .site-header .switcher-top .wpml-ls-legacy-dropdown a:hover, .site-header .switcher-top .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a',
						'property' => 'color'
					),
				),
			),
			'cl_slang'  => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Scroll Language', 'icos' ),
				'section'  => 'language',
				'default'  => '',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown > ul > li > a, .site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown a:hover, .site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a',
						'property' => 'color'
					),
					array(
						'element'  => '.site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown > ul > li > a, .site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown a:hover, .site-header.has-fixed .switcher-top .wpml-ls-legacy-dropdown .wpml-ls-current-language:hover>a',
						'property' => 'border-color'
					),
				),
			),
			'bg_dlang'  => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Dropdown', 'icos' ),
				'section'  => 'language',
				'default'  => '',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.site-header .switcher-top .wpml-ls-legacy-dropdown .wpml-ls-sub-menu',
						'property' => 'background'
					),
				),
			),
			'cl_dlang'  => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Dropdown', 'icos' ),
				'section'  => 'language',
				'default'  => '',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.site-header .switcher-top .wpml-ls-legacy-dropdown .wpml-ls-sub-menu a',
						'property' => 'color'
					),
				),
			),

			// Page Header
			'page_header'    => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Page Header', 'icos' ),
				'description' => esc_html__( 'Enable to show page header on whole site', 'icos' ),
				'section'     => 'page_header',
				'default'     => '1',
				'priority'    => 10,
			),
			'head_height'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Page Heading Height', 'icos' ),
				'section'  => 'page_header',
				'default'  => '280',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'output'   => array(
					array(
						'element'  => '.page-banner',
						'property' => 'min-height',
						'units'	   => 'px'
					),
				),
			),
			'page_header_bg' => array(
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'icos' ),
				'description' => esc_html__( 'Upload a page header background image', 'icos' ),
				'section'     => 'page_header',
				'default'     => '',
				'priority'    => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'page_header_img' => array(
				'type'        => 'image',
				'label'       => esc_html__( 'Top Image', 'icos' ),
				'description' => esc_html__( 'Upload a page header top image', 'icos' ),
				'section'     => 'page_header',
				'default'     => '',
				'priority'    => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'page_bg_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'icos' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'output'    => array(
					array(
						'element'  => '#wrapper .page-banner',
						'property' => 'background'
					),
				),
			),
			'page_header_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Heading', 'icos' ),
				'section'  => 'page_header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'output'    => array(
					array(
						'element'  => '#wrapper h2.page-heading',
						'property' => 'color'
					),
				),
			),
			'head_size'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Heading Font Size', 'icos' ),
				'section'  => 'page_header',
				'default'  => '34',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
				'output'   => array(
					array(
						'element'  => 'h2.page-heading',
						'property' => 'font-size',
						'units'	   => 'px'
					),
				),
			),

			// Content
			'blog_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Blog List Layout', 'icos' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'post_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Single Blog Layout', 'icos' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'title_single' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Title Header Single', 'icos' ),
				'section' 		=> 'content',
				'default' 		=> '',
				'priority'    	=> 12,
			),
			'excerpt_length' => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Excerpt Length', 'icos' ),
				'section'  => 'content',
				'default'  => 16,
				'choices'  => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),

			//Footer
			'subscribe'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Subscribe Footer', 'icos' ),
				'section'     => 'subscribe',
				'default'     => '1',
				'priority'    => 10,
			),	
			'subc_title'   => array(
				'type'     => 'text',
				'label'    => esc_html__( 'Subscribe Title', 'icos' ),
				'section'  => 'subscribe',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'subc_form'   => array(
				'type'     => 'text',
				'label'    => esc_html__( 'Subscribe Form Shortcode', 'icos' ),
				'section'  => 'subscribe',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),	
			'ptop_subc'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Top', 'icos' ),
				'section'  => 'subscribe',
				'priority' => 10,
				'default'  => '',	
				'output'    => array(
					array(
						'element'  => '.subscribe-section',
						'property' => 'padding-top',
						'units'	   => 'px'
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'pbot_subc'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Bottom', 'icos' ),
				'section'  => 'subscribe',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.subscribe-section',
						'property' => 'padding-bottom',
						'units'	   => 'px'
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bgi_subs'     => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background Image Subscribe', 'icos' ),
				'section'  => 'subscribe',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.subscribe-section',
						'property' => 'background-image',
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bg_subc'      => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color Subscribe', 'icos' ),
				'section'  => 'subscribe',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.subscribe-section',
						'property' => 'background-color',
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_subc'   => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Subscribe', 'icos' ),
				'section'  => 'subscribe',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => '.section-title-md',
						'property' => 'color',
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'subscribe',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),

			//Social Footer
			'social_style' => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Socials Style', 'icos' ),
				'section'  => 'socials',
				'default'  => 's1',
				'priority' => 10,
				'choices'  => array(
					's1' 	 	 => esc_html__( 'Style 1', 'icos' ),
					's2' 	 	 => esc_html__( 'Style 2', 'icos' ),
				),
			),
			'sotitle'   => array(
				'type'     => 'text',
				'label'    => esc_html__( 'Title Left', 'icos' ),
				'section'  => 'socials',
				'default'  => 'FOLLOW US',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'social_style',
					  	'operator' => '==',
					  	'value'    => 's2',
				 	),
				),
			),
			'socials'      => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials', 'icos' ),
				'section'  => 'socials',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'icos' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'icos' ),
						'default'     => '',
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link URL', 'icos' ),
						'description' => esc_html__( 'This will be the social link', 'icos' ),
						'default'     => '',
					),
				),
			),
			'target'   => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Open In New Tab', 'icos' ),
				'section'     => 'socials',
				'default'     => '1',
				'priority'    => 10,
			),

			//Copyright
			'copy_right'   => array(
				'type'     => 'textarea',
				'label'    => esc_html__( 'Copy Right Text', 'icos' ),
				'section'  => 'copyright',
				'default'  => '',
				'priority' => 10,
			),
			'align_left'   => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Align Left', 'icos' ),
				'section'  => 'copyright',
				'default'  => '0',
				'priority' => 10,
			),
			'line'   	   => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Top Line', 'icos' ),
				'section'  => 'copyright',
				'default'  => '0',
				'priority' => 10,
			),
			'ptop_footer'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Top', 'icos' ),
				'section'  => 'copyright',
				'priority' => 10,
				'default'  => 0,	
				'output'    => array(
					array(
						'element'  => 'footer.footer-section',
						'property' => 'padding-top',
						'units'	   => 'px'
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'align_left',
					  	'operator' => '==',
					  	'value'    => 0,
				 	),
				),
			),
			'pbot_footer'  => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Padding Bottom', 'icos' ),
				'section'  => 'copyright',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => 'footer.footer-section',
						'property' => 'padding-bottom',
						'units'	   => 'px'
					),
				),
				'active_callback' => array(
				 	array(
					  	'setting'  => 'align_left',
					  	'operator' => '==',
					  	'value'    => 0,
				 	),
				),
			),
			'bg_footer'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Footer', 'icos' ),
				'section'  => 'copyright',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => '.section.footer-section',
						'property' => 'background',
					),
				),
			),
			'color_footer' => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Footer', 'icos' ),
				'section'  => 'copyright',
				'priority' => 10,
				'output'    => array(
					array(
						'element'  => 'footer.footer-section, .footer-section h6, .copyright-text span, .io-azure .copyright-text, .io-azure .copyright-text span, .textwidget ul:not(.social) a',
						'property' => 'color',
					),
				),
			),
			

			//Styling
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Preloader', 'icos' ),
				'section'     => 'styling',
				'default'     => '1',
				'priority'    => 10,
			),
			'animation'   => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Animation', 'icos' ),
				'section'     => 'styling',
				'default'     => '0',
				'priority'    => 10,
			),
			'them_style'   => array(
				'type'     => 'select',
				'label'    => esc_html__( 'Theme Style', 'icos' ),
				'section'  => 'styling',
				'default'  => 'dark',
				'priority' => 10,
				'choices'  => array(
					'dark' 	 	 => esc_html__( 'Dark Style', 'icos' ),
					'light' 	 => esc_html__( 'Light Style', 'icos' ),
					'azure' 	 => esc_html__( 'Azure Style', 'icos' ),
					'lavender' 	 => esc_html__( 'Lavender Style', 'icos' ),
					'muscari' 	 => esc_html__( 'Muscari Style', 'icos' ),
				),
			),
			'bg_body'      => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Body', 'icos' ),
				'section'  => 'styling',
				'default'  => '',
				'priority' => 10,
				'output'   => array(
					array(
						'element'  => 'body, body.theme-light, #wrapper .blog-section',
						'property' => 'background-color',
					),
				),
			),
			'main_color'   => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Primary Color', 'icos' ),
				'section'  => 'styling',
				'default'  => '#46bdf4',
				'priority' => 10,
			),
			'second_color' => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Second Color', 'icos' ),
				'section'  => 'styling',
				'default'  => '#7a0fff',
				'priority' => 10,
			),
			'third_color'  => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Third Color', 'icos' ),
				'section'  => 'styling',
				'default'  => '#2b56f5',
				'priority' => 10,
			),

			// Typography
			'body_typo'    => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Body', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => 'regular',
					'font-size'      => '15px',
					'line-height'    => '1.86',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading1_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 1', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '36px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading2_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 2', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '30px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading3_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 3', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '24px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading4_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 4', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '18px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading5_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 5', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '16px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'heading6_typo'                           => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Heading 6', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '600',
					'font-size'      => '12px',
					'line-height'    => '1.33',
					'letter-spacing' => '0',
					'subsets'        => array( 'latin-ext' ),
					'color'          => '#fff',
					'text-transform' => 'none',
				),
			),
			'menu_typo'                               => array(
				'type'     => 'typography',
				'label'    => esc_html__( 'Menu', 'icos' ),
				'section'  => 'typography',
				'priority' => 10,
				'default'  => array(
					'font-family'    => 'Poppins',
					'variant'        => '500',
					'subsets'        => array( 'latin-ext' ),
					'font-size'      => '13px',
					'text-transform' => 'none',
				),
			),
			
		),
	)
);