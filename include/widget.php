<?php 

class RecentPost_Widget extends WP_Widget {

	/* Register widget with WordPress. */
	public function __construct() {
		parent::__construct(
	 		'recentpost_widget', // Base ID
			'(Lugada) Recent Post with Thumbnail', // Name
			array( 'description' => __( 'education recent post with post-thumbnail support widget.', 'education' ), ) // Args
		);
	}

	/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$rcnumber =  $instance['rcnumber'] ;

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
		<?php 
		echo '<ul>';
		echo education_display_recent_posts($rcnumber); 
		echo '</ul>';?>
		<?php
		echo $after_widget;
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['rcnumber'] = strip_tags( $new_instance['rcnumber'] );

		return $instance;
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$rcnumber = esc_attr( $instance[ 'rcnumber' ] );
		}
		else {
			$title = __( 'Recent post', 'education' );
			$rcnumber = __( '5', 'education' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','education' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'rcnumber' ); ?>"><?php _e( 'Number of recent post to show:','education' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'rcnumber' ); ?>" name="<?php echo $this->get_field_name( 'rcnumber' ); ?>" type="text" value="<?php echo $rcnumber; ?>" />
		</p>
		<?php 
	}

} // class RecentPost_Widget

class RandomPost_Widget extends WP_Widget {

	/* Register widget with WordPress. */
	public function __construct() {
		parent::__construct(
	 		'randompost_widget', // Base ID
			'(Lugada) Random Post', // Name
			array( 'description' => __( 'education random post widget.', 'education' ), ) // Args
		);
	}

	/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$rndnumber =  $instance['rndnumber'] ;

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
		<?php 
		echo '<ul>';
		echo education_display_random_posts($rndnumber); 
		echo '</ul>';?>
		<?php
		echo $after_widget;
	}

	/* Sanitize widget form values as they are saved. */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['rndnumber'] = strip_tags( $new_instance['rndnumber'] );

		return $instance;
	}

	/* Back-end widget form. */
	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$rndnumber = esc_attr( $instance[ 'rndnumber' ] );
		}
		else {
			$title = __( 'Random post', 'education' );
			$rndnumber = __( '5', 'education' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','education' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'rndnumber' ); ?>"><?php _e( 'Number of random post to show:','education' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'rndnumber' ); ?>" name="<?php echo $this->get_field_name( 'rndnumber' ); ?>" type="text" value="<?php echo $rndnumber; ?>" />
		</p>
		<?php 
	}

} // class RandomPost_Widget

?>