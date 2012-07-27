<?php 

require_once ( get_stylesheet_directory() . '/include/theme-options.php' );
require_once ( get_stylesheet_directory() . '/include/breadcrumbs.php' );
require_once ( get_stylesheet_directory() . '/include/widget.php' );

if ( ! isset( $content_width ) ) $content_width = 590;

add_theme_support( 'admin-bar' );
add_theme_support( 'automatic-feed-links' );
add_editor_style('css/editor-style.css');

register_nav_menus( array( 'primary' => 'Primary Navigation' ) );

/* 	=============================================== */
/*	Function to register sidebar 
/*	=============================================== */
function education_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'education' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom Left Sidebar', 'education' ),
		'id' => 'sidebar-2',
		'description' => __( 'Bottom Left Sidebar', 'education' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Bottom Right Sidebar', 'education' ),
		'id' => 'sidebar-3',
		'description' => __( 'Bottom Right Sidebar', 'education' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'education_widgets_init' );

/* 	=============================================== */
/*	Function post_thumbnails
/* 	=============================================== */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'attachment-thumb', 80, 80, true ); //(cropped)
	add_image_size( 'single-thumb', 300, 9999); //(uncropped)
	add_image_size( 'attachment-large', 900, 9999); //(uncropped)
}

/* 	=============================================== */
/*	Function to show custom comments & pingback
/*	=============================================== */
function education_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
  ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
       <div class="comment-author vcard"><?php  commenter_link() ?></div>
        <div class="comment-meta">
			<?php printf(__('Posted <span itemprop="commentTime">%1$s</span> at %2$s <span class="meta-sep">|</span> <a class="tooltip" href="%3$s" title="Permalink to this comment">Permalink</a>', 'your-theme'),
                    get_comment_date(),
                    get_comment_time(),
                    '#comment-' . get_comment_ID() );
                    edit_comment_link(__('Edit', 'education'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'education') ?>
          <div class="comment-content" itemprop="commentText">
            <?php comment_text() ?>
        </div>
        <?php // echo the comment reply link
            if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply <span>&darr;</span>','education'),
                    'login_text' => __('Log in to reply.','education'),
                    'depth' => $depth,
                    'before' => '<div class="comment-reply-link">',
                    'after' => '</div>'
                )));
            endif;
        ?>
<?php } // end custom_comments

// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
<?php } // end custom_pings

// Produces an avatar image with the hCard-compliant photo class 
function commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
    } else {
        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 50 ) );
   /* echo ' <div class="comment-avatar">' . $avatar . ' </div><div class="fn n" itemprop="creator">' . $commenter . '</div>'; */
   echo ' <div class="fn n" itemprop="creator">' . $commenter . '</div>';
}
// end commenter_link

/* 	=============================================== */
/*	Function to display custom header image
/* 	=============================================== */

define('NO_HEADER_TEXT', true );
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/logo.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 300); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 70);

function education_header_style() {
    ?><style type="text/css">
	
		<?php
		// Has the image been removed ?
		if (get_header_image() != '') :
		?>
		
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
		<?php
		// If the user has set a custom color for the text use that
		else :
		?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
		<?php endif; ?>
		
    </style><?php
}

// gets included in the admin header
function education_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            background: no-repeat;
        }
    </style><?php
}

add_custom_image_header('education_header_style', 'education_admin_header_style');

/* 	=============================================== */
/*	Admin CSS
/* 	=============================================== */
function education_admin_register_head() {
    $siteurl = get_option('siteurl');
    $url = $siteurl . '/wp-content/themes/' . basename(dirname(__FILE__)) . '/css/admin.css';
    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}
add_action('admin_head', 'education_admin_register_head');

/* 	=============================================== */
/*	Function to show pagination 
/*	=============================================== */
function education_kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'><span>Page: </span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/* 	=============================================== */
/*	Function to show social button & social icon sidebar
/*	=============================================== */
function education_social_button() {
?> 
<ul>
	<!-- Twitter share -->
	<li><a href="<?php echo 'https://twitter.com/share'; ?>" class="twitter-share-button" data-count="horizontal" data-url="<?php echo get_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php $options = get_option('newzeo_theme_options'); echo $options['twitid']; ?>">Tweet</a></li>
	<!-- G+ Share -->
	<li><div class="g-plusone" data-size="medium" data-annotation="bubble" data-href="<?php echo get_permalink(); ?>"></div></li>
	<!-- Facebook share -->
	<li><div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="lucida grande"></div></li>
</ul>
<?php 
}

