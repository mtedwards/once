<li>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
    	<div class="small-8 columns">
    		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    		<?php
        $user_id = get_current_user_id();
        if ($user_id ==  194 || $user_id ==  195) {} else { ?>
    		  <h5>Current Status: <?php the_field('status'); ?></h5>
    		<?php } 
      		if ($user_id ==  194) { ?>
        		<h5>Current Status: <?php the_field('kelly_status'); ?></h5>
      	<?php	} ?>

    		
    		<h5 class="contact">Contact Details:</h5>
    		<?php if(get_field('aud_agent_contact')){ ?>
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
  
  			<?php } else { ?>
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
  				 </ul>
    	  <?php } ?>
    	</div>
    	<div class="small-4 columns">
    		<?php
          if ( has_post_thumbnail() ) {
            the_post_thumbnail('medium');
          }
        ?>
    	</div>  
    </div>
    <div class="row">
    	<div class="small-12 columns">
    		<hr>
    	</div> 
    </div>
  </article>
</li>