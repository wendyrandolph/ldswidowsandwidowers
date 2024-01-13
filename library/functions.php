<?php
    //var_dump($_SESSION['loggedin']); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');

//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/users/index.php');




function checkEmail($clientEmail){ 
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
return $valEmail; 
}

//Check password for a minimum of 8 characters
//At least 1 capital letter, at least 1 number and
//at least 1 special character
function checkPassword($userPW){ 
$pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
return preg_match($pattern, $userPW);
}

//Checking for an existing user - this is an admin function: 
function displayUserAccount($checkforAccount){ 

$userEmail = $checkforAccount[0]['userEmail'];
$firstName = $checkforAccount[0]['firstName']; 
$lastName = $checkforAccount[0]['lastName']; 
$city = $checkforAccount[0]['city']; 
$state = $checkforAccount[0]['state'];  

$buildDisplay = "<ul class='display'>";
$buildDisplay .= "<li><strong> Email: </strong> $userEmail </li>"; 
$buildDisplay .= "<li><strong> Name: </strong> $firstName  $lastName </li>"; 
$buildDisplay .= "<li><strong> Location: </strong> $city  ,  $state </li>"; 
$buildDisplay .= "</ul></br>"; 
return $buildDisplay; 
}


function confirmData($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf){ 
$buildDisplay = "<ul class='display'>";
$buildDisplay .= "<li><strong> Email: </strong> $userEmail </li>"; 
$buildDisplay .= "<li><strong> Name: </strong> $firstName  $lastName </li>"; 
$buildDisplay .= "<li><strong> Address: </strong> $address  </li>"; 
$buildDisplay .= "<li><strong> City: </strong> $city  $state  $zipcode </li>"; 
$buildDisplay .= "<li><strong> Phone: </strong> $phone </li>"; 
$buildDisplay .= "<li><strong>Age:</strong>   $age </td> </tr>"; 
$buildDisplay .= "<li><strong> Country if not in US: </strong> $country </li>";
$buildDisplay .= "<li><strong> Gender: </strong> $gender  </li>"; 
$buildDisplay .= "<li><strong> Widowed for how long? </strong> $widowed </li>"; 
$buildDisplay .= "<li><strong> Conferences attended: </strong>$conf </li>"; 
$buildDisplay .= "</ul></br>"; 
return $buildDisplay; 
}

//This function helps build the confirm view for users who were registered for the conference in 2023
function confirmUSER($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $age, $gender, $widowed, $conf){ 
$buildDisplay = "<ul class='display'>";
$buildDisplay .= "<li><strong> Email: </strong> $userEmail </li>"; 
$buildDisplay .= "<li><strong> Name: </strong> $firstName  $lastName </li>"; 
$buildDisplay .= "<li><strong> Address: </strong> $address  </li>"; 
$buildDisplay .= "<li><strong> City: </strong> $city  $state  $zipcode </li>"; 
$buildDisplay .= "<li><strong> Phone: </strong> $phone </li>"; 
$buildDisplay .= "<li><strong> Age:</strong>   $age </td> </tr>"; 
$buildDisplay .= "<li><strong> Country if not in US: </strong> $country </li>";
$buildDisplay .= "<li><strong> Gender: </strong> $gender  </li>"; 
$buildDisplay .= "<li><strong> Widowed for how long? </strong> $widowed </li>"; 
$buildDisplay .= "<li><strong> Conferences attended: </strong>$conf </li>"; 
$buildDisplay .= "</ul></br>"; 
return $buildDisplay; 
}

