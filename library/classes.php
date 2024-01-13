<?php //live site 
//var_dump($_SESSION['loggedin']); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
// Get the functions library
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/arizona_model.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/model/stGeorge_model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mailer.php');

function last_Activity(){ 
    //echo $_SESSION['loggedin'];
   // Check if last activity was set
    $_SESSION['time'] = time(); 
    $_SESSION['logoutTime'] = 3700; 
    
    if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $_SESSION['logoutTime']) {
        // last request was more than 15 minutes ago
        session_unset(); // unset $_SESSION variable for the run-time
        session_destroy(); // destroy session data in storage
        //session_start();
        $_SESSION['loggedin'] = false;
        header("Location: /account/login"); // redirect to login page
    }
    $_SESSION['last_activity'] = time(); // update last activity time stamp
}
function walkinIdaho(){ 
    
            $getRegData = isRegisteredIDWData();
            $buildIdAdditionalRegs = IdahoWalkinConf($getRegData);
            //var_dump($buildIdAdditionalRegs); 
           //exit; 
            
            $_SESSION['buildIdAdditional'] = $buildIdAdditionalRegs;
            //var_dump($_SESSION['buildRL']); exit; 
            $conf2 = $getConfName[0]['conf_Name'];
            //$_SESSION['conf2'] = $conf2; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId2'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
        

} 
function pageBanner($args = NULL)
{
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) {
        $args['subitle'] = get_field('page_banner_subtitle');
    }

    if (!$args['photo']) {
        if (get_field('page_banner_background_image')) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
            $args['photo'] = get_field('page_banner_background_image')['sizes']['presenterLandscape'];
        } else {
            $args['photo'] = get_theme_file_uri('images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp');
        }
    }  ?>

    <div class="page-banner__bg-image" style="background-image: url(<?php
                                                                    echo $args['photo'];
                                                                    ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
        <div class="page-banner__intro">
            <p><?php echo $args['subtitle'] ?></p>
        </div>
    </div>

<?php } // End pageBanner(); 

function management()
{    
  if ($_SESSION['loggedin'] == "True") { ?>
        <li> <a class="nav-link" href="/account/update">Update Account</a></li>
        
        <?php //if they have a userLevel of 3 they will see an admin page link 
        if ($_SESSION['userLevel'] == 3) { ?>
            <li> <a class="nav-link" href="/reports/index.php?action=reports">Admin Page</a></li>
        <?php }  
     ?>
        <h5 class="page-links__title">You are registered for:  </h5>
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
        }
        if($_SESSION['sanAntonio'] == "False" OR $_SESSION['arizona'] == "False"){ ?>
    <h5 class="page-links__title">Open Registrations:  </h5>
    <?php   if ($_SESSION['remarried'] == "False") { ?>
       
           <!-- <li><a class="nav-link" href="/conferences/remarried-conference/remarried-registration">Register for Remarried</a></li>
-->
        <?php  }
       if ($_SESSION['idaho'] == "False") { ?>
         <!--   <li><a class="nav-link" href="/conferences/idaho-regional-conference/idaho-registration">Register for Idaho</a></li>
-->
        <?php  } 
     if ($_SESSION['sanAntonio'] == "False") { ?>
           <!-- <li><a class="nav-link" href="/conferences/san-antonio-regional/san-antonio-registration">Register for San Antonio</a></li>-->
        <?php   } 
     if ($_SESSION['arizona'] == "False") { ?>
         <!--   <li><a class="nav-link" href="/conferences/arizona-regional/arizona-registration">Register for Arizona</a></li>-->
        <?php   } 
        }  ?>
        <li><a class="btn btn--dark-orange" href="/accounts1/index.php/?action=logout">Logout</a></li>
    <?php
    } 
}

function reports()
{ ?>
    <?php if ($_SESSION['userLevel'] == 3) { ?>
    <div>
     <div class="page-links">
      <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
      <ul class="p-links">
        <li><a href="/account/reports-remarried">Remarried Reports</a></li><br>
        <li><a href="/account/reports-idaho">Idaho Reports</a></li><br>
        <li><a  href="/reports/reports-slc">SLC Reports</a></li><br>
        <li><a href="/reports/reports-knoxville">Knoxville Reports</a></li><br>
   </ul>
   </div> 
   </div>
    <?php     } ?>

<?php }

function keynote()
{

    //Begin the display loop : 
?> 
  <h4><?php the_title(); ?> </h4>
                    <div class="row group">
                        <div style="float: left; margin-right: 10px; ">
                            <?php the_post_thumbnail('presenterPortrait'); ?>
                        </div>
                        <div style="text-align: justify;  margin-right: 50px; ">
                            <?php the_content(); ?>
                        </div>


                        <?php
                        //get custom fields for class information: 
                        $presenter_type = get_field('presenter_type');
                        if ($presenter_type === 'Keynote') {
                            $title = get_field('title_');
                            $day = get_field('which_day');
                            $time = get_field('keynote_time');
                            $desc = get_field('keynote_description');

                            $partner = get_field('teaching_with_someone_else');
                            $post_title = $partner[0];

                        ?><!-- <div class="classDetails" style="background-color:Wheat; ">
-->
                   

                    <h6 class="full-width"  style="background: black; color:white; padding: 5px; margin-top: 100px; margin-right:-10px; max-width: 94%; "> Keynote Speaker</h6>
                    <?php if ($title) { ?>
                        <h5><strong>Title: </strong> <?php echo $title ?></h5>
                    <?php }
                            if ($desc) { ?>
                        <p><strong> Description: </strong> <?php echo $desc;
                                                        } ?></p>
                        <li style="list-style: none;">
                            <h6><strong> Time: </strong><span><strong><?php echo  $day; ?></span><span> <?php echo $time; ?></strong></span></h6>

                        </li>
                        <?php if ($partner) { ?>
                            <li style="list-style: none;"> Team Teaching with - <?php echo $post_title->post_title  ?> </li>
                        <?php } 

                        } // End the Keynote class details 

                        if ($presenter_type === 'Fireside') {
                            $title = get_field('title_');
                            $day = get_field('which_day');
                            $time = get_field('keynote_time');
                            $desc = get_field('keynote_description');

                            $partner = get_field('teaching_with_someone_else');
                            $post_title = $partner[0];

                    ?><!-- <div class="classDetails" style="background-color:Wheat; ">
-->
                 
                            <h6 style="background: black; color:white; padding: 5px;  max-width: 94%;"> Devotional Speaker</h6>
                            <?php if ($title) { ?>
                                <h5><strong>Title: </strong> <?php echo $title ?></h5>
                            <?php }
                            if ($desc) { ?>
                                <p><strong> Description: </strong> <?php echo $desc;
                                                                } ?></p>
                                <li style="list-style: none;">
                                    <h6><strong> Time: </strong><span><strong><?php echo  $day; ?></span><span> <?php echo $time; ?></strong></span></h6>

                                </li>
                                <?php if ($partner) { ?>
                                    <li style="list-style: none;"> Team Teaching with - <?php echo $post_title->post_title  ?> </li>
                            <?php }
                            }  ?>


</div>
              


<hr>
<?php } // End Keynote Function

