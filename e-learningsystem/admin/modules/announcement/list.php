<?php
include('read_announce.php');
if (!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?> 
<div class="module-head"> 
	<h1 class="page-header">List of Announcement <a href="index.php?view=add" class="btn btn-primary">New</a> </h1> 

</div> 
<form action="controller.php?action=delete" Method="POST">  					
	<table id="example" class=" datatable-1 table table-bordered table-hover" cellspacing="0" style="font-size:12px" >

		<thead>
			<tr> 
				<th>Title</th>
				<th>Publish Date</th>
				<th>Content</th>
				<th width="10%">Action</th>

			</tr>	
		</thead> 
		<tbody>
			<?php  


			foreach ($fetchData as $result) {

				echo '<tr>'; 
				echo '<td>' . $result['title'].'</a></td>'; 
				echo '<td>' . $result['publish_date'].'</a></td>'; 
				echo '<td>' . $result['content'].'</a></td>'; 
				
				echo '<td > <a style="margin-bottom:5px;" title="Edit" href="index.php?view=edit&id='.$result['announcement_id'].'" class="btn btn-primary btn-xs" >Edit</a>
				<a title="Delete" href="controller.php?action=delete&id='.$result['announcement_id'].'" class="btn btn-danger btn-xs" >Delete</a>
			</td>';
			echo '</tr>';
		} 
		?>
	</tbody>

</table>


</form>
