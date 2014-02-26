<?php
/*
	Plugin Name: Matt Media Page
	Description: Add code needed for media page
  Author: Matt Edwards
	Version: 0.1
	Author URI: @mtedwards
 */

/* Change Custom Password Text */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_media-page',
		'title' => 'Media page',
		'fields' => array (
			array (
				'key' => 'field_51772a6d54f80',
				'label' => 'Files',
				'name' => 'files',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_51772a7954f81',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_51772a8c54f82',
						'label' => 'File',
						'name' => 'file',
						'type' => 'file',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add File',
			),
						array (
				'key' => 'field_517cc25f21df2',
				'label' => 'Video',
				'name' => 'video',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_517cc27421df3',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_517cc27b21df4',
						'label' => 'YouTube Link',
						'name' => 'youtube',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_517cc28621df5',
						'label' => 'Download Url',
						'name' => 'download',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Video',
			),
			array (
				'key' => 'field_51772aa454f83',
				'label' => 'Images',
				'name' => 'images',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
			),
		),
		'location' => array (
			'rules' => array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'media.php',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'custom_fields',
				2 => 'discussion',
				3 => 'comments',
				4 => 'slug',
				5 => 'author',
				6 => 'format',
				7 => 'featured_image',
				8 => 'categories',
				9 => 'tags',
				10 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
		
		register_field_group(array (
		'id' => 'acf_media-contact',
		'title' => 'Media Contact',
		'fields' => array (
			array (
				'key' => 'field_517736fad699e',
				'label' => 'Media Contact Message',
				'name' => 'media_contact',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			'rules' => array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}	
  function matts_media_page() { ?>
    <div class="entry">
				<div class="row">
					<div class="small-12 columns">
						<?php the_content(); ?>
					</div> 
				</div>
				<div class="row">
					<div class="small-12 columns">
						<?php if ( !post_password_required() ): ?>
						<div class="row">
							<?php $files = get_field('files');
							if($files) { ?>
							<h2>Files:</h2>
								<?php foreach ( $files as $file ): ?>
								<div class="row">
									<div class="small-2 columns">
										<a href="<?php echo $file['file']; ?>">
											<img class="file" src="<?php bloginfo('url'); ?>/wp-content/plugins/media-page/file_64.png" >
										</a>
									</div>
									<div class="small-10 columns">
										<h4><a href="<?php echo $file['file']; ?>">Download: <?php echo $file['title']; ?></a></h4>
									</div>
								</div>
								<hr>
								<?php 
									endforeach;
								}
								?>
						</div>
						<div class="row">
							<?php $videos = get_field('video'); 
								if($videos) {
							?>
								<h2>Videos:</h2>
								<?php foreach ( $videos as $video ):
								 // Get Thumbnail
									       $videolnk = $video['youtube'];
									       $videolnk = str_replace('http://youtu.be/','http://img.youtube.com/vi/',$videolnk);
									       $videolnk .= "/0.jpg";
									      ?>

									<div class="row">
										<div class="small-2 columns">
											<a href="<?php echo $video['download']; ?>">
												<img class="file" src="<?php echo $videolnk; ?>" >
											</a>
										</div>
										<div class="small-10 columns">
											<h4><?php echo $video['title']; ?>:</h4>
											<h4>
												<a href="<?php echo $video['youtube']; ?>"> View on YouTube</a><br>
												<a href="<?php echo $video['download']; ?>">Download Video File</a>
											</h4>
										</div>
									</div>
									<hr>		
								<?php endforeach; 
							} // End if ?>
						</div>

						<div class="row">
							<?php $images = get_field('images'); 
								if($images) {
							?>
								<h2>Images:</h2>
									<?php foreach ( $images as $image ): ?>
										<div class="row">
											<div class="small-2 columns">
												<a href="<?php echo $image['url']; ?>" title="<?php echo $image['description']; ?>">
													<img alt="<?php echo $image['alt']; ?>"  src="<?php echo $image['sizes']['thumbnail']; ?>" >
												</a>
											</div>
											<div class="small-10 columns">
												<h4><a href="<?php echo $image['sizes']['medium']; ?>">Download: <?php echo $image['title']; ?> - Low Res</a></h4>
												<h4><a href="<?php echo $image['url']; ?>">Download: <?php echo $image['title']; ?> - High Res</a></h4>
											</div>
										</div>
										<hr>
							<?php endforeach;
							}
							 ?>
						</div>
					<?php endif; ?>
					</div> 
				</div>
			</div>
    
  <?php }
  
  
function change_pw_text($content) {
  if(is_page(1401)) {
    $media_message = 'To begin the audition process enter password below:';
  } else {
    $media_message = get_field('media_contact','options');
  }
	$content = str_replace(
	'This post is password protected. To view it please enter your password below:',
	'' . $media_message . '',
	$content);
	return $content;
}
add_filter('the_content','change_pw_text');