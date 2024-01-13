<?php
/*
 * Template Name: confReg_2
 */

/* other PHP code here */
session_start();

$_SESSION['clientData']; 
$_SESSION['conf1']; 
$_SESSION['confId']; 
$confId = $_SESSION['confId']; 
$conf1 = $_SESSION['conf1'];
//echo $confId; 
//exit; 

//var_dump($_SESSION['clientData']); 
//exit; 
        $userId = $_SESSION['clientData']['userId']; 
        $userName = $_SESSION['clientData']['userName']; 
        $firstName = $_SESSION['clientData']['firstName'];
        $lastName = $_SESSION['clientData']['lastName'];
        $userEmail = $_SESSION['clientData']['userEmail'];
        $address = $_SESSION['clientData']['address'];
        $city = $_SESSION['clientData']['city'];
        $state = $_SESSION['clientData']['state'];
        $county  = $_SESSION['clientData']['county'];
        $zipcode = $_SESSION['clientData']['zipcode'];
        $country = $_SESSION['clientData']['country'];
        $phone = $_SESSION['clientData']['phone'];
        $age = $_SESSION['clientData']['age'];
        $gender = $_SESSION['clientData']['gender'];
        $widowed = $_SESSION['clientData']['widowed'];
        $conf = $_SESSION['clientData']['conf'];
       //echo $userName; 
       //exit; 

//echo $level, $verify; exit; 

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

if($_SESSION['part2'] === "TRUE"){
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration Part 2</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>
<?php get_header();
?>

<body>


    <main id="content" class="neve_main">
     <div class="trial">
            <div class="row_2">
            <div>
          <?php 
            if(isset($_SESSION['message'])) { 
                echo $_SESSION['message']; 
            }
            ?>
            </div>
                <div id="sidebar">
                    <header class="btn">
                        <?php echo $conf1 ?> - Step 2 
                    </header>
                    <!-- div  is for styling purposes only -->
                    <p class="display"> Please confirm the details that we have for you, if anything needs to be updated, please fix it and click Next at the bottom. </p>
                        <p class="display"> *Note all fields are required </p>
                       
                        
            <form action="../users/index.php" method="post">
            <label>Email:</label>  <br>
                <input type="email" name="userEmail" class="input" id="userEmail" placeholder="New User Email" required <?php if (isset($userEmail)) {
                                                                                                            echo "value = '$userEmail'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['userEmail'] .'" ';
                                                                                                        }?>> <br>
               
                <label>First Name:</label> <br>
                <input type="text" name="firstName" class="input" id="firstName" placeholder="New First Name" required <?php if (isset($firstName)) {
                                                                                                            echo "value = '$firstName'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['firstName'] .'" ';
                                                                                                        }?>> <br>
                <label>Last name:</label> <br>
                <input type="text" name="lastName" class="input" id="lastName" placeholder="New Last Name" required <?php if (isset($lastName)) {
                                                                                                            echo "value = '$lastName'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['lastName'] .'" ';
                                                                                                        }?> > <br>
                 <label>Address:</label> <br>
                <input type="text" name="address" class="input" id="address" placeholder="New Home Address" required <?php if (isset($address)) {
                                                                                                            echo "value = '$address'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['address'] .'" ';
                                                                                                        }?>> <br>
                <label>City:</label> <br>
                <input type="text" name="city" class="input" id="city"  required <?php if (isset($city)) {
                                                                                                            echo "value = '$city'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['city'] .'" ';
                                                                                                        }?>> <br>
                <label for="state">State:  </label> <br>                                                                                        
                 <select name="state" id="state" class="input" >
                <option value="<?php if(isset($_SESSION['clientData'])) {
                                                                                                           echo $_SESSION['clientData']['state'];
                                                                                                        
                                                                                                        }?>"> <?php echo $_SESSION['clientData']['state'] ?></option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Nevada">Nevada</option>
                <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina</option>
                <option value="North Dakota">North Dakota</option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota">South Dakota</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia">West Virginia</option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
                <option value="Other">Other (Outside the US)</option>
                </select><br><br>
               
               
                <label>Zipcode:</label> <br>
                <input type="text" name="zipcode" class="input" id="zipcode" <?php if (isset($zipcode)) {
                                                                                                            echo "value = '$zipcode'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['zipcode'] .'" ';
                                                                                                        }?>> <br>

                
                <label for="county">County, if you live in Utah:</label> <br> 
                
               <input type="text" name="county" class="input" id="county" <?php if (isset($county)) {echo "value = '$county'";
                       }elseif (isset($_SESSION['clientData'])) {
                        echo  $_SESSION['clientData']['county'];
                        }?>> <br>

                <label>Country, if you live outside the US:</label> <br>
                 <input type="text" name="country" class="input" id="country" placeholder="New Country" <?php if (isset($country)) {
                                                                                                            echo "value = '$country'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['country'] .'" ';
                                                                                                        }?>><br>
                
                <label>Phone:</label> <br>                                                                                        
                <input type="tel" name="phone" class="input" id="phone" placeholder="New phone number" <?php if (isset($phone)) {
                                                                                                            echo "value = '$phone'";
                                                                                                        }elseif (isset($_SESSION['clientData'])) {
                                                                                                            echo 'value="' . $_SESSION['clientData']['phone'] .'" ';
                                                                                                        }?>><br>
                
                <label>Age: </label> <br>
                <select name="age" id="age" class="input"><br>
                  <option value="<?php if(isset($_SESSION['clientData'])) {
                                                                                                            echo $_SESSION['clientData']['age'] ;
                                                                                                        }?>"> <?php echo $_SESSION['clientData']['age'] ?></option>
                  <option value="20-29"> 20-29 </option>
                  <option value="30-39"> 30-39 </option>
                  <option value="40-49"> 40-49 </option>
                  <option value="50-59"> 50-59 </option>
                  <option value="60-69"> 60-69 </option>
                  <option value="70+"> 70+ </option> 
                  </select> <br> <br>
                 
                <label id="gender">Gender: <?php if(isset($_SESSION['clientData'])) {
                               echo $_SESSION['clientData']['gender'];
                               }?></label> <br>
                                
