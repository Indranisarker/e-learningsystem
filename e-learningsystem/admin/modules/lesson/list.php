<?php
include('read-scriptLesson.php');
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?>

<div class="module-head"> 
	<h1 class="page-header">List of Lessons      <a href="index.php?view=add" class="btn btn-primary">Add New</a> </h1> 


</div> 
<form action="controller.php?action=delete" Method="POST">  
	<div class="table-responsive">			
		<table id="example" class="datatable-1 table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">

			<thead>
				<tr> 
					<th>Subject</th>
					<th>Topic</th> 
					<th>File Type</th> 
					<th>Description</th> 	
					<th>Date</th> 
					<th width="30%" >Action</th>

				</tr>	
			</thead> 
			<tbody>
				<?php    

				foreach ($fetchData as $result) {
					echo '<tr>'; 
					echo '<td>'. $result['LessonSubject'].'</td>';
					echo '<td>'. $result['LessonTopic'].'</td>'; 
					echo '<td>'. $result['Category'].'</td>';

					if ($result['Category']=="Video") {
				  			# code...
						$view = "index.php?view=playvideo&id=".$result['LessonID'];
					}else{
						$view = "index.php?view=viewpdf&id=".$result['LessonID'];

					}
					echo '<td>'. $result['LessonDescription'].'</td>';
					echo '<td>'. $result['PublishDate'].'</td>';

					echo '<td align="center" > 
					
					<a title="View Files"  href="'.$view.'" class="btn btn-info btn-xs" ><span class="fa fa-info fw-fa"></span> View</a>
					<a title="Delete" href="controller.php?action=delete&id='.$result['LessonID'].'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> Delete</a>
				</td>';
				echo '</tr>';
			} 
			?>
		</tbody>

	</table> 
</div>
</form>
