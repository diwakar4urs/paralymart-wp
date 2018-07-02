<?php 


// Button
add_shortcode('button', 'button_func');
function button_func($atts, $content = null){
    extract(shortcode_atts(array(
        'btn_text'  =>  '',
        'btn_link'  =>  '',
        'style'     =>  '',
        'size'      =>  '',
        'color'     =>  '',
        'hcolor'    =>  '',
        'bg_color'  =>  '',
        'hbg_color' =>  '',
        'align'     =>  'inline',
        'el_class'  =>  '',
    ), $atts));
        $rand      = '';
        if($hcolor || $hbg_color){
        $rand      = 'btn'.rand(10,1000);
        }
        $class     = 'btn '.esc_attr($size).' '. esc_attr($style).' '. esc_attr($rand).' '.esc_attr($el_class);
        $color1    = (!empty($color) ? 'color:'.$color.';' : '');
        $bg_color1 = (!empty($bg_color) ? 'background:'.$bg_color.';' : '');
    ob_start(); ?>

    <div class="btn-element <?php echo esc_attr($align); ?>">
        <a class="<?php echo esc_attr($class); ?>" style="<?php echo esc_attr($bg_color1);echo esc_attr($color1); ?>" href="<?php echo esc_url($btn_link); ?>"><?php echo htmlspecialchars_decode($btn_text); ?></a>
        <?php if($hcolor || $hbg_color){ ?>
        <style type="text/css">
        <?php if($hbg_color) { ?>
         .<?php echo esc_attr($rand); ?>:before{ background: none; }
         .<?php echo esc_attr($rand); ?>:hover{ background: <?php echo esc_attr($hbg_color); ?>!important; }
        <?php }if($hcolor) { ?>
         .<?php echo esc_attr($rand); ?>:hover{ color: <?php echo esc_attr($hcolor); ?>!important; }
        <?php } ?>
        </style>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// Section Heading
add_shortcode('hsection', 'hsection_func');
function hsection_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'sub'       =>  '',
        'line'      =>  '',
        'style'     =>  's1',
    ), $atts));
    ob_start(); ?>

    <?php if($style == 's5') { ?>
        <div class="section-head-s5 text-center animated" data-animate="fadeInUp" data-delay=".1">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        </div>
    <?php }elseif($style == 's3') { ?>
        <div class="section-head-s3 text-center animated" data-animate="fadeInUp" data-delay=".1">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        </div>
    <?php }elseif($style == 's2') { ?>
    <div class="section-head-s2 text-center">
        <h6 class="heading-xs animated" data-animate="fadeInUp" data-delay=".0"><?php echo esc_html($sub); ?></h6>
        <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1"><?php echo esc_html($title); ?></h2>
    </div>
    <?php }else{ ?>
    <div class="section-head text-center">
        <?php if($line) { ?>
        <div class="heading-animation">
            <span class="line-1"></span><span class="line-2"></span>
            <span class="line-3"></span><span class="line-4"></span>
            <span class="line-5"></span><span class="line-6"></span>
            <span class="line-7"></span><span class="line-8"></span>
        </div>
        <?php } ?>
        <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">
            <?php echo esc_html($title); ?>
            <?php if($sub) { ?><span><?php echo esc_html($sub); ?></span><?php } ?>
        </h2>
    </div>
    <?php } ?>

<?php
    return ob_get_clean();
}


// Socials
add_shortcode('isocials', 'isocials_func');
function isocials_func($atts, $content = null){
    extract(shortcode_atts(array(
        'social'      =>  '',
    ), $atts));
    $socials = (array) vc_param_group_parse_atts( $social );
    ob_start(); ?>

    <ul class="social">
        <?php foreach ( $socials as $soc ) : if($soc) : 
            $soc['link'] = isset($soc['link']) ? $soc['link'] : '';
            $soc['icon'] = isset($soc['icon']) ? $soc['icon'] : '';
        ?>
        <li><a href="<?php echo esc_url($soc['link']); ?>"><em class="<?php echo esc_attr($soc['icon']); ?>"></em></a></li>
        <?php endif; endforeach; ?>
    </ul>

<?php
    return ob_get_clean();
}

