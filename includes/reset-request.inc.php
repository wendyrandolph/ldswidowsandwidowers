<?php 
session_start(); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
// Get the database connection file
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/connections.php');
// Get the functions library
require_once($_SERVER['DOCUMENT_ROOT'] . '/library/functions.php');
//Get the accounts-model.php as needed 
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/accounts-model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/mailer.php');

if(isset($_POST["reset-request-submit"])){

//echo "This is the reset-requces.inc file";
//exit; 
$selector = bin2hex(random_bytes(8)); 
$token = random_bytes(32);
$time = date('Y-m-d H:i:s');

$expires = date("U") + 900; 

$pwdResetUserName = $_POST["pwdResetUserName"]; 
//echo $pwdResetUserName; 
//exit; 
$pwdResetEmail = getResetEmail($pwdResetUserName); 
$pwdResetEmail = $pwdResetEmail['userEmail']; 

$deleteToken = deletePwdToken($pwdResetUserName);

$hashedToken = password_hash($token, PASSWORD_DEFAULT); 

$resetPwd = passwordReset($pwdResetEmail, $pwdResetUserName, $selector, $hashedToken, $expires, $time); 
//echo $resetPwd; 
//exit; 
$resetEmail = pwdResetRequest($pwdResetEmail, $selector); 
$test = bin2hex($token); 
$_SESSION['test'] = $test; 
 

//echo $_SESSION['test']; 
//exit; 
 header("Location: /create-new-password"); 
}else { 
    header("Location: /account/login");
}