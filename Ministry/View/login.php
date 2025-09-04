<?php
    session_start();

    if(isset($_SESSION["MIN_id"]))
    {
        header("location: Home.php");
    }
?>

<html>
    <head>
        <title> Ministry Login </title>
    </head>

    <body>
        <fieldset>
        
        <legend><h2>MInistry Official's Login</h2></legend>
        <form action="../Control/Login_Control.php" method="post">
            <table>
                
                <tr>
    
                    <td><h4>MInistry Official's ID:</h4></td>
                    <td><h4><input type="text" name="MIN_id"></h4></td>
                </tr>
                <tr>
                    <td><h4>Password:</h4></td>
                    <td><h4><input type="password" name="MIN_password"> </h4></td>
                </tr>
                <tr>
                    <td></td>
                <td><input type="submit" value="Login">
                    <input type="reset" value="Reset"></td>
                    
                </tr>

                <tr>
                    <td></td>
                    <td><a href="Registration.php">Go to Registration Page</a></td>
                </tr>
                
                
            </table>
            </form>
        </fieldset>
    </body>
</html>