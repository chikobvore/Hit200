<?php
require '../dbh/dbh.php';
session_start();
$dpt = $_SESSION['Department'];

if(isset($_POST['type']))
{
    $level = $_POST['type'];

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="Final.csv"');
    $output = fopen('php://output', 'wb');

    $sql = "SELECT weights.Assessment_id, Assessment_title FROM  weights
                     INNER JOIN assessment_details 
                                ON weights.Assessment_id = assessment_details.Assessment_id";

    $result = mysqli_query($Conn,$sql);
    $Confirm = mysqli_num_rows($result);
    if($Confirm > 0 )
    {
        $headers = array('Name','Surname','Reg-number','Project title');
        $ids = array();
        while($row = mysqli_fetch_assoc($result))
        {   $id = $row['Assessment_id'];
            $title = $row['Assessment_title'];
            array_push($headers,$title);
            array_push($ids,$id);
        }
        array_push($headers,'Total Mark','Grade');
        fputcsv($output, $headers);

        $sql1 = "SELECT  DISTINCT Project_id FROM final_mark ";
        $result1 = mysqli_query($Conn,$sql1);
        $confirm1 = mysqli_num_rows($result1);

        if ($confirm1 > 0)
        {
            $Final = 0;
            while($row1 = mysqli_fetch_assoc($result1))
            {
                $Project_id = $row1['Project_id'];

                $sql2 = "SELECT Project_title FROM projects WHERE Project_id = '$Project_id' AND Department = '$dpt' AND Level = '$level'";
                $result2 = mysqli_query($Conn,$sql2);
                $confirm2 = mysqli_num_rows($result2);

                if($confirm2 > 0 )
                {
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                        $Project_title = $row2['Project_title'];
                    }

                    $sql3 = "SELECT DISTINCT Name,Surname,students.Reg_number FROM students INNER JOIN project_developers ON students.Reg_number = project_developers.Reg_number AND project_developers.Project_id = '$Project_id'";
                    $result3 = mysqli_query($Conn,$sql3);
                    $Confirm3 = mysqli_num_rows($result3);
                    
                    if ($Confirm3 > 0)
                        {
                            while($row3 = mysqli_fetch_assoc($result3))
                            {
                                $Name = $row3['Name'];
                                $Surname = $row3['Surname'];
                                $Reg_number = $row3['Reg_number'];
                                
                                $Overals = array();
                                foreach ($ids as  $id)
                                {
                                    $sql4 = "SELECT Mark FROM final_mark WHERE Project_id = '$Project_id' AND assessment_id = $id";
                                    $result4 = mysqli_query($Conn,$sql4);
                                    $confirm4 = mysqli_num_rows($result4);

                                    if($confirm2 > 0 )
                                    {
                                        
                                        while($row4 = mysqli_fetch_assoc($result4))
                                        {

                                            $Overal_mark = $row4['Mark']; 
                                            array_push($Overals,$Overal_mark);
                                        }
                                        
                                    }
                                }
                            
                                $data = array($Name,$Surname,$Reg_number,$Project_title);
                                $total = 0;
                                foreach ($Overals as $Overal)
                                {
                                    array_push($data,$Overal);
                                    $total = $total + $Overal;
                                }
                                array_push($data,$total);
                                if($total <45 )
                                    {
                                        $Grade = 'F';
                                    }elseif($total > 44 && $total <55)
                                    {
                                        $Grade = 'P';
                                    }elseif($total >54 && $total < 65){
                                        $Grade = '2.2';
                                    }elseif ($total >= 64 && $total <75) {
                                        $Grade = '2.1';
                                    }elseif ($total > 74) {
                                        $Grade = '1';
                                    }else{
                                        $Grade = 'Nullified Marks';
                                    }
                                array_push($data,$Grade);
                                fputcsv($output, $data);
                            }
                        }
                }
            }
 
        }
    }

}else{
    echo "Method was not POST";
}
fclose($output);