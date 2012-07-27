	<?php 
		/* Sidebar arguments */
		$sidebar_args = array(
		'before_widget' => '<aside class="widget clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	);
	?>
	
	<!-- Footer -->
	<div class="container footerarea">
		<div class="row">
			<div class="column-half">
				<!-- Footer widget left -->
				<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
					<aside class="widget">
						<h3 class="widget-title">Random posts</h3>
						<ul><?php education_display_random_posts(5) ?></ul>
					</aside>	
				<?php endif; // end sidebar widget area ?>
			</div>
			
			<div class="column-half nomargin">
				<!-- Footer widget right -->
				<?php if ( ! dynamic_sidebar( 'sidebar-3' ) ) : ?>
					<aside class="widget">
						<?php 
						
						// Welcome Note
						the_widget('WP_Widget_Text', array(
							'title' => 'About',
							'text' => "Welcome to the Education theme. You're seeing this text because you haven't configured your widgets. Browse to the Widgets section in your admin panel. <br/>To enable slider, twitter button, facebook like, google +1 button open Education Options in Appearance.",
							'filter' => true // adds paragraphs
						), $sidebar_args );
						
						?>
					</aside>
				<?php endif; // end sidebar widget area ?>
			</div>
		</div>
		
		 <?php /* "It is completely optional, but if you like the Theme I would appreciate it if you keep the credit link at the bottom." */ ?>
		<div class="row copyrightarea">
			<div class="column-full">
				Designed by <a href="<?php echo 'http://www.thedesignmag.com/'; ?>" title="The Designmag" target="_blank">The Designmag</a>. Powered with <a href="<?php echo 'http://www.wordpress.org/'; ?>" title="www.wordpress.com">WordPress</a>
			</div>
		</div>
	</div>
	
	<!-- Responsive menu -->
	<script>
	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Menu (Dropdown)"
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });
</script>

	
	<?php if(is_single()) : ?>

	<!-- Facebook script -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=102866683155349";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Twitter script -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	<!-- G+ Script -->
	<script type="text/javascript">
		window.___gcfg = {
			lang: 'en-US'
		};

		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
	</script>

	<?php endif; ?>

	<?php wp_footer(); ?>
	
</body>
</html>