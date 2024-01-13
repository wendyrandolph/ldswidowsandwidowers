<?php
/*
 * Template Name: confReg_4
 */

/* other PHP code here */
session_start(); 
//var_dump($_SESSION); 
//exit; 
$_SESSION['conf1']; 
$conf1 = $_SESSION['conf1']; 
$_SESSION['userId']; 
//echo $_SESSION['userId']; 
//exit; 
$userId = $_SESSION['userId'] ;
$_SESSION['dataArray']; 
//echo $_SESSION['dataArray']['1'];

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
 if($_SESSION['part4'] === "TRUE"){


?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration Part 4</title>
    

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
                        <?php echo $conf1 ?> - Step 4
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
         <legend for="topic" style="color: white; font-weight: 400;"> Please choose 3 classes you would be interested in attending. This will help us schedule locations and if it needs to be offered more than once. This is not a commitment to attend and you can change your mind the day of.  </legend> <br>
               
            
             <p id="invalid" style="background: white; color: red; text-transform: uppercase; font-size: 16px; text-align: center; "></p>
               
             
             <input type="checkbox" id="topic1" name="topic1" class="topic" value="1" onclick=" return limitFunc();">
             <label class="align"  for="topic1">Understanding Your Patriarchal Blessing</label><br>
             <input type="checkbox" id="topic2" name="topic2" class="topic" value="2" onclick=" return limitFunc(); ">
              <label class="align"   for="topic2">Mending What is Broken.  A Focus on Improving Mental and Emotional Well-Being</label><br>
              <input type="checkbox" id="topic3" name="topic3" class="topic" value="3" onclick=" return limitFunc(); ">
              <label class="align"  for="topic3">Moving Forward - My Way or God's Way</label><br>
              <input type="checkbox" id="topic4" name="topic4" class="topic" value="4" onclick=" return limitFunc(); ">
              <label class="align"  for="topic4">Handling Compounded Grief</label><br>
            <input type="checkbox" id="topic5"  name="topic5" class="topic" value="5" onclick=" return limitFunc(); ">
              <label class="align"  for="topic5">How to Keep Your Faith When You Have Lost So Much</label><br>
             <input type="checkbox" id="topic6" name="topic6" class="topic" value="6" onclick=" return limitFunc(); ">
              <label class="align"  for="topic6">Happily Single 'Til Your Happily Ever After – A Dating Class</label><br>
             <input type="checkbox" id="topic7" name="topic7" class="topic" value="7" onclick=" return limitFunc(); ">
              <label class="align"  for="topic7">Time Management, Organization, and Widow Fog, Oh My! Helping Your Brain WORK</label><br>
            <input type="checkbox" id="topic8" name="topic8" class="topic" value="8" onclick=" return limitFunc(); ">
              <label class="align"  for="topic8">Finances in Widowhood</label><br>
            <input type="checkbox" id="topic9" name="topic9" class="topic" value="9" onclick=" return limitFunc(); ">
              <label class="align"  for="topic9">Emotional Self Care:  When to Say "No!" and When to Leap in Faith</label><br>
              <input type="checkbox" id="topic10" name="topic10" class="topic" value="10" onclick=" return limitFunc(); ">
              <label class="align"  for="topic10">Thriving through widowhood: How to create the life you want</label><br>
             <input type="checkbox" id="topic11" name="topic11" class="topic" value="11" onclick=" return limitFunc(); ">
              <label class="align"  for="topic11">Parenting Through Grief</label><br> 

            <input type="submit"  value="Next" id="submit" ><br><br>
            <input type="hidden" name="action" value="step4"> 
            <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo ' value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>> <br> 
                 </fieldset>
           </form> 
           </div> </div> </div> </main>  


           
   

 <script type="text/javascript" src=" ../library/account.js"></script>

        </body> 

         <?php } else { 
               header("location: /profile"); 
           } ?> 