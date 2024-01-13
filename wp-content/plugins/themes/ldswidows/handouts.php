<?php
/*
 * Template Name: Handouts
 */

/* other PHP code here */
session_start();

if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 900) {
    // last request was more than 15 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    $_SESSION['loggedin'] = false;
    $_SESSION['message_1'] = "You have been logged out.";
    header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presenter Handouts</title>
    <script src=" /library/account.js"></script>

    <link rel="stylesheet" href="  /style.css" media="screen">



</head>
<?php get_header();
?>

<body>
    <h3 id="title">
        <?php if (isset($_SESSION['clientData']))
            echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; ?>
    </h3>
    <section id="content" class="neve_main">
        <div class="add_1">
            <?php
            if (isset($_SESSION['message_1'])) {
                echo  $_SESSION['message_1'];
            } ?>



        </div>
        <div class="row_2">
            <div id="sidebar_2">
                <header class="btn">
                    Account Management
                </header>
                <ul class="nav flex-column">
                    <?php if ($_SESSION['loggedin'] == 1) {
                        echo '<a class="nav-link " aria-current="page" href="/profile">User Profile</a>';
                        echo '<a class="nav-link  "  href="/keynote-speakers">Keynote Speakers</a>';
                        echo '<a class="nav-link  "  href="/recordings">Recordings</a>';
                        echo '<a class="nav-link  " href="/accounts/index.php/?action=logout">Logout</a>';
                    } ?> </ul>
            </div>
            <div id="sidebar_1">
                <header class="btn" style="text-align: center;">Presenter Handouts </header>
                <div id="column_0">
                    
                    <div id="column_1">
<header class="btn" style="text-align: center; margin-top: 20px; color: var(--first_color); ">Michelle Lockhart: <br> Healthy Living: Principles and Promises</header>

                        <a class="nav-link" id="handout" href="/presentations/Energy_Balance_Worksheet.pdf" target="_blank"> Energy Balance Worksheet PDF</a>
                        <a class="nav-link" href="/presentations/Take_5_Energy.pdf" target="_blank"> Take 5 Energy PDF</a>

                  
                    

                        <header class="btn" style="text-align: center; margin-top: 20px; "> Healthy Living Power Point Video Presentation - NO SOUND</header>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/51-f_1xeVR8" title="YouTube video player" frameborder="0" allow="accelerometer;  clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="trial">



        </div>
        </div>

    </section>