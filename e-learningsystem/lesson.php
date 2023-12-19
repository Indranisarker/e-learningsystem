<?php 
include('include/databaseConn.php');
?>
<h1><?php echo $title;?></h1>
<div class="col-lg-6">
	<h3>PDF</h3>
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="2%">sl</th>
				<th>Subject</th>
				<th>Topic</th>
				<th>Description</th> 
				<th width="2%">Action</th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tbllesson WHERE Category='Docs'";
				$exec=mysqli_query($connection, $sql);
                $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
				$i = 0;
				foreach ($row as $result) {
					# code...
					echo '<tr>';
					echo '<td>'.++$i.'</td>';
					echo '<td>'.$result['LessonSubject'].'</td>';
					echo '<td>'.$result['LessonTopic'].'</td>';
					echo '<td>'.$result['LessonDescription'].'</td>';
					echo '<td><a href="index.php?q=viewpdf&id='.$result['LessonID'].'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> View File</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="col-lg-6">
	<h3>VIDEO</h3>
	<div class="table-responsive">
		<table id="example2" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Subject</th>
				<th>Topic</th>
				<th>Decription</th>
				<th width="2%">Action</th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tbllesson WHERE Category='Video'";
				$exec=mysqli_query($connection, $sql);
                $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
				$i = 0;
				foreach ($row as $result) {

					echo '<tr>';
					echo '<td>'.++$i.'</td>';
					echo '<td>'.$result['LessonSubject'].'</td>';
					echo '<td>'.$result['LessonTopic'].'</td>';
					echo '<td>'.$result['LessonDescription'].'</td>'; 
					echo '<td><a href="index.php?q=playvideo&id='.$result['LessonID'].'" class="btn btn-xs btn-info"><i class="fa fa-play"></i> Play Video</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>