// Video Popup
add_shortcode('vpopup', 'vpopup_func');
function vpopup_func($atts, $content = null){
    extract(shortcode_atts(array(
        'link'      =>  '',
        'text1'     =>  '',
        'text2'     =>  '',
        'style'     =>  's1',
    ), $atts));
    ob_start(); ?>

    <?php if($style == 's2') { ?>
    <a href="<?php echo esc_url($link); ?>" class="play-btn-alt video-play">
        <em class="fa fa-play"></em>
        <?php if($text1) { ?><span><?php echo esc_html($text1); ?></span><?php } ?>
    </a>
    <?php }else{ ?>
    <a href="<?php echo esc_url($link); ?>" class="play-btn video-play">
        <em class="play"><span></span></em>
        <?php if($text1) { ?><span><?php echo esc_html($text1); ?></span><?php } ?>
        <?php if($text2) { ?><span><?php echo esc_html($text2); ?></span><?php } ?>
    </a>
    <?php } ?>

<?php
    return ob_get_clean();
}


// Features Box
add_shortcode('iconbox', 'iconbox_func');
function iconbox_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'      =>  '',
        'title'      =>  '',
        'link'       =>  '',
        'style'      =>  '',
    ), $atts));
    $img     = wp_get_attachment_image_src($photo,'full');
    $img     = $img[0];
    ob_start(); ?>

    <div class="<?php if( $style == 's2' ) echo 'reason-item'; else echo 'features-box';?> text-center">
        <?php if($link) echo '<a href="'.esc_url($link).'">'; ?>
        <img src="<?php echo esc_url($img) ?>" alt="features">
        <?php if($link) echo '</a>'; ?>
        <h5><?php echo esc_html($title); ?></h5>
        <p><?php echo wp_specialchars_decode($content); ?></p>
    </div>

<?php
    return ob_get_clean();
}

// Icon Box
add_shortcode('iconbox2', 'iconbox2_func');
function iconbox2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'icon'       =>  '',
        'title'      =>  '',
        'style'      =>  'left',
    ), $atts));
    ob_start(); ?>


    <div class="features-item <?php if( $style == 'right' ) echo 'left'; ?>">
        <em class="ti <?php echo esc_attr($icon); ?>"></em>
        <h5><?php echo esc_html($title); ?></h5>
        <p><?php echo wp_specialchars_decode($content); ?></p>
    </div>

<?php
    return ob_get_clean();
}

// Sale Info
add_shortcode('isale', 'isale_func');
function isale_func($atts, $content = null){
    extract(shortcode_atts(array(
        'info'     =>  '',
        'cols'     =>  '',
    ), $atts));
    $infos = (array) vc_param_group_parse_atts( $info );
    ob_start(); ?>

    <div class="row">
        <?php foreach ( $infos as $inf ) : if($inf) : 
            $inf['title'] = isset($inf['title']) ? $inf['title'] : '';
            $inf['des']   = isset($inf['des']) ? $inf['des'] : '';            
        ?>
        <div class="col-sm-<?php if($cols) echo '6'; else echo '12'; ?>">
            <div class="event-single-info animated" data-animate="fadeInUp" data-delay="0">
                <h6><?php echo esc_html($inf['title']); ?></h6>
                <p><?php echo wp_specialchars_decode($inf['des']); ?></p>
            </div>
        </div>
        <?php endif; endforeach; ?>
    </div>

<?php
    return ob_get_clean();
}


// Process
add_shortcode('icoprocess', 'icoprocess_func');
function icoprocess_func($atts, $content = null){
    extract(shortcode_atts(array(
        'process'  =>  '',
    ), $atts));
    $proces = (array) vc_param_group_parse_atts( $process );
    ob_start(); ?>

    <div class="row align-items-center">
        <div class="col-lg-7">
            <div class="slider-nav">
                <?php $i = 2; foreach ( $proces as $proc ) : if($proc) : 
                    $proc['icon']  = isset($proc['icon']) ? $proc['icon'] : '';         
                ?>
                <div class="slider-nav-item owl-dots animated" data-animate="fadeInUp" data-delay=".<?php echo esc_attr($i); ?>"><em class="<?php echo esc_attr($proc['icon']); ?>"></em></div>
                <?php endif; $i++; endforeach; ?>
            </div>
        </div><!-- .col  -->
        <div class="col-lg-5">
            <div class="slider-pane">
                <?php foreach ( $proces as $proc ) : if($proc) : 
                    $proc['title'] = isset($proc['title']) ? $proc['title'] : '';
                    $proc['des']   = isset($proc['des']) ? $proc['des'] : '';            
                ?>
                <div class="slider-pane-item">
                    <h5 class="animate-up delay-5ms"><?php echo esc_html($proc['title']); ?></h5>
                    <p class="animate-up delay-6ms"><?php echo wp_specialchars_decode($proc['des']); ?></p>
                </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </div>

<?php
    return ob_get_clean();
}


