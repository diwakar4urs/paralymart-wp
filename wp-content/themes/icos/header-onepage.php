<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package icos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
    <div id="wrapper">

        <!-- Header --> 
        <header class="site-header <?php if(icos_get_option('sticky')) echo 'is-sticky'; ?>">
            <!-- Navbar -->
            <div class="navbar navbar-expand-lg is-transparent" id="mainnav">
                <nav class="container">

                    <h1 class="navbar-brand">
                        <?php $logo = icos_get_option( 'logo' ); 
                              $logo2 = icos_get_option( 'logo2' ) ? icos_get_option( 'logo2' ) : icos_get_option( 'logo' ); ?>
                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                            <img class="logo" src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo(); ?>">
                            <img class="logo-2" src="<?php echo esc_url($logo2); ?>" alt="<?php bloginfo(); ?>">
                        </a>
                    </h1>

                    <?php if ( function_exists('icl_object_id') && icos_get_option( 'slanguage' ) == 'alogo' ) { ?>
                    <div class="slanguage switcher-top">
                        <?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
                    </div>
                    <?php } ?>

                    <button class="navbar-toggler" type="button">
                        <span class="navbar-toggler-icon">
                            <span class="ti ti-align-justify"></span>
                        </span>
                    </button>

                    <div class="navbar-collapse justify-content-end">
                        <?php
                            $onepage = array(
                                'theme_location'  => 'onepage',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'navbar-nav menu-top',
                                'menu_id'         => '',
                                'echo'            => true,
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'onepage' ) ) {
                                wp_nav_menu( $onepage );
                            }
                        ?>
                        <?php $btns = icos_get_option( 'btn_nav', array() ); if($btns) { ?> 
                        <ul class="navbar-nav navbar-btns">                            
                            <?php foreach ( $btns as $btn ) { ?>
                                <li class="nav-item"><a class="nav-link btn btn-sm btn-outline menu-link" href="<?php echo esc_url($btn['link']); ?>"><?php echo esc_attr($btn['name']); ?></a></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>

                        <?php if ( function_exists('icl_object_id') && icos_get_option( 'slanguage' ) == 'amenu' ) { ?>
                        <div class="slanguage switcher-top has-flag">
                            <?php echo do_shortcode('[wpml_language_selector_widget]'); ?>
                        </div>
                        <?php } ?>
                    </div>
                </nav>
            </div>
            <!-- End Navbar -->
        </header>
        <!-- End Header -->