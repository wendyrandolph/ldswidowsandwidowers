<?php 
get_header(); 
 ?>
<div class="page-banner"> 
<?php 

pageBanner(array( 
  'title' => "", 
  'subtitle' => "", 
)); ?> 
</div> 


<div class="container container--narrow page-section">
   
    <h5 class="heading1">Upcoming Events</h5>
 <?php 
     $events = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'event',
       
        
    ));
  
    while ($events->have_posts()) {
        $events->the_post();
      
     ?>
 <div class="full-width-split group">
  <div class="full-width-split__one">
    
    <div class="event-summary">

            <a class="event-summary__date t-center" href="<?php the_permalink();?>">
              <span class="event-summary__month"><?php 
            $eventDate = new DateTime(get_field('event_start_date')); 
            echo $eventDate -> format('M');
             
            ?></span>
              <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
              <p> <?php echo wp_trim_words(get_the_content(), 18); ?><a href="<?php the_permalink();?>" class="nu gray">Learn more</a></p>
            </div>
         </div>
</div></div>

   <?php  }
   echo paginate_links(); ?>
   
   <hr class="section-break" > 
 <p> Looking for a recap of past events? <a href="<?php echo site_url('/past-events')?>"> Check out our past events archive </a>.</p>
</div> 
<?php 
get_footer(); 

?> 