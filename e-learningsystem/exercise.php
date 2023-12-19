<h1><?php echo $title;?></h1>
<div class="col-lg-12">
	<div class="table-responsive">
		<table id="example" class="table table-bordered">
			<thead>
				<th width="2%">#</th>
				<th>Subject</th>
				<th>Topic</th> 
				<th width="10%">Action</th>
			</thead>
			<tbody>
				<?php 
				$sql = "SELECT * FROM tbllesson";
				$mydb->setQuery($sql);
				$cur = $mydb->loadResultList();
				$i = 0;
				foreach ($cur as $result) {
					echo '<tr>';
					echo '<td>'.++$i.'</td>';
					echo '<td>'.$result->LessonSubject.'</td>';
					echo '<td>'.$result->LessonTopic.'</td>';
					echo '<td><a href="index.php?q=question&id='.$result->LessonID.'" class="btn btn-xs btn-info">View Exercises</a></td>';
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>