
<?php
 require '../dbh/dbh.php';

      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename="Final.csv"');
      $output = fopen('php://output', 'wb');

    $sql = "SELECT weights.Assessment_id, Assessment_title FROM  weights
                     INNER JOIN assessment_details 
                                ON weights.Assessment_id = assessment_details.Assessment_id";

    $result = mysqli_query($Conn,$sql);
    $Confirm = mysqli_num_rows($result);

    if($Confirm > 0)
    {
        $headers = array('Name','Surname','Reg-number','Project title');
        while($row = mysqli_fetch_assoc($result))
        {
            $title = $row['Assessment_title'];
            array_push($headers,$title);
        }
        array_push($headers,'Total Marks','Overal Marks','Mark','Grade');
        fputcsv($output, $headers);
        $data = array('1','2');
        fputcsv($output, $data);
        fclose($output);
    }else{
        echo "No information retrieved";
    }

    //   fputcsv($output,array('Name','Surname','Reg-number','Project title','Assessment','ScoredMark','Overal Mark','Total Mark'));
    //   $sql = "SELECT DISTINCT Project_id FROM lecturer_assessment_marks WHERE assessment_id = $id ";
    //   $result = mysqli_query($Conn,$sql);
    //   $Confirm = mysqli_num_rows($result);
    //   if($Confirm > 0)
    //   {
    //     while ($row = mysqli_fetch_assoc($result)){
    //       $Project_id = $row['Project_id'];
    //       $sql1 = "SELECT Reg_number From project_developers where Project_id = '$Project_id'";
    //       $result1 = mysqli_query($Conn,$sql1);
    //       $Confirm1 = mysqli_num_rows($result1);
    //       if($Confirm1 > 0)
    //       {
    //         while ($row1 = mysqli_fetch_assoc($result1))
    //         {
    //           $Reg_number = $row1['Reg_number'];
    //           $sql2 = "SELECT Name,Surname FROM students WHERE Reg_number = '$Reg_number'";
    //           $result2 = mysqli_query($Conn,$sql2);
    //           $Confirm2 = mysqli_num_rows($result2);
    //           if($Confirm2 > 0)
    //           {
    //             while ($row2 = mysqli_fetch_assoc($result2))
    //             {
    //                 $Name = $row2['Name'];
    //                 $Surname = $row2['Surname'];

    //             }
    //             $sql3 = "SELECT Assessment_title FROM assessment_details WHERE assessment_id = $id";
    //             $result3 = mysqli_query($Conn,$sql3);
    //             $Confirm3 = mysqli_num_rows($result3);
    //             if($Confirm3 > 0)
    //               {
    //                   while ($row3 = mysqli_fetch_assoc($result3))
    //                   {
    //                       $Assessment_title = $row3['Assessment_title'];

    //                   }

    //                   $sql4 = "SELECT Mark,Total_mark,Overal_mark FROM final_stage_mark where assessment_id = $id AND Project_id = '$Project_id'";
    //                     $result4 = mysqli_query($Conn,$sql4);
    //                     $Confirm4 = mysqli_num_rows($result4);
    //                     if($Confirm4 > 0)
    //                     {
    //                       while ($row4 = mysqli_fetch_assoc($result4))
    //                       {
    //                         $Mark = $row4['Mark'];
    //                         $Total_mark = $row4['Total_mark'];
    //                         $Overal_mark = $row4['Overal_mark'];

    //                         $sql5 = "SELECT Project_title FROM projects WHERE Project_id = '$Project_id'";
    //                         $result5 = mysqli_query($Conn,$sql5);
    //                         $Confirm5 = mysqli_num_rows($result5);
    //                         if($Confirm5 > 0)
    //                         {
    //                           while ($row5 = mysqli_fetch_assoc($result5))
    //                           {
    //                             $Project_title = $row5['Project_title'];
    //                             $data  = array($Name,$Surname,$Reg_number,$Project_title,$Assessment_title,$Mark,$Total_mark,$Overal_mark);
    //                               fputcsv($output, $data);
    //                           }
    //                         }

                       
    //                       }
    //                     }
    //               }

    //           }

    //         }
    //       }


          
    //     }
    //     fclose($output);


    //   }
    //   else{
    //     echo $Conn->error;
    //   }
