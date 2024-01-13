<?php
/*
 * Template Name: signup
 */

/* other PHP code here */
session_start();
?><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>

<body>

<?php get_header();
$userId = $_SESSION['userId']; 
$clientData =  $_SESSION['clientData']; 
//var_dump($_SESSION['getDesc']); 
?>


<h3 id="title">
       <?php if (isset($_SESSION['volunteerInfo']))
          echo "Welcome " . $_SESSION['volunteerInfo']['firstName'] . ' ' . $_SESSION['volunteerInfo']['lastName']; 
          ?>
</h3>
    <main id="content" class="neve_main">
        <div class="trial"> 
            <div> 
               <h4 id="volunteer_1">Here is the information that we have for you:</h4>
            <!-- div  is for styling purposes only -->
          </div>
    <div class="row_1"> 
        <div class="column">
          <?php if(isset($_SESSION['volunteerInfo'])){ 
            $firstName = $_SESSION['volunteerInfo']['firstName']; 
            $lastName = $_SESSION['volunteerInfo']['lastName']; 
            $email = $_SESSION['volunteerInfo']['email']; 
            $phone = $_SESSION['volunteerInfo']['phone'];  
            $preferred_contact = $_SESSION['volunteerInfo']['preferred_contact'];
          } 
           if(isset($_SESSION['getDesc'])){
            $thursday = $_SESSION['getDesc']['Thursday'];
            $friday =  $_SESSION['getDesc']['Friday'];
            $saturday = $_SESSION['getDesc']['Saturday'];
             
          }?>
          
          <label>Name: 
           <?php if(isset($firstName)){ 
            echo $firstName ." " . $lastName; 
          }?></label><br>

          <label>Email:</label> <?php if(isset($email)){ 
            echo $email; 
          }?><br>
          
           <label>Phone:</label> <?php if(isset($phone)){ 
            echo $phone; 
          }?><br>

          <label>Preferred Contact Method: <?php if(isset($preferred_contact)){ 
            echo $preferred_contact; 
          }?></label><br>

          <label>Thursday: <?php if(!empty($thursday)){ 
            echo $thursday; 
          }?></label><br>
           <label>Friday: <?php if(!empty($friday)){ 
            echo $friday; 
          }?></label><br>

          <label>Saturday: <?php if(!empty($saturday)){ 
            echo $saturday; 
          }?></label>
          <form method="post"  >
        <?php
        if(array_key_exists('button1', $_POST)) {
            button1();
        }
        
        function button1() {
           // the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("wabbitslayer24@gmail.com","My subject",$msg);
        }
      
    ?>
        <input type="submit" name="button1"
                class="btn " value="Send Email" />
       
      
    </form>


        </div> 
        </div> 