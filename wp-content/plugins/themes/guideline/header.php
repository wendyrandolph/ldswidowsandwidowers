<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Guideline
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="pageholder" <?php if( get_theme_mod( 'guideline_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<?php if ( is_front_page() && !is_home() ) { ?>
	<?php $hideslide = get_theme_mod('guideline_hide_slider', '1'); ?>
		<?php if($hideslide == ''){ ?>
              <?php for($sld=5; $sld<8; $sld++) { ?>
                	<?php if( get_theme_mod('guideline_slider_page'.$sld)) { ?>
                	<?php $slidequery = new WP_query('page_id='.absint( get_theme_mod('guideline_slider_page'.$sld,true))); ?>
                	<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
                			$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
                			$img_arr[] = $image;
               				$id_arr[] = $post->ID;
                		endwhile; 
						wp_reset_postdata();
                	}
                }
                ?>
<?php if(!empty($id_arr)){ ?>
        <div id="slider" class="nivoSlider">
            <?php 
            $i=1;
            foreach($img_arr as $url){ ?>
            <?php if(!empty($url)){ ?>
            <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
            <?php }else{ ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/defaultslide.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
            <?php } ?>
            <?php $i++; }  ?>
        </div>   
<?php 
	$i=1;
		foreach($id_arr as $id){ 
		$title = get_the_title( $id ); 
		$post = get_post($id); 
		$content = esc_html( wp_trim_words( $post->post_content, 20, '' ) );
?>                 
<div id="slidecaption<?php echo esc_attr( $i ); ?>" class="nivo-html-caption">
    <div class="slide_info">
    	<h2><?php echo esc_html( $title ); ?></h2>
    	<p><?php echo esc_html( $content ); ?></p> 
        <a class="slidemore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','guideline'); ?></a>           
    </div>
</div>      
    <?php $i++; } ?>       
     </div><!--end .slider area-->    
<div class="clear"></div>        
<?php } ?>
<?php } } ?>

<div class="header <?php if( get_theme_mod( 'guideline_stickyheader' ) ) { ?>no-sticky<?php } ?> <?php if( !is_front_page() && !is_home() ){ ?>headerinner<?php } ?>">
        <div class="container">
            <div class="logo">
            			<?php guideline_the_custom_logo(); ?>
                        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                            <p><?php echo esc_html( $description ); ?></p>
                        <?php endif; ?> 
            </div><!-- logo -->
             <div class="hdrright">
             <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','guideline'); ?></a>
             </div><!-- toggle --> 
            
            <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div><!-- site-nav -->
            </div>
            <div class="clear"></div>
            
        </div><!-- container -->
  </div><!--.header -->

<?php if ( is_front_page() && ! is_home() ) { ?> 
 <?php
	$hidepgboxes = get_theme_mod('guideline_disabled_pgboxes', '1');
	if( $hidepgboxes == ''){
   ?>        
 <section id="paneltwo">
            	<div class="container">
                    <div class="wrap-4-cols">                                        
                     <?php for($p=1; $p<5; $p++) { ?>       
                        <?php if( get_theme_mod('guideline_page_column'.$p,false)) { ?>          
                            <?php $querymax = new WP_query('page_id='.absint(get_theme_mod('guideline_page_column'.$p,true)) ); ?>
                                    <?php while( $querymax->have_posts() ) : $querymax->the_post(); ?> 
                                    <div class="colsfour <?php if($p % 4 == 0) { echo "last_column"; } ?>">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="colscontent">
                                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                  
                                    <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '...' ) );  ?></p>   
                                    <a class="ReadMore" href="<?php the_permalink(); ?>">                                      
                                     <?php esc_html_e('Read More','guideline'); ?>
                                    </a> 
                                     </div>                                   
                                    </div>
                           <?php endwhile;
                                 wp_reset_postdata(); ?>                                    
                       		<?php }} ?>                                 
                    <div class="clear"></div>  
               </div><!-- wrap-4-cols-->
              <div class="clear"></div>
            </div><!-- .container -->
       </section>                
<?php } } ?>