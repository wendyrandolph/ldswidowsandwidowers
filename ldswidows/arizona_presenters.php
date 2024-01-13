<?php //live site
/*
 * Template Name: az_presenters
 Template Post Type: conference

/* other PHP code here */
session_start();

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
    pageBanner($args);

    //Grab the parent Id to aide in the brcrumb 
    $theParent1 = wp_get_post_parent_id();
    ?>

</div>


<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>


            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>

    </div>
<div class="grid-container"> 
<div> 


    <?php

    
    if ($post->ID == '3457') { ?>
        <h5 class="heading1"> Keynote Speakers </h5>
        <?php //This is for the Remarried Presenters Page
        if ($post->ID == '3457') {    //grab the remarried conference presenters 
            $args = array(
                'post_type' => 'presenters',
                'category_name' => 'arizona-keynote',
                'order' => 'Asc',
                'orderby' => 'name'

            );

            $pre_3457 = new WP_Query($args);
        ?>


            <?php

            while ($pre_3457->have_posts()) {
                $pre_3457 ->the_post(); ?>
            <?php keynote();
            }

            wp_reset_postdata(); ?>
            
    
            <?php
            $args1 = array(
                'post_type' => 'presenters',
                'category_name' => 'arizona-workshop',
                'posts_per_page' => -1,
                'order' => 'Asc',
                'orderby' => 'name'

            );
            $workshopAz = new WP_Query($args1);


            ?>
<div>
            <h5 class="heading1"> Workshop Presenters </h5>

            <?php while ($workshopAz->have_posts()) { ?>

                <?php $workshopAz->the_post();
                workshop();
                get_Class_Info_Arizona(); ?>
                <hr>

        <?php  }
        } ?>
</div> 
     </div> 
        <div class="page-links">
   <?php
       wp_reset_postdata(); 
       get_template_part('template-parts/content', 'pagelinks'); ?>
</div> <!-- End of Page-links Div -->

        <?php
        wp_reset_postdata();
        //This is the Idaho Schedule Page // 
        ?>

        <!-- End Presentation Section -->

 <?php  } ?>
  </div>      

</div>
</div>
<?php get_footer(); ?>