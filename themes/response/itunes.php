<?php $tracks = get_field('music','options');
  if($tracks) { ?>
   <ul class="tracks">
   <?php foreach($tracks as $track) { ?>
    <li>
    <?php
      $track_file = $track['track']['url'];
      $track_file = apply_filters('the_content', $track_file);
      echo $track_file; ?>
      <b><?php echo $track['title']; ?></b>
      <a class="buy-itunes" href="https://itun.es/i6FP5JQ" target="_blank" onClick="ga('send', 'event', 'iTunes', 'click', '<?php the_title(); ?>');"><img src="<?php bloginfo('template_url'); ?>/img/itunes.png"></a>
    </li> 
   <?php } ?>
   <!-- <a id="next">THIS</a>  -->
   </ul>
   
 <?php } ?>