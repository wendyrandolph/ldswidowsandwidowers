<?php
//echo "This is the accounts index.php"; 
//exit; 
// Create or access a Session
unset($_SESSION['idle']);
unset($_SESSION['message_1']);
session_start();

//exit; 


require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
// Get the functions library

require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'Login':
   login(); 
  $_SESSION['userId']; 
  $userId = $_SESSION['userId']; 
 // SAConfLogin($userId);
 // AZConfLogin($userId);
        
        
        
        $_SESSION['last_activity'] = time();
        last_activity($_SESSION['last_activity']); 
        /*Check if user is registered for a cache valley conference */
      /*  $check_Reg = isRegisteredConf($us <form id="login" action="/accounts1/index.php" method="post">Id);
        if ($check_Reg != 1) {
            $_SESSION['register'] = "False";
        } else {
            $_SESSION['register'] = "True";
            $getRegData = isRegisteredData($userId);
            $confId = $getRegData[0]['conf_Id'];
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            $conf1 = $getConfName[0]['conf_Name'];

            $confDetails_1 = details_1($userId);
            $_SESSION['confDetails_1'];
            //build the display of activities
            $buildDetails = build_1($confDetails_1);
            $_SESSION['buildDetails'] = $buildDetails;

            //Get Topics for the user 
            $confDetails_2 = details_2($userId);
            //Build display for topics chosen
            $buildTopics = build_2($confDetails_2);
            $_SESSION['buildTopics'] = $buildTopics;

            //Get Meal Options Chosen 
            $confDetails_3 = details_3($userId);
            //Build display for topics chosen
            $buildMeals = build_3($confDetails_3);
            $_SESSION['buildMeals'] = $buildMeals;

            //Get Extra Info for the user 
            $confDetails_4 = details_4($userId);
            //Build display for Extra info included
            $buildExtra = build_4($confDetails_4);
            $_SESSION['buildExtra'] = $buildExtra;

            $_SESSION['conf1'] = $conf1;
             
            $_SESSION['confId'] = $confId;
        }

        /*Are they registered for the Knoxville Conference */
     /*   $check_KReg = isRegisteredKConf($userId);

        if ($check_KReg != 1) {
            $_SESSION['knox'] = "False";
        } else {
            $_SESSION['knox'] = "True";
            $getRegData = isRegisteredKData($userId);
            // var_dump($getRegData[0]['conf_Id']); 
            //exit;   
            $confId = $getRegData[0]['conf_Id'];

            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildKnox = knoxConf($getRegData);


            $conf2 = $getConfName[0]['conf_Name'];
            $_SESSION['conf2'] = $conf2;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['buildKnox'];
        }
*/
        //RLConfLogin(); 
      
        //Are they registered for the Idaho conference 
        //IDConfLogin(); 

       
         header('location: /account/profile'); 
         
         
        
        
        break;
     
     case 'Conf_Login_RL':
 
 
//*****************Are they registered for the Remarried Life Conference ************************************
//***********************************************************************************************************
  //RLConfLogin();
  //IDConfLogin();
   $_SESSION['remarried'] = "False";
   $_SESSION['success'] = "There is not an open registration for this conference."; 
   SAConfLogin();
   $_SESSION['last_activity'] = time();

 header('location: /conferences/remarried-conference/remarried-registration'); 
unset($_SESSION['guest']);
unset($_SESSION['guestloggedin']);
unset($_SESSION['guestConf']);       
          break;
         
case 'Conf_Login_Id':
//*****************Are they registered for the Idaho Regional Conference ************************************
//***********************************************************************************************************
 // IDConfLogin();
 $_SESSION['idaho'] = "False";
 $_SESSION['success'] = "There is not an open registration for this conference."; 
 // RLConfLogin();
  //SAConfLogin();

$_SESSION['last_activity'] = time();

  header('location: /conferences/idaho-regional-conference/idaho-registration'); 
 unset($_SESSION['guest']);
unset($_SESSION['guestloggedin']);
unset($_SESSION['guestConf']);      
          break;

