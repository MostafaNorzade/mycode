<?php

//----------- Functions.php -----------------
function bitfa_recentpost($atts, $content=null){

$getpost = get_posts( array('number' => 1) );

$getpost = $getpost[0];

$return = $getpost->post_title . "<br />" . $getpost->post_excerpt . "…";

$return .= "<br /><a href='" . get_permalink($getpost->ID) . "'><em>بیشتر بخوانید →</em></a>";

return $return;

}
add_shortcode('newestpost', 'bitfa_recentpost');