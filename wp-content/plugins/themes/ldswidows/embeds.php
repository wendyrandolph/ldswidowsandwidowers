
<?php /*
 * Template Name: embeds
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



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keynote Speakers</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
    <!--<script src=" /library/account.js"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   
</head>

<?php get_header(); ?>

<body>
    <h3 id="title">

          <?php if (isset($_SESSION['clientData']))
            echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; ?>
    </h3>
    <main id="content" class="neve_main">
        <div class="add_1">
            <?php
            if (isset($_SESSION['message_1'])) {
                echo  $_SESSION['message_1'];
            } ?>



        </div>



        <div class="trial">
            <div class="row_1">
                <div id="sidebar">
                    <header class="btn">
                        Account Management
                    </header>
                    <ul class="nav flex-column">
                    <?php if($_SESSION['loggedin'] == 1){ 
                        echo '<a class="nav-link"  href="/profile">User Profile</a>';
                        echo '<a class="nav-link"  href="/recordings"> Recorded Workshops</a>';
                        echo '<a class="nav-link"  href="/handouts"> Presenter Handouts </a>';
                        echo '<a class="nav-link " href="/accounts/index.php/?action=logout">Logout</a>'; 
                     }?>  </ul>
                </div>



                <div id="column">
                    <header class="btn">Keynote Speakers</header>
                    <div class="embed"> 
                    <header class="btn"> Calvin Stephens </header> 
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/3OOFTvqlPGM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div> 
                        <div class="embed"> 
                        <header class="btn"> Latter day Saint Widows & Widowers Story – “Miracles Among Us” </header> 
                         <iframe width="560" height="315" src="https://www.youtube.com/embed/TYbnhvnld3Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                         </div> 
                        <div class="embed"> 
                        <header class="btn"> Matt Townsend </header> 
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Gb33v7O4Z0o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                         </div> 
                        
       
                </div>
            </div>
        </div>
    </main>


    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
   
 <script type="text/javascript" src=" /library/account.js"></script>
   
</body>

</html>

<?php unset($_SESSION['message_1']); ?>

         
            