<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "db_elearning";

$connection = mysqli_connect($hostname, $username, $password,$databasename);

if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}


$fetchData= fetch_data($connection);

function fetch_data($connection){
  $sql  = "SELECT review.*,";
	$sql .= "lesson.LessonSubject,lesson.LessonTopic";
	$sql .= " FROM `tblreview` as review";
	$sql .= " inner join `tbllesson` as lesson on review.LessonID = lesson.LessonID";
  
  $exec=mysqli_query($connection, $sql);
	$row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
	return $row;

}
?>
