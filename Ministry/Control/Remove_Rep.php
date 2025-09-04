<?php
session_start();
include '../Model/MIN_Db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["REP_ID"])) {
    $REP_ID = $_POST["REP_ID"];
    $mydb = new mydb();
    $conobj = $mydb->openCon();
    $result = $mydb->removeRepresentative($conobj, $REP_ID);

    if ($result) {
        echo "Representative removed successfully.";
    } else {
        echo "Error removing representative.";
    }

    $mydb->closeCon($conobj);
} else {
    echo "Invalid request.";
}
?>
