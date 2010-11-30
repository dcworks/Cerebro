<?php
// Convert string to slug
function rw_toslug($str){
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = preg_replace('/-+/', "-", $str);
	return $str;
}

// Remove http:// from string
function rw_remove_http($url){
	return(str_replace(array('http://','https://','www.'), '', strtolower($url)));
}

// Custom strstr < php 5.0.3
function rw_strstr($h,$n){
    return array_shift(explode($n,$h,2));
}

// Custom author description length
function rw_author_excerpt($authid){
	$limit = 150;
	$excerpt = get_the_author_description($authid);
	if (strlen($excerpt) > $limit) {
		$excerpt = substr($excerpt, 0, strrpos(substr($excerpt, 0, $limit), ' ')) . '...';
		return $excerpt;
    }else{
    	return $excerpt;
    }
}

// Custom crop chars
function rw_crop_chars($str, $chars){
	if (strlen($str) > $chars){
		$str = substr($str, 0, $chars);
		$str = $str . "...";
		return $str;
	}else{
		return $str;
	}
}  

// Custom crop length
function rw_crop($txt,$limit){
	if (strlen($txt) > $limit) {
		$txt = substr($txt, 0, strrpos(substr($txt, 0, $limit), ' ')) . '...';
		return $txt;
    }else{
    	return $txt; 
    }
}

// Custom categorylist display length
function rw_get_cats($num){
	$temp=get_the_category();
	$count=count($temp);
	for($i=0;$i<$num&&$i<$count;$i++){
		$crw_string.='<a href="'.get_category_link( $temp[$i]->crw_ID  ).'">'.$temp[$i]->crw_name.'</a>';
		if($i!=$num-1&&$i+1<$count)
		$crw_string.=', ';
	}
	echo $crw_string;
}

// Custom content formatting
function rw_get_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// Set custom excerpt length
function rw_excerpt_length( $length ) {
	return 25;
}

add_filter( 'excerpt_length', 'rw_excerpt_length' );

?>