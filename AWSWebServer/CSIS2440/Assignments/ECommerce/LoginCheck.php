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
        . $myusername . "' and mypassword='" . $Hashed . "'";

$result = $con-> query($sql);

if (!$result) {
    $failmess = "Whole query " . $sql; 
    echo $failmess;
    die('Invalid query: ' . mysqli_error());
} 

$count = $result->num_rows;

if ($count == 1) {
    $_SESSION['user'] = $myusername;
    $_SESSION['password'] = $mypassword;
    
    header("Location:catalogue.php");
} else {
    header("Location:LoginForm.php");
    $_SESSION['badPass']++;
}


?>
