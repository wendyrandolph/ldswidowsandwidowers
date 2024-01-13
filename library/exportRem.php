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
    fputcsv($output, array('ROW', 'PERSON 1', 'PERSON 2', 'PHONE', 'EMAIL', 'CITY', 'STATE', 'STATUS', 'ALLERGIES', 'DIET NEEDS', 'SOCIAL', 'HELP WITH', 'PAYMENT', 'DATE REGISTERED')); 
 
     // Fetch records from database 
    $query = "SELECT  
 @rownum:=(@rownum+1) AS num
, Concat(firstName, ' ',  lastName) AS 'Person 1'
,  Concat(firstName2, ' ', lastName2) AS 'Person 2'
, u.phone
, u.userEmail
, u.city
, u.state
, r.status
, r.allergies
, CONCAT(r.diet1, ' , ', r.diet2) AS 'Diet Needs'
, r.social
, CONCAT(r.task1, ' , ', r.task2, ' , ', r.task3, ' , ', r.task4) AS 'Help'
, r.payment
, r.date_created 

FROM (SELECT @rownum:=0) AS initialization, users u 
JOIN remarried_life r
ON u.userId = r.user_Id 
ORDER BY r.date_created";
    $results = mysqli_query($connect, $query); 
   
    // Output each row of the data, format line as csv and write to file pointer
     
    foreach($results as $row) 
    { 
        fputcsv($output, $row); 
    }
      fclose($output); 
   
}
 
?>