<?php
/*
 * Template Name: Registration_2
 */

/* other PHP code here */
session_start(); 
?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>

<body>

<?php get_header();
$userId = $_SESSION['userId']; 
$clientData =  $_SESSION['clientData']; 
?>


<h3 id="title">
       <?php if (isset($_SESSION['clientData']))
          echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; 
          ?>
</h3>
    <main id="content" class="neve_main">
<div class="trial"> 
    <div class="row_1"> 
        <div class="column">
           <div> 
               <h4 id=register_1>Which activities would you like to participate in?</h4>
            <!-- div  is for styling purposes only -->
           
            <?php 
            if(isset($_SESSION['message'])) { 
                echo $_SESSION['message']; 
            }
            ?>
            </div>
 
 

            <form action="/accounts/index.php" method="post" > 
            <h4> Thursday Activities </h4> 
            <input type="checkbox" id="thursday_1" name="thursday_1" value="Temple Session">
            <label for="thursday_1">Thursday morning temple session  9-11am </label><br>
            <input type="checkbox" id="thursday_2" name="thursday_2" value="Bowling1">
            <label for="thursday_2"> Bowling & Billiards 2-3pm </label><br>
            <input type="checkbox" id="thursday_3" name="thursday_3" value="Bowling2">
            <label for="thursday_3"> Bowling & Billiards 3-4pm </label><br>
            <input type="checkbox" id="thursday_4" name="thursday_4" value="Institute Activities">
            <label for="thursday_4">Activities at the Institute Building 2-5pm </label><br>
            <input type="checkbox" id="thursday_5" name="thursday_5" value="Pickleball">
            <label for="thursday_5">Pickleball at Club Pickleball 2-4pm</label><br>
            <input type="checkbox" id="thursday_6" name="thursday_6" value="Institute Activities">
            <label for="thursday_6">Evening Social & Hoedown 7 pm</label><br><br>
            <h4> Friday Activities </h4> 
            <input type="checkbox" id="friday_1" name="friday_1" value="Keynotes and Workshops">
            <label for="friday_1">Friday keynotes and workshops 9:30am</label><br>
            <input type="checkbox" id="friday_2" name="friday_2" value="Line Dancing">
            <label for="friday_2">Line dancing, games, karaoke 7:30pm </label><br><br>
            <h4>Saturday Activities </h4> 
            <input type="checkbox" id="saturday_1" name="saturday_1" value="">
            <label for="friday_1">Saturday keynotes and workshops 9:30am</label><br>
            <input type="checkbox" id="friday_2" name="friday_2" value="Keynotes and Workshops">
            <label for="friday_2">Saturday Cleanup </label><br><br>
 <input type="submit" value="Next" class="btn register" ><br><br>
            <input type="hidden" name="action" value="activities"> 
            <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>> <br> 
           </form> 
           </div> </div> </div> </main>       