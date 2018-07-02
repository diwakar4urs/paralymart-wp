<?php

if ( ! function_exists( 'icos_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function icos_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Redux Theme, use a find and replace
	 * to change 'icos' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'icos', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Multipage Menu', 'icos' ),
		'onepage' => esc_html__( 'Onepage Menu', 'icos' ),
		'footer'  => esc_html__( 'Footer Menu', 'icos' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'comment-form',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'audio',
		'image',
		'video',
		'gallery',
	) );

	add_editor_style( array( 'assets/css/editor-style.css', icos_fonts_url() ) );
	
}
endif; // icos_setup
add_action( 'after_setup_theme', 'icos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function icos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'icos_content_width', 640 );
}
add_action( 'after_setup_theme', 'icos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function icos_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'icos' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'icos' ),  
		'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="sidebar-widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'icos' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'icos' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="footer-widget">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'icos' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'icos' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="footer-widget">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'icos' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'icos' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="footer-widget">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'icos' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'icos' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="footer-widget">',
		'after_title'   => '</h6>',
	) ); 
	
}
add_action( 'widgets_init', 'icos_widgets_init' );

/**
 * Enqueue Google fonts.
 */
function icos_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $nuni = _x( 'on', 'Nunito font: on or off', 'icos' );
    $popp = _x( 'on', 'Poppins font: on or off', 'icos' );
 
 
    if ( 'off' !== $nuni || 'off' !== $popp ) {
        $font_families = array();

        if ( 'off' !== $nuni ) {
            $font_families[] = 'Nunito:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';
        } 
        if ( 'off' !== $popp ) {
            $font_families[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        } 
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles.
 */
function icos_scripts() {

	$protocol = is_ssl() ? 'https' : 'http';

	// Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'icos-fonts', icos_fonts_url(), array(), null );

    /** All frontend css files **/ 
    wp_enqueue_style( 'vendor', get_template_directory_uri().'/assets/css/vendor.bundle.css');
	wp_enqueue_style( 'icos-style', get_stylesheet_uri() );
	wp_enqueue_style( 'icos-lavender', get_template_directory_uri().'/assets/css/lavender.css');
	wp_enqueue_style( 'icos-muscari', get_template_directory_uri().'/assets/css/muscari.css');
	if(icos_get_option('main_color') == '#46bdf4' && icos_get_option('second_color') == '#7a0fff' && icos_get_option('third_color') == '#2b56f5'){
		if( icos_get_option('them_style') == 'azure' ){
			wp_enqueue_style( 'icos-theme', get_template_directory_uri().'/assets/css/theme/theme.css');
		}elseif( icos_get_option('them_style') == 'lavender' ){
			wp_enqueue_style( 'icos-theme', get_template_directory_uri().'/assets/css/theme/theme-lavendar.css');
		}elseif( icos_get_option('them_style') == 'muscari' ){
			wp_enqueue_style( 'icos-theme', get_template_directory_uri().'/assets/css/theme/theme-muscari.css');
		}else{
			wp_enqueue_style( 'icos-theme', get_template_directory_uri().'/assets/css/theme/theme-java.css');
		}
	}
	if( icos_get_option('animation') ){
		wp_enqueue_style( 'icos-animate', get_template_directory_uri().'/assets/css/animate.css');
	}
	
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	/** All frontend js files **/
	wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/vendor/bootstrap.min.js",array('jquery'),false,true);
	wp_enqueue_script("easing", get_template_directory_uri()."/assets/js/vendor/jquery.easing.min.js",array('jquery'),false,true);
	wp_enqueue_script("waypoints", get_template_directory_uri()."/assets/js/vendor/jquery.waypoints.min.js",array('jquery'),false,true);
    wp_enqueue_script("owl-carousel", get_template_directory_uri()."/assets/js/vendor/owl.carousel.js",array('jquery'),false,true);
	wp_enqueue_script("magnific", get_template_directory_uri()."/assets/js/vendor/jquery.magnific-popup.min.js",array('jquery'),false,true);
	wp_enqueue_script("countdown", get_template_directory_uri()."/assets/js/vendor/jquery.countdown.min.js",array('jquery'),false,true);
	wp_enqueue_script("particles", get_template_directory_uri()."/assets/js/vendor/particles.min.js",array('jquery'),false,true);
	wp_enqueue_script("select2", get_template_directory_uri()."/assets/js/vendor/select2.min.js",array('jquery'),false,true);
    wp_enqueue_script("icos-script", get_template_directory_uri()."/assets/js/script-pack.js",array('jquery'),false,true);
}
add_action( 'wp_enqueue_scripts', 'icos_scripts' );

//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	//Rows
	vc_add_param('vc_row', array(
								"type" => "dropdown",
								"heading" => esc_html__('Setup Full Width', 'icos'),
								"param_name" => "fullwidth",
								"value" => array(   
								                esc_html__('No', 'icos') => 'no',  
								                esc_html__('Yes', 'icos') => 'yes',                                                                                
								              ),
								"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", "icos"),      
					        )
    );
    vc_add_param('vc_row_inner', array(
								"type" => "dropdown",
								"heading" => esc_html__('Setup Full Width', 'icos'),
								"param_name" => "fullwidth",
								"value" => array(   
								                esc_html__('Yes', 'icos') => 'yes',                                                                                
								                esc_html__('No', 'icos') => 'no',  
								              ),
								"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", "icos"),      
					        )
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Banner Section', 'icos'),
                              	"param_name" => "banner",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Banner Shade', 'icos'),
                              	"param_name" => "banner_shade",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Particles', 'icos'),
                              	"param_name" => "particles",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Section Pro/Section Light', 'icos'),
                              	"param_name" => "spro",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Background Parallax', 'icos'),
                              	"param_name" => "parallax_bg",     
								"description" => esc_html__(" ", "icos"),      
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Section Angle', 'icos'),
                              	"param_name" => "angle",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Bubble', 'icos'),
                              	"param_name" => "bubble",     
         						"dependency"  => array( 'element' => 'angle', 'not_empty' => true ),
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"holder" => "div",
         						"edit_field_class" => "vc_col-sm-6",
                              	"heading" => esc_html__('Section Connect', 'icos'),
                              	"param_name" => "connect",     
                            ) 
    );

    //Columns
    vc_add_param('vc_column', array(
								"type" => "dropdown",
								"heading" => esc_html__('Animation', 'icos'),
								"param_name" => "animate",
								"value" => array(   
								                esc_html__('None', 'icos') => '',  
								                esc_html__('FadeIn', 'icos') => 'fadeIn',  
								                esc_html__('FadeinUp', 'icos') => 'fadeInUp',  
								                esc_html__('FadeinDown', 'icos') => 'fadeInDown',                                                                              
								                esc_html__('FadeinLeft', 'icos') => 'fadeInLeft',                                                                              
								                esc_html__('FadeinRight', 'icos') => 'fadeInRight',                                                                              
											)
					        	)
    );
    vc_add_param('vc_column',array(
                              	"type" => "textfield",
                              	"heading" => esc_html__('Time Delay', 'icos'),
                              	"param_name" => "time",     
								"description" => esc_html__("Example: 0.5, 1, 1.5, 2,...", "icos"),      
                            ) 
    );

    //Inner Columns
    vc_add_param('vc_column_inner', array(
								"type" => "dropdown",
								"heading" => esc_html__('Animation', 'icos'),
								"param_name" => "animate",
								"value" => array(   
								                esc_html__('None', 'icos') => '',  
								                esc_html__('FadeIn', 'icos') => 'fadeIn',  
								                esc_html__('FadeinUp', 'icos') => 'fadeInUp',  
								                esc_html__('FadeinDown', 'icos') => 'fadeInDown',                                                                              
								                esc_html__('FadeinLeft', 'icos') => 'fadeInLeft',                                                                              
								                esc_html__('FadeinRight', 'icos') => 'fadeInRight',                                                                              
											)
					        	)
    );
    vc_add_param('vc_column_inner',array(
                              	"type" => "textfield",
                              	"heading" => esc_html__('Time Delay', 'icos'),
                              	"param_name" => "time",     
								"description" => esc_html__("Example: 0.5, 1, 1.5, 2,...", "icos"),      
                            ) 
    );

}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "parallax" );
	vc_remove_param( "vc_row", "parallax_image" );
	vc_remove_param( "vc_row", "parallax_speed_bg" );
	vc_remove_param( "vc_row", "parallax_speed_video" );
	vc_remove_param( "vc_row", "full_width" );
	vc_remove_param( "vc_row", "full_height" );
	vc_remove_param( "vc_row", "video_bg" );
	vc_remove_param( "vc_row", "video_bg_parallax" );
	vc_remove_param( "vc_row", "video_bg_url" );
	vc_remove_param( "vc_row", "columns_placement" );
	vc_remove_param( "vc_row", "gap" );	

	vc_remove_param( "vc_column", "css_animation" );
}	

/**
 * Require plugins install for this theme.
 *
 */
require_once get_template_directory() . '/framework/plugin-requires.php';
/**
 * Implement the Custom Meta Boxs.
 */
require_once get_template_directory() . '/framework/meta-boxes.php';
/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/framework/template-tags.php';
/**
 * Import Demo Content
 */
require_once get_template_directory() . '/framework/importer.php';
/**
 * Custom shortcode plugin visual composer.
 */
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/vc_shortcode.php';
/**
 * Customizer
 */
require_once get_template_directory() . '/framework/customizer.php';
/**
 * Styling and Color
 */
require_once get_template_directory() . '/framework/color.php';
require_once get_template_directory() . '/framework/styling.php';