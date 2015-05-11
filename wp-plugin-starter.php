<?php
/*
Plugin Name: Wordpress plugin starter
Description: 
Author: @willj
*/		
	if (!function_exists("add_action")){
		exit;
	}

	$plugin_path = plugin_dir_path(__FILE__);
	
	require_once($plugin_path . "base/controller.php");
	require_once($plugin_path . "controllers/sample.php");
	
	$sample = new mbw\starter\SampleController();
	
	// Load only if we're in /wp-admin
	// This does not check the user is an admin
	if (is_admin()){
		require_once($plugin_path . "controllers/admin.php");
		$admin = new mbw\starter\AdminController();
	} 
?>