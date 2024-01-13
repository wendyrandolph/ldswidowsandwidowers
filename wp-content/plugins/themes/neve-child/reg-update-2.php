<?php
/*
 * Template Name: regUpdate2
 */

/* other PHP code here */
session_start();
$_SESSION['regUp_3'];
$_SESSION['conf1'];
$conf1 =  $_SESSION['conf1'];
$_SESSION['userId'];
$userId = $_SESSION['userId'];
$_SESSION['confDetails_All'];
$confDetails_All = $_SESSION['confDetails_All'];

//var_dump($confDetails_All); 
//exit; 

$topic1 = $confDetails_All[0]['topic1'];
$topic2 = $confDetails_All[0]['topic2'];
$topic3 = $confDetails_All[0]['topic3'];
$topic4 = $confDetails_All[0]['topic4'];
$topic5 = $confDetails_All[0]['topic5'];
$topic6 = $confDetails_All[0]['topic6'];
$topic7 = $confDetails_All[0]['topic7'];
$topic8 = $confDetails_All[0]['topic8'];
$topic9 = $confDetails_All[0]['topic9'];
$topic10 = $confDetails_All[0]['topic10'];
$topic11 = $confDetails_All[0]['topic11'];

//echo $topic3; 
//exit; 
if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}

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

//echo $_SESSION['part3']; 
// exit; 

