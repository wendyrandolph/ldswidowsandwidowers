<?php
/*
 * Template Name: SA_Reg
 Template Post Type: conference

/* other PHP code here */
session_start();
//echo "This is the SA reg page"; 
$_SESSION['success'];
$_SESSION['confId10'];
$_SESSION['conf10'];
//echo $_SESSION['confId3']; 
$_SESSION['manual'];
$confId3 = $_SESSION['confId10'];
$conf1 = $_SESSION['conf10'];
//echo $confId2; 
$manual = $_SESSION['manual'];
$_SESSION['userId'];
$_SESSION['remarried'];
$_SESSION['idaho'];
//$_SESSION['sanAntonio'];
$_SESSION['loggedin'];

$userId = $_SESSION['userId'];

//exit; 



$_SESSION['registr'] = "TRUE";
//var_dump($_SESSION['clientData']);

$clientData =  $_SESSION['clientData'];

get_header();

?>
<input type="hidden" id="sa" value="<?php echo $_SESSION['sanAntonio']; ?>" />
<div class="page-banner">
    <?php pageBanner();
    //Grab the parent Id to aide in the brcrumb 
    $theParent1 = wp_get_post_parent_id(); ?>
</div>

<div class="container page-section"> 
 <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <?php
            //Grab the parent Id to aide in the breadcrumb 
            $theParent1 = wp_get_post_parent_id();
            ?>

            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

        </p>
    </div>



 <div class="grid-container">
        <div>
    
            
            <?php
            if (($post->ID = 3462) and $_SESSION['sanAntonio'] == 'True') { ?>
                <h6 class="heading1"> Your Registration Details </h5>
                    <?php }
                if ($_SESSION['loggedin']) {
                    if (($post->ID = 3462) and $_SESSION['sanAntonio'] == 'False') {
                    ?>
                    <p class="success">There is no open registration for this conference.</p> 
                       
                       <!-- <h6 class="heading1">Conference Registration - Step 1</h5> -->
                        <p class="success">  
        <?php get_template_part('template-parts/content', 'messages'); ?>
         </p>
         <?php } ?> 
                       <!--   <form action="/users/index.php" method="post">
                                <?php chooseConf(); ?>
                                <button class="btn btn--blue" type="submit" name="submit" id="submit">Next</button><br><br>
                                <input type="hidden" name="level" value=1>
                                <!--Add the action name - value pair -->
                             <!--   <input type="hidden" name="action" value="step1">
                            </form> -->
                       
             <?php   }

                    ?> 



                  <?php
                    if (!$_SESSION['loggedin']) { ?>

                     <p class="success" style="padding: 10px;">There is not an open registration for this conference. </p>
                       
                     <!--     <h5 class="heading1">In order to register select one option below: </h5>
                        <?php get_template_part('template-parts/content', 'messages'); ?>
                        <form action="/accounts1/index.php" method="post">

                            <p class="t-left">If you have already created an account on this website, sign in to your account.</p><br>
                        <!--    <?php /* get_template_part('template-parts/login', 'form'); */ ?>
                                   
                        <!--    <button class="btn btn--blue float-left push-right" type="submit" name="submit" id="submit">Verify Account</button><br> <br>
                            <input type="hidden" name="action" value="Conf_Login_SA">


                        </form><br>
                        <hr> -->
                       <!-- <p class="t-left">2 -First time users create an account.</p>
                        <a class="btn btn--blue" href="/account/create-account">Create Account</a><br>
                        <hr> -->
                        <!--   <p class="t-left">3 - Register as a guest. ** No account will be created, but you will be able to register for the Arizona Conference. </p><br>

              <form action="/accounts1/index.php" method="post">

                    <button class="btn btn--blue" type="submit" id="submit">Guest Registration</button><br><br>
                    <input type="hidden" name="action" value="guest">
                    <input type="hidden" name="confId" value="10">
                </form> -->


                        <?php }
                    if ($post->ID == '3462') {
                      
                      /*  if ($_SESSION['sanAntonio'] == 'True') { ?>

                            <ul>

                                <?php echo $_SESSION['buildSA'];  ?>
                            </ul>
                    <?php } */
                    }

                    ?>

</div> 


                    <div class="page-links">
                        <?php get_template_part('template-parts/content', 'pagelinks'); ?>

                        <?php
                        if (($post->ID == '3462') and $_SESSION['sanAntonio'] == 'True') {
                        ?>
                            <h5 class="page-links__title"> Manage Registration </h5>
                            <li> <a name='update' href=' /users/index.php?action=SaUpdate&confId3=<?php echo $confId3 ?>'> Update My Registration </a></li>
                            <li> <a name="cancel" href=" /users/index.php?action=SaDelete&confId3=<?php echo $confId3 ?>"> Cancel My Registration </a></li>
                        <?php } ?>


                    </div> <!-- End of Page-links Div -->

</div> 
        </div>
    </div>

    <?php
    if ($_SESSION['remarried'] == 'True') { ?>
        <script>
            //grab the Select id 
            let remarried = "<?php echo $_SESSION['remarried']; ?>";
            let confR = document.querySelectorAll("conf1 , option");

            for (let i = 0; i < conf1.length; i++) {
                if (confR[i].value === "8") {
                    confR[i].disabled = true;
                } else {
                    confR[i].disable = false;
                }
            }
        </script>
    <?php }

    if ($_SESSION['idaho'] == 'True') { ?>
        <script>
            //grab the Select id 
            let remarried = "<?php echo $_SESSION['idaho']; ?>";
            let conf1 = document.querySelectorAll("conf1 , option");

            for (let i = 0; i < conf1.length; i++) {
                if (conf1[i].value === "7") {
                    conf1[i].disabled = true;
                } else {
                    conf1[i].disable = false;
                }
            }
        </script>

    <?php }

    if ($_SESSION['arizona'] == 'True') { ?>
        <script>
            //grab the Select id 
            let remarried = "<?php echo $_SESSION['arizona']; ?>";
            let conf1 = document.querySelectorAll("conf1 , option");

            for (let i = 0; i < conf1.length; i++) {
                if (conf1[i].value === "11") {
                    conf1[i].disabled = true;
                } else {
                    conf1[i].disable = false;
                }
            }
        </script>

    <?php }

    if ($_SESSION['sanAntonio'] == 'True') { ?>
        <script>
            //grab the Select id 
            let sanAntonio = "<?php echo $_SESSION['sanAntonio']; ?>";
            let conf1 = document.querySelectorAll("conf1 , option");

            for (let i = 0; i < conf1.length; i++) {
                if (conf1[i].value === "10") {
                    conf1[i].disabled = true;
                } else {
                    conf1[i].disable = false;
                }
            }
        </script>
    <?php }
    unset($_SESSION['success']);
    get_footer(); ?>