case 'Conf_Login_SA':
//*****************Are they registered for the San Antonio Conference ************************************
//***********************************************************************************************************
  login(); 
  $_SESSION['userId']; 
  $userId = $_SESSION['userId']; 
  SAConfLogin($userId);
  AZConfLogin($userId);
 // IDConfLogin();
 // RLConfLogin();

$_SESSION['last_activity'] = time();
unset($_SESSION['guest']);
unset($_SESSION['guestloggedin']);
unset($_SESSION['guestConf']);
 header('location: /conferences/san-antonio-regional/san-antonio-registration');   
 break; 

case 'Conf_Login_AZ':
//*****************Are they registered for the Arizona Conference ************************************
//***********************************************************************************************************
   login(); 
  $_SESSION['userId']; 
  $userId = $_SESSION['userId']; 
  SAConfLogin($userId);
  AZConfLogin($userId);
  //SAConfLogin();
 // IDConfLogin();
 // RLConfLogin();
unset($_SESSION['guest']);
unset($_SESSION['guestloggedin']);
unset($_SESSION['guestConf']);

$_SESSION['last_activity'] = time();

 header('location: /conferences/arizona-regional/arizona-registration/');     
  break; 

    case 'account_creation':

        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

        //echo $userEmail, $firstName, $lastName; 
        //exit; 
        //Checking for an existing email address in the users table
        $userMatch = checkUserName($userEmail, $firstName, $lastName);
        //echo $userMatch; 
        //exit; 
        if ($userMatch == 1) {
            $_SESSION['message_1'] = "<p class='alert'>A user with this information is already being used. Please login to your account.</p>";
            header('Location: /login');
        }

        /*Check against 14th Annual Registrations if, 
        they registered, pull their information and confirm it. */
        $emailCheck = confEmailCheck($userEmail, $firstName);
        $emailCheck2 = confEmailCheck2($userEmail, $firstName);
        if($emailCheck != 1){ 
         $_SESSION['userEmail'] = $userEmail;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['step1_1'] = "True";
            $_SESSION['message_1'] = "<p class='success'> Please fill out the form with the requested information. Thank you. </p>";

            header("location:/account/site-registration");
        }elseif ($emailCheck == 1) {
            $userData = getUserInfo($userEmail);
            //var_dump($userData); 
            //exit; 
            $_SESSION['userData'] = $userData;
            $firstName = $_SESSION['userData']['firstName'];
            $lastName = $_SESSION['userData']['lastName'];
            $email = $_SESSION['userData']['email'];
            $checkEmail = checkEmail($userEmail);
            $address =   $_SESSION['userData']['address'];
            $city = $_SESSION['userData']['city'];
            $state = $_SESSION['userData']['state'];
            $county = $_SESSION['userData']['county'];
            $zipcode = $_SESSION['userData']['zipcode'];
            $phone = $_SESSION['userData']['phone'];
            $age = $_SESSION['userData']['age'];
            $gender = $_SESSION['userData']['gender'];
            $widowed = $_SESSION['userData']['widowed'];
            $conf = $_SESSION['userData']['conf'];

            //call the function to build the confirm data function
            $confirm = confirmUSER($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf);
            $_SESSION['confirmData'] = $confirm;
            $dataArray = array($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf);
            $_SESSION['dataArray'] = $dataArray;
            //var_dump($_SESSION['dataArray']); 
            //exit; 
            $_SESSION['step1'] = "True";
            $_SESSION['message_1'] = "<p class='success'> We see that you registered for the March Conference in Salt Lake City, please confirm your information, and choose a username and a password. </p>";
            header("location: /account/confirm");
            break; 
        }
        
        if($emailCheck2 != 1){
            $_SESSION['userEmail'] = $userEmail;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['step1_1'] = "True";
            $_SESSION['message_1'] = "<p class='success'> Please fill out the form with the requested information. Thank you. </p>";

            header("location:/account/site-registration");
           
         }elseif ($emailCheck2 == 1) {
            $userData = getUserInfo_Idaho($userEmail);
        
            $_SESSION['userData'] = $userData;
            $firstName = $_SESSION['userData']['firstName'];
            $lastName = $_SESSION['userData']['lastName'];
            $email = $_SESSION['userData']['email'];
            $checkEmail = checkEmail($userEmail);
            $address =   $_SESSION['userData']['address'];
            $city = $_SESSION['userData']['city'];
            $state = $_SESSION['userData']['state'];
            $county = $_SESSION['userData']['county'];
            $zipcode = $_SESSION['userData']['zipcode'];
            $phone = $_SESSION['userData']['phone'];
            $gender = $_SESSION['userData']['gender'];
            

            //call the function to build the confirm data function
            $confirm = confirmUSER_Idaho($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $gender);
            $_SESSION['confirmData'] = $confirm;
            $dataArray = array($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $gender, $widowed, $conf); 
            $_SESSION['dataArray'] = $dataArray;
            //var_dump($_SESSION['dataArray']); 
            //exit; 
            $_SESSION['ageVerify'] = "True"; 
            $_SESSION['step1'] = "True";
            $_SESSION['message_1'] = "<p class='success'> We see that you registered for the Idaho Regional Conference in 2022, please confirm your information, and choose a username and a password. </p>";
            header("location: /account/confirm");
         
         
         }

