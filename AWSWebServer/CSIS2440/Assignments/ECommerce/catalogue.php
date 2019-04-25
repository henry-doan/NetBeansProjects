<?php
    session_start();
    
    setlocale(LC_MONETARY, 'en_US');
    $product_id = $_POST['Select_Product'];
    $action = $_POST['action'];
    
    switch($action) {
        case 'Add':
            $_SESSION['cart'][$product_id] ++;
            break;
        case 'Remove':
            $_SESSION['cart'][$product_id] --;
            if ($_SESSION['cart'][$product_id] <= 0) {
                unset($_SESSION['cart'][$product_id]);
            }
            break;
        case 'Empty':
            unset($_SESSION['cart']);
            break;
        case 'Info':
            $infonum = $product_id;
            break;
        
    }
//    print_r($_SESSION);
    require_once 'DataBaseConnection.php';
    
    if(array_key_exists('signout', $_POST)){
        signout();
    }
    
    function signout(){
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        unset($_SESSION['cart']);
        session_destroy();
        header('Location: LoginForm.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catalogue</title>
    </head>
    <body>
        <form method="post">
            <input type="submit" name="signout" id="signout" value="Logout" /><br/>
        </form>
        <div class="form" id="form_container">
            <form action="catalogue.php" method="Post">
                <div>
                    <p><span class="text">Please Select a product:</span>
                        <select id="Select_Product" name="Select_Product" class="select">
                            <option value=""></option>
                            <?php
                                
                            $search = "SELECT Name, ProductID FROM Library.Products order by Name";
                            $return = $con->query($search);
                            
                            if (!$return) {
                                $msg = "Whole query: " . $search;
                                echo $msg;
                                die('Invalid Query: ' . mysqli_error());
                            }
                            
                            while ($row = mysqli_fetch_array($return)) {
                                if ($row['ProductID'] == $product_id) {
                                    echo "<option value='" . $row['ProductID']."' selected='selected'>". $row['Name']. "</option>\n";
                                } else {
                                    echo "<option value='" . $row['ProductID']. "'>" . $row['Name']. "</option>\n";
                                }
                            }
                            
                            ?>
                        </select></p>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <input id="button_Add" type="submit" value="Add" name="action" class="button">
                                </td>
                                <td>
                                    <input name="action" type="submit" class="button" id="button_Remove" value="Remove">
                                </td>
                                <td>
                                    <input name="action" type="submit" class="button" id="button_empty" value="Empty">
                                </td>
                                <td>
                                    <input name="action" type="submit" class="button" id="button_Info" value="Info">
                                </td>
                            </tr>                    
                        </tbody>
                    </table>

                </div>
                <div id="productInformation">
                    
                </div>
                <div>
                    <?php
                        if ($infonum > 0) {
                            $sql = "SELECT Name, Price, Description, Img FROM Library.Products WHERE ProductID = " . $infonum;
                            
                            echo "<table align='left' width='100%'><tr><th>Name</th><th>Price</th><th>Desciption</th>";
                            $result = $con->query($sql);
                                
                             if(mysqli_num_rows($result) > 0) {
                                list($infoname, $infoprice, $infodescript, $infoimage) = mysqli_fetch_row($result); 
                                echo "<tr>";
                                echo "<td align=\"center\" width=\"450px\">$infoname</td>";
                                echo "<td align=\"center\" width=\"325px\">". money_format('%(#8n', $infoprice) . "</td>";
                                echo "<td align=\"center\" width=\"450px\">$infodescript</td>";
                                echo "<td align=\"left\" width=\"450px\"><img src='images\\$infoimage' height=\"160\" width=\"160px\"></td>";
                                echo "</tr>";
                            }
                            echo "</table>";  
                        }
                    
                    ?>
                </div>
                <div id="Display_cart">
                    <?php
                        if ($_SESSION['cart']) {
                            
                            echo "<table border=\"1\" padding=\"3\" width=\"700px\"><tr><th>Name</th><th>Price</th>"
                            ."<th width=\"80px\">Line</th></tr>";
                            
                            foreach($_SESSION['cart'] as $product_id => $quantity) {
                                $sql = "SELECT Name, Price FROM Library.Products WHERE ProductID = " . $product_id;
                                $result = $con->query($sql);
                                
                                if(mysqli_num_rows($result) > 0) {
                                    list($name, $price) = mysqli_fetch_row($result); 
                                    $line_cost = $price * $quantity;
                                    $total = $total + $line_cost;
                                    echo "<tr>";
                                    echo "<td align=\"left\" width=\"450px\">$name</td>";
                                    echo "<td align=\"center\" width=\"75px\">". money_format('%(#8n', $price) . "</td>";
                                    echo "<td align=\"center\">" . money_format('%(#8n', $line_cost). "</td>";
                                    echo "</tr>";
                                }
                                
                            }
                            echo "<tr>";
                            echo "<td align=\"right\"></td>";
                            echo "<td align=\"right\">Total</td>";
                            echo "<td align=\"right\">" . money_format('%(#8n', $total). "</td>";
                            echo "</tr>";
                            echo "</table>";               
                        } else {
                            echo 'You have no items in your shopping cart.';
                        }
                        
                        mysqli_close($con)
                    ?> 
                </div>
            </form>
        </div>
    </body>
</html>
