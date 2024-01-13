<?php
/*
 * Template Name: Confirm_Reg
 */

/* other PHP code here */
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Registration</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>
<?php get_header();
?>

<body>


      <main  class="neve_main">
        <div class="trial">
            <div class="row_1">
            <div> 
           </div> 
                <div id="sidebar" class="sidebar_b">
                    <header class="btn">
                        Confirm Account
                    </header>
                   
                    <?php if(isset($_SESSION['message_1'])){ 
                        echo $_SESSION['message_1']; 
                    }?> 
                        <form action="/accounts/index.php" method="post">
                            <?php if (isset($_SESSION['data'])) {
                                echo ($_SESSION['data']);
                            } ?>
                            <b>
                            <label>Enter a Username:  </label><br>
                            <p class="display">UserName can use any letter or number sequence - can not be left blank.</p>
                            
                            <input type="text" class="input" name="userName" placeholder="Enter a username" required pattern="^\d*[a-zA-Z][a-zA-Z0-9]*$" ><br><br>
                            
                            <p class="display"> The password needs to be 8 characters long, <br> contain at least 1 uppercase character, 1 number and 1 special character</p> <br>
                            <label>Password:</label><br>
                            <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                            <label>Confirm Password:</label><br>
                            <input type="password" class="input" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                           
                            <input type="submit" value="Next" name="submit" id="submit"><br><br>
                            <input type="hidden" name="level" value= 1>
                            <input type="hidden" name="verify" value= 0>
                            <!--Add the action name - value pair -->
                            <input type="hidden" name="action" value="confirm_Reg">
                             
</form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<footer id="page_footer">
    <?php get_footer(); ?>
</footer>