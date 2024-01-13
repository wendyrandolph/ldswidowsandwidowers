<?php
/*
 * Template Name: Confirm_Reg
 Template Post Type: account
 */

/* other PHP code here */
session_start();
get_header();
?>

<div class="page-banner">
    <?php 
    $args = array(
        'title' => "Create an Account"
    ); 
    pageBanner($args); ?>
</div>

<div class="container container--narrow page-section">

    <h5 class="heading1">Review & Submit</h5>

<p class= "t left"> These are the details that you entered in on the previous step.</p>
    <?php if (isset($_SESSION['message_1'])) {
        echo $_SESSION['message_1'];
    } ?>
    <form action="/accounts1/index.php" method="post">
        <?php if (isset($_SESSION['data'])) {
            echo ($_SESSION['data']);
        } ?>
        <b>
        
        <div class="grid-5">    
         <h5 class="heading1 one-third">Create a username that you will use to login to your account:</h5>
            <label>Enter a Username:<br>
            <input type="text" class="rounded-input full-width" name="userName" placeholder="Enter a username" required></label><br>

          <div class="column-5"> The password needs to be 8 characters long, <br> contain at least 1 uppercase character, 1 number and 1 special character</div><br>
       
            <label>Password:<br>
            <input type="password" class="rounded-input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
            </label>
            <label>Confirm Password:<br>
            <input type="password" class="rounded-input" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
</label><br>
            <button class="btn btn--blue" type="submit" name="submit" id="submit">Submit</button><br><br>
            <input type="hidden" name="level" value=1>
            <input type="hidden" name="verify" value=0>
            <!--Add the action name - value pair -->
            <input type="hidden" name="action" value="confirm_Reg">

    </form>

</div>
</div> 

<?php get_footer(); ?>