<?php
session_start();
unset($_SESSION['badPass']);

// data from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

require_once 'DataBaseConnection.php';

// to protect my sql injection
$myusername = mysql_fix_string($con, $myusername);
$mypassword = mysql_fix_string($con, $mypassword);

// Hashing
$Hashed = hash("ripemd128", $mypassword);

$sql = "SELECT * FROM Library.FandF WHERE myusername='"
        . $myusername . "' and mypassword='" . $mypassword . "'";

$result = $con-> query($sql);

if (!$result) {
    $failmess = "Whole query " . $sql; 
    echo $failmess;
    die('Invalid query: ' . mysqli_error());
} 

// mysql_num_row is counting table rows
$count = $result->num_rows;

// if the result matched the username and password table row must be 1 row
if ($count == 1) {
    $_SESSION['user'] = $myusername;
    $_SESSION['password'] = $mypassword;
    
    // register with the name and password and redirect to the success
    header("Location:CodeExLoginSuccess.php");
} else {
    header("Location:CodeExLoginForm.php");
    $_SESSION['badPass']++;
}


?>