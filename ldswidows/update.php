<?php
/*
 * Template Name: Update
 Template Post Type: Account
 */

/* other PHP code here */
session_start();
$_SESSION['loggedin'];

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
$_Session['check_KReg'];
$_SESSION['state'] = $_SESSION['clientData']['state'];
if (!$_SESSION['loggedin']) {

    $_SESSION['message'] = "You are currently not logged in, to update your account you need to be logged in. ";
    header("Location: /account/login");
}


get_header();
$userId = $_SESSION['userId'];
$clientData =  $_SESSION['clientData'];

?>




<div class="full-width-split">
        <div class="one-half" style="padding: 20px; ">
            <div class="container">


            </div>
           <br><br>
            <h5 class="heading1 heading2"> Need to Update your personal details? </h5>
            <p class="success">  
        <?php get_template_part('template-parts/content', 'messages'); ?>
         </p> 



            <form id="reg" action="/accounts1/index.php" method="post">
                <p class="padding t-left" style="color: red;"> *Note all fields are required </p>
                <?php get_template_part('template-parts/content', 'form'); ?>
                <div class="grid-3 full-width">
                    <button class="btn btn--accent_color btn--accent_color:hover t-center"> <a style="color: white; text-decoration: none;" href="/account/update">Submit Changes</a></button>
                    <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/account/profile">Profile Page</a></button>

                    <!--Add the action name - value pair -->
                    <input type="hidden" name="action" value="userUpdate">



                    <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                        echo "value = '$userId'";
                                                                                    } elseif (isset($_SESSION['clientData'])) {
                                                                                        echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                    } ?>> <br>
                </div>
            </form>

            <div>


                <h5 class="heading1 heading2" style="color: white;">Conferences You are Registered For</h5>
                <?php
                if ($_SESSION['remarried'] == "True") { ?>
                    <li><a class="nav-link" href="/conferences/remarried-conference/remarried-registration">Remarried Life</a></li>
                <?php }
                if ($_SESSION['idaho'] == "True") { ?>
                    <li><a class="nav-link" href="/conferences/idaho-regional-conference/idaho-registration">Idaho Regional Conference</a></li>
                <?php }
                if ($_SESSION['sanAntonio'] == "True") { ?>
                    <li><a class="nav-link" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio Registration</a></li>
                <?php  }
                if ($_SESSION['arizona'] == "True") { ?>
                    <li><a class="nav-link" href="/conferences/arizona-regional/arizona-registration">Arizona Registration</a></li>
                <?php
                } elseif ($_SESSION['arizona'] == "False" && $_SESSION['sanAntonio'] == "False") {  ?>
                    <p class="t-center headline--tiny"> You are not currently registered for any conferences. </p>
                <?php  } ?>

                <h5 class="heading1 heading2" style="color: white;">Open Registrations</h5>
                <?php if ($_SESSION['sanAntonio'] == "False" or $_SESSION['arizona'] == "False") {

                    if ($_SESSION['remarried'] == "False") { ?>

                        <!-- <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/conferences/remarried-conference/remarried-registration">Register for Remarried</a></button>
-->
                    <?php  }
                    if ($_SESSION['idaho'] == "False") { ?>
                        <!--   <button class="btn btn--blue btn--blue:hover t-center"><a text-decoration: none;" href="/conferences/idaho-regional-conference/idaho-registration">Register for Idaho</a></button>
-->
                    <?php  }
                    if ($_SESSION['sanAntonio'] == "False") { ?>
                        <button class="btn btn--blue:hover t-center" style="background-color: #722F37;"> <a style="color: white; text-decoration: none;" href="/conferences/san-antonio-regional/san-antonio-registration">San Antonio</a></button>

                    <?php   }
                    if ($_SESSION['arizona'] == "False") { ?>
                        <button class="btn btn--desert btn--desert:hover t-center"><a style="color: white; text-decoration: none;" href="/conferences/arizona-regional/arizona-registration">Arizona</a></button>

                <?php   }
                }  ?>
            </div> <br><br>
            <div class='one-half'>
                <button class="btn btn--dark-orange btn--dark-orange:hover t-center full-width"><a style="color: white; text-decoration: none;" href="/accounts1/index.php/?action=logout">Logout</a></button>
            </div>


        </div>

        <div class="one-half bye" style="background-image: url('/images/login_photo_shephard.webp'); background-repeat: no-repeat; background-size: cover; "></div>

    </div>
    <?php get_footer(); ?>


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






    <?php unset($_SESSION['message']); ?>