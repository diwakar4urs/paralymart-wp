<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package icos
 */

get_header(); ?>

<?php
    $bg   = '';
    $pimg = '';
    if ( ! function_exists('rwmb_meta') ) { 
        $bg      = '';
        $pimg    = '';
    }else{
        $images  = rwmb_meta('_cmb_bg_header', "type=image", get_option( 'page_for_posts' ));
        $pimgs   = rwmb_meta('_cmb_img_header', "type=image", get_option( 'page_for_posts' ));
        if(!$images){
            $bg   = '';
        } else {
            foreach ( $images as $image ) { 
                $bg = $image['full_url']; 
                break;
            }
        }
        if(!$pimgs){
            $pimg   = '';
        } else {
            foreach ( $pimgs as $imgp ) { 
                $pimg = $imgp['full_url']; 
                break;
            }
        }
    }
   
?>

<?php if(icos_get_option('page_header')) { ?>
<?php 
    $img      = icos_get_option( 'page_header_bg' ); 
    $img_src  = $bg ? $bg : $img;

    $imgx     = icos_get_option( 'page_header_img' ); 
    $pimg_src = $pimg ? $pimg : $imgx;
?>

<div class="page-banner d-flex align-items-center" <?php if($img_src) { ?>style="background-image: url(<?php echo esc_url($img_src); ?>); background-size: cover;"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-head">
                    <h2 class="page-heading"><?php if( is_home() && is_front_page() ) echo esc_html__('ICO CRYPTO NEWS', 'icos'); else echo get_the_title( get_option( 'page_for_posts' ) ); ?></h2>
                </div>
            </div>
            <?php if($pimg_src) { ?>
            <div class="page-head-image">
                <img src="<?php echo esc_url($pimg_src); ?>" alt="">
            </div>
            <?php } ?>
        </div>
    </div><!-- .container  -->
</div>
<?php } ?>

<?php $type = icos_get_option('blog_layout'); ?>
<div class="section section-pad-md blog-section section-bg-alt <?php echo esc_attr( $type ); ?>" id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 <?php if( $type == 'left-bar' ) echo 'order-last'; elseif( $type == 'no-bar' ) echo 'col-lg-12'; ?>">

                <div class="blog-list">
                    <div class="row">
                    <?php if( have_posts() ) : ?>
                        <?php 
                            while (have_posts()) : the_post();
                                get_template_part( 'post-formats/content', get_post_format() ) ;
                            endwhile;
                        ?>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row res-m-bttm">
                    <div class="col-md-12 text-center">
                        <?php echo icos_pagination(); ?> 
                    </div>
                </div>

            </div>

            <?php if( $type != 'no-bar' ) { ?>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <?php get_sidebar();?>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</div>
    
<?php get_footer(); ?>