<?php get_header(); ?>
	
	<!-- Content -->
	<div class="container contentarea">
		<div class="row">
			<div class="column-content">
				
				<!--- breadcrumbs -->
				<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
				
				<div id="content" role="main">
					<?php if ( have_posts() ) : the_post(); ?>
					
						<!-- If author page -->
						<?php if (is_author()) : ?>
							<div id="author-info" class="clearfix">
									
								<div id="author-avatar">
									<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
								</div>
										
								<div id="author-description">
									<h2 >About <?php echo get_the_author(); ?></h2>
									<?php the_author_meta( 'description' ); ?>
								</div>	
								
								<?php if ( get_the_author_meta( 'user_url' )) : ?>
								<div id="author-link" class="clearfix">
									<span>Add my circles on Google+ : </span>
									<span itemprop="author"><a href="<?php the_author_meta( 'user_url' ); ?>?rel=author" rel="me"><?php echo get_the_author(); ?></a></span>
								</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						
						<?php rewind_posts(); ?>
									
					<?php while ( have_posts() ) : the_post(); ?>
						<!-- call content.php -->
						<?php get_template_part( 'content', '' ); ?>
					<?php endwhile; ?>
					
					<div class="clearfix"></div>
					
					<div class="paging">
						<?php if(function_exists('education_kriesi_pagination')) : education_kriesi_pagination(); else:  ?>
						<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
							<div id="nav-below" class="navigation">
								<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'newzeo' )) ?></div>
								<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'newzeo' )) ?></div>
							</div>
						<?php } endif; ?>
					</div>
					
					<?php else : ?>
					
						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title">Nothing Found</h1>
							</header>
							<div class="entry-content">
								<p>Sorry, we can't find post you request. Please try search for a related post.</p>
								<?php get_search_form(); ?>
							</div>
						</article>
					
					<?php endif; ?>
					
					
				</div> <!-- #content -->
			</div> <!-- .column-content -->
			
			<div class="column-sidebar nomargin">
				<?php get_sidebar(); ?>
			</div>
			
		</div> <!-- .row -->
	</div> <!-- .container -->
	
<?php get_footer(); ?>