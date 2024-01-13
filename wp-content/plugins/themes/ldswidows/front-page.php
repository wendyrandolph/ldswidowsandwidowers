
<?php
get_header();
?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large">Welcome!</h1>
    <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
    <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
    <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
  </div>
</div>

<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Upcoming Conferences</h2>

      <?php
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        //'posts_per_page' => -1,
        'post_type' => 'event',
       // 'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => "ASC",
        'meta_query' => array(
        )
      ));
    
      while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month"><?php
            the_field('event_date'); 
                                                $eventDate = new DateTime(get_field('event_start_date'));
echo $eventDate->format('M');
                                                ?></span>
            <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
          </a>
          <div class="event-summary__content">
       <h5 class="event-summary__title headline headline--tiny"><a href="<?php 
        $conference =  get_field('related_conference'); 
                $confID = $conference[0]->ID;
      echo get_the_permalink($confID); ?>"><?php the_title(); ?></a></h5>
          <p> <?php
                the_content(); 
                echo get_field('address');                                                 
               

                ?></p>
          </div>
        </div>
      <?php } ?>



      <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>
    </div>
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Helpful Resources</h2>
      <?php
      $homepagePosts = new WP_Query(array(
        'posts_per_page' => 2
      ));

      while ($homepagePosts->have_posts()) {
        $homepagePosts->the_post(); ?>
        <div class="event-summary">
          
          <div class="event-summary__content">
           <h5 class="event-summary__title headline headline--tiny"><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php
                if (has_excerpt()) {
                  the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                }
                ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
          </div>
        </div>
      <?php }
      wp_reset_postdata(); ?>

      <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
    </div>
  </div>
</div>




<?php
get_footer();

?>