<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	
	<link href="https://plus.google.com/113907490633717096036" rel="publisher" />
	
	<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   
    ga('create', 'UA-44051658-1', 'oncemusical.com.au');
    ga('send', 'pageview');   
  </script>
  
  <script src="https://apis.google.com/js/plusone.js"></script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>
  
  if(document.width > 900){
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=681730241853452";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  }
</script>
<div class="contain-to-grid">
	<!-- Starting the Top-Bar -->
	<nav class="top-bar">
	    <ul class="title-area">
	        <li class="name">
	        	<a href="#"></a>
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left">%3$s</ul>',
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li'
	            ) ),
	        ) );
	    ?>
	    </section>
	</nav>
	<!-- End of Top-Bar -->
</div>
	<div class="navigation">
	  <div class="row">
	  	<div class="columns quotes">
	  	  <?php $quotes = get_field('reviews','options');
	  	    if($quotes){
	  	    shuffle($quotes);
  	  	    foreach($quotes as $quote){ ?>
  	  	      <?php $cite = $quote['citation']; ?>
    	  	    <blockquote><?php echo $quote['quote']; if($cite){ echo '<cite>' . $cite . '</cite>'; }?></blockquote>   
  	  	   <?php
  	  	    }
	  	    }
	  	   ?>
	  	</div>
	  	<div class="social-button-box columns">
	  	  <ul class="social-buttons">
	  	    <li><div class="fb-like" data-href="https://www.facebook.com/pages/Once-the-Musical-Australia/161226130747099" data-width="90" data-layout="button_count" data-show-faces="false" data-send="false"></div></li>
	  	    <li><a href="https://twitter.com/OnceMusicalAu" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @OnceMusicalAu</a></li>
	  	    <li><div class="g-ytsubscribe" data-channelid="UCOs6N9LARLytfxfnIx-2PVQ" data-layout="default"></div></li>
	  	  </ul>
	  	</div>
	  </div>
	   <div class="row">
	  	<div class="small-7 columns">
	  		<?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="main-menu">%3$s</ul>',
	        ) );
	    ?>

	  	</div>
	  	<div class="small-5 columns dates">
	  		<b>melbourne</b> from 30 sept 2014
	  	</div>
	  </div>
	</div>
<section class="container row main-document" role="document">
  <div class="small-12 medium-9 large-9 columns">
  	
  	<header class="main-header container row">
  	  <?php if(is_front_page()) { ?>
  	     <div class="byline">
	  	   	<a class="button small radius" onClick="ga('send', 'event', 'homepage', 'click','tickets');" href="<?php bloginfo('url'); ?>/tickets">tickets</a>&nbsp;&nbsp;&nbsp;&nbsp;his music needed one thing.&nbsp;her.
  	   	</div>
  	 <?php } ?>
  	 <div class="small-12 medium-6 columns">
  	 	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  	 </div>
  	 <div class="small-12 medium-6 columns">
  	   <?php if(is_front_page()) { ?>
        <div class="tony half">
        </div>
        <div class="itunes half">
          <?php require_once('itunes.php'); ?>
        </div>
       <?php } else {?>
        <div class="itunes">
          <?php require_once('itunes.php'); ?>
        </div>
        <?php } ?>
      </div> 
      <?php if(is_front_page()) { ?>
  	 <div class="youtube-box">
  	  <div class="flex-video widescreen">
  	      <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
          <div id="player"></div>
          <img onClick="ga('send', 'event', 'onpage', 'click','replay video');" id="vidBoard" src="<?php the_field('video_board'); ?>" alt="Video Board">
  	  </div>
      <script>
        if ($(window).width() > 900) {
          // 2. This code loads the IFrame Player API code asynchronously.
          var tag = document.createElement('script');
    
          tag.src = "https://www.youtube.com/iframe_api";
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
          // 3. This function creates an <iframe> (and YouTube player)
          //    after the API code downloads.
          var player;
          function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
              height: '264',
              width: '464',
              videoId: '<?php the_field('youtube_video_code'); ?>',
              playerVars: {
                'rel': 0,
              },
              events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
              }
            });
          }
    
          // 4. The API will call this function when the video player is ready.
          function onPlayerReady(event) {
            //$(".youtube-box").fitVids();
            event.target.playVideo();
          }
    
          // 5. The API calls this function when the player's state changes.
          //    The function indicates that when playing a video (state=1),
          //    the player should play for six seconds and then stop.
          var done = false;
          function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
              mattVidEnd();
            }
          }
          
          function mattVidEnd() {
            $('.youtube-box iframe').fadeOut();
            $('.youtube-box .flex-video').addClass('startVid');
            $('#vidBoard').fadeIn();
          }
          
          $('.youtube-box').on('click','.startVid',function(){ 
              startVideo();
            });
                    
          function startVideo() {
            $('#vidBoard').fadeOut();
            $('.youtube-box iframe').fadeIn();
            player.playVideo();
          }
        } else {
          $('#player').html('<iframe width="640" height="360" src="//www.youtube.com/embed/<?php the_field('youtube_video_code'); ?>" frameborder="0" allowfullscreen></iframe>');
        }
      </script>  
      
    </div>
      <div class="small-12 columns tickets-button">
        <a onClick="ga('send', 'event', 'homepage', 'click','tickets');" class="button small expand radius" href="<?php bloginfo('url'); ?>/tickets">tickets</a>
      </div>
    
     <?php } // enf if is front page ?>  
  	</header>
<!-- Start the main container -->