//This function helps build the confirm view for users who were registered for the conference in 2022
function confirmUSER_Idaho($firstName, $lastName, $userEmail, $address, $city, $state, $county, $zipcode, $country, $phone, $gender){ 
$buildDisplay = "<ul class='display'>";
$buildDisplay .= "<li><strong> Email: </strong> $userEmail </li>"; 
$buildDisplay .= "<li><strong> Name: </strong> $firstName  $lastName </li>"; 
$buildDisplay .= "<li><strong> Address: </strong> $address  </li>"; 
$buildDisplay .= "<li><strong> City: </strong> $city  $state  $zipcode </li>"; 
$buildDisplay .= "<li><strong> Phone: </strong> $phone </li>"; 
$buildDisplay .= "<li><strong> Country if not in US: </strong> $country </li>";
$buildDisplay .= "<li><strong> Gender: </strong> $gender  </li>"; 
$buildDisplay .= "</ul></br>"; 
return $buildDisplay; 
}



function formatPhoneNumber($phone) {
    $phone = preg_replace('/[^0-9]/','',$phone);

    if(strlen($phone) > 10) {
        $countryCode = substr($phone, 0, strlen($phone)-10);
        $areaCode = substr($phone, -10, 3);
        $nextThree = substr($phone, -7, 3);
        $lastFour = substr($phone, -4, 4);

        $phone = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phone) == 10) {
        $areaCode = substr($phone, 0, 3);
        $nextThree = substr($phone, 3, 3);
        $lastFour = substr($phone, 6, 4);

        $phone= '('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phoner) == 7) {
        $nextThree = substr($phoner, 0, 3);
        $lastFour = substr($phoner, 3, 4);

        $phone = $nextThree.'-'.$lastFour;
    }

    return $phone;
}

function build_0($getConfName){ 
    $confList = "<label for='conf1'> Which conference are you registering for?</label>"; 
    $confList .= "<select name='conf1' id='conf1' class='input' required>";
    $confList .= "<option>Please Select One</option>"; 
    foreach ($getConfName as $getConfName) { 
        
     $confList .= '<option value="$getConfName[conf_Id]">$getConfName[conf_Name]</option>'; 
    } 
    $confList .= '</select>'; 
    
    return $confList; 
   }


