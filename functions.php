<?php

function recipelist_shortcode($atts, $content) {
	$link_cat_ids = array('Appetizers' => 30, 'Desserts' => 33, 'Main Dishes' => 32, 'Side Dishes' => 31);
	return "<ul" . wp_list_bookmarks(array('category' => $link_cat_ids[$content], 'echo' => false)) . "</ul>";
}

add_shortcode('recipelist','recipelist_shortcode');

function strip_height_from_embeds($content) {
	if (false !== strpos($content,"flickr")) {
		$content = preg_replace("/height=\"(\d*)\"/","",$content);
	}  
	return $content;
}

add_filter('embed_oembed_html','strip_height_from_embeds');
?>