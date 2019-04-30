<?php
require '../dbh/dbh.php';
require '../dbh/Bcrypt.php';
 // hash the password => returns hashed password
   // Bcrypt::hashPassword($password);
    
    // check $password against the $hashedPassword => returns true/false
  //  Bcrypt::checkPassword($password, $hashedPassword);

if (isset($_POST['Username']) && isset($_POST['Password']))
{
	$Username = $_POST['Username'];
	$Pass = $_POST['Password'];
	try
	{
		$sql = "SELECT Password,Name,Surname,Role,Department,Staff_id FROM lecturers WHERE Staff_id = '$Username' ";
		$result = mysqli_query($Conn,$sql);
   		$confirm = mysqli_num_rows($result);
   		if ($confirm > 0)
         {
   			 while ($row = mysqli_fetch_assoc($result))
   			 {
   			 	$Password = $row['Password'];
   			 	$Name = $row['Name'];
   			 	$Surname = $row['Surname'];
          $Role = $row['Role'];
          $Department = $row['Department'];
          $Staff_id = $row['Staff_id'];
   			 }
              $verification =Bcrypt::checkPassword($Pass, $Password);
             if ($verification) {
               session_start();

               if ($Role == 'Administrator') {
                 $_SESSION['Name'] = $Name;
                 $_SESSION['Surname'] = $Surname;
                 $_SESSION['Role'] = $Role;
                 $_SESSION['Staff_id'] = $Staff_id;
                 header("location: ../pages/Admin.php");

               } elseif ($Role == 'Supervisor') {
                 $_SESSION['Name'] = $Name;
                 $_SESSION['Surname'] = $Surname;
                 $_SESSION['Department'] = $Department;
                 $_SESSION['Role'] = $Role;
                 $_SESSION['Staff_id'] =$Staff_id;
                 header("location: ../pages/supervisor.php");

               } elseif ($Role == 'Chairperson') {
                 $_SESSION['Name'] = $Name;
                 $_SESSION['Surname'] = $Surname;
                 $_SESSION['Department'] = $Department;
                 $_SESSION['Role'] = $Role;
                 $_SESSION['Staff_id'] = $Staff_id;
                 header("location: ../pages/supervisor.php");
               }
                elseif ($Role == 'co-ordinator') {
                 $_SESSION['Name'] = $Name;
                 $_SESSION['Surname'] = $Surname;
                 $_SESSION['Department'] = $Department;
                 $_SESSION['Role'] = $Role;
                 $_SESSION['Staff_id'] = $Staff_id;
                 header("location: ../pages/department.php");

               }
               else{

                header('location: ../pages/page-login.php');
               }
               
             }
             else{
               session_start();
               $_SESSION['login'] =  "Invalid Password";
               header('location: ../pages/page-login.php');
             }
   			
   		}
         else{
               $sql = "SELECT Password,Name,Surname,Reg_number,Department FROM students WHERE Reg_number = '$Username' ";
               $result = mysqli_query($Conn,$sql);
               $confirm = mysqli_num_rows($result);
               if ($confirm > 0)
               {
                   while ($row = mysqli_fetch_assoc($result))
                     {
                        $Password = $row['Password'];
                        $Name = $row['Name'];
                        $Surname = $row['Surname'];
                        $Reg_number = $row['Reg_number'];
                        $Department = $row['Department'];
                     }
                  $verification =Bcrypt::checkPassword($Pass, $Password);
                  if ($verification)
                  {
                     session_start();
                     $_SESSION['Reg_number'] = $Username;
                     $_SESSION['Name'] = $Name;
                     $_SESSION['Surname'] = $Surname;
                     $_SESSION['Department'] = $Department;
                     $_SESSION['Role'] = 'student';
                     header("location: ../pages/student_portal.php");
                  }
                  else{
                    session_start();
                    $_SESSION['login'] =  "Invalid Password";
                    header('location: ../pages/page-login.php');
                  }
               }
                else{
                #echo $confirm."here";
               session_start();
               $_SESSION['login'] =  "Sorry you dont exist in our records";
               header('location: ../pages/page-login.php');
             }
         }

	}catch (Exception $e)
	{
		 echo 'Message: ' .$e->getMessage();
	}
}else{
	echo "failed";
}