function build_1($confDetails_1){ 

$name = $confDetails_1[0]['Name']; 
$lake = $confDetails_1[0]['lake']; 
$bike = $confDetails_1[0]['bike']; 
$temple = $confDetails_1[0]['temple']; 
$Hike1 = $confDetails_1[0]['Hike1']; 
$Hike2 = $confDetails_1[0]['Hike2']; 
$pickleball = $confDetails_1[0]['pickleball']; 
$axe = $confDetails_1[0]['axe']; 
$fireside = $confDetails_1[0]['fireside']; 
$meet = $confDetails_1[0]['Meet and Greet']; 
$keynotes = $confDetails_1[0]['keynotes']; 
$square = $confDetails_1[0]['square']; 
$afterParty = $confDetails_1[0]['afterParty']; 
$cleanup = $confDetails_1[0]['cleanup']; 


$buildList = "<header class='btn'> Thursday Activities 1:00-5:00pm </header>"; 

if(isset($lake)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $lake. "</li>" ;   
}elseif(!isset($lake)){
$buildList .= "<li class='padding'><strong>  </strong> Day at the Lake </li>" ;  
} 

if(isset($bike)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $bike . "</li>" ;   
}elseif(!isset($bike)){
$buildList .= "<li class='padding'><strong>  </strong> Bike Ride through Sardine Canyon </li>" ;  
} 

$buildList .= "<header class='btn'> Friday Morning Activity </header>"; 
if(isset($temple)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $temple . "</li>" ;   
}elseif(!isset($temple)){
$buildList .= "<li class='padding'><strong>  </strong> Morning Temple Session 9:00am-11:00am </li>" ;  
} 

$buildList .= "<header class='btn'> Friday Afternoon Activities 1:00-5:00pm </header>"; 
if(isset($Hike1)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $Hike1 . "</li>" ;   
}elseif(!isset($Hike1)){
$buildList .= "<li class='padding'><strong>  </strong> Easy Hike </li>" ;  
} 

if(isset($Hike2)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $Hike2 . "</li>" ;   
}elseif(!isset($Hike2)){
$buildList .= "<li class='padding'><strong>  </strong> Hike - Not as Easy but still fun </li>" ;  
} 
 

if(isset($pickleball)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $pickleball . "</li>" ;   
}elseif(!isset($pickleball)){
$buildList .= "<li class='padding'><strong>  </strong> Afternoon Pickleball </li>" ;  
} 

if(isset($axe)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $axe . "</li>" ;   
}elseif(!isset($axe)){
$buildList .= "<li class='padding'><strong>  </strong> Knife & Axe Throwing </li>" ;  
}

$buildList .= "<header class='btn'> Friday Evening Activities</header>"; 
if(isset($fireside)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $fireside . " - 6:30pm</li>" ;   
}elseif(!isset($fireside)){
$buildList .= "<li class='padding'><strong>  </strong> Fireside - 6:30pm </li>" ;  
}

if(isset($meet)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $meet . " - 7:30pm</li>" ;   
}elseif(!isset($meet)){
$buildList .= "<li class='padding'><strong>  </strong> Meet and Greet - 7:30pm </li>" ;  
}

$buildList .= "<header class='btn'> Saturday Activities </header>"; 

if(isset($keynotes)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $keynotes . " - 9:30am-5:00pm</li>" ;   
}elseif(!isset($keynotes)){
$buildList .= "<li class='padding'><strong>  </strong> Workshops and Keynote 9:30am-5:00pm </li>" ;  
}

if(isset($square)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $square . " - 7:00-8:30pm</li>" ;   
}elseif(!isset($square)){
$buildList .= "<li class='padding'><strong>  </strong> Square Dancing with Professional Caller 7:00-8:30pm </li>" ;  
}

if(isset($afterParty)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $afterParty . " - 8:30-10:30pm</li>" ;   
}elseif(!isset($afterParty)){
$buildList .= "<li class='padding'><strong>  </strong> Dancing, Games, & Karaoke -8:30pm-10:30pm </li>" ;  
}

if(isset($cleanup)){ 
$buildList .= "<li class='padding'><strong>  &#x2713 </strong>" . $cleanup . " </li>" ;   
}elseif(!isset($cleanup)){
$buildList .= "<li class='padding'><strong>  </strong> Cleanup - Please stay a few minutes after the dance and help us clean up </li>" ;  
}
return $buildList; 
}

function build_2($confDetails_2) { 


$firstTopic = $confDetails_2[0]['firstTopic']; 
$secondTopic = $confDetails_2[0]['secondTopic']; 
$thirdTopic = $confDetails_2[0]['thirdTopic']; 

$details = array($firstTopic, $secondTopic, $thirdTopic); 

    //var_dump($confDetails2); 
    //exit; 
    $buildList2 = " "; 
    foreach($details as $details){ 
        $buildList2 .= "<li class='padding'> $details </li>";  
    }                                                
    
    return $buildList2; 
}

