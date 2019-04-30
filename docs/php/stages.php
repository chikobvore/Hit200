
<?php
 require '../dbh/dbh.php';

if (isset($_POST['assess']))
{
    $id       = $_POST['assess'];

    session_start();
    $Department =$_SESSION['Department'];

    
    $sql = "UPDATE assessment_details SET Status = 'Assessed' WHERE Department = '$Department' AND Status = 'Current'";
          if ($Conn->query($sql) === TRUE)
          {

            $sql = "UPDATE assessment_details SET Status = 'Current' WHERE assessment_id = $id"; 
            if ($Conn->query($sql) === TRUE)
                {
                  
                  header('location: ../pages/department.php');
                }
                else{
                   echo "system Error: " . $sql . "<br>" . $Conn->error;
                }
                                     
          }
            else{
                  echo "system Error: " . $sql . "<br>" . $Conn->error;
                }
    }else{
  header('location: ../pages/department.php');
}

?>