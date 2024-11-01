<?php
/*
	Plugin Name: WordPress Mobile Content
	Plugin URI: https://wordpress.org/plugins/wp-mobile-content/
	Description: This is a custom plugin made by jaedpro
	Version: 1.0.0
	Author: getitreview
	Author URI: https://profiles.wordpress.org/getitreview/
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class WPMobileContent{
	
	public function __construct(){
        
        add_shortcode( 'mobile', array( $this, 'display_mobile_content' ) );
        add_action( 'admin_print_scripts', array( $this, 'admin_scripts' ) );
	}
	
    function display_mobile_content( $atts, $content = null ){

        if( wp_is_mobile() ) return  wpautop( do_shortcode( $content ) );
        else return null;
    }

    function admin_scripts(){
        
        wp_enqueue_script( 'wpmc_admin_scripts', plugin_dir_url( __FILE__ ) . 'scripts.js', array( 'quicktags' ) );
    }

} new WPMobileContent();
