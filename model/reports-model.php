<?php 

// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');


//SLC conference data queries // 
function getParticipantsSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT @rownum:=(@rownum+1) AS num, firstName, lastName, state
    FROM (SELECT @rownum:=0) AS initialization, 2023_email
    ORDER BY state ASC"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getDataByAgeSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT age, Count(age), Count(email), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` GROUP BY age ORDER BY Age"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
   
  
}

function getDataByStateSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = " SELECT FORMAT(COUNT(state) * 100 /(SELECT Count(email) AS t FROM 2023_email), 2) AS Percentage,  state, Count(email)  FROM `2023_email`  WHERE state <> ''  GROUP BY state   WITH ROLLUP"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getDataByGenderSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT gender, Count(email), Format(Concat(COUNT(gender) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getDataByConfSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT conf, Count(email), Format(Concat(COUNT(conf) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` WHERE conf IS NOT NULL GROUP BY conf"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getDataByCountySLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT county, Count(email), Format(Concat(COUNT(county) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` WHERE county <> '' GROUP BY county Order By Count(email) DESC "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getDataByCountrySLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT country, Count(email), Format(Concat(COUNT(country) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` WHERE country IS NOT NULL GROUP BY country"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getDataByWidowedSLC(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT widowed, Count(email), COUNT(gender), Count(widowed), Format(Concat(COUNT(widowed) * 100 /(SELECT Count(email) AS t FROM 2023_email), '%'), 2) AS Percentage FROM `2023_email` GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}



//Knoxville Conference Reports // 

function getParticipantsKnox(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT @rownum:=(@rownum+1) AS num, firstName, lastName, city, state, userEmail, k.date_created, k.last_date_changed 
    FROM (SELECT @rownum:=0) AS initialization, users u 
JOIN knoxville k 
ON u.userId = k.user_Id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}


function getParticipantsActivity(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT COUNT(knox_Id) As 'Total Participants',
(SELECT COUNT(hike) AS Hike FROM knoxville k 
JOIN users u
ON k.user_Id = u.userId 
AND Hike = 'Yes') AS Hike, 
(SELECT COUNT(bonfire) AS Bonfire FROM knoxville k 
JOIN users u
ON k.user_Id = u.userId 
AND Bonfire = 'Yes') AS Bonfire, 
(SELECT COUNT(saturdaySocial) As SaturdaySoc FROM knoxville k 
JOIN users u
ON k.user_Id = u.userId 
AND saturdaySocial = 'Yes') AS 'Saturday Social', 
(SELECT COUNT(sacrament) As Sacrament FROM knoxville k 
JOIN users u
ON k.user_Id = u.userId 
AND sacrament = 'Yes') AS Sacrament, 
(SELECT COUNT(keynotes) As Keynotes FROM knoxville k 
JOIN users u
ON k.user_Id = u.userId 
AND keynotes = 'Yes') AS Keynotes  
FROM knoxville k JOIN users u
ON k.user_Id = u.userId "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}


function getKnoxAge(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT age, Count(age), Count(knox_Id), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(knox_Id) AS t FROM knoxville), '%'), 2) AS Percentage FROM users u
JOIN knoxville k 
ON u.userId = k.user_Id 
GROUP BY age  with rollup"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getKnoxState(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = 'SELECT FORMAT(COUNT(state) * 100 /(SELECT Count(knox_Id) AS t FROM knoxville), 2) AS Percentage,  state, Count(knox_Id) AS Total 
FROM users u 
JOIN knoxville k 
ON u.userId = k.user_Id
GROUP BY state with rollup'; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getKnoxConf(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = 'SELECT conf, Count(knox_Id), Format(Concat(COUNT(conf) * 100 /(SELECT Count(knox_Id) AS t FROM knoxville), '%'), 2) AS Percentage 
FROM knoxville k
JOIN  users u 
ON k.user_Id = u.userId
AND conf IS NOT NULL 
GROUP BY conf 
WITH ROLLUP'; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getKnoxGender(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT gender, Count(knox_Id), Format(Concat(COUNT(gender) * 100 /(SELECT Count(knox_Id) AS t FROM knoxville), '%'), 2) AS Percentage 
FROM users u 
JOIN knoxville k 
ON u.userId = k.user_Id
GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


/* Reports for the Site Accounts */  

function getSiteUsers(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT @rownum:=(@rownum+1) AS num, firstName, lastName, state
FROM (SELECT @rownum:=0) AS initialization, users
ORDER BY state, lastName"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getSiteUsersState(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT state, FORMAT(COUNT(state) * 100 /(SELECT Count(userId) AS t FROM users), 2) AS Percentage,  Count(userId)  FROM users  WHERE state <> ''  GROUP BY state ORDER BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getSiteUsersAge(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT age, Count(userId), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(userId) AS t FROM users), '%'), 2) AS Percentage FROM users u
GROUP BY age"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getSiteUsersGender(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT gender, Count(gender), Format(CONCAT(COUNT(gender) * 100 /(SELECT Count(userId) AS t FROM users), '%'), 2) AS Percentage FROM users u
GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function getSiteUsersWid(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT widowed, Count(widowed), Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(userId) AS t FROM users), '%'), 2) AS Percentage FROM users u
GROUP BY widowed "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSiteUsersWidTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT COUNT(widowed), Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(userId) AS t FROM users), '%'), 2) AS Percentage FROM users u; "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSiteUsersStateTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT COUNT(state), Format(CONCAT(COUNT(state) * 100 /(SELECT Count(userId) AS t FROM users), '%'), 2) AS Percentage FROM users u; "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSiteUsersStateNames(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT state,  Count(state)  FROM users  WHERE state <> ''  GROUP BY state "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}


function getParticipantsREM(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT  @rownum:=(@rownum+1) AS num
,  Concat(firstName, ' ',  lastName) AS 'Person 1'
,  Concat(firstName2, ' ', lastName2) AS 'Person 2'
, phone
, userEmail
, city
, state
FROM (SELECT @rownum:=0) AS initialization, remarried_life r
JOIN users u
ON r.user_id = u.userId"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}
function getParticipantsREMCount(){ 
    //Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT  @rownum:=(@rownum+1) AS num
,  Concat(firstName, ' ',  lastName) AS 'Person 1'
,  Concat(firstName2, ' ', lastName2) AS 'Person 2'
, phone
, userEmail
, city
, state
FROM (SELECT @rownum:=0) AS initialization, remarried_life r
JOIN users u
ON r.user_id = u.userId"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getParticipantsID(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT userId AS Id
, @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, users u
JOIN idaho i 
ON u.userId = i.user_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}
/*UNION 
SELECT @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state
FROM (SELECT @rownum:=0) AS initialization, IdahoWalkinContact c
JOIN IdahoWalkin i 
ON c.walkin_id = i.walkin_id
*/

// IDAHO 2023 REPORT BY AGE ************************************************************************************************
function getIdahoAge(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT age, Count(age), Count(idaho_Id), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(idaho_Id) AS t FROM idaho), '%'), 2) AS Percentage FROM users u
JOIN idaho i 
ON u.userId = i.user_id
GROUP BY age ORDER BY Age;"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getDataByStateIdaho(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = " SELECT FORMAT(COUNT(state) * 100 /(SELECT Count(idaho_Id) AS t FROM idaho), 2) AS Percentage,  state, Count(state) AS Total 
FROM users u 
JOIN idaho i 
ON u.userId = i.user_Id
WHERE state <> ''
GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getIdahoStateTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(state) AS Total, Format(CONCAT(COUNT(state) * 100 /(SELECT Count(idaho_Id) AS t FROM idaho), '%'), 2) AS Percentage 
FROM users u
JOIN idaho i
ON u.userId = i.user_id "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getIdahoStateNames(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT state,  Count(state)  FROM users u
INNER JOIN idaho i 
ON u.userId = i.user_id
WHERE state <> ''  GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function getIdahoGender(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT gender, Count(idaho_Id), Format(Concat(COUNT(gender) * 100 /(SELECT Count(idaho_Id) AS t FROM idaho), '%'), 2) AS Percentage 
FROM users u 
JOIN idaho i 
ON u.userId = i.user_Id
GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getIdahoGenderTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(gender) AS Total, Format(CONCAT(COUNT(gender) * 100 /(SELECT Count(idaho_Id) AS t FROM idaho), '%'), 2) AS Percentage 
FROM users u
JOIN idaho i
ON u.userId = i.user_id "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getIdahoWid(){
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT widowed, Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(user_id) AS t FROM idaho), '%'), 2) AS Percentage 
FROM users u
INNER JOIN idaho i 
ON u.userId = i.user_id
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getIdahoWidTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT  Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(i.user_id) AS t FROM idaho i), '%'), 2) AS Percentage 
FROM users u
INNER JOIN idaho i 
ON u.userId = i.user_id
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
//*****************************************************************************************************************************************//
//*************************************************San Antonio Reports ********************************************************************//
//_________________________________________________________________________________________________________________________________________//

