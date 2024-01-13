<?php 
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');


function widow_files()
{
    wp_enqueue_style("widow_main_styles", get_theme_file_uri("build/style-index.css"));
    wp_enqueue_style("widow_extra_styles", get_theme_file_uri("build/index.css"));
    wp_enqueue_style('font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style('widow_custom_fonts', "https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    //wp_enqueue_style('widow_bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css");
    // wp_enqueue_style('widows_mobile_styles', get_template_directory_uri()."/build/index.css");
    wp_enqueue_style('widows_main_styles', get_template_directory_uri() . "/style.css");
    wp_enqueue_style('widows_extra_styles', get_template_directory_uri() . "/css/ogstyle.css");
    wp_enqueue_style('widows_main_styles', get_template_directory_uri() . "/css/style.css");
    wp_enqueue_style('widows_main_styles', get_template_directory_uri() . "/style.css");
    wp_enqueue_script('main-widow-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('widow-bootstrap-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js");
}
add_action('wp_enqueue_scripts', 'widow_files'); 

function widow_features(){ 
    register_nav_menu('headerMenuLocation', 'Header Menu Location'); 
    register_nav_menu('footerLocationOne', 'Footer Location One'); 
    register_nav_menu('footerLocationTwo', 'Footer Location Two'); 
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails'); 
    add_image_size('customLogo', 150, 150, true); 
    add_image_size('presenterLandscape', 400, 260, true); 
    add_image_size('presenterPortrait', 250, 350, true);
    add_image_size('eventThumbnail', 300, 300, true); 
    add_image_size('pageBanner', 1500, 400, array('middle','center' ));
   

}

add_action('after_setup_theme', 'widow_features');

function widow_adjust_queries($query){ 

    if(!is_admin() AND is_post_type_archive('conference') AND $query->is_main_query()){ 
      $query->set('orderby', 'title'); 
      $query->set('order','ASC'); 
      $query->set('posts_per_page', -1); 

    }
     if(!is_admin() AND is_post_type_archive('presenters') AND $query->is_main_query()){ 
      $query->set('orderby', 'title'); 
      $query->set('order','ASC'); 
      $query->set('posts_per_page', -1); 
      $query->set('meta_query', array(
            array(
            'key' => 'session', 
              'type' => 'text'
            )
        )); 

    }

    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){ 
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num'); 
        $query->set('order', 'ASC'); 
        $query->set('meta_query', array(
            array(
            'key' => 'start_event_date',  
              'compare' => '>=', 
              'value' => $today, 
              'type' => 'numeric'
            )
        )); 
      }

//Adjust Presenters Query 

      if(!is_admin() AND is_post_type_archive('conference') AND $query->is_main_query()){ 
        $query->set('orderby', 'meta_value_num'); 
        $query->set('order', 'ASC'); 
        $query->set('posts_per_page', -1); 
      }
}
add_action('pre_get_posts', 'widow_adjust_queries'); 

