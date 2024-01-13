<?php
session_start();
get_header();


?>
<div class="page-banner">
    <?php pageBanner(array(
        'title' => " ",
    )); ?>
</div>

<div class="container container--narrow page-section">
<div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id();
      ?>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('keynote'); ?>">All Recordings</a> <span class="metabox__main"><?php echo the_title(); ?> </span>
    </p>
 

 
    </div> <!-- End of Page-links Div -->

  
    <h5 class="heading1">Recordings from 2023</h5>
 
  <?php          
     $y = get_field('presenter_bio');

      $bio = $y[0];
      $id = $bio->ID;
      $title = $bio->post_title;
       $post_content = $y[0]->post_content; 
      $bio2 = $y[1];
      $bio2Id = $y[1]->ID;
$thumbnail =  get_the_post_thumbnail($bio, 'presenterPortrait');
    ?>
  <div class='row'>
      <div class="col col-lg-12 col-sm-6">
        <div class="card">

          <div class="card-img" alt="Card image cap">

            <?php echo $thumbnail ?>
          </div>

          <div class="card-body">


            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"> <?php

                               echo $post_content ?> </p>
           <?php recording_1 ();
                    recording_2 (); 
                    recording_3 ();
                     recording_4 ();
                     recording_5 ();
                     recording_6 ();
                     recording_7 ();
                     recording_8 ();
                  if ($bio2) { ?>

                  <?php
                  }
                  ?>
          </div>
        </div>
      </div>
   
</div> 


</div>

<?php get_footer(); ?>