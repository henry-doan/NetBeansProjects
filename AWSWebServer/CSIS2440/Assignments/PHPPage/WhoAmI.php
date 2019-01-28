<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="form_container">
            <form method="post" action="WhoYouAre.php">
                <label>Name: </label>
                <input type="text" name="Name" />
                <label>Age: </label>
                <input type="number" name="Age" />
                <label>Address: </label>
                <input type="text" name="Address" />
                <label>State: </label>
                <input type="text" name="State" />
                <label>Sex: 
                F<input type="radio" value="F" name="Gender" checked="true">  M<input type="radio" value="M" name="Gender">
                </label>
            </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
