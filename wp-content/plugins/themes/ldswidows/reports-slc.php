<?php
/*
 * Template Name: Reports 
 */

/* other PHP code here */
session_start();
$_SESSION['userLevel']; 
 
if(!$_SESSION['loggedin']){ 
    header("Location: /login"); 
    exit; 
}

// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3600) {
  // last request was more than 15 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  $_SESSION['loggedin'] = false; 
  $_SESSION['message_1'] = "You have been logged out."; 
  header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

get_header();
?>

<head>
    <title>Reports</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="  /style.css" media="screen">
    
</head>

<body>
    <main id="content" class="neve_main">
        <div class="trial">
            <div class="row_1">
                <div id="sidebar">
                    <header class="btn">
                        View Reports
                    </header>
                      <?php if($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3){ 
                        echo '<a class="nav-link" href="/age"> Participants By Age </a>';
                        echo '<a class="nav-link" href="/state"> Participants By State </a>';
                        echo '<a class="nav-link" href="/county"> Participants By County </a>';
                        echo '<a class="nav-link" href="/country"> Participants By Country </a>';
                        echo '<a class="nav-link" href="/gender"> Participants By Gender </a>';
                        echo '<a class="nav-link" href="/widowed">Participants By Time Widowed </a>'; 
                        echo '<a class="nav-link" href="/conferences"> Participants By Number of Conferences </a>';
                        echo '<a class="nav-link" href="/profile">Profile</a>';
                        echo '<a class="nav-link" href="/accounts/index.php/?action=logout">Logout</a>';
                        }
                        ?> 
                </div>
                <div id="column" style="width: 100%; ">
                    <header class="btn">
                        <?php if(isset($_SESSION['clientData'])){ 
                            echo "Welcome " . $_SESSION['clientData']['firstName']; 
                        }
                        ?> 
                    </header>
                   <div> 
                       <p style="margin: 0 auto; padding: 20px; ">  Here you may click on any link to the left and view available reports. </p> 
                   </div> 
                
                </div>

            </div>
        </div>
        </div>
    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
     <script type="text/javascript" src=" /library/account.js"></script>
   
</body>

</html>