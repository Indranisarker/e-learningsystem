<?php
require_once("include/initialize.php");  
$studentid = $_SESSION['StudentID'];
$lessonid = $_POST['LessonID'];
$testScore = $_POST['tstScore'];



redirect("index.php?q=quizresult&id={$lessonid}&score=&testScore={$testScore}");

?>