<?php
/*
 * Template Name: Create
 */

/* other PHP code here */
session_start();


// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    $_SESSION['loggedin'] = false;
    $_SESSION['loggedOut'] = "You have been logged out.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<?php get_header(); ?>

<body>
    <main class="neve_main">
        <div class="add_1">
            <?php
            if (isset($_SESSION['loggedOut'])) {
                echo  $_SESSION['loggedOut'];
            } ?>
        </div>
        <div class="trial">
           <div class="row_1">
           <div class="column">
           <p class='display'>  In an effort to help utilize future conference registrations, and have easy access to recorded content that we've been asked to keep only amongst our 
           group, we have created an account system here on our site.  The process is easy, and quick, after you've created an account you'll be able to login, and have access to the
           most recent Salt Lake City conference material, and recordings that we've been able to add to the site already.  
           
           
           </div>
                <div id="sidebar">
                    <header class="btn">
                     Account Creation 
                    </header>
                    <p class="display"> Please enter your email, if you registered for the March 2023 Salt Lake conference, please use that email address. </p>
                    <form action="../accounts/index.php" method="post" >
                    <label>Email:</label><br>
                    <input type="email" class="input" name="userEmail" <?php if (isset($userEmail)) {
                                                                                    echo "value='$userEmail'";
                                                                                } ?> required><br><br>
                      <label>First Name:</label><br>
                    <input type="text" class="input" name="firstName" <?php if (isset($firstName)) {
                                                                                    echo "value='$firstName'";
                                                                                } ?> required><br><br>  
                     <label>Last Name:</label><br>
                    <input type="text" class="input" name="lastName" <?php if (isset($lastName)) {
                                                                                    echo "value='$lastName'";
                                                                                } ?> required><br><br>                                                        
                     <input type="submit" value="Next" id="submit" name="submit" ><br><br>
                     <input type="hidden" name="level" value= 1>
                     <!--Add the action name - value pair -->
                     <input type="hidden" name="action" value="account_creation">
                    </form>
                    <div style="padding-bottom: 30px;">
                    <header class="btn">
                     Do you already have an account?
                    </header>
                    <p class="display">  If you have already created an account, please login: </p> 
                    <a class="submit_2" href="/login">Login</a>  
                    
      </div>
               
           </div>
        </div>
    </main>
    <footer>
       <?php get_footer() ?> 
    </footer>
</body>