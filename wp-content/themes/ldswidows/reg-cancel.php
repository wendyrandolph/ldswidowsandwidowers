<?php
/*
 * Template Name: Cancel Registration
 Template Post Type: account
 */

/* other PHP code here */
session_start();
get_header();

$_SESSION['conf1'];
$_SESSION['conf2'];
$_SESSION['conf10'];
$_SESSION['conf11'];

$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];

$_SESSION['confId3'];
$confId3 = $_SESSION['confId3'];
$_SESSION['confId10'];
$_SESSION['confId11'];

$_SESSION['userId'];
$userId = $_SESSION['userId'];
$_SESSION['emailMessage'];
$_SESSION['cacheCancel'];
$_SESSION['remCancel']; 
$_SESSION['iCancel'];
$_SESSION['AzGCancel'];
$_SESSION['confName'];
$_SESSION['arizonaGuest_Id']; 
$arizonaGuest_Id = $_SESSION['arizonaGuest_Id'];
?>
<div class="page-banner">
    <?php
    pageBanner(array(
        'title' => $_SESSION['conf2']
    )); ?>
</div>

<div class="container container--narrow page-section">

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



    <?php if ($_SESSION['cacheCancel'] == "True") { ?>
        <div id="column">
            <header class="btn" style="text-align: center;"> <?php echo $_SESSION['conf1'] ?> </header>


            <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf1'] ?> ?</p>
            <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
            </p>

            <div class="reset">

                <a class="btn btn--blue" name="cancel" href="/users/index.php?action=del_confirm"> Yes, Delete Registration </a>
                <a class="submit_2" name="cancel" href=" /success"> I changed my mind </a>
                <a class="submit_2" name="cancel" href="/users/index.php?action=regUpdate"> Update Details </a>
            </div>
        </div>
    <?php } ?>

    <?php if ($_SESSION['knoxCancel'] == "True") { ?>
        <div id="column">
            <header class="btn" style="text-align: center;"> <?php echo $_SESSION['conf2'] ?> </header>


            <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                    echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf2'] ?> ?</p>
            <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
            </p>

            <div class="reset">

                <a class="submit_2" name="cancel" href="/users/index.php?action=knoxDelConf"> Yes, Delete Registration </a>
                <a class="submit_2" name="cancel" href=" /success"> I changed my mind </a>
                <a class="submit_2" name="cancel" href="/users/index.php?action=knoxUpdate"> Update Details </a>
            </div>
        </div>
    <?php
    }

    if ($_SESSION['remCancel'] == "True") { ?>


        <h5 class="heading1">Cancel Registration ? </h5>
        <div class="full-width-split">

            <div class="full-width-split__one">
                <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf2'] ?> ?</p>
                <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
                </p>
           
            <div>
               
                        <button class="btn btn--small btn--beige float-left push-right"> <a name="cancel" href="/users/index.php?action=RemDelConf&confId2=<?php echo $confId2 ?>"> Yes, Delete My Registration </a></button><br><br><br>
                        <button class="btn btn--small btn--beige float-left push-right"> <a name="cancel" href=" /conferences/remarried-conference/remarried-registration">  No, I changed my mind </a></button><br><br><br>
                        <button class="btn btn--small btn--beige float-left push-right"> <a name="cancel" href="/users/index.php?action=remUpdate&confId2=<?php echo $confId2 ?>"> Update my Registration Instead  </a></button><br><br>
                   
              
            </div>
</div> 

        </div>


    <?php }
    if ($_SESSION['iCancel'] == "True") { ?>


        <h5 class="heading1">Cancel Registration ? </h5>
        <div class="full-width-split">

            <div class="full-width-split__one">
                <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf1'] ?> ?</p>
                <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
                </p>

               
                    <button class="btn btn--beige float-left push-right"> <a name="cancel" href="/users/index.php?action=iDelConf&confId3=<?php echo $confId3 ?>"> Yes, Delete My Registration </a></button><br><br><br>
                    <button class="btn  btn--beige float-left push-right"> <a name="cancel" href=" /conferences/idaho-regional-conference/idaho-registration/"> No, I changed my mind </a></button><br><br><br>
                    <button class="btn  btn--beige float-left push-right"> <a name="cancel" href="/users/index.php?action=iUpdate&confId3=<?php echo $confId3 ?>">  Update my Registration Instead </a></button><br>
                
                
            </div>
        </div>
    <?php
    } 
    if ($_SESSION['SaCancel'] == "True") { 
    $confId3 = $_SESSION['confId10']; ?>

        <h5 class="heading1">Cancel Registration ? </h5>
        <div class="full-width-split">

            <div class="full-width-split__one">
                <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf10'] . " Conference" ?> ?</p>
                <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
                </p>

               
                    <div class="grid-5 full-width">
                    <button class="btn  btn--dark-orange full-width"> <a name="cancel" style="color:white; text-decoration:none;" href="/users/index.php?action=SaDelConf&confId3=<?php echo $confId3 ?>"> Delete My Registration</a></button>
                   <button class="btn full-width" style="background-color: #DC143C;"> <a name="cancel"  style="color:white; text-decoration:none;"  href=" /conferences/san-antonio-conference/san-antonio-registration/"> No, I changed my mind </a></button>
                     <button class="btn  btn--blue full-width" > <a name="cancel" style="color:white; text-decoration:none;"  href="/users/index.php?action=SaUpdate&confId3=<?php echo $confId3 ?>">  Update my Registration</a></button><br>
                </div> 
                
            </div>
        </div>
    <?php
    } 

     // Arizona Registration Cancel 
     if ($_SESSION['AzCancel'] == "True") { 
    $confId3 = $_SESSION['confId11']; ?>

        <h5 class="heading1">Cancel Registration ? </h5>
        <div class="full-width-split">

            <div class="full-width-split__one">
                <p class="alert"><?php if (isset($_SESSION['clientData'])) {
                                        echo $_SESSION['clientData']['firstName'] . " "  . $_SESSION['clientData']['lastName'];
                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['conf11'] . " Conference" ?> ?</p>
                <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
                </p>

               <div class="grid-5 full-width">
                    <button class="btn  btn--dark-orange full-width"> <a name="cancel" style="color:white; text-decoration:none;" href="/arizona/index.php?action=AZDelConf&confId3=<?php echo $confId3 ?>"> Delete My Registration </a></button>
                    <button class="btn full-width" style="background-color: #DC143C;"> <a name="cancel"  style="color:white; text-decoration:none;" href=" /conferences/arizona-conference/arizona-registration/"> No, I changed my mind </a></button>
                    <button class="btn  btn--blue full-width" > <a name="cancel" style="color:white; text-decoration:none;" href="/arizona/index.php?action=AZUpdate&confId3=<?php echo $confId3 ?>">  Update my Registration</a></button><br>
                </div> 
                
            </div>
        </div>
    <?php
    } 
    // Arizona Guest Registration Cancel 
      if ($_SESSION['AzGCancel'] == "True") { 
          $_SESSION['getRegData'];
       
          
        $confId3 = $_SESSION['confId']; ?>

        <h5 class="heading1">Cancel Registration ? </h5>
        <div class="full-width-split">

            <div class="full-width-split__one">
                <p class="alert"><?php if (isset($_SESSION['getRegData'])) {
                                        echo $_SESSION['getRegData'][0]['firstName'] . " "  . $_SESSION['getRegData'][0]['lastName'];
                                    } ?>, Are you sure you want to cancel your registration for the <?php echo $_SESSION['confName'] . " Conference" ?> ?</p>
                <p class="display">**This action CAN NOT BE reversed, unless you go through the registration process again.
                </p>

               <div class="grid-5 full-width">
                    <button class="btn  btn--dark-orange full-width" name="delete"> <a style="color:white; text-decoration:none;" href="/arizona/index.php?action=AZGDelConf&confId3=<?php echo $confId3 ?>"> Delete Registration </a></button>
                    <button class="btn full-width" style="background-color: #DC143C;"> <a style="color:white; text-decoration:none;" href="https://staging16.ldswidowsandwidowers.com/arizona/index.php?action=arizonaGuest&arizonaGuest_Id='<?php echo $arizonaGuest_Id ?>'&confId=11'">Cancel </a></button><br><br><br>
                   </div> 
                
            </div>
        </div>
    <?php
    } ?>
    
    </div>
<?php
get_footer(); ?>





<?php

unset($_SESSION['message_1']);
unset($_SESSION['success']); ?>