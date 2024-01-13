<?php
/*
 * Template Name: Admin_1 
 */

/* other PHP code here */
session_start();

$_SESSION['knox'];
$_SESSION['conf2'];
$conf2 = $_SESSION['conf2'];
$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];

$url2 = "href='/users/index.php?action=knox&conf2=$conf2&confId2=$confId2'";


get_header();

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


?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="  /style.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="row_3">


        <div>

        </div>
    </div>
    <div class="row_3">
        <p class="success"> <?php
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
    <main class=" neve_main">
        <div id="myAdminNav" class="adminNav">


            <!--    <?php
                    if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?> > CV Registration</a> 
              <?php } ?> 
-->

            <?php
            if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) {
                echo '<a class="adminBtn active" aria-current="page" href="/reports/index.php?action=reports"> Admin Page </a>';
            }
            if ($_SESSION['loggedin'] == 1) {
                echo '<a class="adminBtn"  href="/profile">Profile</a> ';
                //  echo '<a class="adminBtn" href="/update">Update Account</a>';

                echo '<a href="javascript:void(0);" class="icon" onclick="myFunction()">';
                echo '<i class="fa fa-bars"></i>';
                echo '</a>';
            } ?>



            <?php if ($_SESSION['knox'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
            <?php } else { ?>
                <a class='adminBtn ' <?php echo $url2 ?> > Knox Registration</a>
            <?php }  ?>
            <?php if ($_SESSION['loggedin'] == 1) {
                echo '<a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>';
            } ?>

        </div>
        <div class="row_admin">
            <div id="sidebar">
                <header class="btn">
                    Admin Access
                </header>
                <ul class="nav flex-column">
                    <?php if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) {
                        echo '<a class="nav-link"  href=" /site-reports">Site Users Reports</a>';
                        echo '<a class="nav-link"  href=" /reports-slc"> Salt Lake Reports </a>';
                        //  echo '<a class="nav-link" href=" /reports-cache"> Cache Valley Reports </a>'; 
                        echo '<a class="nav-link" href=" /knoxville_2_reports">Knoxville Reports </a>';
                    }



                    ?> </ul>

            </div>


            <div id="column">
                <header class="btn">Conference Data </header>
                <p style="margin: 0 auto; padding: 20px; "> Here you may click on any link to the left (above if on mobile devices) and view available reports. </p>
            </div>
        </div>
    </main>


    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script type="text/javascript" src=" /library/account.js"></script>


</body>



<?php unset($_SESSION['message_1']);
unset($_SESSION['success']);
unset($_SESSION['delete']); ?>