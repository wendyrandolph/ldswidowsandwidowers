<?php
/*
 * Template Name: confReg_5
 */

/* other PHP code here */
session_start(); 
//var_dump($_SESSION); 
//exit; 
$_SESSION['conf1']; 
$conf1 = $_SESSION['conf1']; 
$_SESSION['userId']; 
//echo $_SESSION['userId']; 
//exit; 
$userId = $_SESSION['userId'] ;
  

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
  
  //echo $_SESSION['part3']; 
 // exit; 
 if( $_SESSION['part5'] === "TRUE"){


?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration Part 6</title>
    

    <link rel="stylesheet" href="  /style.css" media="screen">

</head>

<body>

<?php get_header();
$userId = $_SESSION['userId']; 
$clientData =  $_SESSION['clientData']; 
?>


    <main id="content" class="neve_main">
     <div class="trial">
            <div class="row_2">
            <div>
         <!-- Empty column space holder --> 
            </div>
                <div id="sidebar" >
                    <header class="btn">
                        <?php echo $conf1 ?> - Step 6
                    </header>
                         
               
                    
            <!-- div  is for styling purposes only -->
           
            <?php 
            if(isset($_SESSION['message'])) { 
                echo $_SESSION['message']; 
            }
            ?>
            </div><br>

             
              <form action="../users/index.php" method="post" >
             <fieldset>
        
            <legend style="color: white; font-weight: 400; text-transform: uppercase; font-size: 16px;"> Please Select Which Meals you will be eating with us at the conference: </legend> <br>
             
             <header class="step5"> Friday </header> 
             <input type="checkbox" id="meal1" name="meal1" class="meal" value="7" >
             <label class="align"  for="meal1">Friday Meet and Greet - Please bring finger foods to share.</label><br>
             
             
             <header class="step5"> Saturday Lunch - Select One</header> 
             <p id="invalid2" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>
               
             <input type="radio" id="meal2" name="meal2" class="meal2" value="8" >
              <label class="align"   for="meal2">Saturday Lunch - Box lunch provided by USU Catering. **Ham**, chips, canned soda or water and a whole fruit or cookie.</label><br>
              <input type="radio" id="meal3" name="meal2" class="meal2" value="9" >
              <label class="align"  for="meal2">Saturday Lunch - Box lunch provided by USU Catering. **Turkey**, chips, canned soda or water and a whole fruit or cookie.</label><br>
              <input type="radio" id="meal4" name="meal2" class="meal2" value="10" >
              <label class="align"  for="meal2">Saturday Lunch - I will bring my own lunch</label><br>

              <header class="step5"> Saturday Dinner - Select One</header> 
              <p id="invalid3" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>
               
              <input type="radio" id="meal5"  name="meal3" class="meal3" value="11" >
              <label class="align"  for="meal5">Saturday Dinner - Catering by Costa Vida</label><br>
             
              <input type="radio" id="meal6" name="meal3" class="meal3" value="12">
              <label class="align"  for="meal6">Saturday Dinner - I will bring my own dinner</label><br>


           

            <input type="submit"  value="Next" id="submit" ><br><br>
            <input type="hidden" name="action" value="step_5"> 
            <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo ' value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>> <br> 
                 </fieldset>
           </form> 
           </div> </div> </div> </main>  


           
   

 <script type="text/javascript" src=" ../library/account.js"></script>

        </body> 

         <?php } else { 
               header("location: /profile"); 
           } ?> 