<?php
/*
 * Template Name: Arizona_Reg
 Template Post Type: conference

/* other PHP code here */
session_start();
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
$_SESSION['success'];
$_SESSION['confId11'];
$_SESSION['conf11'];

$_SESSION['manual'];
$confId3 = $_SESSION['confId11'];
$manual = $_SESSION['manual'];
$_SESSION['userId'];
$_SESSION['remarried'];
$_SESSION['idaho'];
$_SESSION['arizona'];
$_SESSION['sanAntonio'];
$userId = $_SESSION['userId'];

$_SESSION['guestConf'];

$_SESSION['guestloggedin'];
$_SESSION['guest'];
$_SESSION['guestUpdateAZ'];
/*$arizonaGuest_Id = 25; 
$getUserDets = getGuestUserDetails($arizonaGuest_Id);
$firstName = $getUserDets[0]['firstName']; 
$lastName = $getUserDets[0]['lastName']; 
$userEmail = $getUserDets[0]['userEmail']; 
//send details for sending a confirmation email
$getUserInfo = guestDetailsMessage($getUserDets, $firstName, $lastName, $userEmail, $conf1);
*/



$_SESSION['registr'] = "TRUE";
//var_dump($_SESSION['clientData']);

$clientData =  $_SESSION['clientData'];

get_header();
?>
<div class="page-banner">
    <?php pageBanner();


    //Grab the parent Id to aide in the brcrumb 
    $theParent1 = wp_get_post_parent_id();
    ?>
</div>

<div class="container page-section"> 

    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id();
            ?>

            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>
    </div>

     <div class="grid-container">
        <div>
   <?php
    if ($post->ID == '3459') {

        if ($_SESSION['guestConf'] === "True") {  ?>
          <!--  <h5 class="question">Conference Guest Registration Step 1: </h5>
             <form action="/users/index.php" method="post">
                <?php chooseConf(); ?>
                <button class="btn btn--blue " type="submit" name="submit">Next </button>
                <input type="hidden" name="level" value=1>
                <input type="hidden" name="action" value="step2"> -->

            <?php } elseif ($_SESSION['loggedin'] and $_SESSION['arizona'] === "False") { ?>
             <!--   <h5 class="heading1">Conference Registration Step 1: </h5>
                <form action="/accounts1/index.php" method="post">
                    <?php chooseConf(); ?>
                    <button class="btn btn--blue" type="submit" name="submit" id="submit">Next</button><br><br>
                    <input type="hidden" name="level" value=1>
                    <!--Add the action name - value pair -->
                 
                 <!--   <input type="hidden" name="action" value="step1">  -->

                  
                <?php } ?>

                </form> 

                <?php if ($_SESSION['arizona'] == 'True') {

                    if (($post->ID = 3459) and $_SESSION['arizona'] == 'True') { ?>
                        <h5 class="heading1"> Your Registration Details </h5>
                    <?php } ?>
                    <ul>

                        <?php echo $_SESSION['buildAZ'];  ?>
                    </ul>
                <?php  }

                ?>
                <hr>
            <!--    <?php if ($_SESSION['guestUpdateAZ'] == "True") {
                    get_template_part('template-parts/AZ', 'form');
                } ?> -->

               
                <!--    <h5 class="heading1" style="background: red;"><strong> Suggested Donation: $30.00 </strong> </h5>

                    <?php if (!$_SESSION['loggedin'] and !$_SESSION['guestloggedin']) { ?>
                       
                            Login to your account if you've created one to see how to send the donation. </br><br>
                        

                    <?php }
                    if ($_SESSION['loggedin'] || $_SESSION['arizona'] == "True" || $_SESSION['guestloggedin'] == "True") { ?>
                        <strong> You can send your donation to Julie Rasmussen through Venmo here: </strong><br><br>
                        <button class="btn btn--blue"><a style=" padding: 3px; color: white; " href="https://account.venmo.com/u/Julie-NewsomeRasmussen" target="_blank">Send a donation</a></button> <br>

                        <br>
                        <strong> Or you can mail a check made out to "LDS Widows & Widowers" and mail it to: </strong>
                        <ul style="list-style: none">
                            <li>Julie Rasmussen</li>
                            <li>4368 E Harwell Court</li>
                            <li>Gilbert, AZ 85234</li>
                        </ul></strong> <br><br>

                    <?php }
                    if ($_SESSION['loggedin']) { ?>
                        <h5 class="heading1"> Conference Address </h5>
                        <p class="t-left"> <a href="https://goo.gl/maps/KsyWAzeDor4RKQSY7">10036 E Brown Rd, Mesa, AZ 85207, United States </a></p>

                    <?php  }
                }

                if (!$_SESSION['loggedin'] and  !$_SESSION['guestConf']) { ?>

                    <h5 class="heading1">In order to register select one option below: </h5>
                       <p style="color: red; text-transform: uppercase; font-weight: 500;"> **Please note that you may still register for this conference, however there is not a guarantee for food. </p>
           
                    <form action="/accounts1/index.php" method="post">
                        
                            <p class="t-left">If you have already created an account on this website, sign in to your account.</p><br>

                       <!--     <?php /* get_template_part('template-parts/login', 'form'); */?> 
                            <button class="btn btn--blue float-left push-right" type="submit" name="submit" id="submit">Verify Account</button> <br> <br>
                            <input type="hidden" name="action" value="Conf_Login_AZ"> 

                    </form> <br>
                    <hr>
                    <p class="t-left">2 -First time users create an account.</p>
                    <a class="btn btn--blue" href="/account/create-account">Create Account</a><br>
                    <hr>
                    <p class="t-left">3 - Register as a guest. ** No account will be created, but you will be able to register for the Arizona Conference. </p><br>

                    <form action="/accounts1/index.php" method="post">

                        <button class="btn btn--blue" type="submit" id="submit" name="guestAZ">Guest Registration</button><br><br>
                        <input type="hidden" name="action" value="guest">
                        <input type="hidden" name="confId" value="11">
                    </form>
-->
               
               <p class="success">There is no open registration for this conference.</p>
                  

<?php } ?>
<br><br>

