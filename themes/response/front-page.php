<?php get_header(); ?>


<!-- Row for main content area -->
	
	<?php the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 class="hidden"><?php the_title(); ?></h1>
			<!--
<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
-->
			<footer>
			</footer>
		</article>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>