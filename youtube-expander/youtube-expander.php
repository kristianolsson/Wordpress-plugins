<?php
/*
Plugin Name: Youtube Expander
Plugin URI: http://www.kasa.nu
Description: Scans posts for Youtube URLs and expands them to show a playable video at the end of the post.  
Version: 1.1
Author: Kristian Olsson
Author URI: http://www.kasa.nu
*/
?>
<?php
function showyoutube($text){
  $foo = $text;
  $tmp = strip_tags($text);
  $width = 425; $height = 344;		// Standart Screen Size
  $widthwd = 560; $heightwd = 340;	// Widescreen Size

  // find a mention of youtube  youtube.com/watch?v=A1zySeNpW20
  if (preg_match_all('#youtube.com/watch\?v=([\d\w]+)#', $tmp, $matches, PREG_PATTERN_ORDER) > 0) {
    foreach ($matches[1] as $match) {
 		$images .= '<object width="'.$widthwd.'" height="'.$heightwd.'" allowfullscreen="true" type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$match.'"><param name="movie" value="http://www.youtube.com/v/'.$match.'" /></object>';
   //  $images .= '<object type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" data="http://www.youtube.com/v/'.$match.'"><param name="movie" value="http://www.youtube.com/v/'.$match.'"></param><param name="allowFullScreen" value="true"></param><param name="wmode" value="transparent" /></object>';
//$images .= "<a href='http://youtube.com/{$match}'><img src='http://youtube.com/show/large/{$match}' class='aligncenter' /></a>";
    }
    $text = $foo . '<center>' . $images . '</center>';
  }
  if (preg_match_all('#youtu.be/([\d\w]+)#', $tmp, $matches, PREG_PATTERN_ORDER) > 0) {
    foreach ($matches[1] as $match) {
 		$mov .= '<object width="'.$widthwd.'" height="'.$heightwd.'" allowfullscreen="true" type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$match.'"><param name="movie" value="http://www.youtube.com/v/'.$match.'" /></object>';
    }
    $text = $foo . '<center>' . $mov . '</center>';
  }

  return $text;
}

add_filter('the_content', 'showyoutube');
add_filter('the_excerpt', 'showyoutube');
?>
