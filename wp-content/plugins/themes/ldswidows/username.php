<?php
/*
 * Template Name: Username
 */

/* other PHP code here */
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot UserName</title>
    <link rel="stylesheet" href="  /style.css" media="screen">

</head>


<?php get_header(); ?>

<body>
    <h3 id="idle">
    </h3>
    <main class="neve_main_photo">
        <div class="trial">
            <div class="row_1">
                <div></div>

                <div id="sidebar" class="sidebar_b">

                    <?php if (!($_GET["reset"])) {
                        echo '<header class="btn">Retrieve UserName</header>';
                        echo '<form action="/users/index.php" method="post">';
                        echo "<p class='display'> If you have forgotten your username, please enter the following that are associated with your account. </p></br>";
                        echo "<label> Email: </label><br>";
                        echo '<input class="pass" type="email" name="userEmail" placeholder="Enter your account email" required><br>';
                        echo "<label> First Name: </label><br>";
                        echo '<input class="pass" type="text" name="firstName" placeholder="Enter your first name" required><br>';
                        echo "<label> Last Name: </label><br>";
                        echo '<input class="pass" type="text" name="lastName" placeholder="Enter your last name" required>';
                        echo '<button id="submit" type="submit">Request to Retrieve Username </button>';
                        echo '<input type="hidden" name="action" value="username">';
                        echo '</form>';
                    } ?>
                   
                    <div class="row_2">
                        <div> </div>
                        <header class="btn">
                        </header><br>
                        <div class="reset">
                            <a class="adminBtn" name="cancel" href="/create-account"> Create Account </a>
                            <a class="adminBtn" name="cancel" href="/login"> Login</a>
                            <a class="adminBtn" name="cancel" href="/password">Forgot Your Password </a>
                        </div>
                    </div>
                </div>
            </div>
             </div> 
    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
</body>

<script type="text/javascript" src=" /library/account.js"></script>


</html>
<?php unset($_SESSION['message']); ?>