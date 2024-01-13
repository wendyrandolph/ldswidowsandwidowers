<?php
get_header(); 
$conference = get_post_meta($post->ID, 'conference_to_speak_at_', true); 

?>

<div class="page-banner">
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php echo $conference ?> 
    </h1>
    <div class="page-banner__intro">
      <p>Get to know our presenters.</p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
   
  <?php
  while(have_posts()){ 
   the_post(); 
        ?>
<h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
  
    
<div class="row_1 row_lg">
 <div class="col"> <?php the_post_thumbnail(); ?>
  </div>
  <div class="col">
    <p class="mobile"><?php echo get_the_content(); ?></p>
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