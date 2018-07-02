<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package icos
 */
?>
        
        <?php if( icos_get_option( 'subscribe' ) ) { ?>
        <div class="section subscribe-section section-pad-md section-bg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6 offset-md-3">
                        <h4 class="section-title-md"><?php echo esc_html(icos_get_option( 'subc_title' )); ?></h4>
                        <?php echo do_shortcode(icos_get_option( 'subc_form' )); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ( is_active_sidebar( 'footer-area-1'  ) || icos_get_option( 'align_left' ) ) { ?>
        <div class="section footer-section footer-particle section-pad-sm section-bg-dark <?php if( icos_get_option( 'them_style' ) == 'lavender' ) echo 'footer-lavendar'; ?>">
            <?php $socials = icos_get_option( 'socials', array() ); if( $socials && icos_get_option( 'social_style' ) == 's2' ) { ?>
            <div class="social-overlap">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <ul class="social-bar">
                                <?php if(icos_get_option( 'sotitle' )) { ?>
                                <li class="sotitle"><?php echo esc_html(icos_get_option( 'sotitle' )); ?></li>
                                <?php }foreach ( $socials as $social ) { ?>
                                <li><a<?php if(icos_get_option( 'target' )) echo ' target="_blank"'; ?> href="<?php echo esc_url($social['link']); ?>"><em class="fa <?php echo esc_attr($social['icon']); ?>"></em></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gaps size-4x"></div>
            <div class="gaps size-2x d-none d-sm-block"></div>
            <?php } ?>
            <div class="container">
                <?php if ( is_active_sidebar( 'footer-area-1'  ) ) { ?>
                <div class="row">
                    <?php get_sidebar('footer');?>
                </div>
                <?php }if ( is_active_sidebar( 'footer-area-1'  ) && icos_get_option( 'align_left' ) && !icos_get_option( 'line' ) ) { ?>
                <div class="gaps size-2x vc_hidden-sm vc_hidden-xs"></div>
                <div class="gaps size-2x vc_hidden-sm vc_hidden-xs"></div>
                <?php } ?>
            </div>

            <?php if(icos_get_option( 'line' )) echo('<hr class="hr-line">'); ?>

            <?php if( icos_get_option( 'align_left' ) ) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <span class="copyright-text">
                            <?php echo wp_specialchars_decode(icos_get_option( 'copy_right' )); ?>
                        </span>
                    </div>
                    <div class="col-md-5 text-right mobile-left">
                        <?php
                            $footer = array(
                                'theme_location'  => 'footer',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'footer-links slanguage',
                                'menu_id'         => '',
                                'echo'            => true,
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'footer' ) ) {
                                wp_nav_menu( $footer );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
        <?php $socials = icos_get_option( 'socials', array() ); if( !icos_get_option( 'align_left' ) ) { ?>
        <footer class="section footer-section section-pad-sm section-bg">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <?php if( $socials && icos_get_option( 'social_style' ) == 's1' ) { ?> 
                        <ul class="social">                            
                            <?php foreach ( $socials as $social ) { ?>
                                <li><a<?php if(icos_get_option( 'target' )) echo ' target="_blank"'; ?> href="<?php echo esc_url($social['link']); ?>"><em class="fa <?php echo esc_attr($social['icon']); ?>"></em></a></li>
                            <?php } ?>
                        </ul>
                        <?php }if( icos_get_option( 'copy_right' ) ) { ?>
                        <span class="copyright-text">
                            <?php echo wp_specialchars_decode(icos_get_option( 'copy_right' )); ?>
                        </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </footer>
        <?php } ?>

        <a href="#" id="back-to-top"></a>

        <?php if( icos_get_option('preload') ) { ?>
        <!-- Preloader !remove please if you do not want -->
        <div id="preloader">
            <div id="loader"></div>
            <div class="loader-section loader-top"></div>
            <div class="loader-section loader-bottom"></div>
        </div>
        <!-- Preloader End -->
        <?php } ?>

    </div>

<?php wp_footer(); ?>

</body>
</html>
