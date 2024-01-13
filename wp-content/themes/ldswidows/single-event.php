<?php 
session_start(); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
get_header(); 
while(have_posts()) { 
    the_post(); ?>
      <div class="page-banner">
      <?php pageBanner(array( 
        'title'=> " "
      )); ?> 
    </div>

    <div class="container container--narrow page-section">
   <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id();
            ?>

            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>
    </div>
      
<div class="generic-content"> 
<div class="heading1"><?php the_title(); ?></div> 
<div class="row group"> 
<div class="one-third"> 
<?php the_post_thumbnail('eventThumbnail'); ?> 
</div> 
<div class="two-thirds"> 
<h6><?php 
            conferenceDates(); ?> </h6> 
<?php if(!get_field('address')){ ?> 
<h6><strong> Location address coming soon. </strong></h6> 
<?php }else{ ?> 
<h6><strong> Location : </strong><a href="<?php the_field('google_maps_link'); ?>" target="_blank"><?php the_field('address'); ?></a></h6> 
<?php } ?>
<h6><strong>Who this is for: </strong><p><?php the_field('who'); ?></p></h6>
<?php 
$related = get_field('related_conference');
$relatedConf = $related[0]; 
if(!get_field('related_conference')) { 
    echo " " ; } else { ?>

<h6 style="font-weight: 400; ">Related Conference: <a href="<?php the_permalink($relatedConf->ID);?>"> <?php 
echo $relatedConf->post_title; 

    } ?></a></h6>
</div> 

</div> 



  

</div>
</div> 
<?php } 
get_footer(); 
?> 