<?php
/*
 * Template Name: regUpdate1
 */

/* other PHP code here */
session_start(); 
 //echo "This is the reg update page"; 
// exit;  
$_SESSION['regUp_2']; 
$_SESSION['conf1']; 

$_SESSION['confId']; 

$_SESSION['conf2']; 
$conf2 = $_SESSION['conf2']; 

$_SESSION['confId2']; 
$confId2 = $_SESSION['confId2']; 

$_SESSION['knoxUP']; 


//echo $_SESSION['confId']; 
//exit; 
//echo $_SESSION['confId']; 
$conf1 =  $_SESSION['conf1']; 
$confId =  $_SESSION['confId'];
// echo $confId; 
 //exit; 
$_SESSION['userId']; 
$userId = $_SESSION['userId'] ;

$_SESSION['confDetails_1']; 
$confDetails_1 = $_SESSION['confDetails_1']; 

$lake = $confDetails_1[0]['lake'];
$bike = $confDetails_1[0]['bike'];
$temple = $confDetails_1[0]['temple'];
$hike1 = $confDetails_1[0]['Hike1'];
$hike2 = $confDetails_1[0]['Hike2'];
$pickleball = $confDetails_1[0]['pickleball'];
$axe = $confDetails_1[0]['axe'];
$fireside = $confDetails_1[0]['fireside'];
$meet = $confDetails_1[0]['Meet and Greet'];
$keynotes = $confDetails_1[0]['keynotes'];
$square = $confDetails_1[0]['square'];
$afterParty = $confDetails_1[0]['afterParty'];
$cleanup = $confDetails_1[0]['cleanup'];

//echo $lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet, $keynotes, $square, $afterParty, $cleanup; 
//exit; 

$_SESSION['getRegData']; 
$allergies = $_SESSION['getRegData'][0]['allergies']; 
 
 /* $allergies = $getRegData[0]['allergies']; 
  $hike = $getRegData[0]['hike']; 
  $bonfire = $getRegData[0]['bonfire'];
  $saturdaySocial = $getRegData[0]['saturdaySocial'];
  $sacrament = $getRegData[0]['sacrament'];
  $keynotes = $getRegData[0]['keynotes'];    
*/

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


