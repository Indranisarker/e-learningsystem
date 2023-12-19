<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "db_elearning";

$connection = mysqli_connect($hostname, $username, $password,$databasename);

if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}

?>
<?php
include('read_review.php');
if (!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?> 
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
}

table {
  border-collapse: collapse;
  width: 80%;
}

td {
  text-align: center;
}
</style>
</head>
<body>

<div class="module-head"> 
	<h1 class="page-header">List of Reviews </h1> 

</div>
<form action ="" Method="POST"> 
<div class="col-lg-6">
	<div class="table-responsive">
<table id="example" class=" datatable-1 table table-bordered table-hover" cellspacing="0" style="font-size:12px" >
		<thead>
			<tr> 
            <th width="5%">sl</th>
				<th>Lesson</th>
				<th>Publish Date</th>
				<th>Review Content</th>
				<th>Rating</th>

			</tr>	
		</thead> 
		<tbody>
			<?php  
				//$sql = "SELECT * FROM tblreview ";
				//$exec=mysqli_query($connection, $sql);
               // $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);-->
				$i = 0;
			foreach ($fetchData as $result) {

				echo '<tr>';
                echo '<td>'.++$i.'</td>';
				echo '<td>' . $result['LessonTopic'].'</a></td>'; 
				echo '<td>' . $result['Review_datetime'].'</a></td>'; 
				echo '<td>' . $result['Details'].'</a></td>'; 
                echo '<td>' . $result['Rating'].'</a></td>'; 
			echo '</tr>';
		} 
		?>
	</tbody>
</table>
	</form>
	</div>
	</div>
	</body>
	</html>
