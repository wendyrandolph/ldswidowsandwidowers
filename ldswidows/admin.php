<?php
/*
 * Template Name: Admin_1 
 Template Post Type: Account
 */

/* other PHP code here */
session_start();
get_header();
if ($_SESSION['loggedin'] == "True" and $_SESSION['userLevel'] == "3") {


    $_SESSION['userLevel'];
    $_SESSION['knox'];
    $_SESSION['conf2'];
    $conf2 = $_SESSION['conf2'];
    $_SESSION['confId2'];
    $confId2 = $_SESSION['confId2'];

    $url2 = "href='/users/index.php?action=knox&conf2=$conf2&confId2=$confId2'";

    $_SESSION['emailMessage'];
    require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
?>
    <div class="full-width-split">
        <div class="one-half" style="padding: 20px; ">
            <div class="container">

            </div>
            <br><br>
            
            <h5 class="heading1 heading2"> Admin Privileges </h5>
            <p class="success">
                <?php get_template_part('template-parts/content', 'messages'); ?>
            </p>
<div class="grid-5"> 
            <div class="x-admin"> Here you may select an option to view different reports.</div><div><br></div><button class="btn btn--blue btn--blue:hover "><a style="color: white; text-decoration: none;" href="/account/profile">Profile Page</a></button>

</div> <br><hr>
<div class="grid-5"> 
            <button class="btn btn--blue:hover full-width" style="background-color: #722F37;"> <a style="color: white; text-decoration: none;" href="/account/reports-remarried">Salt Lake Reports</a></button> 
 
            <button class="btn  btn--desert btn--desert:hover full-width "> <a <a style="color: white; text-decoration: none;" href="/account/reports-arizona">Arizona Reports</a></button>
            <button class="btn btn--blue:hover full-width" style="background-color: #722F37;"> <a style="color: white; text-decoration: none;" href="/account/reports-san-antonio">San Antonio Reports</a></button> 

            <button class="btn  btn--desert btn--desert:hover full-width"> <a style="color: white; text-decoration: none;" href="/account/reports-idaho">Idaho Reports</a></button> 
            <button class="btn btn--blue:hover full-width" style="background-color: #722F37;"> <a style="color: white; text-decoration: none;" href="/account/reports-remarried">Remarried Reports</a></button> 
 <button class="btn  btn--desert btn--desert:hover full-width"> <a style="color: white; text-decoration: none;" href="/account/reports-remarried">Knoxville Reports</a></button> 

</div> 
      
        <hr>
        <h5 class="heading1"> User Account</h5>
        <p class="t-left"> <strong>Need to check if someone has created an account?</strong>
        <form id="checkAccount" class="step3" action="/users/index.php" method="post">
            <label class="input">First Name</label><br>
            <input type="text" class="input" name="firstName" required><br><br>
            <label class="input">Last Name</label><br>
            <input type="text" class="input" name="lastName" required><br><br>
            <div class='grid-2'>
            <button class="btn  btn--accent_color btn--accent_color:hover " type="submit" id="Submit" name="submit">Check for Account </button> 
             
            
            <button class="btn btn--dark-orange btn--dark-orange:hover"><a style="color: white; text-decoration: none;" href="/accounts1/index.php/?action=logout">Logout</a></button>
        </div>
            <input type="hidden" name="action" value="userAccount">
        </form>
        <br><br>
        <?php
        if (isset($_SESSION['matchingUser'])) { ?>
            <div id="result">
                <p class="t-left"> This is a possible match: </p>
                <?php echo $_SESSION['matchingUser'];

                ?>
                <button onclick="clear_div();" class="btn btn--blue" type="submit">Reset</button>
            
        <?php } ?>

</div>
 
        <div class="one-half bye" style="background-image: url('/images/login_photo_shephard.webp'); background-repeat: no-repeat; background-size: cover; "></div>

    </div>

    </div>
    </div>
    <script type="text/javascript">
        function clear_div() {
            var matchingUser = <?php echo (json_encode($_SESSION['matchingUser'])); ?>;
            matchingUser = document.getElementById("result").innerHTML = " ";
        }
    </script>
<?php
    get_footer();
    unset($_SESSION['message_1']);
    unset($_SESSION['success']);
    unset($_SESSION['delete']);
} else {
    header('Location: /account/login');
}
?>