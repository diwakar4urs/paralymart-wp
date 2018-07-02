<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package icos
 */

wp_head(); ?>

  <div class="banner d-flex align-items-center">
    <div class="container">
      <div class="align-items-center mobile-center">
        <div class="warp-404-inner align-items-center">
          <h1><?php esc_html_e('404','icos'); ?></h1>
          <h4><?php esc_html_e('Page Not Found','icos'); ?></h4>
          <span><?php esc_html_e('The page you have requested cannot be found.','icos'); ?></span>
          <p><?php wp_kses( _e('Maybe the page was moved or deleted, or perhaps you just mistyped the address.<br> Why not to try and find your way using the navigation bar above or click on the logo to return to our  home page.','icos'), wp_kses_allowed_html('post') ); ?></p>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-custom"><?php esc_html_e('Back To Home','icos'); ?></a>
        </div>          
      </div>
    </div>
  </div>
	
<?php wp_footer(); ?>
