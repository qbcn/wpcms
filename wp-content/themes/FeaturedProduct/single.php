<?php  if (get_option('wpyou_picats_id')){
$productCats = get_option('wpyou_picats_id');
$productArrays = explode(",",$productCats);
if(in_category($productArrays) ||post_is_in_descendant_category( $productArrays )){include('single-product.php');}
else{include('single-main.php');}
}else{include('single-main.php');} ?>