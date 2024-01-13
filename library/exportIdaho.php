<?php 
session_start(); 
if(isset($_POST["export"]))
{ 

    // Get the database connection file
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/reports-model.php');
// Set headers to download file rather than displayed 
    $connect = mysqli_connect("localhost", "uh3rpj48scvi0", "mjvfgbmkdg26", "dbc5le46avauj6");
    header('Content-Type: text/csv; charset=utf-8'); 
    header('Content-Disposition: attachment; filename="data.csv'); 
    // Create a file pointer 
    $output =  fopen('php://output', 'w');
    fputcsv($output, array('ROW', 'FIRST NAME', 'LAST NAME', 'GENDER', 'AGE',  'CITY', 'STATE',  'EMAIL', 'PHONE', 'WHICH TEMPLE?', 'LOVEJOYS?', 'FRIDAY MORNING ACTIVITY?', 'FRIDAY EVENING FIRESIDE?', 'SATURDAY AFTER CONFERENCE SOCIAL?', 'FRIDAY LUNCH?', 'SATURDAY LUNCH?', 'WORKSHOP 1', 'WORKSHOP 2', 'WORKSHOP 3', 'WORKSHOP 4', 'WORKSHOP 5', 'MORNING KEYNOTE?', 'CLOSING KEYNOTE?', 'CHURCH', 'LODGING', 'DATE REGISTERED')); 
 
     // Fetch records from database 
    $query = "SELECT @rownum:=(@rownum+1) AS num, firstName, lastName, gender, age, city, state, userEmail, phone, act_1, act_2, act_3, act_4, act_5, meal_1, meal_2, workshop_1, workshop_2, workshop_3, workshop_4, workshop_5, keynote_1, keynote_2, church, lodging, i.date_created
FROM (SELECT @rownum:=0) AS initialization, idaho i 
JOIN users u 
ON i.user_id = u.userId 
JOIN idaho_activities a 
ON i.user_id = a.userId
JOIN idaho_meals m
ON i.user_id = m.userId
JOIN idaho_classes c
ON i.user_id = c.userId
JOIN idaho_other o 
ON i.user_id = o.userId";
    $results = mysqli_query($connect, $query); 
   
    // Output each row of the data, format line as csv and write to file pointer
     
    foreach($results as $row) 
    { 
        fputcsv($output, $row); 
    }
      fclose($output); 
   
}
 
?>