function build_3($confDetails_3){ 
    //var_dump($confDetails_3); 
    //exit; 
$meal1 = $confDetails_3[0]['meal1']; 
$meal2 = $confDetails_3[0]['meal2']; 
$meal3 = $confDetails_3[0]['meal3']; 
 
$details = array($meal1, $meal2, $meal3); 

$details_1 = array(); 
foreach ($details as $act){ 
        if($act != "" ||  !"NULL")
          array_push($details_1, $act); 
}

    $buildList3 = " "; 
    foreach($details_1 as $details_1){ 
        $buildList3 .= "<li class='padding'> $details_1 </li>";  
    }                                                
    
    return $buildList3;
}
//Build the List for the Extra Info Included 
 function build_4($confDetails_4){ 


$emergency = $confDetails_4[0]['emergency']; 
$emer_phone = $confDetails_4[0]['emer_phone']; 
$allergy = $confDetails_4[0]['allergy']; 
$volunteer = $confDetails_4[0]['volunteer']; 
$payment = $confDetails_4[0]['payment']; 
 

$buildList4 = "<header class='btn'> Emergency Contact </header>"; 
if(isset($emergency)){ 
$buildList4 .= "<li class='padding'><strong>  Emergency Contact: </strong>" . $emergency . " </li>" ;   
}elseif(!isset($emergency)){
$buildList4 .= "<li class='padding'><strong>  Emergency Contact:  </strong> </li>" ;  
}

if(isset($emer_phone)){ 
$buildList4 .= "<li class='padding'><strong>  Emergency Contact Phone #: </strong>" . $emer_phone . " </li>" ;   
}elseif(!isset($emer_phone)){
$buildList4 .= "<li class='padding'><strong>  Emergency Contact Phone # :  </strong> </li>" ;  
}

$buildList4 .= "<header class='btn'> Food Allergies </header>"; 
if(isset($allergy)){ 
$buildList4 .= "<li class='padding'><strong> Any Food Allergies: </strong>" . $allergy . " </li>" ;   
}elseif(!isset($allergy)){
$buildList4 .= "<li class='padding'><strong>  Any Food Allergies:  </strong> </li>" ;  
}

$buildList4 .= "<header class='btn'> Volunteer </header>"; 
if(isset($volunteer)){ 
$buildList4 .= "<li class='padding'><strong>Volunteer: </strong>" . $volunteer . " </li>" ;   
}  

$buildList4 .= "<header class='btn'> Payment Method </header>"; 
if(isset($payment)){ 
$buildList4 .= "<li class='padding'><strong> Payment Method: </strong>" . $payment . " </li>" ;   
}

  
   return $buildList4;
}
 

 function knoxConf($getRegData){ 
  $allergies = $getRegData[0]['allergies']; 
  $hike = $getRegData[0]['hike']; 
  $bonfire = $getRegData[0]['bonfire'];
  $saturdaySocial = $getRegData[0]['saturdaySocial'];
  $sacrament = $getRegData[0]['sacrament'];
  $keynotes = $getRegData[0]['keynotes'];    
 

$buildknox = "<li class='padding'><strong> Planning to attend the Friday morning hike?  </strong>" . $hike . " </li>" ;
$buildknox .= "<li class='padding'><strong> Planning to attend the Friday evening bonfire and social?  </strong>" . $bonfire . " </li>" ;
$buildknox .= "<li class='padding'><strong> Planning to attend the Keynote Speakers and Workshops? </strong>" . $keynotes . " </li>" ;
$buildknox .= "<li class='padding'><strong> Planning to attend the Saturday evening social? </strong>" . $saturdaySocial . " </li>" ;
$buildknox .= "<li class='padding'><strong> Planning to attend sacrament Sunday morning? </strong>" . $sacrament . " </li>" ;
$buildknox .= "<li class='padding'><strong> Any food allergies or restrictions? </strong>" . $allergies . " </li>" ;      

return $buildknox; 
 }

 function rLifeConf($getRegData){ 
  //var_dump($getRegData); 
  //exit; 
  $status = $getRegData[0]['status']; 
  $firstName2 = $getRegData[0]['firstName2']; 
  $lastName2 =  $getRegData[0]['lastName2']; 
  $allergies = $getRegData[0]['allergies'];
  $social = $getRegData[0]['social'];
  $ideas = $getRegData[0]['comment']; 
  $task1 = $getRegData[0]['task1'];
  $task2 = $getRegData[0]['task2'];
  $task3 = $getRegData[0]['task3'];
  $task4 = $getRegData[0]['task4']; 
  $diet1= $getRegData[0]['diet1'];   
  $diet2= $getRegData[0]['diet2']; 
  $payment= $getRegData[0]['payment'];

$taskArray = array($task1, $task2, $task3, $task4); 
$dietArray = array($diet1, $diet2); 

$buildRLife = "<li class='padding'><strong>Relationship status:  </strong><br>" . $status . " </li>" ;
$buildRLife .= "<li class='padding'><strong> Person you're attending with: </strong><br>" . $firstName2 . " " . $lastName2 . "</li>" ;
$buildRLife .= "<li class='padding'><strong> Attending the social at Stan & Michelle Lockhart's home Friday evening: </strong><br>" . $social . " </li>" ;
$buildRLife .= "<li class='padding'><strong> Suggestions you may have for class ideas: </strong><br>" . $ideas . " </li>" ;
$buildRLife .= "<li class='padding'><strong> Tasks You're offering to help with: </strong><br>"; 
foreach($taskArray as $task){ 
    if($task){ 
   $buildRLife .= $task . "<br>";      
    }
}
$buildRLife .=  "</li>" ; 
$buildRLife .= "<li class='padding'><strong> Food allergies or restrictions: </strong><br>" . $allergies . " </li>" ;      
$buildRLife .= "<li class='padding'><strong> Any dietary needs:  </strong><br>" ; 
foreach($dietArray as $diet){ 
    if($diet){ 
   $buildRLife .= $diet . "<br>";      
    }
}
$buildRLife .= " </li>" ; 
$buildRLife .= "<li class='padding'><strong> Method of Payment: </strong><br>" . $payment . " </li>" ; 
return $buildRLife; 
 }
 

 function IdahoConf($getRegDataId){ 
     
 //var_dump($getRegData); 
 // exit; 
$act_1 =    $getRegDataId[0]['act_1']; 
$act_2 =    $getRegDataId[0]['act_2']; 
$act_3 =    $getRegDataId[0]['act_3']; 
$act_4 =    $getRegDataId[0]['act_4']; 
$act_5 =    $getRegDataId[0]['act_5']; 
$meal_1 =   $getRegDataId[0]['meal_1'];
$meal_2 =   $getRegDataId[0]['meal_2'];
$meal_3 =   $getRegDataId[0]['meal_3']; 
$workshop_1 =   $getRegDataId[0]['workshop_1'];
$workshop_2 =   $getRegDataId[0]['workshop_2'];
$workshop_3 =   $getRegDataId[0]['workshop_3'];
$workshop_4 =   $getRegDataId[0]['workshop_4']; 
$workshop_5=    $getRegDataId[0]['workshop_5'];   
$keynote_1 =    $getRegDataId[0]['keynote_1'];
$keynote_2 =    $getRegDataId[0]['keynote_2'];
$lodging =  $getRegDataId[0]['lodging'];
$church =   $getRegDataId[0]['church'];


 
$actArray = array($act_1, $act_2, $act_3, $act_4); 
$mealArray = array($meal_1, $meal_2, $meal_3);
$workshopArray = array( $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5); 
$keynoteArray = array($keynote_1, $keynote_2);
$otherArray = array($lodging, $church, $choir);

$buildIdLife = '<header class="question">Activities  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Attending which temple Thursday evening?   </strong><br>" . $act_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Joining for ice cream at Lovejoy's?   </strong><br>" . $act_2 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Choice for the Friday Morning Activity?  </strong><br>" . $act_3 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Attending the Friday Evening Fireside?   </strong><br>" . $act_4 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Attending the Saturday Evening Dance and closing Social?   </strong><br>" . $act_5 . " </li>" ;
$buildIdLife .= '<header class="question"> Meals  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Friday Lunch?   </strong><br>" . $meal_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Saturday Lunch?   </strong><br>" . $meal_2 . " </li>" ;
$buildIdLife .= '<header class="question"> Saturday Keynotes and Workshops </header> <br>';
 $i = 1; 
 $j = 1; 
 foreach ($workshopArray as $workshop){ 
     $buildIdLife .= "<li class='padding'><strong>Workshop " . $i . "?  </strong><br>" . $workshop . " </li>" ;
       $i++;
 }

     $buildIdLife .= "<li class='padding'><strong>Saturday Morning Keynote?  </strong><br>" . $keynote_1 . " </li>" ;
     $buildIdLife .= "<li class='padding'><strong>Saturday Closing Keynote?  </strong><br>" . $keynote_2 . " </li>" ;
     $buildIdLife .= '<header class="question">Other stuff... </header><br> ';
     $buildIdLife .= "<li class='padding'><strong>Lodging Arrangements?  </strong><br>" . $lodging . " </li>" ;
     $buildIdLife .= "<li class='padding'><strong> Attending church on Sunday?</strong><br>" . $church . " </li>" ;


return $buildIdLife; 
 }
 
