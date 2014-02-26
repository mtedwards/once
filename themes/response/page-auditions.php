<?php get_header(); ?>

	</div>
	<div class="small-12 medium-3 large-3 columns">
	</div>
</div>
<div class="row">
  <div class="small-12 medium-12 large-12 columns entry-content">	
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div>
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
		
<?php get_footer(); ?>