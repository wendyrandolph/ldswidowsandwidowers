<?php //live site
/*
 * Template Name: idaho_presenters
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
<div class="page-links">
    <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
    <ul class="p-links">

        <?php
        //GET PARENT PAGE IF THERE IS ONE
        if ($post->post_parent) {
            $ancestors = get_post_ancestors($post->ID);
            $root = count($ancestors) - 1;
            $parent = $ancestors[$root];
        } else {
            $parent = $post->ID;
        }

        $args = array(
            'post_type' => 'conference',
            'child_of' => $parent,
            'parent' =>  $parent,
            'title_li' => '',
            //'post__not_in' =>  $grandPage,

        );

        $the_query = new WP_Query($args);

        //GET CHILD PAGES IF THERE ARE ANY
        $children = get_posts(array(
            'post_type' => 'conference',
            'child_of' => $parent,

        ));


        //DO WE HAVE SIBLINGS?
        $siblings =  get_pages(array(
            'child_of' => $parent,
            'post_type' => 'conference',

        ));
        if (count($children) != 0 and count($siblings) > 0) {
            wp_list_pages($args);
        }
        wp_reset_postdata(); ?>
    </ul>
</div> <!-- End of Page-links Div -->

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>


            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>

    </div>



    <?php

    if ($post->ID == '3455') { ?>

        <h5 class="heading1">Here's your need to know</h5>
        <div class="two-thirds">
            <?php conferenceDates();
            fyi();
            ?> </div>
    <?php  }
    if ($post->ID == '2739') { ?>
        <h5 class="heading1"> Keynote Speakers </h5>
        <?php //This is for the Remarried Presenters Page
        if ($post->ID == '2739') {    //grab the remarried conference presenters 
            $args = array(
                'post_type' => 'presenters',
                'category_name' => 'idaho-keynote',
                'order' => 'Desc',
                'orderby' => 'name'

            );

            $pre_2739 = new WP_Query($args);
        ?>


            <?php

            while ($pre_2739->have_posts()) {
                $pre_2739 ->the_post(); ?>
            <?php keynote();
            }

            wp_reset_postdata(); ?>
            <?php
            $args1 = array(
                'post_type' => 'presenters',
                'category_name' => 'idaho-workshop',
                'posts_per_page' => -1,
                'order' => 'Asc',
                'orderby' => 'name'

            );
            $workshopR = new WP_Query($args1);


            ?>

            <h5 class="heading1"> Workshop Presenters </h5>

            <?php while ($workshopR->have_posts()) { ?>

                <?php $workshopR->the_post();
                workshop();
                get_Class_Info_Idaho(); ?>
                <hr>

        <?php  }
        } ?>



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