?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Update Part 1</title>
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
    
            </div>
                
              
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
            
           if($conf1 === "Salt Lake City Conference"){ ?>
            
              <label class="align" for="conf1">Register for the Salt Lake Conference: </ label class="align"> <br>

             <select name="conf1" id="conf1" class="input">
             <option value="">--Please choose an option--</option>
             <option value="Salt Lake City Conference">Salt Lake City Conference</option>
             <option value="Cache Valley Regional Conference">Cache Valley Regional Conference</option>
            <option value="Idaho Regional Conference">Idaho Regional Conference</option>
             </select> <br><br>
             <input type="submit" value="Next" id="submit" ><br><br>
            <input type="hidden" name="action" value="step3"> 
            <input type="hidden" name="userId" class="input" id="userId" <?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
              }?>> <br>  
            <?php }elseif($_SESSION['knoxUP'] === "TRUE"){?>
            <div id="sidebar">
                    <header class="btn">
                        <?php echo $conf2 ?> 
                    </header>
             </div> 
           <div class="row_2">
           <div class="sidebar"></div>
             <header class="btn"> What are you interested in doing? </header><br>
             <div style="border-bottom: 2px dashed white; padding: 10px; "> 
             <h4 style="margin: 5px;"> A possible hike Friday Morning - June 9, 2023? </h4>
             <p style="margin: 5px;"> (9:00am) </p>
             <span class="mobile"><input type="radio" id="hike" name="hike"  required  <?php  if($hike) { 
                    echo "value = 'Yes' checked='checked'"; 
                 }elseif($hike != "Yes") { 
                    echo 'value="' . "Yes" . '" "';
              }?>>
             <label class="align" for="hike"> Yes </label><br>
             <input type="radio" id="hike" name="hike"   <?php  if($hike = "No" ) { 
                    echo "value = 'No' checked='checked'"; 
                 }elseif($hike != "No") { 
                    echo 'value="' . "No". '" "';
              }?>>
             <label class="align" for="hike"> No </label></span><br> 
             </div>
                <div style="border-bottom: 2px dashed white; padding: 10px; "> 
             <h4 style="margin: 5px;"> Planning to attend the bonfire meet and greet on Friday?  </h4>
             <p style="margin: 5px;"> (7:00pm - 10:00pm @ Annie Smith's home) </p> 
             <span class="mobile" ><input type="radio" id="bonfire" name="bonfire"  value="Yes" <?php echo ($_SESSION['getRegData'][0]['bonfire'] == "Yes" ? 'checked="checked"': ''); ?>>
             <label class="align" for="bonfire"> Yes </label><br>
             <input type="radio" id="bonfire" name="bonfire" value="No" <?php echo ($_SESSION['getRegData'][0]['bonfire'] == "No" ? 'checked="checked"': ''); ?>>
             <label class="align" for="bonfire"> No </label></span><br> 
               </div>
           

             <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend the keynote speakers and workshops?  </h4>
             <p style="margin: 5px;">  </p> 
             <input type="radio" id="keynotes" name="keynotes" value="Yes" <?php echo ($_SESSION['getRegData'][0]['keynotes'] == "Yes" ? 'checked="checked"': ''); ?>>
                <label class="align" for="keynotes"> Yes </label><br>
            
              <input type="radio" id="keynotes" name="keynotes" value="No" <?php echo ($_SESSION['getRegData'][0]['keynotes'] == "No" ? 'checked="checked"': ''); ?>>
               <label class="align" for="keynotes"> No </label></span><br>
            </div> 


            <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend the social on Saturday after the conference?  </h4>
             <p style="margin: 5px;"> (7:00pm - 10:00pm in the cultural hall) </p>
             <span class="mobile"><input type="radio" id="social" name="social" value="Yes" <?php echo ($_SESSION['getRegData'][0]['saturdaySocial'] == "Yes" ? 'checked="checked"': ''); ?>>
             <label class="align" for="social"> Yes </label><br>
             <input type="radio" id="social" name="social" value="No" <?php echo ($_SESSION['getRegData'][0]['saturdaySocial'] == "No" ? 'checked="checked"': ''); ?>>
             <label class="align" for="social"> No </label></span><br>
            </div> 


            <div style="border-bottom: 2px dashed white; padding: 10px; "> 
            <h4 style="margin: 5px;"> Planning to attend sacrament meeting on Sunday morning?  </h4>
             <p style="margin: 5px;"> (9:00am) </p>
             <span class="mobile"><input type="radio" id="sacrament" name="sacrament" value="Yes" <?php echo ($_SESSION['getRegData'][0]['sacrament'] == "Yes" ? 'checked="checked"': ''); ?>>
             <label class="align" for="sacrament"> Yes </label><br>
             <input type="radio" id="sacrament" name="sacrament" value="No" <?php echo ($_SESSION['getRegData'][0]['sacrament'] == "No" ? 'checked="checked"': ''); ?>>
             <label class="align" for="sacrament"> No </label></span><br>
            </div> 
            <div style="padding: 10px; margin "> 
             <span class="mobile"> <label class="align" for="allergies" >Food allergies or Restrictions: </label><br><br>
             <input type="text" id="allergies" name="allergies" style="margin:0;" placeholder="Please list any food allergies here" <?php if (isset($allergies)) {
                                                                                                            echo "value = '$allergies'";
                                                                                                        }elseif (isset($_SESSION['getRegData'])) {
                                                                                                            echo 'value="' . $_SESSION['getRegData']['allergies'] .'" ';
                                                                                                        }?>></span><br> <br> 
            </div>
            <div> </div> <!-- For Styling purposes --> 
            </div> 

           
           <input type="hidden" name="confId2" <?php  if(isset($confId2)) { 
                    echo "value = '$confId2'"; 
                 }elseif(isset($_SESSION['confId2'])) { 
                     echo 'value="' . $_SESSION['confId2'] .'"'; 
                 }?>>

           <input type="hidden" name="userId" class="input" id="userId"<?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>>
<input type="submit" value="Submit" id="submit" ><br><br>
<a class="submit_2" name="cancel" href=" /success"> Back To My Details </a>
<input type="hidden" name="action" value="knoxUp2"> 

        
           <?php }elseif ($conf1 === "Cache Valley Regional Conference"){ ?>
               <div id="sidebar">
                    <header class="btn">
                        <?php echo $conf1 ?> 
                    </header>
             </div> 
               //Thursday Events ?> 
             <header class='regBtn'>Which events Thursday June 22nd, are you planning to attend?  </header>
             <span class="mobile"><input type="checkbox" id="lake" name="lake"  <?php  if(isset($lake)) { 
                    echo "value = '1' checked='checked'"; 
                 }elseif(!isset($lake)) { 
                     echo 'value="'. 1 . '"'; 
              }?>>
           
             <label class="align" for="lake">Day at the Lake - (canoeing, swimming, picknicking, paddle boarding, lawn games) 1pm - 5:00pm </label></span><br>
             <span class="mobile"><input type="checkbox" id="bike" name="bike" <?php  if(isset($bike)) { 
                    echo "value = '2' checked='checked'"; 
                 }elseif(!isset($bike)) { 
                     echo 'value="' . 2 .' "'; 
              }?>>
             <label class="align" for="bike">Bike Ride through Sardine Canyon 1:00pm - 5:00pm </label></span><br><br>

             <header class="regBtn">Friday Morning Activities  </header>
             <p class="display"> A time is reserved for attending the Logan Temple on Friday Morning. If you desire to attend, please make your appointment for either an endowment, initiatory, baptisms or sealings online.  </p>
             
            <span class="mobile"><input type="checkbox" id="temple" name="temple"  <?php  if(isset($temple)) { 
                    echo "value = '3' checked='checked'"; 
                 }elseif(!isset($temple)) { 
                     echo 'value="'. 3 . '"'; 
              }?> >
             <label class="align" for="temple">Morning Temple Session 9:00am - 11:00am</label></span><br> 

            <header class="regBtn">Friday Afternoon Activities 1:00 - 5:00pm  </header>

             <span class="mobile"><input type="checkbox" id="hike1" name="hike1"  <?php  if(isset($hike1)) { 
                    echo "value = '4' checked='checked'"; 
                 }elseif(!isset($hike1)) { 
                     echo 'value="' . 4 .' "'; 
              }?>>
             <label class="align" for="hike1">Afternoon Easy Hike </label></span><br> 
             <span class="mobile"><input type="checkbox" id="hike2" name="hike2"  <?php  if(isset($hike2)) { 
                    echo "value = '5' checked='checked'"; 
                 }elseif(!isset($hike2)) { 
                     echo 'value="' . 5 .' "'; 
              }?> >
             <label class="align" for="hike2">Afternoon Hike (Not as Easy but still fun)</label></span><br> 
             <span class="mobile"><input type="checkbox" id="pickleball" name="pickleball"  <?php  if(isset($pickleball)) { 
                    echo "value = '6' checked='checked'"; 
                 }elseif(!isset($pickleball)) { 
                     echo 'value="' . 6 .' "'; 
              }?>>
             <label class="align" for="pickleball">Afternoon Pickleball </label></span><br> 
            <span class="mobile"> <input type="checkbox" id="axe" name="axe"  <?php  if(isset($axe)) { 
                    echo "value = '7' checked='checked'"; 
                 }elseif(!isset($axe)) { 
                     echo 'value="' . 7 .'" '; 
              }?>>
             <label class="align" for="axe">Afternoon Knife & Axe Throwing </label></span><br><br> 
             
             <?php //Friday Evening Activities ?> 
             <header class="regBtn">Friday Evening Activities </header>
             <span class="mobile"><input type="checkbox" id="fireside" name="fireside" <?php  if(isset($fireside)) { 
                    echo "value = '8' checked='checked'"; 
                 }elseif(!isset($fireside)) { 
                     echo 'value="' . 8 .' "'; 
              }?> >
             <label class="align" for="fireside">Evening Fireside - 6:30pm </label></span><br>
            <span class="mobile"> <input type="checkbox" id="meet_greet" name="meet_greet" <?php  if(isset($meet)) { 
                    echo "value = '9' checked='checked'"; 
                 }elseif(!isset($meet)) { 
                     echo 'value="' . 9 .'" '; 
              }?>>
            <label class="align" for="meet_greet">Evening Meet and Greet - 7:30pm</label></span><br><br> 

             <?php //Saturday Morning Workshops ?>
            <header class="regBtn">Saturday Activities</header>
             <span class="mobile"><input type="checkbox" id="keynote" name="keynote" <?php  if(isset($keynotes)) { 
                    echo "value = '10' checked='checked'"; 
                 }elseif(!isset($keynotes)) { 
                     echo 'value="' . 10 .' "'; 
              }?>>
             <label class="align" for="keynote">Workshops and Keynote 9:30am - 5:00pm </label></span><br> 
             <span class="mobile"><input type="checkbox" id="square" name="square" <?php  if(isset($square)) { 
                    echo "value = '11' checked='checked'"; 
                 }elseif(!isset($square)) { 
                     echo 'value="' . 11 .'" '; 
              }?>>
             <label class="align" for="square">Square Dancing with Professional Caller 7:00 - 8:30 pm</label></span><br> 
             <span class="mobile"><input type="checkbox" id="afterParty" name="afterParty" <?php  if(isset($afterParty)) { 
                    echo "value = '12' checked='checked'"; 
                 }elseif(!isset($afterParty)) { 
                     echo 'value="' . 12 .' "'; 
              }?>>
            <label class="align" for="afterParty"> Dancing, Games, & Karaoke 8:30 - 10:30 pm</label></span><br> 
             <span class="mobile"><input type="checkbox" id="cleanup" name="cleanup"  <?php  if(isset($cleanup)) { 
                    echo "value = '13' checked='checked'"; 
                 }elseif(!isset($cleanup)) { 
                     echo 'value="  13  "'; 
              }?>>
             <label class="align" for="cleanup"> Cleanup - Please stay a few minutes after the dance and help us clean up</label></span><br><br>
             <input type="hidden" name="userId" class="input" id="userId"' <?php  if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                  } ?>> <br>  

            
              
                <div class="formHandling">  
                <a class="updatebtn" href=" /success">Back</a>
                <button class="updatebtn" type="reset" >Reset</button>
               <input class="updatebtn" type="submit" value="Next" ><br><br>
                <input type="hidden" name="action" value="regUpdate2">
                </div>
                <?php } ?> 
              </fieldset>
             </form> 
           </div> 
        </div> 
    </div> 
</main> 
    <script type="text/javascript" src=" /library/account.js"></script>
 
        </body> 
