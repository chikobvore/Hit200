<?php 
session_start();
if (! isset($_SESSION['Name']))
{
  header('location: page-login.php');
}
require '../dbh/dbh.php';
require '../php/Php.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>invitation</title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
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
            <li><a class="dropdown-item" href="page-logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
        <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['Name']." ".$_SESSION['Surname']; ?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['Department']; ?></p>
        </div>
      </div>
        <?php 
      $role = $_SESSION['Role'];
      Sidebar($role);  ?>
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
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <center><p style="color: green; font: 36px;"><b><?php if (!empty($_SESSION['message'])) {
              echo $_SESSION['message'];
            }else{ echo " ";} ?></center></b></p><br>
              <center>
              <h4 class="header">Search friends to invite to your project here</h4>
            </center>
            <br>
            <form method="POST" action="invitation.php">
              <div class="row"> 
              <div class="col-md-11">
                <input type="text" name="search" class="form-control" required="">
                
              </div>
              <div class="col-md-1">
                <button type="submit" class="app-search__button"><i class="fa fa-search">Search</i></button>
              </div>
            </div>
          </form>
          <br><br>
          <form method = 'POST' action = '../php/search.php'>

          <?php
              $_SESSION['message'] = ' ';

                if (isset($_POST['search']))
                {
                    $search = $_POST['search'];
  
                    $sql = "SELECT Name , Surname , Program, Reg_number FROM students WHERE Name LIKE '%$search%' OR Surname LIKE '%$search%' OR Reg_number LIKE '%$search%'";
                    $result = mysqli_query($Conn,$sql);
                    $confirm = mysqli_num_rows($result);
                    if ($confirm >0 )
                    {
                      echo "<div class='col-md-12'>".
                                "<div class='tile'>".
                                  "<div class='tile-body'>".
                                    "<table class='table table-hover table-bordered' id='sampleTable'>".
                                      "<thead>".
                                            "<tr>".
                                              "<th>"."Name"."</th>".
                                              "<th>"."Surname"."</th>".
                                              "<th>"."Reg-number"."</th>".
                                              "<th>"."Program"."</th>".
                                              "<th>"."Invite"."</th>".
                                            "</tr>".
                                      "</thead>".
                                      "<tbody>";
                              $i = 0;        
                      while ($row = mysqli_fetch_assoc($result))
                      {
                        $name ="name".$i;
                        $value = $row['Reg_number'];
                        echo "<tr>".
                                  "<td>".$row['Name']."</td>".
                                  "<td>".$row['Surname']."</td>".
                                  "<td>".$row['Reg_number']."</td>".
                                   "<td>".$row['Program']."</td>".
                                  "<td>"."<input type = 'checkbox' name='$name' value='$value' >"."</td>".
                              "</tr>";
                              $i = $i +1;
                      }
                      echo "</tbody>".
                              "</table>".
                                  "</div>".
                                    "</div>".
                                     "</div>";
                                     echo "<input type = 'hidden' name='times' value='$i' >";
                                    

                    }else{
                         echo "Enter Name or Surname or Reg number";
                   }
                }
               
           ?>
  
                 <center>
                        <button  type = 'submit' class='btn btn-success'>Send Invites </button>
                </center>
                </form>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
     
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

  </body>
</html>