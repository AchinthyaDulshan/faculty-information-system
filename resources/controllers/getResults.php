<?php
session_start();
include "db_connection.php";

$getResultSQL = "SELECT courseCode,courseName,academicYear,attempt,status, note,grade,gpa_value,Is_GPA_Counted FROM student_details,course,results,grade,academicyear
    WHERE results.course_id = course.id AND results.student_details_id = student_details.id AND results.academicYear_id = academicYear.id AND results.grade_id = grade.id AND student_details.id='" .$_SESSION['studentId'] . "' ;";



$results = mysqli_query($conn,$getResultSQL);
$rows = array();
while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
}

echo json_encode($rows);

?>