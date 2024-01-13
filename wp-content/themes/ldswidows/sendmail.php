<?php
/*
 * Template Name: sendmail
 */

/* other PHP code here */
session_start(); 
$userId = $_SESSION['userId']; 



if(!$_SESSION['loggedin']){ 
    header("Location: /login"); 
    exit; 
}

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




?>
<!doctype html>
<head> <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Update</title>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
 
    <link rel="stylesheet" href="  /style.css" media="screen">
    
</head>

<?php get_header(); ?>

<body> 
<main id="content" class="neve_main">
<div class="trial"> 
    <div class="row_1"> 
        <div class="column">
          <div>
             <h3 id="title">
              <?php if (isset($_SESSION['clientData']))
              echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; 
              ?>
              </h3>
          </div>
          <form action="/users/index.php" method="post" > 
              <p> If you need to send an urgent email update, please include what the message is: </p> 
               <label> Email Message: </label> <br>
               <textarea name="message" id="message" rows="10" cols="100"> 
               </textarea><br>
               <input type="submit" value="Send Email" class="btn" ><br><br>
               
               <input type="hidden" name="userId" class="input" id="userId"  <?php if(isset($userId)) { 
                    echo "value = '$userId'"; 
                 }elseif(isset($_SESSION['clientData'])) { 
                     echo 'value="' . $_SESSION['clientdata']['userId'] .'"'; 
                 }?>>
                 <input type="hidden" name="action" value="message"> 
                  <br> 
          </form> 
        </div> 
    </div>        
</div> 
</main> 

    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
  
   <script type="text/javascript" src=" /library/account.js"></script>
 <script src="/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
   console.log("I see this"); 
  tinymce.init({
    selector: 'textarea#message',
    mode: 'textareas',
  preview_styles: false
  });
</script> 
</body>


  