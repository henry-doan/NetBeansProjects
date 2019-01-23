<!DOCTYPE html>

<html>
<?php

print_r($_POST);

$name = htmlentities($_POST['HeroName']);
$name = strtolower($name);
$name = ucwords($name);
$race = $_POST['Race'];
$class = $_POST['Class'];
$age = $_POST['Age'];
$gender = $_POST['Gender'];
$kingdom = $_POST['KingdomName'];

require 'CharacterArrays.php';

$characterport = "<img src='Heroimages/";
$charactersheet = "<header><h4>$name from $kingdom</h4><br>"
        . "<b>$race $class</b><br>At the age of $age</header>";

switch ($race) {
    case "Human":
        $characterport .= "Hu";
        $charactersheet = $charactersheet . $charDesc[0];
        break;
    case "Elf":
        $characterport = $characterport . "El";
        $charactersheet = $charactersheet . $charDesc[1];
        break;
    case "Dwarf":
        $characterport = $characterport . "Dw";
        $charactersheet = $charactersheet . $charDesc[2];
        break;
    case "Halfling":
        $characterport = $characterport . "Ha";
        $charactersheet = $charactersheet . $charDesc[3];
        break;
    default:
        $characterport = $characterport . "";
        $charactersheet = $charactersheet . "You picked a race that does not exsit<br>";   
}

switch ($class) {
    case "Fighter":
        $characterport = $characterport . "Fi";
        $charactersheet = $charactersheet . $charDesc[0];
        break;
    case "Cleric":
        $characterport = $characterport . "Cl";
        $charactersheet = $charactersheet . $charDesc[1];
        break;
    case "Thief":
        $characterport = $characterport . "Th";
        $charactersheet = $charactersheet . $charDesc[2];
        break;
    case "Magic-User":
        $characterport = $characterport . "Ma";
        $charactersheet = $charactersheet . $charDesc[3];
        break;
    default:
        $characterport = $characterport . "";
        $charactersheet = $charactersheet . "You picked a class that does not exsit<br>";   
}

if ($gender == "Male") {
    $characterport = $characterport . "Ma.jpg'>";
} else {
    $characterport = $characterport . "Fe.jpg'>";
}

?> 
    <head>
        <meta charset="UTF-8">
        <title>A Made Adventure</title>
        <link href="./view.css" rel="stylesheet" type="text/css">
        <style>
            img{
                height: 250px;
                padding: 3pt;
                float: right;
            }
        </style>
    </head>
    <body>
        <div id="form_container">
            <h3 class="Content">The Brave Adventurer</h3>
            <div class="CharacterSheer">
               <?php
                print ($characterport);
                print ($charactersheet);
                ?> 
            </div>         
        </div>
    </body>
</html>
