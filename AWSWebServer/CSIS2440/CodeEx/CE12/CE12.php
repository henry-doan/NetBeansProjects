<?php
session_start();
// print_r($_SESSION);
// session_destroy();

if (!isset($_SESSION["randNum"])) {
    $_SESSION["randNum"] = rand(1, 100);
    $_SESSION["NumGuesses"] = 0;
    $_SESSION["low"] = 1;
    $_SESSION["high"] = 100;
}

$randNum = $_SESSION["randNum"];
$userGuess = $_POST["userGuess"];
$count = $_SESSION["NumGuesses"];
$msg = '';

if (isset($_POST["userGuess"]) && $userGuess > 0 ) {
    $_SESSION["NumGuesses"]++;
    $count++;
    if($userGuess < $randNum) {
        $msg = "<center>You guessed too low!</center>"
                . "You are on guess $count";
        $_SESSION["low"] = $userGuess + 1;
    } else if ($userGuess > $randNum) {
        $msg = "<center>You guessed too high!</center>"
                . "You are on guess $count";
        $_SESSION["high"] = $userGuess - 1;
    } else if ($userGuess == $randNum) {    
        $msg = "<center>Congrats! You're Right!</center>"
                . "You guessed right in $count guesses";
        $_SESSION["low"] = $userGuess;
        $_SESSION["high"] = $userGuess;
        unset($_SESSION["randNum"]);
        unset($_SESSION["NumGuesses"]);
        session_destroy();
    }
} else  {
   $msg = "<center>Are you ready to start!</center>"
                . "You are on guess $count "; 
}

echo <<< HTML
<html>
    <head>
        <title>Guessing Game</title>
    </head>
    <body> 
        <center>
            <form action="CE12.php" method="POST">
                Guess a number 1-100: <select name="userGuess">
HTML;
if ($_SESSION["low"] == $_SESSION["high"]) {
    echo "<option value='0'>".$_SESSION["high"]."</option>";
} else {
    for ($i = $_SESSION["low"]; $i <= $_SESSION["high"]; $i++) {
        echo "<option value='$i'>$i</option>";
    }
}
echo <<< HTML
    </select>
    <input type="submit" value="Guess" name="button" />

        </form>
    </center>
HTML;

echo $msg;
echo "</body></html>";


?>
