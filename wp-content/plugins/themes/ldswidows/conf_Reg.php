<?php 
/*
 * Template Name: conf_Reg
 Template Post Type: conference

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


?><div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title(); ?></h1>
    <div class="page-banner__intro">
      <p>Don't forget to replace me later.</p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id();
      ?>

      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

    </p>
  </div>

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
        'post_type' => 'conference',
        'child_of' => $parent,
        'parent' =>  $parent,
        'title_li' => '',
        //'post__not_in' =>  $grandPage,

      );

      $the_query = new WP_Query($args);

      //GET CHILD PAGErgb(61, 79, 95)ERE ARE ANY
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
      } ?>

    </ul>
  </div> <!-- End of Page-links Div -->
 <?php if(!$_SESSION['loggedin']){ ?>
 
 <h5 class="heading1"> In order to register, please login </h5> 
    <form action="/accounts1/index.php" method="post">
                       
                        <label class="input">Username:</label><br>
                        <input type="text" class="input" name="userName" <?php if (isset($userName)) {
                                                                                echo "value='$userName'";
                                                                            }  ?> required><br><br>
                        <label class="input">Password:</label><br>

                        <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <br><br>

                        <input type="submit" name="submit" value="Sign In" id="submit"> <br> <br>
                        <input type="hidden" name="action" value="Conf_Login">


                    </form>
 <?php }elseif($_SESSION['loggedin']){ ?>
        <div class="sidebar" id="column">
            <h5 class="heading1">Conference Registration - Step 1</h5>
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
                        <option value="5" disabled>Salt Lake City Conference</option>
                        <option value="6" disabled>Cache Valley Regional Conference</option>
                        <option value="7" >Idaho Regional Conference</option>
                        <option value="8" >Remarried Or Seriously Dating Conference</option>
                        <option value="9"> Knoxville Regional Conference </option>

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
 <? } ?>
</div> 
</div>
<?php

get_footer();
?>