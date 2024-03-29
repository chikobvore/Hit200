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
    <title>Sist Projects hub</title>
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
            <form method= "POST" action= "weights.php">
            
                <center>
                    <h1>Assessment Weights</h1>
                    <p>Please select assessment type</p>

                    <div class="col-md-4">
                        <select name="assessment" class= "form-control">
                          <option value = "hit200">HIT 200</option>
                          <option value = "hit400">HIT 400</option>
                        </select>
                    </div>
                   <br><br>

                    <button type= "submit" class = "btn btn-info btn-lg">Load</button>
              </form>
              <p style="color: red; font: 36px;"><b><?php if (!empty($_SESSION['message'])) {
              echo $_SESSION['message'];
            }else{ echo " ";} ?></p></b>
                </center>
            </div>
          </div>
        </div>      
      </div>
      <?php student_modal(); ?>
      <?php 

      if(isset($_POST['assessment']))
      {
        $type = $_POST['assessment'];
        $Department = $_SESSION['Department'];


        $sql = "SELECT Assessment_id, Assessment_title,Level,assement_date FROM assessment_details WHERE level = '$type' AND Department = '$Department'";
        $result = mysqli_query($Conn,$sql);
        $confirm = mysqli_num_rows($result);

        if($confirm  > 0)
        {
          echo "<div class= 'row'>".
                  "<div class='col-md-12'>".
                    "<div class='tile'>".
                      "<div class='tile-body'>".
                      "<center>".
                      "<h3>".$type."&nbsp&nbspAssessment Weights"."</h3>".
                      "</center>";
                        echo "<form method = 'POST' action = '../php/addweight.php' onsubmit = 'return weights()'>".
                          "<div class='row'>".
                            "<div class='col-md-12'>".
                              "<div class='responsive-table'>".
                                "<table class= 'table'>".
                                  "<thead>".
                                    "<tr>".
                                      "<th>"."Assessment title"."</th>".
                                      "<th>"."Assessment Date"."</th>".
                                      "<th>"."Level"."</th>".
                                      "<th>"."Weight"."</th>".
                                    "</tr>".
                                  "</thead>".
                                  "<tbody>";
                      $i = 0;   
                      while($row = mysqli_fetch_assoc($result))
                      {
                        $id = $row['Assessment_id'];
                        $name = "weight".$i;
                        $weight = "mark".$i;
                        echo "<input type ='hidden' name = '$name' value = '$id'>";
                        echo "<tr>".
                                "<td>".$row['Assessment_title']."</td>".
                                "<td>".$row['assement_date']."</td>".
                                "<td>".$row['Level']."</td>". 
                                "<td>"."<input type = 'number' class = 'form-control' min= '0' max = '99' name = '$weight' id= $i required = ''>"."</td>".
                        "</tr>";
                        $i = $i + 1;
                      }
                      echo "</tbody>".
                            "</table>".
                                "</div>".
                                "<center>".
                                  "<button type = 'submit' class = 'btn btn-info'>"."Save Changes"."</button>".
                                "</center>"."</div>".
                                "</div>".
                              "</div>".
                            "</div>".
                          "</div>".
                      "</div>"."</form>";
        }
      else{
       echo "<center>"."<h1>"."No assessments founds"."</h1>"."</center>";
      }
      }



        ?>
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