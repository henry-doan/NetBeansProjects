<!DOCTYPE html>

<html>
<?php

    print_r($_POST);

    $name = htmlentities($_POST['Name']);
    $name = strtolower($name);
    $name = ucwords($name);
    $age = $_POST['Age'];
    $address = $_POST['Address'];
    $state = $_POST['State'];
    $gender = $_POST['Gender'];

    
    printf("<br><ul><li>name: %s </li><li>age: %d </li><li>address: %s </li><li>state: %s</li><li>sex: %s</li></ul><br>", $name, $age, $address, $state, $gender);
    
//    if ($gender == "Male") {
//        $img = "Ma.jpg'>";
//    } else {
//        $img = "Fe.jpg'>";
//    }
    
    $year = date(Y);
    print("<p>" . $year . "</p>");
    for($i = 0; $i < $age; $i++){
        $year -= 1;
        print("<p>" . $year . "</p>");
    }
    
    $peom = explode("\n", file_get_contents('PostPage.txt'));
        
    for($i = 0; $i < sizeof($peom); $i++) {
        print($peom[$i] . "<br>");
    }
?>
</html>