function workshop()
{
    $partner1 = get_field('teaching_with_someone_else');
    $partner = $partner1[0];
?>
     
                  
    <h4><?php the_title(); ?> </h4>
                        <div class="row group">
                            <div style="float: left; margin-right: 10px; ">
                                <?php the_post_thumbnail('presenterPortrait'); ?>
                            </div>
                            <div style="text-align: justify;  margin-right: 50px; ">
                                <?php the_content(); ?>
                            </div>
                        </div> 
                                <?php if ($partner) {  ?>
                       
                        
                        <h5 style="text-transform: uppercase; background: black;color:white;padding: 5px; margin-bottom: 10px"><strong>Presenting with: </strong></h5>

                        <h4 style="margin-top: 15px;"> <?php echo $partner->post_title ?> </h4>
                        <div class="row group">
                            <div style="float: left; margin-right: 10px; ">
                                <?php echo get_the_post_thumbnail($partner->ID, 'presenterPortrait'); ?>
                            </div>


                            <div style="text-align: justify;  margin-right: 50px; ">
                                <p style="text-align: justify;"> <?php echo $partner->post_content; ?> </p>
                            </div>
                        </div> 
                 
                        <?php  } ?>

             
                

<?php }


function get_Class_Info()
{

    //Grab whether they are presenting in a workshop or not
    $workshop_1 = get_field('workshop_1');
    $workshop_2 = get_field('workshop_2');
    $workshop_3 = get_field('workshop_3');
    $workshop_4 = get_field('workshop_4');
    $workshop_5 = get_field('workshop_5');
    $workshop_6 = get_field('workshop_6');
    $workshop_7 = get_field('workshop_7');
    $workshop_8 = get_field('workshop_8');

    $classes = array($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6, $workshop_7, $workshop_8);

    //Grab all the Title's
    $workshop1Title = get_field('workshop1_title');
    $workshop2Title = get_field('workshop2_title_copy');
    $workshop3Title = get_field('workshop3_title');
    $workshop4Title = get_field('workshop4_title');
    $workshop5Title = get_field('workshop5_title');
    $workshop6Title = get_field('workshop6_title');
    $workshop7Title = get_field('workshop7_title');
    $workshop8Title = get_field('workshop8_title');

    $titles = array($workshop1Title, $workshop2Title, $workshop3Title, $workshop4Title, $workshop5Title, $workshop6Title, $workshop7Title, $workshop8Title);


    //Grab all the Descriptions
    $workshop1Desc = get_field('workshop1_desc');
    $workshop2Desc = get_field('workshop2_desc');
    $workshop3Desc = get_field('workshop3_desc');
    $workshop4Desc = get_field('workshop4_desc');
    $workshop5Desc = get_field('workshop5_desc');
    $workshop6Desc = get_field('workshop6_desc');
    $workshop7Desc = get_field('workshop7_desc');
    $workshop8Desc = get_field('workshop8_desc');

    $descriptions = array($workshop1Desc, $workshop2Desc, $workshop3Desc, $workshop4Desc, $workshop5Desc, $workshop6Desc, $workshop7Desc, $workshop8Desc);


    //Grab all the Rooms
    $workshop1Room = get_field('workshop1_Rm');
    $workshop2Room = get_field('workshop2_Rm');
    $workshop3Room = get_field('workshop3_Rm');
    $workshop4Room = get_field('workshop4_Rm');
    $workshop5Room = get_field('workshop5_Rm');
    $workshop6Room = get_field('workshop6_Rm');
    $workshop7Room = get_field('workshop7_Rm');
    $workshop8Room = get_field('workshop8_Rm');


    $rooms = array($workshop1Room, $workshop2Room, $workshop3Room, $workshop4Room, $workshop5Room, $workshop6Room, $workshop7Room, $workshop8Room);

    //Grab all the Times
    $workshop1Time = get_field('workshop1_time');
    $workshop2Time = get_field('workshop2_time');
    $workshop3Time = get_field('workshop3_time');
    $workshop4Time = get_field('workshop4_time');
    $workshop5Time = get_field('workshop5_time');
    $workshop6Time = get_field('workshop6_time');
    $workshop7Time = get_field('workshop7_time');
    $workshop8Time = get_field('workshop8_time');


    $times = array($workshop1Time, $workshop2Time, $workshop3Time, $workshop4Time, $workshop5Time, $workshop6Time, $workshop7Time, $workshop8Time);
    //get custom fields for class information:

    $partner = get_field('teaching_with_someone_else');
    $post_title = $partner[0];


    $newArray = array();
    foreach ($classes as $class) {
        if ($class == 1) {
            array_push($newArray, $class);

            $num = 1;
        }
    }
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
?>   
 <?php
                        foreach ($newArray as $array) {
                            if ($array) {
                                while ($i < count($classes)) {
                        ?>

                   
                    <div class="<?php echo 'workshop'.$num ?>">
                        <header class="class-header">
                            <?php if ($titles[$i]) {
                                        echo '<h6 style="background: black; color:white; padding: 5px;">  Workshop ' . $num . '</h6>' ?>
                                <h5 style="padding-left: 10px; margin-bottom: 10px"><strong>Title: </strong><?php echo $titles[$i]; ?> </h5>
                        </header>
                         <?php   if($description[$j] == " "){ 
                             ?>
                            <p style="visibility: hidden;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                          --><?php
                            }else{ ?>
                           <p style="padding-left: 10px; margin-bottom: 10px;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                           <?php } ?> 

                            <?php   if(!$times[$k]){ 
                             ?>
                            <!--<p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                         --><?php
                            }else{ ?>
                          <p style="padding-left: 10px; "> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                          <?php } ?> 
                       
                          <?php   if(!$rooms[$l]){ 
                             ?>
                            <!--<p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
--><?php
                            }else{ ?>
                         <p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
 <?php } ?>  
                        

                    
                    <?php
                                    } ?> </div> <!-- //End the Class-Row div -->
                                   
    <?php               
 $i++;
                                    $j++;
                                    $k++;
                                    $l++;
                                    $num++;
                                } 
                             
                       } }?> 
             <?php }


function get_Class_Info_Idaho()
{

    //Grab whether they are presenting in a workshop or not
    $workshop_1 = get_field('workshop_1_Id');
    $workshop_2 = get_field('workshop_2_Id');
    $workshop_3 = get_field('workshop_3_Id');
    $workshop_4 = get_field('workshop_4_Id');
    $workshop_5 = get_field('workshop_5_Id');
   

    $classes = array($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6, $workshop_7, $workshop_8);

    //Grab all the Title's
    $workshop1Title = get_field('workshop1_title_Id');
    $workshop2Title = get_field('workshop2_title_copy_Id');
    $workshop3Title = get_field('workshop3_title_Id');
    $workshop4Title = get_field('workshop4_title_Id');
    $workshop5Title = get_field('workshop5_title_Id');
  

    $titles = array($workshop1Title, $workshop2Title, $workshop3Title, $workshop4Title, $workshop5Title, $workshop6Title, $workshop7Title, $workshop8Title);


    //Grab all the Descriptions
    $workshop1Desc = get_field('workshop1_desc_Id');
    $workshop2Desc = get_field('workshop2_desc_Id');
    $workshop3Desc = get_field('workshop3_desc_Id');
    $workshop4Desc = get_field('workshop4_desc_Id');
    $workshop5Desc = get_field('workshop5_desc_Id');
  

    $descriptions = array($workshop1Desc, $workshop2Desc, $workshop3Desc, $workshop4Desc, $workshop5Desc);


    //Grab all the Rooms
    $workshop1Room = get_field('workshop1_Rm_Id');
    $workshop2Room = get_field('workshop2_Rm_Id');
    $workshop3Room = get_field('workshop3_Rm_Id');
    $workshop4Room = get_field('workshop4_Rm_Id');
    $workshop5Room = get_field('workshop5_Rm_Id');
   


    $rooms = array($workshop1Room, $workshop2Room, $workshop3Room, $workshop4Room, $workshop5Room, $workshop6Room, $workshop7Room, $workshop8Room);

    //Grab all the Times
    $workshop1Time = get_field('workshop1_time_Id');
    $workshop2Time = get_field('workshop2_time_Id');
    $workshop3Time = get_field('workshop3_time_Id');
    $workshop4Time = get_field('workshop4_time_Id');
    $workshop5Time = get_field('workshop5_time_Id');
 


    $times = array($workshop1Time, $workshop2Time, $workshop3Time, $workshop4Time, $workshop5Time, $workshop6Time, $workshop7Time, $workshop8Time);
    //get custom fields for class information:

    $partner = get_field('teaching_with_someone_else');
    $post_title = $partner[0];


    $newArray = array();
    foreach ($classes as $class) {
        if ($class == 1) {
            array_push($newArray, $class);

            $num = 1;
        }
    }
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
?>   
 <?php
                        foreach ($newArray as $array) {
                            if ($array) {
                                while ($i < count($classes)) {
                        ?>

                   
                    <div class="<?php echo 'workshop'.$num ?>">
                        <header class="class-header">
                            <?php if ($titles[$i]) {
                                        echo '<h6 style="background: black; color:white; padding: 5px;">  Workshop ' . $num . '</h6>' ?>
                                <h5 style="padding-left: 10px; margin-bottom: 10px"><strong>Title: </strong><?php echo $titles[$i]; ?> </h5>
                        </header>
                         <?php   if($description[$j] == " "){ 
                             ?>
                            <p style="visibility: hidden;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                          --><?php
                            }else{ ?>
                           <p style="padding-left: 10px; margin-bottom: 10px;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                           <?php } ?> 

                            <?php   if(!$times[$k]){ 
                             ?>
                            <!--<p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                         --><?php
                            }else{ ?>
                          <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                          <?php } ?> 
                       
                          <?php   if(!$rooms[$l]){ 
                             ?>
                            <!--<p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
--><?php
                            }else{ ?>
                         <p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
 <?php } ?>  
                        

                    
                    <?php
                                    } ?> </div> <!-- //End the Class-Row div -->
                                   
    <?php               
 $i++;
                                    $j++;
                                    $k++;
                                    $l++;
                                    $num++;
                                } 
                             
                       } }?> 
             <?php }




    function get_Class_Info_Rem()
    {
  //Grab whether they are presenting in a workshop or not
                    $workshop_1 = get_field('workshop_1_R');
                    $workshop_2 = get_field('workshop_2_R');
                    $workshop_3 = get_field('workshop_3_R');
                    $workshop_4 = get_field('workshop_4_R');


                    $classes = array($workshop_1, $workshop_2, $workshop_3, $workshop_4);

                    //Grab all the Title's
                    $workshop1Title = get_field('workshop1_title_R');
                    $workshop2Title = get_field('workshop2_title_copy_R');
                    $workshop3Title = get_field('workshop3_title_R');
                    $workshop4Title = get_field('workshop4_title_R');


                    $titles = array($workshop1Title, $workshop2Title, $workshop3Title, $workshop4Title);


                    //Grab all the Descriptions
                    $workshop1Desc = get_field('workshop1_desc_R');
                    $workshop2Desc = get_field('workshop2_desc_R');
                    $workshop3Desc = get_field('workshop3_desc_R');
                    $workshop4Desc = get_field('workshop4_desc_R');


                    $descriptions = array($workshop1Desc, $workshop2Desc, $workshop3Desc, $workshop4Desc);


                    //Grab all the Rooms
                    $workshop1Room = get_field('workshop1_Rm_R');
                    $workshop2Room = get_field('workshop2_Rm_R');
                    $workshop3Room = get_field('workshop3_Rm_R');
                    $workshop4Room = get_field('workshop4_Rm_R');

                    $rooms = array($workshop1Room, $workshop2Room, $workshop3Room, $workshop4Room);

                    //Grab all the Times
                    $workshop1Time = get_field('workshop1_time_R');
                    $workshop2Time = get_field('workshop2_time_R');
                    $workshop3Time = get_field('workshop3_time_R');
                    $workshop4Time = get_field('workshop4_time_R');

                    $times = array($workshop1Time, $workshop2Time, $workshop3Time, $workshop4Time);

                    //get custom fields for class information:


                    $partner = get_field('teaching_with_someone_else');
                    $post_title = $partner[0];

                    $newArray = array();
                    foreach ($classes as $class) {
                        if ($class == 1) {
                            array_push($newArray, $class);

                            $num = 1;
                        }
                    }
                    $i = 0;
                    $j = 0;
                    $k = 0;
                    $l = 0;
                    ?> 
                    <?php
                    foreach ($newArray as $array) {
                        if ($array) {
                            while ($i < count($classes)) {
                    ?>
                          <div> 
                                 <div class="<?php echo 'workshop' . $num ?>">

                                        <?php if ($titles[$i]) {
                                            echo '<h6 style="background: black; color:white; padding: 5px;">  Workshop ' . $num . '</h6>' ?>
                                            <h5 style="padding-left: 10px; margin-bottom: 10px"><strong>Title: </strong><?php echo $titles[$i]; ?> </h5>


                                            <?php if (!$descriptions[$j]) {
                                            ?>
                                                <!-- <p style="visibility: hidden;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                              --> <?php
                                            } else { ?>
                                                <p style="padding-left: 10px; margin-bottom: 10px;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                                            <?php } ?>

                                            <?php if (!$times[$k]) {
                                            ?>
                                                <!--  <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                        --> <?php
                                            } else { ?>
                                                <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                                            <?php } ?>

                                            <?php if (!$rooms[$l]) {
                                            ?>
                                                <!--<p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
--><?php
                                            } else { ?>
                                                <p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
                                            <?php } ?>



                                        <?php
                                        } ?>
                                    </div> <!-- //End the Class-Row div -->

                        <?php
                                $i++;
                                $j++;
                                $k++;
                                $l++;
                                $num++;
                            } 
                         }
                    } ?>
                        
<!-- *********************************************************************************************************** -->
                       
 <?php   }


//***************************ARIZONA CLASS INFO ***************************************************************


    function get_Class_Info_Arizona()
    {

        //Grab whether they are presenting in a workshop or not
        $workshop_1 = get_field('workshop_1_AZ');
        $workshop_2 = get_field('workshop_2_AZ');
        $workshop_3 = get_field('workshop_3_AZ');
        $workshop_4 = get_field('workshop_4_AZ');


        $classes = array($workshop_1, $workshop_2, $workshop_3, $workshop_4);

        //Grab all the Title's
        $workshop1Title = get_field('workshop1_title_AZ');
        $workshop2Title = get_field('workshop2_title_copy_AZ');
        $workshop3Title = get_field('workshop3_title_AZ');
        $workshop4Title = get_field('workshop4_title_AZ');


        $titles = array($workshop1Title, $workshop2Title, $workshop3Title, $workshop4Title);


        //Grab all the Descriptions
        $workshop1Desc = get_field('workshop1_desc_AZ');
        $workshop2Desc = get_field('workshop2_desc_AZ');
        $workshop3Desc = get_field('workshop3_desc_AZ');
        $workshop4Desc = get_field('workshop4_desc_AZ');


        $descriptions = array($workshop1Desc, $workshop2Desc, $workshop3Desc, $workshop4Desc);


        //Grab all the Rooms
        $workshop1Room = get_field('workshop1_Rm_AZ');
        $workshop2Room = get_field('workshop2_Rm_AZ');
        $workshop3Room = get_field('workshop3_Rm_AZ');
        $workshop4Room = get_field('workshop4_Rm_AZ');

        $rooms = array($workshop1Room, $workshop2Room, $workshop3Room, $workshop4Room);

        //Grab all the Times
        $workshop1Time = get_field('workshop1_time_AZ');
        $workshop2Time = get_field('workshop2_time_AZ');
        $workshop3Time = get_field('workshop3_time_AZ');
        $workshop4Time = get_field('workshop4_time_AZ');

        $times = array($workshop1Time, $workshop2Time, $workshop3Time, $workshop4Time);
       
 //get custom fields for class information:

 
        $partner = get_field('teaching_with_someone_else');
        $post_title = $partner[0];

        $newArray = array();
        foreach ($classes as $class) {
            if ($class == 1) {
                array_push($newArray, $class);

                $num = 1;
            }
        }
        $i = 0;
        $j = 0;
        $k = 0;
        $l = 0;
    ?>
        <?php
        foreach ($newArray as $array) {
            if ($array) {
                while ($i < count($classes)) {
        ?>


                    <div class="<?php echo 'workshop' . $num ?>">

                        <?php if ($titles[$i]) {
                            echo '<h6 style="background: black; color:white; padding: 5px;">  Workshop ' . $num . '</h6>' ?>
                            <h5 style="padding-left: 10px; margin-bottom: 10px"><strong>Title: </strong><?php echo $titles[$i]; ?> </h5>


                            <?php if (!$descriptions[$j]) {
                            ?>
                              <!-- <p style="visibility: hidden;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                              -->  <?php
                                } else { ?>
                                <p style="padding-left: 10px; margin-bottom: 10px;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                            <?php } ?>

                            <?php if (!$times[$k]) {
                            ?>
                              <!--  <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                        --> <?php
                            } else { ?>
                                <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                            <?php } ?>

                            <?php if (!$rooms[$l]) {
                            ?>
                                <!--<p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
--><?php
                            } else { ?>
                                <p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
                            <?php } ?>



                        <?php
                        } ?>
                    </div> <!-- //End the Class-Row div -->

        <?php
                    $i++;
                    $j++;
                    $k++;
                    $l++;
                    $num++;
                }
            }
        } 
   }




 function fyi()
{
    $locationName = get_field('name_of_location'); ?>
    <hr class="separation">
    <strong>Location: </strong><br><strong><?php echo $locationName ?></strong> <br>
    <?php

    $location = get_field('address');
    $map = get_field('google_maps_link'); ?>
    <a href="<?php echo $map; ?>" target="_blank"><?php echo $location ?></a>
    <br>
    <?php 
    if ($post->ID == '2984') { ?> 
   <!-- <hr class="separation">
    <strong> Dress: </strong><?php the_field('conference_dress'); ?> -->
    
    <?php }else { ?>
        <hr class="separation">
    <strong> Dress: </strong><?php the_field('conference_dress'); ?>
   <?php  } ?> 
    
    <br>
    <hr class="separation">
    <strong>Who this is for: </strong><?php the_field('who'); ?>
    <br>
    <hr class="separation">

    <p style="color: red;"><strong> Suggested Donation: </strong><?php the_field('suggested_donation'); ?></p><br><br>

    <br>
    <hr class="separation">
<?php }
function baseOptions(){ ?>

     <h5 class="heading1 heading2">Account Access </h5>
                    <div class="grid-3">
                    <p class="t left column-1;"> First time user?  </p>
                    <a class="btn column-2 t-center" style="background-color:#E5AA70;" href="/account/create-account?name=createA"><?php $_SESSION['createA'] = "True"; ?>Create Account</a>
                   
       </div> 
<?php }
    function options()
    { ?>

                <h5 class="heading1" style="background: #5C4033;">Need Help Logging In? </h5>
                    <div class="grid-3">
                    <p class="column-1"> Have you forgotten your username? </p>
                    <a class="btn column-2" style="background-color:#E5AA70;" href="/account/forgotten-user-name?name=name"><?php $_SESSION['name'] = "True"; ?>Forgotten Username</a>
                    <p class="column-1;"> Have you forgotten your password? </p>
                    <a class="btn column-2" style="background-color: #722F37;" href="/account/password?name=pwd"> <?php $_SESSION['pwd'] = "True"; ?>Fogotten Password</a>
                    </div> 

     

        <?php }
        function options2()
    { ?>

                <h5 class="heading1 heading2" style="background: #5C4033;">Need Help Logging In? </h5>
                    <div class="grid-3">
                    <p class="t left column-1">Sign in instead:</p>
                    <a class="btn column-2" style="background-color:#4C7F9F; " href="/account/login">Login</a>
                    <p class="t left column-1;"> Have you forgotten your password? </p>
                    <a class="btn column-2" style="background-color: #722F37;" href="/account/password?name=pwd"> <?php $_SESSION['pwd'] = "True"; ?>Fogotten Password</a>
                   
       </div> 

     

        <?php }
              function options3()
    { ?>

                <h5 class="heading1 heading2" style="background: #5C4033;">Need Help Logging In? </h5>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">
                    <p class="t left" style="grid-column: 1;">Sign in instead:</p>
                    <a class="btn" style="background-color: #4C7F9F; grid-column: 2;" href="/account/login">Login</a>
                    <hr> 
                     <p class="t left" style="grid-column: 1;"> Have you forgotten your username? </p>
                    <a class="btn" style="background-color: #E5AA70; grid-column: 2;" href="/account/forgotten-user-name?name=name"><?php $_SESSION['name'] = "True"; ?>Forgotten Username</a>
                    
       </div> 

     

        <?php }
// *********************************************************************************************************************** */     
/*  ******************************************* SAN ANTONIO Presenter page display functions ****************************** 
// *********************************************************************************************************************** */
        function get_Class_Info_SA()
{

    //Grab whether they are presenting in a workshop or not
    $workshop_1 = get_field('workshop_1_SA');
    $workshop_2 = get_field('workshop_2_SA');
    $workshop_3 = get_field('workshop_3_SA');
    $workshop_4 = get_field('workshop_4_SA');
    $workshop_5 = get_field('workshop_5_SA');
   

    $classes = array($workshop_1, $workshop_2, $workshop_3, $workshop_4, $workshop_5, $workshop_6, $workshop_7, $workshop_8);

    //Grab all the Title's
    $workshop1Title = get_field('workshop1_title_SA');
    $workshop2Title = get_field('workshop2_title_copy_SA');
    $workshop3Title = get_field('workshop3_title_SA');
    $workshop4Title = get_field('workshop4_title_SA');
    $workshop5Title = get_field('workshop5_title_SA');
    $workshop6Title = get_field('workshop6_title_SA');

    $titles = array($workshop1Title, $workshop2Title, $workshop3Title, $workshop4Title, $workshop5Title, $workshop6Title, $workshop7Title, $workshop8Title);


    //Grab all the Descriptions
    $workshop1Desc = get_field('workshop1_desc_SA');
    $workshop2Desc = get_field('workshop2_desc_SA');
    $workshop3Desc = get_field('workshop3_desc_SA');
    $workshop4Desc = get_field('workshop4_desc_SA');
    $workshop5Desc = get_field('workshop5_desc_SA');
    $workshop6Desc = get_field('workshop6_desc_SA');

    $descriptions = array($workshop1Desc, $workshop2Desc, $workshop3Desc, $workshop4Desc, $workshop5Desc, $workshop6Desc);


    //Grab all the Rooms
    $workshop1Room = get_field('workshop1_Rm_SA');
    $workshop2Room = get_field('workshop2_Rm_SA');
    $workshop3Room = get_field('workshop3_Rm_SA');
    $workshop4Room = get_field('workshop4_Rm_SA');
    $workshop5Room = get_field('workshop5_Rm_SA');
    $workshop6Room = get_field('workshop6_Rm_SA');
   


    $rooms = array($workshop1Room, $workshop2Room, $workshop3Room, $workshop4Room, $workshop5Room, $workshop6Room, $workshop7Room, $workshop8Room);

    //Grab all the Times
    $workshop1Time = get_field('workshop1_time_SA');
    $workshop2Time = get_field('workshop2_time_SA');
    $workshop3Time = get_field('workshop3_time_SA');
    $workshop4Time = get_field('workshop4_time_SA');
    $workshop5Time = get_field('workshop5_time_SA');
    $workshop6Time = get_field('workshop6_time_SA');
 


    $times = array($workshop1Time, $workshop2Time, $workshop3Time, $workshop4Time, $workshop5Time, $workshop6Time, $workshop7Time, $workshop8Time);
    //get custom fields for class information:

    $partner = get_field('team_teaching_1_SA');
    $post_title = $partner[0];


    $newArray = array();
    foreach ($classes as $class) {
        if ($class == 1) {
            array_push($newArray, $class);

            $num = 1;
        }
    }
    $i = 0;
    $j = 0;
    $k = 0;
    $l = 0;
?>   
 <?php
 
foreach ($newArray as $array) {
    if ($array) {
        while ($i < count($classes)) {

?>

           
                <div class="<?php echo 'workshop' . $num ?>">

                    <?php if ($titles[$i]) {
                        echo '<h6 style="background: black; color:white; padding: 5px;">  Workshop ' . $num . '</h6>' ?>
                        <h5 style="padding-left: 10px; margin-bottom: 10px"><strong>Title: </strong><?php echo $titles[$i]; ?> </h5>

                        <?php if (!$descriptions[$j]) {
                        ?>
                            <!-- <p style="visibility: hidden;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                              --> <?php
                                } else { ?>
                            <p style="padding-left: 10px; margin-bottom: 10px;"> <strong>Description: </strong><?php echo $descriptions[$j]; ?> </p>
                        <?php } ?>

                        <?php if (!$times[$k]) {
                        ?>
                            <!--<p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                         --><?php
                        } else { ?>
                            <p style="padding-left: 10px; margin-bottom: 10px;"> <strong> Time: </strong><?php echo $times[$k]; ?> </p>
                        <?php } ?>

                        <?php if (!$rooms[$l]) {
                        ?>
                            <!--<p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
--><?php
                        } else { ?>
                            <p style="padding-left: 10px; "> <strong> Room: </strong><?php echo  $rooms[$l] ?> </p>
                        <?php } ?>



                    <?php
                    } ?>
</div> <!-- End the class-row div --> 

        <?php
            $i++;
            $j++;
            $k++;
            $l++;
            $num++;
        }
    }
} ?>
             <?php }

   
   
   
   
   
    //Salt Lake Conference Workshop Section ***********************************************************
    function workshop1()
    {
        

        if (get_field('workshop1_title')) : ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop1_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop1_title'); ?></td>
                <td> <?php echo get_field('content_category') ?></td>
            </tr>
        <?php endif;
    }

    function workshop2()
    {
        $partner = get_field('teaching_with_someone_else');
        $post_title = $partner[0];
        echo $partner; 

        if (get_field('workshop2_title_copy')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop2_room'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop2_title_copy'); ?></td>
            </tr>
        <?php endif;
    }

    function workshop3()
    {
        if (get_field('workshop3_title')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop3_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop3_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }
    function workshop4()
    {
        if (get_field('workshop4_title')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop4_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop4_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }


    function workshop5()
    {
        if (get_field('workshop5_title')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop5_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop5_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }

    function workshop6()
    {
        if (get_field('workshop6_title')) :
        ?>

            <tr class="w1-border-bottom" style="max-width: 50rem;">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop6_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td width="55%;"><?php echo get_field('workshop6_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }

    function workshop7()
    {
        if (get_field('workshop7_title')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop7_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td width="55%;"><?php echo get_field('workshop7_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }

    function workshop8()
    {
        if (get_field('workshop8_title')) :
        ?>

            <tr class="w1-border-bottom">
                <td width="30%"><strong>Room</strong> <?php echo get_field('workshop8_Rm'); ?></td>
                <td width="30%"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></td>
                <td><?php echo get_field('workshop8_title'); ?></td>
            </tr>
        <?php endif;
        ?>


        <?php }

    //****Remarried Workshop Section ************************************************************************


    function workshop1_R()
    {
        $partner = get_field('teaching_with_someone_else');
        $post_title = $partner[0];
        //echo $partner; 

          
            if (get_field('workshop1_title_R')) : ?>

            
                 <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); 
                 $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
                  ?></a></div>
            <div class="title_Disp"> <?php echo get_field('workshop1_title_R'); ?></div>
         
            <div class="room_Disp"><?php echo get_field('workshop1_Rm_R'); ?></div>
        
             <?php
            endif;
    }

    function workshop2_R()
    {
        $partner = get_field('teaching_with_someone_else');
        $post_title = $partner[0];
       
           // echo $partner; 
        if (get_field('workshop2_title_copy_R')) : ?>

                 <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); 
                 $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
                  ?></a></div>
                 <div class="title_Disp"> <?php echo get_field('workshop2_title_copy_R'); ?></div>
                
                 <div class="room_Disp"><?php echo get_field('workshop2_Rm_R'); ?></div>
          
            <?php   
        endif;
    }



    function workshop3_R()
    {
    
        if (get_field('workshop3_title_R')) :
 ?>
            
          <div class="presenter_Disp"> <a href="<?php echo get_the_permalink(); ?>"><?php the_title();  
                $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
                  ?></a></div>
              <div class="title_Disp"><?php echo get_field('workshop3_title_R'); ?> </div>
           
                <div class="room_Disp"> <?php echo get_field('workshop3_Rm_R') ?></div>
                
                
               
        <?php endif;
        }


    function workshop4_R()
    {

        if (get_field('workshop4_title_R')) :
      
         ?>
 <div class="presenter_Disp"> <a href="<?php echo get_the_permalink(); ?>"><?php the_title();  
                $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
                  ?></a></div>
              <div class="title_Disp"><?php echo get_field('workshop4_title_R'); ?> </div>
          
                <div class="room_Disp"> <?php echo get_field('workshop4_Rm_R') ?></div>
              
                
               
        <?php endif;
        }

  //****Idaho Workshop Section ************************************************************************

    function workshop1_Id()
    { 
 $room = get_field('workshop1_Rm_Id'); 

      if (get_field('workshop1_title_Id')) : ?>
            <div class="presenter_Disp"> <a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); ?> </a></div>
            <div class="title_Disp"> <?php echo get_field('workshop1_title_Id'); ?></div>
            <div class="room_Disp"><?php echo $room; ?></div>
         <?php endif;
    }

    function workshop2_Id()
    {
        if (get_field('workshop2_title_copy_Id')) : ?>
            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop2_title_copy_Id'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop2_Rm_Id'); ?></div>
        <?php endif;
        ?>


        <?php }

    function workshop3_Id()
    {
        if (get_field('workshop3_title_Id')) :
        ?>

           <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop3_title_Id'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop3_Rm_Id'); ?></div>
        <?php endif;
        ?>


        <?php }


    function workshop4_Id()
    {
        if (get_field('workshop4_title_Id')) :
        ?>

            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop4_title_Id'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop4_Rm_Id'); ?></div>
        <?php endif;
        ?>


    <?php }

    function workshop5_Id()
    {
        if (get_field('workshop5_title_Id')) :
        ?>
             <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop5_title_Id'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop5_Rm_Id'); ?></div>
        <?php endif;
        ?>


    <?php }


  //****San Antonio Workshop Section ************************************************************************

    function workshop1_SA()
    { 
 $room = get_field('workshop1_Rm_SA'); 

      if (get_field('workshop1_title_SA')) : ?>
            <div class="presenter_Disp"> <a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); 
             $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
            
            ?> </a></div>
            <div class="title_Disp"> <?php echo get_field('workshop1_title_SA'); ?></div>
            <div class="room_Disp"><?php echo $room; ?></div>
         <?php endif;
    }

    function workshop2_SA()
    {
        if (get_field('workshop2_title_copy_SA')) : ?>
            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title();
              $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                } ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop2_title_copy_SA'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop2_Rm_SA'); ?></div>
        <?php endif;
        ?>


        <?php }

    function workshop3_SA()
    {
        if (get_field('workshop3_title_SA')) :
        ?>

           <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop3_title_SA'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop3_Rm_SA'); ?></div>
        <?php endif;
        ?>


        <?php }


    function workshop4_SA()
    {
        if (get_field('workshop4_title_SA')) :
        ?>

            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop4_title_SA'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop4_Rm_SA'); ?></div>
        <?php endif;
        ?>


    <?php }

    function workshop5_SA()
    {
        if (get_field('workshop5_title_SA')) :
        ?>
             <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop5_title_SA'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop5_Rm_SA'); ?></div>
        <?php endif;
        ?>


    <?php }

       function workshop6_SA()
    {
        if (get_field('workshop6_title_SA')) :
        ?>
             <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop6_title_SA'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop6_Rm_SA'); ?></div>
        <?php endif;
        ?>


    <?php }

