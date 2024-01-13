<?php
//echo "This is the Arizona Controller"; 
//exit; 
// Create or access a Session
session_start();

//var_dump($_SESSION['loggedin']); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
// Get the functions library
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
//Get the arizona-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/arizona_model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mailer.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    
//***************************************************************************************************************************************
//*******************************************************Arizona FUNCTION Cases *********************************************************
//***************************************************************************************************************************************

case 'arizonaSubmit': 
 
        $_SESSION['conf1'];  
        $conf1 = $_SESSION['conf1']; 
        $_SESSION['AZ_Array'];
      
        //var_dump($_SESSION['AZ_Array']);
        //exit;  
        $act_1 = $_SESSION['AZ_Array'][0];
        $act_2 = $_SESSION['AZ_Array'][1];
        //$act_3 = $_SESSION['AZ_Array'][2];
        //$act_4 = $_SESSION['AZ_Array'][3];
        $act_5 = $_SESSION['AZ_Array'][2];
        $meal_1 = $_SESSION['AZ_Array'][3];
        $keynote_1 = $_SESSION['AZ_Array'][4];
        $confId = $_SESSION['AZ_Array'][5];
        $userId = $_SESSION['AZ_Array'][6];
        $emergencyName =  $_SESSION['AZ_Array'][7];
        $emergencyPhone =  $_SESSION['AZ_Array'][8];
     
        //Place the data collected in Step3 array into a session variable 
      
        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];
        //var_dump($_SESSION['dataArray']); 
        //exit; 
        $userId = $_SESSION['dataArray']['0'];
        $userName = $_SESSION['dataArray']['1'];
        $firstName = $_SESSION['dataArray']['2'];
        $lastName = $_SESSION['dataArray']['3'];
        $userEmail = $_SESSION['dataArray']['4'];
        $address = $_SESSION['dataArray']['5'];
        $city = $_SESSION['dataArray']['6'];
        $state = $_SESSION['dataArray']['7'];
        $county  = $_SESSION['dataArray']['8'];
        $zipcode = $_SESSION['dataArray']['9'];
        $country = $_SESSION['dataArray']['10'];
        $phone = $_SESSION['dataArray']['11'];
        $age = $_SESSION['dataArray']['12'];
        $gender = $_SESSION['dataArray']['13'];
        $widowed = $_SESSION['dataArray']['14'];
        $conf = $_SESSION['dataArray']['15'];



        $_SESSION['userName'];
        $userName = $_SESSION['userName'];


        $userIdMatch = isRegisteredAZConf($userId);

        if ($userIdMatch === 1) {
            $_SESSION['Id'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for "  . $conf1 . "</p>";
            header('Location: /account/profile');
            exit;
        }

        //Update any new user information that was changed in step2        
        $updateUser = updateClient($userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf);


        //get new user Data after update is completed
        $clientData = getUser($userName);
        // Remove the password from the array the array_pop function removes the last element from an array
        //unset($clientData['pwd']); 
        $userData = $clientData; 
        // var_dump($userData); 
        //exit; 

    //Insert step3 data into the database 
    $AZInsert = arizona($userId, $confId);
    if (!$AZInsert) {
        $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
        header('location: /conferences/arizonal-regional/arizona-registration');
        exit;
    } else {
      ///echo $act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8;
      //exit;  
            
        $azActInsert = azAct($userId, $act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $keynote_1);
        if ($azActInsert === 0) {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            header('location: /conferences/arizona-regional/arizona-registration');
            exit;
        } else {
            $azMealInsert =  azMeal($userId, $meal_1);
            if ($azMealInsert === 0) {
                $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                header('location: /conferences/arizona-regional/arizona-registration');
                exit;
            } else {
                $azOtherInsert =  az_Other($userId, $emergencyName, $emergencyPhone);
         
                if ($azOtherInsert === 0) {
                    $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                    header('location: /conferences/arizona-regional/arizona-registration');
                    exit;  
                    } else {
                        $_SESSION['success'] = "<p class='success'> You have successfully registered for the " . $conf1 . " Conference. An email has been sent. </p>";
                        $_SESSION['arizona'] = "True";
                        //get the user details 
                        $getUserDets = getUserDetails($userName); 
                        //var_dump($getUserDets); 
                        //exit; 
                        //send details for sending a confirmation email
                        $getUserInfo = userDetailsMessage($getUserDets, $firstName, $lastName, $userEmail, $conf1);
                        $_SESSION['confId2'] = $confId;
                        $_SESSION['conf2'] = $conf1;
                        header("location: /arizona/index.php?action=arizona");
                    }
                }
            }
        }
    
    break;

case 'arizonaGuest': 
if(isset($_SESSION['arizonaGuest_Id'])){ 
$arizonaGuest_Id = $_SESSION['arizonaGuest_Id']; 
}else{ 
 $arizonaGuest_Id = $_GET['arizonaGuest_Id']; // Outputs: value1
} 
 $confId = $_GET['confId'];

 //Are they registered for the Arizona Conference 

        $check_AZ_Reg = isRegisteredAZGConf($arizonaGuest_Id);
         
        if (!$check_AZ_Reg) {
            $_SESSION['arizona'] = "False";
              $_SESSION['success'] = "<p class='success'>This registration has previously been cancelled.</p>"; 
             header('location: /conferences/arizona-regional/arizona-registration?error="noMatch'); 
        } else {
            
            $getRegData = isRegisteredAZGData($arizonaGuest_Id);
             $_SESSION['getRegData'] = $getRegData; 
           
            $_SESSION['complete'] = "TRUE";
            $_SESSION['guestloggedin'] = "True"; 
            $_SESSION['guestUpdate'] = "True";  
            $_SESSION['arizonaGuest_Id'] = $arizonaGuest_Id; 
            $_SESSION['confId'] = $confId; 
            header('location: /account/guest-update');
        }


//echo $arizonaGuest_Id; 

break; 


case 'step3_AZ': 
            //Collect Form Data 
            $act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
            $act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
            //$act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
            //$act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
            $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
            $meal_1 = filter_input(INPUT_POST, 'meal_1', FILTER_SANITIZE_STRING);
            $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
            $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
            $userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
            $emergencyName =  filter_input(INPUT_POST, 'emergencyName', FILTER_SANITIZE_STRING);
            $emergencyPhone =  filter_input(INPUT_POST, 'emergencyPhone', FILTER_SANITIZE_STRING);

            $format = formatPhoneNumber($emergencyPhone);
            $emergencyPhone = $format;
 
        //Error Handling:   
        if (empty($act_1 || $act_2 /*|| $act_3 || $act_4 */|| $act_5 || $meal_1 ||$keynote_1|| $confId|| $emergencyName || $emergencyPhone )) {
            $_SESSION['message'] = "<p>Please fill in the indicated fields.</p>";
            header('Location: /account/step_3');
            exit;
        }
            //Place the data collected in Step3 array into a session variable 
            $AZ_Array = array($act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $meal_1, $keynote_1, $confId, $emergencyName, $emergencyPhone);
            // print_r($AZ_Array); 
            //exit; 
           

            $confId2 = $confId; 
            //Get the Conference Name based on the $confId; 
            $confName = getConfId($confId2);
            $conf1 = $confName[0]['conf_Name']; 

            //Store Session Variables;  
            $_SESSION['AZ_Array'] = $AZ_Array;
            $_SESSION['conf1'] = $conf1;  
            $_SESSION['confId'] = $confId; 
            header('location: /arizona/index.php?action=arizonaGuestSubmit'); 
            break; 
            

case 'arizonaGuestSubmit': 
//echo "This is the guest Submit case"; 
//exit; 
        $_SESSION['conf1'];  
        $conf1 = $_SESSION['conf1']; 
        $_SESSION['confId']; 

        $_SESSION['AZ_Array'];
      
        //var_dump($_SESSION['AZ_Array']);
        //exit;  
        $act_1 = $_SESSION['AZ_Array'][0];
        $act_2 = $_SESSION['AZ_Array'][1];
        //$act_3 = $_SESSION['AZ_Array'][2];
        //$act_4 = $_SESSION['AZ_Array'][3];
        $act_5 = $_SESSION['AZ_Array'][2];
        $meal_1 = $_SESSION['AZ_Array'][3];
        $keynote_1 = $_SESSION['AZ_Array'][4];
        $confId = $_SESSION['AZ_Array'][5];
        $emergencyName =  $_SESSION['AZ_Array'][6];
        $emergencyPhone =  $_SESSION['AZ_Array'][7];
     
        //Place the data collected in Step3 array into a session variable 
      
        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];
      
         
        $firstName = $_SESSION['dataArray']['0'];
        $lastName = $_SESSION['dataArray']['1'];
        $userEmail = $_SESSION['dataArray']['2'];
        $address = $_SESSION['dataArray']['3'];
        $city = $_SESSION['dataArray']['4'];
        $state = $_SESSION['dataArray']['5'];
        $county  = $_SESSION['dataArray']['6'];
        $zipcode = $_SESSION['dataArray']['7'];
        $country = $_SESSION['dataArray']['8'];
        $phone = $_SESSION['dataArray']['9'];
        $age = $_SESSION['dataArray']['10'];
        $gender = $_SESSION['dataArray']['11'];
        $widowed = $_SESSION['dataArray']['12'];
        $conf = $_SESSION['dataArray']['13'];
       

        //Check for a match in the Arizona Guest Table based on UserEmail, first and last names 
        $userMatch = checkExistingGuest($firstName, $lastName, $userEmail); 
        //echo $userMatch; 
        //exit; 

        if($userMatch === 1){ 
            $_SESSION['Id'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This guest is already registered for "  . $conf1 . " Conference </p>";
            unset($_SESSION['guestConf']); 
            unset($_SESSION['guestloggedin']); 
            unset($_SESSION['guest']);

            header('Location: /conferences/arizona-regional/arizona-registration');
            exit;
        }
        
    //Insert step3 data into the database 
    $AZGuestInsert = arizonaGuest($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $confId);
    if (!$AZGuestInsert) {
        $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
        header('location: /conferences/arizonal-regional/arizona-registration');
        exit;
    } else {
      ///echo $act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8;
      //exit;  
        $lastGuest_Id = getArizonaGuestId($userEmail, $firstName, $lastName); 
        $arizonaGuest_Id = $lastGuest_Id[0]['arizonaGuest_Id']; 
        
        $azActInsert = azGuest_Act($arizonaGuest_Id, $act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $keynote_1);
        if (!$azActInsert) {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            //Delete data from the previous step if there isn't a successful entry for this step 

            header('location: /conferences/arizona-regional/arizona-registration');
            exit;
        } else {
            $azMealInsert =  azGuest_Meal($arizonaGuest_Id, $meal_1);
             
            if ($azMealInsert === 0) {
                $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                //Delete data from the previous step if there isn't a successful entry for this step 

                header('location: /conferences/arizona-regional/arizona-registration');
                exit;
            } else {
                $azOtherInsert =  azGuest_Other($arizonaGuest_Id, $emergencyName, $emergencyPhone);
         
                if ($azOtherInsert === 0) {
                    $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                   //Delete data from the previous step if there isn't a successful entry for this step 
                
                    header('location: /conferences/arizona-regional/arizona-registration');
                    exit;  
                    } else {
                        $_SESSION['success'] = "<p class='success'> You have successfully registered for the " . $conf1 . " Conference. An email has been sent. </p>";
                        $_SESSION['arizonaGuest'] = "True";
                        //get the user details 
                        $getUserDets = getGuestUserDetails($arizonaGuest_Id);
                       
                        //send details for sending a confirmation email
                        $getUserInfo = guestDetailsMessage($getUserDets, $firstName, $lastName, $userEmail, $conf1);
                        
                        $_SESSION['confId2'] = $confId;
                        $_SESSION['conf2'] = $conf1;
                        unset($_SESSION['guestConf']); 
                        unset($_SESSION['guestloggedin']); 
                        unset($_SESSION['guest']);
                        header("location: /conferences/arizona-regional/arizona-registration");
                    }
                }
            }
        }
       
    break;


case 'arizona': 
//Check if they are registered for Arizona1, if so build the display:
  //echo "This is the arizona case"; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //echo $userId; 
        $_SESSION['conf4'];
        $conf1 = $_SESSION['conf4']; 
       // echo $_SESSION['conf4'];
       // exit; 
        //echo $_SESSION['confId2'];
        $getId = getConfId($conf1);
             
        //Are they registered for the Arizona Conference 
        $check_AZ_Reg = isRegisteredAZConf($userId);
        
        if (!$check_AZ_Reg) {
            $_SESSION['arizona'] = "False";
             header('location: /conferences/arizona-regional/arizona-registration'); 
        } else {
             $_SESSION['arizona'] = "True";
            $getRegData = isRegisteredAZData($userId);
             
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildAZ = AZConf($getRegData);


            $_SESSION['buildAZ'] = $buildAZ;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $conf3 = $getConfName[0]['conf_Name'];
            $_SESSION['conf11'] = $conf3; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId11'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
           
           
            header('location: /conferences/arizona-regional/arizona-registration');
        }

        break;
case 'AZUpdate': 
//echo "This is the Arizona Update function"; 
//exit;
$_SESSION['userId'];
    //echo $_SESSION['userId']; 
    //exit; 
$userId = $_SESSION['userId'];
$confId2 = $_GET['confId3']; 
//echo $confId; 
//exit;  

$confName = getConfId($confId2);     
//var_dump($confName[0]['conf_Name']); exit; 
$conf1 = $confName[0]["conf_Name"];
//echo $conf1; exit; 

/*Are they registered for the Remarried Conference */
$check_AZ_Reg = isRegisteredAZConf($userId);

        if (! $check_AZ_Reg) {
            $_SESSION['arizona'] = "False";
             header('location: /conferences/arizona-regional/arizona-registration/'); 
        } else {
             $_SESSION['arizona'] = "True";
            $getRegData = isRegisteredAZData($userId);
            //var_dump($getRegData); 
            //exit;
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            
            $conf4= $getConfName[0]['conf_Name'];
            $_SESSION['conf4'] = $conf4; 
            //echo $_SESSION['conf4']; 
            //exit; 
            $_SESSION['confId4'] = $confId;

            //echo $_SESSION['confId4']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";

           $_SESSION['userId'] = $userId; 
           $_SESSION['getRegDataAZ'] = $getRegData;
           //var_dump($_SESSION['getRegDataAZ']); exit; 
            
            //echo $_SESSION['conf1']; exit; 
           
            $_SESSION['idahoUP'] = "FALSE";
            $_SESSION['remUP'] = "FALSE";
            $_SESSION['SaUP'] = "FALSE";
            $_SESSION['AzUp'] = "TRUE"; 
             
            header('Location: /account/reg-update-1');
        }
        break;

case 'AzUpdate_2':
//echo "This is theAZUpdate_2 case"; 
//exit; 
$_SESSION['conf1']; 
$conf1 = $_SESSION['conf4']; 
//echo $conf1;
//exit;

$act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
$act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
$act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
$act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
$act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
$keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
$meal_1 = filter_input(INPUT_POST, 'meal_1', FILTER_SANITIZE_STRING);
$confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
$userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
$emergencyName =  filter_input(INPUT_POST, 'emergencyName', FILTER_SANITIZE_STRING);
$emergencyPhone =  filter_input(INPUT_POST, 'emergencyPhone', FILTER_SANITIZE_STRING);

var_dump($act_1, $act_2, $act_3, $act_4, $act_5, $keynote_1, $confId, $userId, $emergencyName, $emergencyPhone); 
exit;


 //Insert step3 data into the database 
    
        $AzActInsert = az_ActUp($act_1, $act_2, $act_3, $act_4, $act_5, $keynote_1, $userId);
        $AzMealInsert =  az_MealUp( $meal_1, $userId);
        $AzOtherInsert =  az_OtherUp($userId, $emergencyName, $emergencyPhone);
        if(!$AzActInsert AND !$AzMealInsert AND !$AzOtherInsert){ 
            $_SESSION['success'] = "<p class='success'> No information was updated. </p>";
            header("location: /arizona/index.php?action=arizona");
            exit; 
        }else{ 
                        $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the " . $conf1 . " Conference </p>";
                        $_SESSION['arizona'] = "True";
                        $_SESSION['confId4'] = $confId;
                        $_SESSION['conf4'] = $conf1;
                        header("location: /arizona/index.php?action=arizona");
        }   
break; 

case 'AZGUpdate': 
//echo "This is the Arizona Guest Update function"; 
//exit;
$_SESSION['arizonaGuest_Id'];
    
        $_SESSION['confId4']; 
        $confId4 = $_GET['confId4']; 
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId4);
        
        $conf1 = $getConfName[0]['conf_Name'];
      
        /*Are they registered for the Remarried Conference */
         $check_AZ_Reg = isRegisteredAZConf($userId);

        if (! $check_AZ_Reg) {
            $_SESSION['arizona'] = "False";
             header('location: /conferences/arizona-regional/arizona-registration/'); 
        } else {
             $_SESSION['arizona'] = "True";
            $getRegData = isRegisteredAZData($userId);
            //var_dump($getRegData); 
            //exit;
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            
            $conf4= $getConfName[0]['conf_Name'];
            $_SESSION['conf4'] = $conf4; 
            //echo $_SESSION['conf4']; 
            //exit; 
            $_SESSION['confId4'] = $confId;

            //echo $_SESSION['confId4']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";

           $_SESSION['userId'] = $userId; 
           $_SESSION['getRegDataAZ'] = $getRegData;
           //var_dump($_SESSION['getRegDataAZ']); exit; 
            
            //echo $_SESSION['conf1']; exit; 
           
            $_SESSION['idahoUP'] = "FALSE";
            $_SESSION['remUP'] = "FALSE";
            $_SESSION['SaUP'] = "FALSE";
            $_SESSION['AzGUp'] = "True"; 
            $_SESSION['AzUp'] = "False"; 
             
            header('Location: /account/reg-update-1');
        }
        break;
