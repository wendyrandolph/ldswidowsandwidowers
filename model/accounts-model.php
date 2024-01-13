<?php

// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');

// Get client data based on an email address
function getUser($userName)
{
  $db = widowsConnect();
  $sql = 'SELECT * FROM users WHERE userName = :userName';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
 
}

function getUpdatedUser($userId){ 
 $db = widowsConnect();
  $sql = 'SELECT * FROM users WHERE userId = :userId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;

}


//This function will check for existing email address to setup initial account. 
//And pull in all the data from a backloaded table. 
function  confEmailCheck($email, $firstName)
{
  // Create a connection object using the widows connection function
  $db = widowsConnect();
 
  $sql = "SELECT * FROM 2023_email 
WHERE email = :email
AND firstName = :firstName ";
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  /*Check the data*/
  $stmt->execute();
  $emailMatch = $stmt->fetch(PDO::FETCH_NUM);
 if (empty($emailMatch)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }

  $stmt->closeCursor();
 
}

function  confEmailCheck2($email, $firstName)
{
  // Create a connection object using the widows connection function
  $db = widowsConnect();
 
  $sql = "SELECT * FROM 2022_Idaho 
WHERE email = :email
AND firstName = :firstName ";
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  /*Check the data*/
  $stmt->execute();
  $emailMatch = $stmt->fetch(PDO::FETCH_NUM);
 if (empty($emailMatch)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }

  $stmt->closeCursor();
  
}


function getUserInfo($userEmail)
{
  $db = widowsConnect();
  $sql = 'SELECT * FROM `2023_email` WHERE email = :userEmail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
 
}

function getUserInfo_Idaho($userEmail)
{
  $db = widowsConnect();
  $sql = 'SELECT * FROM `2022_Idaho` WHERE email = :userEmail';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
 
}

//Run this function to check that email doesn't already exist before registering them. 
function checkExistingUserName($userName)
{
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = "SELECT userId, userName FROM users WHERE userName = :userName"; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $userMatch = $stmt->fetch(PDO::FETCH_NUM);

  if (empty($userMatch)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }

  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
}


//Run this function to check email, first and last names to retrieve username if it is forgotten. 
function checkUserName($userEmail, $firstName, $lastName)
{
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = "SELECT * FROM users WHERE userEmail = :userEmail AND firstName = :firstName AND lastName = :lastName"; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $userMatch = $stmt->fetch(PDO::FETCH_NUM);

  if (empty($userMatch)) {
    return 0;
    // echo 'Nothing found';
  } else {
    return 1;
    //echo 'Match found';
  }
 
  $stmt->closeCursor();
}

function getUserName ($userEmail, $firstName, $lastName)
{ 
 $db = widowsConnect();
  $sql = 'SELECT userName FROM users WHERE userEmail = :userEmail AND firstName = :firstName AND lastName = :lastName';
  $stmt = $db->prepare($sql);
  //bind the variables with the db column names
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;

}



