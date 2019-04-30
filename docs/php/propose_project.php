<?php
require '../dbh/dbh.php';
require '../php/Php.php';
session_start();
if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['field']) && !empty($_POST['tools']) && !empty(['year']) && !empty(['course']))
{
	

	$title			 = $_POST['title'];
	$description 	 = $_POST['description'];
	$attachment		 = $_POST['attachment'];
	$field			 = $_POST['field'];
	$tools 			 = $_POST['tools'];
	$year 			 = $_POST['year'];
	$Level			 = $_POST['course'];
	$Department      = $_SESSION['Department'];
	$Reg_number  	 = $_SESSION['Reg_number'];

   $sql = "SELECT Proposed_date FROM assessment_details WHERE Department = '$Department' AND Status = 'Current' AND Level = '$Level'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  /*

  if ($confirm > 0)
  {
  
    while ($row = mysqli_fetch_assoc($result))
    {
        $systemdate = $row['Proposed_date'];
    }
  }else{
     echo "system Error: " . $sql . "<br>" . $Conn->error;
  }

     $todaysdate = date("Y-m-d");    
     $date1 = new DateTime($systemdate);
     $date2 = new DateTime($todaysdate);
     $interval = date_diff($date2, $date1);

  if ($interval->format('$R%a')) {
      $_SESSION['message'] = $num;
      header('location: ../pages/message.php');
  }
  $a = $num;

  if ($a < 0) {
    $_SESSION['message'] = $num;
      header('location: ../pages/message.php');
  }else{
    echo $a;
  }
  */


	$sql = "SELECT * FROM projects WHERE Department = '$Department'";
	$result = mysqli_query($Conn,$sql);
    $confirm = mysqli_num_rows($result);

    Switch($Department)
    {
      case 'Software Engineering':
        $Project_id = 'SE'.$confirm ;
        break;

      case 'Computer Science':
        $Project_id = 'CS'.$confirm;
        break;

      case 'Information Security and Assuarance':
        $Project_id = 'ISA'.$confirm;
        break;

      case 'Information Technology':
        $Project_id =  'IT'.$confirm;

    }
    $_SESSION['Project_id'] = $Project_id;
	$sql = "INSERT INTO projects (Project_id,Year,Level,Project_title,Project_description,Field,Department,Stage,Tools)VALUES ('$Project_id','$year','$Level','$title','$description','$field','$Department','current','$tools')";
	
	  if ($Conn->query($sql) === TRUE)
          {

          	$target_dir = "../files/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            //check if  file is already there
            if (file_exists($target_file))
            {
    				echo "Sorry, file already exists.";
    				$uploadOk = 0;
			}

			// Check file size
			if ($_FILES["file"]["size"] > 5000000)
			{
    				echo "Sorry, your file is too large.";
    				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{               


        $_SESSION['Project_id'] = $Project_id;
    	
          						$sql = "INSERT INTO project_developers(Project_id,Reg_number) VALUES ('$Project_id','$Reg_number')";
          						if ($Conn->query($sql) === TRUE)
          							{
                          $_SESSION['message'] = 'Your Project has been successly sent but we could not upload your File';
          								header('location: ../pages/invitation.php');
          							}else{
          								echo "Developing Error: " . $sql . "<br>" . $Conn->error;
          							}
					// if everything is ok, try to upload file
			} else {
    				if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
    				{
                $_SESSION['message'] = "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        				$filename = basename($_FILES['file']['name']);
        				$filepath = $target_dir.$filename;
        				$sql = "INSERT INTO projects_files(Project_id,File_name,File_description,File_path) VALUES ('$Project_id','$filename','$attachment','$filepath')";
        				if ($Conn->query($sql) === TRUE)
          					{
          						$sql = "INSERT INTO project_developers(Project_id,Reg_number) VALUES ('$Project_id','$Reg_number')";
          						if ($Conn->query($sql) === TRUE)
          							{
                          $_SESSION['message'] = 'Your proposal has been successfully sent,Reference number is '.$_SESSION['Project_id'];
          								header('location: ../pages/invitation.php');
          							}else{
          								echo "Developing Error: " . $sql . "<br>" . $Conn->error;
          							}

          					}else{
          						echo "Upload Error: " . $sql . "<br>" . $Conn->error;
          					}

    				} else {
        					echo "Sorry, there was an error uploading your file.";
    						}
					}
                                  #header("location: ../pages/student_portal.php");
                                     
          }
            else{
                  echo "system Error: " . $sql . "<br>" . $Conn->error;
                }

}
