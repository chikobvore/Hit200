<?php
require '../dbh/dbh.php';
session_start();

$Department = $_SESSION['Department'];

$i = 0;
$Totalmark = 0;

if(isset($_POST['weight'.$i]))
{
  $id = $_POST['weight'.$i];
  
  $Total = 0;
  while(!empty($_POST['weight'.$i]))
  {
    $Total =  $Total + $_POST['mark'.$i];
    $i = $i  + 1;
  }
 
  $sql = "SELECT Level FROM assessment_details WHERE Assessment_id = $id";
  $result = mysqli_query($Conn,$sql);
  $Confirm = mysqli_num_rows($result);
  if($Confirm > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $level = $row['Level'];
    }
  }else{
    echo $sql . "<br>" . $Conn->error;
  }


  if($Total == 100)
  {
    $i = 0;
    while(!empty($_POST['weight'.$i]))
    {
        $Assessment_id =  $_POST['weight'.$i];
        $mark =  $_POST['mark'.$i];
  
        $sql = "INSERT INTO weights (Assessment_id,Weight,Department) VALUES ($Assessment_id,$mark,'$Department')";
        if($Conn->query($sql)== TRUE){
            $_SESSION['message'] = "Assessment weights successfully addedd";
            // header('location: ../pages/department.php');
        }
        else{
          $sql = "UPDATE weights SET Weight = $mark WHERE Assessment_id = $Assessment_id";
          if($Conn->query($sql) == TRUE){
            $_SESSION['message'] = "Assessment weight successfully updated";
          }else{
            $_SESSION['message'] = "Failed to process the request";
          }
  
        }
  
        $i =  $i + 1;
  
    }
  }else{
    $_SESSION['message'] = "Weights should sum to 100";
  }
  
  $sql = "SELECT Project_id FROM Projects WHERE Level = '$level'";
  $result = mysqli_query($Conn,$sql);
  $Confirm = mysqli_num_rows($result);

  if($Confirm > 0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $Project_id = $row['Project_id'];
      $sql1 = "SELECT Overal_mark,Assessment_id FROM final_stage_mark WHERE Project_id = '$Project_id'";
      $result1 = mysqli_query($Conn,$sql1);
      $Confirm1 = mysqli_num_rows($result1);

      if($Confirm1 > 0)
      {
        while($row1 = mysqli_fetch_assoc($result1))
        {
          $Mark = $row1['Overal_mark'];
          $Assessment_id = $row1['Assessment_id'];

          $sql2 = "SELECT Weight FROM weights WHERE Assessment_id = $Assessment_id";
          $result2 = mysqli_query($Conn,$sql2);
          $Confirm2 = mysqli_num_rows($result2);

          if($Confirm2 > 0)
          {
            while($row2 = mysqli_fetch_assoc($result2))
            {
              $Weight = $row2['Weight'];

              $Real_mark = $Mark / 100;
              $Final_mark = $Real_mark * $Weight;
              $Totalmark = $Totalmark + $Final_mark;
            }
          }
          if($Totalmark <45 )
            {
              $Grade = 'F';
            }elseif($Totalmark > 44 && $Totalmark <55)
            {
              $Grade = 'P';
            }elseif($Totalmark >54 && $Totalmark < 65){
              $Grade = '2.2';
            }elseif ($Totalmark >= 64 && $Totalmark <75) {
              $Grade = '2.1';
            }elseif ($Totalmark > 74) {
              $Grade = '1';
            }else{
              $Grade = 'Nullified Marks';
            }
            $sql = "INSERT INTO final_mark (Project_id,Mark,Weight,Assessment_id) VALUES ('$Project_id',$Totalmark,$Weight,$Assessment_id)";
            if($Conn->query($sql) == FALSE)
            {
              $sql = "UPDATE final_mark SET Mark = $Totalmark,Weight = $Weight WHERE Project_id = '$Project_id'";
              if ($Conn->query($sql) == FALSE) {
                echo $sql . "<br>" . $Conn->error;
              }
            }
          echo $Totalmark." : ".$Project_id." : ".$Grade."<br>";
          $Totalmark = 0;
        }
      }
      
      // $sql = "INSERT INTO final_mark (Project_id,Mark"
    }
  }
//  echo  $sql . "<br>" . $Conn->error;
 header('location: ../pages/view_weights.php');
}else{
    $_SESSION['message'] = "Sorry your data was not posted to processing API please retry";
    header('location: ../pages/department.php');
}