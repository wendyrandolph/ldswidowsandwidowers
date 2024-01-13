<?php
/*
 * Template Name: regUpdate1
 Template Post Type: account
 */

/* other PHP code here */
session_start();


$_SESSION['conf1'];

$_SESSION['conf3'];

$_SESSION['confId'];
$_SESSION['confId3']; 
$_SESSION['confId4']; 
$_SESSION['idahoUP']; 
$_SESSION['remUP']; 
$_SESSION['SaUP'];
$_SESSION['AzUp']; 

//$confId =  $_SESSION['confId'];
$confId3 =  $_SESSION['confId3'];
$confId4 = $_SESSION['confId4']; 
 
$conf4 = $_SESSION['conf4']; 
$conf1 = $_SESSION['conf1'];
// echo $conf1; 

//$_SESSION['knoxUP'];
$_SESSION['remarried'];
$_SESSION['idaho']; 
$userId = $_SESSION['userId'];
$clientData =  $_SESSION['clientData'];

$_SESSION['getRegData'];
$getRegData = $_SESSION['getRegData'][0];
$rlData = $getRegData;
//var_dump($rlData); exit; 
//unset($rlData['userPW']);
//exit; 

$remarried_id = $rlData['remarried_id'];
$status = $rlData['status'];
$firstName2 = $rlData['firstName2'];
$lastName2 = $rlData['lastName2'];
$comment = $rlData['comment'];
$social = $rlData['social'];
$task1 = $rlData['task1'];
$task2 = $rlData['task2'];
$task3 = $rlData['task3'];
$task4 = $rlData['task4'];
$payment = $rlData['payment'];
$allergies = $rlData['allergies'];
$diet1 = $rlData['diet1'];
$diet2 = $rlData['diet2'];

//var_dump($_SESSION['buildRLUpdate']); 
//exit; 

get_header();
?>
<div class="page-banner">
    <?php pageBanner(array(
        'title' => " Update your Registration "
    )); ?>
