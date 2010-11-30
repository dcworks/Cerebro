<?php
// Convert Theme name to Slug
$themename = get_current_theme();
$themeslug = rw_toslug($themename);

// A-themes Settings
$settings = $themeslug.'-settings';

$icondir = get_bloginfo('template_directory').'/images/social_network_icons/';

// Set default options
$default_settings = array(
		'feat_slider_cat' => 3,
		'feat_slider_max' => 3,
		'daily_crunch_cat' => 4,
		'daily_crunch_max' => 4,
		'contest_cat' => 5,
		'advert_cat' => 16,
		'social_icon_dir' => $icondir,
		'trackingcode' => '<!-- Please insert your trackingcode -->',
		'meta_description' => 'Site description',
		'meta_keywords' => 'Site keywords, comma separated'
);

// Add default options to database
add_option($settings, $default_settings, '', 'yes');

// Register settings to database
add_action('admin_init', 'rw_register_settings');
function rw_register_settings() {
	global $settings;
	register_setting($settings, $settings);
}

// Create admin navigation
add_action('admin_menu', 'rw_create_admin_nav');
function rw_create_admin_nav() {
	add_menu_page("CEREBRO", "Cerebro", 'administrator', basename(__FILE__), 'rw_settings_page', get_bloginfo('template_directory')."/images/settings.ico");
}

// The admin settings page
function rw_settings_page(){
	rw_settings_css_js();
?>

<div class="wrap">
<?php
	// Get settings
	global $settings, $default_settings;
	
	print('<pre>');
	print_r($default_settings);
	print('</pre>');
		
	// Reset / Update notice
	if(rw_get_option('reset')) {
		echo '<div class="updated fade" id="message"><p>Theme Settings <strong>RESET</strong></p></div>';
		update_option($settings, $default_settings);
		
	} elseif(isset($_REQUEST['updated']) == 'true') {
		echo '<div class="updated fade" id="message"><p>Theme Settings <strong>SAVED</strong></p></div>';
	}
	
	// Settings icon
	screen_icon('options-general');
?>
	<h2><?php echo get_current_theme() . ' '; _e('Settings'); ?></h2>
	<form method="post" action="options.php">
	<?php settings_fields($settings); ?>
	
	<div class="metabox-holder mbleft">

        <div class="postbox">
		<h3><?php _e("Analytics Code"); ?></h3>
			<div class="inside">
				<p>Insert your <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a> trackingcode:</p>
				<p>
				<textarea name="<?php echo $settings; ?>[trackingcode]" cols=30 rows=5><?php echo stripslashes(rw_get_option('trackingcode')); ?></textarea>
				</p>
			</div>
		</div>
		
		
		<div class="postbox">
		<h3><?php _e("Featured Slider Options"); ?></h3>
			<div class="inside">
				<p><?php _e("Select featured posts from the following category"); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => rw_get_option('feat_slider_cat'), 'name' => $settings.'[feat_slider_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("All Categories"), 'hide_empty' => '0' )); ?></p>
                
                <p><?php _e("Limit featured posts by"); ?>:<br />
                <select name="<?php echo $settings; ?>[feat_slider_max]">
                    <option style="padding-right:10px;" value="1" <?php selected('1', rw_get_option('feat_slider_max')); ?>><?php _e("1"); ?></option>
                    <option style="padding-right:10px;" value="2" <?php selected('2', rw_get_option('feat_slider_max')); ?>><?php _e("2"); ?></option>
                    <option style="padding-right:10px;" value="3" <?php selected('3', rw_get_option('feat_slider_max')); ?>><?php _e("3"); ?></option>
                    <option style="padding-right:10px;" value="4" <?php selected('4', rw_get_option('feat_slider_max')); ?>><?php _e("4"); ?></option>
                    <option style="padding-right:10px;" value="5" <?php selected('5', rw_get_option('feat_slider_max')); ?>><?php _e("5"); ?></option>
                    <option style="padding-right:10px;" value="6" <?php selected('6', rw_get_option('feat_slider_max')); ?>><?php _e("6"); ?></option>
                    <option style="padding-right:10px;" value="7" <?php selected('7', rw_get_option('feat_slider_max')); ?>><?php _e("7"); ?></option>
                    <option style="padding-right:10px;" value="8" <?php selected('8', rw_get_option('feat_slider_max')); ?>><?php _e("8"); ?></option>
                    <option style="padding-right:10px;" value="9" <?php selected('9', rw_get_option('feat_slider_max')); ?>><?php _e("9"); ?></option>
                    <option style="padding-right:10px;" value="10" <?php selected('10', rw_get_option('feat_slider_max')); ?>><?php _e("10"); ?></option>
                </select></p>
			</div>
		</div>
	
        <p class="submit">
        	<!-- extra options -->
        	<input type="hidden" name="<?php echo $settings; ?>[daily_crunch_cat]" value="<?php echo rw_get_option('daily_crunch_cat'); ?>" />
        	<input type="hidden" name="<?php echo $settings; ?>[daily_crunch_max]" value="<?php echo rw_get_option('daily_crunch_max'); ?>" />
        	<input type="hidden" name="<?php echo $settings; ?>[contest_cat]" value="<?php echo rw_get_option('contest_cat'); ?>" />
        	<input type="hidden" name="<?php echo $settings; ?>[social_icon_dir]" value="<?php echo rw_get_option('social_icon_dir'); ?>" />
        	<input type="hidden" name="<?php echo $settings; ?>[advert_cat]" value="<?php echo rw_get_option('advert_cat'); ?>" />
        	
        	<!-- submit -->
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>
		
	</div>
	
	<div class="metabox-holder mbright">
	
        <div class="postbox">
		<h3><?php _e("Meta description"); ?></h3>
			<div class="inside">
				<p>This info will show up as description at searchengine results:</p>
				<p>
				<textarea name="<?php echo $settings; ?>[meta_description]" cols=30 rows=5><?php echo stripslashes(rw_get_option('meta_description')); ?></textarea>
				</p>
			</div>
		</div>
		
		<div class="postbox">
		<h3><?php _e("Meta keywords"); ?></h3>
			<div class="inside">
				<p>Some crawlers might use these keywords to categorize your site:</p>
				<p>
				<textarea name="<?php echo $settings; ?>[meta_keywords]" cols=30 rows=5><?php echo stripslashes(rw_get_option('meta_keywords')); ?></textarea>
				</p>
			</div>
		</div>
		
	</div>
	
	</form>
</div>
<?php 

}


// add CSS and JS if necessary
function rw_settings_css_js() {
echo <<<CSS

<style type="text/css">
	.metabox-holder { 
		float: left;
		margin: 0; padding: 0 10px 0 0;
	}
	.metabox-holder { 
		float: left;
		margin: 0; padding: 0 10px 0 0;
	}
	.metabox-holder .postbox .inside {
		padding: 0 10px;
	}
	.mbleft {
		width: 300px;
	}
	.mbright {
		width: 480px;
	}
	.catchecklist,
	.pagechecklist {
		list-style-type: none;
		margin: 0; padding: 0 0 10px 0;
	}
	.catchecklist li,
	.pagechecklist li {
		margin: 0; padding: 0;
	}
	.catchecklist ul {
		margin: 0; padding: 0 0 0 15px;
	}
	select {
		margin-top: 5px;
	}
	input {
		margin-top: 5px;
	}
	input[type="checkbox"], input[type="radio"] {
		margin-top: 1px;
	}
</style>

CSS;

echo <<<JS

<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
});
</script>

JS;
}
?>