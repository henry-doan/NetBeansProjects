<!DOCTYPE html>

<html>
    <meta charset="UTF-8">
        <title>WhoYouAre</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
            .m-bg {
                background-color: #00B7FD;
            }
            
            .f-bg {
                background-color: #E889A5;
            }
        </style>
<?php

//    print_r($_POST);

    $name = htmlentities($_POST['Name']);
    $name = strtolower($name);
    $name = ucwords($name);
    $age = $_POST['Age'];
    $address = $_POST['Address'];
    $state = $_POST['State'];
    $gender = $_POST['Gender'];

    if ($gender == "M") {
        $color = "m-bg";
        $img = "src='./img/guy.jpeg' alt='guy' />";
    } else {
        $color = "f-bg";
        $img = "src='./img/lady.jpeg' alt='lady' />";
    }
    
    printf( "<body class='%s'>"
        . "<div class='row container'>"
        . "<br /><br />"
        . "<h1 class='center-align'>Who You Are</h1>"
        . "<div class='container'>"
        . "<div class='row'>"
            . "<div class='col s8'>"
                . "<h1>You are</h1>"
                . "<ul><li>name: %s </li><li>age: %d </li><li>address: %s </li><li>state: %s</li><li>sex: %s</li></ul><br>"
            . "</div>"
            . "<div class='col s4'>"
                . "<img width='300' class='profile-pic' %s"
            . "</div>"
        . "</div>"
        . "<hr/>"
    . "</div>", $color, $name, $age, $address, $state, $gender, $img);

    
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
        </div>
    </body>
</html>