</div>
<div class="container container--narrow page-section">
    <h5 class="heading1"> Update your registration details </h5>


    <!-- div  is for styling purposes only -->

    <br>

   
            <?php

            if ($_SESSION['remUP'] == "TRUE") { ?>
 <form id="regUpdate" action="/users/index.php" method="post">
        <fieldset>
                <header class="question"> Relationship Info </header> <br>
                <label for="status"> Relationship status? </label> <br>
                <select name="status" id="status" class="input" required>
                    <option value="<?php if (isset($status)) echo $status; ?>" selected><?php echo $status ?></option>
                    <option value="Remarried"> Remarried </option>
                    <option value="Engaged">Engaged</option>
                    <option value="Seriously Dating">Seriously Dating</option>

                </select> <br><br>
                <label>If you're attending with a partner, list their first name and last name
                    <input class="input" type="text" name="attendee2FN" placeholder="Attendee 2's first name" value="<?php if (isset($firstName2)) echo $firstName2; ?>">
                    <input class="input" type="text" name="attendee2LN" placeholder="Attendee 2's last name" value="<?php if (isset($lastName2)) echo $lastName2; ?>"><br> <br>

                </label><br>

                <header class="question"> Class topics </header> <br>
                <label for="comment">Please list any suggestions you may have for class ideas? </label><br>
                <textarea style="padding-left: 10px:" rows="10" cols="30" id="comment" name="comment"><?php if (isset($comment)) echo $comment; ?></textarea><br><br>

                <header class="question"> Friday evening social.. </header> <br>

                <label> Do you plan on attending the social at Stan & Michelle Lockhart's home Friday evening?</label> <br>


                <input type="radio" name="social" value="Yes" required <?php echo ($social == "Yes" ? 'checked="checked"' : ''); ?>>
                <label> Yes </label><br>


                <input type="radio" name="social" value="No" <?php echo ($social == "No" ? 'checked="checked"' : ''); ?>>
                <label> No</label> <br>

                <br><br>

                <header class="question"> Help is needed... </header> <br>

                <label> We need help with some of our tasks, what can you help with?</label> <br>
                <input type="checkbox" id="task1" name="task1" value="Set Up" <?php if (isset($task1)) {
                                                                                    echo "value = 'Set Up' checked='checked'";
                                                                                } elseif (!isset($task1)) {
                                                                                    echo "value='' . Set Up" . ' "';
                                                                                } ?>>
                <label for="task1">Set Up</label><br>
                <input type="checkbox" id="task2" name="task2" value="Clean Up" <?php if (isset($task2)) {
                                                                                    echo "value = 'Clean Up' checked='checked'";
                                                                                } elseif (!isset($task2)) {
                                                                                    echo "value='' . Clean Up" . ' "';
                                                                                } ?>>
                <label for="task2">Clean Up</label><br>
                <input type="checkbox" id="task3" name="task3" value="Table Decorations" <?php if (isset($task3)) {
                                                                                                echo "value = 'Table Decorations' checked='checked'";
                                                                                            } elseif (!isset($task3)) {
                                                                                                echo "value='' . Table Decorations" . ' "';
                                                                                            } ?>>
                <label for="task3">Table Decorations</label><br>
                <input type="checkbox" id="task4" name="task4" value="Other general tasks" <?php echo ($task4 == "Other general tasks" ? 'checked="checked"' : ''); ?>>
                <label for="task4">Other general tasks</label><br><br>

                <header class="question">Dietary Needs</header><br>
                <label for="allergies">Food allergies - either of you have any, please inform us here. </label><br>
                <input class="input" type="text" id="allergies" name="allergies" value="<?php if (isset($allergies)) echo $allergies; ?>"><br> <br>

                <label for="diet1">Dietary needs - either of you have any needs, please inform us here. </label><br>
                <input type="checkbox" id="diet1" name="diet1" value="Gluten Free" <?php if (isset($diet1)) {
                                                                                        echo "value = 'Gluten Free' checked='checked'";
                                                                                    } elseif (!isset($diet1)) {
                                                                                        echo "value='' . Gluten Free" . ' "';
                                                                                    } ?>>
                <label class="align" for="diet1">Gluten Free</label><br>
                <input type="checkbox" id="diet2" name="diet2" value="Vegetarian" <?php if (isset($diet2)) {
                                                                                        echo "value = 'Vegetarian' checked='checked'";
                                                                                    } elseif (!isset($diet2)) {
                                                                                        echo "value='' . Vegetarian" . ' "';
                                                                                    } ?>>
                <label class="align" for="diet2">Vegetarian</label><br><br>


                <header class="question"> Suggested Donation </header> <br>
                <p style="padding-left: 20px;">
                    The suggested donation for the conference is $25/couple. Please pay your donation as soon as possible. </p>

                <p style="padding-left: 20px;">**If you click on the link to pay with Venmo, a new tab will open to Venmo, after you make the payment, switch back here to complete the registration. And if you're having someone else Venmo for you, please have them make a note of who it is for.**</p>

                <header class="question"> How will you be sending your suggested donation? </header><br>
                <p style="padding-left: 20px;"> ***Please note that one option needs to be selected, thank you.*** </p>
                <p style="padding-left: 20px;"> **If paying with Venmo, please don't check the box that takes a portion of the money.
                    We will send you a full refund if you cancel your registration before we give our final meal numbers to the caterers.**</p><br>

                <label> <input type="radio" name="payment" value="Pay Using Venmo" <?php echo ($payment == "Pay Using Venmo" ? 'checked="checked"' : ''); ?>>
                    Venmo (Preferred) <a style="background-color: #0D3B66 !important; color: white; padding: 3px;  " href="https://account.venmo.com/u/JoellaGrayGifford" target="_blank">https://account.venmo.com/u/JoellaGrayGifford</a> </label><br>



                <label> <input type="radio" name="payment" value="Bring Cash" <?php echo ($payment == "Bring Cash" ? 'checked="checked"' : ''); ?>>
                    I'll bring cash to the conference. </label> <br>


                <br><br>

                <input type="submit" value="Submit" id="submit"><br><br>
                <input type="hidden" name="action" value="remUpdate2">
                <input type="hidden" name="confId" <?php if (isset($confId)) {
                                                        echo "value = '$confId'";
                                                    } elseif (isset($_SESSION['confId'])) {
                                                        echo 'value="' . $_SESSION['confId'] . '"';
                                                    } ?>>
                <input type="hidden" name="conf1" <?php if (isset($conf1)) {
                                                        echo "value = '$conf1'";
                                                    } elseif (isset($_SESSION['conf1'])) {
                                                        echo 'value="' . $_SESSION['conf1'] . '"';
                                                    } ?> />
                <input type="hidden" name="user_id" class="input" id="user_id" <?php if (isset($userId)) {
                                                                                    echo "value = '$userId'";
                                                                                } ?>>
                <input type="hidden" name="remarried_id" class="input" id="remarried_id" <?php if (isset($remarried_id)) {
                                                                                                echo "value = '$remarried_id'";
                                                                                            } ?> />
                <br>



            <?php  } ?>

    <?php 
     //*************************************************************************************************************************************
     //**************************************************Begin the Idaho Conference Form****************************************************
     //_____________________________________________________________________________________________________________________________________ 
    if ($_SESSION['idahoUP'] == "TRUE") { 
        $_SESSION['getRegDataId'];
$getRegDataID = $_SESSION['getRegDataId'][0];
$IdahoData = $getRegDataID;
 
$idaho_id = $IdahoData['idaho_id'];
$act_1 = $IdahoData['act_1'];
$act_2 = $IdahoData['act_2'];
$act_3 = $IdahoData['act_3'];
$act_4 = $IdahoData['act_4'];
$act_5 = $IdahoData['act_5'];
$meal_1 = $IdahoData['meal_1'];
$meal_2 = $IdahoData['meal_2'];
$meal_3 = $IdahoData['meal_3'];
$workshop_1 = $IdahoData['workshop_1'];
$workshop_2 = $IdahoData['workshop_2'];
$workshop_3 = $IdahoData['workshop_3'];
$workshop_4 = $IdahoData['workshop_4'];
$workshop_5 = $IdahoData['workshop_5'];
$keynote_1 = $IdahoData['keynote_1'];
$keynote_2 = $IdahoData['keynote_2'];
$lodging = $IdahoData['lodging'];
$church =  $IdahoData['church'];
//echo $_SESSION['part3']; 
// exit; 
?>
        <br>
        <header class="question">Activities </header> <br>
        Thursday evening you have the opportunity to attend a session at either the Meridian or Boise, Idaho Temple.
        <label for="act_1"><strong>Which temple will you be attending Thursday evening?</strong></label><br>
        <select name="act_1" id="act_1" class="input" required>
            <option value="<?php if (isset($act_1)) echo $act_1; ?>"><?php echo $act_1 ?></option>
            <option value="Boise">Boise</option>
            <option value="Meridian">Meridian</option>
            <option value="Not Attending, thank you.">Not Attending, thank you.</option>
        </select><br><br>

        <label><strong>After the temple, we'll meet at Lovejoy's for ice cream and visiting. Will you be joining us?</strong> <br>
            <span class="workshop"><input type="radio" name="act_2" value="Yes" required <?php echo ($act_2 == "Yes" ? 'checked="checked"' : ''); ?> >Yes</span>
            <span class="workshop"><input type="radio" name="act_2" value="No" <?php echo ($act_2 == "No" ? 'checked="checked"' : ''); ?>>No</span> </label> <br><br>
               

        There will be three activiites to choose from on Friday morning:
        <ul style="list-style: none">
           <li><strong> Pickleball </strong> - <a href="https://goo.gl/maps/K6To9MwQBQSW9Nh26" target="__blank">936 Taylor Ave, Meridian, Idaho 83642</a>  </li>
<li><strong> Walk/Hike </strong> - <a href="https://goo.gl/maps/ywj5C5xUYTiaU9d99" target="__blank">1900 N Records Way, Meridian, ID 83642 </a> - Meeting at the playground area across the road from the North park lot.  </li>
<li><strong> Service Project </strong>  </li>

        </ul> 
            <label for="act_3"><strong> Which Friday Morning Activity? </strong> </label> <br>

            <select name="act_3" id="act_3" class="input" required>
                <option value="<?php if (isset($act_3)) echo $act_3; ?>"><?php echo $act_3 ?></option>
                <option value="Pickleball">Pickleball</option>
                <option value="Walk/Hike">Walk/Hike</option>
                <option value="Service Project">Service Project</option>
                <option value="Not Attending, thank you.">Not Attending, thank you.</option>
            </select><br><br>

            <label><strong>Friday Evening fireside 7:00pm?</strong> <br>
                <span class="workshop"><input type="radio" name="act_4" value="Yes" required <?php echo ($act_4 == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" name="act_4" value="No" <?php echo ($act_4 == "No" ? 'checked="checked"' : ''); ?>>No</span> </label> <br><br>

            <label><strong>Saturday Evening dance and social 7:30pm - 10:30pm?</strong> <br>
                <span class="workshop"><input type="radio" name="act_5" value="Yes" required <?php echo ($act_5 == "Yes" ? 'checked="checked"' : ''); ?> >Yes</span>
                <span class="workshop"><input type="radio" name="act_5" value="No" <?php echo ($act_5 == "No" ? 'checked="checked"' : ''); ?> >No</span> </label> <br><br>

            <header class="question"> Meals </header> <br>
            <label for="meal1"> Friday Lunch @ 12:30 <br> 
                <strong>Description: </strong> Hamburgers, chips, watermelon, and condiments</label> <br><br>
            <select name="meal1" id="meal1" class="input" required>
                <option value="<?php if (isset($meal_1)) echo $meal_1; ?>"><?php echo $meal_1 ?></option>
                <option value="Yes, thank you.">Yes, thank you.</option>
                <option value="No, thank you.">No, thank you.</option>
                <option value="Bringing my own food.">Bringing my own food.</option>
                <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
            </select>
            <br> <br> 
            <label for="meal2"> Saturday Lunch @ 12:30 <br>
                <strong>Description: </strong>  Pulled pork, Smoked turkey, BB sauce, BB beans, potato salad, rolls & cookie</label> <br><br> 
            <select name="meal2" id="meal2" class="input" required>
                <option value="<?php if (isset($meal_2)) echo $meal_2; ?>"><?php echo $meal_2 ?></option>
                <option value="Yes, thank you.">Yes, thank you.</option>
                <option value="No, thank you.">No, thank you.</option>
                <option value="Bringing my own food.">Bringing my own food.</option>
                <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
            </select><br> <br> 
       

            <header class="question">Saturday Keynotes & Workshops </header> <br>
            <p> Which sessions will you be attending?<br>
                ** Please Note that each workshop session will have 5 classes to choose from.** </p>

            <label><strong> Saturday Morning Keynote </strong> 9:30 AM <br>
                <span class="workshop"><input type="radio" name="keynote_1" value="Yes" required <?php echo ($keynote_1 == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" name="keynote_1" value="No" <?php echo ($keynote_1 == "No" ? 'checked="checked"' : ''); ?> >No </span> </label> <br><br>

            <label><strong> Workshop 1 </strong>- 10:30am - 11:20am <br>
                <span class="workshop"><input type="radio" name="workshop_1" value="Yes" required <?php echo ($workshop_1 == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" name="workshop_1" value="No" <?php echo ($workshop_1 == "No" ? 'checked="checked"' : ''); ?>>No</span> </label> <br><br>

            <label><strong> Workshop 2 </strong>- 11:30am - 12:20pm <br>
                <span class="workshop"><input type="radio" class="workshop" name="workshop_2" value="Yes" required <?php echo ($workshop_2 == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" class="workshop" name="workshop_2" value="No" <?php echo ($workshop_2 == "No" ? 'checked="checked"' : ''); ?> >No </span> </label> <br><br>

            <label><strong> Workshop 3</strong>- 1:30pm - 2:20pm</strong><br>
                <span class="workshop"><input type="radio" name="workshop_3" value="Yes" required <?php echo ($workshop_3 == "Yes" ? 'checked="checked"' : ''); ?> > Yes</span>
                <span class="workshop"><input type="radio" name="workshop_3" value="No" <?php echo ($workshop_3 == "No" ? 'checked="checked"' : ''); ?>>No </span> </label> <br><br>

            <label> <strong> Workshop 4 </strong>- 2:30pm - 3:20pm <br>
                <span class="workshop"><input type="radio" name="workshop_4" value="Yes" required <?php echo ($workshop_4 == "Yes" ? 'checked="checked"' : ''); ?> >Yes</span>
                <span class="workshop"><input type="radio" name="workshop_4" value="No" <?php echo ($workshop_4 == "No" ? 'checked="checked"' : ''); ?>>No </span> </label> <br><br>

            <label><strong> Workshop 5 </strong>- 3:30pm - 4:20pm <br>
                <span class="workshop"><input type="radio" name="workshop_5" value="Yes" required <?php echo ($workshop_5 == "Yes" ? 'checked="checked"' : ''); ?> >Yes</span>
                <span class="workshop"><input type="radio" name="workshop_5" value="No" <?php echo ($workshop_5 == "No" ? 'checked="checked"' : ''); ?>>No </span> </label> <br><br>

            <label> <strong>Saturday Closing Keynote </strong>- 4:30pm - 5:30pm <br>
                <span class="workshop"><input type="radio" name="keynote_2" value="Yes" required <?php echo ($keynote_2 == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" name="keynote_2" value="No" <?php echo ($keynote_2 == "No" ? 'checked="checked"' : ''); ?>>No </span> </label> <br><br>


            <header class="question">Other stuff... </header><br>
            <label for="lodging"><strong>Where will you be staying? </strong></label> <br>
            <select name="lodging" id="lodging" class="input" required>
                <option value="<?php if (isset($lodging)) echo $lodging; ?>"><?php echo $lodging ?></option>
                <option value="Your Own home">Your Own Home</option>
                <option value="With Family">With Family</option>
                <option value="With Friends">With Family</option>
                <option value="Hotel">Hotel</option>
                <option value="AirBnB">AirBnB</option>
                <option value="RV Park">RV Park</option>
                <option value="Not Sure">Not Sure</option>
            </select><br><br>
            <p> ** If you need a list of local hotels, please notify: (ENTER SOMEONE'S EMAIL? )</p><br>

            <label> <strong>Will you be attending church Sunday? </strong><br>
                <span class="workshop"><input type="radio" name="church" value="Yes" required <?php echo ($church == "Yes" ? 'checked="checked"' : ''); ?>>Yes</span>
                <span class="workshop"><input type="radio" name="church" value="No" <?php echo ($church == "No" ? 'checked="checked"' : ''); ?>>No </span> </label> <br><br>

            <input type="submit" value="Next" id="submit"><br><br>
            <input type="hidden" name="action" value="iUpdate2">
            <input type="hidden" name="confId" <?php if (isset($confId)) {
                                                    echo "value = '$confId'";
                                                } elseif (isset($_SESSION['confId'])) {
                                                    echo 'value="' . $_SESSION['confId'] . '"';
                                                } ?> />
            <input type="hidden" name="conf1" <?php if (isset($conf1)) {
                                                    echo "value = '$conf1'";
                                                } elseif (isset($_SESSION['conf1'])) {
                                                    echo 'value="' . $_SESSION['conf1'] . '"';
                                                } ?> />
            <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                echo "value = '$userId'";
                                                                            } elseif (isset($_SESSION['userId'])) {
                                                                                echo 'value="' . $_SESSION['userId'] . '"';
                                                                            } ?> />
            <br>
        <?php }  
        if ($_SESSION['SaUP'] == "TRUE") { 
//*******************************************************************************************************************           
//*********************Begin the San Antonio Conference Form ********************************************************
//*******************************************************************************************************************


//INSERT FORM HERE **************************************************************************************************
?> 
<form action="users/index.php" method="post"> 

<?php
get_template_part('template-parts/SA', 'form'); ?>


<input class="btn btn--blue"  type="submit" value="Submit" id="submit"><br><br>
<input type="hidden" name="action" value="SaUpdate_2">
<input type="hidden" name="confId" <?php if (isset($confId)) {
                                                            echo "value = '$confId'";
                                                        } elseif (isset($_SESSION['confId'])) {
                                                            echo 'value="' . $_SESSION['confId'] . '"';
                                                        } ?> />
                    <input type="hidden" name="conf1" <?php if (isset($conf1)) {
                                                            echo "value = '$conf1'";
                                                        } elseif (isset($_SESSION['conf1'])) {
                                                            echo 'value="' . $_SESSION['conf1'] . '"';
                                                        } ?> />
                    <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                        echo "value = '$userId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?> />
<br>
          
    </form>
</div>      

<?php } 
  elseif ($_SESSION['AzUp'] == "TRUE") { 
//*******************************************************************************************************************           
//*********************Begin the Arizona Update Form ****************************************************************
//*******************************************************************************************************************
//Grab the Arizona Registration Details for the user:
$_SESSION['getRegDataAZ'];
//var_dump($_SESSION['getRegDataAZ']); 
//exit; 
$act_1 = $_SESSION['getRegDataAZ'][0]['act_1'];
$act_2 = $_SESSION['getRegDataAZ'][0]['act_2'];
//$act_3 = $_SESSION['getRegDataAZ'][0]['act_3'];
//$act_4 = $_SESSION['getRegDataAZ'][0]['act_4'];
$act_5 = $_SESSION['getRegDataAZ'][0]['act_5'];
$keynote_1 = $_SESSION['getRegDataAZ'][0]['keynote_1'];
$meal_1 = $_SESSION['getRegDataAZ'][0]['meal_1'];
$confId = $_SESSION['getRegDataAZ'][0]['conf_id'];
$userId = $_SESSION['getRegDataAZ'][0]['userId'];
$emergencyName = $_SESSION['getRegDataAZ'][0]['emergencyName'];
$emergencyPhone = $_SESSION['getRegDataAZ'][0]['emergencyPhone'];

  
?>
<form action="/arizona/index.php" type="post"> 
<!--<?php  get_template_part('template-parts/AZ', 'form'); ?>-->
<br> 
<header class="question">Activities  </header> <br>
Here are a list of several possible activities for Friday, November 3rd, 2023, please indicate which ones you are planning to or interested in participating?  <br><br> 
** We have updated/changed some of the questions from when you first registered, you may need to update your response to reflect these changes. 

<li class="grid-3">
<label class="column-1 full-width" for="act_5"><strong> Temple Session on Friday - November 3rd  </strong> <br>
<select name="act_5" id="act_5" class="input" required>
        <option value=<?php if (isset($act_5)) {
                                    echo $act_5;
                                } ?>> <?php if (isset($act_5)) {
                                    echo $act_5;
                                } else { 
                                        echo "Please Select an Option";
                                } ?></option>
        <option value="Gilbert Temple - 8:00am" >Gilbert Temple @ 8:00am</option>
        <option value="Mesa Temple - 8:30am" >Mesa Temple @8:30am</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>
</li>
<hr>
<li class="grid-3"> 
<label class="column-1 full-width" for="act_1"><strong>Wind Caves Hike at Usery Mtn Regional Park</strong><br>
<select name="act_1" id="act_1" class="input" required>
        <option value=<?php if (isset($act_1)) {
                                    echo $act_1;
                                } ?>> <?php if (isset($act_1)) {
                                    echo $act_1;
                                } else { 
                                        echo "Please Select an Option";
                                }?></option>
        <option value="2:30pm - Wind Caves" >2:30pm - Wind Caves</option>
        <option value="3:00pm - Wind Caves" >3:00pm - Wind Caves</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>


<label class="column-2 full-width" for="act_2"><strong> Riparian Preserve (Nice flat walk)</strong><br>

** We have replaced the Hieroglyphic Trail with this, you may need to update your response to reflect this change. 
<select name="act_2" id="act_2" class="input" required>
        <option value=<?php if (isset($act_2)) {
                                    echo $act_2;
                                } ?>> <?php if (isset($act_2)) {
                                    echo $act_2;
                                } else { 
                                        echo "Please Select an Option";
                                }?></option>
        <option value="Riparian Preserve at 8:30am" >Riparian Preserve at 8:30am</option>
        <option value="Riparian Preserve at 11:00am" >Riparian Preserve at 11:00am</option>
        <option value="Not Attending" >Not Attending, thank you.</option>
</select>
</label>
</li><br>
<header class="question"> Meals  </header> <br>
<label for="meal_1"> Friday BBQ Dinner & dessert at Usery Mtn Regional Park starting at 3:00pm, will you be there? <br><br>
<strong>Description: </strong> Dessert is around a fire pit, please bring a camp chair.</label> <br><br>
<label class="gender t-center">Yes<input type="radio" name="meal_1" value="Yes" required <?php echo ($meal_1 == "Yes" ? 'checked="checked"' : ''); ?>></label>
<label class="gender t-center">No<input type="radio" name="meal_1" value="No" <?php echo ($meal_1 == "No" ? 'checked="checked"' : ''); ?>> </label> <br><br>
<p class="t left">** Lunch & Dinner will be provided on Saturday. </p> <br><br>



<header class="question">Keynotes & Workshops on Saturday </header> <br>
<label for="keynote_1"><strong>Do you plan to attend the workshops and keynotes on Saturday? </strong> <br>
<label class="gender t-center">Yes<input type="radio" name="keynote_1" value="Yes" required <?php echo ($keynote_1 == "Yes" ? 'checked="checked"' : ''); ?>></label>
<label class="gender t-center">No<input type="radio" name="keynote_1" value="No" <?php echo ($keynote_1 == "No" ? 'checked="checked"' : ''); ?>></label>
</label>
<br><br>



<header class="question"> Other Info  </header> <br><br>
 <li class="grid-2">
<label for="emergencyName" class="column-1"> In case of emergency, please provide an Emergency Contact Person:  <br>
<input type="text" name="emergencyName" class="rounded-input" id="emergencyName" placeholder="Emergency Contact Name" required <?php if (isset($emergencyName)) {
                                                                                                                        echo "value = '$emergencyName'";
                                                                                                                    } ?>> </label> 

<label for="emergencyPhone" class="column-2"> Emergency Contact Phone Number: <br><br>
<input type="phone" name="emergencyPhone" class="rounded-input" id="emergencyPhone" placeholder="Emergency Contact Phone #" required <?php if (isset($emergencyPhone)) {
                                                                                                                     echo "value = '$emergencyPhone'";
                                                                                                                    } ?>></label>


</li><br><br>

<hr>

<div style= "display: inline-flex; align-items: stretch;">
<input class="btn btn--blue" style="margin-right: 20px;"  type="submit" value="Submit" id="Submit" data-inline="true">
<a class="btn btn--dark-orange"  href=" /conferences/arizona-regional/arizona-registration/" data-inline="true">Cancel</a>
</div>
<input type="hidden" name="action" value="AzUpdate_2">
<input type="hidden" name="confId" <?php if (isset($confId)) {
                                                            echo "value = '$confId'";
                                                        } elseif (isset($_SESSION['confId'])) {
                                                            echo 'value="' . $_SESSION['confId'] . '"';
                                                        } ?> />
                    <input type="hidden" name="conf1" <?php if (isset($conf1)) {
                                                            echo "value = '$conf1'";
                                                        } elseif (isset($_SESSION['conf1'])) {
                                                            echo 'value="' . $_SESSION['conf1'] . '"';
                                                        } ?> />
                    <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                        echo "value = '$userId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?> />
<br>

   
        </fieldset>
    </form>
</div>
<?php } ?>

<?php get_footer(); ?>