<!-- <hr>
<!-- <?php /* get_template_part('template-parts/email', 'form'); */ ?> 
</div> -->
</div> 
<div class="page-links">
    <?php get_template_part('template-parts/content', 'pagelinks'); ?> 

       <?php
        if (($post->ID == '3459') and $_SESSION['arizona'] == 'True') { ?>
            <h5 class="page-links__title"> Manage Registration </h5>
            <li> <a name='update' href=' /arizona/index.php?action=AZUpdate&confId3=<?php echo $confId3 ?>'> Update My Registration </a></li>
            <li> <a name="cancel" href=" /arizona/index.php?action=AZDelete&confId3=<?php echo $confId3 ?>"> Cancel My Registration </a></li>
        <?php }
        ?> 


    </div> <!-- End of Page-links Div -->

</div>
</div> 


</div></div>

<?php
if ($_SESSION['remarried'] == 'True') { ?>
    <script>
        //grab the Select id 
        let remarried = "<?php echo $_SESSION['remarried']; ?>";
        let confR = document.querySelectorAll("conf1 , option");

        for (let i = 0; i < conf1.length; i++) {
            if (confR[i].value === "8") {
                confR[i].disabled = true;
            } else {
                confR[i].disable = false;
            }
        }
    </script>
<?php }

if ($_SESSION['idaho'] == 'True') { ?>
    <script>
        //grab the Select id 
        let idaho = "<?php echo $_SESSION['idaho']; ?>";
        let conf1 = document.querySelectorAll("conf1 , option");

        for (let i = 0; i < conf1.length; i++) {
            if (conf1[i].value === "7") {
                conf1[i].disabled = true;
            } else {
                conf1[i].disable = false;
            }
        }
    </script>
<?php }
if ($_SESSION['arizona'] == 'True') { ?>
    <script>
        //grab the Select id 
        let remarried = "<?php echo $_SESSION['arizona']; ?>";
        let conf1 = document.querySelectorAll("conf1 , option");

        for (let i = 0; i < conf1.length; i++) {
            if (conf1[i].value === "11") {
                conf1[i].disabled = true;
            } else {
                conf1[i].disable = false;
            }
        }
    </script>
<?php }
if ($_SESSION['sanAntonio'] == 'True') { ?>
    <script>
        //grab the Select id 
        let sanAntonio = "<?php echo $_SESSION['sanAntonio']; ?>";
        let conf1 = document.querySelectorAll("conf1 , option");

        for (let i = 0; i < conf1.length; i++) {
            if (conf1[i].value === "10") {
                conf1[i].disabled = true;
            } else {
                conf1[i].disable = false;
            }
        }
    </script>
<?php }
get_footer();
unset($_SESSION['success']);
unset($_SESSION['message_1']);
unset($_SESSION['guest']);
unset($_SESSION['guestloggedin']);
unset($_SESSION['guestConf']);
