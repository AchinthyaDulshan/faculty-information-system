<?php
session_start();
include "db_connection.php";

$getCoursesSQL = "SELECT courseCode,courseName,academicYear,Is_GPA_Counted FROM student_details,registeredcourses,course,academicyear
WHERE registeredcourses.course_id = course.id AND registeredcourses.student_details_id = student_details.id AND registeredcourses.academicYear_id = academicYear.id AND student_details.id=" . $_SESSION['studentId'] . ";";

$results = mysqli_query($conn,$getCoursesSQL);
$rows = array();
while ($row = mysqli_fetch_assoc($results)) {
    $rows[] = $row;
}

echo json_encode($rows);

?>