if ($_SESSION['regUp_3']  === "TRUE") {

?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conference Registration Update Part 2</title>

        <script type="text/javascript" src=" /library/account.js"></script>
        <link rel="stylesheet" href="  /style.css" media="screen">
    </head>

    <body>

        <?php get_header();
        $userId = $_SESSION['userId'];
        $clientData =  $_SESSION['clientData'];
        ?>


        <main id="content" class="neve_main">
            <div class="trial">
                <div class="row_2">
                    <div>
                        <!-- Empty column space holder -->
                    </div>
                    <div id="sidebar">
                        <header class="btn">
                            <?php echo $conf1 ?> - Step 3
                        </header>
                    </div>

                    <!-- div  is for styling purposes only -->

                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }
                    ?>
                </div><br>

                <form id="myForm" action="../users/index.php" method="post">

                    <fieldset>
                        <legend for="topic" style="color: white; font-weight: 400;"> Please choose 3 classes you would be interested in attending.
                            This will help us schedule locations, and help determine if it needs to be offered more than once. This is not a commitment to attend and you can change your mind the day of. </legend> <br>

                        <p class=" align" style="background: whitesmoke; color: var(--first_color);"> If you need to change your selection, uncheck a current topic, and select a new topic. </p>
                        <p id="invalid" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>


                        <span class="mobile"><input type="checkbox" id="topic1" name="topic1" class="topic" <?php if (isset($topic1)) {
                                                                                                                echo "value = '1' checked='checked' ";
                                                                                                            } elseif (!isset($topic1)) {
                                                                                                                echo 'value="' . 1 . '" "';
                                                                                                            } ?> onclick=" return limitFunc();">
                            <label class="align" for="topic1">Understanding Your Patriarchal Blessing</label></span><br>

                        <span class="mobile"> <input type="checkbox" id="topic2" name="topic2" class="topic" <?php if (isset($topic2)) {
                                                                                                                    echo "value = '2' checked='checked' ";
                                                                                                                } elseif (!isset($topic2)) {
                                                                                                                    echo 'value="' . 2 . ' " " ';
                                                                                                                } ?> onclick=" return limitFunc();">
                            <label class="align" for="topic2">Mending What is Broken. A Focus on Improving Mental and Emotional Well-Being</label></span><br>

                        <span class="mobile"><input type="checkbox" id="topic3" name="topic3" class="topic" <?php if (isset($topic3)) {
                                                                                                                echo "value = '3' checked='checked'";
                                                                                                            } elseif (!isset($topic3)) {
                                                                                                                echo 'value="' . 3 . '"" ';
                                                                                                            } ?> onclick=" return limitFunc();">

                            <label class="align" for="topic3">Moving Forward - My Way or God's Way</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic4" name="topic4" class="topic" <?php if (isset($topic4)) {
                                                                                                                        echo "value = '4' checked='checked'";
                                                                                                                    } elseif (!isset($topic4)) {
                                                                                                                        echo 'value="' . 4 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">

                                <label class="align" for="topic4">Handling Compounded Grief</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic5" name="topic5" class="topic" <?php if (isset($topic5)) {
                                                                                                                        echo "value = '5' checked='checked'";
                                                                                                                    } elseif (!isset($topic5)) {
                                                                                                                        echo 'value="' . 5 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">

                                <label class="align" for="topic5">How to Keep Your Faith When You Have Lost So Much</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic6" name="topic6" class="topic" <?php if (isset($topic6)) {
                                                                                                                        echo "value = '6' checked='checked'";
                                                                                                                    } elseif (!isset($topic6)) {
                                                                                                                        echo 'value="' . 6 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">

                                <label class="align" for="topic6">Happily Single 'Til Your Happily Ever After – A Dating Class</label></span><br>
                            <span class="mobile"><input type="checkbox" id="topic7" name="topic7" class="topic" <?php if (isset($topic7)) {
                                                                                                                    echo "value = '7' checked='checked'";
                                                                                                                } elseif (!isset($topic7)) {
                                                                                                                    echo 'value="' . 7 . '"" ';
                                                                                                                } ?> onclick=" return limitFunc();">
                                <label class="align" for="topic7">Time Management, Organization, and Widow Fog, Oh My! Helping Your Brain WORK</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic8" name="topic8" class="topic" <?php if (isset($topic8)) {
                                                                                                                        echo "value = '8' checked='checked'";
                                                                                                                    } elseif (!isset($topic8)) {
                                                                                                                        echo 'value="' . 8 . '"" ';
                                                                                                                    } ?>onclick=" return limitFunc();">
                                <label class="align" for="topic8">Finances in Widowhood</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic9" name="topic9" class="topic" <?php if (isset($topic9)) {
                                                                                                                        echo "value = '9' checked='checked' ";
                                                                                                                    } elseif (!isset($topic9)) {
                                                                                                                        echo 'value="' . 9 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">
                                <label class="align" for="topic9">Emotional Self Care: When to Say "No!" and When to Leap in Faith</label></span><br>
                            <span class="mobile"> <input type="checkbox" id="topic10" name="topic10" class="topic" <?php if (isset($topic10)) {
                                                                                                                        echo "value = '10' checked='checked'";
                                                                                                                    } elseif (!isset($topic10)) {
                                                                                                                        echo 'value="' . 10 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">
                                <label class="align" for="topic10">Thriving through widowhood: How to create the life you want</label></span><br>
                            <span class="mobile"><input type="checkbox" id="topic11" name="topic11" class="topic" <?php if (isset($topic11)) {
                                                                                                                        echo "value = '11' checked='checked'";
                                                                                                                    } elseif (!isset($topic11)) {
                                                                                                                        echo 'value="' . 11 . '"" ';
                                                                                                                    } ?> onclick=" return limitFunc();">
                                <label class="align" for="topic11">Parenting Through Grief</label></span><br>


                            <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                                                    echo "value = '$userId'";
                                                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                                                    echo ' value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                                                } ?>> <br>
                                <div class="formHandling">
                                    <button class="updatebtn" type="reset">Reset</button>
                                    <button class="updatebtn" type="submit" value="Next">Next</button><br><br>
                                    <input type="hidden" name="action" value="regUpdate_3">
                                </div>
                    </fieldset>
                    <!--<input type="submit" value="Reset Form" id="reset" onclick="reset()"><br><br>-->
                </form>

            </div>
            </div>
            </div>
        </main>

        <script text="text/javascript">
            function reset() {
                document.getElementById('#myForm').reset();
            }
        </script>
    </body>

<?php } else {
    header("location: /profile");
} ?>