case 'AZDelete':
        $_SESSION['AzCancel'] = "True"; 
        $_SESSION['SaCancel'] = "False";
        $_SESSION['remCancel'] = "False";
        $_SESSION['iCancel'] = "False";
        $_SESSION['AzGCancel'] = "False";
        $_SESSION['userId'];

        $confId3 = $_GET['confId3']; 
         
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId3);
        //var_dump($getConfName); 
        //exit; 
        $conf1 = $getConfName[0]['conf_Name']; 
        $_SESSION['conf11'] =  $conf1; 
        
      
        $_SESSION['userId'] = $userId; 
        $_SESSION['confId11'] = $confId3;
        
        header('Location: /account/reg_cancel');
        break;

case 'AZDelConf':
//echo "This is the Arizona Conf Delete Case"; 
//exit; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId11'];
        $confId = $_SESSION['confId11']; 
        $cancel = cancelAZReg1($userId);
        $cancel2 = cancelAZReg2($userId); 
        $cancel3 = cancelAZReg3($userId); 
        $cancel4 = cancelAZReg4($userId); 
  
        $check_AzReg = isRegisteredAzConf($userId);
        if ($check_AzReg == 0) {

         

            $_SESSION['arizona'] = "False"; 
            $_SESSION['success'] = '<p class="success"> You have successfully cancelled your registration for '. $_SESSION['conf11'] . ' Conference </p>';
               // echo $check_IdReg; 
            unset($_SESSION['array']);
            unset($_SESSION['confId11']);
            unset($_SESSION['conf11']);
            unset($_SESSION['buildAZ']);
            header('location: /account/profile');
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /account/profile");
            break;
        }

        break;

