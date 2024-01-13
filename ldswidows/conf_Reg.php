<?php
/*
 * Template Name: conf_Reg
 Template Post Type: conference

/* other PHP code here */
session_start();

$_SESSION['success'];
$_SESSION['confId8'];
$_SESSION['conf2'];

$confId2 = $_SESSION['confId8'];

$_SESSION['userId'];
$_SESSION['remarried'];
$_SESSION['idaho'];

$_SESSION['spouse'];
//echo $_SESSION['spouse']; 
//echo $_SESSION['remarried'];
$userId = $_SESSION['userId'];
//var_dump($_SESSION); 
//exit; 



$_SESSION['registr'] = "TRUE";
//var_dump($_SESSION['clientData']);

$clientData =  $_SESSION['clientData'];

get_header();

?>
<input type="hidden" id="idaho" value="<?php echo $_SESSION['idaho']; ?>" />
<div class="page-banner">
  <?php pageBanner(); 
   //Grab the parent Id to aide in the brcrumb 
            $theParent1 = wp_get_post_parent_id();?>
</div>
<div class="page-links">
      <h5 class="page-links__title"><a href="<?php echo get_the_permalink($theParent1) ?>"><?php echo get_the_title($theParent1); ?></a></h5>
      <ul class="p-links">

        <?php
        //GET PARENT PAGE IF THERE IS ONE
        if ($post->post_parent) {
          $ancestors = get_post_ancestors($post->ID);
          $root = count($ancestors) - 1;
          $parent = $ancestors[$root];
        } else {
          $parent = $post->ID;
        }

        $args = array(
          'post_type' => 'conference',
          'child_of' => $parent,
          'parent' =>  $parent,
          'title_li' => '',
          //'post__not_in' =>  $grandPage,

        );

        $the_query = new WP_Query($args);

        //GET CHILD PAGES IF THERE ARE ANY
        $children = get_posts(array(
          'post_type' => 'conference',
          'child_of' => $parent,

        ));


        //DO WE HAVE SIBLINGS?
        $siblings =  get_pages(array(
          'child_of' => $parent,
          'post_type' => 'conference',

        ));

        if (count($children) != 0 and count($siblings) > 0) {
          wp_list_pages($args);
        }




        ?>
      </ul>
     
      <?php
  
      if (($post->ID == '2742') and $_SESSION['remarried'] == 'True') { ?>
        <h5 class="page-links__title"> Manage Registration </h5>
       <li class="page_item"> <a name='update' href=' /users/index.php?action=remUpdate&confId2=<?php echo $confId2 ?>'> Update My Registration </a>
       <li class="page_item"> <a  name="cancel" href=" /users/index.php?action=remDelete&confId2=<?php echo $confId2 ?>"> Cancel My Registration </a>
      <?php }
?>
    </div> <!-- End of Page-links Div -->

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <?php
      //Grab the parent Id to aide in the breadcrumb 
      $theParent1 = wp_get_post_parent_id();
      ?>

      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('conference'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Conferences</a> <span class="metabox__main"><?php the_title(); ?> </span>

    </p>
  </div>
  <div>
    
 </div> 

   <!-- <?php if (!$_SESSION['loggedin']) { ?>
      <h5 class="heading1"> In order to register, please login </h5>
    <?php } ?> -->
<?php
    if ($post->ID = 2738){ ?>
     <p class="success">There is not an open registration for this conference.</p><br>
    

  <?php  }

        if (($post->ID = 2742) and $_SESSION['remarried'] == 'True') { ?>
      <h5 class="heading1"> Your Registration Details </h5>
    <?php } ?>
    
<?php    if (($post->ID = 2742) and $_SESSION['remarried'] == 'False') { ?>

        <p class="t-left"> <?php
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
                            }
                            if (isset($_SESSION['delete'])) {
                              echo $_SESSION['delete'];
                            }

                            ?></p>

        <?php }
      /*  if (!$_SESSION['loggedin']) { ?>
          <form action="/accounts1/index.php" method="post">
          ** If you have not created an account, please do so first. 
              <ul class="p-links"> 
                <li style="list-style: none; "> <a href="/account/create-account">Create Account</a></li>
                </ul> 
            <label class="input">Username:</label><br>
            <input type="text" class="input" name="userName" <?php if (isset($userName)) {
                                                                echo "value='$userName'";
                                                              }  ?> required><br><br>
            <label class="input">Password:</label><br>

            <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <br><br>

            <input type="submit" name="submit" value="Sign In" id="submit"> <br> <br>
            <input type="hidden" name="action" value="Conf_Login_RL">


          </form>
      </div> 

      }*/
        if ($post->ID == '2742') {
          if ($_SESSION['remarried'] == 'False') { ?>

    <!--    <h5 class="heading1">Conference Registration - Step 1</h5>
        <div class="full-width-split">
          <div class="full-width-split__one">
            <div class="presentation">

              <!-- Insert the form here -->
              <!-- Provide a place to show alert messages if necessary -->


            <!--  <form action="/users/index.php" method="post">
                <?php chooseConf(); ?>
              </form>
            </div>
          </div> -->
        <? } 
        elseif ($post->ID == '2742' and $_SESSION['remarried'] == 'True') { ?>


          <div>
            <ul>

              <?php echo $_SESSION['buildRL']; ?>
            </ul>
          </div>
      <?php    }
       }?>

        </div>
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
  </div> 
   </div> 
   </div> 
   </div> 
<?php }
get_footer();
unset($_SESSION['delete']);
unset($_SESSION['success']);



?>