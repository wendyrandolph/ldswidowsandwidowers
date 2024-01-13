<?php
/*
 * Template Name: Login
 * Template Post Type: Account
 */

/* other PHP code here */
//unset($_SESSION); 
session_start();
$_SESSION['userName'];
//echo $_SESSION['userNameFound']; 
//echo $_SESSION['userNameEmail'];
$_SESSION['loggedin'];
if ($_SESSION['loggedin']) {
    header('location: /account/profile');
} else {
    //var_dump($_SESSION['message_1']); 
    // Check if last activity was set
    require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
    //get_header();
    $_SESSION['userNameEmail'];

get_header(); 

?>
<div class="full-width-split"> 
 <div class="two-thirds bye" style="background-image: url('/images/Christ_hand.jpg'); background-repeat: no-repeat; background-size: cover; "></div>
  
        <div class="one-third" style="padding: 20px; ">
            <div class="container" >
            
            </div> 
                <br><br> 
                <?php if(!$_SESSION['loggedin']){ 
                    baseOptions(); 
                } ?> 
                <h5 class="heading1 ">Login to your account:</h5>
                <form id="login" action="/accounts1/index.php" method="post">
                
                <p id='logout' class="messageDiv"> </p>
                
<p class="sucess t-left"> <?php
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
                        if (isset($_SESSION["resetMessage"])) {
                            echo $_SESSION["resetMessage"];
                        }
                       

?></p>

                

                <p class="success"><?php if (isset($_SESSION['userName'])) {
                                        echo $_SESSION['userName'];
                                    } ?></p>
               <!-- <label class="input">Username:</label><br> -->
             
            <?php  get_template_part('template-parts/login', 'form'); ?>
           

                <input class="btn float-left push-right" style="background: #4C7F9F; width: 50%;" type="submit" id="Submit" name="submit" value="Sign in"> <br> <br>
                <input type="hidden" name="action" value="Login">


            </form><br>
            <?php options(); ?>


        </div>

       </div> 
  <?php } ?>

  <script type="text/javascript" src=" /library/account.js"></script>




<?php
get_footer(); 
    unset($_SESSION['idle']);
    unset($_SESSION['message_1']);
    unset($_SESSION['userName']);
    unset($_SESSION['message']);
    unset($_SESSION['resetMessage']);
    unset($_SESSION['success']);
    unset($_SESSION['emailMessage']);                  
    unset($_SESSION['delete']);                   
    unset($_SESSION["resetMessage"]);                  
                       
                       
?>