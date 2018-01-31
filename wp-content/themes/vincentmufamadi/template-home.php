<?php 
/*
Template Name: Home
*/

	get_header(); 
	
	if ( opt('vertical_template') == 1 ) { ?><div class="home-vertical"><?php } 
	
		// Menu
		 if ( opt('vertical_template') == 0 ) { get_template_part('article', 'menu');  } 
		 if ( opt('vertical_template') == 1 ) { get_template_part('article', 'vmenu'); } 
		
		
		// Intro
		get_template_part('article', 'intro'); 
			
			// Custom Part
			if ( opt('custom_part_position') == 1 ) {
				get_template_part('article', 'custom_part');
			};
			
		// About
		get_template_part('article', 'about'); 
		
			// Custom Part
			if ( opt('custom_part_position') == 2 ) {
				get_template_part('article', 'custom_part');
			};
		
		// Portfolio
		get_template_part('article', 'portfolio');
	
			// Custom Part
			if ( opt('custom_part_position') == 3 ) {
				get_template_part('article', 'custom_part');
			};
			
		// Resume
		get_template_part('article', 'resume');
				
			// Custom Part
			if ( opt('custom_part_position') == 4 ) {
				get_template_part('article', 'custom_part');
			};
			
		// Contact 
		get_template_part('article', 'contact'); 
		
			// Custom Part
			if ( opt('custom_part_position') == 5 ) {
				get_template_part('article', 'custom_part');
			};
			
		get_template_part('article', 'out'); 
		
	get_footer();

if ( opt('vertical_template') == 1 ) { ?></div><?php }