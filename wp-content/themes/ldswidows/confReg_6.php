<?php
/*
 * Template Name: confReg_6
 Template Post Type: account
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
 if( $_SESSION['part6'] === "TRUE"){


?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration</title>
    

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
                        <?php echo $conf1 ?> - Step 5
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
        
            <header class="btn"> Emegency Contact </header> <br>
             
            
            <label class="align">Emergency Contact Name:</label><br>
            <input type="text" name="emergency" class="input"><br><br>
            <label class="align">Emergency Contact Phone #:</label><br>
            <input type="tel" name="emer_phone" class="input" pattern="\(?\d{3}\)?-? *\d{3}-? *-?\d{4}" placeholder="(333)-333-1212"><br><br>

            <header class="btn"> Food Allergies </header> <br>
            <label class="align">If you have any food allergies. Please tell us about them so we can inform the food providers:</label><br>
            <input type="text"  name="allergy" ><br><br>
             
             <header class="btn"> Volunteers Needed </header> <br>
              <p class="align" class="success"> ***Please note that one option needs to be selected, thank you.*** </p> <br>
                            <input type="radio" id="Yes" name="volunteer" value="Volunteer, Yes" required>
                            <label for="Yes" class="align">Yes. I can help with setup and take down.</label><br>
                            <input type="radio" id="No" name="volunteer" value="Volunteer, No.">
                            <label for="No" class="align">No, I won't be able to help this time.</label><br><br>
             
            <header class="btn"> Suggested Donation </header> <br>
            <p class="align"> The suggested donation for the conference is $25. This will cover all meals and expenses. If you will not be eating meals with us or will be bringing your own food, please consider donating to our scholarship fund to help cover the costs of those who are unable to pay the full amount. 
                 Please pay your donation as soon as possible, but not later than June 19th. </p><br>

            <p class="align"> **If you click on the link to pay with Venmo, a new tab will open to Venmo,  after you make the payment, switch back here to complete the registration. And if you're having someone else Venmo for you, please have them make a note of who it is for.**</p>

            <p class="align"> If you are unable to pay with Venmo, or if you are unable to contribute the full amount, please text Mark Krogh (435-232-6366) for options. </p><br><br>

            <header class="btn"> How will you be sending your suggested donation? </header><br> 
            <p class="align" class="success"> ***Please note that one option needs to be selected, thank you.*** </p><br>
                            <input type="radio" id="Venmo" name="payment" value="I'll Pay Using Venmo" required>
                            <label for="Venmo" class="align">Venmo (Preferred) - <a style="background: white !important; color: var(--first_color) !important; " href="https://account.venmo.com/u/MarkKrogh" target="_blank">https://account.venmo.com/u/MarkKrogh</a>  </label><br>
                            <p class="align" > **Please don't check the box where Venmo takes a portion of the money. We will send you a full refund if you cancel your registration before we give our final meal numbers to the caterers.**</p> 
                            <input type="radio" id="other" name="payment" value="I'll Pay Another Way Other than Venmo">
                            <label for="other" class="align">Other - Please text Mark Krogh(435-232-6366) </label><br><br>
            <input type="submit"  value="Next" id="submit" ><br><br>
            <input type="hidden" name="action" value="step5"> 
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