<?php
/*
 * Template Name: Success 
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


$url = "href='/users/index.php?action=cache'";
$_SESSION['url'] = $url;

$url2 = "href='/users/index.php?action=knox'";
$_SESSION['url2'] = $url2;




get_header();
$_Session['check_KReg'];



if (!$_SESSION['loggedin']) {
    header("Location: /login");
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

if ($_SESSION['complete'] === "TRUE") {
?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>You Are Registered</title>
        <link rel="stylesheet" href="  /style.css" media="screen">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <main id="content" class="neve_main">
            <div class="row_2">
                <div> </div>

                <?php if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                } ?>

                <div></div>
            </div>

            <div id="myAdminNav" class="adminNav">

                <!--   <?php
                        if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 

-->
<?php
                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) {
                    echo '<a class="adminBtn"  href="/reports/index.php?action=reports"> Admin Page </a>';
                }
                if ($_SESSION['loggedin'] == 1) {
                    echo '<a class="adminBtn" href="/profile">Profile</a> ';
                   // echo '<a class="adminBtn" href="/update">Update Account</a>';
                   
          
                } ?>



                <?php  if($_SESSION['knox'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
               <?php }else{ ?> 
                 <a  class='adminBtn active" aria-current="page" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                  <?php   if ($_SESSION['loggedin'] == 1){
                      echo '<a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>';
                  } ?>
            </div>

            <?php if ($_SESSION['cacheReg'] === "True") { ?>

                <div class="row_2">
                    <header class="btn"> <?php if (isset($_SESSION['conf1'])) {
                                                echo $_SESSION['conf1'];
                                            } ?>
                    </header>
                </div>
                <div class="row_4">
                    
                </div>
                <div class="reset"> 
        
            <a class='navBtn' name='update' href=' /users/index.php?action=regUpdate'> Update My Registration </a>
            <a class="navBtn" name="cancel" href=" /users/index.php?action=delete"> Cancel My Registration </a>
        </div>
                <div></div>
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

                    <?php
                    if ($_SESSION['knoxReg'] === "True") { ?>
                        <div class="row_admin">
                            <div >
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

                    <?php } ?>

        </main>


        <footer id="page_footer">
            <?php get_footer(); ?>
        </footer>
        <script type="text/javascript" src=" /library/account.js"></script>


    </body>

<?php } else {
    header("location: /profile");
} ?>

<?php unset($_SESSION['message_1']);
unset($_SESSION['success']);
unset($_SESSION['delete']);
?>