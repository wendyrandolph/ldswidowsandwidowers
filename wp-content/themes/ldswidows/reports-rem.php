<?php
/*
 * Template Name:RemReports 
  Template Post Type: Account
 */

/* other PHP code here */
session_start();
$_SESSION['userLevel'];

if ($_SESSION['loggedin'] and $_SESSION['userLevel'] == 3) {
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the reports-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');


    get_header();

    //Report - List of All participants 

    $query = getParticipantsREM();

    $newData = array();
    foreach ($query as $data) {
        $number[] = $data['num'];
        $person1[] = $data["Person1"];
        $person2[] = $data["Person2"];
        $city[] = $data['city'];
        $state[] = $data['state'];
    }
    foreach ($query as $data) {
        $row = array($data['num'], $data['Person 1'], $data['Person 2'], $data['city'], $data["state"]);
        array_push($newData, $row);
    }

    //Report by Age for Knoxville Conference
    $query2 = getSiteUsersAge();
    //var_dump($query2); exit; 

    foreach ($query2 as $data2) {
        $age[] = $data2["age"];
        $number[] = $data2["Count(userId)"];
        $amount[] = $data2["Percentage"];
    }


    $newData2 = array();
    foreach ($query2 as $data2) {
        $percent = $data2['Percentage'] . '%';
        $row2 = array($data2['age'], $data2['Count(userId)'], $percent);
        array_push($newData2, $row2);
    }


    //Report by Gender for Knoxville Conference
    $query3 = getSiteUsersGender();


    foreach ($query3 as $data3) {
        $gender[] = $data3["gender"];
        $amount3[] = $data3["Percentage"];
        $number3[] = $data3["Count(gender)"];
    }

    $newData3 = array();

    foreach ($query3 as $data3) {
        $percent = $data3["Percentage"] . '%';
        $row3 = array($data3["gender"],  $percent, $data3["Count(gender)"]);
        array_push($newData3, $row3);
    }


    //Report by State for Knoxville Conference
    $query4 = getSiteUsersState();

    foreach ($query4 as $data4) {
        $state[] = $data4["state"];
        $amount4[] = $data4["Percentage"];
    }

    $newData4 = array();

    foreach ($query4 as $data4) {

        $percent = $data4['Percentage'] . '%';
        $row4 = array($data4["state"],  $percent, $data4["Count(userId)"]);
        array_push($newData4, $row4);
    }



    //Report by State for Knoxville Conference
    $query5 = getSiteUsersWid();

    $newData5 = array();
    foreach ($query5 as $data5) {
        $widowed[] = $data5["widowed"];
        $amount[] = $data5["Percentage"];
        $number5[] = $data5["Count(widowed)"];
    }
    foreach ($query5 as $data5) {
        $percent = $data5['Percentage'] . '%';
        $row5 = array($data5["widowed"],  $percent, $data5["Count(widowed)"]);
        array_push($newData5, $row5);
    }


    $query6 = getSiteUsersWidTotal();
    //var_dump($query6); 
    //exit; 
    $widTotal = $query6[0]['COUNT(widowed)'];

    $widPerc = $query6[0]['Percentage'];
    $widPerc1 = $widPerc . '%';

    //Report by State Total Site Users 

    $query7 = getSiteUsersStateTotal();
    $stateTotal = $query7[0]['COUNT(state)'];

    $statePerc = $query7[0]['Percentage'];
    $statePerc1 = $statePerc . '%';

    $query8 = getSiteUsersStateNames();
    foreach ($query8 as $data8)
        $stateName[] = $data8['state'];
    $stateCount[] = $data8["COUNT(state)"];



?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="page-banner">
        <?php pageBanner(array(
            'title' => " "
        )); ?>
    </div>
 <div class="page-links">
            <h5 class="page-links__title active">Account Management </h5>
            
                <?php
                    management()
                 ?>           
        </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <?php
                //Grab the parent Id to aide in the breadcrumb 
                $theParent1 = wp_get_post_parent_id();
                ?>

                <a class="metabox__blog-home-link" href="/reports/index.php?action=reports"> Admin Page </a><span class="metabox__main"><?php the_title(); ?> </span>

            </p>
        </div>
<div class="full-width-split group">
        <div class="full-width-split__one">
         <h5 class="heading1"> Remarried Reports - 2023 </h5>


<button id="list" class="btn btn--small btn--beige btn--beige:hover" style="width: 50%;"">Registered Attendees</button>
 
    
            <div id="data" class="table-responsive column" style="display:none;">
                <table id="data" class="table table-bordered">
                    <form method="post" action="/library/exportRem.php" align="center">
                        <input type="submit" name="export" value="CSV Export" class="submit_2" />

                    </form>

                    <?php
                    $newArray = json_decode(json_encode($newData)); ?>
                    <tr>
                        <th width="15%">Total Count</th>
                        <th width="25%">Person 1</th>
                        <th width="25%">Person 2</th>
                        <th width="15%">City</th>
                        <th width="20%">State</th>
                    </tr>
                    <?php foreach ($newArray as $row) {  ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                        <?php } ?>
                        </tr>
                </table>
            </div><hr style="width: 100%; border: 1px solid black;"> 
         
        
     <!--  <button id="age" class="btn btn--small btn--blue btn--blue:hover" onclick="age();" style="width: 100%; ">
                    Participants By Age
        </button>
            <div id="Kdata2" class="table-responsive column" style="display:none;">
                <canvas id="myChart"></canvas>
                <?php
                $newArray2 = json_decode(json_encode($newData2));

                ?>
                <table style="width:100%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 30%;"> Age Bracket </th>
                            <th style="width: 30%;"> # of Particpants </th>
                            <th style="width: 30%;">Percentage </th>
                        </tr>
                        <?php
                        foreach ($newArray2 as $row2) { ?>
                            <tr style="width: 100%;">
                                <th style="width: 15%;"> <?php echo $row2[0] ?></th>
                                <td style="width: 15%;"> <?php echo $row2[1] ?></td>
                                <td style="width: 15%;"> <?php echo $row2[2] ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div><hr style="width: 100%; border: 1px solid black;"> 
        

        
       
                <button id="state" onclick="state();" class="btn btn--small btn--beige btn--beige:hover" style="width: 100%;" >Participants By State </button>
         
            <div id="Kdata4" class="column" style="display:none;">
                <canvas id="myChart3"></canvas>
                <?php
                $newArray4 = json_decode(json_encode($newData4));
                //var_dump($data); 
                ?>

                <table id="data">

                    <tr>
                        <th> State </th>
                        <th>Percentage </th>
                        <th> # of Particpants </th>
                    </tr>
                    <?php foreach ($newArray4 as $row4) { ?>
                        <tr>
                            <th> <?php echo $row4[0] ?> </th>
                            <td><?php echo $row4[1] ?></td>
                            <td><?php echo $row4[2] ?></td>
                        </tr>
                    <?php   } ?>
                    <tr>
                        <th> Total </th>
                        <td><?php echo $statePerc1 ?></td>
                        <td><?php echo $stateTotal ?></td>
                    </tr>
                </table>

            </div>
        </div>

 -->

       
</div> 
       

</div> 
        </div>
    </div>
</div>




    </div>


    <?php get_footer(); ?>

    

    <script>
        function age() {
            const data = {
                labels: <?php echo json_encode($age); ?>,
                datasets: [{
                    label: 'Users By Age Range',
                    data: <?php echo json_encode($amount);  ?>,
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

            const config = {
                type: 'pie',
                data: data,
            };

            var myChart2 = new Chart(document.getElementById('myChart2'), config);
        }

        function state() {
            const data = {
                labels: <?php echo json_encode($stateName) ?>,
                datasets: [{
                    label: 'Users By State',
                    data: <?php echo json_encode($amount4)  ?>,
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
            var myChart3 = new Chart(document.getElementById('myChart3'), config);
        }

        function widowed() {

            const data = {
                labels: <?php echo json_encode($widowed) ?>,
                datasets: [{
                    label: 'Users By Time Widowed',
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

            var myChart4 = new Chart(document.getElementById('myChart4'), config);

        }
    </script>
    <script>
        //To Aide in the display of the reports the data slides either from the left or slides down then the reverse when clicked again. 
        $("#list").on("click", function() {
            if ($("#data").is(":hidden")) {
                $("#data").slideDown("slow")
            } else {
                $("#data").slideUp("slow");
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
        $("#widowed").click(function() {
            $("#Kdata5").animate({
                width: "toggle"
            });
        });
    </script> <?php
            } else {
                header("Location: /account/login");
                exit;
            }
