<?php

function widow_post_types()
{
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Event',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all-items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar'
    ));

  register_post_type('presenters', array(
    'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'  /* This will show the post parent field */),
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,    	
    'taxonomies'  => array( 'category', 'presenter' ),
    'labels' => array(
        'name' => 'Presenter',
        'add_new_item' => 'Add New Presenter',
        'edit_item' => 'Edit Presenter',
        'all-items' => 'All Presenters',
        'singular_name' => 'Presenter'
    ),
    'menu_icon' => 'dashicons-calendar'
));


    register_post_type('conference', array(
        'rewrite' => array('slug' => 'conferences'),
        'hierarchical' => true,
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'page-attributes', 'thumbnail'),
        'labels' => array(
            'name' => 'Conference',
            'add_new_item' => 'Add New Conference',
            'edit_item' => 'Edit Conference',
            'all-items' => 'All Conferences',
            'singular_name' => 'Conference'
        ),
        'menu_icon' => 'dashicons-groups'
    ));

    register_post_type('account', array(
    'supports' => array('title', 'editor',  'page-attributes' /* This will show the post parent field */,),
    'rewrite' => array('slug' => 'account'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'labels' => array(
        'name' => 'Account',
        'add_new_item' => 'Add New Account Page',
        'edit_item' => 'Edit Account',
        'all-items' => 'All Accounts',
        'singular_name' => 'Account'
    ),
    'menu_icon' => 'dashicons-businessperson'
));

   register_post_type('keynote', array(
    'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail' /* This will show the post parent field */,),
    'rewrite' => array('slug' => 'keynotes'),
    'has_archive' => true,
    'public' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'taxonomies'  => array( 'category', 'keynote' ),
    'labels' => array(
        'name' => 'Keynotes',
        'add_new_item' => 'Add Keynotes Page',
        'edit_item' => 'Edit Keynotes Page',
        'all-items' => 'All Keynotes Pages',
        'singular_name' => 'Keynote Page'
    ),
    'menu_icon' => 'dashicons-video-alt3'
));


}
add_action('init', 'widow_post_types');
add_theme_support('post-thumbnails');

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

