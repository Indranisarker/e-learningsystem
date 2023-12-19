<?php 
require_once("include/initialize.php");  
if (!isset($_SESSION['StudentID'])) {
  # code...
  redirect('login.php');
}
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
  case 'lesson':
    $title = "Lesson";
    $content = 'lesson.php';
   # code...
   break; 
  case 'exercises':
    $title = "Exercises";
    $content = 'exercise.php';
   # code...
   break;
   
   
  case 'download':
    $title = "Download";
    $content = 'download.php';
   # code...
   break;
   case 'announcement':
    $title = "Notice Board";
    $content = 'announcement.php';
   # code...
   break;
   case 'review':
    $title = "Reviews";
    $content = 'review.php';
   # code...
   break;

  case 'about':
    $title = "About Us";
    $content = 'about.php';
   # code...
   break; 
  case 'playvideo':
    $title = "Play Video";
    $content = 'playvideo.php';
   # code...
   break; 
  case 'viewpdf':
    $title = "Play Video";
    $content = 'viewpdf.php';
   # code...
   break;
   case 'viewcontent':
    $title = "Play Video";
    $content = 'viewcontent.php';
   # code...
   break; 

  case 'question':
    $title = "Question";
    $content = 'question.php';
   # code...
   break; 
  case 'quizresult':
    $title = "Result";
    $content = 'quizresult.php';
   # code...
   break; 
  default :
    $title = "Home";
    $content    = 'home.php';
}
require_once("theme/templates.php");
?>