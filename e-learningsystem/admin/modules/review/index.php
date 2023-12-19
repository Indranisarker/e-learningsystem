<?php
require_once("../../../include/initialize.php");
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}
?>
<?php
$content='list_review.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {  
	default :
	  $content    = 'list_review.php';
}
require_once("../../themes/templates.php");
?>