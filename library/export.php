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
    fputcsv($output, array('FIRST NAME', 'LAST NAME', 'EMAIL', 'CITY', 'STATE', 'WIDOWED', 'ALLERGIES', 'HIKE', 'BONFIRE', 'SATURDAY SOCIAL', 'SACRAMENT', 'KEYNOTES', 'DATE REGISTERED')); 
 
     // Fetch records from database 
    $query = 'SELECT  u.firstName, u.lastName, u.city, u.state, u.userEmail, u.widowed, k.allergies, k.hike, k.bonfire, k.saturdaySocial, k.sacrament, k.keynotes, k.date_created 
FROM users u 
JOIN knoxville k 
ON u.userId = k.user_Id';
    $results = mysqli_query($connect, $query); 
   
    // Output each row of the data, format line as csv and write to file pointer
     
    foreach($results as $row) 
    { 
        fputcsv($output, $row); 
    }
      fclose($output); 
   
}
 
?>