<?php
//echo "This is the USERS Controller"; 
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


    case 'userAccount':
        unset($_SESSION['matchingUser']);
        //Get data from user inport on the form: 
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

        //Check database for a matching account already: 
        $checkforAccount = checkForAccount($firstName, $lastName);
        //If there isn't a match: 
        if (!$checkforAccount) {
            $_SESSION['matchingUser'] = "There is no user with that first and last name combo.";
        } else {
            //If there is a match: 
            //Show a display with the matching name and location: 
            $matchingUser = displayUserAccount($checkforAccount);
            $_SESSION['matchingUser'] = $matchingUser;
            header("Location: /account/admin");
        }



        break;

    case 'clear':
        unset($_SESSION['matchingUser']);
        header("location: /account/admin");
        break;

    case 'message':
        //echo "this is the message case"; 
        //exit; 
        //filter and store email and password

        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        //echo $message;  
        //exit; 
        $messageOutcome = updateMessage($message, $userId);
        //echo $messageOutcome; 
        //exit; 

        if ($messageOutcome == 1) {
            //grab the newest message; 


            $message = getMessage();
            //var_dump($message); 
            //exit;


            //get the user emails; 
            $getEmail = getEmails();
            //var_dump($getEmail); 
            //exit;  
            // $_SESSION['getEmail'] = $getEmail; 
            //$send = testEmailSend(); 
            $send = sendUpdateEmail($getEmail, $message);
            //$text = sendText($message); 

            //var_dump($send); 
            //exit; 
            if ($send === 1) {
                $_SESSION['emailMessage'] = "Your email has been sent.";
            }
            header("Location: /profile");
        }
        break;


    case 'registr':
        // echo "this is the registr case"; 
        $_SESSION['clientData'];
        $clientData = $_SESSION['clientData'];

        //echo $clientData['userId']; 
        //exit; 
        $registr = "TRUE";

        $_SESSION['registr'] = $registr;
        header('location: /conf_Reg');
        break;



    case 'step1':

        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $conf1 = filter_input(INPUT_POST, 'conf1', FILTER_SANITIZE_NUMBER_INT);
        $_SESSION['guestAZ'];
        //$_SESSION['guestStG']; 
        //Get the conference Id/Name based on the selected option. 
        $getConfId = getconfId($conf1);

        $conf1 = $getConfId[0]['conf_Name'];
        //echo $conf1; 
        //exit; 
        $confId = $getConfId[0]['conf_Id'];
        // echo $confId; 
        //exit; 

        $_SESSION['clientData'];
        $phone = $_SESSION['clientData']['phone'];
        $format = formatPhoneNumber($phone);
        $_SESSION['phone'] = $format;
        //echo $_SESSION['phone']; 
        //exit; 
        //store variables into session variables 
        $_SESSION['userId'] = $userId;
        //echo $_SESSION['userId']; 
        //exit; 
        $_SESSION['confId'] = $confId;
        $_SESSION['conf1'] = $conf1;

        $_SESSION['dataArray'];
        $_SESSION['part2'] = "TRUE";
        //var_dump($_SESSION['dataArray']); 
        //exit;  
        //echo $userId, $_SESSION['conf1']; 
        //exit; 
        if (isset($_SESSION['guestAZ'])) {
            header("location: /account/site-registration");
        } else {
            //redirect to next step in the registration process: 
            header("location: /account/conf_reg2");
        }

        break;


    case 'walkin':

        $_SESSION['userId'];
        $_SESSION['walk1'] = 'TRUE';
        $_SESSION['walk2'] = "FALSE";


        header("location: /account/walkin-registration");

        break;

    case 'walk1':
        //echo "This is 'walk1 case";  
        //filter and store user input data into variables


        $adminId = filter_input(INPUT_POST, 'adminId', FILTER_SANITIZE_NUMBER_INT);
        $conf1 = filter_input(INPUT_POST, 'conf1', FILTER_SANITIZE_NUMBER_INT);
        //Get the conference Id/Name based on the selected option. 
        $getConfId = getconfId($conf1);

        $conf1 = $getConfId[0]['conf_Name'];
        //echo $conf1; 
        //exit; 
        $confId = $getConfId[0]['conf_Id'];

        //Store the confId in a session variable; 
        $_SESSION['confId'] = $confId;
        $_SESSION['userId'] = $adminId;
        //echo $_SESSION['userId']; 
        // exit; 
        $_SESSION['walk1'] = "FALSE";
        $_SESSION['walk2'] = "TRUE";
        //redirect to next step in the registration process: 
        header("location: /account/walkin-registration");


        break;
    case 'walk2':
        $_SESSION['walk2'] = "FALSE";
        $conf1 = $_SESSION['conf1'];


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
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_NUMBER_INT);
        $adminId =  filter_input(INPUT_POST, 'adminId', FILTER_SANITIZE_NUMBER_INT);

        //echo $adminId; 
        //exit; 

        $dataArray = array($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $adminId);
        $_SESSION['dataArray'] = $dataArray;

        //var_dump($_SESSION['dataArray']); 
        //exit; 
        $_SESSION['userId'] = $adminId;
        $_SESSION['conf1'] = $conf1;
        $_SESSION['confId'] = $confId;
        // echo $_SESSION['userId'] . "This is the Walk2 SessionUserId"; 
        //exit; 
        $_SESSION['walk3'] = "TRUE";
        //redirect to next step in the registration process: 
        header("location: /account/walkin-registration");

        break;
    case 'walk3':

        //Idaho form data 
        $act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
        $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
        $meal_1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal_2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $workshop_1 = filter_input(INPUT_POST, 'workshop_1', FILTER_SANITIZE_STRING);
        $workshop_2 = filter_input(INPUT_POST, 'workshop_2', FILTER_SANITIZE_STRING);
        $workshop_3 = filter_input(INPUT_POST, 'workshop_3', FILTER_SANITIZE_STRING);
        $workshop_4 = filter_input(INPUT_POST, 'workshop_4', FILTER_SANITIZE_STRING);
        $workshop_5 = filter_input(INPUT_POST, 'workshop_5', FILTER_SANITIZE_STRING);
        $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
        $keynote_2 = filter_input(INPUT_POST, 'keynote_2', FILTER_SANITIZE_STRING);
        $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        $adminId = filter_input(INPUT_POST, 'adminId', FILTER_SANITIZE_NUMBER_INT);

        //echo $adminId; 
        // exit; 

        $Idaho_Array = array(
            $act_4, $act_5, $meal_1, $meal_2, $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5,
            $keynote_1, $keynote_2, $church, $confId, $adminId
        );


        $_SESSION['Idaho_Array'] = $Idaho_Array;

        if ($confId == "7") {
            header('location:/users/index.php?action=idahoSubmitWalkin');
            exit;
        } elseif ($confId == "8") {
            header('location: /users/index.php?action=remarriedSubmitWalkin');
            exit;
        }

        break;

    case 'step2':
        //echo "This is the step2 case"; 
        //exit; 
        //filter and store user input data into variables
        // Filter and store the data
        $conf1 = $_SESSION['conf1'];
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
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
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_NUMBER_INT);
        //store variables into session variables 

        $dataArray = array($userId, $userName, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf);
        $_SESSION['dataArray'] = $dataArray;
        //var_dump($_SESSION['dataArray']); 
        //exit; 

        $_SESSION['userId'] = $userId;
        $_SESSION['conf1'] = $conf1;
        $_SESSION['confId'] = $confId;
        $_SESSION['dataArray'];
        $_SESSION['part3'] = "TRUE";
        //var_dump($_SESSION['dataArray']); 
        //exit;  
        //echo $userId, $_SESSION['conf1']; 
        //exit; 
        //redirect to next step in the registration process: 
        header("location: /account/step_3");


        break;


    case 'step3':

        //echo "This is the step3 case"; 
    
        $_SESSION['conf1'];
        $_SESSION['confId'];
        $_SESSION['guestConf'];
 
        $confId = $_SESSION['confId'];

        // Filter and store the data
        /* $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $conf1 = $_SESSION['conf1'];
        $lake = filter_input(INPUT_POST, 'lake', FILTER_SANITIZE_STRING);
        $bike =  filter_input(INPUT_POST, 'bike', FILTER_SANITIZE_STRING);
        $temple = filter_input(INPUT_POST, 'temple', FILTER_SANITIZE_STRING);
        $hike1 = filter_input(INPUT_POST, 'hike1', FILTER_SANITIZE_STRING);
        $hike2 = filter_input(INPUT_POST, 'hike2', FILTER_SANITIZE_STRING);
        $pickleball = filter_input(INPUT_POST, 'pickleball', FILTER_SANITIZE_STRING);
        $axe = filter_input(INPUT_POST, 'axe', FILTER_SANITIZE_STRING);
        $fireside = filter_input(INPUT_POST, 'fireside', FILTER_SANITIZE_STRING);
        $meet_greet = filter_input(INPUT_POST, 'meet_greet', FILTER_SANITIZE_STRING);
        $keynote = filter_input(INPUT_POST, 'keynote', FILTER_SANITIZE_STRING);
        $square = filter_input(INPUT_POST, 'square', FILTER_SANITIZE_STRING);
        $afterParty = filter_input(INPUT_POST, 'afterParty', FILTER_SANITIZE_STRING);
        $cleanup = filter_input(INPUT_POST, 'cleanup', FILTER_SANITIZE_STRING);

*/

        /*** This data comes from the Remarried Registration Form **********/
       /* $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $firstName2 = filter_input(INPUT_POST, 'attendee2FN', FILTER_SANITIZE_STRING);
        $lastName2 = filter_input(INPUT_POST, 'attendee2LN', FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);
        $task1 = filter_input(INPUT_POST, 'task1', FILTER_SANITIZE_STRING);
        $task2 = filter_input(INPUT_POST, 'task2', FILTER_SANITIZE_STRING);
        $task3 = filter_input(INPUT_POST, 'task3', FILTER_SANITIZE_STRING);
        $task4 = filter_input(INPUT_POST, 'task4', FILTER_SANITIZE_STRING);
        $allergies = filter_input(INPUT_POST, 'allergies', FILTER_SANITIZE_STRING);
        $diet1 = filter_input(INPUT_POST, 'diet1', FILTER_SANITIZE_STRING);
        $diet2 = filter_input(INPUT_POST, 'diet2', FILTER_SANITIZE_STRING);
        $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        $userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);

        //echo $status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet, $payment, $userId, $conf1, $confId; 
        //exit; 

        //Idaho form data 
        $act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
        $act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
        $act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
        $act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
        $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
        $meal_1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal_2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $workshop_1 = filter_input(INPUT_POST, 'workshop_1', FILTER_SANITIZE_STRING);
        $workshop_2 = filter_input(INPUT_POST, 'workshop_2', FILTER_SANITIZE_STRING);
        $workshop_3 = filter_input(INPUT_POST, 'workshop_3', FILTER_SANITIZE_STRING);
        $workshop_4 = filter_input(INPUT_POST, 'workshop_4', FILTER_SANITIZE_STRING);
        $workshop_5 = filter_input(INPUT_POST, 'workshop_5', FILTER_SANITIZE_STRING);
        $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
        $keynote_2 = filter_input(INPUT_POST, 'keynote_2', FILTER_SANITIZE_STRING);
        $lodging = filter_input(INPUT_POST, 'lodging', FILTER_SANITIZE_STRING);
        $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);






        //var_dump($dataArray); 
        //exit; 
        //Put all the data from the list above into an array
        $array = array($userId, $lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup);
        //Put all the data from the list above into an array
        $array1 = array($status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId);

        $Idaho_Array = array(
            $act_1, $act_2, $act_3, $act_4, $act_5, $meal_1, $meal_2, $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5,
            $keynote_1, $keynote_2, $lodging, $church, $confId, $userId
        );


        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'] = $array;
        $_SESSION['array1'] = $array1; //remarried data 
        $_SESSION['Idaho_Array'] = $Idaho_Array;


        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];
        if ($confId == "7") {
            header('location:/users/index.php?action=idahoSubmit');
            
        } 
        if ($confId == "8") {
            header('location: /users/index.php?action=remarriedSubmit');
            
        }
        */
         if ($confId == "10") {
            
            /* This data comes from the San Antonio Form ***************************** */
            $act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
            $act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
            $act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
            $act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
            $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
            $act_6 = filter_input(INPUT_POST, 'act_6', FILTER_SANITIZE_STRING);
            $act_7 = filter_input(INPUT_POST, 'act_7', FILTER_SANITIZE_STRING);
            $meal_1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
            $meal_2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
            $workshop_1 = filter_input(INPUT_POST, 'workshop_1', FILTER_SANITIZE_STRING);
            $workshop_2 = filter_input(INPUT_POST, 'workshop_2', FILTER_SANITIZE_STRING);
            $workshop_3 = filter_input(INPUT_POST, 'workshop_3', FILTER_SANITIZE_STRING);
            $workshop_4 = filter_input(INPUT_POST, 'workshop_4', FILTER_SANITIZE_STRING);
            $workshop_5 = filter_input(INPUT_POST, 'workshop_5', FILTER_SANITIZE_STRING);
            $workshop_6 = filter_input(INPUT_POST, 'workshop_6', FILTER_SANITIZE_STRING);
            $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
            $keynote_2 = filter_input(INPUT_POST, 'keynote_2', FILTER_SANITIZE_STRING);
            $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);
            $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
            $userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
            $emergencyName =  filter_input(INPUT_POST, 'emergencyName', FILTER_SANITIZE_STRING);
            $emergencyPhone =  filter_input(INPUT_POST, 'emergencyPhone', FILTER_SANITIZE_STRING);
            $foodNeeds =  filter_input(INPUT_POST, 'foodNeeds', FILTER_SANITIZE_STRING);

            $format = formatPhoneNumber($emergencyPhone);
            $emergencyPhone = $format;

            //Place the data collected in Step3 array into a session variable 
            $SA_Array = array(
                $act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8, $meal_1, $meal_2, $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5,
                $workshop_6, $keynote_1, $keynote_2, $church, $confId, $userId, $emergencyName, $emergencyPhone, $foodNeeds
            );

            $_SESSION['SA_Array'] = $SA_Array; //San Antonio Data
            header('location: /users/index.php?action=sanAntonioSubmit');
            
        } 
        
        elseif ($confId == '11') {
            //echo "This is the step 3 case for arizona"; 
            /* This data comes from the Arizona Form ***************************** */
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
             
            //Place the data collected in Step3 array into a session variable 
            $AZ_Array = array($act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $meal_1, $keynote_1, $confId, $userId, $emergencyName, $emergencyPhone);
            //print_r($AZ_Array); 
            //exit; 
            $_SESSION['AZ_Array'] = $AZ_Array; //Arizona Data
            //var_dump($_SESSION['AZ_Array']); exit; 
            if ($_SESSION['guestConf'] == "True") {
                header('location: /arizona/index.php?action=arizonaGuestSubmit');
                
            } else {
                header('location: /arizona/index.php?action=arizonaSubmit');
                
            }
        }
        break;


    case 'step4':

        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'];

        //The data collected in Step3 for the Remarried Life Conf 
        $_SESSION['array1'] = $array1;
        //var_dump($_SESSION['array']); 
        //exit; 

        $_SESSION['conf1'];
        $_SESSION['userId'];
        $conf1 = $_SESSION['conf1'];
        $userId = $_SESSION['userId'];
        $topic1 = filter_input(INPUT_POST, 'topic1', FILTER_SANITIZE_STRING);
        $topic2 = filter_input(INPUT_POST, 'topic2', FILTER_SANITIZE_STRING);
        $topic3 = filter_input(INPUT_POST, 'topic3', FILTER_SANITIZE_STRING);
        $topic4 = filter_input(INPUT_POST, 'topic4', FILTER_SANITIZE_STRING);
        $topic5 = filter_input(INPUT_POST, 'topic5', FILTER_SANITIZE_STRING);
        $topic6 = filter_input(INPUT_POST, 'topic6', FILTER_SANITIZE_STRING);
        $topic7 = filter_input(INPUT_POST, 'topic7', FILTER_SANITIZE_STRING);
        $topic8 = filter_input(INPUT_POST, 'topic8', FILTER_SANITIZE_STRING);
        $topic9 = filter_input(INPUT_POST, 'topic9', FILTER_SANITIZE_STRING);
        $topic10 = filter_input(INPUT_POST, 'topic10', FILTER_SANITIZE_STRING);
        $topic11 = filter_input(INPUT_POST, 'topic11', FILTER_SANITIZE_STRING);

        //Create an array of topics then loop through them, to create an array with selected fields 
        $topicArray = array($topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11);


        $checkedTopic = array();
        foreach ($topicArray as $topic) {
            if ($topic != "")
                array_push($checkedTopic, $topic);
        }
        $topicArray = array($topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11);
        $_SESSION['topicArray'] = $topicArray;
        //var_dump($_SESSION['topicArray']); 
        // exit; 

        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];

        $_SESSION['checkedTopic'] = $checkedTopic;
        //var_dump($_SESSION['checkedTopic']); 
        //exit; 
        $_SESSION['part5'] = "TRUE";
        //var_dump($_SESSION['dataArray']); 
        //exit;  
        header("location: /account/conf_reg5");

        break;

    case 'step_5':

        //collect user data 
        $meal1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $meal3 = filter_input(INPUT_POST, 'meal3', FILTER_SANITIZE_STRING);


        $_SESSION['meal1'] = $meal1;
        $_SESSION['meal2'] = $meal2;
        $_SESSION['meal3'] = $meal3;



        $_SESSION['part6'] = "TRUE";
        header("location: /account/conf_reg6");


        break;

    case 'step5':

        /*  $emergency = filter_input(INPUT_POST, 'emergency', FILTER_SANITIZE_STRING);
        $emer_phone = filter_input(INPUT_POST, 'emer_phone', FILTER_SANITIZE_STRING);
        $allergy = filter_input(INPUT_POST, 'allergy', FILTER_SANITIZE_STRING);
        $volunteer = filter_input(INPUT_POST, 'volunteer', FILTER_SANITIZE_STRING);
        $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
*/


        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'];
        //var_dump($_SESSION['array']); 
        //exit; 

        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];
        //var_dump($_SESSION['dataArray']); 
        //exit;  
        //Carry forward data that was entered on step4
        $_SESSION['topicArray']; // contains all the values from the form; 
        $topicArray = $_SESSION['topicArray'];
        //var_dump($topicArray); 
        //exit; 
        //var_dump($topicArray); 
        // exit; 
        $_SESSION['checkedTopic'];
        $checkedTopic = $_SESSION['checkedTopic'];
        //var_dump($checkedTopic); 
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

        $lake = $_SESSION['array']['1'];
        $bike = $_SESSION['array']['2'];
        $temple = $_SESSION['array']['3'];
        $hike1 = $_SESSION['array']['4'];
        $hike2 = $_SESSION['array']['5'];
        $pickleball = $_SESSION['array']['6'];
        $axe = $_SESSION['array']['7'];
        $fireside = $_SESSION['array']['8'];
        $meet_greet = $_SESSION['array']['9'];
        $keynote = $_SESSION['array']['10'];
        $square = $_SESSION['array']['11'];
        $afterParty = $_SESSION['array']['12'];
        $cleanup = $_SESSION['array']['13'];

        $firstTopic = $checkedTopic['0'];
        $secondTopic = $checkedTopic['1'];
        $thirdTopic = $checkedTopic['2'];


        $topic1 = $topicArray[0];
        $topic2 = $topicArray[1];
        $topic3 = $topicArray[2];
        $topic4 = $topicArray[3];
        $topic5 = $topicArray[4];
        $topic6 = $topicArray[5];
        $topic7 = $topicArray[6];
        $topic8 = $topicArray[7];
        $topic9 = $topicArray[8];
        $topic10 = $topicArray[9];
        $topic11 = $topicArray[10];



        $_SESSION['meal1'];
        $_SESSION['meal2'];
        $_SESSION['meal3'];
        $meal1 = $_SESSION['meal1'];
        $meal2 = $_SESSION['meal2'];
        $meal3 = $_SESSION['meal3'];

        $_SESSION['confId'];
        $confId = $_SESSION['confId'];

        //echo $meal1, $meal2, $meal3; 
        //exit; 

        //echo $firstTopic, $secondTopic, $thirdTopic; 
        //exit; 

        //echo $userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf; 
        //exit; 
        //echo $userId, $conf1, $lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup; 
        //exit; 
        //Checking for an existing userId in the cache table
        $userIdMatch = checkExistingUserId($userId, $confId);
        if ($userIdMatch === 1) {
            $_SESSION['register'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for  $_SESSION[conf1] </p>";
            header('Location: /success');
            exit;
        }

        //Update any new user information that was changed in step2        
        $updateUser = updateClient($userId, $userName, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf);

        //get new user Data after update is completed
        $clientData = getUser($userName);
        // Remove the password from the array the array_pop function removes the last element from an array
        $userData = array_pop($clientData);
        // var_dump($userData); 
        //exit; 
        //var_dump($userId, $firstTopic, $secondTopic, $thirdTopic, $topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11); 
        //exit; 
        //Insert step3 data into the database  
        $confAct = confActivity($lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup, $userId, $confId);
        //echo $confAct; 
        //exit; 
        if ($confAct === 1) {

            //Insert chosen topics to the database

            $insertTopic = topicInsert($firstTopic, $secondTopic, $thirdTopic, $topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11, $userId);
            if (!$insertTopic) {
                exit;
            }
            //Insert Meal Choices to the database
            $meals = whichMeals($userId, $meal1, $meal2, $meal3);

            //Insert the Extra Info 
            $additonalInfo = extraInfo($userId, $emergency, $emer_phone, $allergy, $volunteer, $payment);


            $_SESSION['success'] = "<p class='success'> You have successfully registered for the  $_SESSION[conf1] </p>";

            header("location: /users/index.php?action=success");
            break;
        } else {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            header("location: /profile");
        }
        break;

    case 'cache':


        $_SESSION['conf1'];
        $_SESSION['confId'];

        $_SESSION['userName'];
        $userName = $_SESSION['userName'];



        //grab userName to get user details for success page 
        $clientData = getUser($userName);
        //var_dump($clientData); 
        //exit; 
        $userId = $_SESSION['clientData']['userId'];
        $check_Reg = isRegisteredConf($userId);




        $_SESSION['register'] = "True";
        $_SESSION['userId'];


        $_SESSION['complete'] = "TRUE";

        //there is a $userMatch so continue onward: 
        $clientData = getUser($userName);
        $userId = $clientData[0]['userId'];
        // Remove the password from the array the array_pop function removes the last element from an array
        $userData = array_pop($clientData);
        // Store the array into the session
        $level = $userData['level'];
        $_SESSION['userLevel'] = $level;

        $_SESSION['cacheReg'] = "True";
        $_SESSION['knoxReg'] = "False";

        $_SESSION['clientData'] = $userData;
        header("location: /success ");



        break;

    case 'knox':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['conf2'];
        $_SESSION['confId2'];
        $getId = getConfId($conf1);
        /*Are they registered for the Knoxville Conference */
        /*Are they registered for the Knoxville Conference */
        $check_KReg = isRegisteredKConf($userId);

        if ($check_KReg != 1) {
            $_SESSION['knox'] = "False";
        } else {
            $_SESSION['knox'] = "True";
            $getRegData = isRegisteredKData($userId);
            //var_dump($getRegData[0]['conf_Id']); 
            //exit;   
            $confId = $getRegData[0]['conf_Id'];

            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildKnox = knoxConf($getRegData);


            $conf2 = $getConfName[0]['conf_Name'];
            //$_SESSION['conf2'] = $conf2; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['buildKnox'] = $buildKnox;

            $_SESSION['complete'] = "TRUE";
            $_SESSION['knoxReg'] = "True";
            header("location: /success");
        }





        break;

    case 'rLife':

        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //echo $userId; 
        $_SESSION['conf1'];
        //echo $_SESSION['conf1'];
        $_SESSION['confId2'];
        //echo $_SESSION['confId2'];
        $getId = getConfId($conf1);

        /*Are they registered for the Remarried Life Conference */
        $check_RLReg = isRegisteredRLConf($userId);

        if (!$check_RLReg) {
            $_SESSION['remarried'] = "False";
        } else {
            $_SESSION['remarried'] = "True";
            $getRegData = isRegisteredRLData($userId);
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildRL = rLifeConf($getRegData);
            $_SESSION['buildRL'] = $buildRL;
            //var_dump($_SESSION['buildRL']); exit; 
            $conf2 = $getConfName[0]['conf_Name'];
            $_SESSION['conf2'] = $conf2;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 


            $_SESSION['complete'] = "TRUE";
            $_SESSION['remarried'] = "True";
            header('location: /conferences/remarried-conference/remarried-registration');
        }

        break;


    case 'remarriedSubmit':
        $_SESSION['array1'];
        $_SESSION['conf1'];
        $conf1 = $getConfName[0]['conf_Name'];
        //var_dump($_SESSION['array1']); 
        $status = $_SESSION['array1'][0];
        $firstName2 = $_SESSION['array1'][1];
        $lastName2 = $_SESSION['array1'][2];
        $comment = $_SESSION['array1'][3];
        $social = $_SESSION['array1'][4];
        $task1 = $_SESSION['array1'][5];
        $task2 = $_SESSION['array1'][6];
        $task3 = $_SESSION['array1'][7];
        $task4 = $_SESSION['array1'][8];
        $allergies = $_SESSION['array1'][9];
        $diet1 = $_SESSION['array1'][10];
        $diet2 = $_SESSION['array1'][11];
        $payment = $_SESSION['array1'][12];
        $userId =  $_SESSION['array1'][13];
        $confId = $_SESSION['array1'][14];
        // echo $status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet, $payment, $userId, $conf1, $confId; 
        //exit; 

        //Put all the data from the list above into an array
        $array = array($status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId);

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


        $userIdMatch = isRegisteredRLConf($userId);

        if ($userIdMatch === 1) {
            $_SESSION['RL'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for"  . $_SESSION['conf1'] . "</p>";
            header('Location: /conferences/remarried-conference/remarried-registration');
            exit;
        }

        //Update any new user information that was changed in step2        
        $updateUser = updateClient($userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf);


        //get new user Data after update is completed
        $clientData = getUser($userName);
        // Remove the password from the array the array_pop function removes the last element from an array
        $userData = array_pop($clientData);
        // var_dump($userData); 
        //exit; 



        //Insert step3 data into the database  
        $confAct = remarriedAct($status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId);
        if ($confAct === 0) {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            header("location: /account/profile");
        } else {


            $_SESSION['success'] = "<p class='success'> You have successfully registered for the " . $_SESSION['conf1'] . "</p>";
            $_SESSION['remarried'] = "True";
            $_SESSION['confId2'] = $confId;

            header("location: /users/index.php?action=rLife");
        }
        break;

    case 'spouse':
        //echo "This is the spouse case"; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];

        $check_RLReg = isRegisteredRLConf($userId);

        if ($check_RLReg != 1) {
            $_SESSION['remarried'] = "False";
        } else {
            $_SESSION['remarried'] = "True";
            $getRegData = isRegisteredRLData($userId);
            // var_dump($getRegData[0]); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildRL = rLifeConf($getRegData);
            $conf2 = $getConfName[0]['conf_Name'];
            $_SESSION['conf2'] = $conf2;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['buildRL'] = $buildRL;

            $statusCheck = checkForPerson2($userId);
            $_SESSION['statusCheck'] = $statusCheck;
            $_SESSION['spouse'] = "TRUE";
            $_SESSION['remarried'] = "True";
            header('location: /users/index.php?action=rLife');
        }


        break;
    case 'idaho':

        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //echo $userId; 
        $_SESSION['conf1'];
        //echo $_SESSION['conf1'];
        //exit; 
        //echo $_SESSION['confId2'];
        $getId = getConfId($conf1);

        /*Are they registered for the Remarried Life Conference */
        $check_Idaho_Reg = isRegisteredIdConf($userId);

        if (!$check_Idaho_Reg) {
            $_SESSION['idaho'] = "False";
        } else {
            $_SESSION['idaho'] = "True";
            $getRegData = isRegisteredIdData($userId);
            //var_dump($getRegData); 
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildId = IdahoConf($getRegData);
            //var_dump($buildId); exit; 

            $_SESSION['buildId'] = $buildId;
            //var_dump($_SESSION['buildRL']); exit; 
            $conf2 = $getConfName[0]['conf_Name'];
            //$_SESSION['conf2'] = $conf2; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";

            header('location: /conferences/idaho-regional-conference/idaho-registration');
        }

        break;

    case 'idahoSubmit':
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];
        $_SESSION['Idaho_Array'];
        //var_dump($_SESSION['Idaho_Array']); 
        //exit; 
        //var_dump($_SESSION['array1']); 
        $act_1 = $_SESSION['Idaho_Array'][0];
        $act_2 = $_SESSION['Idaho_Array'][1];
        $act_3 = $_SESSION['Idaho_Array'][2];
        $act_4 = $_SESSION['Idaho_Array'][3];
        $act_5 = $_SESSION['Idaho_Array'][4];
        $meal_1 = $_SESSION['Idaho_Array'][5];
        $meal_2  = $_SESSION['Idaho_Array'][6];
        $workshop_1 = $_SESSION['Idaho_Array'][7];
        $workshop_2 = $_SESSION['Idaho_Array'][8];
        $workshop_3 = $_SESSION['Idaho_Array'][9];
        $workshop_4 = $_SESSION['Idaho_Array'][10];
        $workshop_5 = $_SESSION['Idaho_Array'][11];
        $keynote_1 = $_SESSION['Idaho_Array'][12];
        $keynote_2 = $_SESSION['Idaho_Array'][13];
        $lodging = $_SESSION['Idaho_Array'][14];
        $church = $_SESSION['Idaho_Array'][15];
        $confId = $_SESSION['Idaho_Array'][16];
        $userId = $_SESSION['Idaho_Array'][17];


        // echo $meal_1, $meal_2; 
        //exit; 


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


        $userIdMatch = isRegisteredIdConf($userId);

        if ($userIdMatch === 1) {
            $_SESSION['Id'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for"  . $conf1 . "</p>";
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
        $idahoInsert = idaho($userId, $confId);
        if (!$idahoInsert) {
            $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
            header('location: /conferences/idaho-regional-conference/idaho-registration');
            exit;
        } else {
            ///echo $act_1, $act_2, $act_3, $act_4;
            //exit;  
            $idahoActInsert = idahoAct($userId, $act_1, $act_2, $act_3, $act_4, $act_5);
            if ($idahoActInsert === 0) {
                $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                header('location: /conferences/idaho-regional-conference/idaho-registration');
                exit;
            } else {
                $idahoMealInsert =  idahoMeal($userId, $meal_1, $meal_2);
                if ($idahoMealInsert === 0) {
                    $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                    header('location: /conferences/idaho-regional-conference/idaho-registration');
                    exit;
                } else {
                    $idahoClassInsert =  idahoClasses(
                        $workshop_1,
                        $workshop_2,
                        $workshop_3,
                        $workshop_4,
                        $workshop_5,
                        $keynote_1,
                        $keynote_2,
                        $userId
                    );
                    if ($idahoClassInsert === 0) {
                        $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                        header('location: /conferences/idaho-regional-conference/idaho-registration');
                        exit;
                    } else {
                        $idahoOtherInsert =  idahoOther($userId, $lodging, $church);
                        if ($idahoOtherInsert === 0) {
                            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                            header('location: /conferences/idaho-regional-conference/idaho-registration');
                            exit;
                        } else {
                            $_SESSION['success'] = "<p class='success'> You have successfully registered for the " . $conf1 . "</p>";
                            $_SESSION['idaho'] = "True";
                            $_SESSION['confId2'] = $confId;
                            $_SESSION['conf2'] = $conf1;
                            header("location: /users/index.php?action=idaho");
                        }
                    }
                }
            }
        }
        break;

    case 'idahoSubmitWalkin':
        //echo "This is the Idaho Submit Walkin case"; 
        //exit; 
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];
        $_SESSION['Idaho_Array'];
        //var_dump($_SESSION['Idaho_Array']); 
        //exit; 
        //var_dump($_SESSION['array1']);
        $act_4 = $_SESSION['Idaho_Array'][0];
        $act_5 = $_SESSION['Idaho_Array'][1];
        $meal_1 = $_SESSION['Idaho_Array'][2];
        $meal_2  = $_SESSION['Idaho_Array'][3];
        $workshop_1 = $_SESSION['Idaho_Array'][4];
        $workshop_2 = $_SESSION['Idaho_Array'][5];
        $workshop_3 = $_SESSION['Idaho_Array'][6];
        $workshop_4 = $_SESSION['Idaho_Array'][7];
        $workshop_5 = $_SESSION['Idaho_Array'][8];
        $keynote_1 = $_SESSION['Idaho_Array'][9];
        $keynote_2 = $_SESSION['Idaho_Array'][10];
        $church = $_SESSION['Idaho_Array'][11];
        $confId = $_SESSION['Idaho_Array'][12];


        $act_1 = "No";
        $act_2 = "No";
        $act_3 = "No";

        // echo $meal_1, $meal_2; 
        //exit; 

        //Carry forward the data that was entered on step2
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
        $adminId = $_SESSION['dataArray'][14];

        $userMatch = checkExistingWalkinReg($firstName, $lastName, $userEmail);
        if ($userMatch) {
            $_SESSION['alert'] = "<p class='alert'> A Walkin Registration with that name and email combination already exists. </p>";
            header('location: /conferences/idaho-regional-conference/idaho-registration');
            exit;
        } else {
            $idahoWalkinInsert =   idahoWalkinContact($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $adminId);

            if (!$idahoWalkinInsert) {
                $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
                header('location: /conferences/idaho-regional-conference/idaho-registration');
                exit;
            } else {
                $walkin_Id = getWalkinId($firstName, $lastName, $userEmail);
                //var_dump($walkin_Id); 
                //exit; 
                $walkin_id = $walkin_Id[0]['walkin_id'];
                //Insert step3 data into the database 
                $idahoInsert = idahoWalkin($walkin_id, $adminId, $confId);
                if (!$idahoInsert) {
                    $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
                    header('location: /conferences/idaho-regional-conference/idaho-registration');
                    exit;
                } else {

                    ///echo $act_1, $act_2, $act_3, $act_4;
                    //exit;  
                    $idahoActInsert = idahoWalkinActivities($act_1, $act_2, $act_3, $act_4, $act_5, $church, $walkin_id, $adminId);
                    if ($idahoActInsert === 0) {
                        $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                        header('location: /conferences/idaho-regional-conference/idaho-registration');
                        exit;
                    } else {
                        $idahoMealInsert =  idahoWalkinMeal($adminId, $meal_1, $meal_2, $walkin_id);
                        if ($idahoMealInsert === 0) {
                            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                            header('location: /conferences/idaho-regional-conference/idaho-registration');
                            exit;
                        } else {
                            $idahoClassInsert =  idahoWalkinClasses(
                                $workshop_1,
                                $workshop_2,
                                $workshop_3,
                                $workshop_4,
                                $workshop_5,
                                $keynote_1,
                                $keynote_2,
                                $walkin_id,
                                $adminId
                            );

                            if ($idahoClassInsert === 0) {
                                $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                                header('location: /conferences/idaho-regional-conference/idaho-registration');
                                exit;
                            } else {
                                $_SESSION['idaho'] = "True";
                                $_SESSION['confId2'] = $confId;
                                $_SESSION['conf2'] = $conf1;
                                header("location: /users/index.php?action=idahoWalkinSuccess");
                            }
                        }
                    }
                }
            }
        }
        break;

    case "idahoWalkinSuccess":

        $_SESSION['idaho'] = "True";
        $getRegData = isRegisteredIDWData();
        $buildIdAdditionalRegs = IdahoWalkinConf($getRegData);
        //var_dump($buildIdAdditionalRegs); 
        //exit;             
        $_SESSION['buildIdAdditional'] = $buildIdAdditionalRegs;
        //var_dump($_SESSION['buildRL']); exit; 
        $conf2 = $getConfName[0]['conf_Name'];
        //$_SESSION['conf2'] = $conf2; 
        //echo $_SESSION['conf2']; 
        //exit; 
        $_SESSION['confId2'] = $confId;
        ///echo $_SESSION['confId2']; 
        //exit; 
        $_SESSION['complete'] = "TRUE";

        header('location: /account/reports-idaho/');



        break;
        // ***************************************************************************************************************
        // ************************ SAN ANTONIO SUBMIT FORM DATA *********************************************************
        // ***************************************************************************************************************
    case 'sanAntonio':

        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //echo $userId; 
        $_SESSION['conf1'];
        //echo $_SESSION['conf1'];
        //exit; 
        //echo $_SESSION['confId2'];
        $getId = getConfId($conf1);

        //Are they registered for the Remarried Life Conference 
        $check_SA_Reg = isRegisteredSAConf($userId);

        if (!$check_SA_Reg) {
            $_SESSION['sanAntonio'] = "False";
            header('location: /conferences/san-antonio-regional/san-antonio-registration');
        } else {
            $_SESSION['sanAntonio'] = "True";
            $getRegData = isRegisteredSAData($userId);
            var_dump($getRegData);
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
            $buildSA = SAConf($getRegData);


            $_SESSION['buildSA'] = $buildSA;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $conf3 = $getConfName[0]['conf_Name'];
            $_SESSION['conf3'] = $conf3;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId3'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";


            header('location: /conferences/san-antonio-regional/san-antonio-registration');
        }

        break;



    case 'sanAntonioSubmit':
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];
        $_SESSION['SA_Array'];

        //var_dump($_SESSION['array1']); 
        $act_1 = $_SESSION['SA_Array'][0];
        $act_2 = $_SESSION['SA_Array'][1];
        $act_3 = $_SESSION['SA_Array'][2];
        $act_4 = $_SESSION['SA_Array'][3];
        $act_5 = $_SESSION['SA_Array'][4];
        $act_6 = $_SESSION['SA_Array'][5];
        $act_7 = $_SESSION['SA_Array'][6];
        $act_8 = $_SESSION['SA_Array'][7];
        $meal_1 = $_SESSION['SA_Array'][8];
        $meal_2  = $_SESSION['SA_Array'][9];
        $workshop_1 = $_SESSION['SA_Array'][10];
        $workshop_2 = $_SESSION['SA_Array'][11];
        $workshop_3 = $_SESSION['SA_Array'][12];
        $workshop_4 = $_SESSION['SA_Array'][13];
        $workshop_5 = $_SESSION['SA_Array'][14];
        $workshop_6 = $_SESSION['SA_Array'][15];
        $keynote_1 = $_SESSION['SA_Array'][16];
        $keynote_2 = $_SESSION['SA_Array'][17];
        $church = $_SESSION['SA_Array'][18];
        $confId = $_SESSION['SA_Array'][19];
        $userId = $_SESSION['SA_Array'][20];
        $emergencyName =  $_SESSION['SA_Array'][21];
        $emergencyPhone =  $_SESSION['SA_Array'][22];
        $foodNeeds =  $_SESSION['SA_Array'][23];
        // echo $meal_1, $meal_2; 
        //exit; 


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


        $userIdMatch = isRegisteredSAConf($userId);

        if ($userIdMatch === 1) {
            $_SESSION['Id'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for"  . $conf1 . "</p>";
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
        $SAInsert = sanAntonio($userId, $confId);
        if (!$SAInsert) {
            $_SESSION['alert'] = "<p class='alert'> There has been an error, and you are not registered yet. </p>";
            header('location: /conferences/san-antonio-regional/san-antonio-registration');
            exit;
        } else {
            ///echo $act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8;
            //exit;  
            $sanActInsert = sanAct($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $userId);
            if ($sanActInsert === 0) {
                $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                header('location: /conferences/san-antonio-regional/san-antonio-registration');
                exit;
            } else {
                $sanAMealInsert =  sanAMeal($userId, $meal_1, $meal_2, $emergencyName, $emergencyPhone, $foodNeeds);
                if ($sanAMealInsert === 0) {
                    $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                    header('location: /conferences/san-antonio-regional/san-antonio-registration');
                    exit;
                } else {
                    $sanAClassInsert =  sanAClasses(
                        $workshop_1,
                        $workshop_2,
                        $workshop_3,
                        $workshop_4,
                        $workshop_5,
                        $workshop_6,
                        $keynote_1,
                        $keynote_2,
                        $church,
                        $userId
                    );

                    if ($sanAClassInsert === 0) {
                        $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
                        header('location: /conferences/san-antonio-regional/san-antonio-registration');
                        exit;
                    } else {
                        $_SESSION['success'] = "<p class='success'> You have successfully registered for the " . $conf1 . "</p>";
                        $_SESSION['idaho'] = "True";
                        //get the user details 
                        $getUserDets = getUserDetailsSA($userName);
                        //var_dump($getUserDets); 
                        //exit; 
                        //send details for sending a confirmation email
                        $getUserInfo = userDetailsMessageSA($getUserDets, $firstName, $lastName, $userEmail, $conf1);
                        $_SESSION['confId2'] = $confId;
                        $_SESSION['conf2'] = $conf1;
                        header("location: /users/index.php?action=sanAntonio");
                    }
                }
            }
        }

        break;

    case 'SaUpdate':

        $_SESSION['userId'];

        $_SESSION['confId3'];
        $confId2 = $_GET['confId3']; 
        $getConfName = getConfId($confId2);

        $conf1 = $getConfName[0]['conf_Name'];
        
        $userId = $_SESSION['userId'];
        
        /*Are they registered for the Remarried Conference */
        $check_SA_Reg = isRegisteredSAConf($userId);

        if (!$check_SA_Reg) {
            $_SESSION['sanAntonio'] = "False";
            header('location: /conferences/san-antonio-regional/san-antonio-registration');
        } else {
            $_SESSION['sanAntonio'] = "True";
            $getRegData = isRegisteredSAData($userId);
            //var_dump($getRegData); 
            //exit; 
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            $buildSA = SAConf($getRegData);
            $_SESSION['buildSA'] = $buildSA;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $getConfName = getConfId($confId2);
            $conf3 = $getConfName[0]['conf_Name'];
            $_SESSION['conf3'] = $conf3;
            
            $_SESSION['confId3'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";

            $_SESSION['userId'] = $userId;
            $_SESSION['getRegDataSA'] = $getRegData;
            //var_dump($_SESSION['getRegDataSA']); exit; 
            $_SESSION['getRegDataId'] = $getRegDataId;
            
            
            //echo $_SESSION['conf1']; exit; 
            $_SESSION['confId3'] = $confId3;
            $_SESSION['idahoUP'] = "FALSE";
            $_SESSION['remUP'] = "FALSE";
            $_SESSION['SaUP'] = "TRUE";
            header('Location: /account/reg-update-1');
        }
        break;

    case 'SaUpdate_2':
        //echo "This is the SaUpdate_2 case"; 

        $_SESSION['conf3'];
        $conf1 = $_SESSION['conf3'];


        $act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
        $act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
        $act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
        $act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
        $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
        $act_6 = filter_input(INPUT_POST, 'act_6', FILTER_SANITIZE_STRING);
        $act_7 = filter_input(INPUT_POST, 'act_7', FILTER_SANITIZE_STRING);
        $meal_1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal_2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $workshop_1 = filter_input(INPUT_POST, 'workshop_1', FILTER_SANITIZE_STRING);
        $workshop_2 = filter_input(INPUT_POST, 'workshop_2', FILTER_SANITIZE_STRING);
        $workshop_3 = filter_input(INPUT_POST, 'workshop_3', FILTER_SANITIZE_STRING);
        $workshop_4 = filter_input(INPUT_POST, 'workshop_4', FILTER_SANITIZE_STRING);
        $workshop_5 = filter_input(INPUT_POST, 'workshop_5', FILTER_SANITIZE_STRING);
        $workshop_6 = filter_input(INPUT_POST, 'workshop_6', FILTER_SANITIZE_STRING);
        $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
        $keynote_2 = filter_input(INPUT_POST, 'keynote_2', FILTER_SANITIZE_STRING);
        $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        $userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $emergencyName =  filter_input(INPUT_POST, 'emergencyName', FILTER_SANITIZE_STRING);
        $emergencyPhone =  filter_input(INPUT_POST, 'emergencyPhone', FILTER_SANITIZE_STRING);
        $foodNeeds =  filter_input(INPUT_POST, 'foodNeeds', FILTER_SANITIZE_STRING);



        //Insert step3 data into the database 

        $sanActInsert = sanActUp($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $userId);
        $sanAMealInsert =  sanAMealUp($userId, $meal_1, $meal_2, $emergencyName, $emergencyPhone, $foodNeeds);
        $sanAClassInsert =  sanAClassesUp(
            $workshop_1,
            $workshop_2,
            $workshop_3,
            $workshop_4,
            $workshop_5,
            $workshop_6,
            $keynote_1,
            $keynote_2,
            $church,
            $userId
        );
        if (!$sanActInsert and !$sanAMealInsert and !$sanAClassInsert) {
            $_SESSION['success'] = "<p class='success'> No information was updated. </p>";
            header("location: /users/index.php?action=sanAntonio");
            exit;
        } else {
            $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the " . $conf1 . " Conferenece </p>";
            $_SESSION['idaho'] = "True";
            $_SESSION['confId2'] = $confId;
            $_SESSION['conf2'] = $conf1;
            header("location: /users/index.php?action=sanAntonio");
        }
        break;




        //***************************************************************************************************************************************
        //***********************************************Knoxville Functions ********************************************************************
        //***************************************************************************************************************************************

    case 'knoxSubmit':

        // Filter and store the data
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);

        $allergies = filter_input(INPUT_POST, 'allergies', FILTER_SANITIZE_STRING);
        $hike = filter_input(INPUT_POST, 'hike', FILTER_SANITIZE_STRING);
        $bonfire =  filter_input(INPUT_POST, 'bonfire', FILTER_SANITIZE_STRING);
        $social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);
        $keynotes = filter_input(INPUT_POST, 'keynotes', FILTER_SANITIZE_STRING);
        $sacrament = filter_input(INPUT_POST, 'sacrament', FILTER_SANITIZE_STRING);
        $conf1 = filter_input(INPUT_POST, 'conf1', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);

        //For testing purposes:
        //echo $userId, $confId, $conf1, $allergies, $hike, $bonfire, $social, $keynotes, $sacrament; 
        //exit; 

        //Put all the data from the list above into an array
        $array = array($userId, $confId, $hike, $bonfire, $social, $keynotes, $sacrament);

        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'] = $array;


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


        $userIdMatch = isRegisteredKConf($userId);

        if ($userIdMatch === 1) {
            $_SESSION['knox'] = "True";
            $_SESSION['message_1'] = "<p class='success'>This user is already registered for  . $conf1 . </p>";
            header('Location: /success');
            exit;
        }

        //Update any new user information that was changed in step2        
        $updateUser = updateClient($userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf);


        //get new user Data after update is completed
        $clientData = getUser($userName);
        // Remove the password from the array the array_pop function removes the last element from an array
        $userData = array_pop($clientData);
        // var_dump($userData); 
        //exit; 

        //Insert step3 data into the database  
        $confAct = knoxActivity($allergies, $hike, $bonfire, $social, $keynotes, $sacrament, $userId, $confId);
        if ($confAct === 0) {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            header("location: /profile");
        } else {


            $_SESSION['success'] = "<p class='success'> You have successfully registered for the $conf1 </p>";
            $_SESSION['knox'] = "True";
            $_SESSION['confId2'] = $confId;
            $_SESSION['conf2'] = $conf1;
            header("location: /users/index.php?action=knox");
        }
        break;
    case 'knoxSuccess':

        // echo"this is the knoxSuccess case"; 
        //exit; 
        $_SESSION['confId2'];
        $_SESSION['conf2'];

        $_SESSION['userName'];
        $userName = $_SESSION['userName'];



        //grab userName to get user details for success page 
        $clientData = getUser($userName);
        //var_dump($clientData); 
        //exit; 
        $userId = $_SESSION['clientData']['userId'];
        /*Are they registered for the Knoxville Conference */
        $check_KReg = isRegisteredKConf($userId);

        if ($check_KReg != 1) {
            $_SESSION['knox'] = "False";
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not registered yet. </p>";
            header("location: /profile");
        } else {
            $_SESSION['knox'] = "True";
            $_SESSION['userId'];


            $_SESSION['complete'] = "TRUE";

            //there is a $userMatch so continue onward: 
            $clientData = getUser($userName);
            $userId = $clientData[0]['userId'];
            // Remove the password from the array the array_pop function removes the last element from an array
            $userData = array_pop($clientData);
            // Store the array into the session
            $level = $userData['level'];
            $_SESSION['userLevel'] = $level;
            $_SESSION['buildKnox'];

            $_SESSION['clientData'] = $userData;
            header("location: /success");
        }

        break;

    case 'username':

        //Grab the user input data
        $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);

        //echo $userEmail, $firstName, $lastName; 
        //exit; 
        $exist = checkUserName($userEmail, $firstName, $lastName);
        if ($exist === 0) {
            $_SESSION['userName'] = "No User with that info exists.";
            header("Location: /account/login");
        } else {
            $getName = getUserName($userEmail, $firstName, $lastName);
            // var_dump($getName); 
            //exit; 
            $userName = $getName['userName'];
            //echo $userName; 
            //exit; 

            $userNameEmail = retrieveUserName($userEmail, $userName);
            //$_SESSION['userNameEmail'] = $userNameEmail; 
            $_SESSION['userName'] = "Please check your email to get your username.";
            //exit; 
            //echo $userName; 
            //exit; 
            header("Location: /account/login?retrieval=success");
            break;
        }

        /* case 'regUpdate':
        //echo "This is the regUpdate1 case"; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //$ids = getId($userId); //get the conference Id to help update the registration

        //var_dump($ids); 
        //exit; 

        $confId = $ids[0]['conf_Id'];
        $getConfName = getConfName($confId);
        $conf1 = $getConfName[0]['conf_Name'];


        $_SESSION['conf1'] = $conf1;
        $_SESSION['confId'] = $confId;

        //Grab the activities to update registration
        $confDetails_1 = details_1($userId);
        $_SESSION['confDetails_1'] = $confDetails_1;

        $_SESSION['regUp_2'] = "TRUE";

        header('Location: /reg-update-1');

        break;
*/
    case 'regUpdate2':
        //filter and grab the form data to update: 
        // Filter and store the data
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $conf1 = $_SESSION['conf1'];
        $lake = filter_input(INPUT_POST, 'lake', FILTER_SANITIZE_STRING);
        $bike =  filter_input(INPUT_POST, 'bike', FILTER_SANITIZE_STRING);
        $temple = filter_input(INPUT_POST, 'temple', FILTER_SANITIZE_STRING);
        $hike1 = filter_input(INPUT_POST, 'hike1', FILTER_SANITIZE_STRING);
        $hike2 = filter_input(INPUT_POST, 'hike2', FILTER_SANITIZE_STRING);
        $pickleball = filter_input(INPUT_POST, 'pickleball', FILTER_SANITIZE_STRING);
        $axe = filter_input(INPUT_POST, 'axe', FILTER_SANITIZE_STRING);
        $fireside = filter_input(INPUT_POST, 'fireside', FILTER_SANITIZE_STRING);
        $meet_greet = filter_input(INPUT_POST, 'meet_greet', FILTER_SANITIZE_STRING);
        $keynote = filter_input(INPUT_POST, 'keynote', FILTER_SANITIZE_STRING);
        $square = filter_input(INPUT_POST, 'square', FILTER_SANITIZE_STRING);
        $afterParty = filter_input(INPUT_POST, 'afterParty', FILTER_SANITIZE_STRING);
        $cleanup = filter_input(INPUT_POST, 'cleanup', FILTER_SANITIZE_STRING);


        //Put all the data from the list above into an array
        $array = array($userId, $lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup);

        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'] = $array;
        //var_dump($array); 
        //exit; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];

        $_SESSION['conf1'];
        $_SESSION['confId'];

        //Grab the Topics to update the registration
        //Get Topics for the user 
        $confDetails_All = details_All($userId);
        $_SESSION['confDetails_All'] = $confDetails_All;
        //var_dump($_SESSION['confDetails_All']);
        // exit;
        //$getTopicId = topicId($description);


        $_SESSION['confDetails_2'] = $confDetails_2;
        $_SESSION['regUp_3'] = "TRUE";


        header('Location: /reg-update-2');

        break;

    case 'regUpdate_3':
        $_SESSION['userId'];
        $_SESSION['confDetails_3'];
        //var_dump($_SESSION['confDetails_3']); 
        //exit; 
        $userId = $_SESSION['userId'];

        $topic1 = filter_input(INPUT_POST, 'topic1', FILTER_SANITIZE_STRING);
        $topic2 = filter_input(INPUT_POST, 'topic2', FILTER_SANITIZE_STRING);
        $topic3 = filter_input(INPUT_POST, 'topic3', FILTER_SANITIZE_STRING);
        $topic4 = filter_input(INPUT_POST, 'topic4', FILTER_SANITIZE_STRING);
        $topic5 = filter_input(INPUT_POST, 'topic5', FILTER_SANITIZE_STRING);
        $topic6 = filter_input(INPUT_POST, 'topic6', FILTER_SANITIZE_STRING);
        $topic7 = filter_input(INPUT_POST, 'topic7', FILTER_SANITIZE_STRING);
        $topic8 = filter_input(INPUT_POST, 'topic8', FILTER_SANITIZE_STRING);
        $topic9 = filter_input(INPUT_POST, 'topic9', FILTER_SANITIZE_STRING);
        $topic10 = filter_input(INPUT_POST, 'topic10', FILTER_SANITIZE_STRING);
        $topic11 = filter_input(INPUT_POST, 'topic11', FILTER_SANITIZE_STRING);



        //Create an array of topics then loop through them, to create an array with selected fields 
        $topicArray = array($topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11);
        //var_dump($topicArray); 
        //exit; 

        $checkedTopic = array();
        foreach ($topicArray as $topic) {
            if ($topic != "")
                array_push($checkedTopic, $topic);
        }
        $topicArray = array($topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11);
        $_SESSION['topicArray'] = $topicArray;
        $_SESSION['checkedTopic'] = $checkedTopic;
        //var_dump($_SESSION['checkedTopic']); 
        //exit; 



        //var_dump($confDetails_3); 
        //exit; 

        $mealId = getMealId($userId);

        $_SESSION['mealId'] = $mealId;
        //var_dump($mealId); 
        //exit; 



        $_SESSION['regUp_4'] = "TRUE";
        //Get Extra Info for the user 
        header('Location: /reg-update-3');

        break;

    case 'regUpdate_4':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        //collect user data 
        $meal1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $meal3 = filter_input(INPUT_POST, 'meal3', FILTER_SANITIZE_STRING);
        //echo $meal1, $meal2, $meal3; 
        //exit; 

        $_SESSION['meal1'] = $meal1;
        $_SESSION['meal2'] = $meal2;
        $_SESSION['meal3'] = $meal3;

        //grab the current values from the database for the "extra category". 
        $confDetails_3 = details_3($userId);
        $_SESSION['confDetails_3'];
        //var_dump($_SESSION['confDetails_3']); 
        //exit; 
        $_SESSION['regUp_5'] = "TRUE";
        header("location: /reg-update-4");
        break;

    case 'regUpdate_5':
        //grab the user input


        $emergency = filter_input(INPUT_POST, 'emergency', FILTER_SANITIZE_STRING);
        $emer_phone = filter_input(INPUT_POST, 'emer_phone', FILTER_SANITIZE_STRING);
        $allergy = filter_input(INPUT_POST, 'allergy', FILTER_SANITIZE_STRING);
        $volunteer = filter_input(INPUT_POST, 'volunteer', FILTER_SANITIZE_STRING);
        $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);

        //echo $emer_phone, $emergency, $allergy, $volunteer, $payment; 
        //exit; 

        $format = formatPhoneNumber($emer_phone);

        $emer_phone = $format;
        //echo $emergency, $emer_phone, $allergy, $volunteer, $payment; 
        //exit; 

        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'];
        //var_dump($_SESSION['array']); 
        //exit; 

        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];
        $dataArray = $_SESSION['dataArray'];

        //Carry forward data that was entered on step4
        $_SESSION['topicArray']; // contains all the values from the form; 
        $topicArray = $_SESSION['topicArray'];
        //var_dump($topicArray); 
        //exit; 

        $_SESSION['checkedTopic'];
        $checkedTopic = $_SESSION['checkedTopic'];
        //var_dump($checkedTopic); 
        //exit; 

        $userName = $_SESSION['dataArray']['1'];
        $firstName = $_SESSION['dataArray']['1'];
        $lastName = $_SESSION['array']['2'];
        $userEmail = $_SESSION['array']['3'];
        $address = $_SESSION['array']['4'];
        $city = $_SESSION['array']['5'];
        $state = $_SESSION['array']['6'];
        $county  = $_SESSION['array']['7'];
        $zipcode = $_SESSION['array']['8'];
        $country = $_SESSION['array']['9'];
        $phone = $_SESSION['array']['10'];
        $age = $_SESSION['array']['11'];
        $gender = $_SESSION['array']['12'];
        $widowed = $_SESSION['array']['13'];
        $conf = $_SESSION['array']['14'];

        $userId = $_SESSION['array']['0'];
        $lake = $_SESSION['array']['1'];
        $bike = $_SESSION['array']['2'];
        $temple = $_SESSION['array']['3'];
        $hike1 = $_SESSION['array']['4'];
        $hike2 = $_SESSION['array']['5'];
        $pickleball = $_SESSION['array']['6'];
        $axe = $_SESSION['array']['7'];
        $fireside = $_SESSION['array']['8'];
        $meet_greet = $_SESSION['array']['9'];
        $keynote = $_SESSION['array']['10'];
        $square = $_SESSION['array']['11'];
        $afterParty = $_SESSION['array']['12'];
        $cleanup = $_SESSION['array']['13'];

        $firstTopic = $checkedTopic['0'];
        $secondTopic = $checkedTopic['1'];
        $thirdTopic = $checkedTopic['2'];


        $topic1 = $topicArray[0];
        $topic2 = $topicArray[1];
        $topic3 = $topicArray[2];
        $topic4 = $topicArray[3];
        $topic5 = $topicArray[4];
        $topic6 = $topicArray[5];
        $topic7 = $topicArray[6];
        $topic8 = $topicArray[7];
        $topic9 = $topicArray[8];
        $topic10 = $topicArray[9];
        $topic11 = $topicArray[10];



        $_SESSION['meal1'];
        $_SESSION['meal2'];
        $_SESSION['meal3'];
        $meal1 = $_SESSION['meal1'];
        $meal2 = $_SESSION['meal2'];
        $meal3 = $_SESSION['meal3'];
        $_SESSION['confId'];
        $confId = $_SESSION['confId'];
        //echo $emergency, $emer_phone, $allergy, $volunteer, $payment; 
        //exit; 
        //Insert step3 data into the database  
        $confAct = confActUp($lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup, $userId, $confId);
        //Insert chosen topics to the database
        $insertTopic = topicUpdate($firstTopic, $secondTopic, $thirdTopic, $topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11, $userId);
        //Insert Meal Choices to the database
        $meals = mealUpdate($userId, $meal1, $meal2, $meal3);
        //Update the Extra Info 
        $additionalInfo = extraInfoUpdate($userId, $emergency, $emer_phone, $allergy, $volunteer, $payment);
        //echo $additionalInfo; 
        //exit; 
        $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the  $_SESSION[conf1] </p>";
        header("location: /users/index.php?action=success");
        break;

    case 'knoxUpdate':
        //echo "This is the regUpdate1 case"; 
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $ids = getKId($userId); //get the conference Id to help update the registration
        $confId = $ids[0]['conf_Id'];
        $getConfName = confName($confId);
        $conf2 = $getConfName[0]['conf_Name'];
        $_SESSION['conf2'] = $conf2;
        $_SESSION['confId2'] = $confId;
        /*Are they registered for the Knoxville Conference */
        $check_KReg = isRegisteredKConf($userId);

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
            $_SESSION['getRegData'] = $getRegData;
            $_SESSION['conf2'] = $conf2;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['buildKnox'];
            $_SESSION['knoxUP'] = "TRUE";
            header('Location: /reg-update-1');
        }
        break;

    case 'knoxUp2':
        // Filter and store the data
        $userId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $confId2 = filter_input(INPUT_POST, 'confId2', FILTER_SANITIZE_STRING);
        $allergies = filter_input(INPUT_POST, 'allergies', FILTER_SANITIZE_STRING);
        $hike = filter_input(INPUT_POST, 'hike', FILTER_SANITIZE_STRING);
        $bonfire =  filter_input(INPUT_POST, 'bonfire', FILTER_SANITIZE_STRING);
        $social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);
        $keynotes = filter_input(INPUT_POST, 'keynotes', FILTER_SANITIZE_STRING);
        $sacrament = filter_input(INPUT_POST, 'sacrament', FILTER_SANITIZE_STRING);


        //Put all the data from the list above into an array
        $array = array($userId, $confId2, $hike, $bonfire, $social, $keynotes, $sacrament);

        //Place the data collected in Step3 array into a session variable 
        $_SESSION['array'] = $array;


        //Carry forward the data that was entered on step2
        $_SESSION['dataArray'];

        $_SESSION['userName'];
        $userName = $_SESSION['userName'];
        //Insert step3 data into the database  
        $confAct = knoxActUpdate($userId, $allergies, $hike, $bonfire, $social,  $sacrament, $keynotes);
        $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the  $_SESSION[conf2] </p>";
        /*Are they registered for the Knoxville Conference */
        $check_KReg = isRegisteredKConf($userId);

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
            $_SESSION['buildKnox'] = $buildKnox;
            header("location: /success");
        }
        break;

        /******* These will Update Registrations ************/
    case 'remUpdate':
        //echo "This is for Updating Registration Info in the remarried conference"; 

        $_SESSION['userId'];
        $_SESSION['confId2'];
        $confId2 = $_SESSION['confId2'];
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId2);

        $conf1 = $getConfName[0]['conf_Name'];

        /*Are they registered for the Remarried Conference */
        $check_RLReg = isRegisteredRLConf($userId);
        //echo $check_RLReg; 
        //exit; 
        if (!$check_RLReg) {
            $_SESSION['remarried'] = "False";
            header('location: /account/profile');
        } else {
            $_SESSION['remarried'] = "True";
            $getRegData = isRegisteredRLData($userId);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 


            $_SESSION['getRegData'] = $getRegData;
            $_SESSION['conf1'] = $conf1;

            $_SESSION['confId'] = $confId;
            $_SESSION['remUP'] = "TRUE";
            $_SESSION['idahoUP'] = "FALSE";

            header('Location: /account/reg-update-1');
        }
        break;

    case 'remUpdate2':
        //echo "This is the remUpdate2 case";
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];

        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $firstName2 = filter_input(INPUT_POST, 'attendee2FN', FILTER_SANITIZE_STRING);
        $lastName2 = filter_input(INPUT_POST, 'attendee2LN', FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
        $social = filter_input(INPUT_POST, 'social', FILTER_SANITIZE_STRING);
        $task1 = filter_input(INPUT_POST, 'task1', FILTER_SANITIZE_STRING);
        $task2 = filter_input(INPUT_POST, 'task2', FILTER_SANITIZE_STRING);
        $task3 = filter_input(INPUT_POST, 'task3', FILTER_SANITIZE_STRING);
        $task4 = filter_input(INPUT_POST, 'task4', FILTER_SANITIZE_STRING);
        $allergies = filter_input(INPUT_POST, 'allergies', FILTER_SANITIZE_STRING);
        $diet1 = filter_input(INPUT_POST, 'diet1', FILTER_SANITIZE_STRING);
        $diet2 = filter_input(INPUT_POST, 'diet2', FILTER_SANITIZE_STRING);
        $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
        $remarried_id = filter_input(INPUT_POST, 'remarried_id', FILTER_SANITIZE_STRING);
        $userId =  filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        //echo $status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $conf1, $confId; 
        //exit; 

        //echo $remarried_id; exit; 
        //Put all the data from the list above into an array
        $array = array($status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet, $payment, $userId, $confId);

        //Place the data collected in Step3 array into a session variable 

        //Insert step3 data into the database  
        $confAct =  remarriedActUp($remarried_id, $status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId);
        //Insert step3 data into the database  
        if ($confAct === 0) {
            $_SESSION['success'] = "<p class='success'> There was a problem and you have not updated your registration yet. </p>";
            header("location: /conferences/remarried-conference/remarried-registration");
        } else {


            $_SESSION['success'] = "<p class='success'> You have successfully updated your registration for the " . $conf1 . "</p>";
            $_SESSION['remarried'] = "True";
            $_SESSION['confId2'] = $confId;
            $_SESSION['conf2'] = $conf1;

            header("location: /users/index.php?action=rLife");
        }
        break;
        //*************************************************Idaho Update ******************************************************
    case 'iUpdate':
        //echo "This is for Updating Registration Info in the remarried conference"; 

        $_SESSION['userId'];

        $_SESSION['confId3'];
        $confId3 = $_SESSION['confId3'];
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId3);

        $conf1 = $getConfName[0]['conf_Name'];

        /*Are they registered for the Remarried Conference */
        $check_IdReg = isRegisteredIdConf($userId);
        //echo $check_IdReg; 
        //exit; 
        if (!$check_IdReg) {
            $_SESSION['idaho'] = "False";
            header('location: /account/profile');
        } else {
            $_SESSION['idaho'] = "True";
            $getRegDataId = isRegisteredIdData($userId);
            //var_dump($getRegDataId); 
            //exit;   
            $confId3 = $getRegDataId[0]['conf_id'];
            //echo $confId; 
            //exit; 

            $_SESSION['userId'] = $userId;
            $_SESSION['getRegDataId'] = $getRegDataId;
            $_SESSION['conf1'] = $conf1;
            //echo $_SESSION['conf1']; exit; 
            $_SESSION['confId3'] = $confId3;
            $_SESSION['idahoUP'] = "TRUE";
            $_SESSION['remUP'] = "FALSE";

            header('Location: /account/reg-update-1');
        }
        break;
        //*************************************Change the Database *******************************************/////////////       
    case 'iUpdate2':
        //echo "This is the remUpdate2 case";
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];



        //Idaho form data 
        $act_1 = filter_input(INPUT_POST, 'act_1', FILTER_SANITIZE_STRING);
        $act_2 = filter_input(INPUT_POST, 'act_2', FILTER_SANITIZE_STRING);
        $act_3 = filter_input(INPUT_POST, 'act_3', FILTER_SANITIZE_STRING);
        $act_4 = filter_input(INPUT_POST, 'act_4', FILTER_SANITIZE_STRING);
        $act_5 = filter_input(INPUT_POST, 'act_5', FILTER_SANITIZE_STRING);
        $meal_1 = filter_input(INPUT_POST, 'meal1', FILTER_SANITIZE_STRING);
        $meal_2 = filter_input(INPUT_POST, 'meal2', FILTER_SANITIZE_STRING);
        $workshop_1 = filter_input(INPUT_POST, 'workshop_1', FILTER_SANITIZE_STRING);
        $workshop_2 = filter_input(INPUT_POST, 'workshop_2', FILTER_SANITIZE_STRING);
        $workshop_3 = filter_input(INPUT_POST, 'workshop_3', FILTER_SANITIZE_STRING);
        $workshop_4 = filter_input(INPUT_POST, 'workshop_4', FILTER_SANITIZE_STRING);
        $workshop_5 = filter_input(INPUT_POST, 'workshop_5', FILTER_SANITIZE_STRING);
        $keynote_1 = filter_input(INPUT_POST, 'keynote_1', FILTER_SANITIZE_STRING);
        $keynote_2 = filter_input(INPUT_POST, 'keynote_2', FILTER_SANITIZE_STRING);
        $lodging = filter_input(INPUT_POST, 'lodging', FILTER_SANITIZE_STRING);
        $church = filter_input(INPUT_POST, 'church', FILTER_SANITIZE_STRING);
        $userId =  filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
        $confId = filter_input(INPUT_POST, 'confId', FILTER_SANITIZE_STRING);
        //echo   $userId, $act_1, $act_2, $act_3, $act_4, $act_5,$meal_1, $meal_2,  $workshop_1,
        /*$workshop_2,
                    $workshop_3,
                    $workshop_4,
                    $workshop_5,
                    $keynote_1,
                    $keynote_2, $lodging, $church; */
        //exit; 


        $idahoActInsert = idahoActUpdate($userId, $act_1, $act_2, $act_3, $act_4, $act_5);
        $idahoMealInsert =  idahoMealUpdate($userId, $meal_1, $meal_2);
        $idahoClassInsert =  idahoClassesUpdate(
            $workshop_1,
            $workshop_2,
            $workshop_3,
            $workshop_4,
            $workshop_5,
            $keynote_1,
            $keynote_2,
            $userId
        );

        $idahoOtherInsert =  idahoOtherUpdate($userId, $lodging, $church);

        $_SESSION['success'] = "<p class='success'> You have successfully updated your registration details </p>";
        $_SESSION['idaho'] = "True";
        $_SESSION['confId2'] = $confId;
        $_SESSION['conf2'] = $conf1;
        header("location: /users/index.php?action=idaho");



        break;


        //********************************************Knox Delete/Cancel Registrations ***************************************/
    case 'knoxDelete':
        $_SESSION['knoxCancel'] = "True";
        $_SESSION['cancel'] = "True";
        $_SESSION['cacheCancel'] = "False";
        $_SESSION['userId'];
        header('Location: /reg_cancel');
        break;



    case 'knoxDelConf':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId'];
        $confId = $_SESSION['confId'];
        $cancel = cancelKReg($userId);
        if ($cancel === 0) {
            $check_KReg = isRegisteredKConf($userId);
            unset($_SESSION['array']);
            unset($_SESSION['confId2']);
            $_SESSION['success'] = "<p class='success'> You have successfully cancelled your registration </p>";

            unset($_SESSION['conf2']);
            unset($_SESSION['buildKnox']);

            $_SESSION['knox'] = "False";

            header("location: /profile");
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /profile");
            break;
        }

        header("location: /profile");
        break;


        /************Remarried Life Cancel/Delete Cases ************/
    case 'remDelete':
        $_SESSION['remCancel'] = "True";
        $_SESSION['userId'];
        $_SESSION['conf2'];
        header('Location: /account/reg_cancel');
        break;

    case 'RemDelConf':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId'];
        $confId = $_SESSION['confId'];
        $cancel = cancelRemReg($userId);
        $check_RLReg = isRegisteredRLConf($userId);
        if ($check_RLReg == 0) {

            // echo $check_RLReg; 
            unset($_SESSION['array']);
            unset($_SESSION['confId2']);
            unset($_SESSION['conf2']);
            unset($_SESSION['buildRL']);

            $_SESSION['remarried'] = "False";
            $_SESSION['success'] = '<p class="success"> You have successfully cancelled your registration </p>';
            header('location: /account/profile');
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /profile");
            break;
        }

        break;
        //********************************** Idaho Delete Registration ******************************************************
    case 'iDelete':
        $_SESSION['iCancel'] = "True";
        $_SESSION['remCancel'] = "False";
        $_SESSION['userId'];
        $_SESSION['confId3'];

        $confId3 = $_SESSION['confId3'];
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId3);

        $conf1 = $getConfName[0]['conf_Name'];

        $_SESSION['conf1'] =  $conf1;
        $_SESSION['userId'] = $userId;


        header('Location: /account/reg_cancel');
        break;

    case 'iCancelAdmin':
        $_SESSION['iCancel'] = "False";
        $_SESSION['iCancelAdmin'] = "True";
        $_SESSION['remCancel'] = "False";
        $_SESSION['userId'];
        $_SESSION['confId3'];

        $confId3 = $_SESSION['confId3'];
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId3);

        $conf1 = $getConfName[0]['conf_Name'];

        $_SESSION['conf1'] =  $conf1;
        $_SESSION['userId'] = $userId;


        header('Location: /account/reg_cancel');

        break;



    case 'iDelConf':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId3'];
        $confId = $_SESSION['confId3'];
        $cancel = cancelIdReg($userId);
        $cancel2 = cancelIdReg2($userId);
        $cancel3 = cancelIdReg3($userId);
        $cancel4 = cancelIdReg4($userId);
        $cancel5 = cancelIdReg5($userId);
        $check_IdReg = isRegisteredIdConf($userId);
        if ($check_IdReg == 0) {

            // echo $check_IdReg; 
            unset($_SESSION['array']);
            unset($_SESSION['confId3']);
            unset($_SESSION['conf2']);
            unset($_SESSION['buildId']);

            $_SESSION['idaho'] = "False";
            $_SESSION['success'] = '<p class="success"> You have successfully cancelled your registration </p>';
            header('location: /account/profile');
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /account/profile");
            break;
        }

        break;

    case 'deleteWalkinId':
        $walkin_id = $_GET['walkin_id'];


        //echo $cancel; 
        //exit; 
        $cancel = cancelIdahoWReg($walkin_id);
        if ($cancel == 0) {
            $cancel_2 = cancelIdahoWReg2($walkin_id);
            $cancel_3 = cancelIdahoWReg3($walkin_id);
            $cancel_4 = cancelIdahoWReg4($walkin_id);
            $cancel_5 = cancelIdahoWReg5($walkin_id);
            /* $cancel_5 = cancelReg_5($userId, $confId);*/
            if ($cancel_5 == 0) {
                $_SESSION['delete'] = "<p class='success'> That Walkin registration has been canceled. </p>";
            }
        }
        walkinIdaho();
        // }
        header('location: /account/reports-idaho');
        break;
    case 'delete':
        $_SESSION['cancel'] = "True";
        $_SESSION['cacheCancel'] = "True";
        $_SESSION['knoxCancel'] = "False";
        $_SESSION['userId'];

        header('Location: /reg_cancel');
        break;

    case 'del_confirm':

        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId'];
        $confId = $_SESSION['confId'];


        $cancel = cancelReg($userId);

        if ($cancel === 0) {
            $cancel_2 = cancelReg_2($userId);
            $cancel_3 = cancelReg_3($userId);
            $cancel_4 = cancelReg_4($userId);
            /* $cancel_5 = cancelReg_5($userId, $confId);*/
            $_SESSION['delete'] = "<p class='success'> You have canceled your registration. </p>";
            unset($_SESSION['array']);
            unset($_SESSION['dataArray']);
            unset($_SESSION['checkedTopic']);
            unset($_SESSION['meal1']);
            unset($_SESSION['meal2']);
            unset($_SESSION['meal3']);
            unset($_SESSION['confDetails_2']);
            unset($_SESSION['confDetails_4']);
            unset($_SESSION['confDetails_3']);
            unset($_SESSION['buildDetails']);
            unset($_SESSION['buildTopics']);
            unset($_SESSION['buildMeals']);
            unset($_SESSION['buildExtras']);
            $_SESSION['register'] = "False";

            header("location: /profile");
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /success");
            break;
        }
        break;
        //***********************************************************************************************************************************
        //**********************************************SAN ANTONIO DELETE FUNCTIONS ****************************************************
        //***********************************************************************************************************************************
    case 'SaDelete':

        $_SESSION['SaCancel'] = "True";
        $_SESSION['AzCancel'] = "False"; 
        $_SESSION['remCancel'] = "False";
        $_SESSION['iCancel'] = "False";
        $_SESSION['AzGCancel'] = "False";
        
        $_SESSION['AZ'] = "False";
        $_SESSION['userId'];
        $_SESSION['confId3'];

        $confId3 = $_SESSION['confId3'];
        $userId = $_SESSION['userId'];
        $getConfName = getConfId($confId3);

        $conf1 = $getConfName[0]['conf_Name'];

        $_SESSION['conf1'] =  $conf1;
        $_SESSION['userId'] = $userId;


        header('Location: /account/reg_cancel');
        break;




    case 'SaDelConf':
        $_SESSION['userId'];
        $userId = $_SESSION['userId'];
        $_SESSION['confId3'];
        $confId = $_SESSION['confId3'];
        $cancel = cancelSAReg($userId);
        $cancel2 = cancelSAReg2($userId);
        $cancel3 = cancelSAReg3($userId);
        $cancel4 = cancelSAReg4($userId);
        $_SESSION['conf1'];
        $conf1 = $_SESSION['conf1'];

        $check_SAReg = isRegisteredSAConf($userId);
        if ($check_SAReg == 0) {
            //SEND a cancellation confirmation email. 
            $cancelMess = cancelMessage($firstName, $lastName, $userEmail, $conf1);
            // echo $check_IdReg; 
            unset($_SESSION['array']);
            unset($_SESSION['confId3']);
            unset($_SESSION['conf2']);
            unset($_SESSION['buildId']);

            $_SESSION['sanAntonio'] = "False";
            $_SESSION['idaho'] = "False";
            $_SESSION['success'] = '<p class="success"> You have successfully cancelled your registration </p>';


            header('location: /account/profile');
        } else {
            $_SESSION['delete'] = "<p class='success'> There was a problem, and you aren't able to cancel at this time. </p>";
            header("location: /account/profile");
            break;
        }

        break;
    case 'emailForm':

        $sendForm = sendForm();

        header("location: /conferences/arizona-regional");

        break;
}