function getParticipantsSA(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT userId AS Id
, @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state 
FROM (SELECT @rownum:=0) AS initialization, users u
JOIN sanAntonio s 
ON u.userId = s.user_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}
/*UNION 
SELECT @rownum:=(@rownum+1) AS num
, CONCAT(firstName, ' ',  lastName) AS 'Name'
, city
, state
FROM (SELECT @rownum:=0) AS initialization, IdahoWalkinContact c
JOIN IdahoWalkin i 
ON c.walkin_id = i.walkin_id
*/


// IDAHO 2023 REPORT BY AGE ************************************************************************************************
function getSAAge(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT age, Count(age), Count(sanAnt_id), Format(CONCAT(COUNT(age) * 100 /(SELECT Count(sanAnt_id) AS t FROM sanAntonio), '%'), 2) AS Percentage FROM users u
JOIN sanAntonio s
ON u.userId = s.user_id
GROUP BY age ORDER BY Age;"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}


function getSAGender(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = "SELECT gender, Count(sanAnt_id), Format(Concat(COUNT(gender) * 100 /(SELECT Count(sanAnt_id) AS t FROM sanAntonio), '%'), 2) AS Percentage 
FROM users u 
JOIN sanAntonio s 
ON u.userId = s.user_Id
GROUP BY gender"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSAGenderTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(gender) AS Total, Format(CONCAT(COUNT(gender) * 100 /(SELECT Count(sanAnt_id) AS t FROM sanAntonio s), '%'), 2) AS Percentage 
FROM users u
JOIN sanAntonio s
ON u.userId = s.user_id "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}





function getDataByStateSA(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    $sql = " SELECT FORMAT(COUNT(state) * 100 /(SELECT Count(sanAnt_id) AS t FROM sanAntonio), 2) AS Percentage,  state, Count(state) AS Total 
FROM users u 
JOIN sanAntonio s 
ON u.userId = s.user_Id
WHERE state <> ''
GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSAStateTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT Count(state) AS Total, Format(CONCAT(COUNT(state) * 100 /(SELECT Count(sanAnt_id) AS t FROM sanAntonio), '%'), 2) AS Percentage 
FROM users u
JOIN sanAntonio s
ON u.userId = s.user_id "; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSAStateNames(){ 
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT state,  Count(state)  FROM users u
INNER JOIN sanAntonio s 
ON u.userId = s.user_id
WHERE state <> ''  GROUP BY state"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function getSAWid(){
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT widowed, Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(user_id) AS t FROM sanAntonio), '%'), 2) AS Percentage 
FROM users u
INNER JOIN sanAntonio s
ON u.userId = s.user_id
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;
}

