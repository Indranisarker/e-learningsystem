<?php
include('read-ques.php');
if (!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

?> 
<div class="module-head"> 
	<h1 class="page-header">List of Question <a href="index.php?view=add" class="btn btn-primary">New</a> </h1> 

</div> 
<form action="controller.php?action=delete" Method="POST">  					
	<table id="example" class=" datatable-1 table table-bordered table-hover" cellspacing="0" style="font-size:12px" >

		<thead>
			<tr> 
				<th>Lesson</th>
				<th>Question</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
				<th>Answer</th>
				<th width="10%">Action</th>

			</tr>	
		</thead> 
		<tbody>
			<?php  


			foreach ($fetchData as $result) {

				echo '<tr>'; 
				echo '<td>' . $result['LessonSubject'].'</a></td>'; 
				echo '<td>' . $result['question'].'</a></td>'; 
				echo '<td>' . $result['choiceA'].'</a></td>'; 
				echo '<td>' . $result['choiceB'].'</a></td>'; 
				echo '<td>' . $result['choiceC'].'</a></td>'; 
				echo '<td>' . $result['choiceD'].'</a></td>'; 
				echo '<td>' . $result['answer'].'</a></td>'; 

				echo '<td > <a style="margin-bottom:5px;" title="Edit" href="index.php?view=edit&id='.$result['ques_id'].'" class="btn btn-primary btn-xs" >Edit</a>
				<a title="Delete" href="controller.php?action=delete&id='.$result['ques_id'].'" class="btn btn-danger btn-xs" >Delete</a>
			</td>';
			echo '</tr>';
		} 
		?>
	</tbody>

</table>


</form>
