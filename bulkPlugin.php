<?php
/*
Plugin Name: Basic plugin template
Depends:
Provides: Plugin Wordpress basique
Plugin URI:
Description: Plugin Wordpress basique
Version: 0.1
Author: Dolomich
Author URI: http://www.dolostudio.com
License: http://www.wtfpl.net/
*/
// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) )
{
	wp_die( 'Hi there!  I\'m just a plugin, not much I can do when called directly.' );
}
//include required wp mod
require_once( ABSPATH . '/wp-config.php' );
require_once(  plugin_dir_path( __FILE__ ) . '/class/BulkInit.php' );

// TODO use plugin url path in all class file

define( "BKO_PLUGIN_NAME", "bulkPlugin" );
define( BKO_PLUGIN_NAME . '_PLUGIN_URL', plugins_url(  '../js/admin.js', __FILE__ ) );
$pluginName = BKO_PLUGIN_NAME;
$$pluginName = new BulkInit();
$plugin = $$pluginName->initObj();
$$pluginName->initHook();

$whitelist = array(
	'127.0.0.1',
	'r-ro.local',
	'localhost',
	'::1'
);

if( in_array($_SERVER['REMOTE_ADDR'], $whitelist) )
{
	// $plugin->ReCaptchaForm->setTestMod();
}