break; 

case 'guest' : 
//echo "Case";
if(isset($_POST["guestAZ"])){

$confId = $_POST['confId']; 

$_SESSION['guestAZ'] = "True"; 
$_SESSION['guestloggedin'] = "TRUE";
$_SESSION['guestConf'] = "True"; 
$_SESSION['step1_1'] = "True";
$_SESSION['confId'] = $confId;  

header('location: /users/index.php?action=step1'); //Fill out the demographic information 

}


break; 

case 'guest_capture': 
    
    header('location: /users/index.php?action=step1'); 
break; 

case 'guest_register' :

 //filter and store email and password
        
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $checkEmail = checkEmail($userEmail);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $widowed = filter_input(INPUT_POST, 'widowed', FILTER_SANITIZE_STRING);
        $conf = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        //$userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        //$userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);
        //$level = 1;
       
        if(preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) {
        // $phone is valid
         $format = formatPhoneNumber($phone);
         $phone = $format;
        }else{ 
          $_SESSION['message'] = "Please enter in a valid phone number."; 
          header('location: /account/site-registration'); 
          exit; 
        }

       
       
        
        //Error Handling:   
        if (empty($firstName || $lastName || $userEmail || $address || $city || $phone || $age || $gender || $widowed || $conf  )) {
            $_SESSION['message'] = "<p>Please fill in the indicated fields.</p>";
            header('Location: /account/site_registration');
            exit;
        }

        //Check for matching entry in the Arizona Guest Table
        $userMatch = checkExistingGuest($firstName, $lastName, $userEmail);
        //echo $userMatch; 
        //exit; 
        if ($userMatch == 1) {
            $_SESSION['message_1'] = "<p class='alert'>A guest user with this information is already registered. </p>";
            header('Location: /conference/arizona-regional/arizona-registration');
            exit; 
        } 
        
        $dataArray_1 = array($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $level);
        $_SESSION['confId'] = $confId; 
      
        $_SESSION['dataArray'] = $dataArray_1;
        $_SESSION['guestAZ'] = "True";
        $_SESSION['guestloggedin'] = "True";
        $_SESSION['firstVisit'] = "False";  
        $_SESSION['guestConf'] = "True"; 
        $_SESSION['part3'] = "TRUE";
        $_SESSION['arizona'] = "False";
       header('location: /account/step_3');

break; 