//***************************Arizona WOrkshop Section *************************

    function workshop1_AZ()
    { 
 $room = get_field('workshop1_Rm_AZ'); 

      if (get_field('workshop1_title_AZ')) : ?>
            <div class="presenter_Disp"> <a href="<?php echo get_the_permalink(); ?>" ><?php the_title(); 
             $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }
            
            ?> </a></div>
            <div class="title_Disp"> <?php echo get_field('workshop1_title_AZ'); ?></div>
            <div class="room_Disp"><?php echo $room; ?></div>
         <?php endif;
    }

    function workshop2_AZ()
    {
        if (get_field('workshop2_title_copy_AZ')) : ?>
            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title();
              $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                } ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop2_title_copy_AZ'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop2_Rm_AZ'); ?></div>
        <?php endif;
        ?>


        <?php }

    function workshop3_AZ()
    {
        if (get_field('workshop3_title_AZ')) :
        ?>

           <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title();
            $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                } ?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop3_title_AZ'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop3_Rm_AZ'); ?></div>
        <?php endif;
        ?>


        <?php }


    function workshop4_AZ()
    {
        if (get_field('workshop4_title_AZ')) :
        ?>

            <div class="presenter_Disp"><a href="<?php echo get_the_permalink(); ?>"><?php the_title();  
            $partner = get_field('teaching_with_someone_else');
                $post_title = $partner[0];
                $partner_name = $post_title->post_title; 
                if($partner_name){ 
                    echo " & " . $partner_name; 
                }?> </a></div>
            <div class="title_Disp"><?php echo get_field('workshop4_title_AZ'); ?> </div>
            <div class="room_Disp"><?php echo get_field('workshop4_Rm_AZ'); ?></div>
        <?php endif;
        ?>


    <?php }



    function chooseConf()
    { ?>
        
        <label for="conf1"> Which conference are you registering for? </label><br>
        <select name="conf1" id="conf1" class="rounded-input" required>
            <option value="">--Please choose an option--</option>
        
            <option value="10" disabled>San Antonio Regional Conference</option>
            <option value="12" disabled>St. George Regional</option>
            <option value="5" disabled>Salt Lake City Conference</option>
            <option value="6" disabled>Cache Valley Regional Conference</option>
            <option value="7" disabled>Idaho Regional Conference</option>
            <option value="8" disabled>Remarried Life Conference</option>
            <option value="9" disabled> Knoxville Regional Conference </option>
            <option value="11" disabled> Arizona Regional Conference </option>
         </select> <br><br>
        
        <input type="hidden" name="userId" class="input" id="userId" <?php if (isset($userId)) {
                                                                            echo "value = '$userId'";
                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                            echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                        } ?> > <br>
        <input type="hidden" name="userName" class="input" id="userName" <?php if (isset($userName)) {
                                                                            echo "value = '$userId'";
                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                            echo 'value="' . $_SESSION['clientdata']['userId'] . '"';
                                                                        } ?> > <br>
        <input type="hidden" name="confId" class="input" id="confId" <?php if (isset($confId)) {
                                                                            echo "value = '$conf1'";
                                                                        } elseif (isset($_SESSION['clientData'])) {
                                                                            echo 'value="' . $_SESSION['clientdata']['conf1'] . '"';
                                                                        } ?> > <br>

                                                                        
    <?php  }


    //This is the Remarried Section for classes by workshop time 
    
    function workshops_R()
    {
        conferenceDates();
        $workshop1_time = "11:00 AM";
        $workshop2_time = "12:00 PM";
        $workshop3_time = "2:30 PM";
        $workshop4_time = "3:30 PM";
     


        $args1 = array(
            'post_type' => 'presenters',
            'offset' => 0,
            'category' => array(21),
            'title_li' => '',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );


        $myposts1 = get_posts($args1);

    ?>
        <!-- Workshop 1 -->
        <div class="list">
            <h6 class="workshop"> Workshop 1 - <? echo $workshop1_time; ?> </h6>
            <div class="workshop1">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop1_R();
                        endforeach; ?>
                </table>
            </div>

            <!-- Workshop 2 -->
            <h6 class="workshop"> Workshop 2 - <? echo $workshop2_time; ?> </h6>
            <div class="workshop2">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop2_R();
                        endforeach; ?>
                </table>
            </div>

            <!-- Workshop 3 -->
            <h6 class="workshop"> Workshop 3 - <? echo $workshop3_time; ?> </h6>
            <div class="workshop3">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop3_R();
                        endforeach; ?>
                </table>
            </div>
            <!-- Workshop 4 -->
            <h6 class="workshop"> Workshop 4 - <? echo $workshop4_time; ?> </h6>
            <div class="workshop4">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop4_R();
                        endforeach; ?>
                </table>
            </div>
          




        <?php

    }  // Close the function 
