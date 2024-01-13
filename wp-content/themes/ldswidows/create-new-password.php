<?php
/*
 * Template Name: Create Password
 * Template Post Type: account
 */

/* other PHP code here */
session_start();

?>
<?php get_header(); ?>

<div class="page-banner">
    <?php pageBanner(); ?>
</div>

<div class="container container--narrow page-section">


    <h5 class="heading1"> Password Reset </h5>
    <?php
    //echo $_GET["selector"]; 
    //exit; 
    $_SESSION['test'];
    $validator =  $_SESSION['test'];
    //echo $validator; 
    //exit; 

    ?>
    <form action="/accounts1/index.php" method="post">

        <p class="success full-width t-left"> Check your e-mail for the Password Reset Link!</p>
        <br>
        <input type="text" class="rounded-input full-width" name="selector" placeholder="Enter the reset code sent to your email here"><br>
        <input type="hidden" name="validator" <?php if (isset($validator)) {
                                                    echo "value=' . $validator .'";
                                                } ?>>
        <li style="color: red; margin-left: 5px; "> The password must be 8 characters long, contain at least 1 uppercase character, 1 number and 1 special character</p>
        <input id="PassEntry" type="password" class="rounded-input full-width" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Enter New Password">
        
       <br>
        <input type="password" class="rounded-input full-width" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Confirm New Password"><br><br>
        <button class="btn btn--blue" type="submit" name="reset-password-submit" id="request"> Reset Password </button>
        <input type="hidden" name="action" value="passwordChange">
    </form>
</div>

<?php get_footer(); ?>