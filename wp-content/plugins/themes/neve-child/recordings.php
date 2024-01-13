<?php
/*
 * Template Name: Recordings
 */

/* other PHP code here */
session_start();
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
$_SESSION['emailMessage'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Recordings</title>
    <link rel="stylesheet" href="  /style.css" media="screen">



</head>
<?php get_header();
?>

<body>
    <h3 id="title">
        <?php if (isset($_SESSION['clientData']))
            echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName'];
            echo "<br>"; 
            ?>
    </h3>
    
    <main id="content" class="neve_main">
        <div class="add_1">
            <?php
            if (isset($_SESSION['message_1'])) {
                echo  $_SESSION['message_1'];
            } ?>



        </div>
        <div class="row_1">
        <div id="sidebar">
            <header class="btn">
                Account Management
            </header>
            <ul class="nav flex-column">
                <?php if ($_SESSION['loggedin'] == 1) {
                    echo '<a class="nav-link" href="/profile">User Profile</a>';
                    echo '<a class="nav-link"  href="/keynote-speakers">Keynote Speakers</a>';
                     echo '<a class="nav-link" href="/handouts"> Presenter Handouts </a>';
                    echo '<a class="nav-link" href="/accounts/index.php/?action=logout">Logout</a>';
                } ?> 
            </ul>
            <div></div>
        </div>
        <div class="trial">
            <div id="column" >
            
                <header class="btn" style="text-align: center;">Workshops on Grief </header>
               <p class="display "> Here are some of the recorded workshops which will open up in youtube to view.
</p>
                <div class="row_1">
                    <div id="column_1">
                        <a href="https://www.youtube.com/embed/d68CW6d3dsU"  target="_blank"><header class="recording"> Kent Allen:<br> Grief 101 (Newly Widowed) </header></a>
                       </div> 
                    <div id="column_2">
                        <a href="https://www.youtube.com/embed/DIzVUMt2urk"  target="_blank"><header class="recording"> Kent Allen:<br> Complicated Grief (Loss By Suicide) </header></a>
                    
                    </div>
                    <div> </div>
                    <div> </div> 
                   
                </div>
                 <header class="btn" style="text-align: center;"> Workshops on Dating </header>
                <div class="row_1">
                    <div id="column_1">
                    <a href="https://www.youtube.com/embed/2YndHI3dZb0"  target="_blank"><header class="recording"> Kent Allen:<br> Red Flags of Dating</header></a>
                      </div> 
                    <div id="column_2">
                    <a href="https://www.youtube.com/embed/0HaftX2ep8Q"  target="_blank"><header class="recording"> Sharon Colyar: <br>Dating for Widows and Widowers</header></a>
                     </div>
                </div>
                 <header class="btn" style="text-align: center;"> Workshops on Health </header>
                <div class="row_1">
                    <div id="column_1">
                    <a href="https://www.youtube.com/embed/KYNUW4YKYBo" target="_blank"><header class="recording"> Jared Eames:<br> A Talk on Sleep</header></a>
                     </div>
                    <div id="column_2">
                        </div>
                </div>
                




            </div>
        </div>

    </main>