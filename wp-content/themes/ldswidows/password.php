<?php
/*
 * Template Name: Password
 Template Post Type: Account
 */

/* other PHP code here */
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
$_SESSION['pwd'];
if ($_SESSION['pwd'] === "True") {
  
    $userId = $_SESSION['userId'];
    $clientData =  $_SESSION['clientData'];
    get_header(); 
?>



<div class="full-width-split">
 <div class="full-width-split__one bye" style="background-image: url('/images/Christ_hand.jpg'); background-repeat: no-repeat; background-size: cover; "></div>
    
        <div class="one-third" style="padding: 20px; ">
          <div class="container" >
            
            </div> 
                <br><br> 
           
          <h5 class="heading1 heading2" style="background: #722F37;">Forgotten Password</h5>
        
        <form action="/includes/reset-request.inc.php" method="post">
            <p class='t-left'> In order to reset your password, please provide the USERNAME associated with your account. </p></br>
            <input class="rounded-input full-width" type="text" name="pwdResetUserName" placeholder="Enter your username" required><br><br>
            <button class="btn btn--blue"  id="submit" type="submit" name="reset-request-submit">Request Password Reset </button>
        </form>

<?php

            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") { ?>
                    <header class="btn">Close this window</header>
                    <p class="display alert"> Check your e-mail for the Password Reset Link!</p>
                    <button onclick="return close_Window();"> Close Window </button>
                    <script type='text/javascript'>
                        window.close();
                    </script>
            <?php    }
            }
            ?>
                   <?php options3(); ?>
        </div> 

       </div> 

    <script type="text/javascript" src=" /library/account.js"></script>

</div> 





<?php get_footer(); ?>



<?php unset($_SESSION['message']);
} else {
    header('location: /account/login');
} ?>