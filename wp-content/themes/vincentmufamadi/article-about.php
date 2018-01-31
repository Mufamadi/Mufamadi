<?php if ( opt('about_display') ) { ?>	
	<!-- About -->
	<article class="cvpage <?php if ( opt('vertical_template') == 0 ) { ?> wrap <?php } ?>" id="home">

		<?php if ( opt('about_photo') ) { ?>
			<img src="<?php eopt('about_photo'); ?>" alt="About_photo" class="mypic"/>	
		<?php } ?>
		
		<div class="row">
		
			<?php if ( opt('vertical_template') == 1 ) { ?>
				<div class="span12">
			<?php } else if ( opt('vertical_template') == 0 ) { ?>
				<div class="span6">
			<?php } ?>
	
				<div class="about-text">
				
					<?php if ( opt('about_title') || opt('about_position') ) { ?>
					
						<!-- About title -->
						<div class="about-title">
						
							<?php if ( opt('about_title') ) { ?>
								<h3><?php eopt('about_title'); ?></h3>
							<?php } if (  opt('about_position') ) { ?>
								<h6><?php eopt('about_position'); ?></h6>
							<?php } ?>
						
						</div>

					<?php } if ( opt('about_description') ) { ?>
					
						<div class="about-paragraph">
						
							<?php eopt('about_description'); ?>
						
						</div>

					<?php }  if ( opt('about_signature') ) { ?>

						<div class="signiture">
							<img src="<?php eopt('about_signature'); ?>" alt="signiture"/>
						</div>

					<?php } ?>	

				</div>
			</div>
		</div>

	</article>
	<!-- About End -->
<?php }