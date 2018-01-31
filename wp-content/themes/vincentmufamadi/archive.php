<?php 
	get_header(); 

	// Intro
	get_template_part('article', 'menu'); 
	$vType = get_post_meta(get_the_ID(), 'video_server', true);
	
?>

<div class="blog-content wrap">
	<div class="container">	
	
	<?php if (have_posts()){ ?>
		<!--Intro-->
		<div id="wrap_intro" class="wrap" >	
			<div class="container">
				<?php 
					$pageTitle    = '';
					$post = $posts[0]; // Hack. Set $post so that the_date() works.
					
					if (is_category()) {
						$pageTitle = sprintf(__('All posts in %s', TEXTDOMAIN), single_cat_title('',false));
					}
					elseif( is_tag() ){
						$pageTitle = sprintf(__('All posts tagged %s', TEXTDOMAIN), single_tag_title('',false));
					}
					elseif( is_day() ){
						$pageTitle = sprintf(__('Archive for %s', TEXTDOMAIN), get_the_time('F jS, Y'));
					}
					elseif( is_month() ){
						$pageTitle = sprintf(__('Archive for %s', TEXTDOMAIN), get_the_time('F, Y'));
					}
					elseif ( is_year() ){
						$pageTitle = sprintf(__('Archive for %s', TEXTDOMAIN), get_the_time('Y') );
					}
					elseif ( is_author() ){
						/* Get author data */
						if(get_query_var('author_name'))
							$curauth = get_user_by('login', get_query_var('author_name'));
						else
							$curauth = get_userdata(get_query_var('author'));

						$pageTitle = sprintf(__('Posts by %s', TEXTDOMAIN), $curauth->display_name );
					}
					elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ){
						$pageTitle = __('Blog Archives', TEXTDOMAIN);
					}
				?>
				
				<div class="row">
					<div class="blog-header span12">
						<h2> <?php echo $pageTitle; ?> </h2> 
					</div>
				</div>
				
			</div>
		</div>
		
<?php } //if have_posts() ?>

		<!-- blog post items --> 
		<div class="row clearfix">
			<?php if ( have_posts() ) : ?>
				<div class="posts span12">
					<?php  while ( have_posts() ) : the_post(); ?>			
						
						<div id="blog_loop">
							<div  <?php post_class('post'); ?> id="post_<?php the_ID(); ?>">

								<?php 
				
									$content_type = get_post_meta(get_the_ID(), 'content_type', true);
									$vType = get_post_meta(get_the_ID(), 'video_server', true);
									$vID = get_post_meta(get_the_ID(), 'video_id', true); 
									
									$content_span = 'span6';

								?>
							
								<!-- item  -->
								<div class="row clearfix">

									<?php if ( $content_type == 2 || $content_type == 3  ){ ?>

										<div class="post-image span5">

											<?php if($vType == '' || $vType == '1') { ?>
											
												<iframe width="380" height="220" src="http://www.youtube.com/embed/<?php echo $vID; ?>" ></iframe>
										
											<?php } else { ?>	
												
												<iframe src="http://player.vimeo.com/video/<?php echo $vID; ?>?color=f0e400" width="380" height="220"></iframe>
											
											<?php } ?>
															
										</div>
														
									<?php } else { ?>
									
										<?php if ( has_post_thumbnail() ){ ?>
										
											<div class="post-image span5">
												<?php the_post_thumbnail('full'); ?>
												<a title="<?php printf( esc_attr__('Permalink to %s', TEXTDOMAIN), the_title_attribute('echo=0') ); ?>" href="<?php the_permalink(); ?>" rel="bookmark"><div class="post-hover"></div></a>
											</div>
											
										<?php } else {  $content_span = 'span11'; } ?>
										
									<?php } ?>
		
									<div class="post-content <?php echo $content_span; ?>">
										<div class="blog-post-title">
											<h5>
												<a title="<?php printf( esc_attr__('Permalink to %s', TEXTDOMAIN), the_title_attribute('echo=0') ); ?>" href="<?php the_permalink(); ?>" rel="bookmark"><?php echo px_filter ( get_the_title() ? get_the_title() : get_the_time('F j') ); ?></a>
											</h5>
										</div>
										<div class="blog-post-seperator"></div>
										<div class="blog-post-meta">
											<?php echo ( get_the_time('F') ); ?>  &nbsp;<?php echo ( get_the_time('Y') ); ?> / <?php echo ( get_the_time('j') ); ?> <span class="blog-post-meta-seperator">|</span>
											<span class="post_comments"><?php comments_popup_link( __('No Comments', TEXTDOMAIN) , __('1 Comment', TEXTDOMAIN), __('% Comments', TEXTDOMAIN) ); ?></span>
										</div>
										<div class="blog-post-content">
											<?php the_excerpt();  ?>
										</div>
									</div>	
								</div>	
								<!-- item  Ends -->
							</div>
						</div>

					<?php endwhile; ?> 
					
					<div style="height:200px;"></div>
					
				</div>
			<?php else : ?>
				
				<div class="blog-header span12">
					<h6><?php _e("Sorry, but you are looking for something that isn't here. Try another search", TEXTDOMAIN); ?></h6>
				</div>
			
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer();