<?php
$studentid = $_SESSION['StudentID'];
$score = 0;
$id = $_GET['id'];
if($id==''){
  redirect("index.php");
}

$sql = "SELECT * FROM tblscore WHERE LessonID='{$id}' and StudentID ='{$studentid}'";
$mydb->setQuery($sql);
$result = $mydb->loadSingleResult();
$submitted = $result->Score ?? 0;

if($submitted!=0){
$sql = "SELECT SUM(Score) as 'SCORE' FROM tblscore  WHERE  StudentID='{$studentid}'";
$mydb->setQuery($sql);
$row = $mydb->executeQuery(); 
$ans = $mydb->loadSingleResult();
$score  = $ans->SCORE;

if ($score!=null) {
  redirect("index.php?q=quizresult&id={$id}&score={$score}&testScore=");
}
}

?>

<h1>Question</h1>
<h5>Choose the correct answer.</h5>
<div style="height:100%;overflow-y:auto;width: 90%"> 
  <?php   
  $sql = "SELECT * FROM tblquestion WHERE lesson_id = '{$id}'";
  $mydb->setQuery($sql);
  $cur = $mydb->loadResultList();
  foreach ($cur as $res) {
  	$sql = "SELECT * FROM tblquestion WHERE ques_id='{$res->ques_id}'";
    $mydb->setQuery($sql);
    $ans = $mydb->loadSingleResult();

    ?> 
    <form> 
      <div><?php echo $res->question ; ?></div>
       <?php
      $choiceAID = 'ChoiceA_'.$res->ques_id;
      $choiceBID = 'ChoiceB_'.$res->ques_id;
      $choiceCID = 'ChoiceC_'.$res->ques_id;
      $choiceDID = 'ChoiceD_'.$res->ques_id;
      $answerID  =  'Answer_'.$res->ques_id;
      ?>
      <input type="hidden" name="answer" id="<?php echo $answerID; ?>" value="<?php echo $ans->answer ?>">
     

      <div class="col-md-3"><input class="radios" type="radio" id="<?php echo $choiceAID ?>" data-id="<?php echo $res->ques_id;?>" name="choices" onclick="CheckAnsA(<?php echo $res->ques_id; ?>)" value=" <?php echo $res->choiceA; ?>"> A. <?php echo $res->choiceA; ?></div>
      
      <div class="col-md-3"><input class="radios" type="radio" id="<?php echo $choiceBID ?>" data-id="<?php echo $res->ques_id;?>" name="choices" onclick="CheckAnsB(<?php echo $res->ques_id; ?>)" value="<?php echo $res->choiceB; ?>"> B. <?php echo $res->choiceB; ?></div>
      
      <div class="col-md-3"><input class="radios" type="radio" id="<?php echo $choiceCID ?>" data-id="<?php echo $res->ques_id;?>" name="choices" onclick="CheckAnsC(<?php echo $res->ques_id; ?>)" value="<?php echo $res->choiceC; ?>"> C. <?php echo $res->choiceC; ?></div>
     
      <div class="col-md-3"><input class="radios" type="radio" id="<?php echo $choiceDID ?>" data-id="<?php echo $res->ques_id;?>" name="choices" onclick="CheckAnsD(<?php echo $res->ques_id; ?>)" value="<?php echo $res->choiceD; ?>"> D. <?php echo $res->choiceD; ?></div> 
    </form>
    <?php } ?>
  </div>
  <form action="processscore.php" method="POST" style="margin-top: 100px;text-align: right;">
    <input type="hidden" name="LessonID" value="<?php echo $id ?>">
    <input type="hidden" name="tstScore" id="tstScore" value="">
    <button class="btn btn-md btn-primary" type="submit" name="btnSubmit">Submit  <i class="fa fa-arrow-right"></i></button>
  </form>
  <script type="text/javascript">
    var testScore = 0;
    function CheckAnsA(quesId) {
      console.log(testScore);
      var ans = document.getElementById("Answer_"+quesId).value
      var choiceA = document.getElementById("ChoiceA_"+quesId).value
      if (choiceA.trim() === ans.trim()){
        testScore++;
      }
      document.getElementById("tstScore").value = testScore;
      console.log(ans);
    }

    function CheckAnsB(quesId) {
      console.log(testScore);
      var ans = document.getElementById("Answer_"+quesId).value
      var choiceB = document.getElementById("ChoiceB_"+quesId).value
      if (choiceB.trim() === ans.trim()){
        testScore++;
      }
      document.getElementById("tstScore").value = testScore;
    }

    function CheckAnsC(quesId) {
      console.log(testScore);
      var ans = document.getElementById("Answer_"+quesId).value
      var choiceA = document.getElementById("ChoiceC_"+quesId).value
      if (choiceA.trim() === ans.trim()){
        testScore++;
      }
      document.getElementById("tstScore").value = testScore;
    }
    function CheckAnsD(quesId) {
      console.log(testScore);
      var ans = document.getElementById("Answer_"+quesId).value
      var choiceA = document.getElementById("ChoiceD_"+quesId).value
      if (choiceA.trim() === ans.trim()){
        testScore++;
      }
      document.getElementById("tstScore").value = testScore;
    }
  </script>