case 'guestUpdateAZ' :
//echo "This is the Guest Update AZ case"; 
//exit; 
$_SESSION['arizonaGuest_Id']; 
$arizonaGuest_Id = $_SESSION['arizonaGuest_Id']; 
$check_AZ_Reg = isRegisteredAZGConf($arizonaGuest_Id);
         
        if (!$check_AZ_Reg) {
            $_SESSION['arizona'] = "False";
             header('location: /conferences/arizona-regional/arizona-registration?error="noMatch'); 
        } else {
            
            $getRegData = isRegisteredAZGData($arizonaGuest_Id);
             $_SESSION['getRegData'] = $getRegData; 
             
        }  
$_SESSION['confId']; 
$confId = $_SESSION['confId'];

$getConf = getConfId($confId); 

$conf1 = $getConf[0]['conf_Name']; 
$_SESSION['confName'] = $conf1; 

$arizonaGuest_Id = $_SESSION['arizonaGuest_Id']; 

$act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
$act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
$act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
$act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
$act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
$keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
$meal_1 = filter_input(INPUT_POST, 'meal_1', FILTER_SANITIZE_STRING);
$confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
$emergencyName =  filter_input(INPUT_POST, 'emergencyName', FILTER_SANITIZE_STRING);
$emergencyPhone =  filter_input(INPUT_POST, 'emergencyPhone', FILTER_SANITIZE_STRING);

 


 //Insert step3 data into the database 
    
        $AzActInsert = az_GActUp($act_1, $act_2, $act_3, $act_4, $act_5, $keynote_1, $arizonaGuest_Id);
        $AzMealInsert =  az_GMealUp( $meal_1, $arizonaGuest_Id);
        $AzOtherInsert =  az_GOtherUp($arizonaGuest_Id, $emergencyName, $emergencyPhone);

        if(!$AzActInsert AND !$AzMealInsert AND !$AzOtherInsert){ 
            $_SESSION['success'] = "<p class='success'> No information was updated. </p>";
            header("location: /account/guest-update");
            exit; 
        }else{ 
                        $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the " . $conf1 . " Conference </p>";
                        $_SESSION['arizona'] = "True";
                        $_SESSION['confId4'] = $confId;
                        $_SESSION['conf4'] = $conf1;
                        header("location: /account/guest-update");
        } 
        break;    
