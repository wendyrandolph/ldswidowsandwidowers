<?php
get_header();
?>

<div class="page-banner">
<?php pageBanner(); ?>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Upcoming Conferences</h2>


      <?php
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'event',
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value_num',
        'order' => "ASC",
        'meta_query' => array(
          array(
            'key' => 'event_start_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));
      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post();
        get_template_part('template-parts/content', 'event');
      } ?>



   <!--   <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>
   --> </div>
 
               
              
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
     <h2 class="heading1">Open Conference Registrations</h2>
       <!--<p class="t-left no-margin"> Food orders have already been placed, if you register for this conference, there is not a guarantee for food.</p><br> -->
    <!-- <a class="btn" style="background-color: #20b2aa; filter: drop-shadow(0px 3px 5px #000000);" href="/conferences/remarried-conference/remarried-registration">Remarried Registration</a><br><br> -->
    <!-- <p class="t-center no-margin"> <a class="btn btn--blue" href="/conferences/idaho-regional-conference/idaho-registration">Idaho Registration</a>-->
        
        <!-- <a href="conferences/arizona-regional/arizona-registration/">Arizona Registration</a><br><br> -->
       <!-- <a  href="conferences/san-antonio-conference/san-antonio-registration/">San Antonio Registration</a>  -->
        <br><br>
        <p class="t-left no-margin"> **Please note, first time users will need to create an account on the site. 
       Once you have created an account, log in with the username and password you set up, you'll see the link to register on the profile page. </p>
      <br><br>
     
       <h5 class="heading1"> First time users create an account here.</h5>
        <a href="/account/create-account">Create Account</a> <br><br>
     <hr> 
      
     <h2 class="headline headline--small-plus t-center no-margin">Some of our Miracles</h2>

     <p class="t-center no-margin"> <iframe style="margin: 0 auto" width="250" height="300" src="https://www.youtube.com/embed/rcARot3c9Ag" title="YouTube video player" frameborder="5" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></p>
    </div>
  </div>
</div>




<?php
get_footer();

?>