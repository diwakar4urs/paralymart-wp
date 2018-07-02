<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package icos
 */

get_header(); ?>

<?php if(icos_get_option('page_header')) { ?>
<?php 
    $img      = icos_get_option( 'page_header_bg' ); 
    $imgx     = icos_get_option( 'page_header_img' ); 
?>

<div class="page-banner d-flex align-items-center" <?php if($img) { ?>style="background-image: url(<?php echo esc_url($img); ?>); background-size: cover;"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-head">
                    <h2 class="page-heading"><?php printf( esc_html__( 'Search results for: %s', 'icos' ), get_search_query() ); ?></h2>
                </div>
            </div>
            <?php if($imgx) { ?>
            <div class="page-head-image">
                <img src="<?php echo esc_url($imgx); ?>" alt="">
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
                    <?php else : ?>
                                                   
                        <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'icos' ); ?></h2>
                        
                        <div class="page-content">
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'icos' ); ?></p>
                            <div class="widget_search">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
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