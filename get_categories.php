<?php

$categories = get_categories ( $args );

$args = array(
    'type' => 'post',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'name', //id-name(the default value)-slug-count-term_group
    'order' => 'ASC',//asc(default)- desc
    'hide_empty' => 1,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'category',
    'pad_counts' => false
);


//=================================================
//---------------- Return value -------------------
////===============================================
?>

$category-> term_id
$category-> name
$category-> slug
$category-> term_group
$category-> term_taxonomy_id
$category-> taxonomy
$category-> description
$category-> parent
$category-> count
$category-> cat_ID
$category-> category_count
$category-> category_description
$category-> cat_name
$category-> category_nicename
$category-> category_parent





