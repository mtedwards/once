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
			      Book Melbourne Tickets Online
			    <?php } ?>
			   </h1>
			  <?php if($waitlist) { 
  			     get_template_part( 'waitlistForm' );
  			  } else { ?>
  			  
  			  <div class="row">
  			  	<div class="small-12 columns orangegrad">
	  			  	<div class="row">
	  			  		<div class="small-12 medium-8 medium-centered large-6 large-centered columns">
		  			  		
		  			  		<h3>Via <?php the_field('ticket_company'); ?></h3>
		  			  		
		  			  		<a href="<?php the_field('tickets_url') ?>" class="black-button button expand" 
		  			  		onClick="ga('send', 'event', 'outbound', 'purchase','ticketmaster');">
		  			  			Book Now
		  			  		</a>
		  			  		<h3>Phone <?php the_field('tickets_phone'); ?> or <a href="<?php the_field('ticket_outlets_url'); ?>" target="_blank">Visit an Outlet</a></h3>
	  			  		</div>
	  			  	</div>
  			  	</div>
  			  </div>
  			 <div class="row sales-boxes">
  			 
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
	  			 		<h2><?php the_field('groups_heading'); ?></h2>
	  			 		<hr>
	  			 		<h2><span><?php the_field('group_message'); ?></span></h2>
	  			 		
	  			 		<a href="<?php bloginfo('url'); ?>/group-bookings/" class="yellow-button button expand" 
	  			 		onClick="ga('send', 'event', 'outbound', 'purchase','groups');">
	  			 			make enquiry	  			 		
	  			 		</a>
  			 		</div>
  			 	</div>
  			 	
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
	  			 		<h2><?php the_field('dates'); ?></h2>
	  			 		<hr>
	  			 		<h2>
	  			 			<span>
		  			 			<?php the_field('theatre'); ?>
		  			 			<br>
		  			 			<a href="<?php the_field('google_map_link'); ?>" target="_blank">
		  			 				<?php the_field('address'); ?>
		  			 			</a>
	  			 			</span>
	  			 		</h2>
		  			 	<h3>
			  			 	<?php the_field('performance_schedule'); ?>
		  			 	</h3>
		  			 </div>
  			 	</div>
  			 	
  			 	<div class="small-12 medium-4 columns">
  			 		<div class="nicebox">
		  			 	<h2>
		  			 		<?php the_field('special_heading'); ?>
		  			 		<hr>
		  			 		<span>
		  			 			<?php the_field('special_details'); ?>
		  			 		</span>
		  			 	</h2>
		  			 	
		  			 	<a href="<?php the_field('special_link') ?>" target="_blank"
		  			 	onClick="ga('send', 'event', 'outbound', 'purchase','showbiz');">
		  			 		<img src="<?php the_field('special_image'); ?>" alt="<?php the_field('special_heading'); ?>">
		  			 	</a>
		  			 	
		  			 	<a href="<?php the_field('special_link') ?>" class="yellow-button button expand" target="_blank" 
		  			 	onClick="ga('send', 'event', 'outbound', 'purchase','showbiz');">
		  			 		<?php the_field('special_button') ?>
		  			 	
		  			 	</a>
		  			 </div>
  			 	</div>
  			 </div>                        
  			 <div class="row">
  			 	<div class="small-12 columns">
	  			 	<?php the_field('footer_note'); ?>
  			 	</div>
  			 </div>
                <?php
                  $sponsors = get_field('sponsors'); 
                  if($sponsors) { ?>
                   <div class="small-12 columns center sponsors">
                    <br>
                    <?php foreach($sponsors as $sponsor) { ?>
                    	<a href="<?php echo $sponsor['sponsor_link'] ?>" target="_blank"
                    	onClick="ga('send', 'event', 'outbound', 'sponsor','<?php echo $sponsor['title'] ?>']);">

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
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $(".datepicker").datepicker({ minDate: 0 });
		    if (jQuery("li.gf_readonly")){ jQuery("li.gf_readonly input").attr("readonly","readonly"); }
		});
	</script>
<?php get_footer(); ?>