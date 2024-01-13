<?php 
/*
function getVolunteersByDay($email)
{
  $db = widowsConnect();
  $sql = 'SELECT * FROM volunteer Where :email = email';  
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $tasks;
}*/
function checkForAccount($firstName, $lastName){ 
  $db = widowsConnect();
  $sql = 'SELECT userName, firstName, lastName, city, state, userEmail FROM users 
            WHERE firstName = :firstName 
            AND lastName = :lastName ';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->execute();
  $getUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $getUser;

}   

//get conference Name/Id from the database to aid in updating registration
function getConfId($confId2){ 

  $db = widowsConnect();
  $sql = 'SELECT conf_Id, conf_Name FROM conference_lookup
          WHERE conf_Id = :confId';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':confId', $confId2, PDO::PARAM_STR);
  $stmt->execute();
  $getId = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $getId;

}


function updateMessage($message, $userId){ 
  //echo "This is the upDateMessage function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'UPDATE urgent 
          SET message = :message, date_created = Current_date(), created_by = :userId
          WHERE urgentId = 115'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':message', $message, PDO::PARAM_STR);
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


function getEmails(){ 
  $db = widowsConnect();
  $sql = 'SELECT firstName, lastName, userEmail FROM users';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();

  return $tasks;
}

function getMessage(){ 
  $db = widowsConnect();
  $sql = 'select message from urgent ';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
    return $tasks;
}

//Insert Member infor for Exit Survey
function memberInfo($age, $firstName, $lastName){ 
  //echo "This is the member function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO member(age, firstName, lastName, date_created) 
          Values(
            :age
          , :firstName
          , :lastName
          , Current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':age', $age, PDO::PARAM_STR);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function getMember_Id(){ 
  $db = widowsConnect();
  $sql = 'SELECT member_id FROM member ORDER BY member_id Desc LIMIT 1 ';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $tasks = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
    return $tasks;
}


//Insert Thursday Responses 
function thur_Response($temple, $pickleball, $bowling, $volleyball, $craft, $dance, $thur_feedback, $member_id){
//echo "This is the upDateMessage function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO thursday(thur_1, thur_2, thur_3, thur_4, thur_5, thur_6, thur_feedback, member_id, date_created) 
          Values(:temple
          , :pickleball
          , :bowling
          , :volleyball
          , :craft
          , :dance
          , :thur_feedback
          , :member_id
          , Current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':temple', $temple, PDO::PARAM_STR);
  $stmt->bindValue(':pickleball', $pickleball, PDO::PARAM_STR);
  $stmt->bindValue(':bowling', $bowling, PDO::PARAM_STR);
  $stmt->bindValue(':volleyball', $volleyball, PDO::PARAM_STR);
  $stmt->bindValue(':craft', $craft, PDO::PARAM_STR);
  $stmt->bindValue(':dance', $dance, PDO::PARAM_STR);
  $stmt->bindValue(':thur_feedback', $thur_feedback, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}




//INsert Friday Am Responses 
function fri_am_data($Keynote_Donald_Parry, $Kent_Allen_1, $Donald_Parry, $Susie_Rose, $Sharon_Colyar, $Carrie_Newbie, $Byron_Bair, $Denise_Kimber, $Kent_Allen_2, $Richard_Rogers, $fri_am_feedback, $member_id){       
//echo "This is the fri_am_data function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO friday_am(Keynote_Donald_Parry, Kent_Allen_1, Donald_Parry_workshop, Susie_Rose, Sharon_Colyar, Carrie_Newby, Byron_Bair, Denise_Kimber, Kent_Allen_2, Richard_Rogers, fri_am_feedback, member_id, date_created) 
          Values(:Keynote_Donald_Parry
          , :Kent_Allen_1
          , :Donald_Parry
          , :Susie_Rose
          , :Sharon_Colyar
          , :Carrie_Newbie
          , :Byron_Bair
          , :Denise_Kimber
          , :Kent_Allen_2
          , :Richard_Rogers
          , :fri_am_feedback
          , :member_id
          , Current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':Keynote_Donald_Parry', $Keynote_Donald_Parry, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_1', $Kent_Allen_1, PDO::PARAM_STR);
  $stmt->bindValue(':Donald_Parry', $Donald_Parry, PDO::PARAM_STR);
  $stmt->bindValue(':Susie_Rose', $Susie_Rose, PDO::PARAM_STR);
  $stmt->bindValue(':Sharon_Colyar', $Sharon_Colyar, PDO::PARAM_STR);
  $stmt->bindValue(':Carrie_Newbie', $Carrie_Newbie, PDO::PARAM_STR);
  $stmt->bindValue(':Byron_Bair', $Byron_Bair, PDO::PARAM_STR);
  $stmt->bindValue(':Denise_Kimber', $Denise_Kimber, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_2', $Kent_Allen_2, PDO::PARAM_STR);
  $stmt->bindValue(':Richard_Rogers', $Richard_Rogers, PDO::PARAM_STR);
  $stmt->bindValue(':fri_am_feedback', $fri_am_feedback, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);
 // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}



function fri_pm_data($KimScott_Killpack, $Kent_Allen_3, $Rosie_F_Ouimette, $Esther_Reid, $Michelle_Lockhart, $Scott_Wardle, $Rosie_F_Ouimette_2,  $Kent_Allen_4, $Keynote_Calvin_Stephens, $fri_pm_feedback, $member_id){ 
  //echo "This is the fri_pm_data function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO friday_pm(KimScott_Killpack, Kent_Allen_1, Rosie_F_Ouimette, Esther_Reid, Michelle_Lockhart, Scott_Wardle, 	Rosie_F_Ouimette_2, Kent_Allen_2, 	Keynote_Calvin_Stephens, fri_pm_feedback, member_id, date_created) 
          Values(:KimScott_Killpack
          , :Kent_Allen_1
          , :Rosie_F_Ouimette
          , :Esther_Reid
          , :Michelle_Lockhart
          , :Scott_Wardle
          , :Rosie_F_Ouimette_2
          , :Kent_Allen_2
          , :Keynote_Calvin_Stephens
          , :fri_pm_feedback
          , :member_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':KimScott_Killpack', $KimScott_Killpack, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_1', $Kent_Allen_3, PDO::PARAM_STR);
  $stmt->bindValue(':Rosie_F_Ouimette', $Rosie_F_Ouimette, PDO::PARAM_STR);
  $stmt->bindValue(':Esther_Reid', $Esther_Reid, PDO::PARAM_STR);
  $stmt->bindValue(':Michelle_Lockhart', $Michelle_Lockhart, PDO::PARAM_STR);
  $stmt->bindValue(':Scott_Wardle', $Scott_Wardle, PDO::PARAM_STR);
  $stmt->bindValue(':Rosie_F_Ouimette_2', $Rosie_F_Ouimette_2, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_2', $Kent_Allen_4, PDO::PARAM_STR);
  $stmt->bindValue(':Keynote_Calvin_Stephens', $Keynote_Calvin_Stephens, PDO::PARAM_STR);
  $stmt->bindValue(':fri_pm_feedback', $fri_pm_feedback, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}




function sat_am_data($Keynote_Panel, $Kent_Allen_5, $Kristy_Pack,  $Georgia_Jared_1, $Jennie_Taylor, $Six_sisters, $Kent_Allen_6, $Jason_Clawson, $sat_am_feedback, $member_id){ 
    //echo "This is the fri_pm_data function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO saturday_am(Keynote_Panel, Kent_Allen_1, Kristy_Pack, Georgia_Jared_1, Jennie_Taylor, Six_Sisters, Jason_Clawson, Kent_Allen_2, sat_am_feedback, member_id, date_created) 
          Values(:Keynote_Panel
          , :Kent_Allen_1
          , :Kristy_Pack
          , :Georgia_Jared_1
          , :Jennie_Taylor
          , :Six_Sisters
          , :Kent_Allen_2
          , :Jason_Clawson
          , :sat_am_feedback
          , :member_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':Keynote_Panel', $Keynote_Panel, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_1',$Kent_Allen_5, PDO::PARAM_STR);
  $stmt->bindValue(':Kristy_Pack', $Kristy_Pack, PDO::PARAM_STR);
  $stmt->bindValue(':Georgia_Jared_1', $Georgia_Jared_1, PDO::PARAM_STR);
  $stmt->bindValue(':Jennie_Taylor', $Jennie_Taylor, PDO::PARAM_STR);
  $stmt->bindValue(':Six_Sisters', $Six_sisters, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_2', $Kent_Allen_6, PDO::PARAM_STR);
  $stmt->bindValue(':Jason_Clawson', $Jason_Clawson, PDO::PARAM_STR);
  $stmt->bindValue(':sat_am_feedback', $sat_am_feedback, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);
  

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}



function sat_pm_data($Camille_Winward, $Kent_Allen_7, $KimScott_Killpack, $Jennie_Kristy, $Rosie_F_Ouimette_3, $Brynn_Tiff, $Kent_Allen_8,   $Rosie_F_Ouimette_4, $Keynote_Matt_Townsend, $sat_pm_feedback, $member_id){ 
    //echo "This is the fri_pm_data function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO saturday_pm(Camille_Winward, Kent_Allen_1, KimScott_Killpack, Jennie_Kristy, Rosie_F_Ouimette, Brynn_Tiffany, Kent_Allen_2, Rosie_F_Ouimette_2, Keynote_Matt_Townsend, sat_pm_feedback, member_id, date_created) 
          Values(:Camille_Winward
          , :Kent_Allen_1
          , :KimScott_Killpack
          , :Jennie_Kristy
          , :Rosie_F_Ouimette
          , :Brynn_Tiff
          , :Kent_Allen_2
          , :Rosie_F_Ouimette_2
          , :Keynote_Matt_Townsend
          , :sat_pm_feedback
          , :member_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':Camille_Winward', $Camille_Winward, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_1', $Kent_Allen_7, PDO::PARAM_STR);
  $stmt->bindValue(':KimScott_Killpack', $KimScott_Killpack, PDO::PARAM_STR);
  $stmt->bindValue(':Jennie_Kristy', $Jennie_Kristy, PDO::PARAM_STR);
  $stmt->bindValue(':Rosie_F_Ouimette', $Rosie_F_Ouimette_3, PDO::PARAM_STR);
  $stmt->bindValue(':Brynn_Tiff', $Brynn_Tiff, PDO::PARAM_STR);
  $stmt->bindValue(':Kent_Allen_2', $Kent_Allen_6, PDO::PARAM_STR);
  $stmt->bindValue(':Rosie_F_Ouimette_2', $Rosie_F_Ouimette_3, PDO::PARAM_STR);
  $stmt->bindValue(':Keynote_Matt_Townsend', $Keynote_Matt_Townsend, PDO::PARAM_STR);
  $stmt->bindValue(':sat_pm_feedback', $sat_pm_feedback, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function feelings($welcomed, $newFriends, $speakersUseful, $venue, $timing, $usefulWebsite, $thur_activities, $barnDance, $fri_dinner, $fri_dance, $craft, $pre_recorded, $come_and_go, $member_id){ 

 //echo "This is the feelings function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO feelings(welcomed, newFriends, speakersUseful, venue, timing, usefulWebsite, thur_activities, fri_dinner, fri_dance, craft, pre_recorded, come_and_go, member_id, date_created) 
          Values(
            :welcomed
          , :newFriends
          , :speakersUseful
          , :venue
          , :timing
          , :usefulWebsite
          , :thur_activities
          , :fri_dinner
          , :fri_dance
          , :craft
          , :pre_recorded
          , :come_and_go
          , :member_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':welcomed', $welcomed, PDO::PARAM_STR);
  $stmt->bindValue(':newFriends', $newFriends, PDO::PARAM_STR);
  $stmt->bindValue(':speakersUseful', $speakersUseful, PDO::PARAM_STR);
  $stmt->bindValue(':venue', $venue, PDO::PARAM_STR);
  $stmt->bindValue(':timing', $timing, PDO::PARAM_STR);
  $stmt->bindValue(':usefulWebsite', $usefulWebsite, PDO::PARAM_STR);
  $stmt->bindValue(':thur_activities', $thur_activities, PDO::PARAM_STR);
  $stmt->bindValue(':fri_dinner', $fri_dinner, PDO::PARAM_STR);
  $stmt->bindValue(':fri_dance', $fri_dance, PDO::PARAM_STR);
  $stmt->bindValue(':craft', $craft, PDO::PARAM_STR);
  $stmt->bindValue(':pre_recorded', $pre_recorded, PDO::PARAM_STR);
  $stmt->bindValue(':come_and_go', $come_and_go, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

}




function responses($satisfied, $relevant, $learn, $general, $suggestions, $utilize, $thoughts, $member_id){ 
//echo "This is the responses function"; 
  //exit; 
  $db = widowsConnect();
  $sql = 'INSERT INTO responses(satisfied, relevant, learn, general, suggestions, utilize, thoughts, member_id, date_created) 
          Values(
            :satisfied
          , :relevant
          , :learn
          , :general
          , :suggestions
          , :utilize
          , :thoughts
          , :member_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':satisfied', $satisfied, PDO::PARAM_STR);
  $stmt->bindValue(':relevant', $relevant, PDO::PARAM_STR);
  $stmt->bindValue(':learn', $learn, PDO::PARAM_STR);
  $stmt->bindValue(':general', $general, PDO::PARAM_STR);
  $stmt->bindValue(':suggestions', $suggestions, PDO::PARAM_STR);
  $stmt->bindValue(':utilize', $utilize, PDO::PARAM_STR);
  $stmt->bindValue(':thoughts', $thoughts, PDO::PARAM_STR);
  $stmt->bindValue(':member_id', $member_id, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function confActivity($lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup, $userId, $confId){ 
$db = widowsConnect();
  $sql = 'INSERT INTO cache(lake, bike, temple, hike1, hike2, pickleball, axe,fireside, meet_greet, keynote, square, afterParty, cleanup, user_Id, conf_Id, date_created, last_changed_date) 
          Values(
            :lake
          , :bike
          , :temple
          , :hike1
          , :hike2
          , :pickleball
          , :axe
          , :fireside
          , :meet_greet
          , :keynote
          , :square
          , :afterParty
          , :cleanup
          , :user_Id
          , :conf_Id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':lake', $lake, PDO::PARAM_STR);
  $stmt->bindValue(':bike', $bike, PDO::PARAM_STR);
  $stmt->bindValue(':temple', $temple, PDO::PARAM_STR);
  $stmt->bindValue(':hike1', $hike1, PDO::PARAM_STR);
  $stmt->bindValue(':hike2', $hike2, PDO::PARAM_STR);
  $stmt->bindValue(':pickleball', $pickleball, PDO::PARAM_STR);
  $stmt->bindValue(':axe', $axe, PDO::PARAM_STR);
  $stmt->bindValue(':fireside', $fireside, PDO::PARAM_STR);
  $stmt->bindValue(':meet_greet', $meet_greet, PDO::PARAM_STR);
  $stmt->bindValue(':keynote', $keynote, PDO::PARAM_STR);
  $stmt->bindValue(':square', $square, PDO::PARAM_STR);
  $stmt->bindValue(':afterParty', $afterParty, PDO::PARAM_STR);
  $stmt->bindValue(':cleanup', $cleanup, PDO::PARAM_STR);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':conf_Id', $confId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

} 



//After insert into the cache table grab the cache_id that was generated
function getCacheUserId($userId){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = "SELECT cache_Id FROM cache WHERE user_Id = :userId"; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $userMatch = $stmt->fetch(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
}


 function topicInsert($firstTopic, $secondTopic, $thirdTopic, $topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11, $userId){ 
   $db = widowsConnect();
  $sql = 'INSERT INTO cache_topics(firstTopic, secondTopic, thirdTopic, topic1, topic2, topic3, topic4, topic5, topic6, topic7, topic8, topic9, topic10, topic11, user_Id,  date_created, last_changed_date) 
          Values(
            :firstTopic
          , :secondTopic
          , :thirdTopic
          , :topic1
          , :topic2
          , :topic3
          , :topic4
          , :topic5
          , :topic6
          , :topic7
          , :topic8
          , :topic9
          , :topic10
          , :topic11
          , :user_Id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':firstTopic', $firstTopic, PDO::PARAM_STR);
  $stmt->bindValue(':secondTopic', $secondTopic, PDO::PARAM_STR);
  $stmt->bindValue(':thirdTopic', $thirdTopic, PDO::PARAM_STR);
  $stmt->bindValue(':topic1', $topic1, PDO::PARAM_STR);
  $stmt->bindValue(':topic2', $topic2, PDO::PARAM_STR);
  $stmt->bindValue(':topic3', $topic3, PDO::PARAM_STR);
  $stmt->bindValue(':topic4', $topic4, PDO::PARAM_STR);
  $stmt->bindValue(':topic5', $topic5, PDO::PARAM_STR);
  $stmt->bindValue(':topic6', $topic6, PDO::PARAM_STR);
  $stmt->bindValue(':topic7', $topic7, PDO::PARAM_STR);
  $stmt->bindValue(':topic8', $topic8, PDO::PARAM_STR);
  $stmt->bindValue(':topic9', $topic9, PDO::PARAM_STR);
  $stmt->bindValue(':topic10', $topic10, PDO::PARAM_STR);
  $stmt->bindValue(':topic11', $topic11, PDO::PARAM_STR);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }

 function whichMeals($userId, $meal1, $meal2, $meal3){ 
       $db = widowsConnect();
  $sql = 'INSERT INTO cache_meals(user_Id, meal1, meal2, meal3,  date_created, last_date_changed) 
          Values(
            :user_Id
          , :meal1
          , :meal2
          , :meal3
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':meal1', $meal1, PDO::PARAM_STR);
  $stmt->bindValue(':meal2', $meal2, PDO::PARAM_STR);
  $stmt->bindValue(':meal3', $meal3, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
 }

function extraInfo($userId, $emergency, $emer_phone, $allergy, $volunteer, $payment){ 
   $db = widowsConnect();
  $sql = 'INSERT INTO cache_extra(user_Id, emergency, emer_phone, allergy, volunteer, payment, date_created, last_date_changed) 
          Values(
            :user_Id
          , :emergency
          , :emer_phone
          , :allergy
          , :volunteer
          , :payment
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':emergency', $emergency, PDO::PARAM_STR);
  $stmt->bindValue(':emer_phone', $emer_phone, PDO::PARAM_STR);
  $stmt->bindValue(':allergy', $allergy, PDO::PARAM_STR);
  $stmt->bindValue(':volunteer', $volunteer, PDO::PARAM_STR);
  $stmt->bindValue(':payment', $payment, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}



/* ******** This is for the knoxville conference registrations ********* */ 
function knoxActivity($allergies, $hike, $bonfire, $social, $keynotes, $sacrament, $userId, $confId){ 
 $db = widowsConnect();
  $sql = 'INSERT INTO knoxville(user_Id, allergies, hike, bonfire, saturdaySocial, sacrament, keynotes, conf_Id, date_created, last_date_changed) 
          Values(
            :user_Id
          , :allergies
          , :hike
          , :bonfire
          , :saturdaySocial
          , :sacrament
          , :keynotes
          , :conf_Id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':conf_Id', $confId, PDO::PARAM_STR);
  $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
  $stmt->bindValue(':hike', $hike, PDO::PARAM_STR);
  $stmt->bindValue(':bonfire', $bonfire, PDO::PARAM_STR);
  $stmt->bindValue(':saturdaySocial', $social, PDO::PARAM_STR);
  $stmt->bindValue(':sacrament', $sacrament, PDO::PARAM_STR);
  $stmt->bindValue(':keynotes', $keynotes, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function knoxActUpdate($userId, $allergies, $hike, $bonfire, $social,  $sacrament, $keynotes){ 
$db = widowsConnect();
  $sql = 'UPDATE knoxville
          SET
           user_Id = :user_Id
          ,allergies = :allergies
          ,hike = :hike
          ,bonfire = :bonfire
          ,saturdaySocial = :social
          ,sacrament = :sacrament
          ,keynotes = :keynotes
          ,last_date_changed =  current_date()
          Where user_Id = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
  $stmt->bindValue(':hike', $hike, PDO::PARAM_STR);
  $stmt->bindValue(':bonfire', $bonfire, PDO::PARAM_STR);
  $stmt->bindValue(':social', $social, PDO::PARAM_STR);
  $stmt->bindValue(':sacrament', $sacrament, PDO::PARAM_STR);
  $stmt->bindValue(':keynotes', $keynotes, PDO::PARAM_STR); 
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;


}







/* ********** These are the update registration functions for Cache Valley ****** */ 
 function confActUp($lake, $bike, $temple, $hike1, $hike2, $pickleball, $axe, $fireside, $meet_greet, $keynote, $square, $afterParty, $cleanup, $userId, $confId){ 
$db = widowsConnect();
  $sql = 'UPDATE cache
          SET
          lake =  :lake
          ,bike = :bike
          ,temple = :temple
          ,hike1 = :hike1
          ,hike2 = :hike2
          ,pickleball = :pickleball
          ,axe = :axe
          ,fireside = :fireside
          ,meet_greet = :meet_greet
          ,keynote = :keynote
          ,square =  :square
          ,afterParty = :afterParty
          ,cleanup = :cleanup
          ,user_Id = :user_Id
          ,conf_Id = :conf_Id
          ,last_changed_date =  current_date()
          Where user_Id = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':lake', $lake, PDO::PARAM_STR);
  $stmt->bindValue(':bike', $bike, PDO::PARAM_STR);
  $stmt->bindValue(':temple', $temple, PDO::PARAM_STR);
  $stmt->bindValue(':hike1', $hike1, PDO::PARAM_STR);
  $stmt->bindValue(':hike2', $hike2, PDO::PARAM_STR);
  $stmt->bindValue(':pickleball', $pickleball, PDO::PARAM_STR);
  $stmt->bindValue(':axe', $axe, PDO::PARAM_STR);
  $stmt->bindValue(':fireside', $fireside, PDO::PARAM_STR);
  $stmt->bindValue(':meet_greet', $meet_greet, PDO::PARAM_STR);
  $stmt->bindValue(':keynote', $keynote, PDO::PARAM_STR);
  $stmt->bindValue(':square', $square, PDO::PARAM_STR);
  $stmt->bindValue(':afterParty', $afterParty, PDO::PARAM_STR);
  $stmt->bindValue(':cleanup', $cleanup, PDO::PARAM_STR);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':conf_Id', $confId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

} 
 
 
 function topicUpdate($firstTopic, $secondTopic, $thirdTopic, $topic1, $topic2, $topic3, $topic4, $topic5, $topic6, $topic7, $topic8, $topic9, $topic10, $topic11, $userId){ 
   $db = widowsConnect();
  $sql = 'UPDATE cache_topics
   Set
           firstTopic = :firstTopic
          ,secondTopic = :secondTopic
          ,thirdTopic = :thirdTopic
          ,topic1 = :topic1
          ,topic2 = :topic2
          ,topic3 = :topic3
          ,topic4 = :topic4
          ,topic5 = :topic5
          ,topic6 = :topic6
          ,topic7 = :topic7
          ,topic8 = :topic8
          ,topic9 = :topic9
          ,topic10 = :topic10
          ,topic11 = :topic11
          ,user_Id = :user_Id
          ,last_changed_date = current_date()
          WHERE user_Id = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':firstTopic', $firstTopic, PDO::PARAM_STR);
  $stmt->bindValue(':secondTopic', $secondTopic, PDO::PARAM_STR);
  $stmt->bindValue(':thirdTopic', $thirdTopic, PDO::PARAM_STR);
  $stmt->bindValue(':topic1', $topic1, PDO::PARAM_STR);
  $stmt->bindValue(':topic2', $topic2, PDO::PARAM_STR);
  $stmt->bindValue(':topic3', $topic3, PDO::PARAM_STR);
  $stmt->bindValue(':topic4', $topic4, PDO::PARAM_STR);
  $stmt->bindValue(':topic5', $topic5, PDO::PARAM_STR);
  $stmt->bindValue(':topic6', $topic6, PDO::PARAM_STR);
  $stmt->bindValue(':topic7', $topic7, PDO::PARAM_STR);
  $stmt->bindValue(':topic8', $topic8, PDO::PARAM_STR);
  $stmt->bindValue(':topic9', $topic9, PDO::PARAM_STR);
  $stmt->bindValue(':topic10', $topic10, PDO::PARAM_STR);
  $stmt->bindValue(':topic11', $topic11, PDO::PARAM_STR);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }




 function mealUpdate($userId, $meal1, $meal2, $meal3){ 
       $db = widowsConnect();
  $sql = 'Update cache_meals 
          Set
           meal1 = :meal1
          ,meal2 = :meal2
          ,meal3 = :meal3
          ,user_Id = :user_Id
          ,last_date_changed = current_date()
          WHERE user_Id = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':meal1', $meal1, PDO::PARAM_STR);
  $stmt->bindValue(':meal2', $meal2, PDO::PARAM_STR);
  $stmt->bindValue(':meal3', $meal3, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }


function extraInfoUpdate($userId, $emergency, $emer_phone, $allergy, $volunteer, $payment){ 
   $db = widowsConnect();
  $sql = 'Update cache_extra
   SET 
           user_Id = :user_Id
          ,emergency =  :emergency
          ,emer_phone =  :emer_phone
          ,allergy =  :allergy
          ,volunteer =  :volunteer
          ,payment =  :payment
          ,last_date_changed =  current_date()
          WHERE user_Id = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':emergency', $emergency, PDO::PARAM_STR);
  $stmt->bindValue(':emer_phone', $emer_phone, PDO::PARAM_STR);
  $stmt->bindValue(':allergy', $allergy, PDO::PARAM_STR);
  $stmt->bindValue(':volunteer', $volunteer, PDO::PARAM_STR);
  $stmt->bindValue(':payment', $payment, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


//Get the participants activity choices 
function details_1($userId){ 
     
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.lake 
WHERE c.user_id = :userId) AS lake, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.bike
WHERE c.user_id = :userId) AS bike, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.temple 
WHERE c.user_id = :userId) AS temple,  (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.hike1 
WHERE c.user_id = :userId) as Hike1, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.hike2
WHERE c.user_id = :userId) AS Hike2, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.pickleball
WHERE c.user_id = :userId) AS pickleball, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.axe 
WHERE c.user_id = :userId) AS axe, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.fireside 
WHERE c.user_id = :userId) AS fireside, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.meet_greet
WHERE c.user_id = :userId) AS "Meet and Greet", (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.keynote 
WHERE c.user_id = :userId) AS keynotes, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.square
WHERE c.user_id = :userId) AS square, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.afterParty
WHERE c.user_id = :userId) AS afterParty, (SELECT  ad.description 
FROM cache_activity_define ad
JOIN cache c
ON ad.activity_Id = c.cleanup
WHERE c.user_id = :userId) As cleanup
FROM cache c
JOIN cache_topics ct 
ON c.user_Id = ct.user_id
JOIN users u 
ON c.user_Id = u.userId
WHERE ct.user_id = :userId'; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;
}

//Get the participants topic choices 
function details_2($userId){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT (SELECT  td.description 
FROM cache_topic_define td
JOIN cache_topics ct
ON td.define_Id = ct.firstTopic
WHERE ct.user_id = :userId) AS firstTopic, (SELECT  td.description 
FROM cache_topic_define td
JOIN cache_topics ct
ON td.define_Id = ct.secondTopic
WHERE ct.user_id = :userId) AS secondTopic, (SELECT td.description FROM cache_topic_define td
JOIN cache_topics ct
ON td.define_Id = ct.thirdTopic 
WHERE ct.user_id = :userId) AS  thirdTopic FROM cache c
JOIN cache_topics ct 
ON c.user_Id = ct.user_id
JOIN users u 
ON c.user_Id = u.userId
WHERE ct.user_id = :userId';  
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;
}

//Get the participants meal choices 
function details_3($userId){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT (SELECT  md.meal 
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal1
WHERE cm.user_id = :userId) AS meal1, (SELECT  md.meal 
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal2
WHERE cm.user_id = :userId) AS meal2, (SELECT  md.meal 
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal3
WHERE cm.user_id = :userId) AS meal3
FROM cache c
JOIN cache_topics ct 
ON c.user_Id = ct.user_id
JOIN users u 
ON c.user_Id = u.userId
WHERE ct.user_id = :userId';  
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;
}
function getMealId($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT (SELECT  md.define_id 
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal1
WHERE cm.user_id = :userId) AS meal1, (SELECT  md.define_id 
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal2
WHERE cm.user_id = :userId) AS meal2, (SELECT  md.define_id
FROM cache_meal_define md
JOIN cache_meals cm
ON md.define_Id = cm.meal3
WHERE cm.user_id = :userId) AS meal3
FROM cache c
JOIN cache_topics ct 
ON c.user_Id = ct.user_id
JOIN users u 
ON c.user_Id = u.userId
WHERE u.userId = :userId'; 
          
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
$stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;
}

function details_All($userId){ 

// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM cache_topics
WHERE user_Id = :userId;';  
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;

}

function details_4($userId){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT emergency, emer_phone, allergy, volunteer, payment FROM cache_extra 
WHERE user_Id = :userId';  
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);


  //echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
  return $regData;

}
function isRegisteredConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_Id FROM cache 
WHERE user_Id = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
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


function isRegisteredKConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_Id FROM knoxville 
WHERE user_Id = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
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



//Check to see if they are already registered
function isRegisteredData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM cache  
          WHERE user_Id = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}


//Check to see if they are already registered
function isRegisteredKData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM knoxville  
          WHERE user_Id = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}


//Check to see if they are already registered
function getKId($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_Id, conf_Id FROM knoxville
WHERE user_Id = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);

  $stmt->closeCursor();
  return $regData;
}


//Get conference name, and Id to build the select list. 
function confName($confId){ 
   // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT conf_Id, conf_Name FROM conference_lookup WHERE conf_Id = :conf_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':conf_Id', $confId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $regData;
}

function cancelReg($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM cache_extra 
           WHERE user_id = :userId';           
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

function cancelReg_2($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
 
  $sql = 'DELETE FROM cache_meals 
WHERE user_id = :userId';
          
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

function cancelReg_3($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement

$sql = 'DELETE FROM cache_topics 
WHERE user_id = :userId'; 
           
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

function cancelReg_4($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement

$sql = 'DELETE FROM cache 
WHERE user_id = :userId';           
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

function getConfReg($userId){ 
 // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT cache_id, knox_Id FROM confReg WHERE user_Id = :user_Id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $regData;

}



function cancelConf($userId, $cache_id, $knox_Id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement

$sql = 'UPDATE confReg
SET  cache_id = :cache_id
, knox_Id = :knox_Id
WHERE user_Id = :userId'; 

  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':cache_id', $cache_id, PDO::PARAM_STR);
  $stmt->bindValue(':knox_Id', $knox_Id, PDO::PARAM_STR);
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
function cancelKReg($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM knoxville
           WHERE user_id = :userId';           
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
/*****************Idaho Functions ********************/ 
/****** ARE THEY REGISTERED FOR THIS CONFERENCE ALREADY? ****/ 
function isRegisteredIdConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_id FROM idaho 
WHERE user_id = :userid';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
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
function isRegisteredIdData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM idaho i
JOIN idaho_activities a
ON i.user_id = a.userId
JOIN idaho_meals m 
ON i.user_id = m.userId
JOIN idaho_classes c 
ON i.user_id = c.userId
JOIN idaho_other o 
ON i.user_id = o.userId
WHERE i.user_id = :userId'; 
         
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

function isRegisteredIDWData(){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT i.walkin_id, firstName, lastName, city, state FROM IdahoWalkin i
JOIN IdahoWalkinContact ic 
ON i.walkin_id = ic.walkin_id'; 
         
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}
/* ******** This will enter the data into the Idaho table ********* */ 
function idaho( $userId, $confId) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO idaho(user_id, conf_id, date_created, last_date_changed) 
          Values(
            :user_id
          , :conf_id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
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


function idahoAct($userId, $act_1, $act_2, $act_3, $act_4, $act_5)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO idaho_activities(act_1, act_2, act_3, act_4, act_5, userId, date_created, last_date_changed) 
          Values(
            :act_1
          , :act_2
          , :act_3
          , :act_4
          , :act_5
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
   $stmt->bindValue(':act_5', $act_4, PDO::PARAM_STR);
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

function idahoMeal($userId, $meal_1, $meal_2) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO idaho_meals(meal_1, meal_2, userId, date_created, last_date_changed) 
          Values(
            :meal_1
          , :meal_2
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal_2', $meal_2, PDO::PARAM_STR);
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

function idahoClasses($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5,
         $keynote_1, $keynote_2, $userId) 
        { //echo $workshop_1; 
        //exit; 
         $db = widowsConnect();
  $sql = 'INSERT INTO idaho_classes(workshop_1, workshop_2, workshop_3, workshop_4, workshop_5,
        keynote_1, keynote_2, userId, date_created, last_date_changed) 
          Values(
            :workshop_1
          , :workshop_2
          , :workshop_3
          , :workshop_4
          , :workshop_5
          , :keynote_1
          , :keynote_2
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':workshop_1', $workshop_1, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_2', $workshop_2, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_3', $workshop_3, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_4', $workshop_4, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_5', $workshop_5, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_2', $keynote_2, PDO::PARAM_STR);
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


function idahoOther($userId, $lodging, $church) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO idaho_other(lodging, church, userId, date_created, last_date_changed) 
          Values(
            :lodging
          , :church
          , :userId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);

  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':lodging', $lodging, PDO::PARAM_STR);
  $stmt->bindValue(':church', $church, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

/* ******** This will enter the data into the Walkin Idaho tables ********* */ 
function idahoWalkinContact($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf, $adminId ){
$db = widowsConnect();
 $sql = 'INSERT INTO IdahoWalkinContact(firstName, lastName, userEmail, address, city, state, county, zipcode, country, phone, age, gender, widowed, conf, date_created, admin_id)
      VALUES (
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
      , CURDATE()
      , :admin_id)'; 
$stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
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
  $stmt->bindValue(':admin_id', $adminId, PDO::PARAM_STR);
  // Insert the data
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}
function checkExistingWalkinReg($firstName, $lastName, $userEmail){ 
$db = widowsConnect();
$sql = 'SELECT * FROM IdahoWalkinContact 
WHERE firstName = :firstName
AND lastName = :lastName 
AND userEmail = :userEmail ';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $getWalkinId = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return  $getWalkinId;

}
function getWalkinId($firstName, $lastName, $userEmail){ 
  $db = widowsConnect();
  $sql = 'SELECT walkin_id FROM IdahoWalkinContact 
WHERE firstName = :firstName
AND lastName = :lastName 
AND userEmail = :userEmail ';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
  $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
  $stmt->bindValue(':userEmail', $userEmail, PDO::PARAM_STR);
  $stmt->execute();
  $getWalkinId = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return  $getWalkinId;

}   

    
function idahoWalkin($walkin_id, $adminId, $confId) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO IdahoWalkin(walkin_id, conf_id, date_created, admin_id) 
          Values(
            :walkin_id
          , :conf_id
          , current_date()
          , :admin_id)'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
  $stmt->bindValue(':admin_id', $adminId, PDO::PARAM_STR);
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


function idahoWalkinActivities($act_1, $act_2, $act_3, $act_4, $act_5, $church, $walkin_id, $adminId)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO IdahoWalkinActivities(act_1, act_2, act_3, act_4, act_5, church, walkin_id, admin_id, date_created) 
          Values(
            :act_1
          , :act_2
          , :act_3
          , :act_4
          , :act_5
          , :church
          , :walkin_id
          , :admin_id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
  $stmt->bindValue(':act_5', $act_4, PDO::PARAM_STR);
  $stmt->bindValue(':church', $church, PDO::PARAM_STR);
  $stmt->bindValue(':admin_id', $adminId, PDO::PARAM_STR);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);


  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function idahoWalkinMeal($adminId, $meal_1, $meal_2, $walkin_id) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO IdahoWalkinMeal(meal_1, meal_2, walkin_id, admin_id, date_created) 
          Values(
            :meal_1
          , :meal_2
          , :walkin_id
          , :admin_Id
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal_2', $meal_2, PDO::PARAM_STR);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
  $stmt->bindValue(':admin_Id', $adminId, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function idahoWalkinClasses($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5,
         $keynote_1, $keynote_2, $walkin_id, $adminId) 
        {// echo $walkin_id; 
        //exit; 
         $db = widowsConnect();
  $sql = 'INSERT INTO IdahoWalkinClasses(workshop_1, workshop_2, workshop_3, workshop_4, workshop_5,
          keynote_1, keynote_2, walkin_id, date_created, admin_id) 
          Values(
            :workshop_1
          , :workshop_2
          , :workshop_3
          , :workshop_4
          , :workshop_5
          , :keynote_1
          , :keynote_2
          , :walkin_id
          , current_date()
          , :admin_id)'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':workshop_1', $workshop_1, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_2', $workshop_2, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_3', $workshop_3, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_4', $workshop_4, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_5', $workshop_5, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_2', $keynote_2, PDO::PARAM_STR);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
  $stmt->bindValue(':admin_id', $adminId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}





//********************** Idaho UPdate functions *******************************************************
function idahoActUpdate($userId, $act_1, $act_2, $act_3, $act_4, $act_5){ 
       $db = widowsConnect();
  $sql = 'Update idaho_activities 
          Set
           act_1 = :act_1
          ,act_2 = :act_2
          ,act_3 = :act_3
          ,act_4 = :act_4
          ,act_5 = :act_5
          ,userId = :userId
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
  $stmt = $db->prepare($sql);
   $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
   $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
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




function idahoMealUpdate($userId, $meal_1, $meal_2){ 
       $db = widowsConnect();
  $sql = 'Update idaho_meals 
          Set
           meal_1 = :meal1
          ,meal_2 = :meal2
          ,userId = :user_Id
          ,last_date_changed = current_date()
          WHERE userId = :user_Id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_Id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':meal1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal2', $meal_2, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }
 
function   idahoClassesUpdate(
                    $workshop_1,
                    $workshop_2,
                    $workshop_3,
                    $workshop_4,
                    $workshop_5,
                    $keynote_1,
                    $keynote_2,
                    $userId
                ){ 
       $db = widowsConnect();
  $sql = 'Update idaho_classes 
          Set
           workshop_1 = :workshop_1
          ,workshop_2 = :workshop_2
          ,workshop_3 = :workshop_3
          ,workshop_4 = :workshop_4
          ,workshop_5 = :workshop_5
          ,keynote_1 = :keynote_1
          ,keynote_2 = :keynote_2
          ,userId = :userId
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':workshop_1', $workshop_1, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_2', $workshop_2, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_3', $workshop_3, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_4', $workshop_4, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_5', $workshop_5, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_2', $keynote_2, PDO::PARAM_STR);
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

function   idahoOtherUpdate($userId, $lodging, $church){ 
       $db = widowsConnect();
  $sql = 'Update idaho_other
          Set
           lodging = :lodging
          ,church = :church
          ,userId = :userId
          ,last_date_changed = current_date()
          WHERE userId = :userId'; 
  $stmt = $db->prepare($sql);
   $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':lodging', $lodging, PDO::PARAM_STR);
  $stmt->bindValue(':church', $church, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;

 }
function cancelIdReg($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM idaho_other
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




function cancelIdReg2($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM idaho_classes
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


function cancelIdReg3($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM idaho_meals
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
function cancelIdReg4($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM idaho_activities
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

function cancelIdReg5($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM idaho
           WHERE user_id = :userId';           
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

function cancelIdahoWReg($walkin_id){ 
// Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM IdahoWalkinClasses
           WHERE walkin_id = :walkin_id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
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

function cancelIdahoWReg2($walkin_id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM IdahoWalkinMeal
           WHERE walkin_id = :walkin_id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
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
function cancelIdahoWReg3($walkin_id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM IdahoWalkinActivities
           WHERE walkin_id = :walkin_id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
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
function cancelIdahoWReg4($walkin_id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM IdahoWalkin
           WHERE walkin_id = :walkin_id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
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

function cancelIdahoWReg5($walkin_id){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM IdahoWalkinContact
           WHERE walkin_id = :walkin_id';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':walkin_id', $walkin_id, PDO::PARAM_STR);
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

/*****************Remarried Functions ********************/ 


/****** ARE THEY REGISTERED FOR THIS CONFERENCE ALREADY? ****/ 
function isRegisteredRLConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_id FROM remarried_life 
WHERE user_id = :userid';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
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
function isRegisteredRLData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT *, u.firstName, u.lastName, u.phone, u.userEmail, u.city, u.state FROM remarried_life r
JOIN users u
ON r.user_id = u.userId
WHERE u.userId = :userId';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

/* ******** This will enter the data into the Remarried_Life table ********* */ 
function remarriedAct($status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId){
         $db = widowsConnect();
  $sql = 'INSERT INTO remarried_life(user_id, status, firstName2, lastName2, allergies, diet1, diet2, social, comment, task1, task2, task3, task4, payment, confId, date_created, last_date_changed) 
          Values(
            :user_id
          , :status
          , :firstName2
          , :lastName2
          , :allergies
          , :diet1
          , :diet2
          , :social
          , :comment
          , :task1
          , :task2
          , :task3
          , :task4
          , :payment
          , :confId
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':status', $status, PDO::PARAM_STR);
  $stmt->bindValue(':firstName2', $firstName2, PDO::PARAM_STR);
  $stmt->bindValue(':lastName2', $lastName2, PDO::PARAM_STR);
  $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
  $stmt->bindValue(':diet1', $diet1, PDO::PARAM_STR);
  $stmt->bindValue(':diet2', $diet2, PDO::PARAM_STR);
  $stmt->bindValue(':social', $social, PDO::PARAM_STR);
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
  $stmt->bindValue(':task1', $task1, PDO::PARAM_STR);
  $stmt->bindValue(':task2', $task2, PDO::PARAM_STR);
  $stmt->bindValue(':task3', $task3, PDO::PARAM_STR);
  $stmt->bindValue(':task4', $task4, PDO::PARAM_STR);
  $stmt->bindValue(':payment', $payment, PDO::PARAM_STR);
  $stmt->bindValue(':confId', $confId, PDO::PARAM_STR);

  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

/*********** Check for a possible existing spouse in the users table **************/  
function checkForPerson2($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = "SELECT status FROM remarried_life WHERE user_id = :userId"; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $userMatch = $stmt->fetchAll(PDO::FETCH_ASSOC);


 // echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
 return $userMatch; 
}


function getPossibleSpouseName($userId){ 

  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = "SELECT userId, firstName, lastName, city, state, userEmail, widowed FROM users WHERE userId = (SELECT (SELECT u.userId FROM users u WHERE firstName = r.firstName2 AND lastName = r.lastName2) FROM users u
JOIN remarried_life r
ON u.userId = r.user_Id
WHERE r.user_Id = :userId)"; 
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);
  // Check the data
  $stmt->execute();
  $userMatch = $stmt->fetchAll(PDO::FETCH_ASSOC);


 // echo $userMatch; 
  //exit; 
  $stmt->closeCursor();
 return $userMatch; 
}
/**************** Update Registration ********************/

 function remarriedActUp($remarried_id, $status, $firstName2, $lastName2, $comment, $social, $task1, $task2, $task3, $task4, $allergies, $diet1, $diet2, $payment, $userId, $confId)
{ 

$db = widowsConnect();
  $sql = 'UPDATE remarried_life
          SET
          user_id = :user_id
          ,status = :status
          ,firstName2 = :firstName2
          ,lastName2 = :lastName2    
         ,allergies = :allergies
         ,diet1 = :diet1
         ,diet2 = :diet2
         ,social = :social
         ,comment = :comment
         ,task1 = :task1
         ,task2 = :task2
         ,task3 = :task3
         ,task4 = :task4
         ,payment = :payment
         ,confId = :confId
         ,last_date_changed =  current_date()
          Where remarried_id = :remarried_id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':remarried_id', $remarried_id, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  $stmt->bindValue(':status', $status, PDO::PARAM_STR);
  $stmt->bindValue(':firstName2', $firstName2, PDO::PARAM_STR);
  $stmt->bindValue(':lastName2', $lastName2, PDO::PARAM_STR);
  $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
  $stmt->bindValue(':diet1', $diet1, PDO::PARAM_STR);
  $stmt->bindValue(':diet2', $diet2, PDO::PARAM_STR);
  $stmt->bindValue(':social', $social, PDO::PARAM_STR);
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
  $stmt->bindValue(':task1', $task1, PDO::PARAM_STR);
  $stmt->bindValue(':task2', $task2, PDO::PARAM_STR);
  $stmt->bindValue(':task3', $task3, PDO::PARAM_STR);
  $stmt->bindValue(':task4', $task4, PDO::PARAM_STR);
  $stmt->bindValue(':payment', $payment, PDO::PARAM_STR);
  $stmt->bindValue(':confId', $confId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}



/*****************Delete/Cancel Registration **************/ 
function cancelRemReg($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM remarried_life
           WHERE user_id = :userId';           
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
// ************************ SAN ANTONIO FUNCTIONS ****************************************************************
// ***************************************************************************************************************


/****** ARE THEY REGISTERED FOR THIS CONFERENCE ALREADY? ****/ 
function isRegisteredSAConf($userId){ 
  // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT user_id FROM sanAntonio 
  WHERE user_id = :userid';           
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':userid', $userId, PDO::PARAM_STR);
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
function isRegisteredSAData($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'SELECT * FROM sanAntonio s
JOIN SA_Activities a
ON s.user_id = a.user_id
JOIN SA_Meals m 
ON s.user_id = m.user_id
JOIN SA_classes c 
ON s.user_id = c.user_id
WHERE s.user_id = :user_id'; 
         
  // Create the prepared statement using the phpmotors connection
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);

 // Check the data
  $stmt->execute();
  $regData = $stmt->fetchALL(PDO::FETCH_ASSOC);
 
  $stmt->closeCursor();
  return $regData;
}

function sanAntonio( $userId, $confId) 
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO sanAntonio(user_id, conf_id, date_created, last_date_changed) 
          Values(
            :user_id
          , :conf_id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
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


function sanAct($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $userId)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO SA_Activities(act_1, act_2, act_3, act_4, act_5, act_6, act_7, user_id, date_created, last_date_changed) 
          Values(
            :act_1
          , :act_2
          , :act_3
          , :act_4
          , :act_5
          , :act_6
          , :act_7
          , :user_id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
  $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
  $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
  $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
  $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
  $stmt->bindValue(':act_6', $act_6, PDO::PARAM_STR);
  $stmt->bindValue(':act_7', $act_7, PDO::PARAM_STR);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);


  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function sanAMeal($userId, $meal_1, $meal_2, $emergencyName, $emergencyPhone, $foodNeeds)
        { 
         $db = widowsConnect();
  $sql = 'INSERT INTO SA_Meals(meal_1, meal_2, emergencyName, emergencyPhone, foodNeeds, user_id, date_created, last_date_changed) 
          Values(
            :meal_1
          , :meal_2
          , :emergencyName
          , :emergencyPhone
          , :foodNeeds
          , :user_id
          , current_date()
          , current_date())'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal_2', $meal_2, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':foodNeeds', $foodNeeds, PDO::PARAM_STR);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);


  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function sanAClasses($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6,
         $keynote_1, $keynote_2, $church, $userId) 
        { //echo $workshop_1; 
        //exit; 
         $db = widowsConnect();
  $sql = 'INSERT INTO SA_classes(workshop_1, workshop_2, workshop_3, workshop_4, workshop_5, workshop_6,
        keynote_1, keynote_2, church, user_id, date_created, last_date_changed) 
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
          , :user_id
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
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function sanActUp($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $userId){ 

$db = widowsConnect();
  $sql = 'UPDATE SA_Activities
          SET
           act_1 = :act_1
          ,act_2 = :act_2
          ,act_3 = :act_3
          ,act_4 = :act_4
          ,act_5 = :act_5
          ,act_6 = :act_6
          ,act_7 = :act_7
          ,user_id = :user_id
          ,last_date_changed = current_date()
          WHERE user_id = :user_id'; 
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':act_1', $act_1, PDO::PARAM_STR);
   $stmt->bindValue(':act_2', $act_2, PDO::PARAM_STR);
   $stmt->bindValue(':act_3', $act_3, PDO::PARAM_STR);
   $stmt->bindValue(':act_4', $act_4, PDO::PARAM_STR);
   $stmt->bindValue(':act_5', $act_5, PDO::PARAM_STR);
   $stmt->bindValue(':act_6', $act_6, PDO::PARAM_STR);
   $stmt->bindValue(':act_7', $act_7, PDO::PARAM_STR);
   $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}


function sanAMealUp($userId, $meal_1, $meal_2, $emergencyName, $emergencyPhone, $foodNeeds){ 
    $db = widowsConnect();
$sql = 'UPDATE SA_Meals
          SET
           meal_1 = :meal_1
          ,meal_2 = :meal_2
          ,emergencyName = :emergencyName
          ,emergencyPhone = :emergencyPhone
          ,foodNeeds = :foodNeeds
          ,user_id = :user_id
          ,last_date_changed = current_date()
          WHERE user_id = :user_id'; 
  $stmt = $db->prepare($sql);
   $stmt->bindValue(':meal_1', $meal_1, PDO::PARAM_STR);
  $stmt->bindValue(':meal_2', $meal_2, PDO::PARAM_STR);
    $stmt->bindValue(':emergencyName', $emergencyName, PDO::PARAM_STR);
  $stmt->bindValue(':emergencyPhone', $emergencyPhone, PDO::PARAM_STR);
  $stmt->bindValue(':foodNeeds', $foodNeeds, PDO::PARAM_STR);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;
}

function sanAClassesUp($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6,
         $keynote_1, $keynote_2, $church, $userId){ 
$db = widowsConnect();
  $sql = 'UPDATE SA_classes
          SET
           workshop_1 = :workshop_1
          ,workshop_2 = :workshop_2
          ,workshop_3 = :workshop_3
          ,workshop_4 = :workshop_4
          ,workshop_5 = :workshop_5
          ,workshop_6 = :workshop_6
          ,keynote_1 = :keynote_1
          ,keynote_2 = :keynote_2
          ,church = :church
          ,user_id = :user_id
          ,last_date_changed = current_date()
          WHERE user_id = :user_id'; 
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':workshop_1', $workshop_1, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_2', $workshop_2, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_3', $workshop_3, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_4', $workshop_4, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_5', $workshop_5, PDO::PARAM_STR);
  $stmt->bindValue(':workshop_6', $workshop_6, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_1', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':keynote_2', $keynote_1, PDO::PARAM_STR);
  $stmt->bindValue(':church', $church, PDO::PARAM_STR);
  $stmt->bindValue(':user_id', $userId, PDO::PARAM_STR);
  // Ask how many rows changed as a result of our insert
  $stmt->execute();
  // Ask how many rows changed as a result of our insert
  $rowsChanged = $stmt->rowCount();
  // Close the database interaction
  $stmt->closeCursor();
  // Return the indication of success (rows changed)
  return $rowsChanged;


         }

function cancelSAReg($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM SA_classes
           WHERE user_id = :userId';           
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




function cancelSAReg2($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM SA_Meals
           WHERE user_id = :userId';           
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


function cancelSAReg3($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM SA_Activities
           WHERE user_id = :userId';           
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
function cancelSAReg4($userId){ 
    // Create a connection object using the widows connection function
  $db = widowsConnect();
  // The SQL statement
  $sql = 'DELETE FROM sanAntonio
           WHERE user_id = :userId';           
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
?>