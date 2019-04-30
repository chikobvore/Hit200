<?php
require '../dbh/dbh.php';

if(isset($_POST['message']))
{
    $message = $_POST['message'];
    session_start();
    if(isset($_SESSION['Reg_number'])){
        $id = $_SESSION['Reg_number'];
    }elseif(isset($_SESSION['Staff_id'])){
        $id = $_SESSION['Staff_id'];
    }else{
        $_SESSION['login'] = 'We could not verify your authentication id';
        header('location: ../pages/page-login.php');
    }

    
    $sql = "SELECT Thread_id FROM threads WHERE Sender = '$id' OR Receiver = '$id'";
    $result = mysqli_query($Conn,$sql);
    $confirm = mysqli_num_rows($result);
    if ($confirm >0 )
    {
        $date = date("Y/m/d");
        $time = date("h:i:sa");
        while ($row = mysqli_fetch_assoc($result))
        {
            $thread_id = $row['Thread_id'];
        }
        $sql = "INSERT INTO messages(Thread_id,message,sender,Timestamp_date,Timestamp_time) VALUES($thread_id,'$message','$id','$date','$time')";
        if ($Conn->query($sql) === TRUE)
        {
          header('location: ../pages/mysupervisor.php');
        }
        else{
            echo "yajamuka  " . $sql . "<br>" . $Conn->error;
        }
    }else{
        $reg_number = $_SESSION['Reg_number'];
        $sql = "SELECT Project_id FROM Project_developers WHERE Reg_number = '$reg_number'";
        $result = mysqli_query($Conn,$sql);
        $confirm = mysqli_num_rows($result);
        if ($confirm >0 )
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $pro = $row['Project_id'];
            }
        }else{
            echo "INSERTION: " . $sql . "<br>" . $Conn->error;
        }
        $sql = "SELECT Supervisor FROM Projects WHERE Project_id = '$pro'";
        $result = mysqli_query($Conn,$sql);
        $confirm = mysqli_num_rows($result);
        if ($confirm >0 )
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $supervisor = $row['Supervisor'];
            }
        }else{
            echo "error here: " . $sql . "<br>" . $Conn->error;
        }

        $sql = "INSERT INTO threads(Sender,Receiver) VALUES ('$id','$supervisor')";
        if ($Conn->query($sql) === TRUE)
        {
            $sql = "SELECT Thread_id FROM threads WHERE Sender = '$id' AND Receiver = '$supervisor'";
            $result = mysqli_query($Conn,$sql);
            $confirm = mysqli_num_rows($result);
            if ($confirm >0 )
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $thread_id = $row['Thread_id'];
                }
            }else{
                echo "im a  here: " . $sql . "<br>" . $Conn->error;
            }
            $date = date("Y/m/d");
            $time = date("h:i:sa");
            $sql = "INSERT INTO messages(Thread_id,message,Timestamp_date,Timestamp_time) VALUES($thread_id,'$message','$date','$time')";
            if ($Conn->query($sql) === TRUE)
            {
                echo "booo ";
              #header('location: ')
            }
            else{
                echo "yah pakaipa: " . $sql . "<br>" . $Conn->error;
            }
        }else{
            echo "ma1 " . $sql . "<br>" . $Conn->error;
        }

    }
}