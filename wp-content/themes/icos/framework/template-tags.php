<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package icos
 */


/**** Change length of the excerpt ****/
if ( ! function_exists( 'icos_excerpt_length' ) ) :
function icos_excerpt_length() {
  
  if(icos_get_option('excerpt_length')){
    $limit = icos_get_option('excerpt_length');
  }else{
    $limit = 30;
  }  
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;

}
endif;

/** Excerpt Section Blog Post **/
if ( ! function_exists( 'icos_excerpt' ) ) :
function icos_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

/**Custom function tag widgets**/
if ( ! function_exists( 'icos_tag_cloud_widget' ) ) :
  function icos_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 14; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = array(20, 80, 92); //exclude tags by ID
    return $args;
  }
  add_filter( 'widget_tag_cloud_args', 'icos_tag_cloud_widget' );
endif;

/** Excerpt Section Blog Post **/
function icos_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/** Pagination **/
if ( ! function_exists( 'icos_pagination' ) ) :
function icos_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
  global $wp_query, $wp_rewrite;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  if($pages==''){
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages)
    {
      $pages = 1;
    }
  }
  $pagination = array(
    'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
    'format'        => '',
    'current'       => max( 1, get_query_var('paged') ),
    'total'         => $pages,
    'prev_text'     => $prev,
    'next_text'     => $next,       
    'type'          => 'list',
    'end_size'      => 3,
    'mid_size'      => 3
);
  $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="page-pagination">', $return );
}
endif;

if ( ! function_exists( 'icos_custom_wp_admin_style' ) ) :
function icos_custom_wp_admin_style() {
  wp_register_style( 'icos_custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/css/admin-style.css', false, '1.0.0' );
  wp_register_style( 'icos_awesomev5_admin_css', get_template_directory_uri() . '/assets/css/awesomev5.css', false, '1.0.0' );
  wp_register_style( 'icos_newicons_admin_css', get_template_directory_uri() . '/assets/css/newicons.css', false, '1.0.0' );
  wp_enqueue_style( 'icos_custom_wp_admin_css' );
  wp_enqueue_style( 'icos_awesomev5_admin_css' );
  wp_enqueue_style( 'icos_newicons_admin_css' );

  wp_enqueue_script( 'icos-backend-js', get_template_directory_uri()."/framework/admin/js/admin-script.js", array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'icos-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'icos_custom_wp_admin_style' );
endif;

/** Custom search form **/
if ( ! function_exists( 'icos_search_form' ) ) :
function icos_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" class="search-form" >  
                <input type="text" id="s" value="' . get_search_query() . '" name="s" placeholder="'.__('Search Keyword', 'icos').'" />
                <button type="submit"><em class="ti ti-search"></em></button>
            </form>';
    return $form;
}
add_filter( 'get_search_form', 'icos_search_form' );
endif;

/* Custom comment List: */
function icos_theme_comment($comment, $args, $depth) { 
   
  $GLOBALS['comment'] = $comment; ?>

  <li id="comment-<?php comment_ID(); ?>" class="comment-item">
    <div class="d-flex">

      <div class="comment-photo">
        <?php echo get_avatar($comment,$size='60',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' ); ?>
      </div>

      <div class="comment-content">
        <div class="d-flex align-items-center">
          <div>
            <h6><?php printf(__('%s','icos'), get_comment_author()) ?></h6>
            <div class="comment-time"><?php the_time( get_option( 'date_format' ) ); ?></div>
          </div>
          <div class="ml-auto">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>
        </div>
        <?php if ($comment->comment_approved == '0'){ ?>
          <em><?php _e('Your comment is awaiting moderation.','icos') ?></em>
        <?php }else{ ?>
          <?php comment_text() ?>
        <?php } ?>
      </div>

    </div> 
  </li>
  
<?php
}

/** Rewrite set up, when theme activate i mean **/
if (isset($_GET['activated']) && is_admin()) {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure('/%postname%/');
  $wp_rewrite->flush_rules();
}

/** Remove Customizer **/
add_action( "customize_register", "icos_customize_register" );
function icos_customize_register( $wp_customize ) {
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('colors');
}

/**Add more icons to awesome**/
add_filter( 'vc_iconpicker-type-fontawesome', 'icos_vc_iconpicker_type_fontawesome' );

function icos_vc_iconpicker_type_fontawesome( $icons ) {

  $fontawesome_icons = array(
    'OT Icons' => array(
      array( 'ikon ikon-shiled'      => 'Shiled' ),
      array( 'ikon ikon-shiled-alt'  => 'Shiled' ),
      array( 'ikon ikon-id-card'     => 'ID Card' ),
      array( 'ikon ikon-paricle'     => 'Paricle' ),
      array( 'ikon ikon-paricle-alt' => 'Paricle' ),
      array( 'ikon ikon-target'      => 'Target' ),
      array( 'ikon ikon-connect'     => 'Connect' ),
      array( 'ikon ikon-user'        => 'User' ),
      array( 'ikon ikon-data-server' => 'Server' ),
    )
  );
  return array_merge( $icons, $fontawesome_icons );
}

/** Add specific CSS class by filter **/
add_filter( 'body_class', 'icos_body_class_names', 999 );
function icos_body_class_names( $classes ) {
  $theme = wp_get_theme();
  
  if( icos_get_option('them_style') == 'light' ){
    $classes[] = 'theme-light';
  }elseif( icos_get_option('them_style') == 'lavender' ){
    $classes[] = 'theme-lavendar io-lavendar';
  }elseif( icos_get_option('them_style') == 'muscari' ){
    $classes[] = 'theme-muscari io-mascari';
  }elseif( icos_get_option('them_style') == 'azure' ){
    $classes[] = 'io-azure';
  }else{
    $classes[] = 'ico-dark';
  }

  $classes[] = 'icos-theme-ver-'.$theme->version;

  $classes[] = 'wordpress-version-'.get_bloginfo( 'version' );

  $classes[] = '" data-spy="scroll" data-target="#mainnav" data-offset="80';

  // return the $classes array
  return $classes;
}