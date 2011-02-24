<?php
/*
Plugin Name: Picplz Expander
Plugin URI: http://www.kasa.nu
Description: Scans posts for picplz URL's and automatically expands them and show the image.  
Version: 1.0
Author: Kristian Olsson
Author URI: http://www.kasa.nu
*/
?>

<?php
wp_enqueue_script('jquery');
wp_enqueue_script('picplz-expander', '/wp-content/plugins/picplz-expander/picplz-expander.js', array('jquery') ); 

function showpicplz($text){
  $foo = $text;
  $tmp = strip_tags($text);

  // find a mention of picplz  http://picplz.com/xxxx
  if (preg_match_all('#picplz.com/([\d\w]+)#', $tmp, $matches, PREG_PATTERN_ORDER) > 0) {
    foreach ($matches[1] as $match) {
 	$images .= "<img id='picplzImg{$match}'></img><p><script type='text/javascript'> setPicplzImage('{$match}'); </script>";
    }
    $text = $foo . '<center>' . $images . '</center>';
  }

  return $text;
}

add_filter('the_content', 'showpicplz');
add_filter('the_excerpt', 'showpicplz');
?>
