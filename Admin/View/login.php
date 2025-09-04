<html>
    <head>
        <title> Admin Login </title>
    </head>

    <body>
        <fieldset>
        
        <legend><h2>Admin Login</h2></legend>
        <form  action="../Control/Login_Control.php" method="post" onsubmit="return validation()">
            <table>
                
                <tr>
    
                    <td><h4>Admin ID:</h4></td>
                    <td><h4><input type="text" name="AD_ID" id="AD_ID"></h4></td>
                    <td><h4 id="iderror"></h4></td>

                </tr>
                <tr>
                    <td><h4>Password:</h4></td>
                    <td><h4><input type="password" name="AD_password" id="AD_password"> 
                    <input type="checkbox" id="showPassword"> Show Password</h4></td>
                    <td><h4 id="passworderror"></h4></td>
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
        <script src="../JS/ad_login.js"></script>
    </body>
</html>