//This function will handle site registrations 
function regClient($userName, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $level, $verify, $hashed_password )
{
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO users (userName, firstName, lastName, userEmail, address, city, state, county, zipcode, country, phone, age, gender, widowed, conf, level, date_created, last_date_changed, verify, userPW)
      VALUES (:userName, :firstName, :lastName, :userEmail,:address, :city, :state, :county, :zipcode, :country, :phone, :age, :gender, :widowed, :conf, :level, CURDATE(), CURDATE(), :verify, :userPW)';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->bindValue(':address', $address, PDO::PARAM_STR);
  $stmt->bindValue(':city', $city, PDO::PARAM_STR);
  $stmt->bindValue(':state', $state, PDO::PARAM_STR);
  $stmt->bindValue(':county', $county, PDO::PARAM_STR);
  $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
  $stmt->bindValue(':country', $country, PDO::PARAM_STR);
  $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindValue(':age', $age, PDO::PARAM_STR);
  $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
  $stmt->bindValue(':widowed', $widowed, PDO::PARAM_STR);
  $stmt->bindValue(':conf', $conf, PDO::PARAM_STR);
  $stmt->bindValue(':level', $level, PDO::PARAM_STR);
  $stmt->bindValue(':verify', $verify, PDO::PARAM_STR);
  $stmt->bindValue(':userPW', $hashed_password, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

//This function will handle site registrations 
function updateClient($userId, $firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $phone, $age, $gender, $widowed, $conf){
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'UPDATE users 
      SET
        firstName = :firstName
      , lastName = :lastName
      , userEmail = :userEmail 
      , address = :address
      , city = :city
      , state = :state
      , county = :county
      , zipcode = :zipcode
      , country = :country
      , phone = :phone 
      , age = :age
      , gender = :gender
      , widowed = :widowed
      , conf = :conf
      , last_date_changed = CURDATE()
      WHERE userId = :userId';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR); 
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->bindValue(':address', $address, PDO::PARAM_STR);
  $stmt->bindValue(':city', $city, PDO::PARAM_STR);
  $stmt->bindValue(':state', $state, PDO::PARAM_STR);
  $stmt->bindValue(':county', $county, PDO::PARAM_STR);
  $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
  $stmt->bindValue(':country', $country, PDO::PARAM_STR);
  $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindValue(':age', $age, PDO::PARAM_STR);
  $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
  $stmt->bindValue(':widowed', $widowed, PDO::PARAM_STR);
  $stmt->bindValue(':conf', $conf, PDO::PARAM_STR);
  
 // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function regActivity($userId, $thursday_1, $thursday_2, $thursday_3, $thursday_4, $thursday_5, $thursday_6, $friday_1, $friday_2, $saturday_1, $saturday_2) {

  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO activities (userId, thursday_1, thursday_2, thursday_3, thursday_4, thursday_5, thursday_6, friday_1, friday_2, saturday_1, saturday_2)
      VALUES (:userId, :thursday_1, :thursday_2, :thursday_3, :thursday_4, :thursday_5, :thursday_6, :friday_1, :friday_2, :saturday_1, :saturday_2)';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_1', $thursday_1, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_2', $thursday_2, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_3', $thursday_3, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_4', $thursday_4, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_5', $thursday_5, PDO::PARAM_STR);
  $stmt->bindValue(':thursday_6', $thursday_6, PDO::PARAM_STR);
  $stmt->bindValue(':friday_1', $friday_1, PDO::PARAM_STR);
  $stmt->bindValue(':friday_2', $friday_2, PDO::PARAM_STR);
  $stmt->bindValue(':saturday_1', $saturday_1, PDO::PARAM_STR);
  $stmt->bindValue(':saturday_2', $saturday_2, PDO::PARAM_STR);
 
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


 function regMeal($userId, $meal_1, $meal_2, $meal_3, $meal_4, $meal_5, $meal_6, $meal_7, $meal_8){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO meals (userId, meal_1, meal_2, meal_3, meal_4, meal_5, meal_6, meal_7, meal_8)
      VALUES (:userId, :meal_1, :meal_2, :meal_3, :meal_4, :meal_5, :meal_6, :meal_7, :meal_8)';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal_2', $meal_2, PDO::PARAM_STR);
  $stmt->bindValue(':meal_3', $meal_3, PDO::PARAM_STR);
  $stmt->bindValue(':meal_4', $meal_4, PDO::PARAM_STR);
  $stmt->bindValue(':meal_5', $meal_5, PDO::PARAM_STR);
  $stmt->bindValue(':meal_6', $meal_6, PDO::PARAM_STR);
  $stmt->bindValue(':meal_7', $meal_7, PDO::PARAM_STR);
  $stmt->bindValue(':meal_8', $meal_8, PDO::PARAM_STR);

 
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }

 function volunteerUser($firstName, $lastName, $email, $phone, $preferred_contact, $thursday, $friday, $saturday ){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO volunteer (firstName, lastName, email, phone, preferred_contact, thursday, friday, saturday, created_date)
  VALUES ( :firstName, :lastName, :email, :phone, :preferred_contact, :thursday, :friday, :saturday,  DATE_SUB(NOW(), INTERVAL 7 HOUR))'; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->bindValue(':email',$email, PDO::PARAM_STR);
  $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
  $stmt->bindValue(':preferred_contact', $preferred_contact, PDO::PARAM_STR);
  $stmt->bindValue(':thursday', $thursday, PDO::PARAM_STR);
  $stmt->bindValue(':friday', $friday, PDO::PARAM_STR);
  $stmt->bindValue(':saturday', $saturday, PDO::PARAM_STR);

 
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
 }

function thursdayData($thursday, $user_Id){ 
   // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO tasks_thursday(job_num, user_Id, created_date)
      VALUES (:job_num, :user_Id, Current_date())';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
   $stmt->bindValue(':job_num', $thursday, PDO::PARAM_STR);
   $stmt->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
   // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
 }
   
function fridayData($friday, $user_Id){ 
   // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO tasks_friday(job_num, user_Id, created_date)
      VALUES (:job_num, :user_Id, Current_date())';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
   $stmt->bindValue(':job_num', $friday, PDO::PARAM_STR);
   $stmt->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
   // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
 }

function saturdayData($saturday, $user_Id){ 
   // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'INSERT INTO tasks_Saturday(job_num, user_Id, created_date)
      VALUES (:job_num, :user_Id, Current_date())';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
   $stmt->bindValue(':job_num', $saturday, PDO::PARAM_STR);
   $stmt->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
   // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
 }


// Get client data based on an email address
function getVolunteer($email)
{
  $db = widowsConnect();
  $sql = 'SELECT user_Id, firstName, lastName, email, phone, preferred_contact, thursday, friday, saturday FROM volunteer WHERE :email = email' ;
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
 
}

function getDescription($user_Id){ 
$db = widowsConnect();
  $sql = 'SELECT v.user_Id, v.firstName, d1.desc_name AS Thursday, d2.desc_name AS Friday, d3.desc_name AS Saturday FROM volunteer v
LEFT JOIN description d1 ON thursday = d1.job_num 
LEFT JOIN tasks_thursday t ON d1.job_num = t.job_num 
LEft JOIN description d2 ON friday = d2.job_num
LEft JOIN tasks_friday f ON d2.job_num = f.job_num 
LEft JOIN description d3 ON saturday = d3.job_num
LEft JOIN tasks_Saturday s ON d3.job_num = s.job_num
WHERE v.user_Id = :user_Id';  
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $user_Id, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;

}


function getVolunteersByDay()
{
  $db = widowsConnect();
  $sql = 'SELECT * FROM volunteer ';  
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $tasks;
}


function deletePwdToken($pwdResetUserName){ 
//Create a connection object using the the widowsConnect function
//echo $pwdResetEmail; 
//exit; 
$db = widowsConnect();
//sql statement 
$sql = "DELETE FROM pwdReset WHERE pwdResetUserName = :pwdResetUserName" ;
$stmt = $db->prepare($sql);
$stmt->bindValue(':pwdResetUserName', $pwdResetUserName, PDO::PARAM_STR);
$stmt->execute();
// Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function getResetEmail($pwdResetUserName){ 
    
    //Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT userEmail FROM users 
            Where userName = :pwdResetUserName" ;
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':pwdResetUserName', $pwdResetUserName, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
 
   return $clientData; 
}

  
function passwordReset($pwdResetEmail, $pwdResetUserName, $selector, $hashedToken, $expires, $time){ 
    //Create a connection object using the the widowsConnect function
$db = widowsConnect();
//sql statement 
$sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetUserName, pwdResetSelector, pwdResetToken, pwdResetExpires, date_created) 
VALUES (:pwdResetEmail, :pwdResetUserName, :selector, :hashedToken, :expires, :time)";
$stmt = $db->prepare($sql);
$stmt->bindValue(':pwdResetEmail', $pwdResetEmail, PDO::PARAM_STR);
$stmt->bindValue(':pwdResetUserName', $pwdResetUserName, PDO::PARAM_STR);
$stmt->bindValue(':selector', $selector, PDO::PARAM_STR);
$stmt->bindValue(':hashedToken', $hashedToken, PDO::PARAM_STR);
$stmt->bindValue(':expires', $expires, PDO::PARAM_STR);
$stmt->bindValue(':time', $time, PDO::PARAM_STR);
$stmt->execute();
// Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}
  

  function passwordValidate($currentDate, $selector){ 
      //echo $currentDate, $selector; 
      //echo "This is the passwordValidate function";
    // exit; 
    //Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = :selector AND pwdResetExpires >= :currentDate" ;
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':selector', $selector, PDO::PARAM_STR);
    $stmt->bindValue(':currentDate', $currentDate, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
   //var_dump($clientData);
  // exit; 
   return $clientData; 
}




function passwordUpdate($userName, $new_hashed_password)
{
 //echo $userName;
  //exit; 
  // Create a connection object using the phpmotors connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'UPDATE users 
    SET  userPW = :new_hashed_password 
    WHERE userName = :userName';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is

  $stmt->bindValue(':new_hashed_password', $new_hashed_password, PDO::PARAM_STR);
  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}





function getUserDetails($userName)
{
 //echo $userName;
  //exit; 
  // Create a connection object using the phpmotors connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'Select firstName, lastName, t.act_1, t.act_2, t.act_3, t.act_4, t.act_5, m.meal_1, t.keynote_1,  o.emergencyName, o.emergencyPhone, a.date_created FROM arizona a 
JOIN arizona_activities t 
ON a.userId = t.userId
JOIN arizona_meals m 
ON a.userId = m.userId 
JOIN arizona_other o 
ON a.userId = o.userId 
JOIN users u 
ON a.userId = u.userId 
WHERE u.userName = :userName';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is

  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  $clientData = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
}


function getGuestUserDetails($arizonaGuest_Id)
{
 //echo $userName;
  //exit; 
  // Create a connection object using the phpmotors connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'Select a.arizonaGuest_Id, firstName, lastName, userEmail, address, city, state, zipcode, gender, age, widowed, conf, t.act_1, t.act_2, t.act_3, t.act_4, t.act_5, m.meal_1, t.keynote_1,  o.emergencyName, o.emergencyPhone, a.date_created 
FROM arizonaGuest a 
JOIN arizona_Gactivities t 
ON a.arizonaGuest_Id = t.arizonaGuest_Id
JOIN arizona_Gmeals m 
ON a.arizonaGuest_Id = m.arizonaGuest_Id
JOIN arizona_Gother o 
ON a.arizonaGuest_Id = o.arizonaGuest_Id 
WHERE a.arizonaGuest_Id = :arizonaGuest_Id';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is

  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  
  // Insert the data
  $stmt->execute();
  $clientData = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
}


function getUserDetailsSA($userName)
{
 //echo $userName;
  //exit; 
  // Create a connection object using the phpmotors connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'Select firstName, lastName, t.act_1, t.act_2, t.act_3, t.act_4, t.act_5, t.act_6, t.act_7, m.meal_1, m.meal_2, m.foodNeeds, m.emergencyName, m.emergencyPhone, c.keynote_1, 
c.workshop_1, c.workshop_2, c.workshop_3, c.workshop_4, c.workshop_5, c.workshop_6, s.date_created FROM sanAntonio s 
JOIN SA_Activities t 
ON s.user_id = t.user_id
JOIN SA_Meals m 
ON s.user_id = m.user_id
JOIN SA_classes c 
ON s.user_id = c.user_id
JOIN users u 
ON s.user_id = u.userId 
WHERE u.userName = :userName';
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is

  $stmt->bindValue(':userName', $userName, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  $clientData = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt->closeCursor();

  return $clientData;
}