function SAConf($getRegDataSA){ 
     //echo "This is the San Antonio Conference case;";
     //exit; 
 //var_dump($getRegData); 
 //exit; 
$act_1 =    $getRegDataSA[0]['act_1'];  
$act_2 =    $getRegDataSA[0]['act_2']; 
$act_3 =    $getRegDataSA[0]['act_3']; 
$act_4 =    $getRegDataSA[0]['act_4']; 
$act_5 =    $getRegDataSA[0]['act_5']; 
$act_6 =    $getRegDataSA[0]['act_6'];
$act_7 =    $getRegDataSA[0]['act_7'];
$act_8 =    $getRegDataSA[0]['act_8'];
$meal_1 =   $getRegDataSA[0]['meal_1'];
$meal_2 =   $getRegDataSA[0]['meal_2'];
$meal_3 =   $getRegDataSA[0]['meal_3']; 
$meal_4 =   $getRegDataSA[0]['meal_4'];
$workshop_1 =   $getRegDataSA[0]['workshop_1'];
$workshop_2 =   $getRegDataSA[0]['workshop_2'];
$workshop_3 =   $getRegDataSA[0]['workshop_3'];
$workshop_4 =   $getRegDataSA[0]['workshop_4']; 
$workshop_5=    $getRegDataSA[0]['workshop_5']; 
$workshop_6=    $getRegDataSA[0]['workshop_6'];  
$keynote_1 =    $getRegDataSA[0]['keynote_1'];
$keynote_2 =    $getRegDataSA[0]['keynote_2'];
$church =   $getRegDataSA[0]['church'];
$emergencyName = $getRegDataSA[0]['emergencyName'];
$emergencyPhone = $getRegDataSA[0]['emergencyPhone'];
$foodNeeds = $getRegDataSA[0]['foodNeeds'];

$format = formatPhoneNumber($emergencyPhone);
$emergencyPhone = $format;

 
//$actArray = array($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8); 
$mealArray = array($meal_1, $meal_2, $meal_3, $meal_4);
$workshopArray = array( $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6); 
$keynoteArray = array($keynote_1, $keynote_2);
$otherArray = array($church);

$buildIdLife = '<header class="question">Activities  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Which Friday Morning Activity are you interested in?   </strong><br>" . $act_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Choice for the Friday Afternoon Activity @ 2:00pm?  </strong><br>" . $act_2 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Choice for the Friday Afternoon Activity @ 3:00pm?  </strong><br>" . $act_3 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Choice for the Friday Afternoon Activity @ 4:00pm?  </strong><br>" . $act_4. " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Attending Fast Friendshipping Social Friday evening?   </strong><br>" . $act_5 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Attending Texas Under the Stars Social Saturday evening?   </strong><br>" . $act_6 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Able to bring a guitar and play around the campfire?   </strong><br>" . $act_7 . " </li>" ;
$buildIdLife .= '<header class="question"> Meals  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Saturday Lunch?   </strong><br>" . $meal_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Saturday Dinner?   </strong><br>" . $meal_2 . " </li>" ;
$buildIdLife .= '<header class="question">Other Info:  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Name   </strong><br>" . $emergencyName . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Phone Number  </strong><br>" . $emergencyPhone . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Any Special Food Needs?  </strong><br>" . $foodNeeds . " </li>" ;
$buildIdLife .= '<header class="question"> Saturday Keynotes and Workshops </header> <br>';
 $i = 1; 
 $j = 1; 
 foreach ($workshopArray as $workshop){ 
     $buildIdLife .= "<li class='padding'><strong>Workshop " . $i . "?  </strong><br>" . $workshop . " </li>" ;
       $i++;
 }

     $buildIdLife .= "<li class='padding'><strong>Friday Evening Fireside?  </strong><br>" . $keynote_1 . " </li>" ;
     $buildIdLife .= "<li class='padding'><strong>Saturday Closing Keynote?  </strong><br>" . $keynote_2 . " </li>" ;
     $buildIdLife .= "<li class='padding'><strong> Attending our special Testimony meeting?</strong><br>" . $church . " </li>" ;


return $buildIdLife; 

}


