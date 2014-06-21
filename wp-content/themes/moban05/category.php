<?php
if ( is_category('news') ) {
include(TEMPLATEPATH . '/category-news.php');
}
// elseif 在一次判断 想在加判断复制代码
elseif ( is_category('cases') ) { // plugin 为category的别名
include(TEMPLATEPATH . '/category-case.php');
}
// elseif 结束
else {
include(TEMPLATEPATH . '/category-all.php');
}
?>
