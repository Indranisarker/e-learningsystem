<?php
include('../../../include/databaseConn.php');
require_once ("../../../include/initialize.php");
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert($connection);
	break;
	
	case 'delete' :
	doDelete($connection);
	break;


}

function doInsert($connection){ 
	if(isset($_POST['save'])){ 

		$subject = $_POST['LessonSubject'];
		$topic  = $_POST['LessonTopic'];
		$category = $_POST['Category'];
		$description = $_POST['LessonDescription'];
		$date = $_POST['LessonDate'];

		$filename = UploadImage();
		$location = "files/". $filename ;

		$query="INSERT INTO `tbllesson`(`LessonSubject`, `LessonTopic`, `FileLocation`, `Category`, `LessonDescription`, `PublishDate`) VALUES ('$subject','$topic','$location','$category','$description','$date')";

		$exec= mysqli_query($connection,$query);

		if($exec){
			message("Lesson has been saved in the database.", "success");  
		}else{
			$error = mysqli_error($connection);
			message("Error: " . "<br>" . $error, "error");
		}
		redirect("index.php");

	}  
}




function doDelete($connection){

	$id = 	$_GET['id'];

	$sql  = "DELETE FROM `tbllesson`";
	$sql .= " WHERE LessonID=".$id;
	$sql .= " LIMIT 1 ";


	$exec= mysqli_query($connection,$sql);

	if($exec){
		message("Lesson has been removed!","info");  
	}else{
		$error = mysqli_error($connection);
		message("Error: " . "<br>" . $error, "error");
	}

	redirect('index.php');
}



function UploadImage(){
	$target_dir = "files/";
	$target_file = $target_dir  . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


	if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
		|| $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			return   basename($_FILES["file"]["name"]);
		}else{
			echo "Error Uploading File";
			exit;
		}
	}else{
		echo "File Not Supported";
		exit;
	}
} 



?>

