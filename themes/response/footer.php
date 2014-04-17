</section><!-- Container End -->

<footer class="row full-width main-footer" role="contentinfo">
	<div class="small-12 large-7 columns">
	  <p>* By joining the waitlist you agree to receive emails from <i>ONCE</i> and the producers associated with this event.</p>
		<p>&copy; <?php echo date('Y'); ?> <i>ONCE</i>. All Rights Reserved.</p>
	</div>
	<div class="small-12 large-5 columns">
	 <ul>
	   <li><a href="<?php bloginfo('url'); ?>/contact-us">Contact Us</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/privacy-policy">Privacy Policy</a></li>
	   <li><a href="http://www.oncemusical.co.uk/" target="_blank">London Site</a></li>
	   <li><a href="http://www.oncemusical.com/" target="_blank">Broadway Site</a></li>
	   <li><a href="<?php bloginfo('url'); ?>/media/">Media</a></li>
	   <?php get_currentuserinfo(); global $user_level; if ($user_level > 9) { ?>
      <li><a href="<?php bloginfo('url'); ?>/audition-profiles/">Audition Profiles</a></li>
     <?php } ?>
	 </ul>
	</div>
</footer>
<?php /*
<div id="youTube" class="reveal-modal">
  <h2>Uploading your video to YouTube</h2>
  <p class="lead">When uploading your video audition to YouTube please select either <b>Public</b> or <b>Unlisted</b> in the video Privacy Settings.</p>
  <p>Public videos can be viewed by anyone.</p>

  <p>Unlisted videos can only be viewed by people when you provide them with the link. This is the best way to share your video audition with us.</p>
 
  <p><b>DO NOT</b> select Private as we will not be able to view your audition.
If in doubt send your video link to a friend to check they can view it before completing your application.</p>
 
  <div class="flex-video"><iframe width="560" height="315" src="//www.youtube.com/embed/YeBA-Btcdxs" frameborder="0" allowfullscreen></iframe></div>

<p>For further help visit: <a href="https://support.google.com/youtube/answer/157177?hl=en" target="_blank">Video privacy settings</a>
 
<p>If you need instructions for uploading videos to Youtube you will find them here: <a href="https://support.google.com/youtube/answer/57924?hl=en&ref_topic=2888648" target="_blank">How to upload videos</a></p>
   <a class="close-reveal-modal">&#215;</a>
</div>


	<div id="vimeo" class="reveal-modal">
	 <h2>Uploading your video to Vimeo</h2>

<p class="lead">When uploading your video audition to Vimeo please select either <b>Anyone</b> or <b>Only people with a password</b> in the video Privacy Settings.</p>
 
<p><b>Anyone</b> - videos allow anyone to see your video on Vimeo.</p>

<p><b>Only people with a password</b> - videos are password protected and therefore you will need to provide us with the password in your audition registration.</p>
 
<p>In the video embedding privacy options please select Anywhere so that we can make your video audition viewable to the creative team.</p>
 
<p>For further help visit: <a href="http://vimeo.com/help/faq/managing-your-videos/privacy-settings#what-do-the-different-privacy-settings-do" target="_blank">What do the different privacy settings do?</a></p>
 
  <a class="close-reveal-modal">&#215;</a>
</div>
*/ ?>
<?php include_once('tracking-footer.php'); ?>
<?php wp_footer(); ?>

</body>
</html>