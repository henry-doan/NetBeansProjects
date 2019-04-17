<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Success</title>
    </head>
    <body>
        <p>You logged in</p>
        <?php
         echo $_SESSION['user']
        ?>
    </body>
</html>
