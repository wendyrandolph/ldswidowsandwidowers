<?php
/*
 * Template Name: View
 */

/* other PHP code here */
session_start();
$_SESSION['userId'];
$userId = $_SESSION['userId'];
$_SESSION['conf_Id'];
$conf_Id =  $_SESSION['conf_Id'];
$_SESSION['conf1']; 
 $conf1 = $_SESSION['conf1']; 
 $_SESSION['knox'] === "False"; 
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
        <title>View Registion</title>
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
              <?php
               if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) {
                            echo '<a class="adminBtn" href="/reports/index.php?action=reports"> Admin Page </a>';
                            
                        }
                        if ($_SESSION['loggedin'] == 1) {
                            echo '<a class="adminBtn  href="/profile">Profile</a> '; 
                            echo '<a class="adminBtn"  href="/update">Update Account</a>';
                            echo '<a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>';
                            echo '<a href="javascript:void(0);" class="icon" onclick="myFunction()">';
                            echo '<i class="fa fa-bars"></i>';
                            echo '</a>'; }
                            ?> 
                </div> 

                <div class="row_3">
                <div> </div>
               <?php $url3 = "https//success?confId='6'" ?>
                
                   <a class="adminNav" href="<?php echo $url2 ?>">Knoxville</a>

                    <?php $url3 = "/users/index.php?action=sucess?confId='9'" ;
                    $_SESSION['url3']; 
                  
                    
                    ?>
                   <a class="adminNav" href="<?php echo $url3 ?>">Cache Valley Conference</a>
                


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
unset($_SESSION['delete']);
?>