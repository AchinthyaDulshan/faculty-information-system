<?php
session_start();
include "db_connection.php";

$getDetailsSQL = "SELECT * FROM student_details WHERE student_details.id='" .$_SESSION['studentId'] . "' ;";

$results = mysqli_query($conn,$getDetailsSQL);
$rows = array();
while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
}

echo json_encode($rows);

?>