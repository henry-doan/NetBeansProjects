<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email Validation</title>
        <script src="myjs.js"></script>
    </head>
    <body>
        <!--<input type="button" onclick="popup()" value="Click Me!">-->
        <form action="#" name="myForm" onsubmit="return(validate());" method="post">
            <table cellspacing="2" cellpadding="2" border="1">
                <tr>
                    <td align="right">Name</td> 
                    <td><input type="text" name="Name" /></td>
                </tr>
                <tr>
                    <td align="right">Email</td> 
                    <td><input type="text" name="Email" /></td>
                </tr>
                <tr>
                    <td align="right">Zip Code</td> 
                    <td><input type="text" name="Zip" /></td>
                </tr>
                <tr>
                    <td align="right">Country</td> 
                    <td>
                        <select name="Country">
                            <option value="-1" selected>[choose yours]</option>
                            <option value="1">USA</option>
                            <option value="2">UK</option>
                            <option value="3">INDIA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>  
                    <td><input type="submit" value="Submit"/></td>  
                </tr>
            </table>  
        </form>
        <div id="errlog">
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
