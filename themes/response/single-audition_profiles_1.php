<?php 
  acf_form_head();
  get_header(); ?>
	</div>
	<div class="small-12 medium-3 large-3 columns">
	</div>
</div>
<div class="row">
  <div class="small-12 medium-12 large-12 columns">	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content auditionee-single">
		<?php 
      $visibility = 3;
      //get_currentuserinfo();
      $userLevel = $current_user->user_level;
      
      //echo 'Vis: ' . $visibility . '<br>User: ' . $userLevel; 
      
      if($userLevel < $visibility ) {?>
      <H2>Sorry! You are not able to view this page</H2>
     <?php } else {?>
  			<div class="row">
  				<div class="small-8 columns">
  					<h1 class="entry-title"><?php the_title(); ?></h1>
  					<?php
              $user_id = get_current_user_id();
              if ($user_id ==  194 || $user_id ==  195 ) {} else { ?>
                <h5>Current Status: <?php the_field('status'); ?></h5>
  					<?php } ?>
  					<h5>Audition in: <?php the_field('audition_city'); ?></h5>
  					<ul>
  					 <?php $email = get_field('email');
  					   if($email) {
    					   echo '<li><b>Email:</b><a href="mailto:' . $email . '"> ' . $email . '</a></li>';
  					   }
  					  ?>
  					  <?php $phone = get_field('mobile_phone');
  					   if($phone) {
    					   echo '<li><b>Phone:</b> ' . $phone . '</li>';
  					   }
  					  ?>
  					  <?php $town = get_field('town');
  					   if($town) {
    					   echo '<li><b>Town:</b> ' . $town . '</li>';
  					   }
  					  ?>
  					  <?php $state = get_field('state');
  					   if($state) {
    					   echo '<li><b>State:</b> ' . $state . '</li>';
  					   }
  					  ?>
  					  <?php $dob = get_field('dob');
  					   if($dob) {
    					   echo '<li><b>D.O.B.:</b> ' . $dob . '</li>';
  					   }
  					  ?>
  					</ul>
  					<?php if(get_field('aud_have_an_agent')) { ?>
  					 <?php if(get_field('aud_agent_contact')){
    					 echo '<h5>Please use AGENT as contact:</h5>';
  					 } else {
    					 echo '<h5>Agent Details (Please contact actor directly):</h5>';
  					 } ?>
  					 <ul>
  					   <?php 
  					     $agency = get_field('aud_agency');
  					     if($agency) {
  					     echo '<li><h6>' . $agency . '</h6></li>';
  					     }
  					   ?>
  					   
  					   <?php 
  					     $agent = get_field('aud_agent_name');
  					     if($agent) {
  					     echo '<li>Agent: ' . $agent . '</li>';
  					     }
  					   ?>
  					   
  					   <?php 
  					     $agentEmail = get_field('aud_agent_email');
  					     if($agentEmail) {
  					     echo '<li>Email: <a href="mailto:' . $agentEmail .'">' . $agentEmail . '</a></li>';
  					     }
  					   ?>
  					   
  					   <?php 
  					     $agentPhone = get_field('aud_agent_phone');
  					     if($agentPhone) {
  					     echo '<li>Phone: ' . $agentPhone . '</li>';
  					     }
  					   ?>
  					 </ul>
  					<?php } ?>
  				</div>
  				<div class="small-4 columns">
  					 <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail('medium', array('class' => 'alignright'));
                }
              ?>
  				</div>
  			</div>
  			<div class="row">
  				<div class="small-12 columns">
  					<hr>
  				</div> 
  			</div>
        
        <?php /********** PERSONAL DETAILS ***********/ ?>
        <div class="row">
        	<div class="small-12 columns">
        		<h4>Voice:</h4>
        		<ul>
        		  <li><b>Type:</b> <?php the_field('voice_type'); ?></li>
        		  <li><b>Range:</b> <?php the_field('voice_range'); ?></li>
        		</ul>
        	</div> 
        </div>
        
        <div class="row">
        	<div class="small-12 columns">
        		<h4>Experience:</h4>
        		<ul>
        		<?php 
              $exp1 = get_field('experience_1');
              $year1 = get_field('experience_1_year');
              if($exp1) { ?>
                <li>
                <div class="row">
                	<div class="small-6 columns">
                		<?php echo $exp1; ?>
                	</div>
                	<div class="small-6 columns">
                		<?php echo $year1; ?>
                	</div>
                </div>
                </li>
            <?php } ?>
            <?php 
              $exp2 = get_field('experience_2');
              $year2 = get_field('experience_2_year');
              if($exp2) { ?>
                <li>
                <div class="row">
                	<div class="small-6 columns">
                		<?php echo $exp2; ?>
                	</div>
                	<div class="small-6 columns">
                		<?php echo $year2; ?>
                	</div>
                </div>
                </li>
            <?php } ?>
            <?php 
              $exp3 = get_field('experience_3');
              $year3 = get_field('experience_3_year');
              if($exp3) { ?>
                <li>
                <div class="row">
                	<div class="small-6 columns">
                		<?php echo $exp3; ?>
                	</div>
                	<div class="small-6 columns">
                		<?php echo $year3; ?>
                	</div>
                </div>
                </li>
            <?php } ?>
            <?php 
              $exp4 = get_field('experience_4');
              $year4 = get_field('experience_4_year');
              if($exp4) { ?>
                <li>
                <div class="row">
                	<div class="small-6 columns">
                		<?php echo $exp4; ?>
                	</div>
                	<div class="small-6 columns">
                		<?php echo $year4; ?>
                	</div>
                </div>
                </li>
            <?php } ?>
            <?php 
              $exp5 = get_field('experience_5');
              $year5 = get_field('experience_5_year');
              if($exp5) { ?>
                <li>
                <div class="row">
                	<div class="small-6 columns">
                		<?php echo $exp5; ?>
                	</div>
                	<div class="small-6 columns">
                		<?php echo $year5; ?>
                	</div>
                </div>
                </li>
            <?php } ?>
        		</ul>
        	</div> 
        </div>


        
        <div class="row">
        	<div class="small-12 columns">
        		<h4>Instruments:</h4>
        		<ul>
        		<?php 
              $inst1 = get_field('instrument_1');
              $inst_exp1 = get_field('instrument_1_experience');
              if($inst1) { ?>
                <li>
                  <div class="row">
                  	<div class="small-6 columns">
                  		<b><?php echo $inst1; ?></b>
                  	</div>
                  	<div class="small-6 columns">
                  		<?php echo $inst_exp1; ?>
                  	</div>
                  </div>
                </li>  
            <?php } ?>  
            
            <?php 
              $inst2 = get_field('instrument_2');
              $inst_exp2 = get_field('instrument_2_experience');
              if($inst2) { ?>
                <li>
                  <div class="row">
                  	<div class="small-6 columns">
                  		<b><?php echo $inst2; ?></b>
                  	</div>
                  	<div class="small-6 columns">
                  		<?php echo $inst_exp2; ?>
                  	</div>
                  </div>
                </li>
            <?php } ?> 
          
            <?php 
              $inst3 = get_field('instrument_3');
              $inst_exp3 = get_field('instrument_3_experience');
              if($inst3) { ?>
                <li>
                  <div class="row">
                  	<div class="small-6 columns">
                  		<b><?php echo $inst3; ?></b>
                  	</div>
                  	<div class="small-6 columns">
                  		<?php echo $inst_exp3; ?>
                  	</div>
                  </div>
                </li>
            <?php } ?> 
            
            <?php 
              $inst4 = get_field('instrument_4');
              $inst_exp4 = get_field('instrument_4_experience');
              if($inst4) { ?>
                <li>
                  <div class="row">
                  	<div class="small-6 columns">
                  		<b><?php echo $inst4; ?></b>
                  	</div>
                  	<div class="small-6 columns">
                  		<?php echo $inst_exp4; ?>
                  	</div>
                  </div>
                </li>
            <?php } ?> 
            
            <?php 
              $inst5 = get_field('instrument_5');
              $inst_exp5 = get_field('instrument_5_experience');
              if($inst5) { ?>
                <li>
                  <div class="row">
                  	<div class="small-6 columns">
                  		<b><?php echo $inst5; ?></b>
                  	</div>
                  	<div class="small-6 columns">
                  		<?php echo $inst_exp5; ?>
                  	</div>
                  </div>
                </li>
            <?php } ?> 
        	</div> 
        </div>
        
        <div class="row">
        	<div class="small-12 columns">
        		<hr>
        	</div> 
        </div>
        
        <div class="row">
        	<div class="small-12 columns">
          	<h4>Qualifications:</h4>
          	<?php the_field('qualifications'); ?>
        	</div> 
        </div>
        <br>
        <div class="row">
          <?php $cv = get_field('aud_cv_upload'); 
            if($cv) {
              echo '<div class="small-6 columns">';
              echo '<h4>Resume:</h4>';
              echo '<a href="' . $cv . '" target="_blank">View CV</a>';
              echo '</div>';
            }
          ?>

        </div>
        
        <div class="row">
        	<div class="small-12 columns">
        		<hr>
        	</div> 
        </div>
        
        <div class="row">
        	<div class="small-12 columns">
        		<h3>Song:</h3>        		  
        		  <?php 
        		   $song = get_field('song_link'); 
			   $song = preg_replace('/\s+/', '', $song);	
			?>
        		   <a href="<?php echo $song; ?>" target="_blank">Song Link</a><br><br>
               <?php 
			  	$song = wp_oembed_get($song);
               	echo $song;
               ?>
            <?php
                $song_pw = get_field('song_vimeo_pw');
                if($song_pw){
                  echo '<p>Password:' . $song_pw . '</p>';
                }
            ?>
        	</div>
        </div>
        
        <div class="row">
        	<div class="small-12 columns">
        		<h3>Monologue:</h3>
        		<?php 
        		   $mono = get_field('monologue_link'); 
			   $mono = preg_replace('/\s+/', '', $mono);
			?>
        		<a href="<?php echo $mono; ?>" target="_blank">Monologue Link</a><br><br> 
        		   
        		<?php
               $mono = wp_oembed_get($mono);
               echo $mono;
            ?>
            <?php
              $mono_pw = get_field('mono_vimeo_pw');
              if($mono_pw){
                echo '<p>Password:' . $mono_pw . '</p>';
              }
            ?>
        	</div> 
        </div>
        <br>
        <hr>
        <div class="row">
        	
        	 <?php
            $user_id = get_current_user_id();
            if ($user_id ==  194 || $user_id ==  195 ) {} else { ?>
            <div class="small-4 columns">
             <?php
              $options = array(
              	'field_groups' => array('111'),
              	'updated_message' => 'Auditionee updated.', // this will find the field groups for this post (post ID's of the acf post objects)
              );
              acf_form($options);
            
             ?>        		
        	</div>
        	<div class="small-8 columns">
            <a href="<?php bloginfo('url') ?>/audition-profiles/batch-1-unprocessed/" class="button expand">Back to main list</a>
            <a href="<?php bloginfo('url') ?>/audition-profiles/batch-1-suzanne/" class="button expand">Back to Suzanne's Unprocessed List</a>
            <a href="<?php bloginfo('url') ?>/audition-profiles/batch-1-craig/" class="button expand">Back to Craig's Unprocessed List</a>
        	</div> 
        </div>
        <hr>
        <div class="row">
        	<div class="small-6 columns">
        		<?php next_post_link('&laquo; %link'); ?>
        	</div> 
        	<div class="small-6 columns right">
        		<?php previous_post_link('%link &raquo'); ?>
        	</div> 
        </div>
        <?php } // end if $user_id 
        if ($user_id ==  194 ) { // KELLYs Status ?>
        <hr>
        <div class="small-4 cloumns">
          <?php $options = array(
              	'field_groups' => array('1295'),
              	'updated_message' => 'Auditionee updated. <a href="/audition-profiles/batch-1-creatives/">Back to List</a>', // this will find the field groups for this post (post ID's of the acf post objects)
              );
              acf_form($options); ?>
        </div>    
        <?php } ?>
        
        <?php if ($user_id ==  195 ) { // Louise Status ?>
        <hr>
        <div class="small-4 cloumns">
          <a href="/audition-profiles/batch-1-creatives/">Back to full list</a>
        </div>
        <?php } ?>
        
        
				<hr>
				<?php comments_template(); ?>
					<?php }//end vis check ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
		
<?php get_footer(); ?>