<?php 

if ( ! function_exists( 'icos_typography_css' ) ) :
    /**
     * Get typography CSS base on settings
     *
     * @since 1.1.6
     */
    function icos_typography_css() {
        $css        = '';
        $properties = array(
            'font-family'    => 'font-family',
            'font-size'      => 'font-size',
            'variant'        => 'font-weight',
            'line-height'    => 'line-height',
            'letter-spacing' => 'letter-spacing',
            'color'          => 'color',
            'text-transform' => 'text-transform',
        );

        $settings = array(
            'body_typo'          => 'body, p, #wrapper .blog-content p, #wrapper .single-faq p, #wrapper .features-box p',
            'heading1_typo'      => 'h1',
            'heading2_typo'      => 'h2',
            'heading3_typo'      => 'h3',
            'heading4_typo'      => 'h4',
            'heading5_typo'      => 'h5',
            'heading6_typo'      => 'h6',
            'menu_typo'          => '.site-header .navbar-nav li.menu-item a',
        );

        foreach ( $settings as $setting => $selector ) {
            $typography = icos_get_option( $setting );
            $default    = (array) icos_get_option_default( $setting );
            $style      = '';

            foreach ( $properties as $key => $property ) {
                if ( isset( $typography[ $key ] ) && ! empty( $typography[ $key ] ) ) {
                    if ( isset( $default[ $key ] ) && strtoupper( $default[ $key ] ) == strtoupper( $typography[ $key ] ) ) {
                        continue;
                    }
                    $value = 'font-family' == $key ? '"' . rtrim( trim( $typography[ $key ] ), ',' ) . '"' : $typography[ $key ];
                    $value = 'variant' == $key ? str_replace( 'regular', '400', $value ) : $value;

                    if ( $value ) {
                        $style .= $property . ': ' . $value . ';';
                    }
                }
            }

            if ( ! empty( $style ) ) {
                $css .= $selector . '{' . $style . '}';
            }
        }

        $css .= icos_get_heading_typography_css();

        return $css;
    }
endif;

/**
 * Returns CSS for the typography.
 *
 *
 * @param array $body_typo Color scheme body typography.
 *
 * @return string typography CSS.
 */
function icos_get_heading_typography_css() {

    $headings   = array(
        'h1' => 'heading1_typo',
        'h2' => 'heading2_typo',
        'h3' => 'heading3_typo',
        'h4' => 'heading4_typo',
        'h5' => 'heading5_typo',
        'h6' => 'heading6_typo',
    );
    $inline_css = '';
    foreach ( $headings as $heading ) {
        $keys = array_keys( $headings, $heading );
        if ( $keys ) {
            $inline_css .= icos_get_heading_font( $keys[0], $heading );
        }
    }

    return $inline_css;

}

/**
 * Returns CSS for the typography.
 *
 *
 * @param array $body_typo Color scheme body typography.
 *
 * @return string typography CSS.
 */
function icos_get_heading_font( $key, $heading ) {

    $inline_css   = '';
    $heading_typo = icos_get_option( $heading );

    if ( $heading_typo ) {
        if ( isset( $heading_typo['font-family'] ) && strtolower( $heading_typo['font-family'] ) !== 'poppins' ) {
            $typo       = rtrim( trim( $heading_typo['font-family'] ), ',' );
            $inline_css .= $key . '{font-family:' . $typo . ', Arial, sans-serif}';

            if ( isset( $heading_typo['variant'] ) ) {
                $inline_css .= $key . '.vc_custom_heading{font-weight:' . $heading_typo['variant'] . '}';
            }
        }
    }

    if ( empty( $inline_css ) ) {
        return;
    }

    return <<<CSS
    {$inline_css}
CSS;
}

//Custom Style Frontend
if(!function_exists('icos_custom_frontend_style')){
    
    function icos_custom_frontend_style(){
    	$style_css 	= '';
        $sticky     = '';
        $msticky    = '';
        $bg_sm      = '';
        $bg_btn     = '';
        $p_footer   = '';


        //Header

        if(!icos_get_option('sticky')){
            $sticky = '.site-header.has-fixed .navbar{ position: absolute; }';
        }
        if(!icos_get_option('msticky')){
            $msticky  = '@media only screen and (max-width: 991px) { .site-header .navbar.is-transparent { position: absolute; }.admin-bar .site-header .navbar.is-transparent { top: 0; } }';

        }
        if(icos_get_option('bg_smenu')){
            $bg_sm = '.navbar .navbar-nav .sub-menu:after{ border-bottom-color: '.icos_get_option('bg_smenu').'!important; }';
        } 
        if(icos_get_option('btn_bg')){
            $bg_btn = '.navbar .navbar-nav > li > a.nav-link.btn:after, .navbar .navbar-nav > li > a.nav-link.btn:before{ background: none; }';
        }
        if( icos_get_option('social_style') == 's2' ){
            $p_footer = 'div.footer-section{ padding-top: 0; }';
        }   

        $style_css .= icos_typography_css();
        $style_css .= $sticky;
        $style_css .= $msticky;
        $style_css .= $bg_sm;
        $style_css .= $bg_btn;
        $style_css .= $p_footer;
        $style_css .= icos_get_option('custom_css');

        if(! empty($style_css)){
			echo '<style type="text/css">'.$style_css.'</style>';
		}
    }
}
add_action('wp_head', 'icos_custom_frontend_style');