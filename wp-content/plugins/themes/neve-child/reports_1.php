<?php
/*
 * Template Name: Age
 */

/* other PHP code here */
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Report</title>
    <link rel="stylesheet" href="  /style.css" media="screen">
</head>

<?php  
 get_header(); 
	
$link = mysqli_connect("localhost", "uh3rpj48scvi0","mjvfgbmkdg26");
mysqli_select_db($link, "dbc5le46avauj6");

$test = array(); 
$count = 0; 

$res=mysqli_query($link, "SELECT Count(email), age FROM `2023_email` GROUP By age" );
while($row = mysqli_fetch_array($res))
{ 
  $test[$count]["label"] = $row["age"]; 
  $test[$count]["y"] = $row['Count(email)']; 
  $count = $count+1; 
}
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "2023 - Participants By Age"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script> 
</head>
<body>

<h3 id="title">

        <?php if (isset($_SESSION['clientData']))
            echo "Welcome " . $_SESSION['clientData']['firstName'] . ' ' . $_SESSION['clientData']['lastName']; ?>
    </h3>
    <main id="content" class="neve_main">
    <div class="trial">
            <div class="row_1">
                <div id="sidebar">
                    <header class="btn">
                        View Reports
                    </header>
                    <ul class="nav flex-column">
                    <?php 
					if($_SESSION['loggedin'] == 1){ 
                         
                        echo '<li class="nav-item"><a class="nav-link   button_slide slide_diagonal" href="/reports"> Participants By Age </a></li>';
                        echo '<li class="nav-item"><a class="nav-link   button_slide slide_diagonal" href="/accounts/index.php/?action=logout">Logout</a></li>'; 
					}else{ 
						echo '<li class="nav-item"><a class="nav-link   button_slide slide_diagonal" href="/login"> Login </a></li>';
						?>  </ul>
                </div>
<div id="column">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div> 
</div> 
</div> 
</main>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>   

