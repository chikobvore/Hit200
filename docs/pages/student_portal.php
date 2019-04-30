<?php 
require '../dbh/dbh.php';
require '../php/Php.php';
session_start();
if (! isset($_SESSION['Reg_number']))
{
  header('location: page-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Sist Projects hub</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">

    <!-- javascript -->
    <script>
    function decide(){

    }
    </script>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html" style="font-size: 22px;font-weight: 300;color: #fed189;float: left;margin-top: 15px;">sist@hit.ac.zw</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
       <b style="font-family: 'Merriweather Sans',sans-serif;"> <a href="tel:2634774142236" class="mylogo" >+263 4 7741 422 - 36 | </a></b>
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="page-logout.php" ><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['Name']." ".$_SESSION['Surname']; ?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['Reg_number']; ?></p>
        </div>
      </div>
        <?php 
        $role = $_SESSION['Role'];
      Sidebar($role);
        ?>
    </aside>
       <main class="app-content">
      <div class="app-title">
        <div>
          <br>
          <img alt="" src="../images/logo.png">
          <h3 class="page-header" style="color: navy; display: inline;">&nbsp &nbsp&nbsp&nbspSchool of information Science and Technology<br></h3>
                                <p style="display: inline; margin-right: 50px;">&nbsp&nbsp&nbsp success through inovation</p><br><br>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Student Portal</a></li>
        </ul>
      </div>
      <?php 
          $name = $_SESSION['Reg_number'];
          $sql = "SELECT Project_id,Sender FROM invitations WHERE Receiver = '$name' AND Status = 'PENDING...'";
          $result = mysqli_query($Conn,$sql);
          $confirm = mysqli_num_rows($result);
          if ($confirm > 0)
            {

              while ($row = mysqli_fetch_assoc($result))
                {
                  echo 
                  "<div class='col-md-12'>".
                   "<div class='tile'>".
                    "<div class='tile-body'>";
                  $Project_id = $row['Project_id'];
                  $Sender = $row['Sender'];

                  $sql1 = "SELECT Project_title,Project_description,Field,Tools FROM Projects WHERE Project_id = '$Project_id'";
                  $result1 = mysqli_query($Conn,$sql1);
                  $confirm1 = mysqli_num_rows($result1);
                  if ($confirm1 > 0)
                    {
                      while ($row1 = mysqli_fetch_assoc($result1))
                      {
                        $title = $row1['Project_title'];
                        $description  = $row1['Project_description'];
                        $Field = $row1['Field'];
                        $Tools = $row1['Tools'];
                        
                        $sql2 = "SELECT File_path FROM Projects_files WHERE Project_id = '$Project_id'";
                        $result2 = mysqli_query($Conn,$sql2);
                        $confirm2 = mysqli_num_rows($result2);
                        if ($confirm2 > 0)
                          {
                            while ($row2 = mysqli_fetch_assoc($result2))
                            {
                              $path = $row2['File_path'];
                              $sql3 = "SELECT Name, Surname FROM students WHERE Reg_number = '$Sender' ";
                              $result3 = mysqli_query($Conn,$sql3);
                              $confirm3 = mysqli_num_rows($result3);
                              if ($confirm3 > 0)
                                {
                                  while ($row3 = mysqli_fetch_assoc($result3))
                                  {
                                    $Name = $row3['Name'];
                                    $Surname = $row3['Surname'];
                                  }

                                  echo "<p>"."<center>"."<h5 style = 'color: green; font: 36px;'>"."You have been invited to a Project ".
                                  "</center>"."</h5>"."<br>"."Title: ".$title."<br>"."Description: ".$description."<br>".
                                  "Field: ".$Field."<br>"."Tools: ".$Tools."<br>"."Attachments"."<a href = '$path'>"."View here"."</a>"."<br>".
                                  "Sender: ".$Name." ".$Surname.
                                  "</p>";
                                  echo    "<center>".    
                                            "<button class='btn btn-primary' onclick= 'decide()'>"."Accept"."</button>".
                                            "<button class='btn btn-danger' href='#Decline' data-toggle='modal'>"."<span class='glyphicon glyphicon-remove'>"."</span>"."Decline"."</button>".
                                            "</center>";
                                }

                            }
                            
                          }



                      }
                    }
                    echo "</div>"."</div>"."</div>";
                }
               
            }
      ?>


      <!--modal for adding students -->
              <div class="modal fade" id="Decline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4>confirmation</h4>
                      </div>
                       <div class="modal-body">
                       <form method= 'POST' action ='student_portal.php'>
                        <center>
                          <p>Please select your choice</p>
                          <select name= 'choice' class= "form-control">
                            <option value= 'Accept'>Accept</option>
                            <option value = 'Deny'>Deny</option>
                          </select>
                          <p>Select Project</p>
                          <select name = "project" class= "form-control">
                            <?php 
                                  $name = $_SESSION['Reg_number'];
                                  $sql = "SELECT Project_id,Sender FROM invitations WHERE Receiver = '$name' AND Status = 'PENDING...'";
                                  $result = mysqli_query($Conn,$sql);
                                  $confirm = mysqli_num_rows($result);
                                  if ($confirm > 0)
                                    {
                                      while($row = mysqli_fetch_assoc($result))
                                      {
                                        $Project_id = $row['Project_id'];

                                        $sql1 = "SELECT Project_title FROM projects WHERE Project_id = '$Project_id'";
                                        $result1 = mysqli_query($Conn,$sql1);
                                        $confirm1 = mysqli_num_rows($result1);
                                        if ($confirm1 > 0)
                                          {
                                            while ($row1 = mysqli_fetch_assoc($result1))
                                            {
                                              
                                              echo "<option value= '$Project_id'>".$row1['Project_title']."</option>";
                                            }
                                          }
                                      }
                                    }
                            ?>
                          </select>
                          <br><br>
                          <button type= "submit" class="btn btn-primary">Submit</button>
                        </center>
                        </form>
                       </div>
                       
                      
                    </div>
                  </div>
                </div>
                <!-- modal -->

                <?php
            if(isset($_POST['choice'])){
                  $choice = $_POST['choice'];
                  $id = $_POST['project'];
                  $Receiver = $_SESSION['Reg_number'];

                  $sql = "UPDATE invitations SET Status = '$choice' WHERE Project_id = '$id' AND Receiver = '$Receiver'";

                  if($Conn->query($sql) == TRUE){
                    $sql1 = "INSERT INTO project_developers (Project_id,Reg_number) VALUES ('$id','$Receiver')";
                    if($Conn->query($sql1) ==TRUE){
                      $_SESSION['message'] = "Success";   
                    }else{
                      $_SESSION['message'] = "Failed to update developers";
                    }
                            
                  }else{
                    $_SESSION['message'] = "Failed!!";
                  }
            }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile"><center><p style="color: green; font: 36px;"><b><?php if (!empty($_SESSION['message'])) {
              echo $_SESSION['message'];
            }else{ echo " ";} ?></center></b></p>
            <div class="tile-body">
              <label class="control-label">Name: </label><b><i> <?php echo $_SESSION['Name']." ".$_SESSION['Surname']; ?></i></b><br>
              <label class="control-label">Program: </label><b><i>    Software Engineering</i></b><br>
              <label class="control-label">Reg-number </label><b><i>  <?php echo $_SESSION['Reg_number']; ?></i></b><br>
              <label class="control-label">Year </label><b><i>    2</i></b><br>
              <label class="control-label">Date of Birth</label><b><i>    02/01/1997</i></b><br>
              <br>
              <hr>
              <h3 class="header">Projects</h3><br>

              <div class="row">
                <div class="col-md-6">
                <label class="control-label">Title :</label><b><i>   Sist projects hub</i></b><br>
                <label class="control-label">Year :</label><b><i>   2016-2017</i></b><br>
                <label class="control-label">Level :</label><b><i>   Hit200</i></b><br>
                <label class="control-label">Status :</label><b><i>   complete</i></b><br>
                <label class="control-label">Description : </label><br>
                <Lorem>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</Lorem><br>
                <button class="btn btn-primary"> View doc</button>
                <button class="btn btn-danger"> View </button>
              </div>

              <div class="col-md-6">
                <label class="control-label">Title :</label><b><i>   Automation Engineering</i></b><br>
                <label class="control-label">Year :</label><b><i>   2018-2019</i></b><br>
                <label class="control-label">Level :</label><b><i>   Hit400</i></b><br>
                <label class="control-label">Status :</label><b><i>   pending...</i></b><br>

                <label class="control-label">Description : </label><br>
                <Lorem>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</Lorem><br>
                <button class="btn btn-primary"> View doc</button>
                <button class="btn btn-danger"> View </button>
              </div>

            </div>
          </div>
          <?php $_SESSION['message'] = ' '; student_modal(); ?>
        </div>
      </div>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>