<?php
    session_start();
    // print_r($_SESSION);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
    </head>
    <body>
        <form name="form1" method="post" action="CodeExLoginCheck.php">
            <table align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                <tbody>
                    <tr>
                        <td colspan="3"><strong>Member Login </strong></td>
                    </tr>
                    <tr>
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294">
                            <input name="myusername" type="text" id="myusername" class="error">
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            <input name="mypassword" type="password" id="mypassword">
                            <?php
                                if (isset($_SESSION['badPass'])) {
                                    echo "<br> Username or password do not match";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="Submit" value="Login" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://ec2-34-216-141-98.us-west-2.compute.amazonaws.com/CSIS2440/Assignments/MySQLForm/FormPage.php">Create an Account</a>
                        </td>
                    </tr>
                </tbody></table>
            </form>
    </body>
</html>
