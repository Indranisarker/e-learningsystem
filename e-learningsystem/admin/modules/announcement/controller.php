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
	
		$Title = $_POST['title']; 
		$publish_date = $_POST['publishDate']; 
		$content = $_POST['content'];

		
        $query = "INSERT INTO `tblannouncement`(`title`, `publish_date`, `content`) VALUES ('$Title','$publish_date','$content')";
		$exec= mysqli_query($connection,$query);

		if($exec){
			message("New Announcement created successfully!", "success");  
		}else{
			$error = mysqli_error($connection);
			message("Error: " . "<br>" . $error, "error");
		}
		redirect("index.php");
	}

}

function doEdit($connection){
	
	if(isset($_POST['save'])){
		$id = $_POST['announcement_id'];

		$Title = $_POST['title']; 
		$publish_date = $_POST['publish_date']; 
		$content = $_POST['content']; 

		$query = "UPDATE `tblannouncement` SET `announcement_id`='$id',`title`='$Title',`publish_date`='$publish_date',`content`='$content' WHERE announcement_id='{$id}'";
		echo $query;
		$exec= mysqli_query($connection,$query);

		if($exec){
			message("Announcement has been updated!", "success");
		}else{
			$error = mysqli_error($connection);
			message("Error: " . "<br>" . $error, "error");
		}	
		redirect("index.php");
	}
}


function doDelete($connection){
	$id = 	$_GET['id'];

	$sql  = "DELETE FROM `tblannouncement`";
	$sql .= " WHERE announcement_id=".$id;
	$sql .= " LIMIT 1 ";


	$exec= mysqli_query($connection,$sql);

	if($exec){
		message("Announcement already Deleted!","info");
	}else{
		$error = mysqli_error($connection);
		message("Error: " . "<br>" . $error, "error");
	}

	redirect('index.php');

	
	


}
?>