<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content buzz">
			 <div class="row">
			 	<div class="small-12 columns">
			 		<?php the_content(); ?>
			 	</div> 
			 </div>
				<?php while(has_sub_field('sections')){
  				if(get_row_layout() == "image"): // layout: Image ?>
  				  <div class="row">
  				  	<div class="small-12 columns">
  				  	  <?php 
  				  	     $image = get_sub_field('image');
  				  	     $image = $image[url];
  				  	   ?>
  				  		<img src="<?php echo $image; ?>">
  				  	</div> 
  				  </div>
  				<?php elseif(get_row_layout() == "single_quote"): // layout: Single Quote ?>
  				  <div class="row">
  				  	<div class="small-12 columns">
  				  		<blockquote>
  				  		  <?php the_sub_field('quote'); ?>
  				  		  <cite><?php the_sub_field('quote_citation'); ?></cite>
  				  		</blockquote>
  				  	</div> 
  				  </div>
  				<?php elseif(get_row_layout() == "double_quote"): // layout: Double Quote ?>
  				  <div class="row">
  				  	<div class="small-12 medium-6 large-6 columns">
  				  		<blockquote>
  				  		  <?php the_sub_field('left_quote'); ?>
  				  		  <cite><?php the_sub_field('left_quote_citation'); ?></cite>
  				  		</blockquote>
  				  	</div>
  				  	<div class="small-12 medium-6 large-6 columns">
  				  		<blockquote>
  				  		  <?php the_sub_field('right_quote'); ?>
  				  		  <cite><?php the_sub_field('right_quote_citation'); ?></cite>
  				  		</blockquote>
  				  	</div> 
  				  </div>
  				<?php endif;
				} ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>