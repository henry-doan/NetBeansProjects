<!DOCTYPE html>
<?php
require_once 'DataBaseConnection.php';
$name = $_POST['name'];
$ac = $_POST['ac'];
$hd = $_POST['hd'];
$att = $_POST['att'];
$damage = $_POST['damage'];
$move = $_POST['move'];
$treasure = $_POST['treasure'];
$xp = $_POST['xp'];
$action = $_POST['action'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Monsterous Results</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        print_r($_post);
        switch ($action) {
            case "insert":
//                 echo "inserting here";
                $insert = "INSERT INTO `Library`.`Monsters` (`MonsterName`, `MonsterAC`, `HitDice`, "
                    . "`MonsterAttack`, "
                        ."`MonsterDamage`, `MonsterMove`, `MonsterTreasure`, `MonsterXP`, `Active`) "
                          . "VALUES ('$name', $ac, $hd, $att, '$damage', $move, '$treasure', $xp, 'N')";
                $success = $con->query($insert);
                
                if ($success == FALSE) {
                    $failmess = "Whole query " . $insert . "<br>"; 
                    echo $failmess;
                    die('Invalid query: ' . mysqli_error($con));
                } else {
                    echo "$name was added<br>";
                }
                break;
            case "update":
//                echo "update here";
                $update = "UPDATE `Library`.`Monsters` SET `Active`='Y'";
                if ($xp > 0) {
                    $update = $update . ", MonsterXP = $xp";
                }
                if ($treasure != "--") {
                    $update = $update . ", MonsterTreasure = '$treasure'";
                }
                $update.= " WHERE `MonsterName`='$name'";
                $success = $con->query($update);
                
                if ($success == FALSE) {
                    $failmess = "Whole query " . $update . "<br>"; 
                    echo $failmess;
                    die('Invalid query: ' . mysqli_error($con));
                } else {
                    echo "$name was made active<br>";
                }
                break;
            case "search":
//                echo "search here";
                $search = "SELECT * FROM Library.Monsters where MonsterName Like '%$name%' Order by MonsterName";
            
                $return = $con->query($search);

                if (!$return) {
                    $failmess = "Whole query " . $search . "<br>"; 
                    echo $failmess;
                    die('Invalid query: ' . mysqli_error($con));
                }
                echo "<table class='table'><thead><th>Name</th><th>AC</th><th>Hit Dice</th><th>XP</th></thead><tbody>";
                while ($row = $return->fetch_assoc()) {
                    echo "<tr><td>Name: " . $row['MonsterName']
                    . "</td><td> AC: " . $row['MonsterAC']
                    . "</td><td> HD:" . $row['HitDice']
                    . "</td><td> XP:" . $row['MonsterXP'] . "</td></tr>";     
                }
                echo "</tbody></table>";
                break;
            default: echo 'This is bad<br />';
        }   
        
        $con->close;
        ?>
        <a href="MonsterInterface.php">Back</a>

    </body>
</html>
