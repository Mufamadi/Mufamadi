<?php if ( opt('custom_part_display') ) { ?>
  <!-- Coustom part -->
	<article class="cvpage <?php if ( opt('vertical_template') == 0 ) { ?> wrap <?php } ?>" id="custom_part">
		
		<?php if ( opt('custom_part_paddig') == 0) { ?>
			<div class="content">
		<?php } else if ( opt('custom_part_paddig') == 1 ) { ?>
			<div class="padding-content"> 
		<?php } ?>
		 
			<div class="custom-part-scroll">
			<?php
			
				$query = new WP_Query();
				$query->query('post_type=custom-part&posts_per_page=-1');
				
				if($query->have_posts())
				{
					while ($query->have_posts()) { 
					
						$query -> the_post(); 
						the_content(); 
				
					} //End while
					wp_reset_query();
				}//End if
			
			?>
			</div>	
		</div> 
	</article>
	<!-- Coustom part End -->
	
<?php }