function AZConf($getRegData){ 
   //echo "This is the Arizona build function;";
   // exit; 
//var_dump($getRegData); 
 //exit; 
$act_1 =    $getRegData[0]['act_1'];  
$act_2 =    $getRegData[0]['act_2']; 
//$act_3 =    $getRegData[0]['act_3'];
//$act_4 =    $getRegData[0]['act_4'];
$act_5 =    $getRegData[0]['act_5'];
$keynote_1 =    $getRegData[0]['keynote_1'];
$meal_1 =   $getRegData[0]['meal_1'];   
$emergencyName = $getRegData[0]['emergencyName'];
$emergencyPhone = $getRegData[0]['emergencyPhone'];

$format = formatPhoneNumber($emergencyPhone);
$emergencyPhone = $format;


 
//$actArray = array($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8); 
$mealArray = array($meal_1, $meal_2, $meal_3, $meal_4);
$workshopArray = array( $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6); 
$keynoteArray = array($keynote_1, $keynote_2);
$otherArray = array($church);

$buildIdLife = '<header class="question">Activities  </header> <br>';
$buildIdLife .= "<li class='padding'><strong> Wind Caves Hike? </strong><br>" . $act_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong> Riparian Preserve Walk? </strong><br>" . $act_2 . " </li>" ;
//$buildIdLife .= "<li class='padding'><strong>  Pickleball? </strong><br>" . $act_3 . " </li>" ;
//$buildIdLife .= "<li class='padding'><strong>  Nine Square in the Air? </strong><br>" . $act_4 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong> Temple Session? </strong><br>" . $act_5 . " </li>" ;
$buildIdLife .= '<header class="question"> Keynotes and Workshops </header> <br>';
$buildIdLife .= "<li class='padding'><strong> Will you be attending the keynotes and workshops on Saturday? </strong><br>" . $keynote_1. " </li>" ;
$buildIdLife .= '<header class="question"> Meals  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Are you attending the BBQ dinner and dessert on Friday?   </strong><br>" . $meal_1 . " </li>" ;
$buildIdLife .= '<header class="question">Other Info:  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Name   </strong><br>" . $emergencyName . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Phone Number  </strong><br>" . $emergencyPhone . " </li>" ;



return $buildIdLife; 

}

