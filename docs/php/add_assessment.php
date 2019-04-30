<?php
 require '../dbh/dbh.php';

 
if(isset($_POST['title']) && isset($_POST['course']) && isset($_POST['input1']) && isset($_POST['input2'])&& isset($_POST['period']) && isset($_POST['objectives']) && isset($_POST['assessment_date']))

{
              session_start();
              
            $Department = $_SESSION['Department'];
            $titlename = $_POST['title'];
            $course     =$_POST['course'];
            $n1        = $_POST['input1'];
            $n2        = $_POST['input2'];
            $n3        = $_POST['input3'];
            $n4        = $_POST['input4'];
            $n5        = $_POST['input5'];
            $n6        = $_POST['input6'];
            $n7        = $_POST['input7'];
            $n8        = $_POST['input8'];
            $n9        = $_POST['input9'];
            $n10       = $_POST['input10'];
            $n11        = $_POST['input11'];
            $n12        = $_POST['input12'];
            $n13        = $_POST['input13'];
            $n14        = $_POST['input14'];
            $n15        = $_POST['input15'];
            $n16        = $_POST['input16'];
            $n17        = $_POST['input17'];
            $n18        = $_POST['input18'];
            $n19        = $_POST['input19'];
            $n20       = $_POST['input20'];
            $Period    = $_POST['period'];
            $date   = $_POST['assessment_date'];
            $objectives   = $_POST['objectives'];
            $status = "PENDING";

           $title = $titlename;

           if($Department == 'Software Engineering'){
            $lockkey = "SE".$titlename.$course.$Period;
           }elseif ($Department == 'Computer Science' ) {
            $lockkey = "CS".$titlename.$course.$Period;
           }elseif ($Department == 'Information Technology'){
            $lockkey = "IT".$titlename.$course.$Period;
           }elseif ($Department == 'Information security and assurance') {
            $lockkey = "ISA".$titlename.$course.$Period; 
           }else{
             $_SESSION['message'] = 'Failed to process the request';
             header('location: ../pages/department.php');
           }
          

            $sql = "INSERT INTO assessment_details (Year,Department,Level,Status,Assessment_title,Proposed_date,Assessment_objectives, Assessment_lockkey) VALUES ('$Period','$Department','$course','$status','$title','$date','$objectives','$lockkey')";

            if ($Conn->query($sql) === TRUE)
            {
              
                $inputs = array($n1,$n2,$n3, $n4,$n5,$n11,$n12,$n13,$n14,$n15);
                $numbers = array($n6,$n7,$n8,$n9,$n10,$n16,$n17,$n18,$n19,$n20);
                $sql ="SELECT Assessment_id FROM assessment_details WHERE Department ='$Department' AND Level ='$course' AND Assessment_title='$title'";
                $result = mysqli_query($Conn,$sql);
                $confirm = mysqli_num_rows($result);

                     if ($confirm>0)
                      {
                        while ($row = mysqli_fetch_assoc($result))
                        {
                          $id = $row['Assessment_id'];
                        }
                        
                          for ($i=0; $i <10 ; $i++)
                          { 

                            if (!empty($inputs[$i]))
                            {
                                $sql = "INSERT INTO assessment_items (Assessment_id,Item,Item_mark) VALUES ($id,'$inputs[$i]',$numbers[$i])"; 
                                    if ($Conn->query($sql) === FALSE)
                                    {
                                           echo "Error: " . $sql . "<br>" . $Conn->error; 
                                    }
                            } 
                          }
                        header("location: ../pages/department.php");
              }  
            else
              {
                $_SESSION['message'] = "Failed to process that request due to an integrity contraint violated";
                header('header: ../pages/department.php');
              // echo "Error: " . $sql . "<br>" . $Conn->error;
                }
  }else
  {
    session_start();
    $_SESSION['message'] = 'Sorry assessment already exist';
    header('location: ../pages/department.php');
    // echo "system Error: " . $sql . "<br>" . $Conn->error;
  }
}else
  {
    echo "ERROR: ". "something is not set" . $Conn->error;
   # echo $_POST['period'].$_POST['stage'].$_POST['assessment_date'].$_POST['title'].$_POST['date'].$_POST['objectives'];
  }

      

         
                   


  