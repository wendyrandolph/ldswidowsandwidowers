<?php
/*
 * Template Name: Password
 */

/* other PHP code here */
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
  
</head>

<body>

    <?php get_header();
    $userId = $_SESSION['userId'];
    $clientData =  $_SESSION['clientData'];
    ?>

   <body >

 <main id="content" class="neve_main">
     <div class="trial">
            <div class="row_1">
                <div></div> <!-- Force the data into the second column --> 
               <div id="column">
               
             <?php   if (!($_GET["reset"])){ 
                echo '<header class="btn">Forgotten Password</header>'; 
                        echo '<form action="../includes/reset-request.inc.php" method="post">'; 
                        echo "<p class='display'> If you have an account on this site, please enter your username. If you don't have an account yet, please create an account. </p></br>";
                        echo '<input class="pass" type="text" name="pwdResetUserName" placeholder="Enter your username" required>'; 
                        echo '<button id="submit" type="submit" name="reset-request-submit">Request to Reset Password </button>'; 
                        echo '</form>'; 
                         } ?> 
                    <div> 
                 <div style="padding-bottom: 30px;">
                    <header class="btn">
                     Do you already have an account?
                    </header>
                    <p class="display">  If you have already created an account, please login: </p> 
                    <a class="submit"  href="/login">Login</a> <br><br>
                     <header class="btn">
                        Need to Create an Account? 
                    </header>
                    <p class="display">  If you need to create an account: </p> 
                    <a class="submit"  href="/create-account">Create Account</a>  
      </div>



                      <button id="forgotU" name="reset"> <a href="/username">Forgot Your Username</a> </button>
                <?php

                    if (isset($_GET["reset"])) {
                        if ($_GET["reset"] == "success") {
                            echo '<header class="btn">Close this window</header>'; 
                            echo '<p class="display alert"> Check your e-mail for the Password Reset Link!</p>';
                            echo '<button onclick="return close_Window();"> Close Window </button>'; 
                             echo  "<script type='text/javascript'>";
    echo "window.close();";
    echo "</script>";  
                        } 
                    } 
                    ?> 
            
        </div>
    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
</body>
 
   <script type="text/javascript" src=" /library/account.js"></script>
   

</html>
<?php unset($_SESSION['message']); ?>