//***************** Idaho Classes BY Workshops ***************************************************

function workshops_Idaho()
    {
        conferenceDates();
        $workshop1_time = "10:30 AM";
        $workshop2_time = "11:45 AM";
        $workshop3_time = "1:45 PM";
        $workshop4_time = "2:45 PM";
        $workshop5_time = "3:45 PM";
    


        $args1 = array(
            'post_type' => 'presenters',
            'offset' => 0,
            'category' => array(19),
            'title_li' => '',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        );


        $myposts1 = get_posts($args1);

    ?>
        <!-- Workshop 1 -->
        <div class="list">
            <h6 class="workshop"> Workshop 1 - <? echo $workshop1_time; ?> </h6>
            <div class="workshop1">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop1_R();
                        endforeach; ?>
                </table>
            </div>

            <!-- Workshop 2 -->
            <h6 class="workshop"> Workshop 2 - <? echo $workshop2_time; ?> </h6>
            <div class="workshop2">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop2_R();
                        endforeach; ?>
                </table>
            </div>

            <!-- Workshop 3 -->
            <h6 class="workshop"> Workshop 3 - <? echo $workshop3_time; ?> </h6>
            <div class="workshop3">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop3_R();
                        endforeach; ?>
                </table>
            </div>
            <!-- Workshop 4 -->
            <h6 class="workshop"> Workshop 4 - <? echo $workshop4_time; ?> </h6>
            <div class="workshop4">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop4_R(); 
                        endforeach; ?>
                </table>
            </div>
            <!-- Workshop 5-->
            <h6 class="workshop"> Workshop 5 - <? echo $workshop5_time; ?> </h6>
            <div class="workshop5">
                <table> <?php
                        foreach ($myposts1 as $post) : setup_postdata($post);
                            workshop5_R();
                        endforeach; ?>
                </table>
            </div>

            <?php } 




    function conferenceDates()
    {  ?>
            <strong>Conference Dates: </strong>
            <?php
            $startDate = new DateTime(get_field('event_start_date'));
            //var_dump($startDate);
            //$startDate = 
          
            echo $startDate->format('F') . " ";
            echo $startDate->format('d') . ", ";
            echo $startDate->format('Y');
            ?>
            -
            <?php $endDate = new DateTime(get_field('event_end_date'));
            echo $endDate->format('F') . " ";
            echo $endDate->format('d') . ", ";
            echo $endDate->format('Y');
           



      }

