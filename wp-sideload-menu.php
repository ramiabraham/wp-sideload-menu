<?php
/*
* Plugin Name: WP Sideload Menu
* Plugin URI: https://ramiabraham.com
* Description: This plugin adds a sideload menu to WordPress
* Version: 1.0
* Author: ramiabraham
* Contributors: ramiabraham
* Author URI: https://ramiabraham.com
* License: GPL
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue sideload push menu css and js, as well
 * as libary to remove touch-device latency
 *
 * @access public
 * @return void
 */
function ra_wp_side_load_menu_enqueue_js() {

	wp_register_style(
		'wp-side-load-css',
		plugins_url( '/includes/css/mobile-menu.css' , __FILE__ ));

	wp_register_script(
		'touche',
		plugins_url( '/includes/js/touche.min.js' , __FILE__ ),
		array( 'jquery' )
	);

	wp_register_script(
		'wp-side-load-js',
		plugins_url( '/includes/js/mobile-menu.js' , __FILE__ ),
		array( 'jquery', 'touche' )
	);

	/**
	* If you like, uncomment the wp_is_mobile check to load
	* this menu on mobile devices only.
	*/

	//	if ( wp_is_mobile() ) {

			wp_enqueue_style( 'wp-side-load-css' );
			wp_enqueue_script( 'touche' );
			wp_enqueue_script( 'wp-side-load-js' );

	//	}
}

add_action( 'wp_enqueue_scripts', 'ra_wp_side_load_menu_enqueue_js' );


/**
 * The mobile nav
 *
 * Create a WordPress menu called 'mobile',
 * or change the 'menu' arg below to whatever menu you'd like to use
 *
 * @author ramiabraham
 * @access public
 * @return void
 */
function ra_wp_side_load_menu() {

		$mobile_nav_args = array(
			'menu'            => 'mobile',
			'container'       => 'div',
			'container_class' => 'mobile-nav-container',
			'container_id'    => '',
			'menu_class'      => 'mobile-nav-inner',
			'menu_id'         => '',
			'echo'            => false,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<button class="mobile-nav-trigger">&larr;' . __('Close') . '</button><ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);

	$mobile_nav = '<nav class="mobile-menu push-menu-left">';

	$mobile_nav .= wp_nav_menu( $mobile_nav_args );

	$mobile_nav .= '</nav>';

	echo $mobile_nav;

}

add_action( 'get_header', 'ra_wp_side_load_menu', 99 );

/**
 * Adds the mobile nav trigger to a site
 *
 * The method here depends on the theme / framework in use
 * Since you can't always hook in somewhere (for particularly bad themes),
 * I've also included an example in mobile-menu.js to directly inject a button
 * via jQuery.
 *
 * @author ramiabraham
 * @access public
 * @return void
 */
function ra_wp_side_load_menu_trigger() {

	$mobile_nav_trigger = '<div class="mobile-nav-trigger toggle-push-left">' . __('MENU') .  '</div>';

	echo $mobile_nav_trigger;

}

/**
* Adds mobile nav trigger button to the site.
*
* Alternatively, here's an example of hooking into Genesis (http://my.studiopress.com/themes/genesis/):
* add_action( 'genesis_after_header', 'ra_wp_side_load_menu_trigger', 99 );
*
* Here's an example of hooking into THA (https://github.com/zamoose/themehookalliance):
* add_action( 'tha_header_bottom', 'ra_wp_side_load_menu_trigger', 99 );
*/

add_action( 'get_header', 'ra_wp_side_load_menu_trigger', 99 );