function AZGuestConf($getRegData){ 
 
$act_1 =    $getRegData[0]['act_1'];  
$act_2 =    $getRegData[0]['act_2']; 
//$act_3 =    $getRegData[0]['act_3'];
//$act_4 =    $getRegData[0]['act_4'];
$act_5 =    $getRegData[0]['act_5'];
$keynote_1 =    $getRegData[0]['keynote_1'];
$meal_1 =   $getRegData[0]['meal_1'];   
$emergencyName = $getRegData[0]['emergencyName'];
$emergencyPhone = $getRegData[0]['emergencyPhone'];

$format = formatPhoneNumber($emergencyPhone);
$emergencyPhone = $format;


 
//$actArray = array($act_1, $act_2, $act_3, $act_4, $act_5, $act_6, $act_7, $act_8); 
$mealArray = array($meal_1, $meal_2, $meal_3, $meal_4);
$workshopArray = array( $workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6); 
$keynoteArray = array($keynote_1, $keynote_2);
$otherArray = array($church);

$buildIdLife = '<header class="question">Activities  </header> <br>';
$buildIdLife .= "<li class='padding'><strong> Wind Caves Hike? </strong><br>" . $act_1 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong> Riparian Preserve Walk? </strong><br>" . $act_2 . " </li>" ;
//$buildIdLife .= "<li class='padding'><strong>  Pickleball? </strong><br>" . $act_3 . " </li>" ;
//$buildIdLife .= "<li class='padding'><strong>  Nine Square in the Air? </strong><br>" . $act_4 . " </li>" ;
$buildIdLife .= "<li class='padding'><strong> Temple Session? </strong><br>" . $act_5 . " </li>" ;
$buildIdLife .= '<header class="question"> Keynotes and Workshops </header> <br>';
$buildIdLife .= "<li class='padding'><strong> Will you be attending the keynotes and workshops on Saturday? </strong><br>" . $keynote_1. " </li>" ;
$buildIdLife .= '<header class="question"> Meals  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Are you attending the BBQ dinner and dessert on Friday?   </strong><br>" . $meal_1 . " </li>" ;
$buildIdLife .= '<header class="question">Other Info:  </header> <br>';
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Name   </strong><br>" . $emergencyName . " </li>" ;
$buildIdLife .= "<li class='padding'><strong>Emergency Contact Phone Number  </strong><br>" . $emergencyPhone . " </li>" ;

return $buildIdLife; 

}

