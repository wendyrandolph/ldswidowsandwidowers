<?php
get_header();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
while (have_posts()) {
    the_post();
}

?>
 
<div class="page-banner">
    <?php $args = array(
        'subtitle' => get_field('page_banner_subtitle')
    );
    pageBanner($args); ?>
</div>
 <?php
            //Grab the parent Id to aide in the brcrumb 
            $theParent1 = wp_get_post_parent_id();
            ?>


<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
           
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>

    </div>
 <div class="grid-container">
        <div>

    <?php

    if ($post->ID == '2867') {

        //This is for the Salt Lake Wid Con 
    
    }
     
    wp_reset_postdata();
    if ($post->ID == '2868') { ?>

        <p class="t-center success"> There is currently not an open registration for this conference. </p>
    <?php }
    if ($post->ID == '2954') { ?>
        <p class="t-center success"> As the time gets closer for this conference, schedule information will be posted here. </p>

    <?php }
    if ($post->ID == '2869') { ?>
        <h5 class="heading1"> Classes By Workshop </h5>
        <div class="full-width-split">
            <div class="full-width-split__one">
                <?php conferenceDates();
                // workshop1(); 
                //print_r($myposts1);     
                $workshop1_time = "11:00 AM";
                $workshop2_time = "12:00 PM";
                $workshop3_time = "2:30 PM";
                $workshop4_time = "3:30 PM";
                $workshop5_time = "11:00 AM";
                $workshop6_time = "12:00 PM";
                $workshop7_time = "2:30 PM";
                $workshop8_time = "3:30 PM";


                $args1 = array(
                    'post_type' => 'presenters',
                    'offset' => 0,
                    'category' => array(24),
                    'title_li' => '',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1
                );


                $myposts1 = get_posts($args1);

                ?>
                <div class="list">
                    <!-- Workshop 1 -->
                    <h6 class="workshopHeader"> Workshop 1 - <? echo $workshop1_time; ?> </h6>
                    <div class="workshop1">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop1();
                                endforeach; ?>
                        </table>
                    </div>


                    <!-- Workshop 2 -->
                    <h6 class="workshopHeader"> Workshop 2 - <? echo $workshop2_time; ?> </h6>
                    <div class="workshop2">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop2();
                                endforeach; ?>
                        </table>
                    </div>

                    <!-- Workshop 3 -->
                    <h6 class="workshopHeader"> Workshop 3 - <? echo $workshop3_time; ?> </h6>
                    <div class="workshop3">
                        <table style="bottom-border: 1px solid"> <?php
                                                                    foreach ($myposts1 as $post) : setup_postdata($post);
                                                                        workshop3();
                                                                    endforeach; ?>
                        </table>
                    </div>
                    <!-- Workshop 4 -->
                    <h6 class="workshopHeader"> Workshop 4 - <? echo $workshop4_time; ?> </h6>
                    <div class="workshop4">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop4();
                                endforeach; ?>
                        </table>
                    </div>
                    <!-- Workshop 5-->
                    <h6 class="workshopHeader"> Workshop 5 - <? echo $workshop5_time; ?> </h6>
                    <div class="workshop5">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop5();
                                endforeach; ?>
                        </table>
                    </div>
                    <!-- Workshop 6-->
                    <h6 class="workshopHeader"> Workshop 6 - <? echo $workshop6_time; ?> </h6>
                    <div class="workshop6">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop6();
                                endforeach; ?>
                        </table>
                    </div>

                    <!-- Workshop 7-->
                    <h6 class="workshopHeader"> Workshop 7 - <? echo $workshop7_time; ?> </h6>
                    <div class="workshop7 ">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop7();
                                endforeach; ?>
                        </table>
                    </div>

                    <!-- Workshop 8-->

                    <h6 class="workshopHeader"> Workshop 8 - <? echo $workshop8_time; ?> </h6>
                    <div class="workshop8">
                        <table> <?php
                                foreach ($myposts1 as $post) : setup_postdata($post);
                                    workshop8();
                                endforeach; ?>
                        </table>
                    </div>
                </div>
            <?php
        } // End of the Workshop Loop 
        //End Salt Lake Conference
        //IDAHO WORKSHOPS ************************************************************************* 
        //*****************************************************************************************
       ?>
      </div> 
      
     <div class="page-links">
    <?php get_template_part('template-parts/content', 'pagelinks'); ?> 
         </div>
           
</div> 
</div> 

<?php
get_footer();
?>