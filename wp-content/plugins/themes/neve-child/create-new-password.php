<?php
/*
 * Template Name: Create Password
 */

/* other PHP code here */
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create New Password</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
    <!--<script src=" /library/account.js"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


</head>

<?php get_header(); ?>

<body>

    <main id="content" class="neve_main_photo">
        <div class="trial">
            <div class="row_1">
                <div> </div>
                <div id="column">
                    <header class="btn"> Password Reset </header>
<?php
                   //echo $_GET["selector"]; 
                   //exit; 
                   $_SESSION['test']; 
                    $validator =  $_SESSION['test']; 
                    //echo $validator; 
                    //exit; 
                    
?>
                            <form action="../accounts/index.php" method="post">

                            <p class="display alert"> Check your e-mail for the Password Reset Link!</p>
                                <label> Enter the Reset Code here </label> <br>
                                <input type="text" class="input" name="selector"><br>
                                <input type="hidden" name="validator" <?php if (isset($validator)) {
                                                                                echo "value=' . $validator .'";
                                                                            } ?>>
                                <p class="display" style="color: red; margin-left: 5px;"> The password needs to be 8 characters long, contain at least 1 uppercase character, 1 number and 1 special character</p>
                                <label>Enter New Password:</label><br>
                                <input type="password" class="input" name="userPW" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                                <label>Confirm New Password:</label><br>
                                <input type="password" class="input" name="userPW_R" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                                <button type="submit" name="reset-password-submit" id="request"> Reset Password </button>
                                <input type="hidden" name="action" value="passwordChange">
                            </form>
                
                 
                    

                </div>
            </div>
        </div>
    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="  /style.css" media="screen">

</body>