// CountDown
add_shortcode('cdown', 'cdown_func');
function cdown_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'date'      =>  '',
        'btn'       =>  '',
        'icon'      =>  '',
        'line'      =>  '',
        'current'   =>  '',
        'prog'      =>  '',
    ), $atts));
    $icons = (array) vc_param_group_parse_atts( $icon );
    $progs = (array) vc_param_group_parse_atts( $prog );
    $url   = vc_build_link( $btn );
    ob_start(); ?>

    <div class="countdown-box text-center <?php if($line) echo 'countdown-header';?>">
        <?php if($line) echo '<span class="extra-line"></span>';?>
        <?php if($title) echo '<h6>'.esc_html($title).'</h6>'; ?>
        <div class="token-countdown d-flex align-content-stretch" data-date="<?php echo esc_attr($date); ?>"></div>
        <?php if($prog) { ?>
        <div class="token-status-bar">
            <div class="token-status-percent" style="width:<?php echo esc_attr($current); ?>;"></div>
            <?php foreach ( $progs as $pro ) : if($pro) : 
                $pro['pstep'] = isset($pro['pstep']) ? $pro['pstep'] : '';
                $pro['step']  = isset($pro['step']) ? $pro['step'] : '';
            ?>
            <span class="token-status-point" style="left:<?php echo esc_attr($pro['pstep']); ?>;"><?php echo esc_html($pro['step']); ?></span>
            <?php endif; endforeach; ?>
        </div>
        <?php }if ( strlen( $btn ) > 0 && strlen( $url['url'] ) > 0 ) {
            echo '<a class="btn btn-alt btn-sm" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .'</a>';
        } ?>
        <?php if($icons) { ?>
        <ul class="icon-list">
            <?php foreach ( $icons as $ic ) : if($ic) : 
                $ic['name'] = isset($ic['name']) ? $ic['name'] : ''; 
            ?>
            <li>
                <?php if($ic['name']) { ?>
                <em class="<?php echo esc_attr($ic['name']); ?>"></em>
                <?php }else{ ?>
                <em class="<?php echo esc_attr($ic['nname']); ?>"></em>
                <?php } ?>
            </li>
            <?php endif; endforeach; ?>
        </ul>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}

// CountDown 2
add_shortcode('cdown2', 'cdown2_func');
function cdown2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'     =>  '',
        'date'      =>  '',
        'btn'       =>  '',
        'icon'      =>  '',
        'video'     =>  '',
        'paper'     =>  '',
        'pcur'      =>  '',
        'cur'       =>  '',
        'prog'      =>  '',
    ), $atts));
    $icons = (array) vc_param_group_parse_atts( $icon );
    $progs = (array) vc_param_group_parse_atts( $prog );
    $url   = vc_build_link( $btn );
    $url2  = vc_build_link( $paper );
    $url3  = vc_build_link( $video );
    ob_start(); ?>

    <div class="token-box shadow text-center animated" data-animate="fadeInUp" data-delay="0.95">
        <?php if($title) echo '<h6 class="small-text">'.esc_html($title).'</h6>'; ?>
        <div class="token-countdown d-flex align-content-stretch" data-date="<?php echo esc_attr($date); ?>"></div>
        <?php if($content) { ?>
        <div class="token-details">
            <?php echo wp_specialchars_decode($content); ?>
        </div>
        <?php } ?>
        <div class="token-bar">
            <div class="token-percent" style="width:<?php echo esc_attr($pcur); ?>;"><?php echo esc_html($cur); ?></div>
            <?php foreach ( $progs as $pro ) : if($pro) : 
                $pro['pstep'] = isset($pro['pstep']) ? $pro['pstep'] : '';
                $pro['step']  = isset($pro['step']) ? $pro['step'] : '';
            ?>
            <span class="token-point" style="left:<?php echo esc_attr($pro['pstep']); ?>;"><?php echo esc_html($pro['step']); ?></span>
            <?php endif; endforeach; ?>
        </div>
        <ul class="btns">
            <?php if ( strlen( $video ) > 0 && strlen( $url3['url'] ) > 0 ) {
                echo '<li><a class="btn btn-simple video-play" href="' . esc_attr( $url3['url'] ) . '" target="' . ( strlen( $url3['target'] ) > 0 ? esc_attr( $url3['target'] ) : '_self' ) . '"> <em class="fa fa-play"></em> ' . esc_attr( $url3['title'] ) .'</a></li>';
            ?>
            <?php }if ( strlen( $btn ) > 0 && strlen( $url['url'] ) > 0 ) {
                echo '<li><a class="btn btn-alt btn-lg" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .'</a></li>';
            ?>
            <?php }if ( strlen( $paper ) > 0 && strlen( $url2['url'] ) > 0 ) {
                echo '<li><a class="btn btn-simple" href="' . esc_attr( $url2['url'] ) . '" target="' . ( strlen( $url2['target'] ) > 0 ? esc_attr( $url2['target'] ) : '_self' ) . '"> <em class="fa fa-file"></em> ' . esc_attr( $url2['title'] ) .'</a></li>';
            } ?>
        </ul>
        <?php if($icons) { ?>
        <ul class="icon-list">
            <?php foreach ( $icons as $ic ) : if($ic) : 
                $ic['name'] = isset($ic['name']) ? $ic['name'] : ''; 
            ?>
            <li>
                <?php if($ic['name']) { ?>
                <em class="<?php echo esc_attr($ic['name']); ?>"></em>
                <?php }else{ ?>
                <em class="<?php echo esc_attr($ic['nname']); ?>"></em>
                <?php } ?>
            </li>
            <?php endif; endforeach; ?>
        </ul>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}


