<?php
    session_start();

    if(!isset($_SESSION["MIN_id"]))
    {
        header("location: login.php");
    }
    $userID = $_SESSION["MIN_id"];
?>

<html>
<head>
</head>
<body>
    <p>Hii</p>

    <form action="Rep_Reg.php" method="get">
        <input type="submit" value="Add Representitive">
    </form>
    
    <form action="../Control/View_Representitive.php" method="get">
        <input type="submit" value="Show Users">
    </form>
    
    <h4><a href="../Control/Session_Destroy.php">logout</a></h4>

</body>
</html>