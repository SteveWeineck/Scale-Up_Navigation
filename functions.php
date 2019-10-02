<?php

//menu register
function new_navigation_register() {
    register_nav_menus(
        array(
            'primary_menu' => __( 'Primary Menu', 'newtest-navi' ),
        )
    );
}

//logo
function theme_prefix_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );
}


//get rid of the ****** wordpress navigation class mess

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
//but show the active status
function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

//init
add_action( 'after_setup_theme', 'theme_prefix_setup' );
add_action( 'init', 'new_navigation_register' );
