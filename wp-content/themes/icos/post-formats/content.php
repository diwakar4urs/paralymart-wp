<div class="col-lg-6 offset-lg-0 col-sm-6">
    <div <?php post_class(); ?>>
        <div class="blog-item">
            <?php if ( has_post_thumbnail() ) { ?>
            <div class="blog-photo">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
                </a>
            </div>
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