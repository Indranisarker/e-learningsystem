<?php
include('../../../include/databaseConn.php');
$fetchData= fetch_data($connection);

function fetch_data($connection){


	$sql  = "SELECT ques.*,";
	$sql .= "lesson.LessonSubject,lesson.LessonTopic";
	$sql .= " FROM `tblquestion` as ques";
	$sql .= " inner join `tbllesson` as lesson on ques.lesson_id = lesson.LessonID";

	$exec=mysqli_query($connection, $sql);
	$row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
	return $row;

}
?>