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

get_header();
if ($_SESSION['part3'] == "TRUE") {


    $userId = $_SESSION['userId'];
    $clientData =  $_SESSION['clientData'];
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Register For Conference</h1>
            <div class="page-banner__intro">
                <p>Don't forget to replace me later.</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
    <div class="sidebar" id="column_1">
            <h5 class="heading1">Conference Registration - Step 3 </h5>
        <form action="../users/index.php" method="post">
            <label class="input" style="background: black; color: white; padding: 4px;">Registering For <?php echo " " . $conf1 ?></label>
               
            <fieldset>
                <?php 
                     if ($confId == 9  ) { ?>
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

                <?php } elseif ($confId == 6) {
                    /* Thursday Events */  ?>
                    <h4>Which events Thursday June 22nd, are you planning to attend? </h4>
                    <input type="checkbox" id="lake" name="lake" value="1">
                    <label class="align" for="lake" word-wrap: break-word>Day at the Lake - (canoeing, swimming, picknicking, paddle boarding, lawn games) pm - 5:pm </label><br>
                     <input type="submit" value="Next" id="submit"><br><br>

                        <input type="hidden" name="action" value="step3">>
                        <input type="hidden" name="userId" class="input" id="userId">
                        <?php if (isset($userId)) {
                            echo "value = '$userId'";
                        } elseif (isset($_SESSION['clientData'])) {
                            echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                        } ?>
                        <br>
                    <?php  } elseif ($confId == 8) {
                        ?>
                        <label for="status"> Relationship Status: Are you ... </label> <br>
                        <select name="status" id="status" class="status" required> 
                        <option value=""> -- Please choose an option --</option> 
                        <option value="Married">Married</option>
                        <option value="Engaged">Engaged</option>
                        <option value="Seriously Dating">Seriously Dating</option>
                       </select> <br> 
                    
                      <label for="diet"> Do you have any dietary needs? </label><br> 
                      <select name="diet" id="diet" required> 
                      <option value=""> -- Please choose an option --</option> 
                      <option value="No Dietary Needs">No Dietary Needs</option>
                      <option value="Gluten Free">Gluten Free</option>
                      <option value="Vegetarian">Vegetarian</option>
                      </select> <br> 
                    
                      <label for="allergies">   Do you have any allergies? If so, please list them here.  </label><br> 
                      <input type="text" > <br> <br> 
                      <input type="submit" value="Submit" id="submit"><br><br>
                    <input type="hidden" name="action" value="remarriedSubmit">
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

                    <?php
                    }  ?>
            </fieldset>
        </form>
    </div>



    <script type="text/javascript" src=" /library/account.js"></script>
    <script>
    const statusOption = document.getElementById("status");

alert(statusOption.value); 
// the text that the button is initialized with
const initialText = buttonToBeClicked.textContent;

// the text that the button contains after being clicked
const clickedText = " ";

// we hoist the event listener callback function
// to prevent having duplicate listeners attached
function eventListener() {
  buttonToBeClicked.textContent = clickedText;
}

function addListener() {
  buttonToBeClicked.addEventListener("click", eventListener, {
    passive: true,
    once: true,
  });
}

// when the reset button is clicked, the example button is reset,
// and allowed to have its state updated again
resetButton.addEventListener("click", () => {
  buttonToBeClicked.textContent = initialText;
  addListener();
});

addListener();
  
    </script> 
    <?php get_footer(); ?>

<?php } ?> 