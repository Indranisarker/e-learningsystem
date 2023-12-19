<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
    $cb = fopen("log.html", 'a');
    fwrite($cb, "<div class='msgln'>(".$dt->format('g:i a').") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($cb);
}
?>