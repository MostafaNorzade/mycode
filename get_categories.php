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

<?php
//======================================================================
//---------------------- Fanpuya - Example - Template page -------------
//======================================================================


<?php
/**
 * Template Name: خدمات
 */
get_header();
$args = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'taxonomy' => 'us_portfolio_category',
    'hide_empty' => 0,
    'child_of' => 53,
);
$categories = get_categories($args);


?>
<div class="main-last-cat">
<ul>
    <div class="container">
        <div class="row">
            <?php
            foreach ($categories as $category) {
                $category_link = get_category_link($category->term_id);
                  ?>
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img style="height: 250px;" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($category->term_id); ?>"
                                     alt="">
                                <div>
                                    <a href="<?php echo $category_link; ?>" class="btn">نمایش محصولات</a>
                                </div>
                            </div>
                            <h4><a href="<?php echo $category_link; ?>"><?php echo $category->name; ?></a></h4>
                            <div class="sticker sticker-new"></div>
                        </div>
                    </div>
            <?php
            } ?>
        </div>
    </div>
</ul>
</div>
<?php get_footer() 

//------------------ css ------------------------
    ?>
/*--------------- last product --------------------*/
.product-item {
    padding: 15px;
    background: #fff;
    margin-top: 20px;
    position: relative;
    border: 1px solid #009688;
}
.product-item:hover {
    box-shadow: 5px 5px rgba(181, 181, 181, 0.9)
}
.product-item:after {
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
    font-size: 0;
    line-height:0;
}
.sticker {
    position: absolute;
    top: 0;
    left: 0;
    width: 63px;
    height: 63px;
}
.sticker-new {
    background: url(new.png) no-repeat;
    left: auto;
    right: 0;
}
.pi-img-wrapper {
    position: relative;
    max-height: 251px;
    min-height: 250px;
}
.pi-img-wrapper div {
    background: rgba(0,0,0,0.3);
    position: absolute;
    left: 0;
    top: 0;
    display: none;
    width: 100%;
    height: 100%;
    text-align: center;
}
.product-item:hover>.pi-img-wrapper>div {
    display: block;
}
.pi-img-wrapper div .btn {
    padding: 3px 10px;
    color: #fff;
    border: 1px #fff solid;
    margin: -13px 5px 0;
    background: transparent;
    text-transform: uppercase;
    position: relative;
    top: 50%;
    line-height: 1.4;
    font-size: 12px;
}
.product-item .btn:hover {
    background: #009688;
    border-color: #c8c8c8;
    color: #fff;
}
.product-item h3 {
    font-size: 14px;
    font-weight: 300;
    padding-bottom: 4px;
    text-transform: uppercase;
}
.product-item h3 a {
    color: #3e4d5c;
}
.product-item h3 a:hover {
    color: #E02222;
}
.pi-price {
    color: #e84d1c;
    font-size: 15px;
    float: left;
    padding-top: 1px;
}
.product-item .add2cart {
    float: right;
    color: #757575;
    border: 1px #757575 solid;
    padding: 3px 6px;
    text-transform: uppercase;
}
.product-item .add2cart:hover {
    color: #fff;
    background: #e84d1c;
    border-color: #e84d1c;
}
.col-md-4{
    float: right;
    width: 25%;
    margin: 0 5px 50px 5px;
}
.main-last-cat{
    margin-top: 150px;
}    
