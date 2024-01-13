<?php
/*
 * Template Name: Confirm
 */

/* other PHP code here */
session_start();
if($_SESSION['step1'] === "True"){

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Account Details</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>
<?php get_header();
//var_dump($_SESSION['dataArray']); 
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
      
?>

<body>


     <main id="content" class="neve_main">
     <div class="trial">
            <div class="row_1"><div></div>
                <div id="sidebar">
                
                    <div>
                        <header class="btn">
                            Account Creation - Step 2
                            
                        </header>
                    
                    <p class="display" style="background-color: #fc9803;"> 
                    <?php if(isset($_SESSION['message_1'])){ 
                        echo $_SESSION['message_1']; 
                    }?> 
                    </p> 
                        <form action="/accounts/index.php" method="post">
                             <form action="../accounts/index.php" method="post">
                            <label>Email:</label><br>
                            <input type="email" class="input" name="userEmail" <?php if (isset($_SESSION['dataArray'])) {
                                                                                    echo "value=$userEmail";
                                                                                } ?> required><br><br>
                            <label>First Name:</label><br>
                            <input type="text" name="firstName" class="input" <?php if (isset($_SESSION['dataArray'])) {
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
                                <option value= ""><?php echo $state ; ?></option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
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
                            <select name="county" id="county" class="input" >
                                <option value=""><?php echo $county ; ?></option>
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
                                                                            } ?><br><br>
                            <label> Country (If you live outside the US): </label><br>
                            <input type="text" name="country" class="input" <?php if (isset($country)) {
                                                                                echo "value='$country'";
                                                                            } ?><br><br>
                            <label> Phone Number: </label><br>
                            <input type="tel" name="phone" class="input" pattern="\(?\d{3}\)?-? *\d{3}-? *-?\d{4}" <?php if (isset($phone)) {
                                                                                                                        echo "value='$phone'";
                                                                                                                    } ?>><br><br>
                            <label> Age: </label><br>
                            <select name="age" id="age" class="input">
                                <option value=""><?php echo $age ; ?></option>
                                <option value="20-29"> 20-29 </option>
                                <option value="30-39"> 30-39 </option>
                                <option value="40-49"> 40-49 </option>
                                <option value="50-59"> 50-59 </option>
                                <option value="60-69"> 60-69 </option>
                                <option value="70+"> 70+ </option>
                            </select> <br> <br>
                            <label> Gender </label> <br>
                            <input type="radio" id="male" name="gender" value="Male" <?=($gender == 'Male') ? 'checked' : ''?> required>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="Female" <?= ($gender == 'Female') ? 'checked' : ''?>>
                            <label for="female">Female</label><br><br>
                            <label> How long have you been widowed?  </label><br>
                            <select name="widowed" id="widowed" class="input"> 
                            <option value=""> <?php echo $widowed; ?></option> 
                                <option value="0-6 months"> 0-6 months </option>
                                <option value="6-12 months"> 6-12 months </option>
                                <option value="1-2 years"> 1-2 years </option>
                                <option value="2-3 years"> 2-3 years </option>
                                <option value="3-5 years"> 3-5 years </option>
                                <option value="5-7 years"> 5-7 years </option>
                                <option value="8 years or more"> 8 years or more </option>
                                <option value="Not Widowed myself"> Not widowed myself, but attending with a spouse who was widowed </option>
                            </select><br><br>
                            <label> How many conferences have you attended previously? </label><br>
                            <select name="conf" id="conf" class="input">
                                <option value=""><?php echo $conf ; ?></option>
                                <option value="first"> This will be my first </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
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
                         

                            <label>Please Enter a Username:</label><br>
                            <input type="text" class="input" name="userName" ></input><br>

                             <p class="display" style="color: red; margin-left: 5px;"> The password needs to be 8 characters long, contain at least 1 uppercase character, 1 number and 1 special character</p>
                           
                            <label>Password:</label><br>
                            <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                            
                            <label>Verify Password:</label><br>
                            <input type="password" class="input" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                           
                            <input type="submit" value="Create Account" name="submit" id="submit"><br><br>
                            <input type="hidden" name="level" value= 1>
                            <input type="hidden" name="verify" value= 1>
                            <!--Add the action name - value pair -->
                            <input type="hidden" name="action" value="confirm">
                             
</form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<footer id="page_footer">
    <?php get_footer(); ?>
</footer>

<?php }else{ 
    header("Location: /create-account"); 
} ?> 
