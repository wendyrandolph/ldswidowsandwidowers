<?php
get_header(); 

?>

<div class="page-banner">
    <?php pageBanner(array(
      'title'=> "Get To Know Our Presenters"
    )); ?>
</div>

<div class="container container--narrow page-section">

          <h5 class="heading1"> Get to know our presenters </h5>

<?php 
    $presenters = new WP_Query(array(
        'posts_per_page' =>-1,
        'post_type' => 'presenters',
        'post_parent' => 0, 
        'depth' => 1,
      
        )
      );
        
 
    while ($presenters->have_posts()) {
        $presenters->the_post();
    
    
    ?>



    
<div class="row group">
<h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
 <div class="one-third"><?php the_post_thumbnail('thumbnail'); ?>
  </div>
  <div class="two-thirds">
    <p> <?php
                                if (has_excerpt()) {
                                    the_excerpt();
                                } else {
                                    echo wp_trim_words(get_the_content(), 18);
                                } 
                                ?></p>
                                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Learn More </a></p>
  </div>
</div>
  <?php  
    }

  echo paginate_links(); 
  
    ?>

</div>
<?php
get_footer();

?>