<!DOCTYPE html>
<?php
require_once 'DataBaseConnection.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
$sex = $_POST['sex'];
$relation = $_POST['relation'];
$requestType = $_POST['requestType'];
// print_r($_POST);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Results Page</title>
    </head>
    <body>
        <?php
        switch ($requestType) {
            case "Create":
//                echo "creating here";
                $insert = "INSERT INTO `Library`.`FandF` (`fname`, `lname`, `phone`, "
                    . "`address`, "
                        ."`city`, `state`, `zip`, `month`, `day`, `year`, `myusername`, `mypassword`, `sex`, `relation`) "
                          . "VALUES ('$fname', '$lname', '$phone', '$address', '$city', '$state', $zip, $month, $day, $year, '$myusername', '$mypassword', '$sex', '$relation')";
                $success = $con->query($insert);
                
                $search = "SELECT * FROM Library.FandF WHERE myusername LIKE '%$myusername%'";
            
                $return = $con->query($search);
                
                if ($success == FALSE) {
                    $failmess = "Whole query " . $insert . "<br>"; 
                    echo $failmess;
                    die('Invalid query: ' . mysqli_error($con));
                } else {
                    echo "<table class='table'><thead><th>First Name</th><th>Last Name</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Birth Month</th><th>Birth Day</th><th>Birth Year</th><th>Sex</th><th>Relation</th></thead><tbody>";
                    while ($row = $return->fetch_assoc()) {
                        echo "<tr><td>" . $row['fname']
                        . "</td><td>" . $row['lname']
                        . "</td><td>" . $row['phone']
                        . "</td><td>" . $row['address']
                        . "</td><td>" . $row['city']
                        . "</td><td>" . $row['state']
                        . "</td><td>" . $row['zip']
                        . "</td><td>" . $row['month']
                        . "</td><td>" . $row['day']
                        . "</td><td>" . $row['year']
                        . "</td><td>" . $row['sex']
                        . "</td><td>" . $row['relation'] . "</td></tr>";     
                    }
                    echo "</tbody></table>";
                }
                break;
            case "Update":
//                echo "updating here";
                if ($myusername) {
                    $update = "UPDATE `Library`.`FandF` SET `address`='$address', `city`='$city', `state`='$state', `zip`='$zip', `sex`='$sex', `relation`='$relation' WHERE `myusername`='$myusername'";
                
                    $success = $con->query($update);

                    $search = "SELECT * FROM Library.FandF WHERE myusername Like '%$myusername%'";

                    $return = $con->query($search);
                    if ($success == FALSE) {
                        $failmess = "Whole query " . $update . "<br>"; 
                        echo $failmess;
                        die('Invalid query: ' . mysqli_error($con));
                    } else {
                        echo "<table class='table'><thead><th>First Name</th><th>Last Name</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Birth Month</th><th>Birth Day</th><th>Birth Year</th><th>Sex</th><th>Relation</th></thead><tbody>";
                        while ($row = $return->fetch_assoc()) {
                            echo "<tr><td>" . $row['fname']
                            . "</td><td>" . $row['lname']
                            . "</td><td>" . $row['phone']
                            . "</td><td>" . $row['address']
                            . "</td><td>" . $row['city']
                            . "</td><td>" . $row['state']
                            . "</td><td>" . $row['zip']
                            . "</td><td>" . $row['month']
                            . "</td><td>" . $row['day']
                            . "</td><td>" . $row['year']
                            . "</td><td>" . $row['sex']
                            . "</td><td>" . $row['relation'] . "</td></tr>";     
                        }
                        echo "</tbody></table>";
                    }     
                } else {
                    echo "<p>You need to have the user name!</p>";
                }  
                break;
            case "Search":
//                echo "search here";
                $search = "SELECT * FROM Library.FandF WHERE fname LIKE '%$fname%' OR '%$lname'";
            
                $return = $con->query($search);

                if (!$return) {
                    $failmess = "Whole query " . $search . "<br>"; 
                    echo $failmess;
                    die('Invalid query: ' . mysqli_error($con));
                }
                echo "<table class='table'><thead><th>First Name</th><th>Last Name</th><th>Phone</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Birth Month</th><th>Birth Day</th><th>Birth Year</th><th>Sex</th><th>Relation</th></thead><tbody>";
                while ($row = $return->fetch_assoc()) {
                    echo "<tr><td>" . $row['fname']
                    . "</td><td>" . $row['lname']
                    . "</td><td>" . $row['phone']
                    . "</td><td>" . $row['address']
                    . "</td><td>" . $row['city']
                    . "</td><td>" . $row['state']
                    . "</td><td>" . $row['zip']
                    . "</td><td>" . $row['month']
                    . "</td><td>" . $row['day']
                    . "</td><td>" . $row['year']
                    . "</td><td>" . $row['sex']
                    . "</td><td>" . $row['relation'] . "</td></tr>";
                }
                echo "</tbody></table>";
                break;
            default: echo 'This is bad<br />';
        }
        $con->close;
        ?>
        <a href="FormPage.php">Back</a>
    </body>
</html>
