<?php
/*
 * Template Name: Subgroups
 */

/* other PHP code here */
session_start();


// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    $_SESSION['loggedin'] = false;
    $_SESSION['loggedOut'] = "You have been logged out.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp
get_header(); ?>

<div class="page-banner">
    <?php pageBanner(array(
        'title' => " "
    )); ?>
</div>

<div class="container container--narrow page-section">
 <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id();
            ?>

            <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent1); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>
    </div>

            <?php
            if (isset($_SESSION['loggedOut'])) {
                echo  $_SESSION['loggedOut'];
            } ?>   
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
                'child_of' => $parent1,

            ));


            //DO WE HAVE SIBLINGS?
            $siblings =  get_pages(array(
                'child_of' => $parent,
                'post_type' => 'page',

            ));

            if (count($children) != 0 and count($siblings) > 0) {
                wp_list_pages($args);
            } ?>
        </ul>
        </div> 
<h5 class="heading1"> Facebook Subgroups</h5>
  <p class="display"> Here is a list of subgroups within the main Latter-day Saint Widows & Widowers group on Facebook, if you aren't a member of a group you are interested in, you might be asked to join, and may have screening questions to answer to qualify for that specific group: </p>

            <div class="one-half">
           
                    <header class="question">
                        Age Groups:
                    </header>
                    <a class="nav-link" href="https://www.facebook.com/groups/10584702289" target="_blank"> LDS Young Widows & Widowers </a>
                    <a class="nav-link" href="https://www.facebook.com/groups/117782395012346/" target="_blank"> LDS Widows & Widowers 50+ </a>

                        <header class="question">
                            Service Opportunities:
                        </header>

                        <a class="nav-link" href="https://www.facebook.com/groups/435642599907555/" target="_blank"> W/W Special Fasting and Prayers</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/963484867868644" target="_blank">the widows MIGHT</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/510154419494724" target="_blank">LDS Widows & Widowers-Sharing Group</a>

                        <header class="question">
                            Dating and Remarried:
                        </header>
                        <a class="nav-link" href="https://www.facebook.com/groups/772844036104596/" target="_blank"> LDS W/W Dating</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/244527592320816/" target="_blank"> LDS Remarried Widows & Widowers</a>
                        <header class="question">
                            Charities - Not on Facebook
                        </header>
                        <a class="nav-link" href="https://www.ministeringangels.org" target="_blank"> WW Ministering Angels</a>
                         <header class="question">
                          Regional Other Country Groups:
                        </header>
                        <a class="nav-link" href="https://www.facebook.com/groups/257854340984436/" target="_blank"> LDS Widows & Widowers - UK</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/377485409288632/ " target="_blank"> LDS Widows & Widowers - Phillipines</a>
                          <header class="question">
                            Activity Groups:
                        </header>
                        <a class="nav-link" href="https://www.facebook.com/groups/youngandwidowed/" target="_blank"> Young & Widowed Activities</a>

                        <a class="nav-link" href="https://www.facebook.com/groups/1031654334030571" target="_blank"> LDS Widows & Widowers Pickleball Events </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/2769952796481754" target="_blank"> Widows & Widowers Dancing Group </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/184574052284129" target="_blank"> Good Grief - The Lighter Side of Widowdom </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/569828349865763" target="_blank"> LDS Widows & Widowers-Events Group </a>

                
             

                       
                         <header class="question">
                            Regional USA State Groups:
                        </header>
                        
                        <a class="nav-link" href="https://www.facebook.com/groups/498565420207472/" target="_blank"> LDS Widows & Widowers - Northern California </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/284242661688301/" target="_blank"> LDS Widows & Widowers - Southern California </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/919199819253042" target="_blank"> LDS Widows & Widowers - Oregon </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/109949442357759/" target="_blank"> LDS Widows & Widowers - Pacific Northwest</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/494960850651195/  " target="_blank"> LDS Widows & Widowers - Las Vegas Area </a>
                        
                        <a class="nav-link" href="https://www.facebook.com/groups/439847442886157/ " target="_blank"> LDS Widows & Widowers - Idaho </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/SEIdahoLDSWW/  " target="_blank"> LDS Widows & Widowers - Southeastern Idaho </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/131468423537089/" target="_blank"> LDS Widows & Widowers – Southern Utah Region</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/ldswwofutcounty/" target="_blank"> LDS Widows & Widowers – Utah County</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/214198419118854/" target="_blank"> LDS Widows & Widowers - Cache Valley Area </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/169118736271/" target="_blank"> LDS Widows & Widowers - Arizona</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/140358840039256/  " target="_blank"> LDS Widows & Widowers - Colorado </a>
                        
                        <a class="nav-link" href="https://www.facebook.com/groups/txldsww/" target="_blank"> LDS Widows & Widowers - Texas</a>
                        <a class="nav-link" href="https://www.facebook.com/groups/295561450859584/    " target="_blank"> LDS Widows & Widowers - South Eastern States </a>

                        <a class="nav-link" href="https://www.facebook.com/groups/123624201625270/   " target="_blank"> LDS Widows & Widowers - Florida </a>
                        <a class="nav-link" href="https://www.facebook.com/groups/1971964406385016/ " target="_blank"> LDS Widows & Widowers - New England Region</a>
               
                       
               </div> 
              
            </div>


        <?php get_footer(); ?>
