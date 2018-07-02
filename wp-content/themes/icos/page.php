<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package icos
 */
get_header(); 

?>

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
    
<div class="section section-pad-md blog-section <?php echo esc_attr( icos_get_option('blog_layout') ); ?>" id="news">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-8">

                <div class="blog-list page-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_post_thumbnail() ?>
                        <?php the_content(); ?>
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
                        
                        <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>      
                    <?php endwhile; ?>
                </div>
                <div class="res-m-bttm">
                    <div class="text-center">
                        <?php echo icos_pagination(); ?> 
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="sidebar-section">
                    <?php get_sidebar();?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
