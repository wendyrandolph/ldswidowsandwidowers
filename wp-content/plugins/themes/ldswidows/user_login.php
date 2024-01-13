<?php
/*
 * Template Name: Login
 * Template Post Type: Account
 */

/* other PHP code here */
//unset($_SESSION); 
session_start();
//var_dump($_SESSION); 
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


while(have_posts()) { 
    the_post(); }
    ?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/0d75631ddc5db8b4d6325c3a4e95b8e5.webp'); ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Login to your account</h1>
        <div class="page-banner__intro">
        </div>
      </div>
    </div>
<?php get_header(); ?>
<div class="container container--narrow page-section ">
  
 <div class="row_lg"> 
 <div class="column">
                 <h5 class="page-links__title">Access your account by logging in</h5>
                   
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
                   <form action="/accounts1/index.php" method="post">
                       
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
                  </div> 
 <div class="page-links">
    <h5 class="page-links__title">Need Help?</h5>
    <ul class="nav flex-column">
     <a class="nav-link" name="cancel" href="/create-account"> Create Account </a>
           <a class="nav-link" name="cancel" href="/username"> Forgot Your Username? </a>
           <a class="nav-link" name="cancel" href="/password">Forgot Your Password </a>
    </ul>
  </div>  
</div> 





  </div> 
 <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script type="text/javascript" src=" /library/account.js"></script>


</body>



<?php unset($_SESSION['message_1']);
unset($_SESSION['success']);
unset($_SESSION['delete']); 
unset($_SESSION['idle']);?>

