<?php
/**
 * Template Name: FullWidth
 */
get_header(); ?>

<?php
    $bg   = '';
    $pimg = '';
    if ( ! function_exists('rwmb_meta') ) { 
        $bg      = '';
        $pimg    = '';
    }else{
        $images  = rwmb_meta('_cmb_bg_header', "type=image");
        $pimgs   = rwmb_meta('_cmb_img_header', "type=image");
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
                    <h2 class="page-heading"><?php the_title(); ?></h2>
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
    
<?php while (have_posts()) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>