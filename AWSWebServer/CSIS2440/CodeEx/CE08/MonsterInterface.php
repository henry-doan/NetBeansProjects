<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Monster Interface</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <h4>Here is a list of the monsters we have in the Database</h4>
                <?php
                    require_once 'DataBaseConnection.php';

                    $search = "SELECT * FROM Library.Monsters Order by MonsterName";
            
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
                ?>
                </div>
                <div class="col-md-5 col-sm-5">
                    <form action="MonsterResults.php" method="post" role="form">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="name">Monster Name:</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="ac">Monster AC:</label>
                                        <input type="number" name="ac" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="hd">Hit Dice:</label>
                                        <input type="number" name="hd" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="att">Attack:</label>
                                    <input type="number" name="att" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="damage">Damage:</label>
                                    <input name="damage" type="text" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="move">Movement:</label>
                                    <input type="number" name="move" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="treasure">Treasure:</label>
                                    <select name="treasure" class="form-control">
                                        <option value="--">--</option>
                                        <option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
<option value="E">E</option>
<option value="F">F</option>
<option value="G">G</option>
<option value="H">H</option>
<option value="I">I</option>
<option value="J">J</option>
<option value="K">K</option>
<option value="L">L</option>
<option value="M">M</option>
<option value="N">N</option>
<option value="O">O</option>
<option value="P">P</option>
<option value="Q">Q</option>
<option value="R">R</option>
<option value="S">S</option>
<option value="T">T</option>
<option value="U">U</option>
<option value="V">V</option>
                                    </select>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label for="xp">Experience Value:</label>
                                    <input type="number" name="xp" class="form-control">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <input type="submit" value="insert" name="action" class="btn btn-default">
                                    <input type="submit" value="update" name="action" class="btn btn-default">
                                    <input type="submit" value="search" name="action" class="btn btn-default">
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
