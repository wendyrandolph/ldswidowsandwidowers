<?php
get_header();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');

?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title(); ?></h1>
    <div class="page-banner__intro">
      <p>Don't forget to replace me later.</p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id();
      ?>

      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

    </p>
  </div>

  <div class="page-links">
    <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
    <ul style="list-style: none">

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

      //GET CHILD PAGErgb(61, 79, 95)ERE ARE ANY
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
      } ?>

    </ul>
  </div> <!-- End of Page-links Div -->

  <?php
  if ($post->ID === 2743) {
    //This is for the Remarried Wid Con 
  ?>
   
    <?php    //grab the remarried conference presenters 
    $args = array(
      'post_type' => 'presenters',
      'category_name' => 'remarried-conf-key',
      'order' => 'Asc',
      'orderby' => 'name'

    );

    $pre_2743 = new WP_Query($args);
    


  
    ?>
    <div class="page-content">
 
      <?php //Begin the display loop :  

      while ($pre_2743->have_posts()) { ?>

        <?php $pre_2743->the_post();
        ?>
        <h5 class="heading1"> Keynote Speakers </h5>
        <div class="presentation">
          <h4><?php the_title(); ?> </h4>
          <p><?php the_content(); ?> </p>

          <?php
          //get custom fields for class information: 
          $presenter_type = get_field('presenter_type');
          if ($presenter_type === 'Keynote') {
            $title = get_field('title_');
            $day = get_field('which_day');
            $time = get_field('keynote_time');
            $desc = get_field('keynote_description');

            $partner = get_field('teaching_with_someone_else');
            $post_title = $partner[0];

          ?>

            <!-- <div class="classDetails" style="background-color:Wheat; "> -->


            <div class="classDetails">
              <?php if ($title) { ?>
                <h5> <?php echo $title ?></h5>
              <?php }
              if ($desc) { ?>
                <p><strong> Description: </strong> <?php echo $desc;
                                                  } ?></p>
                <li style="list-style: none;">
                  <h6><span><strong><?php echo  $day; ?></span><span> <?php echo $time; ?></strong></span></h6>

                </li>
                <?php if ($partner) { ?>
                  <li style="list-style: none;"> Team Teaching with - <?php echo $post_title->post_title  ?> </li>
                <?php } ?>





            </div>
        </div>

        <hr>
    <?php
          } // End the Keynote class details 
        } // End Keynote loop 
    ?>
    </div>
    <div class="page-content">
      <h5 class="heading1"> Workshop Presenters </h5>
      <?php
      $args1 = array(
        'post_type' => 'presenters',
        'category_name' => 'remarried-conf-work',
        'posts_per_page' => -1

      );
      $workshopR = new WP_Query($args1);

      ?>


      <?php
      while ($workshopR->have_posts()) {
        $workshopR->the_post();
      ?>
        <div class="presentation">
       
          <h4> <?php the_title(); ?> </h4>
          <p><?php the_content(); ?> </p>
          
            <?php

            get_Class_Info();

            ?>
          </div>
          </div> <!-- // End the test div which should color each workshop --> 


        <?php  } // End of the Workshop Loop 
        ?>
        </div> <!-- End Presentation Section -->
    </div> <!-- End of the Page-Content Div -->
  <?php  } //End Remarried Section 


  if ($post->ID === 2739) {
    //This is for the Remarried Wid Con 
  ?>
    
    <?php    //grab the remarried conference presenters 
    $args = array(
      'post_type' => 'presenters',
      'category_name' => 'idaho-keynote',
      'order' => 'Asc',
      'orderby' => 'name'

    );

    $pre_2739 = new WP_Query($args);
    ?>
    <div class="page-content">

      <?php //Begin the display loop :  

      while ($pre_2739->have_posts()) { ?>

        <?php $pre_2739->the_post();
        ?>
        <h5 class="heading1"> Keynote Speakers </h5>
        <div class="presentation">
          <h4><?php the_title(); ?> </h4>
          <p><?php the_content(); ?> </p>

          <?php
          //get custom fields for class information: 
          $presenter_type = get_field('presenter_type');
          if ($presenter_type === 'Keynote') {
            $title = get_field('title_');
            $day = get_field('which_day');
            $time = get_field('keynote_time');
            $desc = get_field('keynote_description');

            $partner = get_field('teaching_with_someone_else');
            $post_title = $partner[0];

          ?>

            <!-- <div class="classDetails" style="background-color:Wheat; "> -->


            <div class="classDetails">
              <?php if ($title) { ?>
                <h5> <?php echo $title ?></h5>
              <?php }
              if ($desc) { ?>
                <p><strong> Description: </strong> <?php echo $desc;
                                                  } ?></p>
                <li style="list-style: none;">
                  <h6><span><strong><?php echo  $day; ?></span><span> <?php echo $time; ?></strong></span></h6>

                </li>
                <?php if ($partner) { ?>
                  <li style="list-style: none;"> Team Teaching with - <?php echo $post_title->post_title  ?> </li>
                <?php } ?>





            </div>
        </div>

        <hr>
    <?php
          } // End the Keynote class details 
        } // End Keynote loop 
    ?>
    </div>
    <div class="page-content">
      <h5 class="heading1"> Workshop Presenters </h5>
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


      <?php
      while ($workshopR->have_posts()) {
        $workshopR->the_post();
      ?>
        <div class="presentation">
       
          <h4> <?php the_title(); ?> </h4>
          <p><?php the_content(); ?> </p>
          
            <?php

            get_Class_Info();

            ?>
          </div>
          </div> <!-- // End the test div which should color each workshop --> 


        <?php  } // End of the Workshop Loop 
        ?>
        </div> <!-- End Presentation Section -->
    </div> <!-- End of the Page-Content Div -->
  <?php } //End Idaho Section 
  ?>


</div>
<?php
wp_reset_postdata();
get_footer();
?>