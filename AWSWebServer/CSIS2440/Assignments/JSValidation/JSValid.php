<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>JS Validation</title>
    </head>
    <body>
        <!--<input type="button" onclick="popup()" value="Click Me!">-->
        <form action="#" name="myForm" onsubmit="return(validate());" method="post">
            <table cellspacing="2" cellpadding="2" border="1">
                <tr>
                    <td align="right">First Name</td> 
                    <td><input type="text" name="First" /></td>
                </tr>
                <tr>
                    <td align="right">Last Name</td> 
                    <td><input type="text" name="Last" /></td>
                </tr>
                <tr>
                    <td align="right">Phone</td> 
                    <td><input type="text" name="Phone" /></td>
                </tr>
               
                <tr>
                    <td align="right"></td>  
                    <td><input type="submit" value="Submit"/></td>  
                </tr>
            </table>  
        </form>
<!--        <div id="msglog">
            
        </div>-->
        <?php
        // put your code here
        ?>
        <script src="myjs.js"></script>
    </body>
</html>
