<?php

session_start();
include '../Model/MIN_Db.php';

$mydb = new mydb();
$conobj = $mydb->openCon();
$result = $mydb->GetREP_Data($conobj,$_SESSION["MIN_id"]);

if ($result && $result->num_rows > 0) {
    foreach ($result as $row) {
        echo "Representitive ID : ".$row["REP_ID"]."<br>";
        echo "User Image : "."<img src='".$row["REP_IMG"] ."' width=80>";"<br>";
        echo "Representitive Work catageory : ".$row["	REP_Work_Catageory"]."<br>";
        echo "Email: " .$row["U_Email"] ."<br>";
        echo "DOB: " . $row["U_DOB"]."<br>" ;
        echo "Gender: " . $row["U_Gender"] ."<br>" ;
        echo "Last Name: " . $row["U_L_Name"] ."<br>";
        echo "First Name: " .$row["U_F_Name"] ."<br>";
        echo "Contact: " . $row["U_Contact_No"] ."<br>";

        echo "<form action='Remove_Rep.php' method='post' style='display:inline;'>";
        echo "<input type='hidden' name='REP_ID' value='" . $row["REP_ID"] . "'>";
        echo "<input type='submit' value='Remove'>";
        echo "</form>";

        echo "<br>";
        echo "<br>";
    }
} else {
    echo "No representitive found";
}

$mydb->closeCon($conobj);
?>