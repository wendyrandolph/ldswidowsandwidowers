<?php
/*
 * Template Name: confReg_1
 * Template Post Type: conference
 */

/* other PHP code here */
session_start();
$_SESSION['userId'];
$userId = $_SESSION['userId'];
//var_dump($_SESSION); 
//exit; 
$_SESSION['registr'] = "TRUE";
//var_dump($_SESSION['clientData']);
$userId = $_SESSION['userId'];
$clientData =  $_SESSION['clientData'];

if (!$_SESSION['loggedin']) { 
     header('location: /account/login');
}

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3700) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    session_start();
    $_SESSION['loggedin'] = false;
    $_SESSION['idle'] = "You have been logged out, due to inactivity.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp
get_header();


while (have_posts()) {
    the_post();
} ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
   <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Register For Conference</h1>
        <div class="page-banner__intro">
            <p>Don't forget to replace me later.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div id="myAdminNav" class="metabox metabox--position-up metabox--with-home-link adminNav">
        <p>

            <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id(get_the_ID());

            if ($theParent1) { ?>
                <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent1); ?>"><i class="fa fa-home" aria-hidden="true"></i><?php echo get_the_title($theParent1); ?></a> <span class="metabox__main"><?php the_title(); ?> </span>
            <?php  } else { ?>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/profile'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Account Management</a>
                <?php if ($_SESSION['knox'] === "False") { ?>
                    <a class="metabox__blog-home-link" aria-current="page" href="/users/index.php?action=registr"> Knox Sign Up </a>
                <?php } else { ?>
                    <a class="metabox__blog-home-link" aria-current="page" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                <?php
                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <a class="metabox__blog-home-link" href="/reports/index.php?action=reports"> Admin Page </a>
                <?php  }
                if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="metabox__blog-home-link" href="/profile">Profile</a>
                    <!--<a class="adminBtn" href="/update">Update Account</a> -->

                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
            <?php  }
            } ?>


        </p>
    </div>
 
        <div class="page-links">
           <h5 class="page-links__title"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title($theParent1); ?></a></h5>
    <ul style="list-style: none">

      <?php  
   


     

  
         //GET PARENT PAGE IF THERE IS ONE
     if ($post->post_parent)	{
	$ancestors=get_post_ancestors($post->ID);
	$root=count($ancestors)-1;
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

      if(count($children) != 0 AND count($siblings) > 0  ){
        
      /*  $args = array(
          'post_type' => 'conference',
          'title_li' => '',
          'depth' => 1, 
          'child_of' => $parent,
          'post__not_in' => array($theParent1), 
           
         
        ); */
     
  wp_list_pages( $args);
    
  }
 
 

        ?>
    </ul>
  </div> 
  
        <div class="sidebar" id="column">
            <h5 class="page-links__title">Conference Registration - Step 1</h5>
            <!-- Insert the form here -->  
            <!-- Provide a place to show alert messages if necessary -->  
            <p class="alert"> <?php
                                if (isset($_SESSION['idle'])) {
                                    echo $_SESSION['idle'];
                                }
                                if (isset($_SESSION['message_1'])) {
                                    echo $_SESSION['message_1'];
                                }
                                if (isset($_SESSION['success'])) {
                                    echo $_SESSION['success'];
                                }
                                if (isset($_SESSION['emailMessage'])) {
                                    echo $_SESSION['emailMessage'];
                                }
                                if (isset($_SESSION['delete'])) {
                                    echo $_SESSION['delete'];
                                }

                                ?>
            </p>
 
                <form action="/users/index.php" method="post">

                    <label for="conf1"> Which conference are you registering for? </label> 
                    <select name="conf1" id="conf1" class="input" required>
                        <option value="">--Please choose an option--</option>
                        <option value="9" selected> Knoxville Regional Conference </option>
                        <option value="5" disabled>Salt Lake City Conference</option>
                        <option value="6" disabled>Cache Valley Regional Conference</option>
                        <option value="7" disabled>Idaho Regional Conference</option>
                        <option value="8" >Remarried Or Seriously Dating Conference</option>

                    </select> <br><br>
                     <input type="submit" value="Next" id="submit" name="step1"><br><br>
                    <input type="hidden" name="action" value="step1">
                    <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                        echo "value = '$userId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?>> <br>
                </form>
</div>
      
  <?php

  the_content();

  ?>
        
 </div>  
    </div>
    <?php if ($_SESSION['registr'] === "TRUE") { ?>
    

           

        </div>



        <!-----------     Original Content ---------->
</div>
<div id="myAdminNav" class="adminNav">
    <!--    <?php
            if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> -->


</div>


<?php get_footer(); ?>
<script type="text/javascript" src=" /library/account.js"></script>
<script>
    var d = new Date();
    var today = new Date("April 20, 2023");
    //let day = today.getDate(); 
    if (d.getDate() <= today) { //6 is saturday
        //grab the Select id 

        let conf1 = document.querySelectorAll("conf1 , option");
        console.log(conf1);
        for (let i = 0; i < conf1.length; i++) {
            if (conf1[i].value === "6") {
                conf1[i].disabled = true;
            } else {
                conf1[i].disable = false;
            }
        }
    }
</script>

<?php
    } else {
        header("location: /account/profile");
    } ?>