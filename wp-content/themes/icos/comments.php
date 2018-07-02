<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package icos
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	

	<?php if ( have_comments() ) : ?>
		<div class="list-comments">
			<h5><?php comments_number( esc_html__('0 Comments', 'icos'), esc_html__('1 Comment', 'icos'), esc_html__('% Comments', 'icos') ); ?></h5>
		    <ol class="comment-list">
					<?php wp_list_comments('callback=icos_theme_comment'); ?>
				<?php
					// Are there comments to navigate through?
					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
					<nav class="navigation comment-navigation" role="navigation">		   
						<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'icos' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'icos' ) ); ?></div>
		                <div class="clearfix"></div>
					</nav><!-- .comment-navigation -->
				<?php endif; // Check for comment navigation ?>

				<?php if ( ! comments_open() && get_comments_number() ) : ?>
					<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'icos' ); ?></p>
				<?php endif; ?>	
		    </ol>
		</div>		
	<?php endif; ?>	

	<div class="form-message text-left">
	<?php
		$aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' 				=> 'reply-form',
                'title_reply_before'	=> '<h5 id="reply-title" class="comment-reply-title">',                              
                'title_reply_after'		=> '</h5>',                              
                'title_reply'   		=> esc_html__('Leave A Comment', 'icos'),
                'fields' 				=> apply_filters( 'comment_form_default_fields', array(
                    'author' 			=> '<div class="input-field"><input id="author" name="author" id="name" class="input-line" type="text" value="" required><label class="input-title">'. esc_html__( 'Your Name', 'icos' ) .'</label></div>',
                    'email' 			=> '<div class="input-field"><input id="author" name="email" id="name" class="input-line" type="email" value="" required><label class="input-title">'. esc_html__( 'Your Email', 'icos' ) .'</label></div>',
                ) ),                                
                 'comment_field' 		=> '<div class="input-field"><textarea required name="comment" '.$aria_req.' id="comment-message" class="txtarea input-line" aria-required="true"></textarea><label class="input-title">'. esc_html__( 'Your Comment', 'icos' ) .'</label></div>',
                 'label_submit' 		=> esc_html__( 'Post Comment', 'icos' ),
                 'comment_notes_before' => '',
                 'comment_notes_after' 	=> '',   
                 'class_submit'      	=> 'btn',            
				 'format'        		=> 'xhtml',
	        )
	    ?>
	    <?php comment_form($comment_args); ?>
	</div>
</div>	

<!-- #comments -->
