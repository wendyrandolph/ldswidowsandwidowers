<?php
get_header();

?>
<div class="page-banner">
    <?php $args = array(
        'photo' => '/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp',  
        'title' => " 15th Annual Main Conference ",
        'subtitle' => "March 7th-9th, 2024 in Salt Lake City, Utah"
    );
    pageBanner($args); ?>

</div>
<div class="container">

    <div style="padding: 20px; ">
        <h5 class="heading1" style="margin-top: 100px;">List of Latter-day Saints Widows and Widowers Conferences</h5>

        <?php

        $today = date('Ymd');

        $conferences = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'conference',
            'post_parent' => 0,
            'depth' => 1,
            'meta_key' => 'event_start_date',
            'orderby' => 'meta_value_num',
            'order' => "ASC",
            'meta_query' => array(
                array(
                    'key' => 'event_start_date',
                    'compare' => '>',
                    'value' => $today,
                    'type' => 'numeric'
                )
            )
        ));


        while ($conferences->have_posts()) {
            $conferences->the_post();


        ?>



            <div class="row group t-center">

                <div class="one-third"><?php the_post_thumbnail('presenterLandscape'); ?>
                </div>
                <div class="two-thirds">
                    <h5 class="event-summary__title headline headline--tiny"><?php the_title(); ?></h5><br>
                    <?php
                    if ($post->ID == 2865) {  // Salt Lake 
                        conferenceDates();
                    }
                    if ($post->ID == 2935) { // Knoxville 

                        conferenceDates();
                    }
                    if ($post->ID == 2984) { // St. George
                        conferenceDates();
                    }
                    if ($post->ID == 2731) { // Cache Valley
                    ?>
                    <?php
                        conferenceDates();

                        //  conferenceDates(); 
                    }
                    if ($post->ID == 2741) { // Remarried 
                    ?>
                        <strong> **Not exact dates - still to be determined. </strong> <br>
                    <?php
                        conferenceDates();
                    }
                    if ($post->ID == 2737) {
                        conferenceDates();
                    }
                    if ($post->ID == 3451) { //San Antonio 
                    ?>
                        <strong> **Not exact dates - still to be determined. </strong> <br>
                    <?php conferenceDates();
                    }
                    if ($post->ID == 3455) { //Arizona  
                    ?>
                        <strong> **Not exact dates - still to be determined. </strong> <br>
                        <?php conferenceDates();
                        echo   "<br><br><strong> Friday's Church Location: </strong> <a href='https://maps.app.goo.gl/U4qJdbr2dEFqdJx56'> 2339 S. Crisman Rd., Mesa, AZ 85209 </a>";
                        $locationName = get_field('name_of_location'); ?><br><br>
                        <strong>Saturday's Church Location: </strong><strong><?php echo $locationName ?></strong>
                        <?php
                        $location = get_field('address');
                        $map = get_field('google_maps_link'); ?>
                        <a href="<?php echo $map; ?>" target="_blank"><?php echo $location ?></a>
                        <br><br>
                </div>
                <br>
            <?php } else {


            ?> <br>
                <br><?php
                        $locationName = get_field('name_of_location');
                        $location = get_field('address');
                        echo "<strong>" . $locationName . "</strong><br>";
                        echo "<strong> Location: </strong>" . $location;  ?>
                <br><br>
            </div>
        <?php }  ?>
        <br><br><br><br>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Learn More </a></p>
        <br><br>
        <hr>
        <?php
            wp_reset_postdata();
        ?>

    </div>
    
<?php } ?>

</div>

</div>

<?php echo paginate_links();


get_footer();

?>