<?php
/*
 * Template Name: Admin
 Template Post Type: Account
  
 */

/* other PHP code here */
session_start();
get_header();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
$_SESSION['stGeorge']; 

    $_SESSION['userLevel'];
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



    $_SESSION['emailMessage'];
 if ($_SESSION['loggedin'] == "True") { ?>

?>
    <div class="full-width-split">

        <div class="one-half" style="padding: 20px; ">
            <div class="container">
           
 
            </div>
            <br><br>
            <h5 class="heading1 heading2" style="color: white;"> Account Details </h5>
            <p class="success">  
        <?php get_template_part('template-parts/content', 'messages'); ?>
         </p> 
           
            <div class="grid-3 full-width">

                <label class="column-1"><strong>Name: </strong><br> <?php if (isset($_SESSION['clientData'])) {
                                                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                                                    } ?></label>
                <label class="column-2"><strong>Email: </strong><br> <?php if (isset($_SESSION['clientData'])) {
                                                                            echo $_SESSION['clientData']['userEmail'];
                                                                        } ?></label>

                <label class="column-1"><strong>Address: <br></strong> <?php if (isset($_SESSION['clientData'])) {
                                                                            echo $_SESSION['clientData']['address'] . ', ' . $_SESSION['clientData']['city'] . ', ' . $_SESSION['clientData']['state'] . " " . $_SESSION['clientData']['zipcode'];
                                                                        } ?></label>
                <label class="column-2"><strong>Phone: <br></strong><?php if (isset($_SESSION['phone'])) {
                                                                        echo   $_SESSION['phone'];
                                                                    } ?></label>
                <label class="column-1"><strong>Age: <br></strong><?php if (isset($_SESSION['clientData'])) {
                                                                        echo $_SESSION['clientData']['age'];
                                                                    } ?></label>
                <label class="column-2"><strong>Gender:<br> </strong><?php if (isset($_SESSION['clientData'])) {
                                                                            echo $_SESSION['clientData']['gender'];
                                                                        } ?></label>
                <label class="column-1"><strong>How long widowed: <br></strong><?php if (isset($_SESSION['clientData'])) {
                                                                                    echo $_SESSION['clientData']['widowed'];
                                                                                } ?></label>
                <label class="column-2"><strong>How many conferences attended: <br></strong><?php if (isset($_SESSION['clientData'])) {
                                                                                                echo $_SESSION['clientData']['conf'];
                                                                                            } ?></label>


            
            <button class="btn btn--accent_color t-center"> <a style="color: white; text-decoration: none;" href="/account/update">Update Account</a></button>
               <?php //if they have a userLevel of 3 they will see an admin page link 
        if ($_SESSION['userLevel'] == 3) { ?>
            <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/reports/index.php?action=reports">Admin Page</a></button>
        <?php }  
     ?>      
</div> 
            
            <div >
      
               
                 <h5 class="heading1 heading2" style="color: white;">Conferences You are Registered For</h5>
                     <?php 
        if ($_SESSION['remarried'] == "True") { ?>
         <li><a class="nav-link" href="/conferences/remarried-conference/remarried-registration">Remarried Life</a></li>
        <?php } 
         if ($_SESSION['idaho'] == "True") { ?>
            <li><a class="nav-link" href="/conferences/idaho-regional-conference/idaho-registration">Idaho Regional Conference</a></li>
       <?php } 
          if ($_SESSION['sanAntonio'] == "True") { ?>
            <button class="btn btn--blue:hover t-center" style="background-color: #722F37;"> <a style="text-decoration: none; color: white;" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio Registration</a></li>
        <?php  }  
        if ($_SESSION['arizona'] == "True") { ?>
            <li><a class="nav-link" href="/conferences/arizona-regional/arizona-registration">Arizona Registration</a></li>
         
        <?php }  
        if ($_SESSION['stGeorge'] == "True") { ?>
            <button class="btn btn--desert btn--desert:hover t-center" ><a style="text-decoration: none; color: white;" href="/conferences/st-george-regional/st-george-regional-registration">St. George Registration</a></button>
           
       <?php }elseif( $_SESSION['stGeorge'] == "False" && $_SESSION['sanAntonio'] == "False") {  ?>
                  <p class="t-center headline--tiny"> You are not currently registered for any conferences.  </p> 
       <?php  } ?>

 <h5 class="heading1 heading2" style="color: white;">Open Registrations</h5>
   <?php  if($_SESSION['sanAntonio'] == "False" OR $_SESSION['stGeorge'] == "False"){ 
        
               if ($_SESSION['remarried'] == "False") { ?>
       
           <!-- <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/conferences/remarried-conference/remarried-registration">Register for Remarried</a></button>-->
        <?php  }
       if ($_SESSION['idaho'] == "False") { ?>
         <!--   <button class="btn btn--blue btn--blue:hover t-center"><a text-decoration: none;" href="/conferences/idaho-regional-conference/idaho-registration">Register for Idaho</a></button>-->
        <?php  } 
     if ($_SESSION['sanAntonio'] == "False") { ?>
        <!--  <button class="btn btn--blue:hover t-center" style="background-color: #722F37;">  <a style="color: white; text-decoration: none;" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio</a></button> -->
        <?php   } 
     if ($_SESSION['arizona'] == "False") { ?>
          <!--  <button class="btn btn--desert btn--desert:hover t-center" ><a style="color: white; text-decoration: none;" href="/conferences/arizona-regional/arizona-registration">Arizona</a></button> -->

        <?php   } 
         if ($_SESSION['stGeorge'] == "False") { ?>
           <button class="btn btn--desert btn--desert:hover t-center" ><a style="color: white; text-decoration: none;" href="/conferences/st-george-regional/st-george-regional-registration">St. George </a></button>

        <?php   } 
        }  ?>
        </div> <br><br> 
        <div class='one-half'>
        <button class="btn btn--dark-orange btn--dark-orange:hover t-center full-width"><a style="color: white; text-decoration: none;" href="/accounts1/index.php/?action=logout">Logout</a></button>
        </div> 
    

        </div>
       
        <div class="one-half bye" style="background-image: url('/images/login_photo_shephard.webp'); background-repeat: no-repeat; background-size: cover; "></div>
    
</div> 
    <?php get_footer(); ?>

<?php unset($_SESSION['message_1']);
    unset($_SESSION['success']);
    unset($_SESSION['delete']);
} else {
    header('location: /account/login');
}

?>