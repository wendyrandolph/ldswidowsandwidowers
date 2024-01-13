<?php
/*
 * Template Name: knoxReports2
Template Post Type: account
 */

/* other PHP code here */
session_start();
$_SESSION['knox'];
$_SESSION['conf2'];
$conf2 = $_SESSION['conf2'];
$_SESSION['confId2'];
$confId2 = $_SESSION['confId2'];

$url2 = "href='/users/index.php?action=knox'";
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the reports-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');
$_SESSION['userLevel'];

if (!$_SESSION['loggedin']) {
    header("Location: /account/login");
    
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

//Report - List of All participants 

$query = getParticipantsKnox();

$newData = array();
foreach ($query as $data) {
    $number[] = $data["num"];
    $firstName[] = $data["firstName"];
    $lastName[] = $data["lastName"];
    $city[] = $data['city'];
    $state[] = $data['state'];
    $email[] = $data['userEmail'];
}
foreach ($query as $data) {
    $row = array($data["num"],$data["firstName"], $data["lastName"], $data["city"], $data["state"], $data["userEmail"]);
    array_push($newData, $row);
}





//Report by Activity for Knoxville Conference
$query1 = getParticipantsActivity();

$newData1 = array();
foreach ($query1 as $data1) {

    $total[] = $data1["Total Participants"];
    $hike[] = $data1["Hike"];
    $bonfire[] = $data1['Bonfire'];
    $saturday[] = $data1['Saturday Social'];
    $sacrament[] = $data1['Sacrament'];
    $keynotes = $data1['Keynotes'];
}
foreach ($query1 as $data1) {
    $row1 = array($data1["Total Participants"], $data1["Hike"], $data1["Bonfire"], $data1["Keynotes"], $data1["Saturday Social"], $data1["Sacrament"]);
    array_push($newData1, $row1);
}


//Report by Age for Knoxville Conference
$query2 = getKnoxAge();

$newData2 = array();
foreach ($query2 as $data2) {
    $age[] = $data2['age'];
    $age2[] = $data2['Count(age)'];
    $amount[] = $data2['Percentage'];
}


foreach ($query2 as $data2) {
    $percent = $data2['Percentage'] . '%';
    $row2 = array($data2['age'], $data2['Count(age)'], $percent);
    array_push($newData2, $row2);
}


//Report by Gender for Knoxville Conference
$query3 = getKnoxGender();


foreach ($query3 as $data3) {
    $gender[] = $data3["gender"];
    $amount3[] = $data3["Percentage"];
    $number3[] = $data3["Count(knox_Id)"];
}

$newData3 = array();

foreach ($query3 as $data3) {
    $percent = $data3["Percentage"] . '%';
    $row3 = array($data3["gender"],  $percent, $data3["Count(knox_Id)"]);
    array_push($newData3, $row3);
}


//Report by State for Knoxville Conference
$query4 = getKnoxState();

$newData4 = array();
foreach ($query4 as $data4) {
    $state[] = $data4["state"];
    $amount4[] = $data4["Percentage"];
    $number4[] = $data4["Total"];
}
foreach ($query4 as $data4) {
    $percent = $data4['Percentage'] . '%';
    $row4 = array($data4["state"],  $percent, $data4["Total"]);
    array_push($newData4, $row4);
}


?>

<head>
    <title>Reports</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="  /style.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body>
    <main class=" neve_main">
        <div class="row_2">
            <div> </div>


            <div id="myAdminNav" class="adminNav">
                <!--    <?php
                        if ($_SESSION['register'] === "False") { ?>
                <a class="adminBtn" href="/users/index.php?action=registr"> CV Sign Up </a>
                <?php } else { ?>
               <a  class='adminBtn'  <?php echo $url ?>> CV Registration</a> 
              <?php } ?> 
--> <?php
    if ($_SESSION['loggedin'] == 1 && $_SESSION['userLevel'] == 3) { ?>
                    <a class="adminBtn active" aria-current="page" href="#"> Knoxville Reports </a>
                    <a class="adminBtn" href="/reports/index.php?action=reports"> Admin Page </a>
                <?php } ?>
                <?php
                if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="adminBtn" href="/profile">Profile</a>
                    <!--<a class="adminBtn" href="/update">Update Account</a> -->

                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                <?php  }
                if ($_SESSION['knox'] === "False") { ?>
                    <a class="adminBtn" href="/users/index.php?action=registr"> Knox Sign Up </a>
                <?php } else { ?>
                    <a class="adminBtn" <?php echo $url2 ?>> Knox Registration</a>
                <?php }  ?>
                <?php if ($_SESSION['loggedin'] == 1) { ?>
                    <a class="adminBtn" href="/accounts/index.php/?action=logout">Logout</a>
                <?php   } ?>

            </div>
        </div>
        <div class="row_1">
            <div> <button id="list" class="btnDisplay">List of Participants </button>
            </div>
            <div id="data" class="table-responsive column" style="display:none;">
                <header class="btnDisplay btnDisplay1">List of <?php echo $conf2 ?> Participants</header>
                <table id="data" class="table table-bordered">
                    <form method="post" action="/library/export.php" align="center">
                        <input type="submit" name="export" value="CSV Export" class="submit_2" />

                    </form>
                    <?php
                    $newArray = json_decode(json_encode($newData)); ?>
                    <tr>
                        <th width="15%"></th>
                        <th width="15%">First Name</th>
                        <th width="15%">Last Name</th>
                        <th width="20%">State</th>
                    </tr>
                    <?php foreach ($newArray as $row) {  ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                        <?php } ?>
                        </tr>
                </table>
            </div>
        </div>
        <div class="row_1">
            <div> <button id="activity" class="btnDisplay">Participants By Activity </button>
            </div>
            <div id="report1" class="table-responsive column" style="display: none;">
                <header class="btnDisplay btnDisplay1"> Number of those Registered = <?php echo $row1[0]; ?> </header>
                <table id="data" class="table table-bordered">
                    <?php
                    $newArray = json_decode(json_encode($newData)); ?>
                    <tr style="width: 100%;">
                            <th style="width: 30%;"> Activity  </th>
                            <th style="width: 30%;"> # of Particpants </th>
                        </tr>
                    <tr>
                        <th width="15%;">Hike</th>
                        <td width="15%;"><?php echo $row1[1]; ?></td>
                    </tr>
                    <tr>
                        <th width="15%;">Bonfire</th>
                        <td><?php echo $row1[2]; ?></td>
                    </tr>
                    <tr>
                        <th width="15%;">Keynotes</th>
                        <td><?php echo $row1[3]; ?></td>
                    </tr>
                    <tr>
                        <th width="15%;">Saturday Social</th>
                        <td><?php echo $row1[4]; ?></td>
                    </tr>
                    <tr>
                        <th width="15%;">Sacrament</th>
                        <td><?php echo $row1[5]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row_1">
            <div> <button id="age" onclick="age();" class="btnDisplay" style="width: 100%; ">
                    Participants By Age
            </div> </button>
            <div id="Kdata2" class="table-responsive column" style="display:none;">
                <header class="btnDisplay btnDisplay1"> Participants By Age</header>
                <canvas id="myChart"></canvas>
                <?php
                $newArray2 = json_decode(json_encode($newData2));
                //var_dump($data);  
                ?>
                <table style="width:100%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 30%;"> Age Bracket </th>
                            <th style="width: 30%;">Percentage </th>
                            <th style="width: 30%;"> # of Particpants </th>
                        </tr>
                        <?php
                        foreach ($newArray2 as $row2) { ?>
                            <tr style="width: 100%;">
                                <th style="width: 15%;"> <?php echo $row2[0] ?></th>
                                <td style="width: 15%;"> <?php echo $row2[2] ?></td>
                                <td style="width: 15%;"> <?php echo $row2[1] ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row_1">
            <div>
                <button id="gender" onclick="gender();" class="btnDisplay ">Participants By Gender </button>
            </div>
            <div id="Kdata3" class="column" style="display:none;">
                <header class="btnDisplay btnDisplay1"> Participants By Gender </header>
                <canvas id="myChart2"></canvas>
                <?php
                $newArray3 = json_decode(json_encode($newData3)); ?>
                <table style="width:100%;">
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 30%;"> Gender </th>
                            <th style="width: 30%;">Percentage </th>
                            <th style="width: 30%;"> # of Particpants </th>
                        </tr>
                        <?php foreach ($newArray3 as $row3) { ?>
                            <tr style="width: 100%;">
                                <th style="width: 15%;"> <?php echo $row3[0] ?> </th>
                                <td style="width: 15%;"><?php echo $row3[1] ?></td>
                                <td style="width: 15%;"><?php echo $row3[2] ?></td>
                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row_1">
            <div>
                <button id="state" onclick="kState();" class="btnDisplay ">Participants By State </button>
            </div>
            <div id="Kdata4" class="column" style="display:none;">
                <header class="btnDisplay btnDisplay1"> Participants By State </header>
                <canvas id="myChart3"></canvas>
                <?php
                 $newArray4 = json_decode(json_encode($newData4)) ; 
                 //var_dump($data); ?>

                <table style="width:100%;">

                 <tr>
                 <th> State </th> <th>Percentage </th> <th> # of Particpants </th>
                </tr>
                  <?php  foreach ($newArray4 as $row4){ ?> 
                <tr>
                 <th> <?php echo $row4[0]?> </th><td><?php echo $row4[1]?></td><td><?php echo $row4[2]?></td>
                 </tr>
              <?php   } ?>
                 </table>
                 
            </div>
        </div>
    </main>
    <footer id="page_footer">
        <?php get_footer(); ?>
    </footer>
    <script type="text/javascript" src=" /library/account.js"></script>
    <script>
        function age() {
            const labels = <?php echo json_encode($age) ?>;
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Participants',
                    data: <?php echo json_encode($amount) ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            var myChart = new Chart(document.getElementById('myChart'), config);
        }


        function gender() {
            //This is for the gender chart 
            const data = {
                labels: <?php echo json_encode($gender) ?>,
                datasets: [{
                    label: '% of Participants',
                    data: <?php echo json_encode($amount3)  ?>,
                    backgroundColor: [
                        'rgba(201, 203, 207)',
                        'rgba(153, 102, 255)',
                    ],
                    hoverOffset: 4
                }]
            };

            const config2 = {
                type: 'pie',
                data: data,
            };

            var myChart2 = new Chart(document.getElementById('myChart2'), config2);
        }


        function kState() {

            const data = {
                labels: <?php echo json_encode($state) ?>,
                datasets: [{
                    label: 'My First Dataset',
                    data: <?php echo json_encode($amount4)  ?>,
                    backgroundColor: [
                        'rgba(201, 203, 207)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(54, 162, 235)',


                    ],
                    hoverOffset: 4
                }]
            };

            const config3 = {
                type: 'pie',
                data: data,
            };

            var myChart = new Chart(document.getElementById('myChart3'), config3);
        }

        //To Aide in the display of the reports the data slides either from the left or slides down then the reverse when clicked again. 
        $("#list").on("click", function() {
            if ($("#data").is(":hidden")) {
                $("#data").slideDown("slow")
            } else {
                $("#data").slideUp("slow");
            }
        });

        $("#activity").on("click", function() {
            if ($("#report1").is(":hidden")) {
                $("#report1").slideDown("slow")
            } else {
                $("#report1").slideUp("slow");
            }
        });

        $("#age").click(function() {
            $("#Kdata2").animate({
                width: "toggle"
            });
        });

        $("#gender").click(function() {
            $("#Kdata3").animate({
                width: "toggle"
            });
        });

        $("#state").click(function() {
            $("#Kdata4").animate({
                width: "toggle"
            });
        });
    </script>
</body>