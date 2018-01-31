<?php
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");

	get_header();
	
	// Intro
	get_template_part('article', 'menu'); 
?>
<div class="wrap">
	<div class="container">
		<div class="notfound">:( <?php _e('How Sad!', TEXTDOMAIN) ?></div>
		<div class="notfound_error"><?php _e('404 Error <br /> The page you looking for doesnt found, <br /> It might replaced or removed.', TEXTDOMAIN) ?></div>
	</div>
</div>

<?php get_footer();