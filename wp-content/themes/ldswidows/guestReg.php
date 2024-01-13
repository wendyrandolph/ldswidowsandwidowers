<?php
/*
 * Template Name: guestReg 
 Template Post Type: Account
 */

/* other PHP code here */
session_start();


if ($_SESSION['loggedin']) {
    get_header();
    $_SESSION['userId'];
    $adminId = $_SESSION['userId']; 
     
    $_SESSION['userLevel'];
    $_SESSION['knox'];
    $_SESSION['conf2'];
    $conf2 = $_SESSION['conf2'];
    $_SESSION['confId'];
 
    $confId = $_SESSION['confId'];

    $url2 = "href='/users/index.php?action=knox&conf2=$conf2&confId2=$confId2'";

    $_SESSION['emailMessage'];
    require_once($_SERVER['DOCUMENT_ROOT'] . '/library/classes.php');

?>
    <div class="page-banner">
        <?php pageBanner(array(
            'title' => " "
        )); ?>
    </div>

    <div class="container container--narrow page-section">

        <h5 class="heading1"> Guest Registration </h5>
        <div class="full-width-split">
            <div class="full-width-split__one">
                <div class="presentation">
                    <?php if ($_SESSION['walk1'] == "TRUE") { ?>
                        <form action="/users/index.php" method="post">
                            <label for="conf1"> Which conference are you registering for? </label><br>
                            <select name="conf1" id="conf1" class="input" required>
                                <option value="">--Please choose an option--</option>
                                <option value="5" disabled>Salt Lake City Conference</option>
                                <option value="6" disabled>Cache Valley Regional Conference</option>
                                <option value="7" id="7">Idaho Regional Conference</option>
                                <option value="8" disabled>Remarried Life Conference</option>
                                <option value="9" disabled> Knoxville Regional Conference </option>
                                <option value="10" disabled>San Antonio Regional Conference</option>
                                <option value="11" disabled> Arizona Regional Conference </option>
                            </select> <br><br>
                            <input class="btn btn--small btn--blue float-left push-right" type="submit" value="Next" id="submit" name="walk1"><br><br>
                            <input type="hidden" name="action" value="walk1">
                            <input type="hidden" name="adminId" class="input" id="adminId" <?php if (isset($adminId)) {
                                                                                                echo "value = '$adminId'";
                                                                                            } elseif (isset($_SESSION['clientData'])) {
                                                                                                echo 'value="' . $_SESSION['clientdata']['adminId'] . '"';
                                                                                            } ?>> <br>

                        </form>

                    <?php } 
                    if ($_SESSION['walk2'] == "TRUE") { 
                      
                        
                        ?>
                        <form class="step2" action="/users/index.php" method="post">
                            <p class="display"> *Note all fields are required </p>

                            <label>Email:</label> <br>
                            <input type="email" name="userEmail" class="input" id="userEmail" placeholder="New User Email" required> <br>

                            <label>First Name:</label> <br>
                            <input type="text" name="firstName" class="input" id="firstName" placeholder="New First Name" required> <br>
                            <label>Last name:</label> <br>
                            <input type="text" name="lastName" class="input" id="lastName" placeholder="New Last Name" required> <br>
                            <label>Address:</label> <br>
                            <input type="text" name="address" class="input" id="address" placeholder="New Home Address" required> <br>
                            <label>City:</label> <br>
                            <input type="text" name="city" class="input" id="city" required> <br>
                            <label for="state">State: </label> <br>
                            <select name="state" id="state" class="input" required>
                                <option value=""> Please Select an Option below</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="New York">New York</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                                <option value="Other">Other (Outside the US)</option>
                            </select><br><br>


                            <label>Zipcode:</label> <br>
                            <input type="text" name="zipcode" class="input" id="zipcode"> <br>


                            <label for="county">County, if you live in Utah:</label> <br>

                            <input type="text" name="county" class="input" id="county"> <br>

                            <label>Country, if you live outside the US:</label> <br>
                            <input type="text" name="country" class="input" id="country" placeholder=" Country"><br>

                            <label>Phone:</label> <br>
                            <input type="tel" name="phone" class="input" id="phone" placeholder="New phone number"><br>

                            <label>Age: </label> <br>
                            <select name="age" id="age" class="input"><br>
                                <option value="">Please select an age bracket below. </option>
                                <option value="20-29"> 20-29 </option>
                                <option value="30-39"> 30-39 </option>
                                <option value="40-49"> 40-49 </option>
                                <option value="50-59"> 50-59 </option>
                                <option value="60-69"> 60-69 </option>
                                <option value="70+"> 70+ </option>
                            </select> <br> <br>

                            <label id="gender">Gender: </label> <br>

                            <input type="radio" id="male" name="gender" value="Male">
                            <label for="male" class="gender"> Male </label>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female" class="gender">Female</label> <br><br>




                            <label for="widowed">How long have you been widowed?:</label><br>
                            <select name="widowed" id="widowed" class="input">
                                <option value="">Please select an option </option>
                                <option value="0-6 Months">0-6 Months</option>
                                <option value="06-12 Month">6-12 Months</option>
                                <option value="1-2 Years">1-2 Years </option>
                                <option value="2-3 Years">2-3 Years </option>
                                <option value="3-5 Years">3-5 Years </option>
                                <option value="5-7 Years">5-7 Years</option>
                                <option value="8 years or more">8 years or more </option>
                                <option value="Not widowed myself, but married to someone who is widowed"> Not widowed myself, but married to someone who is widowed </option>
                            </select> <br><br>

                            <label for="conf"> How many conferences have you attended previously? </label><br>
                            <select name="conf" id="conf" class="input">
                                <option value="">Please select an option </option>
                                <option value="This will be my first"> This will be my first </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4 or more"> 4 or more </option>
                            </select><br><br>

                            <input type="submit" value="Next" id="submit"><br><br>
                            <!--Add the action name - value pair -->
                            <input type="hidden" name="action" value="walk2">
                            <input type="hidden" name="adminId" class="input" id="userId" <?php if (isset($adminId)) {
                                                                                                echo "value = '$adminId'";
                                                                                            }?> >
                            <input type="hidden" name="confId" class="input" id="confId" <?php if (isset($confId)) {
                                                                                                echo "value= '$confId'";
                                                                                            }?> >
                            <input type="hidden" name="conf1" class="input" id="conf1" <?php if (isset($conf1)) {
                                                                                            echo "value= '$conf1'";
                                                                                        }?>>

                        </form>

                    <?php  }
                    
                    elseif ($_SESSION['walk3'] == "TRUE") { ?>
                    <form class="step2" action="/users/index.php" method="post">
                        <header class="question">Activities </header> <br>
                        <label><strong>Did you attend the Friday Evening fireside 7:00pm with Tiffany Barker?</strong> <br>
                            <span class="workshop"><input type="radio" name="act_4" value="Yes" required>Yes</span>
                            <span class="workshop"><input type="radio" name="act_4" value="No">No</span> </label> <br><br>

                        <label><strong>Saturday Evening After Conference Social 7:30pm - 10:30pm?</strong> <br>
                            <span class="workshop"><input type="radio" name="act_5" value="Yes" required>Yes</span>
                            <span class="workshop"><input type="radio" name="act_5" value="No">No</span> </label> <br><br>

                        <header class="question"> Meals </header> <br>
                        <label for="meal1"> Friday Lunch @ 1:00pm <br>
                            <strong>Description: </strong>Hamburgers, chips, watermelon, and condiments </label> <br><br>
                        <select name="meal1" id="meal1" class="input" required>
                            <option value="">--Please choose an option--</option>
                            <option value="Yes, thank you.">Yes, thank you.</option>
                            <option value="No, thank you.">No, thank you.</option>
                            <option value="Bringing my own food.">Bringing my own food.</option>
                            <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
                        </select><br><br>
                        <label for="meal2"> Saturday Lunch @ 12:30 <br>
                            <strong>Description: </strong> Pulled pork, smoked turkey, BB sauce, BB beans, potato salad, rolls & cookie - Catered by Goodwood </label> <br>
                        <br><select name="meal2" id="meal2" class="input" required>
                            <option value="">--Please choose an option--</option>
                            <option value="Yes, thank you.">Yes, thank you.</option>
                            <option value="No, thank you.">No, thank you.</option>
                            <option value="Bringing my own food.">Bringing my own food.</option>
                            <option value="Going out for lunch, thank you.">Going out for lunch, thank you.</option>
                        </select>
<br><br>

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
                        
                        <label> <strong>Will you be attending church Sunday? </strong><br>
                            <span class="workshop"><input type="radio"  name="church" value="Yes" required>Yes</span> 
                            <span class="workshop"><input type="radio"  name="church" value="No">No </span>  </label> <br><br>


<input type="submit" value="Next" id="submit"><br><br>
<input type="hidden" name="action" value="walk3">
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
                    <input type="hidden" name="adminId" class="input" id="adminId" <?php if (isset($adminId)) {
                                                                                        echo "value = '$adminId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?> />
<br>
            <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script> 


var state1 = "<?php echo $_SESSION['clientData']['state'] ?>"; 
var state2 = "<?php echo $_SESSION['clientData']['state'] ?>"; 

if(state1 != "Utah"){ 
  county.value = " "; 
  county.style.display = "none";
  county1.style.display = "none";
}else{ 
  county.style.display = "visible";
  county1.style.display = "visible";

}

if(state2 != "Other"){ 
 country.style.display = "none";
  country1.style.display = "none";
}else{ 
country.style.display = "inline-block";
country1.style.display = "inline-block";
}


var state = document.getElementById('state'); 

var reg_form = document.querySelector('form');
reg_form.addEventListener('input', function (event) {
// Do something...

if(state.value != "Utah"){ 
   county.value = " "; 
   county.style.display = "none";
   county1.style.display = "none";
}else{ 
  county.style.display = "inline-block";
  county1.style.display = "inline-block";

}

if(state.value != "Other"){ 
   country.value = " "; 
   country.style.display = "none";
   country1.style.display = "none";
   zipcode.style.display = "inline-block"; 
   
}else{ 
  country.style.display = "inline-block";
  country1.style.display = "inline-block";
  zipcode.style.display = "none"; 

}


   // county.style.display = "visible";
   // county1.style.display = "visible";

});

</script> 

<?php
                   
                } else {
                    header('Location: /account/login');
                }
?>