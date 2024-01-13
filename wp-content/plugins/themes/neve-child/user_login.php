<?php
/*
 * Template Name: Login
 */

/* other PHP code here */
session_start();

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3600) {
  // last request was more than 15 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  session_start(); 
  $_SESSION['loggedin'] = false; 

  header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp


?>

<head>
    <DOCTYPE html>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        
        <link rel="stylesheet" href="  /style.css" media="screen">
        

</head>
<?php get_header(); ?>

<body>
<h3 id="idle">
</h3> 
    <main  class="neve_main_photo">
        <div class="trial">
            <div class="row_1">
               <div></div>
            
                  <div id="sidebar" class="sidebar_b">
                    <header class="btn">
                        Login to your account
                    </header>
                    <p id="alert" class="display alert"> 
                        <?php if (isset($_SESSION['message_1'])) {
                            echo $_SESSION['message_1'];
                            } 
                            if (isset($_SESSION["resetMessage"])){ 
                            echo $_SESSION["resetMessage"]; 
                            }
                            if (isset($_SESSION["idle"])){ 
                            echo $_SESSION["idle"]; 
                            }
                           ?>


                    </p>
                    <form action="/accounts/index.php" method="post">
                       
                        <label class="input">Username:</label><br>
                        <input type="text" class="input" name="userName" <?php if (isset($userName)) {
                                                                                echo "value='$userName'";
                                                                            }  ?> required><br><br>
                        <label class="input">Password:</label><br>

                        <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <br><br>

                        <input type="submit" name="submit" value="Sign In" id="submit"> <br> <br>
                        <input type="hidden" name="action" value="Login">


                    </form>
                   
                
                    
                    
                       
                    <div class="row_2"> 
                    <div> </div>
                   
                     <header class="btn">
                       
                    </header><br>
                    
                <div class="reset"> 
        
           <a class="adminBtn" name="cancel" href="/create-account"> Create Account </a>
           <a class="adminBtn" name="cancel" href="/username"> Forgot Your Username? </a>
           <a class="adminBtn" name="cancel" href="/password">Forgot Your Password </a>
        </div>
        </div> 
</div>
</div>
</div>

    </main>
    <footer id="page_footer">
        <?php get_footer();  ?>
    </footer>
     <script type="test/javascript" src=" /library/account.js"></script>
   
</body>

</html>
<?php unset($_SESSION['idle']);
      unset($_SESSION['message_1']); ?> 