// RoadMap
add_shortcode('rmap', 'rmap_func');
function rmap_func($atts, $content = null){
    extract(shortcode_atts(array(
        'road'     =>  '',
        'nav'      =>  '',
        'style'    =>  's1',
    ), $atts));
    $roads = (array) vc_param_group_parse_atts( $road );
    ob_start(); ?>

    <?php if($style == 's3') { ?>
    <div class="roadmap-carousel-container" >
        <div class="roadmap-carousel<?php if($nav) echo '-withnav'; ?>" >
            <?php foreach ( $roads as $roa ) : if($roa) : 
                $roa['done'] = isset($roa['done']) ? 'roadmap-done' : '';
                $roa['date'] = isset($roa['date']) ? $roa['date'] : '';
                $roa['des']  = isset($roa['des'])  ? $roa['des'] : '';
            ?>
            <div class="roadmap-item <?php echo esc_attr($roa['done']); ?>">
                <h6><?php echo esc_html($roa['date']); ?></h6>
                <p><?php echo esc_html($roa['des']); ?></p>
            </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
    <?php }elseif($style == 's2') { ?>
    <div class="roadmap-list-alt text-center timeline-carousel">
        <?php $i = 1; foreach ( $roads as $roa ) : if($roa) : 
            $roa['done'] = isset($roa['done']) ? 'sra-done' : '';
            $roa['date'] = isset($roa['date']) ? $roa['date'] : '';
            $roa['des']  = isset($roa['des'])  ? $roa['des'] : '';
            $gra = 'ctob';
            if($i == 2 || $i == 8){ $gra  = 'btoa'; }
            if($i == 3 || $i == 9){ $gra  = 'atob'; }
            if($i == 4 || $i == 10){ $gra = 'btoc'; }
            if($i == 5 || $i == 11){ $gra = 'ctoa'; }
            if($i == 6 || $i == 12){ $gra = 'atoc'; }
        ?>
        <div class="single-roadmap-alt <?php echo esc_attr($roa['done']); ?> gradiant-<?php echo $gra;?>">
            <h6><?php echo esc_html($roa['date']); ?></h6>
            <p><?php echo esc_html($roa['des']); ?></p>
        </div>
        <?php endif; $i++; endforeach; ?>
    </div>
    <?php }else{ ?>
    <div class="row roadmap-list align-items-end">
        <?php $i = 1; foreach ( $roads as $roa ) : if($roa) : 
            $roa['high'] = isset($roa['high']) ? $roa['high'] : '';
            $roa['done'] = isset($roa['done']) ? $roa['done'] : '';
            $roa['down'] = isset($roa['down']) ? $roa['down'] : '';
            $roa['date'] = isset($roa['date']) ? $roa['date'] : '';
            $roa['des']  = isset($roa['des']) ? $roa['des'] : '';
        ?>
        <div class="col-lg <?php if( $i % 2 == 0 ) echo 'width-0'; ?>">
            <div class="single-roadmap roadmap-<?php if($roa['high']) echo 'lg';else echo 'sm'; ?> <?php if($roa['done']) echo 'roadmap-done'; if($roa['down']) echo ' roadmap-down'; ?>">
                <h6><?php echo esc_html($roa['date']); ?></h6>
                <p><?php echo wp_specialchars_decode($roa['des']); ?></p>
            </div>
        </div>
        <?php endif; $i++; endforeach; ?>
    </div>
    <?php } ?>

<?php
    return ob_get_clean();
}

