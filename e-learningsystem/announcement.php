<?php 
include('include/databaseConn.php');
?>
<h1><?php echo $title;?></h1>
<div class="col-lg-6">
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="5%">sl</th>
				<th>Title</th>
				<th>Publish Date</th>
				<th> Content </th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tblannouncement ";
				$exec=mysqli_query($connection, $sql);
                $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
				$i = 0;
				foreach ($row as $result) {
					# code...
					echo '<tr>';
					echo '<td>'.++$i.'</td>';
					echo '<td>'.$result['title'].'</td>';
					echo '<td>'.$result['publish_date'].'</td>';
					echo '<td>'.$result['content'].'</td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>