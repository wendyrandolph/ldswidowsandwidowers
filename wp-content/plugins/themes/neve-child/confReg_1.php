<?php
/*
 * Template Name: confReg_1
 */

/* other PHP code here */
session_start();
$_SESSION['userId'];
$userId = $_SESSION['userId'];
//var_dump($_SESSION); 
//exit; 

//var_dump($_SESSION['clientData']);
if ($_SESSION['registr'] === "TRUE") {

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
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conference Registration Part 1</title>
        <link rel="stylesheet" href="  /style.css" media="screen">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <?php get_header();
        $userId = $_SESSION['userId'];
        $clientData =  $_SESSION['clientData'];
        ?>


       
        <main id="content" class="neve_main">
    <div class="row_3"> 
        <div> </div>
     
        <div></div>
        </div> 
     <div id="myAdminNav" class="adminNav"> 
           <!--    <?php  
               if ($_SESSION['register'] === "False" ) { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php }else{ ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 
--> <?php  if($_SESSION['knox'] === "False") { ?>
                <a class="adminBtn active" aria-current="page" href="/users/index.php?action=registr"> Knox Sign Up </a>
               <?php }else{ ?> 
                 <a  class="adminBtn active" aria-current="page" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
<?php
                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?> 
                   <a class="adminBtn"  href="/reports/index.php?action=reports"> Admin Page </a>
               <?php  }
                if ($_SESSION['loggedin'] == 1) { ?> 
                   <a class="adminBtn"  href="/profile">Profile</a>
                   <!--<a class="adminBtn" href="/update">Update Account</a> -->
                   
                   <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                   <i class="fa fa-bars"></i>
                    </a>
             <?php  } ?>



               
                  <?php   if ($_SESSION['loggedin'] == 1){ ?> 
                      <a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>
                <?php   } ?>
 
                </div> 
<div class="row_3">
                        <div id="sidebar">
                            
                           

                        </div>

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
                                    <option value="7" disabled>Idaho Regional Conference</option>
                                    <option value="8" disabled>Remarried Or Seriously Dating Conference</option>
                                    
                                </select> <br><br>
                                
                                <?php if(isset($_SESSION['buildConfNames'])){ 
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
                    </div>
                </div>
        </main>

        <script type="text/javascript" src=" /library/account.js"></script>
        <script> 
 
var d = new Date(); 
var today = new Date("April 20, 2023");
//let day = today.getDate(); 
if(d.getDate() <= today ) {//6 is saturday
    //grab the Select id 
     
    let conf1 = document.querySelectorAll("conf1 , option");
    console.log(conf1); 
    for(let i=0; i<conf1.length; i++){ 
    if (conf1[i].value = "6" ) {
        conf1[i].disabled = true;
    }else{ 
        conf1[i].disable = false;   
         }
}    


        </script> 
    </body>
<?php } else {
    header("location: /profile");
} ?>