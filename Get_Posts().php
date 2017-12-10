<?php 

$args = array(
	"posts_per_page"   => 5,
	"paged"            => 1
	"tax_query" => array(
		array(
			"taxonomy" => "category",
			"field"    => "slug",
			"terms"    => "videos,movies",
		)
	),
	"orderby"          => "post_date",
	"order"            => "DESC",
	"exclude"          => "1123, 4456",
	"meta_key"         => "",
	"meta_value"       => "",
	"post_type"        => "post",
	"post_status"      => "publish"
);

$posts_array = get_posts($args); 

?>
