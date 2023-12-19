<?php
include('../../../include/databaseConn.php');
$fetchData= fetch_data($connection);

function fetch_data($connection){
  $query="SELECT * from `tbllesson`";
  $exec=mysqli_query($connection, $query);
  $rowcount=mysqli_num_rows($exec);
  
  if($rowcount>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
?>

