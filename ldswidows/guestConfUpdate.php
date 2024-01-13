<?php
/*
 * Template Name: GuestUpdate
 Template Post Type: Account
 */

/* other PHP code here */
session_start();
$_SESSION['guestloggedin'];
$_SESSION['guestUpdateAZ'];
$_SESSION['getRegData']; 
$_SESSION['confId']; 
$_SESSION['arizonaGuest_Id'];
$arizonaGuest_Id = $_SESSION['arizonaGuest_Id'];
$confId = $_SESSION['confId']; 

if (!$_SESSION['guestloggedin']) {

    $_SESSION['message'] = "You are currently not logged in, to update your account you need to be logged in. ";
    header("Location: /account/login");
}
 

get_header();

?>


<div class="page-banner">
    <?php pageBanner(array(
        'title' => " Guest Registration ",
    )); ?>
</div> 


<div class="container container--narrow page-section">
<h5 class="heading1"> Need to Update your Arizona Registration? </h5>
 <p class="t-left"> <?php if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
        } ?>

      
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
</p>


<div> 

 <form id="reg" action="/arizona/index.php" method="post">
 <?php if($confId == "11"){ ?>
      
       <?php  get_template_part('template-parts/AZG', 'form'); ?>
           
           <div class="grid-5">
           <button class="column-1 btn btn--blue full-width">Update Registration</button> 
           <button class="btn full-width" style="background-color: #DC143C; "><a  style="text-decoration: none; color: white;" href="/conferences/arizona-regional/">Cancel</a></button> 
           <button class="btn btn--dark-orange full-width"><a style="text-decoration: none; color: white;" href="/arizona/index.php?action=AZGDelete&arizonaGuest_Id=<?php echo $arizonaGuest_Id ?>">Delete Registration</a></button>
            <!--Add the action name - value pair -->
            <input type="hidden" name="action" value="guestUpdateAZ">



            <input type="hidden" name="arizonaGuest_Id" class="input" id="userId" <?php if (isset($arizonaGuest_Id)) {
                                                                                echo "value = '$arizonaGuest_Id'";
                                                                            } elseif (isset($_SESSION['clientData'])) {
                                                                                echo 'value="' . $_SESSION['getReg']['arizonaGuest_Id'] . '"';
                                                                            } ?>> <br>
       <?php } ?>
        </form>
</div> 
<!-- div  is for styling purposes only -->


</div> 

</div> 
</div> 
</div>
<?php get_footer(); ?>


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






<?php unset($_SESSION['message']);
unset($_SESSION['success']);  ?>