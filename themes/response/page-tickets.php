<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<?php if(get_field('waitlist')) { $waitlist = true; }?>
			<div class="entry-content">
			  <h3 class="entry-title">
			    <?php if($waitlist) { ?>
  			     Waitlist for Melbourne
			    <?php } else { ?>
			      Book Tickets in Melbourne
			    <?php } ?>
			   </h3>
			  <?php if($waitlist) { 
  			     get_template_part( 'waitlistForm' );
  			  } else { ?>
            <div class="small-12 column">
  			      <div class="grey-box center witches">
                <div class="small-12 small-centered medium-6 medium-centered large-4 large-centered columns">			        
      			      <h2 class="section-heading">Book Online</h2>
      			      <p>Via <?php the_field('ticket_company'); ?></p>
      			      <a href="<?php the_field('tickets_url') ?>" class="green-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'tickets <?php the_title() ?>']);">Book Now</a>
      			      <p class="small">
      			        Phone <?php the_field('tickets_phone'); ?> or 
                    <a href="<?php the_field('ticket_outlets'); ?>">Visit an Outlet</a>
                  </p>
                </div>
  			      </div><?php // end grey-box ?>
            </div><?php // end small-12 ?>
                        
            <div class="small-12 column">
              <div class="row balance">
                <div class="small-12 medium-6 columns">
                  <div class="grey-box center">        
          			      <h2 class="section-heading"><?php the_field('groups_heading'); ?></h2>
          			      <p>Bring your group to OZ and save!</p>
          			      <p>Phone <?php the_field('group_phone'); ?> or</p>
          			      <div class="small-12 medium-12 large-8 large-centered medium-centered small-centered columns">
            			      <a href="mailto:<?php the_field('group_email'); ?>" class="grey-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'groups <?php the_title() ?>']);" target="_blank">Make a Reservation</a>
          			      </div>
      			      </div><?php // end grey-box ?>
                </div>
                <div class="small-12 medium-6 columns">
                  <div class="grey-box center">
                    <h3 class="section-heading">
                      Premium Tickets and Packages
                    </h3>
                    <p>Via Showbiz</p>
                    <p>&nbsp;</p>
                    <div class="small-12 medium-12 large-8 large-centered medium-centered small-centered columns">
                      <a href="<?php the_field('vip_url'); ?>" class="grey-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'showbiz <?php the_title() ?>']);" target="_blank">Buy Tickets</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="small-12 column">
              <div class="row balance">
                <div class="small-12 medium-6 columns">
                  <div class="grey-box center">
                    <h3 class="section-heading">
                      <?php the_field('special_heading'); ?>
                    </h3>
                    <p><?php the_field('special_details'); ?></p>
                    <p>&nbsp;</p>
                    <div class="small-12 medium-12 large-8 large-centered medium-centered small-centered columns">
                      <a href="<?php the_field('special_link'); ?>" class="grey-button button expand" onClick="_gaq.push(['_trackEvent', 'Outbound', 'Purchase', 'showbiz <?php the_title() ?>']);" target="_blank"><?php the_field('special_button'); ?></a>
                    </div>
                  </div>
                </div>
                <div class="small-12 medium-6 columns">
                  <div class="grey-box center">
                    <h3 class="section-heading">
                      <?php the_field('theatre'); ?>
                    </h3>
                    <p class="small"><?php the_field('address'); ?> <a href="<?php the_field('google_map_link'); ?>" target="_blank">View Map</a></p>
                    <p class="small">
                      <?php the_field('performance_schedule'); ?>
                    </p>
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