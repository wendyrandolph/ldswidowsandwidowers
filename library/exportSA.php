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
    fputcsv($output, array('ROW', 'NAME',  'AGE', 'GENDER', 'EMAIL', 'PHONE', 'CITY', 'STATE',  'Friday Morning Activity', '2pm Activity', 'Riverwalk Cruise', 'El Mercado', 'Fast Friends', 'Texas Under the Stars', 'Bring a Guitar','Workshop 1','Workshop 2','Workshop 3','Workshop 4','Workshop 5','Workshop 6', 'Friday Fireside', 'Saturday Keynote', 'Saturday Lunch?','Saturday Dinner?','Special Food Needs?', 'Emergency Contact', 'Emergency Phone',  'DATE REGISTERED')); 
 
     // Fetch records from database 
    $query = "SELECT @rownum:=(@rownum+1) AS num, CONCAT(u.firstName, ' ' , u.lastName) as Name, u.age, u.gender, u.userEmail, u.phone, u.city, u.state, t.act_1, t.act_2, t.act_3, t.act_4, t.act_5, t.act_6, t.act_7, c.workshop_1, c.workshop_2, c.workshop_3, c.workshop_4, c.workshop_5, c.workshop_6, c.keynote_1, c.keynote_2, m.meal_1, m.meal_2, m.foodNeeds, m.emergencyName, m.emergencyPhone, s.date_created 
FROM (SELECT @rownum:=0) AS initialization, sanAntonio s
JOIN SA_Activities t
ON s.user_id = t.user_id
JOIN SA_Meals m 
ON s.user_id = m.user_id
JOIN SA_classes c 
ON s.user_id = c.user_id
JOIN users u 
ON s.user_id = u.userId";
    $results = mysqli_query($connect, $query); 
   
    // Output each row of the data, format line as csv and write to file pointer
     
    foreach($results as $row) 
    { 
        fputcsv($output, $row); 
    }
      fclose($output); 
   
}
 
?>