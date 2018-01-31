<!-- Header -->
<header class="wrap">
	<div class="vertical-header container">
	
		<div class="mobile-menu visible-tablet">
			<a href=""></a>
			<ul class="mobile-ul clearfix">
				
				<?php if ( opt('custom_part_position') == 1 ) {
					
					if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
					<?php } ?>	

				<?php }	if ( opt('about_display') && opt('about_label') ) { ?>
					<li><a href="<?php echo get_site_url(); ?>/#home" class="active-menu"><?php eopt('about_label'); ?></a></li>
				
				<?php } if ( opt('custom_part_position') == 2 ) {
					
					if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
					<?php } ?>	
					
				<?php } if ( opt('portfolio_display') && opt('portfolio_label') ) {  ?>
					<li><a href="<?php echo get_site_url(); ?>/#portfolio"><?php eopt('portfolio_label'); ?></a></li>
				
				<?php } if ( opt('custom_part_position') == 3 ) {
					
					if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
					<?php } ?>	
					
				<?php } if ( opt('resume_display') && opt('resume_label') ) { ?>
					<li><a href="<?php echo get_site_url(); ?>/#resume"><?php eopt('resume_label'); ?></a></li>
				
					<?php } if ( opt('custom_part_position') == 4 ) {
					
					if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
					<?php } ?>	
					
				<?php } if ( opt('contact_display') && opt('contact_label') ) { ?>
					<li><a href="<?php echo get_site_url(); ?>/#contact"><?php eopt('contact_label'); ?></a></li>
				
				<?php } if ( opt('custom_part_position') == 5 ) {
					
					if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
					<?php } ?>	
				
				<?php } ?>

				<?php if(function_exists('wp_nav_menu') && has_nav_menu('primary-nav')) {
					wp_nav_menu(array(
						'container' =>'',
						'menu_class' => 'mobile-ul clearfix',
						'theme_location' => 'primary-nav',
						'items_wrap'      => '%3$s',
						'walker' => new Custom_Nav_Walker()
					)); 
				  }
				?>	
		
			</ul>
		</div>

		<div class="menu-area hidden-tablet">
			<div class="menu" <?php if ( opt('menu_toggle') == 1 ) { ?> style="margin-left: 0px;" <?php } ?> >
				<ul class="clearfix">
				
					<?php if ( opt('custom_part_position') == 1 ) {
						
						if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
							<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
						<?php } ?>	
						
					<?php } 
					
					if ( opt('about_display') && opt('about_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#home" class="active-menu"><?php eopt('about_label'); ?></a></li>
					
					
					<?php } if ( opt('custom_part_position') == 2 ) {

						if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
							<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
						<?php } ?>	
						
					<?php } 

					if ( opt('portfolio_display') && opt('portfolio_label') ) {  ?>
						<li><a href="<?php echo get_site_url(); ?>#portfolio"><?php eopt('portfolio_label'); ?></a></li>
					
					
					<?php } if ( opt('custom_part_position') == 3 ) {
						
						if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
							<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
						
						<?php } ?>	
						
					<?php } 
					
					if ( opt('resume_display') && opt('resume_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#resume"><?php eopt('resume_label'); ?></a></li>
					
					<?php } if ( opt('custom_part_position') == 4 ) {
						
						if ( opt('custom_part_display') && opt('custom_part_label') ) { ?>
							<li><a href="<?php echo get_site_url(); ?>#custom_part"><?php eopt('custom_part_label'); ?></a></li>
						<?php } ?>	
						
					<?php } 

					if ( opt('contact_display') && opt('contact_label') ) { ?>
						<li><a href="<?php echo get_site_url(); ?>#contact"><?php eopt('contact_label'); ?></a></li>
					
					<?php } ?>
					
					<?php if(function_exists('wp_nav_menu') && has_nav_menu('primary-nav')) {
							wp_nav_menu(array(
								'container' =>'',
								'menu_class' => '',
								'menu_class' => 'clearfix',
								'theme_location' => 'primary-nav',
								'items_wrap'      => '%3$s',
								'walker' => new Custom_Nav_Walker()
							)); 
						}
					?>	
				
				</ul>
			</div>
			<div class="menu-button-minus <?php if ( opt('menu_toggle') == 1 ) { ?> menu-button-plus <?php } ?>"></div>
		</div>
		
		<div class="header-titles hidden-tablet" <?php if ( opt('menu_toggle') == 1 ) { ?> style="display: none;" <?php } ?>>
			
			<?php if ( opt('title_name') ) { ?>
			
				<div class="name-title">
					<?php  eopt('title_name'); ?>
				</div>
				
			<?php }  if ( opt('title_posotion') ) { ?>
				<span id="title-seperator">|</span>
				
				<div class="job-title hidden-vertical-mobile">
					<?php  eopt('title_posotion'); ?>
				</div>
				
			<?php } ?>
			
		</div>
		
		<div class="header-titles visible-tablet">
			
			<?php if ( opt('title_name') ) { ?>
			
				<div class="name-title">
					<?php  eopt('title_name'); ?>
				</div>
				
			<?php }  if ( opt('title_posotion') ) { ?>
				<span id="title-seperator">|</span>
				
				<div class="job-title hidden-vertical-mobile">
					<?php  eopt('title_posotion'); ?>
				</div>
				
			<?php } ?>
		</div>
	</div>
</header>