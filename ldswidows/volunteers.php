<?php
/*
 * Template Name: Volunteers
 */

/* other PHP code here */
session_start(); 
?><head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer</title>
    <link rel="stylesheet" href="/style.css" media="screen">
</head>


<body>

<?php get_header(); 
?> 
 <main id="content" class="neve_main">
<div class="trial"> 
    <div class="row_2"> 
        <div class="column_1">
        <div>
<h3 id="title">
       <?php if (isset($_SESSION['clientData']))
          echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; 
          ?>
</h3>
 <div> 
 <h2 id=register_1>We need help with these conference tasks. Please sign up to help in some way.</h2>
            <!-- div  is for styling purposes only -->
            
            <p class="alert"> 
            <?php 
            if(isset($_SESSION['message_3'])) { 
                echo $_SESSION['message_3']; 
            }
            ?>
</p> 
            
                <form action="/accounts/index.php" method="post" >
                
                
                <label >First Name:</label><br>
                <input  type="text" name="firstName"  class="input" <?php if(isset($firstName)){echo "value='$firstName'";}  ?> required><br><br>
                <label >Last name:</label><br>
                <input type="text" class="input" name="lastName" <?php if(isset($lastName)){echo "value='$lastName'";} ?> required><br><br>
                <label >Email:</label><br>
                <input type="email" class="input" name="email" <?php if(isset($email)){echo "value='$email'";} ?> required><br><br>
                <label> Phone Number: </label><br> 
                <input type="tel" name="phone" class="input" <?php if(isset($phone)){echo "value='$phone'";} ?> ><br><br>
              <h4> Preferred Contact: </h4>
                <input type="radio" name="preferred_contact" value="phone" >
                <label> Phone Call</label><br> 
                <input type="radio" name="preferred_contact" value="text" >
                <label> Text</label><br> 
                <input type="radio" name="preferred_contact" value="email">
                <label> Email </label><br><br> 
                 <h4 for="thursday">Thursday Tasks </h4>
                <select name="thursday" id="thursday">
                <option value="">--Please choose an option--</option>
                <option value="job_101">12:00pm - Table Set Up</option>
                <option value="job_102">12:00pm - Table Decorations</option>
                <option value="job_103">12:00pm - Set Up Chairs in Rooms</option>
                <option value="job_104">4:00pm - Set Up Volleyball and Square Dance</option>
                <option value="job_105">9:00pm - Clean Up after the dance</option>
                <option value="job_118">Main Floor Bathrooms Empty Garbage & Replenish TP</option>
                <option value="job_116">Upper Floor Bathrooms Empty Garbage & Replenish TP  </option>
                <option value="job_117">Lower Floor Bathrooms Empty Garbage & Replenish TP  </option>
</select><br><br>
                <h4 for="friday"> Friday Tasks </h4>
                <select name="friday" id="friday">
                <option value="">--Please choose an option--</option>
                <option value="job_108">1:00pm - Kitchen Helpers - Friday Lunch (Lunch)</option>
                <option value="job_106">Empty Garbage after Lunch</option>
                <option value="job_109">6:00pm - Kitchen Helpers (Dinner)</option>
                <option value="job_107">Empty Garbage after Dinner</option>
                <option value="job_110">Cleanup After the Dance</option>
                <option value="job_121">Main Floor Bathrooms Empty Garbage & Replenish TP  </option>
                <option value="job_119">Upper Floor Bathrooms Empty Garbage & Replenish TP  </option>
                <option value="job_120">Lower Floor Bathrooms Empty Garbage & Replenish TP  </option>
                </select><br><br>
                <h4 for="saturday"> Saturday Tasks </h4>
                <select name="saturday" id="saturday">
                <option value="">--Please choose an option--</option>
                <option value="job_111">Morning Snack Helpers</option>
                <option value="job_112">Kitchen Helpers - Saturday Lunch(Lunch)</option>
                <option value="job_113">Put Chairs and Tables Away</option>
                <option value="job_114">Empty Garbages</option>
                <option value="job_115">Load Vehicles with Conference Supplies</option>
                </select><br><br>
                <input type="submit" value="Signup" class="btn register" >
                <!--Add the action name - value pair --> 
                <input type="hidden" name="action" value="volunteers"> 
                <button type="button" class="btn register"><a href="https://ldswidowsandwidowers.com/help-needed/"   >Go Back </a></button> 
 
  </form>
       
  </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
</body>