function conferenceD($sDate, $eDate)
    {  ?>
            <strong>Conference Dates: </strong>
            <?php
            $startDate = new DateTime($sDate);
            //var_dump($startDate);
            //$startDate = 
          
            echo $startDate->format('F') . " ";
            echo $startDate->format('d') . ", ";
            echo $startDate->format('Y');
            ?>
            -
            <?php $endDate = new DateTime($eDate);
            echo $endDate->format('F') . " ";
            echo $endDate->format('d') . ", ";
            echo $endDate->format('Y');
           



      }

/* **********************************************************RECORDING FUNCTION DISPLAY'S **************************
// **************************************************************************************************************** */ 
function recording_1 (){ 
     $url_1 = get_field('youtube_link_1');
    
    if ($url_1) :
        $url1 = $url_1['url'];
        $t1 = get_field('title_1');
        $which_conf1 = get_field('which_conference');
        $presented1 = get_field('year_presented');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t1; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf1; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented1;
                                                     ?>
                </p>
                <?php if ($url1) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url1 ?>" target="__blank"><?php echo $url1; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
      //First Recording if any *********** 
    function recording_2 (){ 
    $url_2 = get_field('youtube_link_2');
    
    if ($url_2) :
        $url2 = $url_2['url'];
        $t2 = get_field('title_2');
        $which_conf2 = get_field('which_conference_2');
        $presented2 = get_field('year_presented_2');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t2; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf2; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented2;
                                                     ?>
                </p>
                <?php if ($url2) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url2 ?>" target="__blank"><?php echo $url2; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
         function recording_3 (){ 
    
     $url_3 = get_field('youtube_link_3');
    if ($url_3) :
         $url3 = $url_3['url'];
        $t3 = get_field('title_3');
        $which_conf3 = get_field('which_conference_3');
        $presented3 = get_field('year_presented_3');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t3; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf3; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented3;
                                                     ?>
                </p>
                <?php if ($url3) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url3 ?>" target="__blank"><?php echo $url3; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
    
   function recording_4 (){ 
    
     $url_4 = get_field('youtube_link_4');
    if ($url_4) :
        $url4 = $url_4['url'];
        $t4 = get_field('title_4');
        $which_conf4 = get_field('which_conference_4');
        $presented3 = get_field('year_presented_4');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t4; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf4; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented4;
                                                     ?>
                </p>
                <?php if ($url4) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url4 ?>" target="__blank"><?php echo $url4; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
      function recording_5 (){ 
    
     $url_5 = get_field('youtube_link_5');
    if ($url_5) :
       $url5 = $url_5['url'];
        $t5 = get_field('title_5');
        $which_conf5 = get_field('which_conference_5');
        $presented5 = get_field('year_presented_5');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t5; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf5; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented5;
                                                     ?>
                </p>
                <?php if ($url5) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url5 ?>" target="__blank"><?php echo $url5; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
    
      function recording_6 (){ 
    
     $url_6 = get_field('youtube_link_6');
    if ($url_6) :
      $url6 = $url_6['url'];
        $t6 = get_field('title_6');
        $which_conf6 = get_field('which_conference_6');
        $presented6 = get_field('year_presented_6');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t6; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf6; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented6;
                                                     ?>
                </p>
                <?php if ($url6) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url6 ?>" target="__blank"><?php echo $url6; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
   
      function recording_7 (){ 
    
     $url_7 = get_field('youtube_link_7');
     if ($url_7) :
        $url7 = $url_7['url'];
        $t7 = get_field('title_7');
        $which_conf7 = get_field('which_conference_7');
        $presented7 = get_field('year_presented_7');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t7; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf7; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented7;
                                                     ?>
                </p>
                <?php if ($url7) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url7 ?>" target="__blank"><?php echo $url7; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 
     function recording_8 (){ 
    
     $url_8 = get_field('youtube_link_8');
     if ($url_8) :
         $url8 = $url_8['url'];
        $t8 = get_field('title_8');
        $which_conf8 = get_field('which_conference_8');
        $presented8 = get_field('year_presented_8');
        ?>

             <p> <strong> Class Title: </strong> <?php echo $t8; ?><br>
                  <strong> Presented at: </strong><?php echo $which_conf8; ?> <br>
                  <strong> Year Presented: </strong> <?php echo $presented8;
                                                     ?>
                </p>
                <?php if ($url8) { ?>
                  <strong>Youtube Link: </strong><a href="<?php echo $url7 ?>" target="__blank"><?php echo $url8; ?> <a><br><br>

                    <?php  }
       endif;
        
        } 

//*********************************************************************************************************
//************************************REMARRIED LIFE REGISTRATION LOGIN ******************************************** 
//*********************************************************************************************************
function RLConfLogin(){ 

        $check_RLReg = isRegisteredRLConf($userId);
         
        if ($check_RLReg != 1) { 
            $_SESSION['remarried'] = "False";
            header('location: /conferences/remarried-conference/remarried-registration'); 
        } else {
            $_SESSION['remarried'] = "True";
            $getRegData = isRegisteredRLData($userId);
            // var_dump($getRegData[0]); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildRL = rLifeConf($getRegData);
            //echo $buildRL; 
            //exit; 
            $conf2 = $getConfName[0]['conf_Name'];
            //echo $conf2; 
            //exit; 
             $_SESSION['conf2'] = $conf2;
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId8'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['buildRL'] = $buildRL;
           
           
            
      //break; 
             
        
         
          }
}
//*********************************************************************************************************
//************************************IDAHO REGISTRATION LOGIN ******************************************** 
//*********************************************************************************************************
function IDConfLogin(){ 

         $check_Idaho_Reg = isRegisteredIdConf($userId);

        if (!$check_Idaho_Reg) {
            $_SESSION['idaho'] = "False";
             header('location: /conferences/idaho-regional-conference/idaho-registration'); 
        } else {
            $_SESSION['idaho'] = "True";
            $getRegData = isRegisteredIdData($userId);

            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildId = IdahoConf($getRegData);


            $_SESSION['buildId'] = $buildId;
            //var_dump($_SESSION['buildRL']); exit; 
            $conf2 = $getConfName[0]['conf_Name'];
            $_SESSION['conf2'] = $conf1; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId7'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
           
           
            
      //break; 
             
        
         
          }
}

//*********************************************************************************************************
//*******************SAN ANTONIO REGISTRATION LOGIN ****************************************************** 
//*********************************************************************************************************
function SAConfLogin(){
    login(); 
     $_SESSION['userId'];    
     $userId =   $_SESSION['userId']; 

        $check_SA_Reg = isRegisteredSAConf($userId);
         
        if (!$check_SA_Reg) {
            $_SESSION['sanAntonio'] = "False"; 
        } else { 
             $_SESSION['sanAntonio'] = "True";
           
            $getRegData = isRegisteredSAData($userId);
            //var_dump($getRegDataSA); 
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildSA = SAConf($getRegData);
            $_SESSION['getRegDataSA'] = $getRegData;

            $_SESSION['buildSA'] = $buildSA;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $conf3 = $getConfName[0]['conf_Name'];
            $_SESSION['conf10'] = $conf3; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId10'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
        }
           
     }
             
        
         


//*********************************************************************************************************
//*******************ARIZONA REGISTRATION LOGIN ****************************************************** 
//*********************************************************************************************************
function AZConfLogin(){ 
//echo "This is Arizona Login"; 
//exit;
      login(); 

      $_SESSION['userId']; 
      $userId =   $_SESSION['userId']; 
      $check_AZ_Reg = isRegisteredAZConf($userId);
        
        if ($check_AZ_Reg == 0) {
            $_SESSION['arizona'] = "False";
           //  header('location: /conferences/arizona-regional/arizona-registration/'); 
        } else { 
             $_SESSION['arizona'] = "True";
            $getRegData = isRegisteredAZData($userId);
            //var_dump($getRegData); 
            //exit;
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['conf_id'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildAZ = AZConf($getRegData);
            $_SESSION['getRegDataAZ'] = $getRegData;

            $_SESSION['buildAZ'] = $buildAZ;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $conf1 = $getConfName[0]['conf_Name'];
            $_SESSION['conf11'] = $conf1; 
            //echo $_SESSION['conf2']; 
            //exit; 
            $_SESSION['confId11'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
            $_SESSION['userId'] = $userId;
           //SAConfLogin(); 
      //break; 
          }
}  
//*********************************************************************************************************
//*******************St. George REGISTRATION LOGIN ****************************************************** 
//*********************************************************************************************************
function StGConfLogin(){ 
//echo "This is St.George Login"; 
//exit;
      login(); 

    $_SESSION['userId']; 
    $userId = $_SESSION['userId']; 
     
      $check_StG_Reg = isRegisteredStGConf($userId);
        //echo $check_StG_Reg; 
       //exit; 
        if ($check_StG_Reg == 0) {
            $_SESSION['stGeorge'] = "False";
            $_SESSION['paid'] == "No"; 
           //  header('location: /conferences/st-george-regional/st-george-registration/'); 
        } else { 
             $_SESSION['stGeorge'] = "True";
            $getRegDataStG = isRegisteredStGData($userId);
            
            // Remove the password from the array the array_pop function removes the last element from an array
            unset($getRegData[0]['userPW']);
            //var_dump($getRegData); 
            //exit;   
            $confId = $getRegData[0]['confId'];
            //echo $confId; 
            //exit; 
            //Get the conference names, and id's     
            $getConfName = confName($confId);
            //var_dump($getConfName); 
            //exit; 
            $buildStG = stGConf($getRegDataStG);
            
            $paid =  $getRegDataStG[0]['paid'];
            
            $_SESSION['paid'] = $paid; 
            $_SESSION['getRegData'] = $getRegDataStG;

            $_SESSION['buildStG'] = $buildStG;
            //var_dump($_SESSION['buildSA']); exit; 
            //exit; 
            $conf1 = $getConfName[0]['conf_Name'];
            $_SESSION['conf12'] = $conf1; 
            //echo $_SESSION['conf12']; 
            //exit; 
            $_SESSION['confId12'] = $confId;
            ///echo $_SESSION['confId2']; 
            //exit; 
            $_SESSION['complete'] = "TRUE";
            $_SESSION['userId'] = $userId;
            SAConfLogin(); 
      //break; 
          }
}  

       function login(){
          //filter and store email and password
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $userMatch = checkExistingUserName($userName);
        $userPW = filter_input(INPUT_POST, 'userPW', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($userPW);
        //echo $userPW; 
        //exit; 


        if (!$userMatch) {
            $_SESSION['message_1'] = "There is no user with that username.";
            header("Location: /login");
        }

        //there is a $userMatch so continue onward: 
        $clientData = getUser($userName);
        $userId = $clientData[0]['userId'];

        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($userPW, $clientData[0]['userPW']);
      

        // If the hashes don't match create an error and return to the login view
        if (!$hashCheck) {
            $_SESSION['message_1'] = '<p class="notice">Please check your email and password and try again.</p>';
            header('Location: /login/?error=missinghash');
            exit;
        }

        // Remove the password from the array the array_pop function removes the last element from an array
        unset($clientData[0]['userPW']);

        //var_dump($clientData['level']); 
        // Store the array into the session
        $level = $clientData[0]['level'];

        $_SESSION['userLevel'] = $level;
        $_SESSION['userId'] = $userId;
        
        $_SESSION['clientData'] = $clientData[0];

        // A valid password exists, proceed with the login process
        // A valid user exists, log them in
        $_SESSION['loggedin'] = "True";

        //Use this to format the phone number in the display: 
        $phone = $_SESSION['clientData']['phone'];
        $format = formatPhoneNumber($phone);
        $_SESSION['phone'] = $format;
        $_SESSION['userName'] = $userName;
}
