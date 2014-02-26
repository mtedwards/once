<?  get_header(); ?>
	</div>
	<div class="small-12 medium-3 large-3 columns">
	</div>
</div>
<div class="row">
  <?php 
  $visibility = 3;
  //get_currentuserinfo();
  $userLevel = $current_user->user_level;
  
  // echo 'Vis: ' . $visibility . '<br>User: ' . $userLevel; 
  
  if($userLevel < $visibility ) {?>
  <H2>Sorry! You are not able to view this page</H2>
 <?php } else {?>
  <div class="small-12 medium-12 large-12 columns entry-content">	
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'auditionee'); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
   <?php } //end user level check ?>
<?php get_footer(); ?>