function getSAWidTotal(){ 
    
//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT  Count(widowed) AS Total, Format(CONCAT(COUNT(widowed) * 100 /(SELECT Count(s.user_id) AS t FROM sanAntonio s), '%'), 2) AS Percentage 
FROM users u
INNER JOIN sanAntonio s  
ON u.userId = s.user_id
GROUP BY widowed"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}

function totalSARegistered(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "
SELECT  Count(s.user_id) AS 'San Antonio Total', (SELECT COUNT(u.userId) AS 'Number of Accounts on the Website' FROM users u) AS Total, Format(CONCAT(COUNT(s.user_id) * 100 /(SELECT Count(u.userId) AS t FROM users u), '%'), 2) AS Percentage 
FROM users u
JOIN sanAntonio s  
ON u.userId = s.user_id"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
function totalSARegisteredbyDate(){ 

//Create a connection object using the the widowsConnect function
    $db = widowsConnect();
    //sql statement 
    
    $sql = "SELECT  DATE_FORMAT(s.date_created, '%m/%d/%Y') AS 'Date Registered' , Count(s.user_id) AS 'Total By Day' 
FROM users u
JOIN sanAntonio s  
ON u.userId = s.user_id
GROUP BY s.date_created"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
$stmt->closeCursor();
return $result;

}
