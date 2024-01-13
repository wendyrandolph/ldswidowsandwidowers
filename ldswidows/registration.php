<?php
/*
 * Template Name: Registration
 * Template Post Type: account
 */

/* other PHP code here */
session_start();
$_SESSION['confId'];

if ($_SESSION['step1_1'] === "True") {
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];

    get_header(); ?>
 <div class="page-banner">
   <?php if ($_SESSION['guestAZ'] == "True") { ?>
       
        <?php pageBanner(array(
            'title' => "Guest Registration"
        ));
    } else {
        pageBanner();
    } ?>
        </div>

        <div class="container container--narrow page-section">


            <?php if ($_SESSION['guestAZ'] === "True") { ?>
                <h5 class="heading1">Guest Registration - Step 1</h5>
            <?php } else { ?>
                <h5 class="heading1">Create an account - Step 1 </h5>
            <?php } ?>
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
            <div class="row_3">
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





            <!-- div  is for styling purposes only -->
            <p class="display"> *Note all fields are required </p>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>

            <form action="/accounts1/index.php" method="post">
                <?php get_template_part('template-parts/content', 'form'); ?>
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

                <?php if ($_SESSION['guestConf'] == "True") { ?>
                    <button class="btn btn--blue " type="submit" name="submit">Next </button>
                    <input type="hidden" name="level" value=1>
                    <input type="hidden" name="confId" value=11>
                    <input type="hidden" name="action" value="guest_register">
                <?php } else { ?>
                    <button class="btn btn--blue" type="submit" value="Next" name="submit" id="submit">Next2</button><br><br>
                    <input type="hidden" name="level" value=1>
                    <!--Add the action name - value pair -->
                    <input type="hidden" name="action" value="confirm">

                <?php } ?>


            </form>



        </div>
        </div>
        <script>
            var state1 = "<?php echo $_SESSION['clientData']['state'] ?>";
            var state2 = "<?php echo $_SESSION['clientData']['state'] ?>";

            if (state1 != "Utah") {
                county.value = " ";
                county.style.display = "none";
                county1.style.display = "none";
            } else {
                county.style.display = "visible";
                county1.style.display = "visible";

            }

            if (state2 != "Other") {
                country.style.display = "none";
                country1.style.display = "none";
            } else {
                country.style.display = "inline-block";
                country1.style.display = "inline-block";
            }


            var state = document.getElementById('state');

            var reg_form = document.querySelector('form');
            reg_form.addEventListener('input', function(event) {
                // Do something...

                if (state.value != "Utah") {
                    county.value = " ";
                    county.style.display = "none";
                    county1.style.display = "none";
                } else {
                    county.style.display = "inline-block";
                    county1.style.display = "inline-block";

                }

                if (state.value != "Other") {
                    country.value = " ";
                    country.style.display = "none";
                    country1.style.display = "none";
                    zipcode.style.display = "inline-block";

                } else {
                    country.style.display = "inline-block";
                    country1.style.display = "inline-block";
                    zipcode.style.display = "none";

                }


                // county.style.display = "visible";
                // county1.style.display = "visible";

            });
        </script>

    <?php get_footer();
    unset($_SESSION['message_1']);
} else {
    header("location: /account/profile");
}
