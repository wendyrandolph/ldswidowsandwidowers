<?php
/*
 * Template Name: Admin
 */

/* other PHP code here */
session_start();

get_header();
$_SESSION['clientData'];
$_SESSION['conf1'];

//echo $_SESSION['register']; exit; 
$_SESSION['confId'];
$confId = $_SESSION['confId'];
$conf1 = $_SESSION['conf1'];
$url = "href='/users/index.php?action=cache&conf1=$conf1&confId=$confId'";



$_SESSION['knox'];
$_SESSION['conf2'];
$conf2 = $_SESSION['conf2'];
$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];

$url2 = "href='/users/index.php?action=knox'";




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
    <div> </div>
        <?php
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
        <div class="row_3">
            <div> </div>


            <div id="myAdminNav" class="adminNav">
                <!--    <?php
                        if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 
-->
                <?php
                if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="adminBtn active" aria-current="page" href="/profile">Profile</a> 
                    <a class="adminBtn" href="/update">Update Account</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                <?php  }

                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <a class="adminBtn" href="/reports/index.php?action=reports"> Admin Page </a>
                <?php } ?>
                <?php if ($_SESSION['knox'] === "False") { ?>
                    <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
                <?php } else { ?>
                    <a class="adminBtn" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                <?php if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>
                <?php   } ?>

            </div>
        </div>
        <div class="row_1">
            <div id="sidebar">
                <header class="btn">
                    Account Management
                </header>
                <ul class="nav flex-column">
                    <?php if ($_SESSION['loggedin'] == 1) {

                        echo '<a class="nav-link   " href="/keynote-speakers"> Keynote Speakers </a>';
                        echo '<a class="nav-link  " href="/recordings"> Recorded Workshops </a>';
                        echo '<a class="nav-link  " href="/handouts"> Presenter Handouts </a>';
                        echo '<a class="nav-link   " href="/subgroups"> Facebook Subgroups </a>';
                    } ?>
                </ul>

            </div>


            <div id="column">
                <header class="btn"> Account Details </header>
                <ul>

                    <li class="padding">Name: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                                } ?></li>
                    <li class="padding">Email: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['userEmail'];
                                                } ?></li>
                    <li class="padding">Address: <?php if (isset($_SESSION['clientData'])) {
                                                        echo $_SESSION['clientData']['address'] . ', ' . $_SESSION['clientData']['city'] . ', ' . $_SESSION['clientData']['state'] . " " . $_SESSION['clientData']['zipcode'];
                                                    } ?></li>
                    <li class="padding">Phone: <?php if (isset($_SESSION['phone'])) {
                                                    echo   $_SESSION['phone'];
                                                } ?></li>
                    <li class="padding">Age: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['age'];
                                                } ?></li>
                    <li class="padding">Gender: <?php if (isset($_SESSION['clientData'])) {
                                                    echo $_SESSION['clientData']['gender'];
                                                } ?></li>
                    <li class="padding">How long widowed: <?php if (isset($_SESSION['clientData'])) {
                                                                echo $_SESSION['clientData']['widowed'];
                                                            } ?></li>
                    <li class="padding">How many conferences attended: <?php if (isset($_SESSION['clientData'])) {
                                                                            echo $_SESSION['clientData']['conf'];
                                                                        } ?></li>

                </ul>
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