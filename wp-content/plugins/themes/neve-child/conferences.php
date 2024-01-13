<?php
/*
 * Template Name: gender
 */

/* other PHP code here */
session_start();
if (!$_SESSION['loggedin']) {
    header("Location: /login");
    exit;
}
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the reports-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');



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

$query = getDataByConf(); 

foreach ($query as $data) {
       $conf[] = $data["conf"];
       $amount[] = $data["Percentage"];
       $number[] = $data['Count(email)']; 
      
}
 $newData = array(); 
           
           foreach($query as $data){
           $percent = $data['Percentage'] . '%';
           $row = array($data["conf"],  $percent, $data['Count(email)']); 
           array_push($newData, $row); 
  }
?>

<!DOCTYPE HTML>
<html>

<head>


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Conference</title>
    <script src=" /library/account.js"></script>
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
                    <?php if($_SESSION['loggedin'] = 1 && $_SESSION['userLevel'] == 3){ 
                        echo '<a class="nav-link" href="/age"> Participants By Age </a>';
                        echo '<a class="nav-link" href="/state"> Participants By State </a>';
                        echo '<a class="nav-link" href="/county"> Participants By County </a>';
                        echo '<a class="nav-link" href="/country"> Participants By Country </a>';
                       echo '<a class="nav-link" href="/gender"> Participants By Gender </a>';
                        echo '<a class="nav-link" href="/widowed">Participants By Time Widowed </a>'; 
                       // echo '<a class="nav-link" href="/conferences"> Participants By Number of Conferences </a>';
                         echo '<a class="nav-link" href="/profile">Profile</a>';
                        echo '<a class="nav-link" href="/accounts/index.php/?action=logout">Logout</a>';
                        }
                        ?> 
                </div>
                <div id="column" style="width: 100%; ">
                    <header class="btn">
                        By Conferences Attended
                    </header>
                    <canvas id="myChart"></canvas>
                       <?php
                    $newArray = json_decode(json_encode($newData)) ;
                    //var_dump($data); 

                    echo '<table id="data">';

                    echo '<tr>';
                    echo '<th> Conferences Attended </th> <th>Percentage </th> <th> # of Particpants </th>';
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
    </main>
    <script>
     
        const data = {
            labels: <?php echo json_encode($conf) ?>,
            datasets: [{
                label: '% of Participants',
                data: <?php echo json_encode($amount)  ?>,
                backgroundColor: [
                   'rgba(255, 99, 132)',
      'rgba(255, 159, 64)',
      'rgba(255, 205, 86)',
      'rgba(75, 192, 192)',
      'rgba(54, 162, 235)',
      'rgba(153, 102, 255)',
      'rgba(201, 203, 207)'          
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