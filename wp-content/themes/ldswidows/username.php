<?php
/*
 * Template Name: Username
  Template Post Type: Account
 */

/* other PHP code here */
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
$_SESSION['name']; 
if ($_SESSION['name'] === "True") { 
get_header(); 
?>
<div class="full-width-split">
 <div class="full-width-split__one bye" style="background-image: url('/images/Christ_hand.jpg'); background-repeat: no-repeat; background-size: cover; "></div>
    
        <div class="one-third" style="padding: 20px; ">
            <div class="container" >
            
            </div> 
                <br><br> 
           
           <h5 class="heading1 heading2" style="background-color: #E5AA70;"> Forgot your username?</h5>

         
        <form action="/users/index.php" method="post">
            <p class='display'> If you have forgotten your username, please enter the following that are associated with your account. </p></br>
            <label> Email: </label><br><br>
            <input class="rounded-input full-width" type="email" name="userEmail" placeholder="Enter your account email" required><br>
            <label> First Name: </label><br><br>
            <input class="rounded-input full-width" type="text" name="firstName" placeholder="Enter your first name" required><br>
            <label> Last Name: </label><br><br>
            <input class="rounded-input full-width" type="text" name="lastName" placeholder="Enter your last name" required><br><br>
            <input class="btn btn--blue" id="submit" type="submit" value="Request Username"> 
            <input type="hidden" name="action" value="username">
        </form>
  <?php options2(); ?> 
        </div>

       </div> 
  


    <script type="text/javascript" src=" /library/account.js"></script>

</div> 





<?php get_footer(); ?>



    <script type="text/javascript" src=" /library/account.js"></script>


<?php unset($_SESSION['message']);
} else { 
  header('location: /account/login'); 
 } ?>