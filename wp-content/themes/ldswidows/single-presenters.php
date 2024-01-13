<?php
get_header();

?>

<div class="page-banner">
  <?php pageBanner(array(
    'title' => "Get to know our presenter",

  )) ?>
</div>
<div class="container container--narrow page-section">

  <?php

   
  $conferencePresenters = new WP_Query(array(
    'posts_per_page' => -1,
    'post_type' => 'presenter',
    'orderby' => 'post_title',
    'order' => "ASC",
    'meta_query' => array(
      array(
        'key' => 'related_conference',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"'
      )
    )
  ));
  
   $related = get_field('related_event');
   $relatedConf = $related[0];
   $sDate = $relatedConf->event_start_date; 
   $eDate = $relatedConf->event_end_date; 

    workshop(); ?>
    <strong> Presenting at <a href="<?php the_permalink($relatedConf->ID); ?>"> <?php
                                                                            echo $relatedConf->post_title . " Conference";
                                                                            ?></a> <strong>| <?php foreach ((get_the_category()) as $category) {
                                                                                      echo $category->cat_name . ' ';
                                                                                    } ?> </h5> <br>

    <?php 
    conferenceD($sDate, $eDate); 
    get_Class_Info_SA();
    get_Class_Info_Arizona();
      ?>
</div>

<?php
   
  $y = get_field('recording');
  $id =  $y[0]->ID;
  $title =  $y[0]->post_title;
?>
<a href="<?php echo get_the_permalink($id); ?>"> <?php echo  $title; ?></a>
</div>
</div>
<?php

get_footer();
?>