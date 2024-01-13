<?php
/*
 * Template Name: regUpdate3
 Template Post Type: account
 */

/* other PHP code here */
session_start();
$_SESSION['regUp_3'];
$_SESSION['conf1'];
$conf1 =  $_SESSION['conf1'];
$_SESSION['userId'];
$userId = $_SESSION['userId'];
$_SESSION['mealId']; 
$mealId = $_SESSION['mealId']; 
//var_dump($mealId[0]['meal2']); 
//exit; 


$meal1_val = $mealId[0]['meal1'];
$meal2_val = $mealId[0]['meal2'];
$meal3_val = $mealId[0]['meal3'];

//echo $meal1_val, $meal2_val, $meal3_val;
//exit; 

$meal1 = $confDetails_3[0]['meal1'];
$meal2 = $confDetails_3[0]['meal2'];
$meal3 = $confDetails_3[0]['meal3'];

 
if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}

//var_dump($_SESSION['clientData']); 


//echo $_SESSION['part3']; 
// exit; 
 
if($_SESSION['regUp_3']  === "TRUE"){

?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conference Registration Part 3</title>
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
                <div id="sidebar" >
                    <header class="btn">
                        <?php echo $conf1 ?> - Step 6
                    </header>
                         
               
                    
            <!-- div  is for styling purposes only -->
           
            <?php 
            if(isset($_SESSION['message'])) { 
                echo $_SESSION['message']; 
            }
            ?>
            </div><br>

             
              <form action="../users/index.php" method="post" >
             <fieldset>
        
            <legend style="color: white; font-weight: 400; text-transform: uppercase; font-size: 16px;"> Please Select Which Meals you will be eating with us at the conference: </legend> <br>
             
             <header class="step5"> Friday </header> 
             <span class="mobile"> <input type="checkbox" id="meal1" name="meal1" class="meal1" <?php if (isset($meal1_val)) {
                                                                                                    echo "value = '7' checked='checked' ";
                                                                                                } elseif (!isset($meal1_val)) {
                                                                                                    echo 'value="' . 7 . '" "';
                                                                                                } ?> >
             <label class="align"  for="meal1">Friday Meet and Greet - Please bring finger foods to share.</label></span><br>
             
             
             <header class="step5"> Saturday Lunch - Select One</header> 
             <p id="invalid2" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>
               
             <span class="mobile"><input type="radio" id="meal2" name="meal2" class="meal2" required <?php if($meal2_val == "8") {
                                                                                                    echo "value = '8' checked='checked'";
                                                                                                } elseif ($meal2_val != "8") {
                                                                                                    echo 'value="' . 8 .' "';;
                                                                                                }?>>
              <label class="align"   for="meal2">Saturday Lunch - Box lunch provided by USU Catering. **Ham**, chips, canned soda or water and a whole fruit or cookie.</label></span><br>
              <span class="mobile"><input type="radio" id="meal3" name="meal2" class="meal2" <?php if ($meal2_val == "9") {
                                                                                                    echo "value = '9' checked='checked'";
                                                                                                } elseif ($meal2_val != "9") {
                                                                                                    echo 'value="' . 9 .' "';
                                                                                                }?>>
              <label class="align"  for="meal2">Saturday Lunch - Box lunch provided by USU Catering. **Turkey**, chips, canned soda or water and a whole fruit or cookie.</label></span><br>
              
              <span class="mobile"><input type="radio" id="meal4" name="meal2" class="meal2" <?php if ($meal2_val == "10") {
                                                                                                    echo "value = '10' checked='checked'"; 
                                                                                                } elseif ($meal2_val != "10") {
                                                                                                     echo 'value="' . 10 .' "';
                                                                                                }?>>
              <label class="align"  for="meal2">Saturday Lunch - I will bring my own lunch</label></span><br>

              <header class="step5"> Saturday Dinner - Select One</header> 
              <p id="invalid3" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>
               
              <span class="mobile"><input type="radio" id="meal5"  name="meal3" class="meal3" <?php if ($meal3_val == "11") {
                                                                                                    echo "value = '11' checked='checked'";
                                                                                                } elseif ($meal3_val != "11") {
                                                                                                    echo 'value="' . 11 .' "';
                                                                                                }?>>
              <label class="align"  for="meal3">Saturday Dinner - Catering by Costa Vida</label></span><br>
             
              <span class="mobile"><input type="radio" id="meal6" name="meal3" class="meal3" <?php if ($meal3_val == "12") {
                                                                                                    echo "value = '12' checked='checked'";
                                                                                                } elseif ($meal3_val != "12") {
                                                                                                    echo 'value="' . 12 .' "';
                                                                                                }?>>
              <label class="align"  for="meal3">Saturday Dinner - I will bring my own dinner</label></span><br>


           

            
            
            <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo ' value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>> <br> 

                 <div class="formHandling">   
                            
                                <button class="updatebtn" type="reset" >Reset</button>
                            <button class="updatebtn" type="submit" value="Next" >Next</button><br><br>
                                <input type="hidden" name="action" value="regUpdate_4">
                            </div> 
                            </fieldset>
                 </fieldset>
           </form> 
           </div> </div> </div> </main>  


           
   

 <script type="text/javascript" src=" ../library/account.js"></script>

        </body> 

         <?php } else { 
               header("location: /profile"); 
           } ?> 