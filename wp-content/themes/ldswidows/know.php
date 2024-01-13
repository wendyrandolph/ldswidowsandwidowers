<?php
/*
 * Template Name: know
 Template Post Type: conference

/* other PHP code here */



get_header();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
while (have_posts()) {
    the_post();
}

?>
<div class="page-banner">
    <?php $args = array(
        'subtitle' => get_field('page_banner_subtitle')
    );
    pageBanner($args); ?>

</div>



<div class="container page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>
        </p>
    </div>
    <?php

    // ***********************This is the Remarried Main Page **************************************************************
    if ($post->ID == '2741') { ?>
        <?php   get_template_part('template-parts/content', 'know'); ?>

    <?php  } 

    // ***********************This is the Idaho Main Page **************************************************************
    if ($post->ID == '2737') { ?>

        <?php get_template_part('template-parts/content', 'know'); ?>

    <?php  }
    // ***********************This is the San Antonio Main Page **************************************************************
    if ($post->ID == '3451') { ?>

        <?php get_template_part('template-parts/content', 'know'); ?>

    <?php }
    // ***********************This is the Arizona Main Page **************************************************************

    if ($post->ID == '3455') { ?>

        <?php get_template_part('template-parts/content', 'know'); 
                        
        get_template_part('template-parts/email', 'form'); ?>
    <?php }
  
  // ***********************This is the Salt Lake Main Page **************************************************************
    if ($post->ID == '2865') { 
     get_template_part('template-parts/content', 'know'); 
   
  } 
  // ***********************This is the Knoxville Main Page **************************************************************
    if ($post->ID == '2935') { 
     get_template_part('template-parts/content', 'know'); 
   
  } 
   // ***********************This is the Cache Valley Main Page **************************************************************
    if ($post->ID == '2731') { 
     get_template_part('template-parts/content', 'know'); 
   
  } 
     // ***********************This is the St. George Main Page **************************************************************
    if ($post->ID == '2984') { ?>
      <div class="grid-container">
       <div>
           <h5 class="heading1">Here's your need to know</h5>
           <?php conferenceDates(); ?>
           <br> <br> 
        <strong> This conference is using a separate website to share all their information. <br> <br></strong>
To register, see presenter information, and view the conference schedule, please visit: </strong> <br><br>
                     <a class="btn" style="background-color: #722F37;" href="https://southernutahww.wordpress.com/" target="__blank">St. George Conference </a> <br><br>  
         </div>

       <div class=" page-links">
           
       </div> <!-- End of Page-links Div -->
   </div>
         <?php }

    wp_reset_postdata();
    //This is the Idaho Schedule Page // 
    ?>

    <!-- End Presentation Section -->
</div>

<?php

get_footer();
unset($_SESSION['success']);
?>