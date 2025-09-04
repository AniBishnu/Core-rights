<?php
    session_start();
 
    if(isset($_SESSION["VLN_ID"]))
    {
        header("location: Home.php");
    }
?>
<html>
    <head>
        <title> Volunteer Login </title>
    </head>

    <body>
        <fieldset>
        
        <legend><h2>Volunteer Login</h2></legend>
        <form action="../Control/login_volunteer_control.php" method="post" onsubmit="return validation()">
            <table>
                
                <tr>
    
                    <td><h4>Volunteer ID:</h4></td>
                    <td><h4><input type="text" name="VLN_ID" id="VLN_ID"></h4></td>
                    <td><h4 id="iderror"></h4></td>
                </tr>
                <tr>
                    <td><h4>Password:</h4></td>
                    <td><h4><input type="password" name="VLN_password" id="VLN_password"> 
                    <input type="checkbox" id="showPassword"> Show Password</h4></td>
                    <td><h4 id="passerror"></h4></td>

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
        <script src="../JS/volunteer_login.js"></script>
    </body>
</html>