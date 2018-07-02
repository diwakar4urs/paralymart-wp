<div class="team-profile">
	<button title="Close" type="button" class="mfp-close">×</button>
	<?php while (have_posts()) : the_post(); ?>			
		<?php the_content(); ?>			
	<?php endwhile; ?>
</div>