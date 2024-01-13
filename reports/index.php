<?php
//echo "This is the Reports Controller"; 
// Create or access a Session
session_start();


$_SESSION['userLevel']; 

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
// Get the functions library
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/main-model.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {

    case 'reports':

    $_SESSION['loggedin']; 
    $_SESSION['userLevel']; 
    $_SESSION['knox']; 
$_SESSION['conf2']; 

$_SESSION['confId2']; 
  
     header("location: /account/admin");  

    break; 

     case 'export': 


// Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="data.csv'); 
    // Create a file pointer 
    $output =  fopen('php://output', 'w');
    fputcsv($output, array('FIRST NAME', 'LAST NAME', 'EMAIL', 'CITY', 'STATE')); 
 
     // Fetch records from database 
     $query =  getParticipantsKnox(); 
    // Output each row of the data, format line as csv and write to file pointer
     
    while($row = $query->mysqli_fetch_array())
    { 
        $result = array($row['firstName'], $row['lastName'], $row['userEmail'], $row['city'], $row['state']); 
        fputcsv($output, $row); 
    }
      fclose($output); 
 

 header("location:/reports-knox"); 
    break; 

case 'remExport': 


// Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="data.csv'); 
    // Create a file pointer 
    $output =  fopen('php://output', 'w');
    fputcsv($output, array('PERSON 1', 'PERSON 2','PHONE', 'EMAIL', 'CITY', 'STATE')); 
 
     // Fetch records from database 
     $query = getParticipantsKnox (); 
    // Output each row of the data, format line as csv and write to file pointer
     
    while($row = $query->mysqli_fetch_array())
    { 
        $result = array($row['Person 1'], $row['Person 2'], $row['phone'], $row['userEmail'], $row['city'], $row['state']); 
        fputcsv($output, $row); 
    }
      fclose($output); 
 

 header("location:/account/reports-rem"); 
    break; 
 

case 'azExport': 


// Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="data.csv'); 
    // Create a file pointer 
    $output =  fopen('php://output', 'w');
    fputcsv($output, array('PERSON 1', 'PERSON 2','PHONE', 'EMAIL', 'CITY', 'STATE')); 
 
     // Fetch records from database 
     $query =  azExport(); 
    // Output each row of the data, format line as csv and write to file pointer
     
    while($row = $query->mysqli_fetch_array())
    { 
        $result = array($row['Name'], $row['age'], $row['gender'], $row['userEmail'], $row['phone'], $row['city'], $row['state'], $row['widowed'], $row['conf'], $row['act_1'], $row['act_2'], $row['act_3'], $row['act_4'], $row['act_5'], $row['keynote_1'], $row['meal_1'], $row['emergencyName'], $row['emergencyPhone'], $row['date_created'] ); 
        fputcsv($output, $row); 
    }
      fclose($output); 
 

 header("location:/account/reports-arizona"); 
    break; 
} 
