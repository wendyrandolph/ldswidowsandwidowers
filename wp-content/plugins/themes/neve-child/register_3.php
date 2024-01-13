<?php
/*
 * Template Name: Registration_3
 */

/* other PHP code here */
session_start(); 
?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Options</title>
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
               <h3 id=register_1>Which meals will you be having?</h3>
            <!-- div  is for styling purposes only -->
           
            <?php 
            if(isset($_SESSION['message'])) { 
                echo $_SESSION['message']; 
            }
            ?>
            </div>
<form action="/accounts/index.php" method="post" > 
            <h4> Thursday Meals </h4> 
            <input type="checkbox" id="meal_1" name="meal_1" value="Thursday Night Meal">
            
            <label for="meal_1">Thursday night refreshments </label>
            <p> Dinner is on your own that night, but please feel free to get take-out and bring your food back to the institute building and eat there. </p>
            
            <h4> Friday Meals </h4> 
            <input type="checkbox" id="meal_2" name="meal_2" value="Friday Lunch">
            <label for="meal_2">Box Lunch  </label>
            <p> - Croissant Sandwhich, fruit, chips, cookie. </p>
      
            <input type="checkbox" id="meal_3" name="meal_3" value="Friday GF Lunch">
            <label for="meal_3"> Gluten Free Lunch   </label><br>
            <p> - Salad, fruit, GF brownie. </p>
            
            <input type="checkbox" id="meal_4" name="meal_4" value="Friday Dinner">
            <label for="meal_4">Dinner:  </label><br>
            <p> - Chicken Cordon Bleu, rice pilaf, green salad, breadsticks, mint brownies </p>
            
            <input type="checkbox" id="meal_5" name="meal_5" value="Friday GF Dinner">
            <label for="meal_5">Gluten Free Dinner </label>
            <p> - Chicken breast, rice pilaf, green salad, fruit, GF mint brownies </p>
            
            <h4>Saturday Meals </h4>
            <input type="checkbox" id="meal_6" name="meal_6" value="Saturday Lunch">
            <label for="meal_6">Lunch </label>
            <p> - Panda Express </p>
            
            <input type="checkbox" id="meal_7" name="meal_7" value="Saturday GF Lunch">
            <label for="meal_7">Gluten Free Lunch</label><br>
             <p> - Salad and fruit, or possibly something else </p>
           
            <input type="checkbox" id="meal_8" name="meal_8" value="Bring My Own Meals">
            <label for="meal_8">I will bring my own meals. </label><br><br>
             
            
 <input type="submit" value="Next" class="btn register" ><br><br>
            <input type="hidden" name="action" value="meals"> 
            <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>> <br> 
            </div> 
            </div> 
            </div> 
            </main> 