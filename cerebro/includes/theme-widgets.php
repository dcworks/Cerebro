<?php

class rw_newsletter_widget extends WP_Widget {
	function rw_newsletter_widget() {
		$widget_ops = array('classname' => 'rw_newsletter_widget', 'description' => 'Displays Newsletter subscription form' );
		$this->WP_Widget('rw_newsletter', 'RW Newsletter Widget', $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
 
		echo $before_widget;
		$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
		
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		?>
		
		<form id="newsletter" method="post" action="<?php $url; ?>" target="_blank">
			<p> <label for="form_name">Name</label> <input type="text" name="form_name" id="form_name"> </p>
			<p> <label for="form_name">E-mail</label> <input type="text" name="form_email" id="form_email"> </p>
			<p> <input type="submit" name="form_subscribe" id="form_subscribe" value="Subscribe"> </p>
		</form>
		
		<?
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);	
		$instance['url'] = strip_tags($new_instance['url']);		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 
			'title' => '',
			'url' => ''
		));
		
		$title = strip_tags($instance['title']);
		$url = strip_tags($instance['url']);
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		
		<p class="extra_field">
			<label for="<?php echo $this->get_field_id('url'); ?>">Fill in the field below to overwrite the default form post URL: </label>
			<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr($url); ?>">
		</p>
		
		<?php		
	}
	
}
register_widget('rw_newsletter_widget');
?>