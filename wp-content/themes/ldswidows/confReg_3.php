<?php
/*
 * Template Name: confReg_3
 Template Post Type: account
 */

/* other PHP code here */
session_start();

$_SESSION['conf1'];
$conf1 =  $_SESSION['conf1'];
$_SESSION['confId'];

$confId = $_SESSION['confId'];

$_SESSION['userId'];
$userId = $_SESSION['userId'];


//var_dump($_SESSION['clientData']); 

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

get_header();

if ($_SESSION['guestConf'] == "True") { ?>
    <div class="page-banner">
        <?php pageBanner(array(
            'title' => "Guest Registration",
        )); ?>
    </div>

<?php } else { ?>


    <div class="page-banner">
        <?php pageBanner(array(
            'title' => $conf1,
        )); ?>
    </div>

<?php }
if ($_SESSION['part3'] == "TRUE") {


    $userId = $_SESSION['userId'];
    $clientData =  $_SESSION['clientData'];
?>
    <div class="container container--narrow page-section">


        <h5 class="heading1">Registration - Step 3</h5>





        <br>
        <?php

        if ($conf1 === "Knoxville Regional Conference") { ?>
            <form id="step3" class="step3" action="/users/index.php" method="post">
                <div class="row_2">
                    <div class="sidebar"></div>
                    <header class="btn"> What are you interested in doing? </header><br>
                    <div style="border-bottom: 2px dashed white; padding: 10px; ">
                        <h4 style="margin: 5px;"> A possible hike Friday Morning - June 9, 2023? </h4>
                        <p style="margin: 5px;"> (9:00am) </p>
                        <span class="mobile">
                            <input type="radio" id="hike" name="hike" value="Yes" required>
                            <label class="align" for="hike"> Yes </label><br>
                            <input type="radio" id="hike" name="hike" value="No">
                            <label class="align" for="hike"> No </label>
                        </span><br>
                    </div>
                    <div style="border-bottom: 2px dashed white; padding: 10px; ">
                        <h4 style="margin: 5px;"> Planning to attend the bonfire meet and greet on Friday? </h4>
                        <p style="margin: 5px;"> (7:00pm - 10:00pm @ Annie Smith's home) </p>
                        <span class="mobile"><input type="radio" id="bonfire" name="bonfire" value="Yes" required>
                            <label class="align" for="bonfire"> Yes </label><br>
                            <input type="radio" id="bonfire" name="bonfire" value="No">
                            <label class="align" for="bonfire"> No </label></span><br>
                    </div>


                    <div style="border-bottom: 2px dashed white; padding: 10px; ">
                        <h4 style="margin: 5px;"> Planning to attend the keynote speakers and workshops? </h4>
                        <p style="margin: 5px;"> </p>
                        <span class="mobile"><input type="radio" id="keynotes" name="keynotes" value="Yes" required>
                            <label class="align" for="keynotes"> Yes </label><br>
                            <input type="radio" id="keynotes" name="keynotes" value="No">
                            <label class="align" for="keynotes"> No </label></span><br>
                    </div>


                    <div style="border-bottom: 2px dashed white; padding: 10px; ">
                        <h4 style="margin: 5px;"> Planning to attend the social on Saturday after the conference? </h4>
                        <p style="margin: 5px;"> (7:00pm - 10:00pm in the cultural hall) </p>
                        <span class="mobile"><input type="radio" id="social" name="social" value="Yes" required>
                            <label class="align" for="social"> Yes </label><br>
                            <input type="radio" id="social" name="social" value="No">
                            <label class="align" for="social"> No </label></span><br>
                    </div>


                    <div style="border-bottom: 2px dashed white; padding: 10px; ">
                        <h4 style="margin: 5px;"> Planning to attend sacrament meeting on Sunday morning? </h4>
                        <p style="margin: 5px;"> (9:00am) </p>
                        <span class="mobile"><input type="radio" id="sacrament" name="sacrament" value="Yes" required>
                            <label class="align" for="sacrament"> Yes </label><br>
                            <input type="radio" id="sacrament" name="sacrament" value="No">
                            <label class="align" for="sacrament"> No </label></span><br>
                    </div>
                    <div style="padding: 10px; margin: 0 ">
                        <span class="mobile"> <label class="align" for="allergies">Food allergies or Restrictions: </label><br><br>
                            <input type="text" id="allergies" name="allergies" placeholder="Please list any food allergies here"></span><br> <br>
                    </div>
                    <div> </div> <!-- For Styling purposes -->
                </div>

                <input type="submit" value="Submit" id="submit"><br><br>
                <input type="hidden" name="action" value="knoxSubmit">
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

            <?php } elseif ($conf1 === "Cache Valley Regional Conference") {
            /* Thursday Events */  ?>
                <form id="step3" class="step3" action="/users/index.php" method="post">
                    <h4>Which events Thursday June 22nd, are you planning to attend? </h4>
                    <input type="checkbox" id="lake" name="lake" value="1">
                    <label class="align" for="lake" word-wrap: break-word>Day at the Lake - (canoeing, swimming, picknicking, paddle boarding, lawn games) pm - 5:pm </label><br>
                    <input type="checkbox" id="bike" name="bike" value="2">
                    <label class="align" for="bike">Bike Ride through Sardine Canyon 1:00pm - 5:00pm </label><br><br>
                    <h4>Which morning & afternoon events Friday June 23rd, are you planning to participate in? </h4>
                    <label class="display"> A time is reserved for attending the Logan Temple on Friday Morning. If you desire to attend, please make your appointment for either an endowment, initiatory, baptisms or sealings online. </p>
                        <input type="checkbox" id="temple" name="temple" value="3">
                        <label class="align" for="temple">Morning Temple Session 9:00am - 11:00am</label><br>
                        <input type="checkbox" id="hike1" name="hike1" value="4">
                        <label class="align" for="hike1">Afternoon Easy Hike - 1:00pm- 5:00pm</label><br>
                        <input type="checkbox" id="hike2" name="hike2" value="5">
                        <label class="align" for="hike2">Afternoon Hike (Not as Easy but still fun) - 1:00pm- 5:00pm</label><br>
                        <input type="checkbox" id="pickleball" name="pickleball" value="6">
                        <label class="align" for="pickleball">Afternoon Pickleball - 1:00pm- 5:00pm</label><br>
                        <input type="checkbox" id="axe" name="axe" value="7">
                        <label class="align" for="axe">Afternoon Knife & Axe Throwing - 1:00pm- 5:00pm</label><br><br>
                        <!-- Friday Evening Activities -->
                        <h4>Which Activities Friday evening are you planning to participate in? </h4>
                        <input type="checkbox" id="fireside" name="fireside" value="8">
                        <label class="align" for="fireside">Evening Fireside - 6:30pm </label><br>
                        <input type="checkbox" id="meet_greet" name="meet_greet" value="9">
                        <label class="align" for="meet_greet">Evening Meet and Greet - 7:30pm</label><br><br>
                        <!-- Saturday Morning Workshops -->
                        <h4>What Events Saturday are you planning to attend? </h4>
                        <input type="checkbox" id="keynote" name="keynote" value="10">
                        <label class="align" for="keynote">Workshops and Keynote 9:30am - 5:00pm </label><br>>
                        <input type="checkbox" id="square" name="square" value="11">
                        <label class="align" for="square">Square Dancing with Professional Caller 7:00 - 8:30 pm</label><br>>
                        <input type="checkbox" id="afterParty" name="afterParty" value="12">
                        <label class="align" for="afterParty"> Dancing, Games, & Karaoke 8:30 - 10:30 pm</label><br><br>>
                        <input type="checkbox" id="cleanup" name="cleanup" value="13">
                        <label class="align" for="cleanup"> Cleanup - Please stay a few minutes after the dance and help us clean up</label><br><br>
                        <input type="submit" value="Next" id="submit"><br><br>

                        <input type="hidden" name="action" value="step3">>
                        <input type="hidden" name="userId" class="input" id="userId">
                        <?php if (isset($userId)) {
                            echo "value = '$userId'";
                        } elseif (isset($_SESSION['clientData'])) {
                            echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                        } ?>
                        <br>
                    <?php  } ?>

                    <?php if ($confId == 8) { ?>
                        <form id="step3" class="step3" action="/users/index.php" method="post">
                            <br>
                            <header class="question"> Relationship Info </header> <br>
                            <p class="success"> Please note that if you are coming with someone, only one of you needs to go through the registration process. </p>
                            <label for="status"> Relationship status? </label> <br>
                            <select name="status" id="status" class="input" required>
                                <option value="">--Please choose an option--</option>
                                <option value="Remarried"> Remarried </option>
                                <option value="Engaged">Engaged</option>
                                <option value="Seriously Dating">Seriously Dating</option>

                            </select> <br><br>
                            <label>If you're attending with a partner, list their first name and last name </label><br>
                            <input class="input" type="text" name="attendee2FN" placeholder="Attendee 2's first name">
                            <input class="input" type="text" name="attendee2LN" placeholder="Attendee 2's last name"><br> <br>

                            <header class="question"> Class topics </header> <br>
                            <label for="comment">Please list any suggestions you may have for class ideas? </label><br>
                            <textarea style="padding-left: 10px:" rows="10" cols="30" name="comment" for="step3" placeholder="Enter suggestions here"></textarea><br><br>

                            <header class="question"> Friday evening social.. </header> <br>

                            <label> Do you plan on attending the social at Stan & Michelle Lockhart's home Friday evening? </label> <br>
                            <input type="radio" id="social" name="social" value="Yes" required>
                            <label class="align" for="social"> Yes </label><br>
                            <input type="radio" id="social" name="social" value="No">
                            <label class="align" for="social"> No </label>
                            <br><br>

                            <header class="question"> Help is needed... </header> <br>

                            <label> We need help with some of our tasks, what can you help with? </label> <br>
                            <input type="checkbox" id="task1" name="task1" value="Set Up">
                            <label class="align" for="task1">Set Up</label><br>
                            <input type="checkbox" id="task2" name="task2" value="Clean Up">
                            <label class="align" for="task2">Clean Up</label><br>
                            <input type="checkbox" id="task3" name="task3" value="Table Decorations">
                            <label class="align" for="task3">Table Decorations</label><br>
                            <input type="checkbox" id="task4" name="task4" value="Other general tasks">
                            <label class="align" for="task4">Other general tasks</label><br><br>

                            <header class="question">Dietary Needs</header><br>
                            <label for="allergies">Food allergies - either of you have any, please inform us here. </label><br>
                            <input class="input" type="text" id="allergies" name="allergies" placeholder="Please list any food allergies here"></span><br> <br>

                            <label for="diet">Dietary needs - either of you have any needs, please inform us here. </label><br>
                            <input type="checkbox" id="diet1" name="diet1" value="Gluten Free">
                            <label class="align" for="diet1">Gluten Free</label><br>
                            <input type="checkbox" id="diet2" name="diet2" value="Vegetarian">
                            <label class="align" for="diet2">Vegetarian</label><br><br>


                            <header class="question"> Suggested Donation </header> <br>
                            <p style="padding-left: 20px;">
                                The suggested donation for the conference is $25/couple. Please pay your donation as soon as possible. </p>

                            <p style="padding-left: 20px;">**If you click on the link to pay with Venmo, a new tab will open to Venmo, after you make the payment, switch back here to complete the registration. And if you're having someone else Venmo for you, please have them make a note of who it is for.**</p>

                            <header class="question"> How will you be sending your suggested donation? </header><br>
                            <p style="padding-left: 20px;"> ***Please note that one option needs to be selected, thank you.*** </p>
                            <input type="radio" id="payment" name="payment" value="Pay Using Venmo" required>
                            <label for="Venmo">Venmo (Preferred) </label> <a style="background: white !important; color: var(--first_color) !important; padding: 3px;  " href="https://account.venmo.com/u/JoellaGrayGifford" target="_blank">https://account.venmo.com/u/JoellaGrayGifford</a> <br>
                            <p style="padding-left: 20px;"> **Please don't check the box where Venmo takes a portion of the money. We will send you a full refund if you cancel your registration before we give our final meal numbers to the caterers.**</p>
                            <input type="radio" id="payment" name="payment" value="Bring Cash">
                            <label for="other" class="align">I'll bring cash to the conference</label><br><br>

                            <input type="submit" value="Next" id="submit"><br><br>
                            <input type="hidden" name="action" value="step3">
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
                        <?php  }
                    //************************************************************************************************************************************
                    //************************Begin the Idaho Conference Form ****************************************************************************
                    //************************************************************************************************************************************
                    if ($confId == 7) { ?>
                            <form id="step3" class="step3" action="/users/index.php" method="post">
                                <br>
                                <header class="question">Activities </header> <br>
                                Thursday evening from 6:00pm - 8:00pm you have the opportunity to attend a session at either the Meridian or Boise, Idaho Temple. Please make an appointment. <br>
                                <label for="act_1"><strong>Which temple will you be attending Thursday evening?</strong></label><br>
                                <select name="act_1" id="act_1" class="input" required>
                                    <option value="">--Please choose an option--</option>
                                    <option value="Boise">Boise</option>
                                    <option value="Meridian">Meridian</option>
                                    <option value="Not Attending, thank you.">Not Attending, thank you.</option>
                                </select><br><br>

                                <label><strong>After the temple starting at 8:30pm, we'll meet at Lovejoy's for ice cream and visiting. Will you be joining us?</strong> <br>
                                    <span class="workshop"><input type="radio" name="act_2" value="Yes" required>Yes</span>
                                    <span class="workshop"><input type="radio" name="act_2" value="No">No</span> </label> <br><br>


                                There will be three activities to choose from on Friday morning from 9:00am - 12:00pm.
                                <ul style="list-style: none">
                                    <li><strong> Pickleball </strong> </li>
                                    <li><strong> Walk/Hike </strong> </li>
                                    <li><strong> Service Project </strong> </li>
                                    <label for="act_3"><strong> Which Friday Morning Activity? </strong> </label> <br>

                                    <select name="act_3" id="act_3" class="input" required>
                                        <option value="">--Please choose an option--</option>
                                        <option value="Pickleball">Pickleball</option>
                                        <option value="Walk/Hike">Walk/Hike</option>
                                        <option value="Service Project">Service Project</option>
                                        <option value="Not Attending, thank you.">Not Attending, thank you.</option>
                                    </select><br><br>

                                    <label><strong>Friday Evening fireside 7:00pm with Tiffany Barker?</strong> <br>
                                        <span class="workshop"><input type="radio" name="act_4" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="act_4" value="No">No</span> </label> <br><br>

                                    <label><strong>Saturday Evening After Conference Social 7:30pm - 10:30pm?</strong> <br>
                                        <span class="workshop"><input type="radio" name="act_5" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="act_5" value="No">No</span> </label> <br><br>

                                    <header class="question"> Meals </header> <br>
                                    <label for="meal1"> Friday Lunch @ 12:30 <br>
                                        <strong>Description: </strong>Hamburgers, chips, watermelon, and condiments </label> <br>
                                    <select name="meal1" id="meal1" class="input" required>
                                        <option value="">--Please choose an option--</option>
                                        <option value="Yes, thank you.">Yes, thank you.</option>
                                        <option value="No, thank you.">No, thank you.</option>
                                        <option value="Bringing my own food.">Bringing my own food.</option>
                                        <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
                                    </select>
                                    <label for="meal2"> Saturday Lunch @ 12:30 <br>
                                        <strong>Description: </strong> Pulled pork, smoked turkey, BB sauce, BB beans, potato salad, rolls & cookie - Catered by Goodwood </label> <br>
                                    <select name="meal2" id="meal2" class="input" required>
                                        <option value="">--Please choose an option--</option>
                                        <option value="Yes, thank you.">Yes, thank you.</option>
                                        <option value="No, thank you.">No, thank you.</option>
                                        <option value="Bringing my own food.">Bringing my own food.</option>
                                        <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
                                    </select>


                                    <header class="question">Saturday Keynotes & Workshops </header> <br>
                                    <p> Which sessions will you be attending?<br>
                                        ** Please Note that each workshop session will have multiple classes to choose from.** </p>

                                    <label><strong> Saturday Morning Keynote </strong> 9:30 AM <br>
                                        <span class="workshop"><input type="radio" name="keynote_1" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="keynote_1" value="No">No </span> </label> <br><br>

                                    <label><strong> Workshop 1 </strong>- 10:30am - 11:20am <br>
                                        <span class="workshop"><input type="radio" name="workshop_1" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="workshop_1" value="No">No</span> </label> <br><br>

                                    <label><strong> Workshop 2 </strong>- 11:30am - 12:20pm <br>
                                        <span class="workshop"><input type="radio" class="workshop" name="workshop_2" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" class="workshop" name="workshop_2" value="No">No </span> </label> <br><br>

                                    <label><strong> Workshop 3</strong>- 1:45pm - 2:30pm</strong><br>
                                        <span class="workshop"><input type="radio" name="workshop_3" value="Yes" required> Yes</span>
                                        <span class="workshop"><input type="radio" name="workshop_3" value="No">No </span> </label> <br><br>

                                    <label> <strong> Workshop 4 </strong>- 2:45pm - 3:30pm <br>
                                        <span class="workshop"><input type="radio" name="workshop_4" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="workshop_4" value="No">No </span> </label> <br><br>

                                    <label><strong> Workshop 5 </strong>- 3:45pm - 4:30pm <br>
                                        <span class="workshop"><input type="radio" name="workshop_5" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="workshop_5" value="No">No </span> </label> <br><br>

                                    <label> <strong>Saturday Closing Keynote </strong>- 4:45pm - 5:30pm <br>
                                        <span class="workshop"><input type="radio" name="keynote_2" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="keynote_2" value="No">No </span> </label> <br><br>


                                    <header class="question">Other stuff... </header><br>
                                    <label for="lodging"><strong>Where will you be staying? </strong></label> <br>
                                    <select name="lodging" id="lodging" class="input" required>
                                        <option value="">--Please choose an option--</option>
                                        <option value="Your Own home">Your Own Home</option>
                                        <option value="With Family">With Family</option>
                                        <option value="With Friends">With Friends</option>
                                        <option value="Hotel">Hotel</option>
                                        <option value="AirBnB">AirBnB</option>
                                        <option value="RV Park">RV Park</option>
                                        <option value="Not Sure">Not Sure</option>
                                    </select><br><br>
                                    <p> ** If you need a list of local hotels: <a href="https://ldswidowsandwidowers/idaho-hotels"> List of local hotels </a></p><br>

                                    <label> <strong>Will you be attending church Sunday? </strong><br>
                                        <span class="workshop"><input type="radio" name="church" value="Yes" required>Yes</span>
                                        <span class="workshop"><input type="radio" name="church" value="No">No </span> </label> <br><br>

                                    <input type="submit" value="Next" id="submit"><br><br>
                                    <input type="hidden" name="action" value="step3">
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
                                <?php }


                            //*******************************************************************************************************************           
                            //*********************Begin the San Antonio Conference Form ********************************************************
                            //*******************************************************************************************************************
                            if ($confId == 10) { ?>
                                    <form id="step3" class="step3" action="/users/index.php" method="post">
                                        <br>
                                        <header class="question">Activities </header> <br>
                                        Friday before the fireside is free-form, so please enjoy your time here in beautiful San Antonio!
                                        We’ve lined up some possible gathering spots to meet other widows, make friends,
                                        and see some of our iconic landmarks. Join us for any, all, or none, at your leisure.
                                        <br>
                                        <label for="act_1"><strong>Which Friday morning activity are you interested in doing?</strong></label>
                                        <br>**By selecting one of these you are not committed, we just want to see what kind of interest there is.<br>
                                        <select name="act_1" id="act_1" class="rounded-input" required>
                                            <option value="">--Please choose an option--</option>
                                            <option value="Hike">Hike </option>
                                            <option value="Temple">Temple Session at the San Antonio Temple.</option>
                                            <option value="Not Interested">Not interested, thank you.</option>
                                        </select><br><br>

                                        <div style="list-style: none; background-color: #FA8072; padding: 10px; ">
                                            We are making you aware of several possible activities for the afternoon. <br><br>
                                            <li><strong> Narrated Riverwalk Cruise - </strong> $14.50 Meet at the Rivercenter Ticket Booth </li>
                                            <li><strong> Visit El Mercado - </strong> Historic Market Square </li>
                                            <li><strong> Hike @ Government Canyon </strong> </li>
                                        </div> <br>
                                        <label for="act_2"><strong> Which Friday Early Afternoon Activity are you interested in? </strong> </label> <br>

                                        <select name="act_2" id="act_2" class="rounded-input" required>
                                            <option value="">--Please choose an option--</option>
                                            <option value="Temple">Temple Session at the San Antonio Temple at 1:30pm </option>
                                            <option value="Hike">Hike starting at 2:00pm</option>
                                            <option value="Not Attending, thank you.">Not Attending, thank you.</option>
                                        </select><br><br>

                                        <p class="t left"> Please call the San Antonio Temple at <strong>210-538-0034</strong>
                                            on the church's website to reserve a seat for an Endowment Session.
                                            We have seats reserved under “Widow and Widower Conf.” at 9:00am and 1:30pm.</p>

                                        <hr>

                                        <label for="act_3"><strong> Do you plan to attend the Narrated Riverwalk Cruise @ 3pm? </strong><br>
                                            <label class="gender t-center">Yes<input type="radio" name="act_3" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="act_3" value="No"></label>
                                        </label> <br><br>
                                        <hr>

                                        <label for="act_4"><strong> Do you plan to visit El Mercado with us @ 4pm? </strong> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="act_4" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="act_4" value="No"> </label>
                                        </label> <br><br>
                                        <hr>

                                        <label for="act_5"><strong> “Fast Friends” Treats & Social and Friendship Games - Friday 8:15pm - 9:30pm?</strong> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="act_5" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="act_5" value="No"></label>
                                        </label> <br><br>
                                        <hr>

                                        <label for="act_6"><strong> Texas Under the Stars - Saturday 8:15pm - 10:00pm?</strong> <br>
                                            Texas Under The Stars – Outside – S’mores Round the Fire, Guitars and Campfire songs, Yard Games (horseshoes, cornhole, Kan Jam, KUB)<br>
                                            Inside - table games <br><br>
                                            <label class="gender t-center">Yes<input type="radio" name="act_6" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="act_6" value="No"></label>
                                        </label> <br><br>
                                        <hr>
                                        <label for="act_7"><strong> Guitars and Campfire Songs: </strong> <br>
                                            We're hoping to have someone bring their guitar to play around the campfire, do you have one that you would be willing to bring and play for us? <br>
                                            <label class="gender t-center">Yes<input type="radio" name="act_7" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="act_7" value="No"></label>
                                        </label> <br><br>

                                        <header class="question"> Meals </header> <br>

                                        <label for="meal1"> Saturday Lunch from 12:40pm - 1:30pm <br>
                                            <strong>Description: </strong> Deli Lunch in the Cultural Hall</label> <br>
                                        <select name="meal1" id="meal1" class="rounded-input" required>
                                            <option value="">--Please choose an option--</option>
                                            <option value="Yes, thank you.">Yes, thank you.</option>
                                            <option value="No, thank you.">No, thank you.</option>
                                        </select>
                                        <hr>

                                        <label for="meal2"> Saturday Dinner from 5:00pm - 6:45pm <br>
                                            <strong>Description: </strong>Texas BBQ Dinner in the Cultural Hall </label> <br>
                                        <select name="meal2" id="meal2" class="rounded-input" required>
                                            <option value="">--Please choose an option--</option>
                                            <option value="Yes, thank you.">Yes, thank you.</option>
                                            <option value="No, thank you.">No, thank you.</option>
                                        </select>
                                        <header class="question"> Other Info </header> <br><br>
                                        <label>Any Special Food Needs? </label> <br>
                                        <input type="text" name="foodNeeds" class="rounded-input" id="foodNeeds" placeholder="Food Needs" required <?php if (isset($foodNeeds)) {
                                                                                                                                                        echo "value = '$foodNeeds'";
                                                                                                                                                    } ?>><br>


                                        <label for="emergencyName"> In case of emergency, please provide an Emergency Contact Person: </label> <br>
                                        <input type="text" name="emergencyName" class="rounded-input" id="emergencyName" placeholder="Emergency Contact Name" required <?php if (isset($emergencyName)) {
                                                                                                                                                                            echo "value = '$emergencyName'";
                                                                                                                                                                        } ?>> <br>

                                        <label for="emergencyPhone"> Emergency Contact Phone Number: </label><br>
                                        <input type="phone" name="emergencyPhone" class="rounded-input" id="emergencyPhone" placeholder="Emergency Contact Phone #" required <?php if (isset($emergencyPhone)) {
                                                                                                                                                                                    echo "value = '$emergencyPhone'";
                                                                                                                                                                                } ?>>


                                        <br><br>
                                        <header class="question">Keynotes & Workshops </header> <br>
                                        <?php
                                        $workshop1_time_SA = "9:40am - 10:30am";
                                        $workshop2_time_SA = "10:45am - 11:35am";
                                        $workshop3_time_SA = "11:50am - 12:40pm";
                                        $workshop4_time_SA = "1:35pm - 2:25pm";
                                        $workshop5_time_SA = "2:40pm - 3:30pm";
                                        $workshop6_time_SA = "3:45pm - 4:35pm";
                                        $keynote_time_SA = "7:00pm - 8:00pm";
                                        ?>

                                        <ul class="workshop"> Potential Classes:
                                            <li> I'm Fine - Navigating my feelings. Learning to understand what my needs are and how to ask for help from others. Widows fog, confusion, anger, numbness, isolation, getting organized.</li>
                                            <li> Widow finance - basic Intro & Resources to Finance, Wills, & Estate, No questions"</li>
                                            <li> Surviving - New grief, what to do when grief doesn’t lessen, when to see a counselor, hacks for sadness, helping our children navigate their own grief and our moving forward.</li>
                                            <li> Dating After Loss </li>
                                            <li> And We Did Take Courage - Finding Hope and Happiness after Loss </li>
                                            <li> Preserving Memories - the importance of keeping history and preserving memories. Tangible ways to keep loved one’s items close.</li>
                                            <li> Getting Outside of Ourselves - learning to be alone, finding God’s purpose for us in this season, rediscovering self, and building community. Addressing employment, building a new social circle, the importance of serving.</li>
                                            <li> Moving Forward. My Way, or God’s Way? Seeking God’s will for my life.</li>
                                            <li> One Day at a Time - Learning to adjust to not having my spouse at home and becoming more self-reliant. Tools to get through the difficult days and keep my head above water. Embracing my circumstances. Learning to survive again.</li>

                                        </ul>
                                        <br>
                                        <p> Which sessions will you be attending?<br>
                                            ** Please Note that each workshop session will have multiple classes to choose from.** </p>

                                        <label><strong> Friday Evening Fireside </strong> -<?php echo $keynote_time_SA; ?><br>
                                            <label class="gender t-center">Yes<input type="radio" name="keynote_1" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="keynote_1" value="No"></label>
                                        </label><br><br>

                                        <label><strong> Workshop 1 </strong> - <?php echo $workshop1_time_SA; ?> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_1" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_1" value="No"></label>
                                        </label> <br><br>

                                        <label><strong> Workshop 2 </strong> - <?php echo $workshop2_time_SA; ?> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_2" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_2" value="No"></label>
                                        </label> <br><br>

                                        <label><strong> Workshop 3</strong> - <?php echo $workshop3_time_SA; ?></strong><br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_3" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_3" value="No"></label>
                                        </label> <br><br>
                                        <label> <strong> Workshop 4 </strong> - <?php echo $workshop4_time_SA; ?> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_4" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_4" value="No"></label>
                                        </label> <br><br>

                                        <label><strong> Workshop 5 </strong> - <?php echo $workshop5_time_SA; ?><br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_5" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_5" value="No"></label>
                                        </label> <br><br>

                                        <label><strong> Workshop 6 </strong> - <?php echo $workshop6_time_SA; ?><br>
                                            <label class="gender t-center">Yes<input type="radio" name="workshop_6" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="workshop_6" value="No"></label>
                                        </label> <br><br>

                                        <label> <strong>Saturday Closing Keynote </strong> - <?php echo $keynote_time_SA; ?> <br>
                                            <label class="gender t-center">Yes<input type="radio" name="keynote_2" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="keynote_2" value="No"></label>
                                        </label> <br><br>

                                        <hr>
                                        <label> <strong>Will you be attending our special Testimony meeting on Sunday at 10:00am? </strong><br>
                                            <label class="gender t-center">Yes<input type="radio" name="church" value="Yes" required></label>
                                            <label class="gender t-center">No<input type="radio" name="church" value="No"></label>
                                        </label> <br><br>

                                        <button class="btn btn--blue" type="submit" id="submit">Submit</button><br><br>
                                        <input type="hidden" name="action" value="step3">
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
                                    <?php } ?>

                                    </form>




                                    <?php
                                    //************************************************************************************************************************************
                                    //***************************************Begin the Arizona Conference Form ***********************************************************
                                    //************************************************************************************************************************************

                                    if ($confId == 11) { ?>


                                        <?php if (!$_SESSION['guestConf']) { ?>
                                            <form action="/users/index.php" method="post">
                                               
                                                    <?php get_template_part('template-parts/AZ', 'form'); ?>
                                                    <button class="btn btn--blue" type="submit" id="submit">Submit Registration</button><br><br>
                                                    <input type="hidden" name="action" value="step3">
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
                                        <?php } elseif ($_SESSION['guestConf'] == "True") { 
                                        
                                        ?> 
                                            <form action="/arizona/index.php" method="post">
                                                
                                                  <?php get_template_part('template-parts/AZG', 'form'); ?>

                                                    <button class="btn btn--blue" type="submit" id="submit">Submit Registration</button><br><br>
                                                    <input type="hidden" name="action" value="step3_AZ">
                                                    <input type="hidden" name="confId" <?php if (isset($confId)) {
                                                                                            echo "value = '$confId'";
                                                                                        } elseif (isset($_SESSION['confId'])) {
                                                                                            echo 'value="' . $_SESSION['confId'] . '"';
                                                                                        } ?>>
                                                    <input type="hidden" name="conf1" <?php if (isset($conf1)) {
                                                                                            echo "value = '$conf1'";
                                                                                        } elseif (isset($_SESSION['conf1'])) {
                                                                                            echo 'value="' . $_SESSION['conf1'] . '"';
                                                                                        } ?>>
                                                  
                                                
                                            </form>





                                        <?php    } //End Arizona Form  
                                        ?>

    </div>

    </div>




    <script type="text/javascript" src=" /library/account.js"></script>
<?php
                                    }
                                }
                                get_footer(); ?>