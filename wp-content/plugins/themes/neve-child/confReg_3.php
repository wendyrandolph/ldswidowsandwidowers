<?php
/*
 * Template Name: confReg_3
 */

/* other PHP code here */
session_start(); 
 $_SESSION['conf1']; 
 $conf1 =  $_SESSION['conf1']; 
 $_SESSION['confId']; 
 $confId = $_SESSION['confId']; 
$_SESSION['userId']; 
$userId = $_SESSION['userId'] ;


//var_dump($_SESSION['clientData']); 

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
  
  //echo $_SESSION['part3']; 
 // exit; 
 if($_SESSION['part3'] === "TRUE"){


?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration Part 3</title>
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
                <div id="sidebar">
                    <header class="btn">
                        <?php echo $conf1 ?> - Step 3
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
           <?php 
           //echo $conf1; 
           //exit; 
           if($conf1 === "Knoxville Regional Conference"){ ?> 
           <div class="row_2">
           <div class="sidebar"></div>
             <header class="btn"> What are you interested in doing? </header><br>
             <div style="border-bottom: 2px dashed white; padding: 10px; "> 
             <h4 style="margin: 5px;"> A possible hike Friday Morning - June 9, 2023? </h4>
             <p style="margin: 5px;"> (9:00am) </p>
             <span class="mobile">
             <input type="radio" id="hike" name="hike" value="Yes" required>
             <label class="align" for="hike"> Yes </label><br>
             <input type="radio" id="hike" name="hike" value="No" >
             <label class="align" for="hike"> No </label>
             </span><br> 
             </div>
                <div style="border-bottom: 2px dashed white; padding: 10px; "> 
             <h4 style="margin: 5px;"> Planning to attend the bonfire meet and greet on Friday?  </h4>
             <p style="margin: 5px;"> (7:00pm - 10:00pm @ Annie Smith's home) </p> 
             <span class="mobile" ><input type="radio" id="bonfire" name="bonfire" value="Yes" required>
             <label class="align" for="bonfire"> Yes </label><br>
             <input type="radio" id="bonfire" name="bonfire" value="No">
             <label class="align" for="bonfire"> No </label></span><br> 
               </div>
           

             <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend the keynote speakers and workshops?  </h4>
             <p style="margin: 5px;">  </p>
             <span class="mobile"><input type="radio" id="keynotes" name="keynotes" value="Yes" required>
             <label class="align" for="keynotes"> Yes </label><br>
             <input type="radio" id="keynotes" name="keynotes" value="No">
             <label class="align" for="keynotes"> No </label></span><br>
            </div> 


            <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend the social on Saturday after the conference?  </h4>
             <p style="margin: 5px;"> (7:00pm - 10:00pm in the cultural hall) </p>
             <span class="mobile"><input type="radio" id="social" name="social" value="Yes" required>
             <label class="align" for="social"> Yes </label><br>
             <input type="radio" id="social" name="social" value="No">
             <label class="align" for="social"> No </label></span><br>
            </div> 


            <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend sacrament meeting on Sunday morning?  </h4>
             <p style="margin: 5px;"> (9:00am) </p>
             <span class="mobile"><input type="radio" id="sacrament" name="sacrament" value="Yes" required>
             <label class="align" for="sacrament"> Yes </label><br>
             <input type="radio" id="sacrament" name="sacrament" value="No">
             <label class="align" for="sacrament"> No </label></span><br>
            </div> 
            <div style="padding: 10px; margin "> 
             <span class="mobile"> <label class="align" for="allergies" >Food allergies or Restrictions: </label><br><br>
             <input type="text" id="allergies" name="allergies" style="margin:0;" placeholder="Please list any food allergies here"></span><br> <br> 
            </div>
            <div> </div> <!-- For Styling purposes --> 
            </div> 

            <input type="submit" value="Submit" id="submit" ><br><br>
           <input type="hidden" name="action" value="knoxSubmit"> 
           <input type="hidden" name="confId" <?php  if(isset($confId)) { 
                    echo "value = '$confId'"; 
                 }elseif(isset($_SESSION['confId'])) { 
                     echo 'value="' . $_SESSION['confId'] .'"'; 
              }?>>
              <input type="hidden" name="conf1" <?php  if(isset($conf1)) { 
                    echo "value = '$conf1'"; 
                 }elseif(isset($_SESSION['conf1'])) { 
                     echo 'value="' . $_SESSION['conf1'] .'"'; 
              }?>>
           <input type="hidden" name="userId" class="input" id="userId"<?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
              }?>>
            
            <?php 
           }elseif ($conf1 === "Cache Valley Regional Conference"){ 
               //Thursday Events 
             echo '<h4>Which events Thursday June 22nd, are you planning to attend?  </h4>';
             echo '<input type="checkbox" id="lake" name="lake" value="1">';
             echo '<label class="align" for="lake" word-wrap: break-word>Day at the Lake - (canoeing, swimming, picknicking, paddle boarding, lawn games) pm - 5:pm </label><br>';
             echo '<input type="checkbox" id="bike" name="bike" value="2">';
             echo '<label class="align" for="bike">Bike Ride through Sardine Canyon 1:00pm - 5:00pm </label><br><br>';

             echo '<h4>Which morning & afternoon events Friday June 23rd,  are you planning to participate in?  </h4>';
             echo '<p class="display"> A time is reserved for attending the Logan Temple on Friday Morning. If you desire to attend, please make your appointment for either an endowment, initiatory, baptisms or sealings online.  </p>';
             
             echo '<input type="checkbox" id="temple" name="temple" value="3">';
             echo '<label class="align" for="temple">Morning Temple Session 9:00am - 11:00am</label><br>'; 
             echo '<input type="checkbox" id="hike1" name="hike1" value="4">';
             echo '<label class="align" for="hike1">Afternoon Easy Hike -  1:00pm- 5:00pm</label><br>'; 
             echo '<input type="checkbox" id="hike2" name="hike2" value="5">';
             echo '<label class="align" for="hike2">Afternoon Hike (Not as Easy but still fun) - 1:00pm- 5:00pm</label><br>'; 
             echo '<input type="checkbox" id="pickleball" name="pickleball" value="6">';
             echo '<label class="align" for="pickleball">Afternoon Pickleball - 1:00pm- 5:00pm</label><br>'; 
             echo '<input type="checkbox" id="axe" name="axe" value="7">';
             echo '<label class="align" for="axe">Afternoon Knife & Axe Throwing - 1:00pm- 5:00pm</label><br><br>'; 
             
             //Friday Evening Activities
             echo '<h4>Which Activities Friday evening are you planning to participate in?  </h4>';
             echo '<input type="checkbox" id="fireside" name="fireside" value="8">';
             echo '<label class="align" for="fireside">Evening Fireside - 6:30pm </label><br>'; 
             echo '<input type="checkbox" id="meet_greet" name="meet_greet" value="9">';
             echo '<label class="align" for="meet_greet">Evening Meet and Greet - 7:30pm</label><br><br>'; 

             //Saturday Morning Workshops 
             echo '<h4>What Events Saturday are you planning to attend?  </h4>';
             echo '<input type="checkbox" id="keynote" name="keynote" value="10">';
             echo '<label class="align" for="keynote">Workshops and Keynote 9:30am - 5:00pm </label><br>'; 
             echo '<input type="checkbox" id="square" name="square" value="11">';
             echo '<label class="align" for="square">Square Dancing with Professional Caller 7:00 - 8:30 pm</label><br>'; 
             echo '<input type="checkbox" id="afterParty" name="afterParty" value="12">';
             echo '<label class="align" for="afterParty"> Dancing, Games, & Karaoke 8:30 - 10:30 pm</label><br><br>'; 
             echo '<input type="checkbox" id="cleanup" name="cleanup" value="13">';
             echo '<label class="align" for="cleanup"> Cleanup - Please stay a few minutes after the dance and help us clean up</label><br><br>';

             echo '<input type="submit" value="Next" id="submit" ><br><br>';
            echo '<input type="hidden" name="action" value="step3">'; 
           echo '<input type="hidden" name="userId" class="input" id="userId"' ?> <?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
              }?> <?php  echo '> <br>';  

           }elseif ($conf1 === "Idaho Regional Conference"){ 
               
             
              echo '< label class="align" for="conf1">Register for the Idaho Regional Conference: </label> <br>';

             echo ' <select name="conf1" id="conf1" class="input">';
             echo ' <option value="">--Please choose an option--</option>';
             echo ' <option value="Salt Lake City Conference">Salt Lake City Conference</option>';
             echo ' <option value="Cache Valley Regional Conference">Cache Valley Regional Conference</option>';
             echo ' <option value="Idaho Regional Conference">Idaho Regional Conference</option>';
             echo ' </select> <br><br>';
  
            
            
            echo '<input type="submit" value="Next" id="submit" ><br><br>';
            echo '<input type="hidden" name="action" value="step3">'; 
            echo '<input type="hidden" name="conf1" class="input" id="userId"' ?> <?php  if(isset($conf1)) { 
                    echo "value = '$conf1'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['conf1'] .'"'; 
              }?> <?php  echo '> <br>';  
              
           echo '<input type="hidden" name="userId" class="input" id="userId"' ?> <?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
              }?> <?php  echo '> <br>';   
                  echo '<input type="hidden" name="userName" ' ?>  <?php if(isset($userName)) { 
                    echo "value = '$userName'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userName'] .'"'; 
                 }?><?php echo '> <br>'; ?>

           
              </fieldset>
             </form> 
           </div> 
        </div> 
    </div> 
</main> 
    <script type="text/javascript" src=" /library/account.js"></script>
        </body> 

         <?php } else { 
               header("location: /profile"); 
         }
         }  ?>