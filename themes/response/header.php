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
	
	<?php include_once("tracking-header.php") ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div style="position:absolute;">
    <!--
    Start of DoubleClick Floodlight Tag: Please do not remove
    Activity name of this tag: ONCE Website Visit
    URL of the webpage where the tag is expected to be placed: http://oncemusical.com.au/
    This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
    Creation Date: 04/10/2014
    -->
    <script type="text/javascript">
      var axel = Math.random() + "";
      var a = axel * 10000000000000;
      document.write('<img src="http://ad.doubleclick.net/activity;src=4396207;type=onceweb;cat=ONCEW0;ord=1;num=' + a + '?" width="1" height="1" alt=""/>');
    </script>
    <noscript>
      <img src="http://ad.doubleclick.net/activity;src=4396207;type=onceweb;cat=ONCEW0;ord=1;num=1?" width="1" height="1" alt=""/>
    </noscript>
    <!-- End of DoubleClick Floodlight Tag: Please do not remove -->    
    </div>
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
  	 <div class="small-12 medium-6 columns">
  	 	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
  	 </div>
  	 <div class="small-12 medium-6 columns">
  	   <?php if(is_front_page()) { ?>
  	   	<div class="byline">
	  	   	his music needed one thing.<br>her.
  	   	</div>
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
  	</header>
<!-- Start the main container -->
