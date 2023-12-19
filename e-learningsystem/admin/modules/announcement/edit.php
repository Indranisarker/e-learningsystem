<?php   
include('../../../include/databaseConn.php');
@$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}

$res = fetch_single_announcement($connection,$id);

function fetch_single_announcement($connection,$id){

  $query="SELECT * FROM `tblannouncement` Where announcement_id= '{$id}' LIMIT 1";
  $exec=mysqli_query($connection, $query);

  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}

?> 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" style="margin-top: 20px;"> 
  <div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">Update Announcement</h1>
  </div>
</div>
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "title">Title:</label>
    <div class="col-md-12">
      <input type="hidden" name="announcement_id" value="<?php echo $res->announcement_id;?>"> 
      <input style="width: 70%" class="form-control input-sm" id="title" name="title" placeholder=
     "Enter title" type="text" value="<?php echo $res->title; ?>">
    </div>
  </div>
</div> 
<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "publish_date">Publish date:</label>
<?php
$dt = new DateTime($res->publish_date);
$date = $dt->format('Y-m-d');
?>
    <div class="col-md-12">
    <input style="width: 70%" class="form-control input-sm" id="publish_date" name="publish_date" placeholder=
     "Enter publish date" type="date" value="<?php echo $date; ?>">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-11">
    <label  for=
    "content">content:</label>

    <div class="col-md-12">
    <textarea style="width: 70%" class="form-control input-sm" id="content" name="content" placeholder=
      "Enter content" type="text"><?php echo $res->content;?></textarea>
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