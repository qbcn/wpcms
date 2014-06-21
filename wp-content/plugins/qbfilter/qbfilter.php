<?php
/**
 * @package QbSecureFilter
 * @version 0.1
 */
/*
Plugin Name: QbSecureFilter
Plugin URI: http://www.qibaowu.com/plugins/
Description: Modify admin and login path.
Author: RongHui
Version: 0.1
Author URI: http://www.qibaowu.com/
*/

function qb_url_filter($url, $path, $scheme) {
	return preg_replace( '/wp-login.php/', WP_LOGIN_PATH, $url, 1);
}

function qb_admin_filter($url, $path, $scheme) {
	return preg_replace( '/wp-admin/', WP_ADMIN_PATH, $url, 1);
}

if ( defined('WP_LOGIN_PATH') ) {
	add_filter( 'site_url', 'qb_url_filter', 10, 3 );
}
if ( defined('WP_ADMIN_PATH') ) {
	add_filter( 'admin_url', 'qb_admin_filter', 10, 3 );
}

?>
