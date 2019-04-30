<?php
 require '../dbh/dbh.php';
 require '../dbh/Bcrypt.php';
 // hash the password => returns hashed password
   // Bcrypt::hashPassword($password);
    
    // check $password against the $hashedPassword => returns true/false
  //  Bcrypt::checkPassword($password, $hashedPassword);
  if (isset($_POST['email']) && isset($_POST['p1']) && isset($_POST['id']) &&isset($_POST['p2'])) 
  {

              $email = $_POST['email'];
              $p1 = $_POST['p1'];
              $id = $_POST['id'];
              $p2 = $_POST['p2'];

              if ($p1 === $p2)
              {

                  $pass = Bcrypt::hashPassword($p1); 

                 $sql = "SELECT Password FROM lecturers WHERE Staff_id = '$id'";
                 $result = mysqli_query($Conn,$sql);
                 $confirm = mysqli_num_rows($result);
                  if ($confirm > 0)
                  {
                                      $sql ="UPDATE lecturers SET Password = '$pass' WHERE Staff_id = '$id'";
                                      if ($Conn->query($sql) === TRUE)
                                            {
                                                header("location: ../pages/page-login.php");
                                            }else{
                                                echo "Error5: " . $sql . "<br>" . $Conn->error;
                                              }
                  }
                   else{
                             
                              $sql = "SELECT Password FROM students WHERE Reg_number = '$id'";
                              $result = mysqli_query($Conn,$sql);
                              $confirm = mysqli_num_rows($result);
                              if ($confirm > 0)
                                {

                                    $sql ="UPDATE students SET Password = '$pass' WHERE Reg_number = '$id'";
                                    if ($Conn->query($sql) === TRUE)
                                    {
                                      
                                      header("location: ../pages/page-login.php");  
                                    }
                                }
                                else{
                                        session_start();
                                        $_SESSION['login'] = 'Sorry we could not find any matching record please visit your department to verify details';
                                        header('location: ../pages/page-signup.php');
                                     }
                          }
                            
              }
           
  }else{
    echo "Front-end input validation Error Review javaScript ";
  }