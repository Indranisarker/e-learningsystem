<?php
require_once("include/initialize.php");  

$studentid = $_SESSION['StudentID'];
$lessonId = $_POST['LessonID'];
$currentTestScore = $_POST['tstScore'];
$TotalTestScore = $_POST['totalTestScore'];

$sql = "SELECT * From tblscore WHERE LessonID = '{$lessonId}' AND StudentID='{$studentid}'";
$mydb->setQuery($sql);
$row = $mydb->executeQuery();
$maxrow = $mydb->num_rows($row);

if ($maxrow>0) { 
	$newScore = $TotalTestScore + $currentTestScore;
	$sql = "UPDATE tblscore SET Score='{$newScore}' WHERE LessonID = '{$lessonId}' AND StudentID='{$studentid}'";  
	$mydb->setQuery($sql);
	$mydb->executeQuery();

}else{ 
	$sql = "INSERT INTO tblscore (`LessonID`, `StudentID`, `Score`) VALUES ('{$lessonId}','{$studentid}','{$currentTestScore}')";
	$mydb->setQuery($sql);
	$mydb->executeQuery(); 
}
 $_SESSION["msg"]= "success";
 redirect("index.php?q=quizresult&id={$lessonId}&score=&testScore=");

?>