/* 	=============================================== */
/*	Function to show attachment thumbnail
/*	=============================================== */
function education_attachmentgallery($size = 'attachment-thumb', $limit = '0', $offset = '0') {

	global $post;

	$images = get_children( array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	if ($images) {

		$num_of_images = count($images);

		if ($offset > 0) : $start = $offset--; else : $start = 0; endif;
		if ($limit > 0) : $stop = $limit+$start; else : $stop = $num_of_images; endif;

		$i = 0;
		foreach ($images as $image) {
			if ($start <= $i and $i < $stop) {
			$img_title = $image->post_title;   /*title.*/
			$img_description = $image->post_content; /*description.*/
			$img_caption = $image->post_excerpt; /*caption.*/
			$img_size = wp_get_attachment_image_src( $image->ID, 'thumbnail' ); /* image size */
			$img_url = wp_get_attachment_url($image->ID); /*url of the full size image.*/
			$post_title = get_the_title($image->post_parent);
			$post_url = get_permalink($post->ID); /*url of the post.*/
			$attachment_url = get_attachment_link($image->ID); /*url of the atttachment.*/
			$preview_array = image_downsize( $image->ID, 'attachment-thumb' ); /*thumbnail or medium or large image to use for preview.*/
			$img_preview = $preview_array[0];

			/* 	This is where you'd create your custom image/link/whatever tag using the variables above.
			This is an example of a basic image tag using this method. */?>
			
			<a href="<?php echo $attachment_url; ?>">
			<img class="thumbgallery" src="<?php echo $img_preview; ?>" alt="<?php echo $img_title; ?>" title="<?php echo $img_title; ?>" />
			</a>
			
			<?php
			/* ============ End custom image tag. Do not edit below here. ========== */
			
			}
			$i++;
		}

	}
}

/* 	=============================================== */
/* Adds Custom Widget
/* 	=============================================== */

// register Custom widget
add_action( 'widgets_init', create_function( '', 'register_widget( "recentpost_widget" );' ) );
add_action( 'widgets_init', create_function( '', 'register_widget( "randompost_widget" );' ) );

/* 	=============================================== */
/*	Function to display spesific char in homepage
/* 	=============================================== */
function education_sidebartrimword() {
$temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,130)); 
$temp_arr_content[count($temp_arr_content)-1] = ""; 
$display_arr_content = implode(" ",$temp_arr_content); 
echo $display_arr_content; 
if(strlen(strip_tags(get_the_content())) > 130) echo "[...]"; 
}

/* 	=============================================== */
/*	Function to show recent post with thumbnail
/*	=============================================== */
function education_display_recent_posts( $rpsize /* show xx post */ ) {
	// Query arguments
	$recent_args = array(
		'posts_per_page' => $rpsize,
		'ignore_sticky_posts'=>1,
		'orderby' => 'id',
		'order' => 'DESC'
		
	);
 
	// The query
	$recent_posts = new WP_Query( $recent_args );
 
	// The loop
	while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
		echo '<li class="clearfix">';
		echo '<h4><a class="tooltip" href="' . get_permalink( get_the_ID() ) . '" title="'.get_the_title().'">' . get_the_title() . '</a></h4>';
		the_post_thumbnail('attachment-thumb',array('class' => 'alignleft'));
		echo education_sidebartrimword();
		echo '</li>';
	endwhile;
 
	// Reset post data
	wp_reset_postdata();
}

/* 	=============================================== */
/*	Function to show random posts
/*	=============================================== */
function education_display_random_posts ($rndsize /*show xx post */) {
	$random_args = array(
		'posts_per_page' => $rndsize,
		'ignore_sticky_posts'=>1,
		'orderby' => 'rand'
	);
					 
	// The query
	$random_posts = new WP_Query( $random_args );
					 
	// The loop
	while ( $random_posts->have_posts() ) : $random_posts->the_post();
		echo '<li>';
		echo '<a class="tooltip" href="'.get_permalink( get_the_ID() ).'" title="'.get_the_title().'">'.get_the_title().'</a>';
		echo '</li>';
	endwhile;
					 
	// Reset post data
	wp_reset_postdata();
}


?>
