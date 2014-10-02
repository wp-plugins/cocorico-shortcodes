<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Add the TinyMCE Menu Button
if(!function_exists('coco_shortcodes_add_tinymce')){
	function coco_shortcodes_add_tinymce() {
		global $typenow;
		if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return ;
		
	    add_filter( 'mce_external_plugins', 'coco_shortcodes_add_tinymce_plugin' );
	    // Add button to line 1 form WP TinyMCE
	    add_filter( 'mce_buttons', 'coco_shortcodes_add_tinymce_button' );
	}
}
add_action( 'admin_head', 'coco_shortcodes_add_tinymce' );

// Load TinyMCE plugin
if(!function_exists('coco_shortcodes_add_tinymce_plugin')){
	function coco_shortcodes_add_tinymce_plugin( $plugin_array ) {
	
	    $plugin_array['coco_shortcode_drop'] = plugins_url('/js/editor-plugin.js' , __FILE__);
	    return $plugin_array;
	}
}

// Create shortcode button
if(!function_exists('coco_shortcodes_add_tinymce_button')){
	function coco_shortcodes_add_tinymce_button( $buttons ) {
	
	    array_push( $buttons, 'coco_shortcodes_button' );
	    return $buttons;
	}
}

// TinyMce translation
if(!function_exists('coco_shortcodes_tinymce_add_locale')){
	function coco_shortcodes_tinymce_add_locale($locales) {
	    $locales ['Cocorico-Shortcodes-TinyMce'] = plugin_dir_path ( __FILE__ ) . 'cocorico-shortcodes-editor-langs.php';
	    return $locales;
	}
}
add_filter('mce_external_languages', 'coco_shortcodes_tinymce_add_locale');


