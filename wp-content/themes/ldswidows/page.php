<?php
get_header();
?>
<div class="page-banner">
  <?php pageBanner(array(
    'title' => ' ',
  )); ?>
</div>

<div class="container container--narrow page-section">
 <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id();
if (!is_page('resources') AND !is_page('about-us') AND !is_page('privacy-policy')) { ?> 


    <div class="page-links">
      <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
      <ul style="list-style: none">
      <?php
      //GET PARENT PAGE IF THERE IS ONE
      if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $root = count($ancestors) - 1;
        $parent = $ancestors[$root];
      } else {
        $parent = $post->ID;
      }

      $args = array(
        'post_type' => 'page',
        'child_of' => $parent,
        'parent' =>  $parent,
        'title_li' => '',
        //'post__not_in' =>  $grandPage,

      );

      $the_query = new WP_Query($args);

      //GET CHILD PAGES IF THERE ARE ANY
      $children = get_posts(array(
        'post_type' => 'page',
        'child_of' => $parent,

      ));


      //DO WE HAVE SIBLINGS?
      $siblings =  get_pages(array(
        'child_of' => $parent,
        'post_type' => 'page',

      ));

      if (count($children) != 0 and count($siblings) > 0) {
        wp_list_pages($args);
      }
  ?>

      </ul>
    </div> <!-- End of Page-links Div -->
<? } ?>
<?php
if(!is_page('about-us')){ ?>
    <h5 class="heading1"><?php the_title(); ?></h5>
  <?php 
  }  if (is_page('about-us')){ ?>
      <h5 class="heading1">Mission Statement</h5>
 <?php }

 $desc = get_field('resource_desc');
    if ($desc) {
      echo $desc;
    } ?>

    <?php
    wp_reset_postdata();
    ?>
    <hr> <?php
          if ($post->ID === 3000) {
            $conferences = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'page',
              'post_parent' => '3000',
              'depth' => 1,
              'orderby' => 'name',
              'order' => 'ASC'

            ));
            while ($conferences->have_posts()) {
              $conferences->the_post();


          ?>

        <div class="row group">

          <div class="one-third"><?php the_post_thumbnail('eventThumbnail'); ?>
          </div>
          <div class="two-thirds">
            <h5 class="event-summary__title headline headline--tiny"><?php the_title(); ?></h5><br>
            <div> <?php $desc = get_field('resource_desc');
                  if ($desc) {
                    echo '<p style="text-align: left;">'  . $desc . '</p>';
                  } ?> </div>
            <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Learn More </a></p>
          </div>
        </div>
        <hr>


    <?php }
          }

    ?>



    <div class="generic-content">
     
      <?php
      the_content(); ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>




</div>
<?php
get_footer();
?>