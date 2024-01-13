<?php
/*
 * Template Name: Success 
 Template Post Type: account
 */

/* other PHP code here */
session_start();

$_SESSION['userId'];
$userId = $_SESSION['userId'];

$_SESSION['conf1'];
//echo $_SESSION['conf1']; 
//exit; 
$_SESSION['confId'];
$_SESSION['conf2'];
$_SESSION['confId2'];
$_SESSION['knox'];
$_SESSION['remarried']; 

$url = "href='/users/index.php?action=cache'";
$_SESSION['url'] = $url;

$url2 = "href='/users/index.php?action=knox'";
$_SESSION['url2'] = $url2;




get_header();
$_Session['check_KReg'];



if (!$_SESSION['loggedin']) {
    header('location: /account/login');
    exit;
}

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

//if ($_SESSION['complete'] == "TRUE") {
?>
<div class="page-banner">
    <?php pageBanner(array(
        'title' => '',
    )); ?>
</div>

<div class="container container--narrow page-section">
    <h5 class="heading1 headline--tiny"><?php echo $_SESSION['conf2']; ?> Registration Info</h5>


    <?php if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
    } ?>

    <div class="page-links">

        <h5 class="page-links__title active">Manage Registration<a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-light fa-angle-down fa-lg"></i>
            </a></h5>
        <div class="topnav" id="myTopnav">
            
            <?php
            if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { 
                echo '<a class="nav-link"  href="/reports/index.php?action=reports"> Admin Page </a>';
            }
            if ($_SESSION['loggedin'] == 1) {
                echo '<a class="nav-link" href="/profile">Profile</a> ';
                // echo '<a class="adminBtn" href="/update">Update Account</a>';


            }  
             if ($_SESSION['remarried'] === "False") { ?>
                <a class="nav-link" href="/users/index.php?action=registr">R.L. Registration</a>
            <?php }  ?>
            <?php if ($_SESSION['loggedin'] == 1) { ?>
                <a class="nav-link" href="/accounts/index.php/?action=logout">Logout</a>
         <?php   } ?>
        </div>



       <!--     <?php if ($_SESSION['knox'] === "False") { ?>
                <a class="nav-link" href="/users/index.php?action=registr"> Knox Sign Up </a>
            <?php } else { ?>
                <a class='nav-link active" aria-current="page" <?php echo $url2 ?>'> Knox Registration</a>
            <?php }  ?>
            <?php if ($_SESSION['loggedin'] == 1) { ?>
                <a class="nav-link" href="/accounts/index.php/?action=logout">Logout</a>
         <?php   } ?>
        </div> -->

        <?php if ($_SESSION['cacheReg'] === "True") { ?>

            <div class="row_2">
                <header class="btn"> <?php if (isset($_SESSION['conf1'])) {
                                            echo $_SESSION['conf1'];
                                        } ?>
                </header>
            </div>
            <div class="row_4">

            </div>
           
    </div>
    <div class="row_1">
        <div id="sidebar">
            <ul>
                <?php
                echo $_SESSION['buildDetails'];
                ?>
            </ul>
        </div>

        <div id="column">
            <header class="btn"> 3 Topics Of Interest </header>
            <ul>
                <?php
                echo $_SESSION['buildTopics'];
                ?>

            </ul>
            <header class="btn"> Meal Options Selected </header>
            <ul>

                <?php
                echo $_SESSION['buildMeals'];
                ?>

            </ul>
            <ul>

                <?php
                echo $_SESSION['buildExtra'];
                ?>
            </ul>
        </div>
        <div>

        <?php  } ?>

      <!--  <?php
        if ($_SESSION['knoxReg'] === "True") { ?>
            <div class="row_admin">
                <div>
                    <header class="btn"> Manage Registration </header>
                    <a class='sideBtn' name='update' href=' /users/index.php?action=knoxUpdate'> Update My Registration </a>
                    <a class="sideBtn" name="cancel" href=" /users/index.php?action=knoxDelete"> Cancel My Registration </a>
                </div>
                <div class="column">
                    <header class="btn"> <?php if (isset($_SESSION['conf2'])) {
                                                echo $_SESSION['conf2'];
                                            } ?></header>




                    <ul>
                        <?php echo $_SESSION['buildKnox']; ?>
                    </ul>

                </div>
            </div>

        <?php } ?> --> 
        <?php if ($_SESSION['remarried'] === "True") { ?>

          
            <a class='nav-link' name='update' href=' /users/index.php?action=Update'> Update My Registration </a>
            <a class="nav-link" name="cancel" href=" /users/index.php?action=Delete"> Cancel My Registration </a>
        </div>
       
         




            <ul>
                <?php echo $_SESSION['buildRL']; ?>
            </ul>
        
    <?php  } ?>




    </div>
</div>
</div>

<?php get_footer(); ?>

<script type="text/javascript" src=" /library/account.js"></script>




<?php /*} /* else {
    header('location: /account/profile');
}*/
unset($_SESSION['message_1']);
unset($_SESSION['success']);
unset($_SESSION['delete']);
?>