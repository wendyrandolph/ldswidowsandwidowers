    <?php 
    //Grab the parent Id to aide in the brcrumb 
            $theParent1 = wp_get_post_parent_id(); ?>
    
    <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
        <ul class="p-links">

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
                'post_type' => 'conference',
                'child_of' => $parent,
                'parent' =>  $parent,
                'title_li' => '',
                //'post__not_in' =>  $grandPage,

            );

            $the_query = new WP_Query($args);

            //GET CHILD PAGES IF THERE ARE ANY
            $children = get_posts(array(
                'post_type' => 'conference',
                'child_of' => $parent,

            ));


            //DO WE HAVE SIBLINGS?
            $siblings =  get_pages(array(
                'child_of' => $parent,
                'post_type' => 'conference',

            ));

            if (count($children) != 0 and count($siblings) > 0) {
                wp_list_pages($args);
            }




            ?>
        </ul>