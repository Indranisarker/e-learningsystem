
<?php 
$studentid = $_SESSION['StudentID'];

@$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}

$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE  StudentID='{$studentid}'";
$mydb->setQuery($sql);
$row = $mydb->executeQuery(); 
$ans = $mydb->loadSingleResult();
$dbTotalScore  = $ans->SCORE ?? 0;
echo  $Tscore = '<h3>Your  Total Score : ' . $dbTotalScore.'</h3>';


$sql = "SELECT * FROM tblscore WHERE LessonID='{$id}' and StudentID ='{$studentid}'";
$mydb->setQuery($sql);
$result = $mydb->loadSingleResult();
$dbScoreInThisTest = $result->Score ?? 0;

$currentTest=$_GET['testScore'];
// echo  $Tscore = '<h3>Your  Score in this test : ' . $TotalScore.'</h3>';


?>
<?php
if ($dbScoreInThisTest==0) { 
if (isset($_GET['testScore'])) {
  echo  $score = '<h3>Your current test Score is : ' . $currentTest.'</h3>';
}

  ?>

<form action="validation.php" method="POST" style="margin-top: 10px;text-align: left;">
  <input type="hidden" name="LessonID" value="<?php echo $id ?>">
  <input type="hidden" name="tstScore" id="tstScore" value="<?php echo $currentTest ?>">
  <input type="hidden" name="totalTestScore" id="totalTestScore" value="<?php echo $TotalScore ?>">
  <input type="hidden" name="studentId" id="studentId" value="<?php echo $studentid ?>">
  <button class="btn btn-md btn-primary" type="submit" name="btnSubmit">Submit Score </button>
</form>
<?php }else{ 
echo  $score = '<h3>You Score in this test is : ' . $dbScoreInThisTest.'</h3>';
echo  $asd = '<h3>Exercise already Submitted</h3>';
  } ?>
<h1>Question</h1>
<h5>See all Corrent ans.</h5>
<div style="height:100%;overflow-y:auto;width: 90%"> 
  <?php    
  $sql = "SELECT * FROM tblquestion WHERE lesson_id = '{$id}'";
  $mydb->setQuery($sql);
  $cur = $mydb->loadResultList();

  foreach ($cur as $res) {
  	# code...
  	$sql = "SELECT * FROM tblquestion WHERE ques_id='{$res->ques_id}'";
  	$mydb->setQuery($sql);
  	$ans = $mydb->loadSingleResult();



    ?> 

    <div style="margin-top: 5px;"><?php echo $res->question ; ?></div>
    <div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->answer==$res->choiceA) ? 'CHECKED' : ''; ?>> A. <?php echo $res->choiceA; ?></div>
    <div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->answer==$res->choiceB) ? 'CHECKED' : ''; ?>> B. <?php echo $res->choiceB; ?></div>
    <div class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->answer==$res->choiceC) ? 'CHECKED' : ''; ?>> C. <?php echo $res->choiceC; ?></div>
    <div style="margin-bottom: 20px;"class="col-md-3"><input class="radios" type="radio" disabled="true" <?php echo ($ans->answer==$res->choiceD) ? 'CHECKED' : ''; ?>> D. <?php echo $res->choiceD; ?></div> 

    <?php } ?>
  </div>
  