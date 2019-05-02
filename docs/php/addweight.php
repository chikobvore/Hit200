<?php
require '../dbh/dbh.php';

$i = 0;

if(isset($_POST['weight'.$i]))
{
  while(!empty($_POST['weight'.$i]))
  {
      $Assessment_id =  $_POST['weight'.$i];
      $mark =  $_POST['mark'.$i];

      $sql = "INSERT INTO weights (Assessment_id,Weight) VALUES ($Assessment_id,$mark)";
      if($Conn->query($sql)== TRUE){
          $_SESSION['message'] = "Assessment weights successfully addedd";
          header('location: ../pages/department.php');
      }
      else{
        $_SESSION['message'] = "Failed to process request";
        header('location: ../pages/department.php');
      }

      $i =  $i + 1;

  }
}else{
    echo "ERROR";
}