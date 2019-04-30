
<?php
 require '../dbh/dbh.php';

if (isset($_POST['title']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['staff_id']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['Gender']) && isset($_POST['Department']) &&isset($_POST['role']))
          {
            $title        = $_POST['title'];
            $name         = $_POST['name'];
            $surname      = $_POST['surname'];
            $staff_id     = $_POST['staff_id'];
            $email        = $_POST['email'];
            $phone        = $_POST['phone'];
            $role         = $_POST['role'];
            $Gender       = $_POST['Gender'];
            $Department   = $_POST['Department'];

          $sql = "INSERT INTO lecturers (Title,Name,Surname,Staff_id,Department,Email_address,Contact,Gender,Role) VALUES('$title','$name','$surname','$staff_id','$Department','$email','$phone','$Gender','$role')";

          if ($Conn->query($sql) === TRUE)
          {         
                                  session_start();
                                  $_SESSION['message'] = 'Staff member successfully added';
                                  header("location: ../pages/Admin.php");
                                     
          }
            else{
                  session_start();
                  $_SESSION['message'] = "Sorry Operation has failed, please verify the details before trying again";
                  header("location: ../pages/Admin.php");
                  // echo "system Error: " . $sql . "<br>" . $Conn->error;
                }
    }else{
  echo "internal application error". $sql . "<br>" . $Conn->error;
}

?>