<input type="radio" id="male" name="gender" value="Male"  <?php echo ($_SESSION['clientData']['gender'] == "Male" ? 'checked="checked"': ''); ?>>
<label for="male" class="gender" >  Male </label> 
<input type="radio" id="female" name="gender" value="Female" <?php echo ($_SESSION['clientData']['gender'] == "Female" ? 'checked="checked"': ''); ?>>
<label for="female" class="gender">Female</label> <br><br>
                 
                 
                 
                 
                <label for="widowed">How long have you been widowed?:</label> 
                 <select name="widowed" id="widowed" class="input"> 
                 <option value="<?php if (isset($_SESSION['clientData'])) {
                                echo $_SESSION['clientData']['widowed'];
                                }?>"> <?php echo $_SESSION['clientData']['widowed']?></option>
                 <option value="0-6 Months">0-6 Months</option>
                 <option value="6-12 Month">6-12 Months</option>
                 <option value="1-2 Years">1-2 Years </option>
                 <option value="2-3 Years">2-3 Years </option>
                 <option value="3-5 Years">3-5 Years </option>
                 <option value="5-7 Years">5-7 Years</option>
                 <option value="8 years or more">8 years or more </option>
                 <option value="Not widowed myself, but married to someone who is widowed"> Not widowed myself, but married to someone who is widowed </option> 
                 </select> <br><br>
                 
                <label for="conf"> How many conferences have you attended previously? </label>
                 <select name="conf" id="conf" class="input"> 
                 <option value="<?php if(isset($_SESSION['clientData'])) {
                                echo $_SESSION['clientData']['conf'] ;
                                }?>"><?php echo $_SESSION['clientData']['conf']?> </option>
                 <option value="This will be my first"> This will be my first </option>
                 <option value="1"> 1 </option>
                 <option value="2"> 2 </option>
                 <option value="3"> 3 </option>
                 <option value="4 or more"> 4 or more </option>
                 </select><br><br>
                
               <input type="submit" value="Next" id="submit"><br><br>
                <!--Add the action name - value pair -->
                <input type="hidden" name="action" value="step2">
                <input type="hidden" name="userName"  <?php if(isset($userName)) { 
                    echo "value = '$userName'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userName'] .'"'; 
                 }?>> 
                <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>>
                 <input type="hidden" name="confId" class="input" id="confId"  <?php if(isset($confId)) { 
                    echo "value= '$confId'"; 
                 }elseif(isset($_SESSION['confId'])) { 
                     echo 'value="' . $_SESSION['confId'] .'"'; 
                 }?>>
                 <input type="hidden" name="conf1" class="input" id="conf1"  <?php if(isset($conf1)) { 
                    echo "value= '$conf1'"; 
                 }elseif(isset($_SESSION['conf1'])) { 
                     echo 'value="' . $_SESSION['conf1'] .'"'; 
                 }?>>
                 
            </form>




                    </div>
                </div>
                <div>

                </div>
            </div>
    </main>
   <script type="text/javascript" src=" /library/account.js"></script>
</body>
<footer id="page_footer">
    <?php get_footer(); ?>
</footer>
 <?php } else { 
               header("location: /profile"); 
           } ?> 