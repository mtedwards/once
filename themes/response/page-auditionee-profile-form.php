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
			 <h1><?php the_title(); ?></h1>
			 <?php if(is_user_logged_in()) { ?>
			 <h6>
			   <?php global $current_user;
  			       get_currentuserinfo();
  			       echo 'Name: ' . $current_user->display_name . "\n<br>";
  			       echo 'Email: ' . $current_user->user_email . "\n";
         ?>
			 </h6>
				<?php the_content(); ?>
			<?php } else { ?>
  			<p>Sorry you must be logged in to view this form.</p>
  			<p><a href="<?php bloginfo('url') ?>/auditions">Register for the <i><b>Once</b></i> auditions here</a></p>
			<?php } ?>
		  </div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>

<?php get_footer(); ?>