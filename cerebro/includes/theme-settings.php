<?php
// create custom plugin settings menu
add_action('admin_menu', 'cb_create_menu');

function cb_create_menu() {

	//create new top-level menu
	add_menu_page('Theme Settings', 'Cerebro', 'administrator', basename(__FILE__), 'cb_settings_page',get_bloginfo('template_directory').'/images/settings.ico');

	//call register settings function
	add_action( 'admin_init', 'cb_register_settings' );
}


function cb_register_settings() {
	//register our settings
	register_setting( 'cb-settings-group', 'cb_analytics' );
	register_setting( 'cb-settings-group', 'cb_feedburner' );
	register_setting( 'cb-settings-group', 'cb_description' );
	register_setting( 'cb-settings-group', 'cb_keywords' );
	register_setting( 'cb-settings-group', 'cb_posteditor' );
}

function cb_settings_page() {
?>
<div class="wrap">
<?php screen_icon('options-general'); ?><h2>Theme Settings</h2>

<?php if(isset($_REQUEST['updated']) == 'true') { echo '<div class="updated fade" id="message"><p><strong>Settings saved.</strong></p></div>'; } ?>

<form method="post" action="options.php">
    <?php settings_fields( 'cb-settings-group' ); ?>
    
    <h3 class="title">Tracking & RSS</h3>
    
    <table class="form-table">
    	
        <tr valign="top">
        <th scope="row">Google Analytics</th>
        <td>
        	<input type="text" id="cb_analytics" class="regular-text" name="cb_analytics" value="<?php echo get_option('cb_analytics'); ?>">
	        <span class="description">Enter your <a href="http://www.google.com/analytics/" target="_blank">Google Analytics</a> code (UA-XXXXXXX-X).</span>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Feedburner</th>
        <td>
        	<input type="text" id="cb_feedburner" class="regular-text" name="cb_feedburner" value="<?php echo get_option('cb_feedburner'); ?>">
	        <span class="description">Enter your <a href="http://feedburner.google.com/" target="_blank">Feedburner</a> address (http://feeds.feedburner.com/yourfeed).</span>
        </td>
        </tr>

	</table>
	
	<br>
	<h3 class="title">Meta Data</h3>
	
	<table class="form-table">
        
        <tr valign="top">
        <th scope="row">Meta Description</th>
        <td>
			<textarea class="regular-text" name="cb_description" cols="50" rows="5"><?php echo get_option('cb_description'); ?></textarea><br>
	        <span class="description">Enter your website meta description.</span>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Meta Keywords</th>
        <td>
        	<textarea id="cb_keywords" class="regular-text" name="cb_keywords" cols="50" rows="5"><?php echo get_option('cb_keywords'); ?></textarea><br>
	        <span class="description">Enter your website meta keywords.</span>
        </td>
        </tr>
        
    </table>
    
    <br>
    <h3 class="title">Post Editor Settings</h3>
    <?php $posteditor = get_option('cb_posteditor'); ?>
    <table class="form-table">
    	
    	<tr valign="top"><th scope="row">Disable editor items</th>
			<td><input name="cb_posteditor[tags][meta_value]" id="tag_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['tags']['meta_value'])); ?> /><label for="tag_check"> Tags</label></td>
				<input name="cb_posteditor[tags][meta_box]" value="tagsdiv-post_tag" type="hidden" />		
			<td><input name="cb_posteditor[excerpt][meta_value]" id="excerpt_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['excerpt']['meta_value'])); ?> /><label for="excerpt_check"> Excerpt</label></td>
				<input name="cb_posteditor[excerpt][meta_box]" value="postexcerpt" type="hidden" />
			<td><input name="cb_posteditor[trackbacks][meta_value]" id="trackbacks_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['trackbacks']['meta_value'])); ?> /><label for="trackbacks_check"> Trackbacks</label> </td>
				<input name="cb_posteditor[trackbacks][meta_box]" value="trackbacksdiv" type="hidden" />			
			<td><input name="cb_posteditor[customfields][meta_value]" id="customfields_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['customfields']['meta_value'])); ?> /><label for="customfields_check"> Custom Fields</label> </td>
				<input name="cb_posteditor[customfields][meta_box]" value="postcustom" type="hidden" />
		</tr>
		<tr valign="top"><th scope="row"></th>
			<td><input name="cb_posteditor[discussion][meta_value]" id="discussion_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['discussion']['meta_value'])); ?> /><label for="discussion_check"> Discussion</label> </td>
				<input name="cb_posteditor[discussion][meta_box]" value="commentstatusdiv" type="hidden" />
			<td><input name="cb_posteditor[comments][meta_value]" id="comments_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['comments']['meta_value'])); ?> /><label for="comments_check"> Comments</label> </td>
				<input name="cb_posteditor[comments][meta_box]" value="commentsdiv" type="hidden" />
			<td><input name="cb_posteditor[author][meta_value]" id="author_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['author']['meta_value'])); ?> /><label for="author_check"> Author</label> </td>
				<input name="cb_posteditor[author][meta_box]" value="authordiv" type="hidden" />
			<td><input name="cb_posteditor[revisions][meta_value]" id="revisions_check" type="checkbox" value="1" <?php checked('1', isset($posteditor['revisions']['meta_value'])); ?> /><label for="revisions_check"> Revisions</label> </td>
				<input name="cb_posteditor[revisions][meta_box]" value="revisionsdiv" type="hidden" />
    	</tr>
    
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php } ?>
