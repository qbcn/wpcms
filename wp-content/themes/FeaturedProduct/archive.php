<?php  if (get_option('wpyou_picats_id')){
$productCats = get_option('wpyou_picats_id');
$productArrays = explode(",",$productCats);
if(in_category($productArrays) ||post_is_in_descendant_category( $productArrays )){include('archive_products.php');}
else{include('archive_main.php');}
}else{include('archive_main.php');} ?>