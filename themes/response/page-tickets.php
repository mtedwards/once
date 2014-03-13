<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class('tickets') ?> id="post-<?php the_ID(); ?>">
		<?php if(get_field('waitlist')) { $waitlist = true; }?>
			<div class="entry-content">
			  <h1 class="entry-title">
			    <?php if($waitlist) { ?>
  			     Waitlist for Melbourne
			    <?php } else { ?>
			      Book Tickets in Melbourne
			    <?php } ?>
			   </h1>
			  <?php if($waitlist) { 
  			     get_template_part( 'waitlistForm' );
  			  } else { ?>
  			  
  			  <div class="row">
  			  	<div class="small-12 columns orangegrad">
	  			  	<div class="row">
	  			  		<div class="small-12 medium-8 medium-centered large-6 large-centered columns">
		  			  		<h2>Book Tickets Online<br><span>Via <?php the_field('ticket_company'); ?></span></h2>
		  			  		<a href="<?php the_field('tickets_url') ?>" class="black-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'tickets <?php the_title() ?>']);">Book Now</a>
	  			  		</div>
	  			  	</div>
  			  	</div>
  			  </div>
  			 <div class="row sales-boxes">
  			 
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
	  			 		<h2><?php the_field('groups_heading'); ?></h2>
	  			 		<h2><span><?php the_field('group_message'); ?></span></h2>
	  			 		<a href="mailto:<?php the_field('group_email'); ?>" class="yellow-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'groups <?php the_title() ?>']);" target="_blank">make enquiry</a>
  			 		</div>
  			 	</div>
  			 	
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
	  			 		<h2><?php the_field('dates'); ?></h2>
	  			 		<h2><span><?php the_field('theatre'); ?><br><a href="<?php the_field('address'); ?>" target="_blank"><?php the_field('google_map_link'); ?></a></span></h2>
		  			 	<h3>
			  			 	<?php the_field('performance_schedule'); ?>
		  			 	</h3>
		  			 </div>
  			 	</div>
  			 	
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
		  			 	<h2><?php the_field('special_heading'); ?><br><span><?php the_field('special_details'); ?></span></h2>
		  			 	<img src="<?php the_field('special_image'); ?>" alt="<?php the_field('special_heading'); ?>">
		  			 	<a href="<?php the_field('special_link') ?>" class="yellow-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'tickets <?php the_title() ?>']);"><?php the_field('special_button') ?></a>
		  			 </div>
  			 	</div>
  			 </div>                        
 
                <?php
                  $sponsors = get_field('sponsors'); 
                  if($sponsors) { ?>
                   <div class="small-12 columns center">
                    <br>
                    <?php foreach($sponsors as $sponsor) { ?>
                    	<a href="<?php echo $sponsor['sponsor_link'] ?>" target="_blank" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Sponsor', '<?php echo $sponsor['title'] ?>']);">
	                    	<img src="<?php echo $sponsor['sponsor_image']; ?>">
                    	</a>
                    <?php } // end foreach ?>
                   </div>
                  <?php } // end if sponsors?>
              </div>
            </div>
            
        <?php } // end if waitlist ?>
			</div><?php //end entry-content ?>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>