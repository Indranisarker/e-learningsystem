<?php   
include('../../../include/databaseConn.php');
@$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}

$res = fetch_single_ques($connection,$id);
function fetch_single_ques($connection,$id){

  $query="SELECT * FROM `tblquestion` Where ques_id= '{$id}' LIMIT 1";
  $exec=mysqli_query($connection, $query);

  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}

?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" style="margin-top: 20px;"> 
  <div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">Update Question</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "Lesson">Lesson:</label>

    <div class="col-md-12">
      <input type="hidden" name="ExerciseID" value="<?php echo $res->ques_id;?>"> 
      <select style="width: 73%" class="form-control" name="Lesson">
        <?php 
        $sql = "SELECT * FROM `tbllesson` WHERE LessonID=".$res->lesson_id;

        $exec=mysqli_query($connection, $sql);
        $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);

        foreach ($row as $lesson) {
          echo '<option SELECTED value='.$lesson['LessonID'].'>'.$lesson['LessonSubject'].'</option>';
        }

        $sql = "SELECT * FROM `tbllesson` WHERE LessonID!=".$res->lesson_id;
        $exec=mysqli_query($connection, $sql);
        $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
        foreach ($row as $lesson) {
                                 # code...
          echo '<option value='.$lesson['LessonID'].'>'.$lesson['LessonSubject'].'</option>';
        }
        ?>
      </select>
    </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "Question">Question:</label>

    <div class="col-md-12">
      <textarea style="width: 70%" class="form-control input-sm" id="Question" name="Question" placeholder=
      "Question Name" type="text"><?php echo $res->question;?></textarea>

    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "ChoiceA">A:</label>

    <div class="col-md-12">

     <input style="width: 70%" class="form-control input-sm" id="ChoiceA" name="ChoiceA" placeholder=
     "" type="text" value="<?php echo $res->choiceA; ?>">
   </div>
 </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "ChoiceB">B:</label>

    <div class="col-md-12">

     <input style="width: 70%" class="form-control input-sm" id="ChoiceB" name="ChoiceB" placeholder=
     "" type="text" value="<?php echo $res->choiceB; ?>" required>
   </div>
 </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "ChoiceC">C:</label>

    <div class="col-md-8">

     <input style="width: 70%" class="form-control input-sm" id="ChoiceC" name="ChoiceC" placeholder=
     "" type="text" value="<?php echo $res->choiceC; ?>" required>
   </div>
 </div>
</div>
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "ChoiceD">D:</label>

    <div class="col-md-12">
      <input style="width: 70%" class="form-control input-sm" id="ChoiceD" name="ChoiceD" placeholder=
      "" type="text" value="<?php echo $res->choiceD; ?>" required>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "Answer">Answer:</label>

    <div class="col-md-12">

     <input style="width: 70%" class="form-control input-sm" id="Answer" name="Answer" placeholder=
     "Answer" type="text" value="<?php echo $res->answer; ?>" required>
   </div>
 </div>
</div> 

<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "idno"></label>

    <div class="col-md-8">
     <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Update</button> 
   </div>
 </div>
</div> 
</form>