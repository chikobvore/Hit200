<?php
require '../php/Php.php';
require '../dbh/dbh.php';
session_start();

if(isset($_POST['Project_id']) && isset($_POST['Stage']) &&isset($_POST['comment']))
{

	
	$Staff_id = $_SESSION['Staff_id'];
	$Project_id = $_POST['Project_id'];
	$mycomment = $_POST['comment'];
	$Stage = $_POST['Stage'];

	//Lock_key ensures that a lecturer assess a project only once by locking his/ her marks with it.
	$Lock_key = $Staff_id."lock".$Stage.$Project_id;
	$i = 0;

	
	while (!empty($_POST['mark'.$i]) || !empty($_POST['select'.$i]) || !empty($_POST['item'.$i]))
	{
		$mark = $_POST['mark'.$i];
		$comment = $_POST['option'.$i];
		$Item_id = $_POST['item'.$i];

		$sql = "SELECT * FROM assessment_marks WHERE Lock_key = '$Lock_key'";
		$result = mysqli_query($Conn,$sql);
  		$confirm = mysqli_num_rows($result);
   		if ($confirm >0 )
   		{	
   			$_SESSION['message'] = 'Sorry already assessed that project';
			   header('location: ../pages/Assessment.php');
			   break;
   		}
   		else{
   			$sql = "INSERT INTO assessment_marks (
   					Staff_id,
   					Project_id,
   					Assessment_id,
   					Item_id,
   					Mark,
   					Comment
   				) VALUES 
   						('$Staff_id',
   						'$Project_id',
   						'$Stage',
   						$Item_id,
   						$mark,
   						'$comment'
   									)";
		if ($Conn->query($sql) === False){
			 echo "Error: " . $sql ."panooooo". "<br>" . $Conn->error;
		}
		$i = $i +1;
   		}
   	}

   	$sql= "UPDATE assessment_marks 
   						SET 
   						Lock_key = '$Lock_key'
   						 		WHERE 
   						 		Project_id = '$Project_id' AND 
   						 		Assessment_id = '$Stage' AND 
   						 		Staff_id = '$Staff_id'";
   						 		
   	if ($Conn->query($sql) === False){
   			 $_SESSION['message'] = 'Project assessment failed';
			 echo "Error: " . $sql ."panapa"."<br>" . $Conn->error;
			//  header("location: ../pages/assessment.php");
		}else{
			echo "panapa hw far";
			average($Staff_id,$Stage,$Project_id,$mycomment);
		}
 
		//header("location: ../pages/assessment.php");
		
}else{
	#echo "Error: " . $sql ."panapa"."<br>" . $Conn->error;
	$_SESSION['message'] = 'Project assessment failed.';
	header('location: ../pages/Assessment.php');

}