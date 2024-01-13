<?php
session_start();
get_header();

?>



<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Conferences
        </h1>
        <div class="page-banner__intro">
            <p>A list of the regional conferences that are held.</p>
        </div>
    </div>
</div>



<div class="container container--narrow page-section">
  <div class="page-links">
    <?php      //Grab the parent Id to aide in the breadcrumb 
            $theParent = wp_get_post_parent_id(get_the_ID()); ?>
        <h5 class="page-links__title"><a href="<?php echo get_the_permalink() ?>">All Conferences</a></h5>

      
            
            <ul class=" min-list">

        
                    <?php

                    wp_list_pages(array(
                        'title_li' => Null,
                        'post_type' => 'conference',
                        'depth' => 1, 
                        

                    ));


                    ?>
                </div>
            </ul>
            <?php
            wp_reset_postdata();
            ?>
         <div class="page-content"> <p> 
Throughout each year, there are many conferences that are being held in various locations to help in navigating the journey we now find ourselves in. These conferences are put on by members of this widowed community. If you find that you’d like one in your neck of the woods, we encourage you to form a committee and put one on.
</p>  </div> 
    </div>
</div>
<?php
//echo paginate_links();


get_footer();

?>