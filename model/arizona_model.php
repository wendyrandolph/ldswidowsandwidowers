<?php 



// ***************************************************************************************************************
// ************************ ARIZONA FUNCTIONS ****************************************************************
// ***************************************************************************************************************


/****** ARE THEY REGISTERED FOR THIS CONFERENCE ALREADY? ****/ 
function isRegisteredAZConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT userId FROM arizona 
  WHERE userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);

   if (empty($regData)) {
    return 0;
     //echo 'Delete Successful';
  } else {
    return 1;
    //echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

/************IF they are registered this will grab the data ******/ 
function isRegisteredAZData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM arizona a
JOIN arizona_activities t
ON a.userId = t.userId
JOIN arizona_meals m 
ON a.userId = m.userId
JOIN arizona_other o 
ON a.userId = o.userId
WHERE a.userId = :userId'; 
         
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

//Check existing Guest Registration
function checkExistingGuest($firstName, $lastName, $userEmail){ 
 
 //Make a database connection: 
 $db = widowsConnect();

  $sql = 'SELECT * FROM arizonaGuest 
WHERE userEmail = :userEmail
AND firstName = :firstName
AND userEmail = :userEmail';
     // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userEmail', $email, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
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

function isRegisteredAZGConf($arizonaGuest_Id){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT arizonaGuest_Id FROM arizonaGuest 
          WHERE arizonaGuest_Id = :arizonaGuest_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
 $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);
 
 if (empty($regData)) {
    return 0;
     //echo 'Delete Successful';
  } else {
    return 1;
    //echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

/************IF they are registered this will grab the data ******/ 
function isRegisteredAZGData($arizonaGuest_Id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM arizonaGuest a
JOIN arizona_Gactivities t
ON a.arizonaGuest_Id = t.arizonaGuest_Id
JOIN arizona_Gmeals m 
ON a.arizonaGuest_Id = m.arizonaGuest_Id
JOIN arizona_Gother o 
ON a.arizonaGuest_Id = o.arizonaGuest_Id 
WHERE a.arizonaGuest_Id = :arizonaGuest_Id'; 
         
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

function arizona( $userId, $confId) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO arizona(userId, conf_id, date_created) 
          Values(
            :userId
          , :conf_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':conf_id', $confId, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function azAct($userId, $act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $keynote_1)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO arizona_activities(userId, act_1, act_2, act_5, keynote_1, date_created, last_date_changed) 
          Values(
            :userId
          , :act_1
          , :act_2 
          , :act_5
          , :keynote_1
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  //$stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  //$stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
  $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function azMeal($userId, $meal_1)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO arizona_meals(meal_1, userId, date_created, last_date_changed) 
          Values(
            :meal_1
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);


  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}
function az_Other($userId, $emergencyName, $emergencyPhone){ 
 $db = widowsConnect();
$sql = 
'INSERT INTO arizona_other( emergencyName, emergencyPhone, userId, date_created, last_date_changed) 
          Values(
            :emergencyName
          , :emergencyPhone
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

/*
function sanAClasses($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6,
         $keynote_1, $keynote_2, $church, $userId) 
        { //echo $workshop_1; 
        //exit; 
         $db = widowsConnect();
  $sql = 'INSERT INTO SA_classes(workshop_1, workshop_2, workshop_3, workshop_4, workshop_5, workshop_6,
        keynote_1, keynote_2, church, userId, date_created, last_date_changed) 
          Values(
            :workshop_1
          , :workshop_2
          , :workshop_3
          , :workshop_4
          , :workshop_5
          , :workshop_6
          , :keynote_1
          , :keynote_2
          , :church
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':workshop_1', $workshop_1, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_2', $workshop_2, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_3', $workshop_3, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_4', $workshop_4, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_5', $workshop_5, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_6', $workshop_6, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_2', $keynote_2, PDO::PARAM_STR);
  $stmt->bindValue(':church', $church, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}
*/ 
function arizonaGuest($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $confId){ 
$db = widowsConnect();
  $sql = 'INSERT INTO arizonaGuest(firstName, lastName, userEmail, address, city, state, county, zipcode, country, phone, age, gender, widowed, conf, confId, date_created, last_date_changed) 
          Values(
            :firstName
          , :lastName 
          , :userEmail
          , :address
          , :city
          , :state
          , :county
          , :zipcode
          , :country
          , :phone
          , :age
          , :gender
          , :widowed
          , :conf 
          , (SELECT conf_Id FROM `conference_lookup` WHERE conf_Name = "Arizona Regional")
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
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
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}



function azGuest_Act($arizonaGuest_Id, $act_1, $act_2, /*$act_3, $act_4,*/ $act_5, $keynote_1){ 
 $db = widowsConnect();
  $sql = 'INSERT INTO arizona_Gactivities(arizonaGuest_Id, act_1, act_2, act_5, keynote_1, date_created, last_date_changed) 
          Values(
            :arizonaGuest_Id
          , :act_1
          , :act_2 
          , :act_5
          , :keynote_1
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  //$stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  //$stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
  $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function getArizonaGuestId($userEmail, $firstName, $lastName){
 // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT arizonaGuest_Id FROM arizonaGuest 
  WHERE userEmail = :userEmail
  AND firstName = :firstName
  AND lastName = :lastName';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

function azGuest_Meal($arizonaGuest_Id, $meal_1){ 

 $db = widowsConnect();
  $sql = 'INSERT INTO arizona_Gmeals(arizonaGuest_Id, meal_1, date_created, last_date_changed) 
          Values(
            :arizonaGuest_Id 
          ,  :meal_1
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);


  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function azGuest_Other($arizonaGuest_Id, $emergencyName, $emergencyPhone){ 
 $db = widowsConnect();
$sql = 
'INSERT INTO arizona_Gother( arizonaGuest_Id, emergencyName, emergencyPhone, date_created, last_date_changed) 
          Values(
            :arizonaGuest_Id
          , :emergencyName
          , :emergencyPhone
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

//****************************UPDATE FUNCTIONS ****************************************************************************** 
function az_ActUp($act_1, $act_2, $act_3, $act_4, $act_5, $keynote_1, $userId){ 

$db = widowsConnect();
  $sql = 'UPDATE arizona_activities
          SET
           userId = :userId
          ,act_1 = :act_1
          ,act_2 = :act_2
          ,act_3 = :act_3
          ,act_4 = :act_4
          ,act_5 = :act_5
          ,keynote_1 = :keynote_1
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
   $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
   $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
   $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
   $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
   $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
   $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function az_MealUp( $meal_1, $userId){ 
    $db = widowsConnect();
    $sql = 'UPDATE arizona_meals
          SET
          userId = :userId
          ,meal_1 = :meal_1
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
  $stmt = $db->prepare($sql);
   $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function az_OtherUp($userId, $emergencyName, $emergencyPhone){ 
    $db = widowsConnect();
    $sql = 'UPDATE arizona_other
          SET
           emergencyName = :emergencyName
          ,emergencyPhone = :emergencyPhone
          ,userId = :userId
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function cancelAZReg1($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_meals
           WHERE userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}


function cancelAZReg2($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_activities
           WHERE userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

function cancelAZReg3($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_other
           WHERE userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

function cancelAZReg4($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona
           WHERE userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

// ***************************************************************************************************************
// ************************ ARIZONA GUEST UPDATE/DELETE FUNCTIONS ************************************************
// ***************************************************************************************************************
function az_GActUp($act_1, $act_2, $act_3, $act_4, $act_5, $keynote_1, $arizonaGuest_Id){ 

$db = widowsConnect();
  $sql = 'UPDATE arizona_Gactivities
          SET
           act_1 = :act_1
          ,act_2 = :act_2
          ,act_3 = :act_3
          ,act_4 = :act_4
          ,act_5 = :act_5
          ,keynote_1 = :keynote_1
          ,arizonaGuest_Id = :arizonaGuest_Id
          ,last_date_changed = current_date()
          WHERE arizonaGuest_Id = :arizonaGuest_Id'; 
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
   $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
   $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
   $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
   $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
   $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
   $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function az_GMealUp( $meal_1, $arizonaGuest_Id){ 
    $db = widowsConnect();
    $sql = 'UPDATE arizona_Gmeals
          SET
          arizonaGuest_Id = :arizonaGuest_Id
          ,meal_1 = :meal_1
          ,last_date_changed = current_date()
          WHERE arizonaGuest_Id = :arizonaGuest_Id'; 
  $stmt = $db->prepare($sql);
   $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function az_GOtherUp($arizonaGuest_Id, $emergencyName, $emergencyPhone){ 
    $db = widowsConnect();
    $sql = 'UPDATE arizona_Gother
          SET
            arizonaGuest_Id= :arizonaGuest_Id
          , emergencyName = :emergencyName
          , emergencyPhone = :emergencyPhone
          , last_date_changed = current_date()
          WHERE arizonaGuest_Id = :arizonaGuest_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function cancelAZGReg1($arizonaGuest_Id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_Gmeals
           WHERE arizonaGuest_Id = :arizonaGuest_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}


function cancelAZGReg2($arizonaGuest_Id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_Gactivities
           WHERE arizonaGuest_Id = :arizonaGuest_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

function cancelAZGReg3($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizona_Gother
           WHERE arizonaGuest_Id = :arizonaGuest_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}

function cancelAZGReg4($arizonaGuest_Id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM arizonaGuest
           WHERE arizonaGuest_Id = :arizonaGuest_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':arizonaGuest_Id', $arizonaGuest_Id, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetch(PDO::FETCH_NUM);

   if (empty($regData)) {
    return 0;
     echo 'Delete Successful';
  } else {
    return 1;
    echo 'Delete unsuccessful';
  }
 
  $stmt->closeCursor();
  return $regData;
}


// ***************************************************************************************************************
// ************************ ARIZONA REPORT FUNCTIONS ****************************************************************
// ***************************************************************************************************************


function getParticipantsAZ(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT * FROM ( 
SELECT 
CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, users u
JOIN arizona a 
ON u.userId = a.userId
ORDER BY lastName, FirstName) as x 
UNION ALL 
SELECT * FROM (
SELECT
 CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, arizonaGuest g
ORDER BY lastName, firstName ASC) as y"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}
/*UNION 
SELECT @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state
FROM (SELECT @rownum:=0) AS initialization, IdahoWalkinContact c
JOIN IdahoWalkin i 
ON c.walkin_id = i.walkin_id
*/


// IDAHO 2023 REPORT BY AGE ************************************************************************************************
function getAZAge(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT age, Count(age), Count(arizonaId), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(arizonaId) AS t FROM arizona), '%'), 2) AS Percentage FROM users u
JOIN arizona a
ON u.userId = a.userId
GROUP BY age ORDER BY Age;"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getAZGender(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT gender, Count(arizonaId), Format(Concat(COUNT(gender) * 100 /(SELECT Count(arizonaId) AS t FROM arizona), '%'), 2) AS Percentage 
FROM users u 
JOIN arizona a
ON u.userId = a.userId
GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getAZGenderTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(gender) AS Total, Format(CONCAT(COUNT(gender) * 100 /(SELECT Count(arizonaId) AS t FROM arizona a), '%'), 2) AS Percentage 
FROM users u
JOIN arizona a
ON u.userId = a.userId "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}





function getDataByStateAZ(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = " SELECT FORMAT(COUNT(state) * 100 /(SELECT Count(arizonaId) AS t FROM arizona), 2) AS Percentage,  state, Count(state) AS Total 
FROM users u 
JOIN arizona a  
ON u.userId = a.userId
WHERE state <> ''
GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getAZStateTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(state) AS Total, Format(CONCAT(COUNT(state) * 100 /(SELECT Count(arizonaId) AS t FROM arizona), '%'), 2) AS Percentage 
FROM users u
JOIN arizona a
ON u.userId = a.userId "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getAZStateNames(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT state,  Count(state)  FROM users u
INNER JOIN arizona a 
ON u.userId = a.userId
WHERE state <> ''  GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function getAZWid(){
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT widowed, Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(userId) AS t FROM arizona), '%'), 2) AS Percentage 
FROM users u
INNER JOIN arizona a
ON u.userId = a.userId
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getAZWidTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT  Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(a.userId) AS t FROM arizona a), '%'), 2) AS Percentage 
FROM users u
INNER JOIN arizona a 
ON u.userId = a.userId
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function azExport(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT * FROM (
SELECT  u.userId AS Id
, @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, users u
JOIN arizona a 
ON u.userId = a.userId
ORDER BY lastName, firstName ASC) as x 
UNION ALL 
SELECT * FROM (
SELECT  a.arizonaGuest_Id
, @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, arizonaGuest a
ORDER BY lastName, firstName ASC)as z"; 
$stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;


} 
function totalAZRegistered(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "
SELECT (SELECT Count(g.arizonaGuest_Id) AS 'Arizona Total' FROM arizonaGuest g)  
      + ((SELECT Count(a.userId) AS 'Arizona Total' FROM arizona a)) AS 'Arizona Total', (SELECT COUNT(u.userId) FROM users u) AS 'Total Accounts on the Website', Format(CONCAT(COUNT(a.userId) * 100 /(SELECT Count(u.userId) AS t FROM users u), '%'), 2) AS 'Percentage of Total Accounts' 
FROM users u
JOIN arizona a  
ON u.userId = a.userId"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function totalAZRegisteredbyDate(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT  DATE_FORMAT(a.date_created, '%m/%d/%Y') AS 'Date Registered' , Count(a.userId) AS 'Total By Date' 
FROM users u
JOIN arizona a  
ON u.userId = a.userId
GROUP BY a.date_created"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function totalAZBBQ(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT COUNT(meal_1) As 'Friday BBQ' FROM arizona_meals
WHERE meal_1 = 'Yes' "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}



?>