<?php
/**
 *Guideline Theme Customizer
 *
 * @package Guideline
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function guideline_customize_register( $wp_customize ) {
	
	function guideline_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	function guideline_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';	
	
	//Site Layout Section
	$wp_customize->add_section('guideline_site_layout_sec',array(
		'title'	=> __('Site Layout','guideline'),			
		'priority'	=> 1,
	));	
	
	$wp_customize->add_setting('guideline_box_layout',array(
		'sanitize_callback' => 'guideline_sanitize_checkbox',
	));
	$wp_customize->add_control( 'guideline_box_layout', array(
	   'section'   => 'guideline_site_layout_sec',    	 
	   'label'	=> __('Check to Box Layout','guideline'),
	   'type'      => 'checkbox'
     )); 

	//Site Sticky Header
	$wp_customize->add_section('guideline_sticky_header_sec',array(
		'title'	=> __('Sticky Header','guideline'),			
		'priority'	=> 1,
	));

	$wp_customize->add_setting('guideline_stickyheader',array(
		'default' => true,
		'sanitize_callback' => 'guideline_sanitize_checkbox',
	));
	$wp_customize->add_control( 'guideline_stickyheader', array(
	   'section'   => 'guideline_sticky_header_sec',    	 
	   'label'	=> __('Check to disable sticky header','guideline'),
	   'type'      => 'checkbox'
     ));
	
	$wp_customize->add_setting('guideline_color_scheme',array(
		'default'	=> '#f98700',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'guideline_color_scheme',array(
		'label' => __('Color Scheme','guideline'),
		'description'	=> __('More color options in PRO Version','guideline'),
		'section' => 'colors',
		'settings' => 'guideline_color_scheme'
	)));	
	
	// Slider Section		
	$wp_customize->add_section( 'guideline_header_slider', array(
        'title' => __('Header Slider', 'guideline'),
        'priority' => null,
        'description'	=> __('Reccomded Featured Image Size( 1400x600 )','guideline'),		
     ));	
	
	$wp_customize->add_setting('guideline_slider_page5',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('guideline_slider_page5',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide one:','guideline'),
		'section'	=> 'guideline_header_slider'
	));	
	
	$wp_customize->add_setting('guideline_slider_page6',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('guideline_slider_page6',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide two:','guideline'),
		'section'	=> 'guideline_header_slider'
	));	
	
	$wp_customize->add_setting('guideline_slider_page67',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));	
	$wp_customize->add_control('guideline_slider_page67',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide three:','guideline'),
		'section'	=> 'guideline_header_slider'
	));
	
	$wp_customize->add_setting('guideline_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'guideline_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'guideline_hide_slider', array(
	   'settings' => 'guideline_hide_slider',
	   'section'   => 'guideline_header_slider',
	   'label'     => __('Uncheck To Enable This Section','guideline'),
	   'type'      => 'checkbox'
	 ));	 
	 
	// Four Services Boxes Section 	
	$wp_customize->add_section('guideline_section_second', array(
		'title'	=> __('Services Section','guideline'),
		'description'	=> __('Select Pages from the dropdown for services section','guideline'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('guideline_page_column1',	array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	)); 
	$wp_customize->add_control(	'guideline_page_column1',array('type' => 'dropdown-pages',			
		'section' => 'guideline_section_second',
	));		
	
	$wp_customize->add_setting('guideline_page_column2',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'guideline_page_column2',array(
		'type' => 'dropdown-pages',			
		'section' => 'guideline_section_second',
	));
	
	$wp_customize->add_setting('guideline_page_column3',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'guideline_page_column3',array(
		'type' => 'dropdown-pages',			
		'section' => 'guideline_section_second',
	));
	
	$wp_customize->add_setting('guideline_page_column3',array(
		'default'	=> '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'guideline_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'guideline_page_column3',array(
		'type' => 'dropdown-pages',			
		'section' => 'guideline_section_second',
	));
	
	$wp_customize->add_setting('guideline_disabled_pgboxes',array(
		'default' => true,
		'sanitize_callback' => 'guideline_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	
	$wp_customize->add_control( 'guideline_disabled_pgboxes', array(
	   'settings' => 'guideline_disabled_pgboxes',
	   'section'   => 'guideline_section_second',
	   'label'     => __('Uncheck To Enable This Section','guideline'),
	   'type'      => 'checkbox'
	 ));
}
add_action( 'customize_register', 'guideline_customize_register' );

function guideline_custom_css(){ ?>
	<style type="text/css">
		a, .blog_lists h2 a:hover,
		#sidebar ul li a:hover,
		.blog_lists h3 a:hover,
		.ftr-4-box ul li a:hover, .ftr-4-box ul li.current_page_item a,
		.recent-post h6:hover,
		.colsfour:hover h3,
		.footer-icons a:hover,
		 .sitenav ul li a:hover, 
		.sitenav ul li.current-menu-item a,
			.sitenav ul li.current-menu-parent a.parent,
			.sitenav ul li.current-menu-item ul.sub-menu li a:hover
		.postmeta a:hover
		{ color:<?php echo esc_html( get_theme_mod('guideline_color_scheme','#f98700')); ?>;}
		 
		
		.pagination ul li .current, .pagination ul li a:hover, 
		#commentform input#submit:hover,
		.nivo-controlNav a.active,
		.ReadMore:hover,
		.appbutton:hover,
		.slidemore,
		.slide_info .slide_more,
		#sidebar .search-form input.search-submit,
		.wpcf7 input[type='submit']
		{ background-color:<?php echo esc_html( get_theme_mod('guideline_color_scheme','#f98700')); ?>;}
		.footer-icons a:hover
		{ border-color:<?php echo esc_html( get_theme_mod('guideline_color_scheme','#f98700')); ?>;}
	</style>
<?php }

add_action('wp_head','guideline_custom_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function guideline_customize_preview_js() {
	wp_enqueue_script( 'guideline_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20161125', true );
}
add_action( 'customize_preview_init', 'guideline_customize_preview_js' );