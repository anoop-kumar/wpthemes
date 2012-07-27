<?php get_header(); ?>
	
	<!-- Content -->
	<div class="container contentarea">
	
		<div class="row">
			<div class="column-full">
				
				<!-- Breadcrumb -->
				<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
			
				<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="content-box">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

								<header class="entry-header">
									<div class="entry-meta clearfix" >
										<!-- Date -->
										<a class="tooltip" rel="bookmark" title="<?php echo get_the_time(); ?>" href="<?php echo get_permalink(); ?>">
											<time class="entry-date updated" pubdate="" itemprop="dateCreated" datetime="<?php echo get_the_date( 'c' ) ?>"><?php echo get_the_date( 'M j'); ?></time>
										</a>
										<!-- Title -->
										<h1 class="entry-title">
											<a class="tooltip" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" itemprop="name"><?php the_title(); ?></a>
										</h1>
										<!-- Author -->
										<div class="entry-author">
											<span class="sep"> by </span>
											<span class="author vcard">
												<a class="url tooltip fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author">
													<span itemprop="author"><?php echo get_the_author(); ?></span>
												</a>
											</span>
										</div>
										<!-- Comments -->
										<div class="entry-comments clearfix">
											<?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
										</div>
									</div> <!-- .entry-meta -->
								</header> <!-- .entry-header -->
								
								<div class="entry-content" itemprop="description">
									<div class="entry-attachment">
										<!-- Show custom attachment-large size image attachment -->
										<p class="aligncenter ">
											<a href="<?php echo wp_get_attachment_url( $post->ID, 'attachment-large' ); ?>">
											<?php echo wp_get_attachment_image( $post->ID, 'attachment-large' ); ?>
											</a>
											<?php  if ( !empty($post->post_excerpt) ) the_excerpt(); the_title(); ?>
										</p>
									</div>
									<div class="clearfix"></div>	
									<!-- Attachment thumbnail gallery -->
									<div class="attachment-thumbnail-bottom"><?php education_attachmentgallery('thumbnail','0','0') ?></div>
									<div class="clearfix"></div>	
								</div> <!-- entry-attachment end -->
							
							<footer class="entry-meta">
								<div class="socialshareboxsingle aligncenter clearfix">
									Share this post, let the world know: <?php education_social_button();?>
								</div>
							</footer>
							
							<?php edit_post_link('Edit', '<span class="edit-link">', '</span>'); ?>
			
							</article> <!-- article end -->
		
						</div>
						<hr class="post-shadow"/>
					
						<?php comments_template( '', true ); ?>
					
					<?php endwhile; ?>
			
				</div> <!-- #content -->
			</div> <!-- .column-full-->
			
		</div>
	</div>
	
<?php get_footer(); ?>