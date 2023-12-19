<?php 
include('include/databaseConn.php');
error_reporting(0);

$fetchData= fetch_data($connection);
function fetch_data($connection){
  $sql  = "SELECT * FROM tbllesson";

  $exec=mysqli_query($connection, $sql);
  $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
  return $row;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <title>Reviews</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="<?php echo web_root;?>plugins/homepage/assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo web_root;?>plugins/homepage/assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

</head>
<body>
  <div class="container">
   <form class="form-horizontal span6" action="add_review.php" method="POST">
     <div class="row">
       <div class="col-lg-12">
        <h1 class="page-header">Add Rating and Review</h1>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-11">
        <label><b>Lesson: </b></label>
        <div class="col-md-12"> 
          <select style="width: 83%" class="form-control" name="Lesson">
            <?php 
            foreach ($fetchData as $res) {
              echo '<option value='.$res['LessonID'].'>'.$res['LessonTopic'].'</option>';
            }
            ?>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-11">
        <label><b>Review Date</b></label>
        <div class="col-md-10">
         <input style="width: 80%" class="form-control" id="reviewDate" name="reviewDate" placeholder=
         "Enter date" type="date" value="">
       </div>
     </div>
   </div>

   <div class="form-group">
    <div class = "col-md-11"> 
      <label><b> Rating </b></label>
      <div class="col-md-12"> 

        <div class="rating">
          <i class="fa fa-star fa-2x" data-index="0" name = "rateIndex"></i>
          <i class="fa fa-star fa-2x" data-index="1"name = "rateIndex"></i>
          <i class="fa fa-star fa-2x" data-index="2"name = "rateIndex"></i>
          <i class="fa fa-star fa-2x" data-index="3"name = "rateIndex"></i>
          <i class="fa fa-star fa-2x" data-index="4"name = "rateIndex"></i>
          <input type="hidden" id="starValue" name="starValue" value="">
        </div>
        <div class="form-group">
          <div class="col-md-11">
            <label><b>Comment</b></label>
            <div class="col-md-10">
              <input name="deptid" type="hidden" value="">
              <textarea rows="4" style="width: 80%" class="form-control" id="" name="comment" placeholder=
              "Enter Comment" type="text" value="">
            </textarea> 
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">

          <div class="col-md-10">
           <button style="margin-bottom: 10px;margin-top: 30px;"class="btn btn-primary btn-sm" name="submit" type="submit" >Submit</button> 
         </div>
       </div>
     </div> 
   </form>
 </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <?php
 if ($_SESSION['tostr'] != '') 
 {
  $msg = "<script>toastr.info('Rating submit successfully!')</script>"; 
  echo $msg;
  $_SESSION['tostr'] = '';
}
?>
<script>
  var rateIndex = 1;
  $(document).ready(function(){
    resetStarColors();
    if(localStorage.getItem('rateIndex') != null){
      setStars(parseInt(localStorage.getItem('rateIndex')));
    }

    $('.fa-star').on ('click', function(){
      rateIndex = parseInt($(this).data('index'));
      localStorage.setItem('rateIndex',rateIndex);
      saveToDatabase();
    });
    $('.fa-star').mouseover(function(){
      resetStarColors();
      var currentIndex = parseInt($(this).data('index'));
      for(var i = 0; i <= currentIndex; i++){
        $('.fa-star:eq('+i+')').css('color', 'orange');
      }
    });
    $('.fa-star').mouseleave(function(){
      resetStarColors();
      if(rateIndex != -1){
        for(var i = 0; i <= rateIndex; i++){
          $('.fa-star:eq('+i+')').css('color', 'orange');
        }
      }
    });


  });
  function saveToDatabase(){
   document.getElementById("starValue").value = rateIndex+1;
 }

 function setStars(max){
  for(var i = 0; i <= max; i++){
    $('.fa-star:eq('+i+')').css('color', 'orange');
  }
}
function resetStarColors(){
  $('.fa-star').css('color', 'black');
}

</script>

</body>
</html>
