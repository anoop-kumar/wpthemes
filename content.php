
<div class="content-box">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
			
			<header class="entry-header">
				
				<div class="entry-meta clearfix" >
					<!-- Date -->
					<a rel="bookmark" title="<?php echo get_the_time(); ?>" href="<?php echo get_permalink(); ?>">
						<time class="entry-date updated" pubdate="" itemprop="dateCreated" datetime="<?php echo get_the_date( 'c' ) ?>"><?php echo get_the_date( 'M j'); ?></time>
					</a>
					
					<!-- Sticky post -->
					<?php if (is_sticky()) : ?>
					<div class="sticky-label"></div>
					<?php endif; ?>
				
					<!-- Post title -->
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="name"><?php the_title(); ?></a>
					</h1>
					
					<!-- Author -->
					<div class="entry-author">
						<span class="sep"> by </span>
						<span class="author vcard">
							<a class="url fn" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="View all posts by <?php echo get_the_author(); ?>" rel="author">
								<span itemprop="author"><?php echo get_the_author(); ?></span>
							</a>
						</span>
					</div>
					
					<!-- Comments -->
					<div class="entry-comments clearfix">
						<?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
					</div>
					
				</div> <!-- .entry-meta -->
				
			</header> <!-- .header -->
				
			<!-- Content -->
			<div class="entry-content clearfix" itemprop="description">
				<?php the_content('Continue reading'); ?>
				<div class="clearfix"></div>
				<?php wp_link_pages( array('before' => '<div class="page-link"> <span> Pages: </span>', 'after' => '</div>')); ?>	
			</div>
			
			<footer class="entry-meta">
				<!-- Category -->
				<span class="cat-links">
					<span>Posted in</span>
					<?php echo get_the_category_list(', '); ?>
				</span>
				
				<!-- If single & have tag -->
				<!-- Tag -->
				<?php if ( is_single() ): if (has_tag()) : ?>
				<span class="sep"> | </span>
				<span class="tag-links">
					<span>Tagged</span>
					<?php echo get_the_tag_list('',', ',''); ?>
				</span>
				<?php endif; ?>
				<?php edit_post_link('Edit', '<span class="edit-link"><span class="sep"> | </span>', '</span>'); ?>
				<div class="socialshareboxsingle clearfix">
					Share this post, let the world know <?php education_social_button();?>
				</div>
				<?php endif; ?>
			</footer> <!-- .footer -->
			
			<div id="singlenav">
					<span class="previousnav"> <?php previous_post_link('%link','<strong>&larr; Prev post</strong>'); ?> </span>
					<span class="nextnav"><?php next_post_link('%link','<strong>Next post &rarr;</strong>'); ?></span>
			</div><!-- #singlenav -->
				
		</article> <!-- article  -->
		
</div>
<hr class="post-shadow"/>

<!-- If its single, a user has filled out their description and this is a multi-author blog, show a bio on their entries -->
<?php if ( is_single() ) : ?>
<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) :  ?>
<div class="content-box">	
	<div id="author-info">
			
		<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
		</div>
				
		<div id="author-description">
			<h2 >About <?php echo get_the_author(); ?></h2>
			<?php the_author_meta( 'description' ); ?>
		</div>	
		
		<div id="author-link" class="clearfix">
			<?php if ( get_the_author_meta( 'user_url' )) : ?>
			<span>Add my circles on Google+ : </span>
			<span itemprop="author"><a href="<?php the_author_meta( 'user_url' ); ?>?rel=author" rel="me"><?php echo get_the_author(); ?></a></span>
			<br/>
			<?php endif; ?>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
			View all posts by <?php echo get_the_author(); ?><span class="meta-nav">&rarr;</span>
			</a>
		</div>
	</div>
</div>
<hr class="post-shadow"/>
<?php endif; endif; ?>
