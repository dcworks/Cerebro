<?php

// google analytics hook
function google_analytics()
{
	if ( get_option('cb_analytics') )
	{
		echo "<script>var _gaq=[['_setAccount','" . get_option('cb_analytics') . "'],['_trackPageview']];(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=true;g.src=('https:'==location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s);})(document,'script');</script>";
	}

}
add_action('wp_footer','google_analytics');


// feedburner
function cb_feedburner_fix_url($url) {
	$url = preg_replace('!^(http|https)://!i', '', $url);
	$url = preg_replace('!^/!i', '', $url);
	$url = 'http://'.$url;
	return $url;
}

function cb_feedburner_redirect() {
	global $feed, $withcomments, $wp, $wpdb, $wp_version, $wp_db_version;
	
	// Do nothing if not a feed
	if (!is_feed()) return;
	
	// Do nothing if feedburner is the user-agent
	if (preg_match('/feedburner/i', $_SERVER['HTTP_USER_AGENT'])) return;
	
	// Do nothing if not configured
	$feed_url = get_option('cb_feedburner');
	
	if (!isset($feed_url)) $feed_url = null;
	
	if ($feed_url == null) return;
	
	switch($feed) {
		case 'feed':
		case 'rdf':
		case 'rss':
		case 'rss2':
		case 'atom':
			if ($feed_url != null) {
				// Redirect the feed
				header("Location: ".$feed_url);
				die;
			}
	}
	
	
}
add_action('template_redirect', 'cb_feedburner_redirect');

