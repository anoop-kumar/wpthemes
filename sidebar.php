	<?php 
		// Sidebar arguments, should be same as in functions.php
		$sidebar_args = array(
		'before_widget' => '<aside class="widget clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);
	?>
	
		<!-- If theme widget empty, show widget below -->
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			
			<?php the_widget('WP_Widget_Categories', array( 'title' => 'Categories'),$sidebar_args ); ?> 
			<?php the_widget('WP_Widget_Meta', array( 'title' => 'Meta'), $sidebar_args); ?> 		
						
		<?php endif; // end sidebar widget area ?>