function IdahoWalkinConf($getRegData){ 
//var_dump($getRegData); 
$num = 1; 
$deleteMsg =  $_SESSION['delete'];
                               
$buildIdLife = '<h5 class="heading1">Idaho Walkin Registrations </h5> <br>';
if($deleteMsg){ 
$buildIdLife .= $deleteMsg . '<br>'; 
}

        if(!$getRegData){ 
          $buildIdLife .= "<button class='btn btn--small btn--beige btn--beige:hover' style='width: 50%;' ><a href='/users/index.php/?action=walkin'>Walkin Registration</a></button> <br> <br>"; 

        }else{ 
$buildIdLife .= "<button class='btn btn--small btn--beige btn--beige:hover' style='width: 50%;' ><a href='/users/index.php/?action=walkin'>Add Another Walkin Registration</a></button> <br> <br>"; 
}
$buildIdLife .= '<table style="width:100%;">'; 
$buildIdLife .= '<thead class="caption">'; 
$buildIdLife .= '<tr><td style="width:10%;"><strong>Count</strong></td><td style="width:30%;"><strong>First Name</strong></td> <td style="width:30%;"><strong>Last Name</strong></td> </tr>'; 
  $buildIdLife .= '</thead>';
    $buildIdLife .= '<tbody>';
 foreach($getRegData as $regData){
$buildIdLife .= "<tr style='border-bottom:1px solid black;'><td>$num</td><td>$regData[firstName]</td><td>$regData[lastName]</td><td><button class='btn btn--small btn--dark-orange btn--dark-orange:hover' style='width: 50%;'><a href='/users/index.php/?action=deleteWalkinId&walkin_id=$regData[walkin_id]'>Delete</a></button> </tr>" ; 
 $num++; 
 
 } 
 $buildIdLife .= '<tbody>';
 $buildIdLife .= '</table>';   
return $buildIdLife; 

}





function listConf($getRegData){ 
    //var_dump($getRegData); 
   
$conf_Id1 = $getRegData[1]['conf_Id'];
 
$details = array($meal1, $meal2, $meal3); 

$details_1 = array(); 
foreach ($details as $act){ 
        if($act != "" ||  !"NULL")
          array_push($details_1, $act); 
}

    $buildList3 = " "; 
    foreach($details_1 as $details_1){ 
        $buildList3 .= "<li class='padding'> $details_1 </li>";  
    }                                                
    
    return $buildList3;
}



