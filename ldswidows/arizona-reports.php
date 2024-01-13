<?php
/*
 * Template Name:AZReports 
  Template Post Type: Account
 */

/* other PHP code here */
session_start();
$_SESSION['userLevel'];
$_SESSION['confId3'];
$confId3 = $_SESSION['confId3']; 

if ($_SESSION['loggedin'] and $_SESSION['userLevel'] == 3) {
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the reports-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');


    get_header();

    //Report - List of All participants 

    $query = getParticipantsAZ();

    $newData = array();
    foreach ($query as $data) {
        $number[] = $data['num'];
        $Id[]=$data['Id'];
        $city[] = $data['city'];
        $state[] = $data['state'];
    }
    foreach ($query as $data) {
        $row = array($data['num'], $data['Name'], $data['city'], $data["state"], $data['Id']);
        array_push($newData, $row);
    }

    //Report by Age for Idaho Conference
    $query2 = getAZAge(); 

    foreach ($query2 as $data2) {
        $age[] = $data2["age"];
        $number[] = $data2["Count(sanAnt_id)"];
        $amount[] = $data2["Percentage"];
    }


    $newData2 = array();
    foreach ($query2 as $data2) {
        $percent = $data2['Percentage'] . '%';
        $row2 = array($data2['age'], $data2['Count(sanAnt_id)'], $percent);
        array_push($newData2, $row2);
    }


    //Report by Gender for Idaho Conference
    $query3 =getAZGender();
    foreach ($query3 as $data3) {
        $gender[] = $data3["gender"];
        $amount3[] = $data3["Percentage"];
        $number3[] = $data3["Count(gender)"];
    }

    $newData3 = array();

    foreach ($query3 as $data3) {
        $percent = $data3["Percentage"] . '%';
        $row3 = array($data3["gender"],  $percent, $data3["Count(arizonaId)"]);
        array_push($newData3, $row3);
    }





    //Report by State for Idaho Conference
    $query4 = getDataByStateAZ();
    
  
    foreach ($query4 as $data4) {
        $state[] = $data4["state"];
        $amount4[] = $data4["Percentage"];
        $number[] = $data4[0]["Total"];
    }

    $newData4 = array();

    foreach ($query4 as $data4) {

        $percent = $data4['Percentage'] . '%';
        $row4 = array($data4['state'], $percent,  $data4['Total']);
        array_push($newData4, $row4);
    }



    //Report by State for Knoxville Conference
    $query5 = getAZWid();

    $newData5 = array();
    foreach ($query5 as $data5) {
        $widowed[] = $data5["widowed"];
        $amount5[] = $data5["Percentage"];
        $number5[] = $data5["Total"];
    }
    foreach ($query5 as $data5) {
        $percent = $data5['Percentage'] . '%';
        $row5 = array($data5["widowed"],  $percent, $data5["Total"]);
        array_push($newData5, $row5);
    }


    $query6 = getAZWidTotal();
    //var_dump($query6); 
    //exit; 
    $widTotal = $query6[0]['COUNT(widowed)'];
    $widPerc = $query6[0]['Percentage'];
    $widPerc1 = $widPerc . '%';



    //Report by State Total Site Users 
    $query7 = getAZStateTotal(); 
    $stateTotal = $query7[0]["Total"];
    $statePerc = $query7[0]['Percentage'];
    $statePerc1 = $statePerc . '%';

    $query8 = getAZStateNames();
    foreach ($query8 as $data8)
    $stateName[] = $data8['state'];
    $stateCount[] = $data8["COUNT(state)"];

    $query9 = getAZGenderTotal(); 
    $genderTotal = $query9[0]["Total"];
    $genderPerc = $query9[0]['Percentage'];
    $genderPerc1 = $genderPerc . '%';

    $query10 = totalAZRegistered(); 
    $saTotal = $query10[0]["Arizona Total"];
    $siteAccounts = $query10[0]['Total Accounts on the Website'];
    $saPerc = $query10[0]['Percentage of Total Accounts'];
    $saPerc1 = $saPerc . '%';

    $newData11 = array();
    $query11 = totalAZRegisteredbyDate(); 
     foreach ($query11 as $data5) {
       $azDateReg[] = $data11["Date Registered"];
        $azNumReg[] = $data11["Arizona Total"];
    }
     
     foreach ($query11 as $data11) {
        $azDateReg = $data11['Date Registered'];
        $azNumReg = $data11["Total By Date"];
        $row11 = array($azDateReg, $azNumReg);
        array_push($newData11, $row11);
    }
   
 $query12 = totalAZBBQ(); 
 $bbqtotal = $query12[0]['Friday BBQ']; 


?>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
       
<div class="page-banner">
    <?php pageBanner(array(
        'title' => "Admin Access"
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
   
       

            <p class="success"> <?php
                                if (isset($_SESSION['idle'])) {
                                    echo $_SESSION['idle'];
                                }
                                if (isset($_SESSION['message_1'])) {
                                    echo $_SESSION['message_1'];
                                }
                                if (isset($_SESSION['success'])) {
                                    echo $_SESSION['success'];
                                }
                                if (isset($_SESSION['emailMessage'])) {
                                    echo $_SESSION['emailMessage'];
                                }
                               

                                ?>
            </p>
      
     <h5 class="heading1">Arizona Reports - 2023 </h5>
             
                <table style="width:66%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 30%;">Total Number Registered </th>
                             <th style="width: 30%;">Total Site Accounts </th>
                             <th style="width: 30%;">Percentage </th>
                             
                        </tr>
                        <tr>
                        
                        
                        <td><?php echo $saTotal ?></td>
                         <td><?php echo $siteAccounts ?></td>
                        <td><?php echo $saPerc1 ?></td>
                        
                    </tr>
                       
                    </tbody>
                </table>
<br> <br>
                <table style="width:66%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 50%;">Date</th>
                             <th style="width: 50%;">Total Registered By Day </th>
                             
                        </tr>
                        
                        <hr>
                      <?php  $newArray11 = json_decode(json_encode($newData11)); ?>

                      <?php foreach ($newArray11 as $row) {  ?>
                         <tr>
                         <td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td>
                          </tr>  
                         <?php } ?>
                      
                        
                    </tr>
                       
                    </tbody>
                </table>
                   <table style="width:33%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                            <th style="width: 50%;">Friday BBQ Headcount</th>
                         </tr>
                        
                        <hr>
                      
                         <tr>
                         <td><?php echo $bbqtotal ?></td>
                          </tr>  
                        
                      
                        
                    </tr>
                       
                    </tbody>
                </table>
            <br>
            <hr>
            
            
            <button id="list" class="btn btn--beige btn--beige:hover" style="width: 50%;">Registered Attendees</button><br>


            <div id="data" class="table-responsive column" style="display:none;"><br><br>
                <table id="data" class="table table-bordered">
                    <form method="post" action="/library/exportAZ.php" align="center">
                        <input class="btn btn--blue" type="submit" name="export" value="CSV Export" class="submit_2" />

                    </form><br><br>
 
                    <?php
                    $newArray = json_decode(json_encode($newData)); ?>
                    <tr>
                        <th width="15%">Total Count</th>
                        <th width="25%">Name</th>
                        <th width="25%">City</th>
                        <th width="15%">State</th>

                    </tr>
                    <?php foreach ($newArray as $row) {  ?>
                        <tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                           <!--<td><button class='btn btn--small btn--dark-orange btn--dark-orange:hover' style='width: 50%;'><a href='/users/index.php/?action=iDelete&userId="<?php echo $row[4]; ?>"?&confId3=<?php echo $confId3 ?>"'>Delete</a></button></td>
                       --> <?php } ?>
                        </tr>
                </table>
            </div>
 <hr style="width: 50%; float:left; border: 1px solid black;">

            <button id="age" class="btn btn--blue btn--blue:hover" onclick="age();" style="width: 50%;">
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
            </div>
            <hr style="width: 50%; float:left; border: 1px solid black;">




            <button id="state" onclick="state();" class="btn btn--beige btn--beige:hover" style="width: 50%;">Participants By State </button>

            <div id="Kdata4" class="column" style="display:none;">
                <canvas id="myChart3"></canvas>
                <?php
                $newArray4 = json_decode(json_encode($newData4));

                //exit;
                ?>

                <table style="width:100%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                        <th style="width: 30%;">State </th>
                        <th style="width: 30%;">Percentage </th>
                        <th style="width: 30%;"> # of Participants </th>
                    </tr>

                    <?php foreach ($newArray4 as $row4) { ?>
                        <tr>
                            <th style="width: 15%;"> <?php echo $row4[0] ?> </th>
                            <td style="width: 15%;"><?php echo $row4[1] ?></td>
                            <td style="width: 15%;"><?php echo $row4[2] ?></td>
                        </tr>
                    <?php   } ?>
                    <tr>
                        <hr>
                        <th> Total </th>
                        <td><?php echo $statePerc1 ?></td>
                        <td><?php echo $stateTotal ?></td>
                    </tr>
                </table>

            </div>
             <hr style="width: 50%; float:left; border: 1px solid black;">
         
            <button id="gender" onclick="gender();" class="btn btn--blue btn--blue:hover" style="width: 50%;">Participants By Gender</button>

            <div id="Kdata3" class="column" style="display:none;">
                <canvas id="myChart2"></canvas>
                <?php
                $newArray4 = json_decode(json_encode($newData3));

                //exit;
                ?>

                <table style="width:100%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                        <th style="width: 30%;">Gender </th>
                        <th style="width: 30%;">Percentage </th>
                        <th style="width: 30%;"> # of Participants </th>
                    </tr>

                    <?php foreach ( $newData3 as $row3) { ?>
                        <tr>
                            <th style="width: 15%;"> <?php echo $row3[0] ?> </th>
                            <td style="width: 15%;"><?php echo $row3[1] ?></td>
                            <td style="width: 15%;"><?php echo $row3[2] ?></td>
                        </tr>
                    <?php   } ?>
                    <tr>
                        <hr>
                        <th> Total </th>
                        <td><?php echo $genderPerc1 ?></td>
                        <td><?php echo $genderTotal ?></td>
                    </tr>
                </table>

            </div>
             <hr style="width: 50%; float:left; border: 1px solid black;">
            <button id="widowed" onclick="widowed();" class="btn btn--beige btn--beige:hover" style="width: 50%;">Participants By Time Widowed</button>

            <div id="Kdata5" class="column" style="display:none;">
                <canvas id="myChart5"></canvas>
                <?php
                $newArray4 = json_decode(json_encode($newData5));

                //exit;
                ?>

               <table style="width:100%" class="table table-bordered" ;>
                    <tbody style="width:100%;">
                        <tr style="width: 100%;">
                        <th style="width: 30%;">Time Widowed </th>
                        <th style="width: 30%;">Percentage </th>
                        <th style="width: 30%;"> # of Participants </th>
                    </tr>

                    <?php foreach ( $newData5 as $row5) { ?>
                        <tr>
                            <th style="width: 30%;"> <?php echo $row5[0] ?> </th>
                            <td style="width: 30%;"><?php echo $row5[1] ?></td>
                            <td style="width: 30%;"><?php echo $row5[2] ?></td>
                        </tr>
                    <?php   } ?>
                    <tr>
                        <hr>
                        <th> Total </th>
                        <td><?php echo $genderPerc1 ?></td>
                        <td><?php echo $genderTotal ?></td>
                    </tr>
                </table>

            </div>
             <hr style="width: 50%; float:left; border: 1px solid black;">

 
   
</div> 
 <!-- <?php walkinIdaho(); 
    
            echo $_SESSION['buildIdAdditional']; 
      ?> -->

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
                    label: 'Idaho Registrants By State',
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
                    data: <?php echo json_encode($amount5)  ?>,
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

            var myChart5 = new Chart(document.getElementById('myChart5'), config);

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
 unset($_SESSION['matchingUser']); 
 unset($_SESSION['delete']);