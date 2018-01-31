<?php  

	get_header();  
	
	// Intro
	get_template_part('article', 'menu'); 
	
	$pageTitle = get_the_title();

	/*   Item attributes   */
	$terms    = get_the_terms( get_the_ID(), 'Portfolio-type' );
	$item = array(

		'href' => 	get_post_meta(get_the_ID(), 'content_url', true),
		'is_quote' => ( get_post_format() == 'quote' ? true : false ),
		'is_audio' => ( get_post_format() == 'audio' ? true : false ),
		'is_video' => ( get_post_format() == 'video' ? true : false )
		
	);

?>

<div class="blog-content wrap">
	<div class="container">
		<div class="blog-detail-header span12"></div>
		<div class="row clearfix">
			<div class="span12">
				<!--post 1-->
				<div class="post blog-detail-post">
					
					<?php if ( $item['is_video'] ) {
					
						$vType = get_post_meta(get_the_ID(), 'video_server', true);
						$vID = get_post_meta(get_the_ID(), 'video_id', true);
						
					?>
						
						<div class="post_video">
						
							<?php if($vType == '' || $vType == '1') { ?>
							
								<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $vID; ?>" ></iframe>
						
							<?php } else { ?>	
								
								<iframe src="http://player.vimeo.com/video/<?php echo $vID; ?>?color=f0e400" width="500" height="281"></iframe>
							
							<?php } ?>
							
						</div>
					
					<?php }  if ( have_posts() ) { while ( have_posts() ) { the_post();  ?>
					
						<div class="row">
							<div class="span11 content_margin">
								<div <?php post_class(); ?> id="post_<?php the_ID(); ?>">

										<div class="blog-detail-title">
											<h4><?php echo ( single_post_title( '', false ) ); ?></h4>
										</div>
									
									<br /><br />
									<?php the_content(); ?>
									
									<br /><br />
									
									<?php if ( $item['is_audio'] ) { ?>
									
										<!-- Audio player -->
										<div class="ajs-redsky">
										
											<audio src="<?php echo $item['href']; ?>" preload="none" controls></audio>
											
										</div>
										<!-- end: Audio player -->	
									
									<?php } ?>
				
									<br /><br /><br /><br />
										
								</div>
							</div>
						</div>
	
					<?php } } ?>
				
					</div>	
			</div>

		</div>
	</div>
</div>
<?php get_footer();