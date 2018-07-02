<div class="col-lg-6 offset-lg-0 col-sm-6">
    <div <?php post_class(); ?>>
        <div class="blog-item">
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                <?php $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true);  if($link_audio) { ?>
                <div class="blog-photo">
                    <iframe style="width:100%" height="150" scrolling="no" frameborder="no" src="<?php echo esc_url( $link_audio ); ?>"></iframe>
                </div>
                <?php } ?>
            <?php } ?>
            <div class="blog-texts">
                <ul class="blog-meta">
                    <li><?php the_time( get_option( 'date_format' ) ); ?></li>
                    <?php if(has_category()) { ?><li><?php the_category( ', ' ); ?></li><?php } ?>
                </ul>
                <h5 class="blog-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h5>
                <p><?php echo icos_excerpt_length(); ?></p>
            </div>
        </div>
    </div>
</div>