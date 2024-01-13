<?php
session_start();
$_SESSION['loggedin'];
get_header();
if (!$_SESSION['loggedin']) {
  header('location: /account/login');
} else {
?>
  <div class="page-banner">
    <?php pageBanner(array(
      'title' => "Conference Recordings"
    )); ?>
  </div>



  <div class="container container--narrow page-section">

    <div class="row">
      <h5 class="heading1">Recordings from 2023</h5>
    </div>
    <?php
    $conferenceRec = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'keynote',
      'category' => 'salt-lake-city-2023-recording',
      'orderby' => 'post_title',
      'order' => "ASC",
    ));      
   

    while ($conferenceRec->have_posts()) {
      $conferenceRec->the_post();
      $y = get_field('presenter_bio');

      $bio = $y[0];
      $id = $bio->ID;
      $title = $bio->post_title;
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

                                    if (has_excerpt()) {
                                      the_excerpt();
                                    } else {
                                      echo wp_trim_words(get_the_content(), 18);
                                    } ?> </p>
              <?php recording_1 ();
                    recording_2 (); 
                    recording_3 ();
                     recording_4 ();
                     recording_5 ();
                     recording_6 ();
                     recording_7 ();
                     recording_8 ();?>
               
                

                  <?php      if (!$bio) { ?>
                            <!--<a class="btn btn--blue" href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>-->
                          <?php } else { ?>
                            <a class="btn btn--small btn--dark-orange" href="<?php the_permalink(); ?>" class="nu gray">Learn More About <?php the_title(); ?></a><br>
                          <?php }


                        if ($bio2) { 
                        }
                          ?>



            </div>
                      
          </div>  
        </div>

      </div><?php
                      } ?>
  </div>
  <hr>


<?php

  get_footer();
 }
   
   ?>