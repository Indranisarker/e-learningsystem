<style type="text/css">
 
  .secondrow > .row {
     border: 1px solid #ddd;
    /*padding: 5px 30px;*/
    text-align: center; 
    margin: 20px;
    min-height: 50px;
     border-radius: 50%;
  }
  .imgstretch{ 
    padding: 10px 30px;
  }
  .imgstretch img {
    width: 100%;
    height: 100px;
  }

 
</style>
<?php
include('../include/databaseConn.php');

$lessonCount = count_lesson($connection);
function count_lesson($connection){
  $query="SELECT count(LessonID) as CL FROM `tbllesson` ";
  $exec=mysqli_query($connection, $query);
  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}


$announcementCount = count_announcement($connection);
function count_announcement($connection){
  $query="SELECT count(announcement_id) as CA FROM `tblannouncement`";
  $exec=mysqli_query($connection, $query);
  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}

$exerciseCount = count_exercise($connection);
function count_exercise($connection){
  $query="SELECT count(ques_id) as CE FROM `tblquestion`";
  $exec=mysqli_query($connection, $query);
  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}

$ratioCount = count_review($connection);
function count_review($connection){
  $query="SELECT avg(Rating) as CR FROM `tblreview`";
  $exec=mysqli_query($connection, $query);
  while ($row = mysqli_fetch_object($exec)) {
    return $data = $row;
  }
}
?>
  <div class="btn-controls">

    <div class="btn-box-row row-fluid">
        <a href="#" class="btn-box big span4"><i class="icon-book"></i><b><?php  echo $lessonCount->CL ?></b>
            <p class="text-muted">
                Lesson</p>
        </a><a href="#" class="btn-box big span4"><i class="icon-bullhorn"></i><b><?php  echo $announcementCount->CA ?></b>
            <p class="text-muted">
                Announcement</p>
        </a><a href="#" class="btn-box big span4"><i class="icon-random"></i><b><?php  echo $exerciseCount->CE ?></b>
            <p class="text-muted">
                Exercises</p>
        </a><a href="#" class="btn-box big span4"><i class="icon-star"></i><b><?php  echo $ratioCount->CR ?></b>
            <p class="text-muted">
                Average Rating</p>
        </a>
    </div> 
</div>