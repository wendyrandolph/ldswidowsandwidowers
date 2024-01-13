<?php
/*
 * Template Name: Registration
 */

/* other PHP code here */
session_start();
if($_SESSION['step1_1'] === "True"){
$firstName = $_SESSION['firstName']; 
$lastName = $_SESSION['lastName']; 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Registration</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>
<?php get_header();
?>

<body>
<div class="row_3">
        <div></div>
        <div>
            <h3 id="title">
                <?php
                if (isset($_SESSION['clientData']))
                    echo "Welcome " . $firstName . ' ' . $lastName; ?>
            </h3>
        </div>
    </div>
    <div class="row_3" >
        <p class="success"> <?php
            if (isset($_SESSION['idle'])) {
                echo $_SESSION['idle'];
            }
            if (isset($_SESSION['message_1'])) {
                echo $_SESSION['message_1'];
            }
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
            }
            if (isset($_SESSION['emailMessage'])) {
                echo $_SESSION['emailMessage'];
            } ?>
            </p>
        </div> 

    <main id="content" class="neve_main">
     <div class="trial">
            <div class="row_1">
            <div>
         
            </div>
                <div id="sidebar">
                    <header class="btn">
                        Create an account - Step 1
                    </header>
                    <!-- div  is for styling purposes only -->
                        <p class="display"> *Note all fields are required </p>
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                        }
                        ?>

                         <form action="../accounts/index.php" method="post">
                            <label>Email:</label><br>
                            <input type="email" class="input" name="userEmail" <?php if (isset($_SESSION['userEmail'])) {
                                                                                    echo "value='$_SESSION[userEmail]'";
                                                                                } ?> required><br><br>
                            <label>First Name:</label><br>
                            <input type="text" name="firstName" class="input" <?php if (isset($firstName)) {
                                                                                    echo "value='$firstName'";
                                                                                }  ?> required><br><br>
                            <label>Last Name:</label><br>
                            <input type="text" name="lastName" class="input" <?php if (isset($lastName)) {
                                                                                    echo "value='$lastName'";
                                                                                } ?> required><br><br>
                            <label> Home Address: </label><br>
                            <input type="text" name="address" class="input" <?php if (isset($address)) {
                                                                                echo "value='$address'";
                                                                            } ?> required><br><br>
                            <label> City: </label><br>
                            <input type="text" name="city" class="input" <?php if (isset($city)) {
                                                                                echo "value='$city'";
                                                                            } ?> required><br><br>
                            <label for="state"> State: </label> <br>
                            <select name="state" id="state" class="input">
                                <option value="">--Please choose an option--</option>
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
                            </select> <br><br>
                            <label for="county"> County (If you live in Utah):</label><br>
                            <select name="county" id="county" class="input">
                                <option value=""> --Please choose an option--</option>
                                <option value="Beaver">Beaver</option>
                                <option value="Box Elder">Box Elder</option>
                                <option value="Cache">Cache</option>
                                <option value="Carbon">Carbon</option>
                                <option value="Daggett">Daggett</option>
                                <option value="Davis">Davis</option>
                                <option value="Duchesne">Duchesne</option>
                                <option value="Emery">Emery</option>
                                <option value="Garfield">Garfield</option>
                                <option value="Grand">Grand</option>
                                <option value="Iron">Iron</option>
                                <option value="Juab">Juab</option>
                                <option value="Kane">Kane</option>
                                <option value="Millard">Millard</option>
                                <option value="Morgan">Morgan</option>
                                <option value="Piute">Piute</option>
                                <option value="Rich">Rich</option>
                                <option value="Salt Lake">Salt Lake</option>
                                <option value="San Juan">San Juan</option>
                                <option value="Sanpete">Sanpete</option>
                                <option value="Sevier">Sevier</option>
                                <option value="Summit">Summit</option>
                                <option value="Tooele">Tooele</option>
                                <option value="Uintah">Uintah</option>
                                <option value="Utah">Utah</option>
                                <option value="Wasatch">Wasatch</option>
                                <option value="Washington">Washington</option>
                                <option value="Wayne">Wayne</option>
                                <option value="Weber">Weber</option>
                            </select><br><br>
                            <label> Zipcode: </label><br>
                            <input type="text" name="zipcode" class="input" <?php if (isset($zipcode)) {
                                                                                echo "value='$zipcode'";
                                                                            } ?>><br><br>
                            <label> Country (If you live outside the US): </label><br>
                            <input type="text" name="country" class="input" <?php if (isset($country)) {
                                                                                echo "value='$country'";
                                                                            } ?>><br><br>
                            <label> Phone Number: </label><br>
                            <input type="tel" name="phone" class="input" pattern="\(?\d{3}\)?-? *\d{3}-? *-?\d{4}" <?php if (isset($phone)) {
                                                                                                                        echo "value='$phone'";
                                                                                                                    } ?>><br><br>
                            <label> Age: </label><br>
                            <select name="age" id="age" class="input" required>
                                <option value="">--Please choose an option--</option>
                                <option value="20-29"> 20-29 </option>
                                <option value="30-39"> 30-39 </option>
                                <option value="40-49"> 40-49 </option>
                                <option value="50-59"> 50-59 </option>
                                <option value="60-69"> 60-69 </option>
                                <option value="70+"> 70+ </option>
                            </select> <br> <br>
                            <label> Gender: </label> <br>
                            <input type="radio" id="male" name="gender" value="Male" required>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label for="female">Female</label><br><br>
                            <label for="widowed">How long have you been widowed?:</label> 
                 <select name="widowed" id="widowed" class="input" required> 
                 <option value=""> --Please Select An Option -- </option>
                 <option value="0-6 Months">0-6 Months</option>
                 <option value="6-12 Months">6-12 Months</option>
                 <option value="1-2 Years">1-2 Years </option>
                 <option value="2-3 Years">2-3 Years </option>
                 <option value="3-5 Years">3-5 Years </option>
                 <option value="5-7 Years">5-7 Years</option>
                 <option value="8 years or more">8 years or more </option>
                 <option value="Not widowed myself, but married to someone who is widowed"> Not widowed myself, but married to someone who is widowed </option> 
                 </select> <br><br>
                            <label> How many conferences have you attended previously? </label><br>
                            <select name="conf" id="conf" class="input">
                                <option value="">--Please Select An Option--</option>
                                <option value="first"> This will be my first </option>
                                <option value="1 Prior"> 1 Prior</option>
                                <option value="2 Prior"> 2 Prior</option>
                                <option value="3 Prior"> 3 Prior </option>
                                <option value="4 or more"> 4 or more </option>
                            </select><br><br>
                            <!--<label> Name of an emergency contact? </label><br>
                 <input type="text" name="emergency" class="input" <?php if (isset($emergency)) {
                                                                        echo "value='$emergency'";
                                                                    } ?> ><br>
                 <label> Phone number for your emergency contact? </label><br>
                 <input type="tel" name="emer_phone" class="input" <?php if (isset($emer_phone)) {
                                                                        echo "value='$emer_phone'";
                                                                    } ?> ><br><br>-->
                            <!-- <span> The password needs to be 8 characters long, <br> contain at least 1 uppercase character, 1 number and 1 special character</span> <br>
                            <label>Password:</label><br>
                            <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                            <label>Confirm Password:</label><br>
                            <input type="password" class="input" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                           -->
                            <input type="submit" value="Next" name="submit" id="submit"><br><br>
                            <input type="hidden" name="level" value=1>
                            <!--Add the action name - value pair -->
                            <input type="hidden" name="action" value="register">
                        </form>




                    </div>
                </div>
                <div>

                </div>
            </div>
    </main>

</body>
<footer id="page_footer">
    <?php get_footer(); ?>
</footer>

<?php } else { 
    header("location: /profile"); 
}