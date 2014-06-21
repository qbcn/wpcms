<?php
if ( in_category('news') ) {
include(TEMPLATEPATH . '/single-news.php');
}
// elseif 在一次判断 想在加判断复制代码
elseif ( in_category('items') ) { // plugin 为category的别名
include(TEMPLATEPATH . '/single-product.php');
}
// elseif 结束
else {
include(TEMPLATEPATH . '/single-all.php');
}
?>