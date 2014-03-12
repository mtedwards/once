<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="entry-content">
				<div class="row">
					<div class="small-12 columns">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-6 large-6 columns">
						<h4>Get music on iTunes</h4>
						<div id="itunesPlayer">
						<iframe src="https://widgets.itunes.apple.com/widget.html?c=au&brc=FFFFFF&blc=FFFFFF&trc=FFFFFF&tlc=FFFFFF&d=&t=&m=music&e=album&w=300&h=345&ids=506472607&wt=discovery&partnerId=&affiliate_id=&at=&ct=" frameborder=0 style="overflow-x:hidden;overflow-y:hidden;width:300px;height: 345px;border:0px"></iframe>
						</div>
					</div>
					<div class="small-12 medium-6 large-6 columns">
						<h4>Like and Tweet Once</h4>
						<div class="fb-like" data-href="https://www.facebook.com/pages/Once-the-Musical-Australia/161226130747099" data-width="300" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
						<br><br>
						<a class="twitter-timeline" height="300" href="https://twitter.com/OnceMusicalAu" data-widget-id="438908664812802049">Tweets by @OnceMusicalAu</a>
						
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<?php $images = get_field('imageslider'); 
							if($images) {
						?>
						<h5>Photo Gallery</h5>
						<ul data-orbit data-options="bullets:false; stack_on_small: false;">
							<?php foreach($images as $image){ ?>
						  <li>
						    <img style="width: 100%;" src="<?php echo $image['image']['sizes']['slider']; ?>">
							<?php $caption = $image['image']['description'];
								if($caption){
							 ?>
						    <div class="orbit-caption">
						      <?php echo $caption; ?>
						    </div>
						    <?php } // end if caption ?>
						  </li>
						  <?php } // end for each ?>
						</ul>
						<?php }// end if images ?>
						<?php $credit = get_field('photo_credit'); 
							if($credit){
								echo '<p><small class="alignright">' . $credit . '</small><p>';
							}
						?>
					</div>
				</div>
				<!--
<div class="row">
					<div class="small-12 columns">
						<h5>Video Library</h5>
					</div>
				</div>
-->
			</div>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>