// Member Team
add_shortcode('member','member_func');
function member_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'name'      =>  '',
        'job'       =>  '',
        'social'    =>  '',
        'idpost'    =>  '',
        'square'    =>  '',
    ), $atts));
        $img     = wp_get_attachment_image_src($photo,'full');
        $img     = $img[0];
        $socials = (array) vc_param_group_parse_atts( $social );
    ob_start(); 
?>

    <div class="<?php if($square) echo 'team-member'; else echo 'team-circle text-center';?>">
        <div class="team-photo">
            <img src="<?php echo esc_url($img); ?>" alt="" />
            <?php if($idpost) { ?><span data-mfp-src="<?php echo get_permalink( $idpost ); ?>" class="expand-trigger content-popup"><?php } ?>
        </div>
        <div class="team-info">
            <h5 class="team-name"><?php echo wp_specialchars_decode($name); ?></h5>
            <span class="team-title"><?php echo wp_specialchars_decode($job); ?></span>
            <?php if($socials) { ?>
            <ul class="team-social">
                <?php foreach ( $socials as $soc ) : if($soc) : 
                    $soc['link']  = isset($soc['link']) ? $soc['link'] : '';
                    $soc['icon']  = isset($soc['icon']) ? $soc['icon'] : '';
                ?>
                <li><a href="<?php echo esc_url($soc['link']); ?>"><em class="<?php echo esc_attr($soc['icon']); ?>"></em></a></li>
                <?php endif; endforeach; ?>
            </ul>
            <?php } ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Member Team 2
add_shortcode('member2','member2_func');
function member2_func($atts, $content = null){
    extract(shortcode_atts(array(
        'photo'     =>  '',
        'name'      =>  '',
        'job'       =>  '',
        'social'    =>  '',
    ), $atts));
        $img     = wp_get_attachment_image_src($photo,'full');
        $img     = $img[0];
        $socials = (array) vc_param_group_parse_atts( $social );
    ob_start(); 
?>

    <div class="team-described">
        <div class="d-flex">
            <div class="team-info">
                <h5 class="team-name"><?php echo wp_specialchars_decode($name); ?></h5>
                <span class="team-title"><?php echo wp_specialchars_decode($job); ?></span>
                <ul class="team-social">
                    <?php foreach ( $socials as $soc ) : if($soc) : 
                        $soc['link']  = isset($soc['link']) ? $soc['link'] : '';
                        $soc['icon']  = isset($soc['icon']) ? $soc['icon'] : '';
                    ?>
                    <li><a href="<?php echo esc_url($soc['link']); ?>"><em class="<?php echo esc_attr($soc['icon']); ?>"></em></a></li>
                    <?php endif; endforeach; ?>
                </ul>
            </div>
            <div class="team-photo">
                <img src="<?php echo esc_url($img); ?>" alt="team">
            </div>
        </div>
        <div class="team-discription">
            <?php echo wp_specialchars_decode($content); ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}

// Skill
add_shortcode('skill', 'skill_func');
function skill_func($atts, $content = null){
    extract(shortcode_atts(array(
        'title'   =>  '',
        'per'     =>  '',
    ), $atts));
    ob_start(); ?>

    <div class="single-skill-bar">
        <div class="row no-mg">
            <div class="col-8 no-pd"><span class="skill-title"><?php echo esc_html($title); ?></span></div>
            <div class="col-4 text-right no-pd"><span class="skill-percent"><?php echo esc_html($per); ?></span></div>
        </div>
        <div class="skill-bar">
            <div class="skill-bar-percent gradiant-background" style="width:<?php echo esc_attr($per); ?>"></div>
        </div>
    </div>

<?php
    return ob_get_clean();
}


