<?php

function template_excerpt( $template_content , $template_letter_count ){
    $template_striped_content = strip_shortcodes($template_content);
    $template_striped_content = strip_tags($template_striped_content);
    $template_excerpt = mb_substr($template_striped_content, 0, $template_letter_count );
    if($template_striped_content > $template_excerpt){
        $template_excerpt .= "...";
    }
    return $template_excerpt;
}
