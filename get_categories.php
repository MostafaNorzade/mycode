<?php
//define array before function
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
    'taxonomy' => 'category',//or other taxonomi
    'pad_counts' => false
);
$categories = get_categories ( $args );




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


<?php
//----------------- Examle -----------------

$args = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'taxonomy' => 'us_portfolio_category',
    'hide_empty' => 1,
    'child_of' => 55, //child and grandchild of cat with id 55
    'parent' => 55, //only child of cat with id 55
);
$categories = get_categories($args);
?>

<ul>
    <li>
        <?php
        foreach ($categories as $category) {
            $category_link = get_category_link($category->term_id);
            $name = $category->name;
            $description = $category->description;
        }
        ?>
    </li>
</ul>




