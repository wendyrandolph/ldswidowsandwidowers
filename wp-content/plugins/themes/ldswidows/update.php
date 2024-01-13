<?php
/*
 * Template Name: Update
 */

/* other PHP code here */
session_start();


$_SESSION['userId'];
$userId = $_SESSION['userId'];

$_SESSION['conf1'];
//echo $_SESSION['conf1']; 
//exit; 
$_SESSION['confId'];
$_SESSION['conf2'];
$_SESSION['confId2'];
$_SESSION['knox'];


$url = "href='/users/index.php?action=cache'";
$_SESSION['url'] = $url;

$url2 = "href='/users/index.php?action=knox'";
$_SESSION['url2'] = $url2;




get_header();
$_Session['check_KReg'];

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
    $_SESSION['idle'] = "You have been logged out.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Update</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
    <script src=" /library/account.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <?php get_header();
    $userId = $_SESSION['userId'];
    $clientData =  $_SESSION['clientData'];

    ?>


      <body>
        <main id="content" class="neve_main">
            <div class="row_2">
                <div> </div>

                <?php if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                } ?>

                <div></div>
            </div>
<div class="row_3">
            <div> </div>


            <div id="myAdminNav" class="adminNav">
                <!--    <?php
                        if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 
-->
                <?php
                if ($_SESSION['loggedin'] == 1) { ?>
                <a class="adminBtn  active" aria-current="page"  href="/update">Update Account</a>
                    <a class="adminBtn" href="/profile">Profile</a> 
                    
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                <?php  }

                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <a class="adminBtn" href="/reports/index.php?action=reports"> Admin Page </a>
                <?php } ?>
                <?php if ($_SESSION['knox'] === "False") { ?>
                    <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
                <?php } else { ?>
                    <a class="adminBtn" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                <?php if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>
                <?php   } ?>

            </div>
        </div>
            <div class="row_2">
            <header class="btn"> Need to Update your personal details? </header> 
                    <!-- div  is for styling purposes only --></div>
                    <p class="display"> *Note all fields are required </p>
                        <?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                        }
                        ?>
            <form action="/accounts/index.php" method="post">
            
                <label>First Name:</label> <br>
                <input type="text" name="firstName" class="input" id="firstName" placeholder="New First Name" required <?php if (isset($firstName)) {
                                                                                                                            echo "value = '$firstName'";
                                                                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                                                                            echo 'value="' . $_SESSION['clientData']['firstName'] . '" ';
                                                                                                                        } ?>> <br>
                <label>Last name:</label> <br>
                <input type="text" name="lastName" class="input" id="lastName" placeholder="New Last Name" required <?php if (isset($lastName)) {
                                                                                                                        echo "value = '$lastName'";
                                                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                                                        echo 'value="' . $_SESSION['clientData']['lastName'] . '" ';
                                                                                                                    } ?>><br>
                <label>Email:</label>  <br>
                <input type="email" name="userEmail" class="input" id="userEmail" placeholder="New User Email" required <?php if (isset($userEmail)) {
                                                                                                                            echo "value = '$userEmail'";
                                                                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                                                                            echo 'value="' . $_SESSION['clientData']['userEmail'] . '" ';
                                                                                                                        } ?>> <br>
                <label>Address:</label> <br>
                <input type="text" name="address" class="input" id="address" placeholder="New Home Address" required <?php if (isset($address)) {
                                                                                                                            echo "value = '$address'";
                                                                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                                                                            echo 'value="' . $_SESSION['clientData']['address'] . '" ';
                                                                                                                        } ?>> <br>
                <label>City:</label> <br>
                <input type="text" name="city" class="input" id="city"  required <?php if (isset($city)) {
                                                                                        echo "value = '$city'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientData']['city'] . '" ';
                                                                                    } ?>> <br>
                <label for="state">State:  </label> <br>                                                                                        
                 <select name="state" id="state" class="input" >
                <option value=<?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['state'];
                                } ?>> <?php echo $_SESSION['clientData']['state'] ?></option>
                <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas"> Arkansas</option>
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
                <input type="text" name="zipcode" class="input" id="zipcode" <?php if (isset($zipcode)) {
                                                                                    echo "value = '$zipcode'";
                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                    echo 'value="' . $_SESSION['clientData']['zipcode'] . '" ';
                                                                                } ?>> <br>

                
                <label for="county">County, if you live in Utah:</label> <br> 
               <input type="text" name="county" class="input" id="county"   <?php if (isset($county)) {
                                                                                        echo "value = '$county'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientData']['county'] . '" ';
                                                                                    } ?>> <br>

                        <label>Country, if you live outside the US:</label> <br>
                        <input type="text" name="country" class="input" id="country" placeholder="New Country" <?php if (isset($country)) {
                                                                                                                    echo "value = '$country'";
                                                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                                                    echo 'value="' . $_SESSION['clientData']['country'] . '" ';
                                                                                                                } ?>><br><br>

                        <label>Phone:</label> <br>
                        <input type="tel" name="phone" class="input" id="phone" placeholder="New phone number" <?php if (isset($phone)) {
                                                                                                                    echo "value = '$phone'";
                                                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                                                    echo 'value="' . $_SESSION['clientData']['phone'] . '" ';
                                                                                                                } ?>><br>

                        <label>Age: </label> <br>
                        <select name="age" id="age"><br>
                            <option value="<?php if (isset($_SESSION['clientData'])) {
                                                echo $_SESSION['clientData']['age'];
                                            } ?>"> <?php echo $_SESSION['clientData']['age'] ?></option>
                            <option value="20-29"> 20-29 </option>
                            <option value="30-39"> 30-39 </option>
                            <option value="40-49"> 40-49 </option>
                            <option value="50-59"> 50-59 </option>
                            <option value="60-69"> 60-69 </option>
                            <option value="70+"> 70+ </option>
                        </select> <br> <br>

                        <label id="gender">Gender: </label> <br>

                        <input type="radio" id="male" name="gender" value="Male" <?php echo ($_SESSION['clientData']['gender'] == "Male" ? 'checked="checked"' : ''); ?>>
                        <label for="male" class="gender"> Male </label>
                        <input type="radio" id="female" name="gender" value="Female" <?php echo ($_SESSION['clientData']['gender'] == "Female" ? 'checked="checked"' : ''); ?>>
                        <label for="female" class="gender">Female</label> <br><br>




                        <label for="widowed">How long have you been widowed?:</label><br>
                        <select name="widowed" id="widowed">
                            <option value="<?php if (isset($_SESSION['clientData'])) {
                                                echo $_SESSION['clientData']['widowed'];
                                            } ?>"> <?php echo $_SESSION['clientData']['widowed'] ?></option>
                            <option value="0-6 Months">0-6 Months</option>
                            <option value="6-12 Months">6-12 Months</option>
                            <option value="1-2 Years">1-2 Years </option>
                            <option value="2-3 Years">2-3 Years </option>
                            <option value="3-5 Years">3-5 Years </option>
                            <option value="5-7 Years">5-7 Years</option>
                            <option value="8 years or more">8 years or more </option>
                            <option value="Not widowed myself, but married to someone who is widowed"> Not widowed myself, but married to someone who is widowed </option>
                        </select> <br><br>

                        <label for="conf"> How many conferences have you attended previously? </label>
                        <select name="conf" id="conf">
                            <option value="<?php if (isset($_SESSION['clientData'])) {
                                                echo $_SESSION['clientData']['conf'];
                                            } ?>"><?php echo $_SESSION['clientData']['conf'] ?> </option>
                            <option value="This will be my first"> This will be my first </option>
                            <option value="1"> 1 </option>
                            <option value="2"> 2 </option>
                            <option value="3"> 3 </option>
                            <option value="4 or more"> 4 or more </option>
                        </select><br><br>

                        <input type="submit" value="Update Information" id="submit"><br><br>
                        <!--Add the action name - value pair -->
                        <input type="hidden" name="action" value="userUpdate">
                        
                        
                        
                        <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                            echo "value = '$userId'";
                                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                                            echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                        } ?>> <br>
                        </form>





                    </div>
                </div>
                <div>

                </div>
            </div>
    </main>
        <footer id="page_footer">
            <?php get_footer(); ?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="  /style.css" media="screen">
        <script type="text/javascript" src=" /library/account.js"></script>

    </body>


    </html>
    <?php unset($_SESSION['message']); ?>