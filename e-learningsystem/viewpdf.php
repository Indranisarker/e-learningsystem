<?php  
  @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
  $lesson = New Lesson();
  $res = $lesson->single_lesson($id);

?> 
<h2>View PDF File</h2>
<p style="font-size: 18px;font-weight: bold;">Subject : <?php echo $res->LessonSubject;?> | Topic : <?php echo $res->LessonTopic;?></p>
<div class="container">
	<embed src="<?php echo web_root.'admin/modules/lesson/'.$res->FileLocation; ?>" type="application/pdf" width="100%" height="400px" />
</div> 