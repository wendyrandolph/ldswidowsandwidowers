<?php
/*
 * Template Name: Admin
 * Template Post Type: Account
 */

/* other PHP code here */
session_start();

//$link = wp_make_link_relative( 'https://wendyc57.sg-host.com/account/profile/' );

$_SESSION['userLevel']; 

if($_SESSION['loggedin']){ 
 
get_header();
$_SESSION['clientData'];
$_SESSION['conf1'];

//echo $_SESSION['register']; exit; 
$_SESSION['confId'];
$confId = $_SESSION['confId'];
$conf1 = $_SESSION['conf1'];
$url = "href='/users/index.php?action=cache&conf1=$conf1&confId=$confId'";



$_SESSION['knox'];
$_SESSION['conf2'];
$conf2 = $_SESSION['conf2'];
$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];

$url2 = "href='/users/index.php?action=knox'";


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
$_SESSION['emailMessage'];


?>
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title();?></h1>
        <div class="page-banner__intro">
          <p>Account Details and other Resources</p>
        </div>
      </div>
    </div>

<div class="container container--narrow page-section neve_main">
  <div id="myAdminNav" class="metabox metabox--position-up metabox--with-home-link adminNav" >
    <p>
  
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id(get_the_ID());

      if ($theParent1) { ?>
        <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent1); ?>"><i class="fa fa-home" aria-hidden="true"></i><?php echo get_the_title($theParent1); ?></a> <span class="metabox__main"><?php the_title(); ?> </span>
      <?php  } else { ?>
        <a class="metabox__blog-home-link" href="<?php echo site_url('/profile');?>"><i class="fa fa-home" aria-hidden="true"></i>Account Management</a> 
      <?php     } 
                if ($_SESSION['loggedin'] == 1) { ?>
                  <a class="metabox__blog-home-link" href="/update">Update Account</a>
                  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                <?php  }

                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <a class="metabox__blog-home-link" href="/reports/index.php?action=reports"> Admin Page </a>
                <?php } ?>
                <?php if ($_SESSION['knox'] === "True") { ?>
                    <a class="metabox__blog-home-link" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
               
    
    </p>
  </div>
  <div class="row_1">
 <div id="column">
                <h5 class="page-links__title">Account Details</h5>
                <ul>

                    <li class="padding">Name: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                                } ?></li>
                    <li class="padding">Email: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['userEmail'];
                                                } ?></li>
                    <li class="padding">Address: <?php if (isset($_SESSION['clientData'])) {
                                                        echo $_SESSION['clientData']['address'] . ', ' . $_SESSION['clientData']['city'] . ', ' . $_SESSION['clientData']['state'] . " " . $_SESSION['clientData']['zipcode'];
                                                    } ?></li>
                    <li class="padding">Phone: <?php if (isset($_SESSION['phone'])) {
                                                    echo   $_SESSION['phone'];
                                                } ?></li>
                    <li class="padding">Age: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['age'];
                                                } ?></li>
                    <li class="padding">Gender: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['gender'];
                                                } ?></li>
                    <li class="padding">How long widowed: <?php if (isset($_SESSION['clientData'])) {
                                                                echo $_SESSION['clientData']['widowed'];
                                                            } ?></li>
                    <li class="padding">How many conferences attended: <?php if (isset($_SESSION['clientData'])) {
                                                                            echo $_SESSION['clientData']['conf'];
                                                                        } ?></li>

                </ul>
            </div>
 <div class="page-links">
    <h5 class="page-links__title">Resources</h5>
    <ul class="nav flex-column">
     <?php if ($_SESSION['loggedin'] == 1) {

                        echo '<a class="nav-link   " href="/keynote-speakers"> Keynote Speakers </a>';
                        echo '<a class="nav-link  " href="/recordings"> Recorded Workshops </a>';
                        echo '<a class="nav-link  " href="/handouts"> Presenter Handouts </a>';
                        echo '<a class="nav-link   " href="/subgroups"> Facebook Subgroups </a>';
                    } ?>
    </ul>
  </div>  

</div>
   <div class="row_1">
           


        </div>
</div>


<div>
  <?php

  the_content();

  ?>
 
   
    <div class="row_3">
    <div> </div>
        <?php
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
        
    </div>
   
        <div class="row_3">
            <div> </div>


          
        </div>
     
    </main>


    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script type="text/javascript" src=" /library/account.js"></script>


</body>



<?php } else { 
    header('location: /account/login'); 
}
unset($_SESSION['message_1']);
unset($_SESSION['success']);
unset($_SESSION['delete']); ?>