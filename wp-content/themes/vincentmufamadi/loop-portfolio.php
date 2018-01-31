<?php
/*   Item attributes   */
$terms    = get_the_terms( get_the_ID(), 'Portfolio-type' );
$item = array(

	'href' => 	get_post_meta(get_the_ID(), 'content_url', true),
	'is_quote' => ( get_post_format() == 'quote' ? true : false ),
	'is_gallery' => ( get_post_format() == 'gallery' ? true : false ),
	'is_video' => ( get_post_format() == 'video' ? true : false ),
	'is_audio' => ( get_post_format() == 'audio' ? true : false )
	
);

/*   Item span class   */
if ( $item['is_quote']  ||  $item['is_gallery'] ) {

	$item['href'] = '#' . sanitize_title( get_the_title() );
	
}

?>

<!--Portfolio Item-->									
<div class="item portfolio-post isotope-item <?php if($terms) { foreach ($terms as $term) { echo 'term-'.$term->term_id.' '; } } ?>"  id="portfolio_item_<?php the_ID(); ?>">

	<?php if ( $item['is_audio'] ) { ?>
	<!-- ***** AUDIO POST ****** -->
		
		<!-- magnific popup image path & title-->
		<a class="popup-with-form item-image" href="#<?php echo sanitize_title( get_the_title() ); ?>" title="<?php the_title(); ?>">
			
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/audio_post.png"  alt="Audio type" title="Audio type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
				
			<!-- item image path -->
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/audio_place_holder.jpg">
				<?php } ?>
			</div>
			
		</a>

		<!-- Audio content -->
		<div id="<?php echo sanitize_title( get_the_title() ); ?>" class="mfp-hide zoom-anim-dialog white-popup-block">
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
			<div class="clr"></div>
			
			<br /> <br />
			<!-- Audio player -->
			<div class="ajs-redsky">
			
				<audio src="<?php echo $item['href']; ?>" preload="none" controls></audio>
				
			</div>
			<!-- end: Audio player -->	
			
		</div>	
	
		<div class="clearfix"></div>
		<!-- end: Audio item -->

	<?php } elseif ( $item['is_quote']  ) { ?>
	<!-- ***** QUOTE POST ****** -->	
	
		<!-- magnific popup image path & title-->
		<a class="popup-with-form item-image" href="<?php echo $item['href']; ?>" title="<?php the_title(); ?>">
			
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/quote_post.png"  alt="Quote type" title="Quote type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
				
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/quote_place_holder.jpg">
				<?php } ?>
			</div>
			
		</a>

		<!-- Text item -->
		<div id="<?php echo sanitize_title( get_the_title() ); ?>" class="mfp-hide zoom-anim-dialog white-popup-block">
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
		</div>	

		<div class="clearfix"></div>
		<!-- End: Text item -->
			
	<!-- ***** Gallery POST ****** -->	
	<?php } elseif( $item['is_gallery'] ) { ?>

		<!-- magnific popup image path & title-->
		<a class="popup-with-form item-image" href="<?php echo $item['href']; ?>" title="<?php the_title(); ?>">
		
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/image_post.png"  alt="Gallery type" title="Gallery type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
			
			<!-- item image path -->
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/image_place_holder.jpg">
				<?php } ?>
			</div>
			
		</a>
	
		<!-- Text item -->
		<div id="<?php echo sanitize_title( get_the_title() ); ?>" class="mfp-hide zoom-anim-dialog white-popup-block">
		
			<div id="cycle-slider" data-cycle-timeout="0" class="cycle-slideshow pics">
			
				<!-- prev/next links -->
				<div class="cycle-prev"></div>
				<div class="cycle-next"></div>
				
				<?php 
					for($i=1; $i <= 10; $i++)
						px_portfolio_slide('portfolio_image_'.$i);
				?>
			</div>
			
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
		</div>	

		<div class="clearfix"></div>
		<!-- End: Text item -->

	<!-- ***** IMAGE POST ****** -->	
	<?php } elseif( px_get_url_type( $item['href'] ) == 'image' ) { ?>
	
		<!-- image path & title-->
		<a class="image-popup-margins item-image" href="<?php echo $item['href']; ?>" title="<?php the_title(); ?>">
		
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/image_post.png"  alt="Audio type" title="Audio type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
			
			<!-- item image path -->
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/image_place_holder.jpg">
				<?php } ?>
			</div>
			
		</a>
		
	<!-- *****  Video POST ****** -->	
	<?php } elseif( $item['is_video'] ) { 
	
		$vType = get_post_meta(get_the_ID(), 'video_server', true);
		$vID = get_post_meta(get_the_ID(), 'video_id', true);
						
	?>
	
		<!-- image path & title-->
		<?php if($vType == '' || $vType == '1') { ?>
		
			<a class="popup-with-form popup-video item-image" href="http://www.youtube.com/watch?v=<?php echo $vID; ?>"  title="<?php the_title(); ?>">

		<?php } else { ?>	
			
			<a class=" popup-with-form popup-video item-image" href="http://vimeo.com/<?php echo $vID; ?>" title="<?php the_title(); ?>" >
		
		<?php } ?>
		
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/video_post.png"  alt="Audio type" title="Audio type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
			
			<!-- item image path -->
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/video_place_holder.jpg">
				<?php } ?>
			</div>

	</a>

	<?php } elseif( px_get_url_type( $item['href'] ) == 'youtube'  || px_get_url_type( $item['href'] ) == 'vimeo' || px_get_url_type( $item['href'] ) == 'video' ) { ?>
	
	<!-- prettyPhoto image path & title-->
	<a class="popup-with-form popup-video item-image" href="<?php echo $item['href']; ?>" title="<?php the_title(); ?>">

		<!-- item meta hover -->
		<div class="frame-overlay"></div>
		<div class="portfolio-meta">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/video_post.png"  alt="Audio type" title="Audio type">	 <br /> <br />
			<?php the_title(); ?>
		</div>
		
		<!-- item image path -->
		<div class="item-image">
			<?php if ( has_post_thumbnail() ){ ?>
					<?php the_post_thumbnail('full'); ?>
				<?php } else {?>
					<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/video_place_holder.jpg">
			<?php } ?>
		</div>
			
	</a>
		
	<!-- ***** LINK POST ****** -->	
	<?php } elseif( px_get_url_type( $item['href'] ) == 'page') { ?>
	
		<!-- fancy box image path & title-->
		<a class="item-image" href="<?php echo $item['href']; ?>">
			
			<!-- item meta hover -->
			<div class="frame-overlay"></div>
			<div class="portfolio-meta">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/link_post.png"  alt="Audio type" title="Audio type">	 <br /> <br />
				<?php the_title(); ?>
			</div>
			
			<!-- item image path -->
			<div class="item-image">
				<?php if ( has_post_thumbnail() ){ ?>
						<?php the_post_thumbnail('full'); ?>
					<?php } else {?>
						<img alt="portfolio image" src="<?php echo get_template_directory_uri(); ?>/assets/img/link_place_holder.jpg">
				<?php } ?>
			</div>
			
		</a>

	<?php } ?>
</div>	