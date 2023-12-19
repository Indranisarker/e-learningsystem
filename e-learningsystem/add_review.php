<?php
include('include/databaseConn.php');
session_start();
if (isset($_POST['submit']))
{
    session_start();
    $Lesson = $_POST['Lesson'];
    $ReviewDate = $_POST['reviewDate'];
    $Details = $_POST['comment'];
    $rating= $_POST['starValue'];
    $query = "INSERT INTO `tblreview`(`Review_datetime`,`Rating`, `LessonID`, `Details`) VALUES ('$ReviewDate','$rating', '$Lesson','$Details')";
    $exec= mysqli_query($connection,$query);
    if ($exec)
    {
        $_SESSION["tostr"]= "success";
        //echo "<script type='text/javascript'>toastr.info('Rating submit successfully!');</script>";  
    }
    else
    {
        $_SESSION["tostr"]= "fails";
    }

    header("location:index.php?q=review");
}
?>