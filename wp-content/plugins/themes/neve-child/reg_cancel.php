<?php
/*
 * Template Name: Cancel Registration
 */

/* other PHP code here */
session_start();




get_header();

if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}
if ($_SESSION['cancel'] === "True") {

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
    <title> Cancel Registration </title> 
    <link rel="stylesheet" href="  /style.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="row_3">
        <div></div>
        <div>
           
        </div>
    </div>
    <div class="row_3" >
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
            } ?>
            </p>
        </div> 
        <main class=" neve_main">

            <div class="row_3">
                <div id="sidebar">
                    
                 

                </div>

<?php if($_SESSION['cacheCancel'] === "True"){ ?> 
                <div id="column">
                    <header class="btn" style="text-align: center;">  <?php echo $_SESSION['conf1'] ?> </header>
                    

                        <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf1'] ?> ?</p> 
                                                    <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again. 
                                                    </p>
                     
                                     <div class="reset"> 
        
            <a class="submit_2" name="cancel" href="/users/index.php?action=del_confirm"> Yes, Delete Registration </a>
            <a class="submit_2" name="cancel" href=" /success"> I changed my mind </a>
            <a class="submit_2" name="cancel" href="/users/index.php?action=regUpdate"> Update Details </a>
        </div>
              <?php } ?> 

<?php if($_SESSION['knoxCancel'] === "True"){ ?> 
                <div id="column">
                    <header class="btn" style="text-align: center;">  <?php echo $_SESSION['conf2'] ?> </header>
                    

                        <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf2'] ?> ?</p> 
                                                    <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again. 
                                                    </p>
                     
                                     <div class="reset"> 
        
            <a class="submit_2" name="cancel" href="/users/index.php?action=knoxDelConf"> Yes, Delete Registration </a>
            <a class="submit_2" name="cancel" href=" /success"> I changed my mind </a>
            <a class="submit_2" name="cancel" href="/users/index.php?action=knoxUpdate"> Update Details </a>
        </div>
              <?php } ?> 









                </div>
            </div>
        </main>


        <footer id="page_footer">
            <?php get_footer(); ?>
        </footer>
        <script type="text/javascript" src=" /library/account.js"></script>


</body>

<?php } else {
    header("location: /success");
} ?>

<?php unset($_SESSION['message_1']); ?>
<?php unset($_SESSION['success']); ?>