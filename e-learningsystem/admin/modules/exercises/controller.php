<?php
include('../../../include/databaseConn.php');
require_once ("../../../include/initialize.php");
if (!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert($connection);
	break;
	
	case 'edit' :
	doEdit($connection);
	break;
	
	case 'delete' :
	doDelete($connection);
	break; 

}

function doInsert($connection){

	if(isset($_POST['save'])){
	
		$lessonID 			    = $_POST['Lesson']; 
		$question				= $_POST['Question']; 
		$answer				    = $_POST['Answer'];
		$choiceA 				= $_POST['ChoiceA'];
		$choiceB				= $_POST['ChoiceB']; 
		$choiceC				= $_POST['ChoiceC']; 
		$choiceD				= $_POST['ChoiceD']; 
		
		$query="INSERT INTO `tblquestion`(`lesson_id`, `question`, `choiceA`, `choiceB`, `choiceC`, `choiceD`, `answer`) VALUES ('$lessonID','$question','$choiceA','$choiceB','$choiceC','$choiceD','$answer')";

		$exec= mysqli_query($connection,$query);

		if($exec){
			message("New Question created successfully!", "success");  
		}else{
			$error = mysqli_error($connection);
			message("Error: " . "<br>" . $error, "error");
		}
		redirect("index.php");
	}

}

function doEdit($connection){
	
	if(isset($_POST['save'])){
		$id = $_POST['ExerciseID'];

		$lessonID  = $_POST['Lesson']; 
		$question = $_POST['Question']; 
		$answer	 = $_POST['Answer'];
		$choiceA = $_POST['ChoiceA'];
		$choiceB = $_POST['ChoiceB']; 
		$choiceC = $_POST['ChoiceC']; 
		$choiceD = $_POST['ChoiceD']; 
		

		$query = "UPDATE `tblquestion` SET `lesson_id`='$lessonID',`question`='$question',`choiceA`='$choiceA',`choiceB`='$choiceB',`choiceC`='$choiceC',`choiceD`='$choiceD',`answer`='$answer' WHERE ques_id='{$id}'";
		echo $query;
		$exec= mysqli_query($connection,$query);

		if($exec){
			message("Question has been updated!", "success");
		}else{
			$error = mysqli_error($connection);
			message("Error: " . "<br>" . $error, "error");
		}	
		redirect("index.php");
	}
}


function doDelete($connection){

	$id = 	$_GET['id'];

	$sql  = "DELETE FROM `tblquestion`";
	$sql .= " WHERE ques_id=".$id;
	$sql .= " LIMIT 1 ";


	$exec= mysqli_query($connection,$sql);

	if($exec){
		message("Question already Deleted!","info");
	}else{
		$error = mysqli_error($connection);
		message("Error: " . "<br>" . $error, "error");
	}

	redirect('index.php');

	
	


}
?>