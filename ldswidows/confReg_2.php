<?php
/*
 * Template Name: confReg_2
 * Template Post Type: account
 */

/* other PHP code here */
session_start();
if ($_SESSION['part2'] === "TRUE") {
    $_SESSION['clientData'];
    $_SESSION['conf1'];
    $_SESSION['confId'];
    $confId = $_SESSION['confId'];
    $conf1 = $_SESSION['conf1'];
    //echo $confId; 
    //exit; 

    //var_dump($_SESSION['clientData']); 
    //exit; 
    $userId = $_SESSION['clientData']['userId'];
    $userName = $_SESSION['clientData']['userName'];
    $firstName = $_SESSION['clientData']['firstName'];
    $lastName = $_SESSION['clientData']['lastName'];
    $userEmail = $_SESSION['clientData']['userEmail'];
    $address = $_SESSION['clientData']['address'];
    $city = $_SESSION['clientData']['city'];
    $state = $_SESSION['clientData']['state'];
    $county  = $_SESSION['clientData']['county'];
    $zipcode = $_SESSION['clientData']['zipcode'];
    $country = $_SESSION['clientData']['country'];
    $phone = $_SESSION['clientData']['phone'];
    $age = $_SESSION['clientData']['age'];
    $gender = $_SESSION['clientData']['gender'];
    $widowed = $_SESSION['clientData']['widowed'];
    $conf = $_SESSION['clientData']['conf'];
    //echo $userName; 
    //exit; 

    //echo $level, $verify; exit; 
    get_header();

 ?>
<div class="page-banner" style="background-color: white;">
<?php pageBanner(array(
    'title' => " "
)); ?>


</div>
<div>

                <? if($_SESSION['guestConf'] == "True"){ ?>
                    <h5 class="heading1 heading2 t-center" style="margin-top: 30px;"><?php echo $conf1; ?> Guest Conference Registration - Step 2 </h5>
                <?php } else { ?>

                 <h5 class="heading1  t-center" style="margin-top: 30px;"><?php echo $conf1; ?> Conference Registration - Step 2 </h5>
<?php } ?>

<div> 
<div class="container page-section">


       <p class="success">  
        <?php get_template_part('template-parts/content', 'messages'); ?>
         </p> 
            <form class="step2" action="/users/index.php" method="post">
                <p class="display"> Please confirm the details that we have for you, if anything needs to be updated, please fix it and click the "Submit" button at the bottom. </p>
                <p class="display"> *Note all fields are required </p>


                    <?php  get_template_part('template-parts/content', 'form'); ?>
           
<div class="grid-3 ">
                <button class="btn btn--accent_color btn--accent_color:hover" type="submit" id="submit">Next</button>
                <button class="btn btn--blue btn--blue:hover t-center"><a style="color: white; text-decoration: none;" href="/account/profile">View Profile</a></button>

                <!--Add the action name - value pair -->
                <input type="hidden" name="action" value="step2">
                <input type="hidden" name="userName" <?php if (isset($userName)) {
                                                            echo "value = '$userName'";
                                                        } elseif (isset($_SESSION['clientData'])) {
                                                            echo 'value="' . $_SESSION['clientdata']['userName'] . '"';
                                                        } ?>>
                <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                                    echo "value = '$userId'";
                                                                                } elseif (isset($_SESSION['clientData'])) {
                                                                                    echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                                } ?>>
                <input type="hidden" name="confId" class="input" id="confId" <?php if (isset($confId)) {
                                                                                    echo "value= '$confId'";
                                                                                } elseif (isset($_SESSION['confId'])) {
                                                                                    echo 'value="' . $_SESSION['confId'] . '"';
                                                                                } ?>>
                <input type="hidden" name="conf1" class="input" id="conf1" <?php if (isset($conf1)) {
                                                                                echo "value= '$conf1'";
                                                                            } elseif (isset($_SESSION['conf1'])) {
                                                                                echo 'value="' . $_SESSION['conf1'] . '"';
                                                                            } ?>>

            </form>
        </div>
</div> 
       
 </div>

    <?php get_footer(); ?>

    <script>
        var d = new Date();
        var today = new Date("April 20, 2023");
        //let day = today.getDate(); 
        if (d.getDate() <= today) { //6 is saturday
            //grab the Select id 

            let conf1 = document.querySelectorAll("conf1 , option");

            for (let i = 0; i < conf1.length; i++) {
                if (conf1[i].value === "6") {
                    conf1[i].disabled = true;
                } else {
                    conf1[i].disable = false;
                }
            }
        }
    </script>

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
    header('location: /account/profile');
} ?>



<!---   Original Content is Below ---->