case 'createA': 
echo "This is the create case";
$_SESSION['step1_1'] === "True";
header('location: /account/site-registration'); 
break; 


    case 'register':
        //Test if Im getting to the register case. 
        //echo " This is the register case";
        //exit;


        //filter and store email and password
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $checkEmail = checkEmail($userEmail);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $widowed = filter_input(INPUT_POST, 'widowed', FILTER_SANITIZE_STRING);
        $conf = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_STRING);
        //$userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        //$userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);
        //$level = 1;


        $format = formatPhoneNumber($phone);
        $phone = $format;


        //Error Handling:   
        if (empty($firstName || $lastName || $userEmail || $address || $city || $phone || $age || $gender || $widowed || $conf || $level || $userPW)) {
            $_SESSION['message'] = "<p>Please fill in the indicated fields.</p>";
            header('Location: /account/site_registration');
        }

        //Checking for an existing email address in the table
        $userMatch = checkExistingUserName($userName);
        if ($userMatch === 1) {
            $_SESSION['message'] = "<p>This user name is already being used. If you have already registered for an account, please login.</p>";
            header('Location: /account/login');
            exit();
        }


        /*Check that passwords match:  
        if($userPW !== $userPW_R){ 
            $_SESSION['message'] = "<p> Passwords do not match. </p>"; 
            header('Location: /site_registration');
            exit(); 
        }*/
        $data = confirmData($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf);
        $_SESSION['data'] = $data;
        //var_dump($_SESSION['data']); 
        // exit; 

        $dataArray_1 = array($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $level, $userPW);
        $_SESSION['dataArray'] = $dataArray_1;
        //var_dump($_SESSION['dataArray']); 
        //exit; 
        header('location: /account/confirm-account-info');
        break;

    case 'confirm':
        // $_SESSION['data'];
        $_SESSION['dataArray'];
        //var_dump($_SESSION['dataArray']); 
        //exit; 
         // $_SESSION['data'];
        $_SESSION['dataArray'];
        //var_dump($_SESSION['dataArray']); 
        //exit; 
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $checkEmail = checkEmail($userEmail);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $widowed = filter_input(INPUT_POST, 'widowed', FILTER_SANITIZE_STRING);
        $conf = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_STRING);
        //$userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        //$userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);
        //$level = 1;


        $format = formatPhoneNumber($phone);
        $phone = $format;

        $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);
        $verify = filter_input(INPUT_POST, 'verify', FILTER_SANITIZE_STRING);
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        $userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);


        //Checking for an existing email address in the table
        $userNameMatch = checkExistingUserName($userName);
        if ($userNameMatch === 1) {
            $_SESSION['message_1'] = "<p>This user name is already being used. If you have already registered for an account, please login.</p>";
            header('Location: /account/login');
            exit();
        }


        //Check that passwords match:  
        if ($userPW !== $userPW_R) {
            $_SESSION['message_1'] = "<p> Passwords do not match. </p>";
            header('Location: /account/confirm');
            exit();
        }


        // Send the data to the model
        $hashed_password = password_hash($userPW, PASSWORD_DEFAULT);

        $regOutcome = regClient($userName, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone,  $age, $gender, $widowed, $conf, $level, $verify, $hashed_password);
        $clientData = getUser($userName);

        //var_dump($email); 
        //exit; 
        $_SESSION['clientData'] = $clientData;
        // Check and report the result
        if ($regOutcome === 1) {


            //the message 
            // $email= sendMail($clientData); 

            $_SESSION['message_1'] = "Thank you for registering $firstName. Please use your user name and password to login.";
            header('Location: /account/login');
            exit;
        } else {
            $_SESSION['message_1'] = "<p>Sorry $firstName, but the registration failed. Please try again.</p>";
            header('Location: /account/create_account');
           
        }


        break;


    case 'confirm_Reg':

        // $_SESSION['data'];
        $_SESSION['dataArray'];
        //var_dump($_SESSION['dataArray']); 
        //exit; 
        $firstName = $_SESSION['dataArray'][0];
        $lastName = $_SESSION['dataArray'][1];
        $userEmail = $_SESSION['dataArray'][2];
        $address = $_SESSION['dataArray'][3];
        $city = $_SESSION['dataArray'][4];
        $state = $_SESSION['dataArray'][5];
        $county  = $_SESSION['dataArray'][6];
        $zipcode = $_SESSION['dataArray'][7];
        $country = $_SESSION['dataArray'][8];
        $phone = $_SESSION['dataArray'][9];
        $age = $_SESSION['dataArray'][10];
        $gender = $_SESSION['dataArray'][11];
        $widowed = $_SESSION['dataArray'][12];
        $conf = $_SESSION['dataArray'][13];
        $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_STRING);
        $verify = filter_input(INPUT_POST, 'verify', FILTER_SANITIZE_STRING);
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        $userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);


        //Checking for an existing email address in the table
        $userNameMatch = checkExistingUserName($userName);
        if ($userNameMatch === 1) {
            $_SESSION['message_1'] = "<p>This user name is already being used. If you have already registered for an account, please login.</p>";
            header('Location: /login');
            exit();
        }


        //Check that passwords match:  
        if ($userPW !== $userPW_R) {
            $_SESSION['message_1'] = "<p> Passwords do not match. </p>";
            header('Location: /account/site_registration');
            exit();
        }


        // Send the data to the model
        $hashed_password = password_hash($userPW, PASSWORD_DEFAULT);

        //Create a new Verify User Table  - Still need to do that, then build this next funtion: 

        $regOutcome = regClient($userName, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone,  $age, $gender, $widowed, $conf, $level, $verify, $hashed_password);


        $clientData = getUser($userName);

        //var_dump($email); 
        //exit; 
        $_SESSION['clientData'] = $clientData;
        // Check and report the result
        if ($regOutcome === 1) {

            //the message 
            // $email= sendMail($clientData); 

            $_SESSION['message_1'] = "<p class='alert'>Thanks for registering $firstName. Please use your email and password to login.</p>";
            header('Location: /account/login');
            exit;
        } else {
            $_SESSION['message_1'] = "<p class='display'>Sorry $firstName, but the registration failed. Please try again.</p>";
            header('Location: /account/site_registration');
            exit;
        }


        break;
      


    case 'userUpdate':
        //echo "This is the Update statement"; 
        //exit;
        $_SESSION['userName'];
        $userName = $_SESSION['userName'];
        //echo $userName; 
        //exit;  
        $_SESSION['loggedin'] = true;
        // Filter and store the data
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $widowed = filter_input(INPUT_POST, 'widowed', FILTER_SANITIZE_STRING);
        $conf = filter_input(INPUT_POST, 'conf', FILTER_SANITIZE_STRING);

        // echo  $userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf; 
        // exit; 
        // Send the data to the model

        $clientUpdate = updateClient($userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf);
        //var_dump($clientUpdate); 
        //exit;
        if ($clientUpdate === 1) {
            $_SESSION['message_1'] = "<p class='success'>Thanks for updating your account $firstName.</p>";
            $_SESSION['clientData'] = $userData;
            //there is a $userMatch so continue onward: 

            $clientData = getUser($userName);
            $userId = $clientData[0]['userId'];


            //drop the password 
            $userData = array_pop($clientData);
            $_SESSION['clientData'] = $userData;



            //store clientData to the session
            header('Location: /account/profile');
            exit;
        } else {
            $_SESSION['message_1'] = "<p class='success'> Sorry $clientFirstname, your account information has not been updated. Please try again. </p>";
            header('Location: /account/profile');
            exit;
        }



        break;

        //Update the password



    case 'passwordChange':
        //echo "This is the passwordChange case"; 
        //exit; 
        $selector = filter_input(INPUT_POST, 'selector', FILTER_SANITIZE_STRING);
        $validator =  $_SESSION['test'];
        $userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        $userPW_R = filter_input(INPUT_POST, 'userPW_R', FILTER_SANITIZE_STRING);


        if (empty($userPW) || empty($userPW_R)) {
            $_SESSION["resetMessage"] = "You left a field empty.";
            header("Location: /create-new-password?newpwd=empty");
            exit();
        } else if ($userPW != $userPW_R) {
            $_SESSION["resetMessage"] = "Passwords do not match.";
            header("Location: /create-new-password?newpwd=pwdnotsame");
            exit();
        }


        $currentDate = Date("U");
        //var_dump($currentDate); 
        //exit; 
        $validate = passwordValidate($currentDate, $selector);
        //var_dump($validate); 
        //exit; 
        $pwdResetSelector = $validate['pwdResetSelector'];
        $pwdResetToken = $validate['pwdResetToken'];


        //var_dump($pwdResetSelector); 
        //exit; 
        if ($selector === $pwdResetSelector) {
            $tokenBin = hex2bin($validator);
            //echo $tokenBin;
            //echo "This is the tokenBin."; 
            //exit; 
            $tokenCheck = password_verify($tokenBin, $validate["pwdResetToken"]);
            //var_dump($tokenCheck); 
            // exit; 


            if ($tokenCheck === true) {

                $userName = $validate["pwdResetUserName"];
                //var_dump($userName); 
                //exit; 
                $new_hashed_password = password_hash($userPW, PASSWORD_DEFAULT);
                //echo $new_hashed_password;  
                //exit; 
                $updatePWD  = passwordUpdate($userName, $new_hashed_password);
                $deleteToken = deletePwdToken($pwdResetUserName);
                $_SESSION["resetMessage"] = "Password was successfully changed. <br> Please login. ";
                header("Location: ../login/?message=success");
            } elseif ($tokenCheck === false) {

                $_SESSION["resetMessage"] = "You need to re-submit your reset request";
                exit;
            } elseif ($selector !== $pwdResetSelector) {

                $_SESSION["resetMessage"] = "You need to re-submit your reset request_1.";
                header("Location: /create-new-password");
                exit;
            }
        }
        break;


    case  'pwd':
        $_SESSION['pwd'] = "True";
        header('location: /account/password');
        break;


    case 'activities':
        //echo "This is the activities case.";
        //exit;
        //filter and store email and password
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $thursday_1 = filter_input(INPUT_POST, 'thursday_1', FILTER_SANITIZE_STRING);
        $thursday_2 = filter_input(INPUT_POST, 'thursday_2', FILTER_SANITIZE_STRING);
        $thursday_3 = filter_input(INPUT_POST, 'thursday_3', FILTER_SANITIZE_STRING);
        $thursday_4 = filter_input(INPUT_POST, 'thursday_4', FILTER_SANITIZE_STRING);
        $thursday_5 = filter_input(INPUT_POST, 'thursday_5', FILTER_SANITIZE_STRING);
        $thursday_6 = filter_input(INPUT_POST, 'thursday_6', FILTER_SANITIZE_STRING);
        $friday_1 = filter_input(INPUT_POST, 'friday_1', FILTER_SANITIZE_STRING);
        $friday_2 = filter_input(INPUT_POST, 'friday_2', FILTER_SANITIZE_STRING);
        $saturday_1 = filter_input(INPUT_POST, 'saturday_1', FILTER_SANITIZE_STRING);
        $saturday_2 = filter_input(INPUT_POST, 'saturday_2', FILTER_SANITIZE_STRING);

        //Send the data to the database 
        $actOutcome = regActivity($userId, $thursday_1, $thursday_2, $thursday_3, $thursday_4, $thursday_5, $thursday_6, $friday_1, $friday_2, $saturday_1, $saturday_2);

        // $activityData = getActivity($userId);
        $_SESSION['activityData'] = $activityData;
        // Check and report the result
        if ($actOutcome === 1) {


            $_SESSION['message'] = "<p>Thanks for registering your activities $firstName.</p>";
            header('Location: /registration_3');
            exit;
        } else {
            $_SESSION['message'] = "<p>Sorry $firstName, but the registration failed. Please try again.</p>";
            header('Location: /registration_2');
            exit;
        }


        break;
    case 'meals':
        //filter and store form data

        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $meal_1 = filter_input(INPUT_POST, 'meal_1', FILTER_SANITIZE_STRING);
        $meal_2 = filter_input(INPUT_POST, 'meal_2', FILTER_SANITIZE_STRING);
        $meal_3 = filter_input(INPUT_POST, 'meal_3', FILTER_SANITIZE_STRING);
        $meal_4 = filter_input(INPUT_POST, 'meal_4', FILTER_SANITIZE_STRING);
        $meal_5 = filter_input(INPUT_POST, 'meal_5', FILTER_SANITIZE_STRING);
        $meal_6 = filter_input(INPUT_POST, 'meal_6', FILTER_SANITIZE_STRING);
        $meal_7 = filter_input(INPUT_POST, 'meal_7', FILTER_SANITIZE_STRING);
        $meal_8 = filter_input(INPUT_POST, 'meal_8', FILTER_SANITIZE_STRING);

        //echo $userId, $meal_1, $meal_2, $meal_3, $meal_4, $meal_5, $meal_6, $meal_7, $meal_8;


        //Send the data to the database 
        $mealOutcome = regMeal($userId, $meal_1, $meal_2, $meal_3, $meal_4, $meal_5, $meal_6, $meal_7, $meal_8);

        // $mealData = getMeal($userId);
        $_SESSION['mealData'] = $mealData;
        // Check and report the result
        if ($mealOutcome === 1) {


            $_SESSION['message'] = "<p>Thanks for registering your meals $firstName.</p>";
            header('Location: /registration_3');
            exit;
        } else {
            $_SESSION['message'] = "<p>Sorry $firstName, but the registration failed. Please try again.</p>";
            header('Location: /registration_3');
            exit;
        }


        break;

    case 'volunteers':
        //echo "this is the volunteers case"; 
        //exit; 
        //Filter and store the form data:  


        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $checkEmail = checkEmail($email);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $preferred_contact = filter_input(INPUT_POST, 'preferred_contact', FILTER_SANITIZE_STRING);
        $thursday = filter_input(INPUT_POST, 'thursday', FILTER_SANITIZE_STRING);
        $friday = filter_input(INPUT_POST, 'friday', FILTER_SANITIZE_STRING);
        $saturday = filter_input(INPUT_POST, 'saturday', FILTER_SANITIZE_STRING);

        //echo $firstName, $lastName, $phone, $email, $preferred_contact, $thursday, $friday, $saturday; 
        //exit; 

        //Checking for an existing email address in the table
        $emailMatch = checkExistingEmail($email);
        if ($emailMatch === 1) {
            $_SESSION['message_3'] = "This email has already been used. Please use a different email.";
            header('Location: /volunteers');
            exit;
        }


        $volunteer = volunteerUser($firstName, $lastName, $email, $phone, $preferred_contact, $thursday, $friday, $saturday);
        $volunteerInfo = getVolunteer($email);
        //var_dump($volunteerInfo); 
        //exit; 
        $user_Id = $volunteerInfo['user_Id'];
        // echo $user_Id; 
        // exit; 
        if (!empty($thursday)) {
            $thur_Data = thursdayData($thursday, $user_Id);
        }
        if (!empty($friday)) {
            $frid_Data = fridayData($friday, $user_Id);
        }
        if (!empty($saturday)) {
            $sat_Data = saturdayData($saturday, $user_Id);
        }

        $getDesc = getDescription($user_Id);

        $_SESSION['volunteerInfo'] = $volunteerInfo;
        $_SESSION['getDesc'] = $getDesc;
        //var_dump($_SESSION['getDesc']); 
        //exit; 
        //$_SESSION['volunteerData'] = $volunteerData; 
        // Check and report the result
        if ($volunteer === 1) {
            setcookie('firstName', $firstName, strtotime('+1 year'), "/");

            $_SESSION['message_3'] = "<p>Thanks for signing up $firstName.</p>";

            header('Location: /sign-up');
            exit;
        } else {
            $_SESSION['message_3'] = "<p>Sorry $firstName, but the registration failed. Please try again.</p>";
            header('Location: /volunteers');
            exit;
        }


        break;

    case 'age':

        $result = getDataByAge();
        $resultArray = json_encode($result);


        //$ageArray = array ($age[0]['age'], $age[1]['age'], $age[2]['age'], $age[3]['age'], $age[4]['age'], $age[5]['age'] );
        //$countArray = array ($age[0]['Count(email)'], $age[1]['Count(email)'], $age[2]['Count(email)'], $age[3]['Count(email)'], $age[4]['Count(email)'], $age[5]['Count(email)'], $age[6]['Count(email)']);

        //var_dump($resultArray); 
        //exit; 
        header("Location: /reports");
        break;


    case 'volunteer':
        header('Location: /volunteers');
        break;

    case 'help_needed':
        $volunteerInfo = getVolunteer($email);
        $display = $buildVolunteerDisplay($volunteerInfo);
        $_SESSION['display'] = $display;
        header('Location: /help-needed');
        break;

    case 'update':
        $_SESSION['loggedin'] = true;
        include '../view/client-update.php';
        break;

    case 'logout':
        unset($_SESSION);
        $_SESSION['userLevel'];
        $_SESSION['loggedin'] = false;
        session_destroy();

        header('Location: /account/login');
        break;


    case 'mail':
        // echo "This is the mail case statement."; 
        header('Location /help-needed');
        exit;


    case 'login':
        include '../view/login.php';
        break;
    case 'registration':
        include '/registration';
        break;
}