case 'AZGDelete':
        $_SESSION['arizonaGuest_Id'];
        $_SESSION['AzCancel'] = "False"; 
        $_SESSION['SaCancel'] = "False";
        $_SESSION['remCancel'] = "False";
        $_SESSION['iCancel'] = "False";
        $_SESSION['arizonaGuest_Id'];
        $_SESSION['AzGCancel'] = "True";
     
        $confId = $_GET['confId']; 
        $confName = getConfId($confId); 
        $conf1 = $confName[0]['conf_Name']; 
        
        $userId = $_SESSION['userId'];
        $_SESSION['confName'] = $conf1;
        
        $_SESSION['confId'] = $confId;
        
        header('Location: /account/reg_cancel');
        break;


case 'AZGDelConf':

        $_SESSION['arizonaGuest_Id'];
        $_SESSION['confName'];
        $arizonaGuest_Id = $_SESSION['arizonaGuest_Id'];
        $_SESSION['confId11'];
        $confId = $_SESSION['confId11']; 
        $cancel = cancelAZGReg1($arizonaGuest_Id);
        $cancel2 = cancelAZGReg2($arizonaGuest_Id); 
        $cancel3 = cancelAZGReg3($arizonaGuest_Id); 
        $cancel4 = cancelAZGReg4($arizonaGuest_Id); 
  
        $check_AzReg = isRegisteredAzGConf($arizonaGuest_Id);
        if ($check_AzReg == 0) {

         

            $_SESSION['arizonaGuest'] = "False"; 
            $_SESSION['success'] = '<p class="success"> You have successfully cancelled your registration for '. $_SESSION['confName'] . ' Conference </p>';
               // echo $check_IdReg; 
            unset($_SESSION['array']);
            unset($_SESSION['confId11']);
            unset($_SESSION['conf11']);
            unset($_SESSION['getRegData']);
            unset($_SESSION['guest']); 
            unset($_SESSION['guestloggedin']); 
            unset($_SESSION['guestUpdateAZ']); 
            header('location: /conferences/arizona-regional/arizona-registration');
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /account/guest-update");
            break;
        }

        break;
}
