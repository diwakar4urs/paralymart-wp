<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

    $title    = icos_get_option( 'title_single' );
?>

<div class="page-banner d-flex align-items-center" <?php if($img_src) { ?>style="background-image: url(<?php echo esc_url($img_src); ?>); background-size: cover;"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-head">
                    <h2 class="page-heading"><?php if($title) echo esc_html($title); else echo esc_html__('ICO CRYPTO NEWS', 'icos'); ?></h2>
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

<?php while (have_posts()): the_post(); $type = icos_get_option('post_layout'); ?>

<div class="section section-pad-md blog-section section-bg-alt <?php echo esc_attr( $type ); ?>" id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 <?php if( $type == 'left-bar' ) echo 'order-last'; elseif( $type == 'no-bar' ) echo 'col-lg-12'; ?>">

                <div class="blog-content single-content">
                    <?php                                                     
                        $format = get_post_format();
                        if( function_exists( 'rwmb_meta' ) ) {
                            $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true);
                            $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);
                            $images = rwmb_meta( '_cmb_images', "type=image" );
                            $image = rwmb_meta( '_cmb_image', "type=image" );
                        }
                    ?>
                    <div class="post-content">
                        <?php if($format == 'video') {  ?>

                            <div class="blog-photo">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="100%" height="315" src="<?php echo esc_url( $link_video ); ?>"></iframe>
                                </div>
                            </div>

                        <?php }elseif($format == 'audio') { ?>

                            <div class="blog-photo">
                                <iframe style="width:100%" height="150" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
                            </div>

                        <?php }elseif($format == 'gallery') { ?>

                            <?php if($images){ ?>
                            <div class="blog-photo owl-carousel owl-theme blog-slide">
                                <?php foreach ( $images as $image ) {  ?>
                                <?php $img = $image['full_url']; ?>
                                    <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div>
                                <?php } ?>
                            </div>
                            <?php } ?>

                        <?php }elseif($format == 'image') { ?>

                            <?php if($image){ ?>
                            <div class="blog-photo">
                                <?php foreach ( $image as $imag ) {  ?>
                                    <?php $img = $imag['full_url']; ?>
                                    <img src="<?php echo esc_url($img); ?>" alt="">
                                <?php } ?>
                            </div>
                            <?php } ?>

                        <?php }elseif( has_post_thumbnail() ) { ?>

                            <div class="blog-photo">            
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                            </div>

                        <?php } ?>

                        <ul class="blog-meta">
                            <li><?php the_time( get_option( 'date_format' ) ); ?></li>
                            <li><?php the_author_posts_link(); ?></li>
                            <?php if(has_category()) { ?><li><?php the_category( ', ' ); ?></li><?php } ?>
                        </ul>

                        <h3 class="blog-title"><?php the_title(); ?></h3>

                        <?php the_content(); ?>

                        <?php if(has_tag()) { the_tags( '<ul class="blog-tags"><li>', '</li><li>', '</li></ul>' ); } ?>

                        <?php
                            wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'icos' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'icos' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) );
                        ?>

                    </div>

                    <div class="comment-section">
                        <?php
                           if ( comments_open() || get_comments_number() ) :
                            comments_template();
                           endif;
                        ?>
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

<?php endwhile; ?>

<?php get_footer(); ?>