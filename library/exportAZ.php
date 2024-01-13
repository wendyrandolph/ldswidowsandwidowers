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
    fputcsv($output, array('ROW', 'NAME',  'AGE', 'GENDER', 'EMAIL', 'PHONE', 'CITY', 'STATE',  'Wind Caves', 'Riparian Preserve', 'Temple', 'Attending Saturday', 'Friday BBQ','Emergency Contact', 'Emergency Phone',  'DATE REGISTERED')); 
 
     // Fetch records from database 
    $query = "SELECT CONCAT(u.firstName, ' ' , u.lastName) as Name, u.age, u.gender, u.userEmail, u.phone, u.city, u.state, t.act_1, t.act_2, t.act_5, t.keynote_1, m.meal_1, o.emergencyName, o.emergencyPhone, a.date_created 
FROM (SELECT @rownum:=0) AS initialization, arizona a
JOIN arizona_activities t
ON a.userId = t.userId
JOIN arizona_meals m 
ON a.userId = m.userId
JOIN arizona_other o 
ON a.userId = o.userId
JOIN users u 
ON a.userId = u.userId
UNION ALL 
SELECT CONCAT(a.firstName, ' ' , a.lastName) as Name, a.age, a.gender, a.userEmail, a.phone, a.city, a.state, t.act_1, t.act_2, t.act_5, t.keynote_1, m.meal_1, o.emergencyName, o.emergencyPhone, a.date_created 
FROM (SELECT @rownum:=0) AS initialization, arizonaGuest a
LEFT JOIN arizona_Gactivities t
ON a.arizonaGuest_Id = t.arizonaGuest_Id
LEft JOIN arizona_Gmeals m 
ON a.arizonaGuest_Id = m.arizonaGuest_Id
LEft JOIN arizona_Gother o 
ON a.arizonaGuest_Id = o.arizonaGuest_Id

";
    $results = mysqli_query($connect, $query); 
   
    // Output each row of the data, format line as csv and write to file pointer
     
    foreach($results as $row) 
    { 
        fputcsv($output, $row); 
    }
      fclose($output); 
   
}
 
?>