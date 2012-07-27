<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'education_options', 'education_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'education' ), __( 'Education Options', 'education' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

 
/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'education' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'education' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'education_options' ); ?>
			<?php $options = get_option( 'education_theme_options' ); ?>
		
			
			<div id="education-option">
			
				<!-- education slide option -->
				<h3>Social Option</h3>
				
				<!--  Twitter -->
				<div class="row">
					<div class="columntitle">
						Twitter ID
					</div>
					<div class="columntext">
						<input id="education_theme_options[twitid]" class="regular-text" type="text" name="education_theme_options[twitid]" value="<?php esc_attr_e( $options['twitid'] ); ?>" />
					</div>
					<div class="columnlabel">
						<label class="description" for="education_theme_options[twitid]">Ex: illuminatheme, without <code>@</code> </label>
					</div>
				</div>
				
				<!--  FB Fanpage URL -->
				<div class="row">
					<div class="columntitle">
						Facebook page URL
					</div>
					<div class="columntext">
						<input id="education_theme_options[facebook]" class="regular-text" type="text" name="education_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
					</div>
					<div class="columnlabel">
						<label class="description" for="education_theme_options[facebook]">Facebook page URL with <code>http://</code></label>
					</div>
				</div>
				
				
				<!-- education slide option -->
				<h3>Slider Option</h3>
				
				<div class="columnhelp">To show slider, <code>Image Source URL</code> must be filled.</div>

				<!-- slide 1 -->
				<div class="row">
					<div class="columntitle">
						<br/><code>Example</code>
					</div>
					<div class="columnmultitext">
						Image Source URL<br/><code>http://localhost/theming/wp-content/uploads/2012/04/slide1.png</code>
					</div>
					<div class="columnmultitext">
						Image Link Destination<br/><code>http://www.wordpress.com</code>
					</div>
					<div class="columnmultitext">
						Image Text<br/><code>This is slide caption example</code>
					</div>
				</div>
				
				<!-- slide 1 -->
				<div class="row">
					<div class="columntitle">
						<br/>Slide 1
					</div>
					<div class="columnmultitext">
						Image Source URL<input id="education_theme_options[imgurl1]" class="regular-text" type="text" name="education_theme_options[imgurl1]" value="<?php esc_attr_e( $options['imgurl1'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Link Destination<input id="education_theme_options[imglink1]" class="regular-text" type="text" name="education_theme_options[imglink1]" value="<?php esc_attr_e( $options['imglink1'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Text<input id="education_theme_options[imgtxt1]" class="regular-text" type="text" name="education_theme_options[imgtxt1]" value="<?php esc_attr_e( $options['imgtxt1'] ); ?>" />
					</div>
				</div>
				
				<!-- slide 2 -->
				<div class="row">
					<div class="columntitle">
						<br/>Slide 2
					</div>
					<div class="columnmultitext">
						Image Source URL<input id="education_theme_options[imgurl2]" class="regular-text" type="text" name="education_theme_options[imgurl2]" value="<?php esc_attr_e( $options['imgurl2'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Link Destination<input id="education_theme_options[imglink2]" class="regular-text" type="text" name="education_theme_options[imglink2]" value="<?php esc_attr_e( $options['imglink2'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Text<input id="education_theme_options[imgtxt2]" class="regular-text" type="text" name="education_theme_options[imgtxt2]" value="<?php esc_attr_e( $options['imgtxt2'] ); ?>" />
					</div>
				</div>
				
				<!-- slide 3 -->
				<div class="row">
					<div class="columntitle">
						<br/>Slide 3
					</div>
					<div class="columnmultitext">
						Image Source URL<input id="education_theme_options[imgurl3]" class="regular-text" type="text" name="education_theme_options[imgurl3]" value="<?php esc_attr_e( $options['imgurl3'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Link Destination<input id="education_theme_options[imglink3]" class="regular-text" type="text" name="education_theme_options[imglink3]" value="<?php esc_attr_e( $options['imglink3'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Text<input id="education_theme_options[imgtxt3]" class="regular-text" type="text" name="education_theme_options[imgtxt3]" value="<?php esc_attr_e( $options['imgtxt3'] ); ?>" />
					</div>
				</div>

				<!-- slide 4 -->
				<div class="row">
					<div class="columntitle">
						<br/>Slide 4
					</div>
					<div class="columnmultitext">
						Image Source URL<input id="education_theme_options[imgurl4]" class="regular-text" type="text" name="education_theme_options[imgurl4]" value="<?php esc_attr_e( $options['imgurl4'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Link Destination<input id="education_theme_options[imglink4]" class="regular-text" type="text" name="education_theme_options[imglink4]" value="<?php esc_attr_e( $options['imglink4'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Text<input id="education_theme_options[imgtxt4]" class="regular-text" type="text" name="education_theme_options[imgtxt4]" value="<?php esc_attr_e( $options['imgtxt4'] ); ?>" />
					</div>
				</div>	
				
				<!-- slide 5 -->
				<div class="row">
					<div class="columntitle">
						<br/>Slide 5
					</div>
					<div class="columnmultitext">
						Image Source URL<input id="education_theme_options[imgurl5]" class="regular-text" type="text" name="education_theme_options[imgurl5]" value="<?php esc_attr_e( $options['imgurl5'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Link Destination<input id="education_theme_options[imglink5]" class="regular-text" type="text" name="education_theme_options[imglink5]" value="<?php esc_attr_e( $options['imglink5'] ); ?>" />
					</div>
					<div class="columnmultitext">
						Image Text<input id="education_theme_options[imgtxt5]" class="regular-text" type="text" name="education_theme_options[imgtxt5]" value="<?php esc_attr_e( $options['imgtxt5'] ); ?>" />
					</div>
				</div>	
				
			</div>		

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'education' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $radio_options;

	// Say our text option must be safe text with no HTML tags
	
	$input['twitid'] = wp_filter_nohtml_kses( $input['twitid'] );
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );
	
	$input['imgurl1'] = wp_filter_nohtml_kses( $input['imgurl1'] );
	$input['imglink1'] = wp_filter_nohtml_kses( $input['imglink1'] );
	$input['imgtxt1'] = wp_filter_nohtml_kses( $input['imgtxt1'] );
	
	$input['imgurl2'] = wp_filter_nohtml_kses( $input['imgurl2'] );
	$input['imglink2'] = wp_filter_nohtml_kses( $input['imglink2'] );
	$input['imgtxt2'] = wp_filter_nohtml_kses( $input['imgtxt2'] );
	
	$input['imgurl3'] = wp_filter_nohtml_kses( $input['imgurl3'] );
	$input['imglink3'] = wp_filter_nohtml_kses( $input['imglink3'] );
	$input['imgtxt3'] = wp_filter_nohtml_kses( $input['imgtxt3'] );
	
	$input['imgurl4'] = wp_filter_nohtml_kses( $input['imgurl4'] );
	$input['imglink4'] = wp_filter_nohtml_kses( $input['imglink4'] );
	$input['imgtxt4'] = wp_filter_nohtml_kses( $input['imgtxt4'] );
	
	$input['imgurl5'] = wp_filter_nohtml_kses( $input['imgurl5'] );
	$input['imglink5'] = wp_filter_nohtml_kses( $input['imglink5'] );
	$input['imgtxt5'] = wp_filter_nohtml_kses( $input['imgtxt5'] );
	
	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/