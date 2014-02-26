<? 
/*
  Template Name: Batch 1 Discuss
*/
 get_header(); ?>
	</div>
	<div class="small-12 medium-3 large-3 columns">
	</div>
</div>
<div class="row">
  <div class="small-12 medium-12 large-12 columns entry-content">	
  <?php 
      $visibility = get_field('visibility');
      //get_currentuserinfo();
      $userLevel = $current_user->user_level;
      
      // echo 'Vis: ' . $visibility . '<br>User: ' . $userLevel; 
      
      if($userLevel < $visibility ) {?>
      <H2>Sorry! You are not able to view this page</H2>
     <?php } else {?>
	<div class="row">
	<div class="small-4 columns">
		  <h3>Auditionee's Batch 1</h3>
	</div>
	<div class="small-5 columns">
	 <ul class="auditionee-type">
	   <li><a href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-unprocessed/">Unprocessed</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-suzanne-unprocessed/">Suzanne Unprocessed</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-craig-unprocessed/">Craig Unprocessed</a></li>
	   <li><a class="current" href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-discuss/">Discuss</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-no/">No</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/audition-profiles/batch-1-creatives/">For Creatives</a></li>
	 </ul>
	</div>
	<div class="small-3 columns">
  	<a class="button expand" id="toggle_compact">Full View</a>
	</div> 
</div>
	
	
	<?php
	$args = array( 
	    'post_type' => array(
	            'audition_profiles_1',
	            ),  
	   
	    'posts_per_page' => 100,                
	    'order' => 'DESC',
	    'orderby' => 'date',
	    'meta_key' => 'status',
	    'meta_value' => 'Discuss', // No / Maybe
	    );
	
	$the_query = new WP_Query( $args );
	
	// The Loop
	if ( $the_query->have_posts() ) : ?>
	
	  <ul id="auditionees" class="compact">
		<?php /* Start the Loop */ ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php get_template_part( 'content', 'auditionee'); ?>
		<?php endwhile; ?>
	  </ul>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif;
    	// Reset Post Data
    	wp_reset_postdata();
    	
    	?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>
	  <?php } //end user level check ?>
	</div>
		
<?php get_footer(); ?>