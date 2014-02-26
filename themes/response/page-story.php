<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<?php the_content(); ?>
				<div class="row">
					<?php $images = get_field('images');
					 if($images){
  					 foreach($images as $image) {
    					 $img = $image['image']['sizes']['page-thumb'];
  					 ?>
    					 <div class="small-4 columns">
    					 	<img src="<?php echo $img; ?>">
    					 </div> 
  					<?php }
					 }
					 ?>
				</div>
			</div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>