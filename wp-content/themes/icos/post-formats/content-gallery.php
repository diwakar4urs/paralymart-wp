<div class="col-lg-6 offset-lg-0 col-sm-6">
    <div <?php post_class(); ?>>
        <div class="blog-item">
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                <?php $images = rwmb_meta( '_cmb_images', "type=image" ); if($images){ ?>
                <div class="blog-photo owl-carousel owl-theme blog-slide">
                    <?php foreach ( $images as $image ) {  ?>
                    <?php $img = $image['full_url']; ?>
                        <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div>
                    <?php } ?>
                </div>
            <?php } } ?>
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