// social media
function get_social_options($name){
?>
	<option selected="selected">Choose...</option>
	<option value="aim_16.png" <?php selected('aim_16.png', $name); ?>>Aim</option>
	<option value="apple_16.png" <?php selected('apple_16.png', $name); ?>>Apple</option>
	<option value="bebo_16.png" <?php selected('bebo_16.png', $name); ?>>Bebo</option>
	<option value="blogger_16.png" <?php selected('blogger_16.png', $name); ?>>Blogger</option>
	<option value="brightkite_16.png" <?php selected('brightkite_16.png', $name); ?>>Brightkite</option>
	<option value="cargo_16.png" <?php selected('cargo_16.png', $name); ?>>Cargo</option>
	<option value="delicious_16.png" <?php selected('delicious_16.png', $name); ?>>Delicious</option>
	<option value="designfloat_16.png" <?php selected('designfloat_16.png', $name); ?>>Designfloat</option>
	<option value="designmoo_16.png" <?php selected('designmoo_16.png', $name); ?>>Designmoo</option>
	<option value="deviantart_16.png" <?php selected('deviantart_16.png', $name); ?>>Deviantart</option>
	<option value="digg_16.png" <?php selected('digg_16.png', $name); ?>>Digg</option>
	<option value="dopplr_16.png" <?php selected('dopplr_16.png', $name); ?>>Dopplr</option>
	<option value="dribbble_16.png" <?php selected('dribbble_16.png', $name); ?>>Dribbble</option>
	<option value="email_16.png" <?php selected('email_16.png', $name); ?>>Email</option>
	<option value="ember_16.png" <?php selected('ember_16.png', $name); ?>>Ember</option>
	<option value="evernote_16.png" <?php selected('evernote_16.png', $name); ?>>Evernote</option>
	<option value="facebook_16.png" <?php selected('facebook_16.png', $name); ?>>Facebook</option>
	<option value="flickr_16.png" <?php selected('flickr_16.png', $name); ?>>Flickr</option>
	<option value="friendfeed_16.png" <?php selected('friendfeed_16.png', $name); ?>>Friendfeed</option>
	<option value="gamespot_16.png" <?php selected('gamespot_16.png', $name); ?>>Gamespot</option>
	<option value="google_16.png" <?php selected('google_16.png', $name); ?>>Google</option>
	<option value="google_voice_16.png" <?php selected('google_voice_16.png', $name); ?>>Google_voice</option>
	<option value="google_wave_16.png" <?php selected('google_wave_16.png', $name); ?>>Google_wave</option>
	<option value="googletalk_16.png" <?php selected('googletalk_16.png', $name); ?>>Googletalk</option>
	<option value="gowalla_16.png" <?php selected('gowalla_16.png', $name); ?>>Gowalla</option>
	<option value="grooveshark_16.png" <?php selected('grooveshark_16.png', $name); ?>>Grooveshark</option>
	<option value="ilike_16.png" <?php selected('ilike_16.png', $name); ?>>Ilike</option>
	<option value="komodomedia_azure_16.png" <?php selected('komodomedia_azure_16.png', $name); ?>>Komodomedia</option>
	<option value="lastfm_16.png" <?php selected('lastfm_16.png', $name); ?>>Lastfm</option>
	<option value="linkedin_16.png" <?php selected('linkedin_16.png', $name); ?>>Linkedin</option>
	<option value="mixx_16.png" <?php selected('mixx_16.png', $name); ?>>Mixx</option>
	<option value="mobileme_16.png" <?php selected('mobileme_16.png', $name); ?>>Mobileme</option>
	<option value="mynameise_16.png" <?php selected('mynameise_16.png', $name); ?>>Mynameise</option>
	<option value="myspace_16.png" <?php selected('myspace_16.png', $name); ?>>Myspace</option>
	<option value="netvibes_16.png" <?php selected('netvibes_16.png', $name); ?>>Netvibes</option>
	<option value="newsvine_16.png" <?php selected('newsvine_16.png', $name); ?>>Newsvine</option>
	<option value="openid_16.png" <?php selected('openid_16.png', $name); ?>>Openid</option>
	<option value="orkut_16.png" <?php selected('orkut_16.png', $name); ?>>Orkut</option>
	<option value="pandora_16.png" <?php selected('pandora_16.png', $name); ?>>Pandora</option>
	<option value="paypal_16.png" <?php selected('paypal_16.png', $name); ?>>Paypal</option>
	<option value="picasa_16.png" <?php selected('picasa_16.png', $name); ?>>Picasa</option>
	<option value="plurk_16.png" <?php selected('plurk_16.png', $name); ?>>Plurk</option>
	<option value="posterous_16.png" <?php selected('posterous_16.png', $name); ?>>Posterous</option>
	<option value="qik_16.png" <?php selected('qik_16.png', $name); ?>>Qik</option>
	<option value="readernaut_16.png" <?php selected('readernaut_16.png', $name); ?>>Readernaut</option>
	<option value="reddit_16.png" <?php selected('reddit_16.png', $name); ?>>Reddit</option>
	<option value="roboto_16.png" <?php selected('roboto_16.png', $name); ?>>Roboto</option>
	<option value="rss_16.png" <?php selected('rss_16.png', $name); ?>>Rss</option>
	<option value="sharethis_16.png" <?php selected('sharethis_16.png', $name); ?>>Sharethis</option>
	<option value="skype_16.png" <?php selected('skype_16.png', $name); ?>>Skype</option>
	<option value="stumbleupon_16.png" <?php selected('stumbleupon_16.png', $name); ?>>Stumbleupon</option>
	<option value="technorati_16.png" <?php selected('technorati_16.png', $name); ?>>Technorati</option>
	<option value="tumblr_16.png" <?php selected('tumblr_16.png', $name); ?>>Tumblr</option>
	<option value="twitter_16.png" <?php selected('twitter_16.png', $name); ?>>Twitter</option>
	<option value="viddler_16.png" <?php selected('viddler_16.png', $name); ?>>Viddler</option>
	<option value="vimeo_16.png" <?php selected('vimeo_16.png', $name); ?>>Vimeo</option>
	<option value="virb_16.png" <?php selected('virb_16.png', $name); ?>>Virb</option>
	<option value="windows_16.png" <?php selected('windows_16.png', $name); ?>>Windows</option>
	<option value="wordpress_16.png" <?php selected('wordpress_16.png', $name); ?>>Wordpress</option>
	<option value="xing_16.png" <?php selected('xing_16.png', $name); ?>>Xing</option>
	<option value="yahoo_16.png" <?php selected('yahoo_16.png', $name); ?>>Yahoo</option>
	<option value="yahoobuzz_16.png" <?php selected('yahoobuzz_16.png', $name); ?>>Yahoobuzz</option>
	<option value="yelp_16.png" <?php selected('yelp_16.png', $name); ?>>Yelp</option>
	<option value="youtube_16.png" <?php selected('youtube_16.png', $name); ?>>Youtube</option>
			
<?


/*
<tr valign="top">
<th scope="row">Social Media</th>
<td>
	<select name="">
		<?php get_social_options(get_option('cb_servicename_1')); ?>
	</select>
	<input type="text" id="cb_socialmedia" class="regular-text" name="cb_socialmedia" value="<?php echo get_option('cb_socialmedia'); ?>">

</td>
</tr>
*/


}




// page excerpt
Class wp_plugin_page_excerpt {
  Function __construct(){
    // Set Hook
    Add_Action('admin_menu', Array($this, 'Add_Page_Excerpt_Box'));
  }
  
  Function Add_Page_Excerpt_Box(){
    // We just copy the function for the post.
    Add_Meta_Box(
      'pageexcerpt',
      __('Excerpt'),
      Array($this, 'Print_Excerpt_Box'),
      'page',
      'normal',
      'core'
    );
  }
  
  Function Print_Excerpt_Box (){
  ?>
	<label class="screen-reader-text" for="excerpt"><?php _e('Excerpt') ?></label>
	<textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php Echo $GLOBALS['post']->post_excerpt ?></textarea>
	<p><?php _e('Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="http://codex.wordpress.org/Excerpt" target="_blank">Learn more about manual excerpts.</a>'); ?></p>
	<?
  }

} /* End of the Class */
New wp_plugin_page_excerpt();


// disable post editor
function disable_posteditor_options()
{

	$posteditors = get_option('cb_posteditor');
	
	foreach ( $posteditors as $key => $item )
	{
		if ( isset($item['meta_value'] ) )
		{
			remove_meta_box($item['meta_box'], 'post', 'normal');
		}
	}
	
}
add_action('admin_init','disable_posteditor_options');

























?>