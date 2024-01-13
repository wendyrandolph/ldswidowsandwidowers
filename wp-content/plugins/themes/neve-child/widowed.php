
<?php
/*
 * Template Name: widowed
 */

/* other PHP code here */
session_start();
if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}


// Check if last activity was set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3700) {
  // last request was more than 15 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  $_SESSION['loggedin'] = false; 
  $_SESSION['message_1'] = "You have been logged out."; 
  header("Location: /login"); // redirect to login page
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

get_header();

// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the reports-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');



$query = getDataByWidowedSLC(); 

foreach ($query as $data) {
    $widowed[] = $data["widowed"];
    $amount[] = $data["Percentage"];
    $number[] = $data['Count(email)'];
    
}
  $newData = array(); 
           
           foreach($query as $data){
           $percent = round((float)$data['Percentage']) . '%';
           $row = array($data["widowed"],  $percent, $data['Count(email)']); 
           array_push($newData, $row); 
  }
?>

<!DOCTYPE HTML>
<html>

<head>


    <title>Widowed</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="  /style.css" media="screen">

</head>

<body>
    <main id="content" class="neve_main">
      <div id="myAdminNav" class="adminNav"> 
               
            
           <!--    <?php  
               if ($_SESSION['register'] === "False" ) { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php }else{ ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 
-->

<?php
                if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) {
                    echo '<a class="adminBtn active" aria-current="page" href="/reports/index.php?action=reports"> Admin Page </a>';
                }
                if ($_SESSION['loggedin'] == 1) {
                    echo '<a class="adminBtn"  href="/profile">Profile</a> ';
                    echo '<a class="adminBtn" href="/update">Update Account</a>';
                   
                    echo '<a href="javascript:void(0);" class="icon" onclick="myFunction()">';
                    echo '<i class="fa fa-bars"></i>';
                    echo '</a>';
                } ?>



                <?php  if($_SESSION['knox'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
               <?php }else{ ?> 
                 <a  class='adminBtn ' <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                  <?php   if ($_SESSION['loggedin'] == 1){
                      echo '<a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>';
                  } ?>
 
                </div> 
        <div class="trial">
            <div class="row_1">
                <div id="sidebar">
                    <header class="btn">
                        Salt Lake Conference Reports - 2023
                    </header>
                    
                      <?php if($_SESSION['loggedin'] = 1 && $_SESSION['userLevel'] == 3){ 
                      //echo '<a class="nav-link" href="/age"> Participants By Age </a>';
                        echo '<a class="nav-link" href="/state"> Participants By State </a>';
                        echo '<a class="nav-link" href="/county"> Participants By County </a>';
                        echo '<a class="nav-link" href="/country"> Participants By Country </a>';
                        echo '<a class="nav-link" href="/gender"> Participants By Gender </a>';
                        echo '<a class="nav-link" href="/age">Participants By Age </a>'; 
                        echo '<a class="nav-link" href="/conferences"> Participants By Number of Conferences </a>';
                     
                        }
                        ?> 
                </div>
                <div id="column" style="width: 100%; ">
                    <header class="btn">
                        Participants By Time Widowed
                    </header>
                    <canvas id="myChart"></canvas>


                    <?php
                    $newArray = json_decode(json_encode($newData)) ;
                   //var_dump($data); 

                    echo '<table id="data">';

                     echo '<tr>';
                    echo '<th> State </th> <th>Percentage </th> <th> # of Particpants </th>';
                    echo '</tr>';
                     foreach ($newArray as $row){ 
                    echo '<tr>';
                    echo '<th>' . $row[0]. '</th><td>' . $row[1]. '</td><td>' . $row[2] . '</td>';
                    echo '</tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>

        </div>
        </div>
        </div>
    </main>

    <script>
        const data = {
            labels: <?php echo json_encode($widowed) ?>,
            datasets: [{
                label: 'My First Dataset',
                data: <?php echo json_encode($amount)  ?>,
                backgroundColor: [
                    'rgba(0, 153, 153)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(201, 203, 207)',



                ],
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data,
        };

        var myChart = new Chart(document.getElementById('myChart'), config);
        
    </script>
      <script type="text/javascript" src=" /library/account.js"></script>
   
</body>

</html>