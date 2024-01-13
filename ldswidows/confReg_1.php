<?php
/*
 * Template Name: confReg_1
 * Template Post Type: conference
 */

/* other PHP code here */
session_start();
$_SESSION['registr'];
//If they pressed the register button on the previous step, then proceed; 
if ($_SESSION['registr']) {
$_SESSION['userId'];
$userId = $_SESSION['userId'];
//var_dump($_SESSION); 
//exit; 
//var_dump($_SESSION['clientData']);
$userId = $_SESSION['userId'];
$clientData =  $_SESSION['clientData'];

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
get_header();
while (have_posts()) {
    the_post();
    pageBanner(array(
        'title' => 'Register for Conference'
    )); ?>


    <div class="container page-section">
        <div id="myAdminNav" class="metabox metabox--position-up metabox--with-home-link adminNav">
            <p>

                <?php
                //Grab the parent Id to aide in the breadcrumb 
                $theParent1 = wp_get_post_parent_id(get_the_ID());

                if ($theParent1) { ?>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent1); ?>"><i class="fa fa-home" aria-hidden="true"></i><?php echo get_the_title($theParent1); ?></a> <span class="metabox__main"><?php the_title(); ?> </span>
                <?php  } else { ?>
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/profile'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Account Management</a>
                    <?php if ($_SESSION['knox'] === "False") { ?>
                        <a class="adminBtn active" aria-current="page" href="/users/index.php?action=registr"> Knox Sign Up </a>
                    <?php } else { ?>
                        <a class="adminBtn active" aria-current="page" <?php echo $url2 ?>> Knox Registration</a>
                    <?php }  ?>
                    <?php
                    if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                        <a class="adminBtn" href="/reports/index.php?action=reports"> Admin Page </a>
                    <?php  }
                    if ($_SESSION['loggedin'] == 1) { ?>
                        <a class="adminBtn" href="/profile">Profile</a>
                        <!--<a class="adminBtn" href="/update">Update Account</a> -->

                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i>
                        </a>
                    <?php  } ?>


            </p>
        </div>

        <div class="row_1">
            <div id="column">
                <h5 class="page-links__title">Account Details</h5>
                <p class="alert"> <?php
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

                                    ?>
                </p>
            </div>
           

        </div>
        <?php if ($_SESSION['registr'] == "TRUE") { ?>
            <div id="sidebar">
                <header class="btn">
                    Conference Registration - Step 1
                </header>
                <form action="/users/index.php" method="post">

                    <label for="conf1"> Which conference are you registering for? </label> <br>
                    <select name="conf1" id="conf1" class="input" required>
                        <option value="">--Please choose an option--</option>
                        <option value="9" selected> Knoxville Regional Conference </option>
                        <option value="5" disabled>Salt Lake City Conference</option>
                        <option value="6" disabled>Cache Valley Regional Conference</option>
                        <option value="7" diabled>Idaho Regional Conference</option>
                        <option value="8" disabled>Remarried Or Seriously Dating Conference</option>

                    </select> <br><br>

                    <?php if (isset($_SESSION['buildConfNames'])) {
                            echo $_SESSION['buildConfNames'];
                        } ?>

                    <input type="submit" value="Next" id="submit" name="step1"><br><br>
                    <input type="hidden" name="action" value="step1">
                    <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                        echo "value = '$userId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?>> <br>
                </form>
            </div>
<?php } else {
                        header('location: /account/profile');
                    }
                }
            } ?>
    </div>



    <!-----------     Original Content ---------->
    </div>




    ?>
    <?php get_footer(); ?>
    <script type="text/javascript" src=" /library/account.js"></script>
    <script>
        var d = new Date();
        var today = new Date("April 20, 2023");
        //let day = today.getDate(); 
        if (d.getDate() <= today) { //6 is saturday
            //grab the Select id 

            let conf1 = document.querySelectorAll("conf1 , option");
            console.log(conf1);
            for (let i = 0; i < conf1.length; i++) {
                if (conf1[i].value = "6") {
                    conf1[i].disabled = true;
                } else {
                    conf1[i].disable = false;
                }
            }

        }
    </script>
    <?php } elseif($_SESSION['loggedin'] AND !$_SESSION['registr']) {
    header('Location: /account/profile');
}else{ 
    header('location: /account/login'); 
}