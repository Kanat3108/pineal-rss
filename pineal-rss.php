<?php

/*
Plugin Name: Pineal RSS
Plugin URI: 
Description: RSS plugin 
Version: 1.0
Author: Kanat Konyrbayev
*/


function pineal_rss_install(){
	global $wpdb;

	$table_name = $wpdb->prefix . 'pineal_rss';

	if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name){
		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
		`id_rss` int(11) NOT NULL AUTO_INCREMENT,
		`name_rss` varchar(40) NOT NULL, 
		`url_rss` varchar(40) NOT NULL,
		`count_rss` int(20), 
		`color_rss` varchar(20),
		`img_rss` tinyint(1) NOT NULL,
		`author_rss` tinyint(1) NOT NULL, 
		`date_rss` tinyint(1) NOT NULL,
		PRIMARY KEY(`id_rss`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

		$wpdb->query($sql);
	}


}

function pineal_rss_delete(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'pineal_rss';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);

	delete_option('rss_on_page');
}

function pineal_rss_uninstall(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'pineal_rss';
	$sql = "DROP TABLE IF EXISTS $table_name";
	$wpdb->query($sql);
	delete_option('rss_on_page');
}

register_activation_hook( __FILE__, 'pineal_rss_install');
register_deactivation_hook( __FILE__, 'pineal_rss_uninstall');
register_uninstall_hook(__FILE__, 'pineal_rss_delete');


function rsses_admin_menu(){
add_menu_page('Pineal RSS', 'Pineal RSS', 8, 'pineal_rsses', 'pineal_rsses_editor');
//add_submenu_page('pineal_rsses','Add RSS', 'Add RSS', 8,'pineal_rsses_adding');
}
add_action('admin_menu', 'rsses_admin_menu');

function pineal_rsses_editor(){
	switch ($_GET['c']) {
		case 'add':
			$action = 'add';
			break;
		case 'edit':
			$action = 'edit';
			break;
		default:
			$action = 'all';
			break;
	}
	include_once("includes/$action.php");
}




function rss_shortcode($name_rss){
	ob_start();
	include_once("includes/intro.php");
	wp_register_style( 'rss-style-1', '/wp-content/plugins/pineal-rss/includes/css/rss-style-1.css' );
	wp_register_style( 'rss-fontawesome', '/wp-content/plugins/pineal-rss/includes/css/fontawesome.min.css' );
	wp_enqueue_style( 'rss-style-1' );
	wp_enqueue_style( 'rss-fontawesome' );

	return ob_get_clean();
	return $name_rss[0];
}


add_shortcode('rss','rss_shortcode');
