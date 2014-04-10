<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class('creatives') ?> id="post-<?php the_ID(); ?>">
		  <div class="entry-content title">
		    <h1><?php the_title(); ?></h1>
      </div>
		  <?php 
		    $creatives = get_field('creatives');
        if($creatives) { ?>
        <?php foreach($creatives as $creative){ ?>
          <article class="entry-content">
            <div class="people-header">
              <h1><?php echo $creative['name']; ?></h1><h4>&nbsp;(<?php echo $creative['position']; ?>)</h4>
            </div>
            <?php echo $creative['bio']; ?>
          </article>
          <?php } // end foreach ?>
       <?php
         } // end if $creatives
		   ?>

		</div>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>