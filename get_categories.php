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
);
$categories = get_categories($args);
?>

<ul>
    <li>
        <?php
        foreach ($categories as $category) {
            $category_link = sprintf(
                '<a href="%1$s" alt="%2$s">%3$s</a>',
                esc_url(get_category_link($category->term_id)),
                esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                esc_html($category->name)
            );

            echo '<p>' . sprintf(esc_html__('Category: %s', 'textdomain'), $category_link) . '</p> ';
            echo '<p>' . sprintf(esc_html__('Description: %s', 'textdomain'), $category->description) . '</p>';
            echo '<p>' . sprintf(esc_html__('Post Count: %s', 'textdomain'), $category->count) . '</p>';
            echo '<p>' . sprintf(esc_html__('Post slug: %s', 'textdomain'), $category->slug) . '</p>';
        }
        ?>
    </li>
</ul>




