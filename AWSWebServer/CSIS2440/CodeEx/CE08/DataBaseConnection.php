<?php
    $host="localhost"; // 127.0.0.1
    $user="root";
    $password="DBAdmin";
    $dbname="Library";

    $con = new mysqli($host, $user, $password, $dbname)
	or die ('Could not connect to the database server' . mysqli_connect_error($con));

if ($con->connect_error == FALSE) {
    echo "<h2>We are Connected</h2>";
} else {
    echo $con->connect_error;
}