// Testimonial
add_shortcode('testi', 'testi_func');
function testi_func($atts, $content = null){
    extract(shortcode_atts(array(
        'testi'   =>  '',
        'cols'    =>  '',
    ), $atts));
    $testis = (array) vc_param_group_parse_atts( $testi );
    ob_start(); ?>

    <div class="has-carousel testi-carousel animated" data-animate="fadeInUp" data-delay=".2" data-items="3" data-dots="true" data-navs="false">
        <?php foreach ( $testis as $test ) : if($test) : 
            $img = wp_get_attachment_image_src($test['photo'],'full'); $img = $img[0];
            $test['title']  = isset($test['title']) ? $test['title'] : '';
            $test['des']    = isset($test['des']) ? $test['des'] : '';
        ?>
        <div class="media-box">
            <img src="<?php echo esc_url($img); ?>" alt="media">
            <h5 class="media-heading"><?php echo esc_html($test['title']); ?></h5>
            <p><?php echo esc_html($test['des']); ?></p>
        </div>
        <?php endif; endforeach; ?>
    </div>

<?php
    return ob_get_clean();
}


// FAQs
add_shortcode('otfaq', 'otfaq_func');
function otfaq_func($atts, $content = null){
    extract(shortcode_atts(array(
        'faq'     =>  '',
        'style'   =>  's1',
    ), $atts));
    $num = rand(10,1000);
    $faqs = (array) vc_param_group_parse_atts( $faq );
    ob_start(); ?>

    <?php if($style == 's2') { ?>
    <div class="row">
        <?php $i = 2; foreach ( $faqs as $fa ) : if($fa) : ?>
        <div class="col-md-6">
            <div class="single-faq animated" data-animate="fadeInUp" data-delay=".<?php echo esc_attr($i); ?>">
                <h5><?php echo esc_html($fa['title']); ?></h5>
                <p><?php echo esc_html($fa['ans']); ?></p>
            </div>
        </div>
        <?php endif; $i++; endforeach; ?>
    </div>
    <?php }else{ ?>
    <div class="accordion" id="accordion-<?php echo esc_attr($num); ?>">
        <?php  
            $i = rand(10,1000)+1; foreach ( $faqs as $fa ) : if($fa) : 
            $fa['open'] = isset($fa['open']) ? $fa['open'] : '';
        ?>
        <div class="card">
            <div class="card-header">
                <h5>
                    <a class="<?php if(!$fa['open']) echo 'collapsed';?>" data-toggle="collapse" data-target="#collapse-<?php echo esc_attr($i); ?>">
                        <?php echo esc_html($fa['title']); ?><span class="plus-minus"><span class="ti ti-angle-up"></span></span>
                    </a>
                </h5>
            </div>
            <div id="collapse-<?php echo esc_attr($i); ?>" class="collapse <?php if($fa['open']) echo 'show';?>" data-parent="#accordion-<?php echo esc_attr($num); ?>">
                <div class="card-body">
                    <p><?php echo esc_html($fa['ans']); ?></p>
                </div>
            </div>
        </div>
        <?php endif; $i++; endforeach; ?>
    </div>
    <?php } ?>

<?php
    return ob_get_clean();
}

// Latest Blog
add_shortcode('lblog', 'lblog_func');
function lblog_func($atts, $content = null){
    extract(shortcode_atts(array(
        'number'   =>  '3',
        'btn'      =>  '',
    ), $atts));

    $url    = vc_build_link( $btn );
    $cols = 'col-lg-4';
    if($number == '2'){
        $cols = 'col-lg-6';
    }elseif ($number == '4') {
        $cols = 'col-lg-3 col-md-6 offset-md-0';
    }

    ob_start(); ?>

    <div class="blog-list">
        <div class="row">
            <?php       
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => $number,
                );
                $blogpost = new WP_Query($args);
                if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();
            ?>
            <div class="<?php echo esc_attr($cols); ?> offset-lg-0 col-sm-8 offset-sm-2">
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
            </div><!-- .col -->
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <?php if ( strlen( $btn ) > 0 && strlen( $url['url'] ) > 0 ) {
                echo '<a class="btn btn-more" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ) .' <em class="ti ti-angle-right"></em></a>';
            } ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}