<?php
require '../dbh/dbh.php';
require '../php/Php.php';
session_start();

/*

session_start();
$iniviter = $_SESSION['Reg_number'];

$projectId = 'SE3';//$_SESSION['Project_id'];
$i = 0;
$name = 'name'.$i;
do {
	$invited = $_POST['name'.$i];
	$sql = "INSERT INTO invitations(iniviter,project_Id,invited) VALUES('$iniviter','$projectId','$invited')";
	if ($Conn->query($sql) === True)
          {
                      notify_user($iniviter,$invited);
          }
          else{
          		echo "Error".$sql . "<br>" . $Conn->error;
          }
	
	$i = $i + 1;
}while (!empty($_POST['name'.$i]));

$_SESSION['message'] = 'Your invitation(s) has been successfully sent';
#echo "Error".$sql . "<br>" . $Conn->error;
header('location: ../pages/invitation.php');


$i = 0;
while(isset($_POST['name'.$i]))
{
    echo $_POST['name'.$i]."<br>";
    echo $_SESSION['Project_id'];

    $i = $i +1;



}
*/

$last = $_POST['times'];
$Sender = $_SESSION['Reg_number'];
$Project_id = $_SESSION['Project_id'];


for ($count = 0;$count < $last; $count++)
{
    if(isset($_POST['name'.$count]))
    {
        $Receiver = $_POST['name'.$count];
        $Status = "PENDING...";
        if($Receiver == $Sender)
        {
            echo "you cannot invite yourself";
        }
        else
        {
            $sql = "INSERT INTO invitations(Sender,Project_id,Receiver,Status) VALUES('$Sender','$Project_id','$Receiver','$Status')";
            if ($Conn->query($sql) === FALSE)
            {
                echo "Error".$sql . "<br>" . $Conn->error;
                $_SESSION['message'] = "Invitation Failed";
            }else{
                $_SESSION['message'] = "Your invitation(s) have been successfully sent";
            }
        }
    }   
}
header('location: ../pages/student_portal.php');