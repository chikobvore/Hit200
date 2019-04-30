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

      <?php require '../php/Student_marks.php'; ?>
      <tbody>
    </table>
          <center><p style="color: red; font: 36px;"><b><?php if (!empty($_SESSION['message'])) {
              echo $_SESSION['message'];
            }else{ echo " ";} ?></center></p></b>
  </div>
</div>

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
                  <center>
                     <h4>Type project id to search more information</h4>
                  </center>

              <form method="POST" action="marks.php">
              <div class="row">
  
              <div class="col-md-4"> 
                <input type="text" name="search" class="form-control" placeholder="Project id....">
               </div>



              <div class="col-md-4">
                <select class="form-control" name="assessment">
                  <?php 
                  $sql = "SELECT Assessment_title,Assessment_id,Level FROM assessment_details";
                  $result = mysqli_query($Conn,$sql);
                  $confirm = mysqli_num_rows($result);

                  if ($confirm > 0 ) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $title = $row['Assessment_title'];
                      $id = $row['Assessment_id'];
                      $level = $row['Level'];
                      echo "<option value='$id'>".$title."   ".$level."</option>" ;
                    }
                  }

                  ?>
                  
                </select>
             </div>
               
            
               <div class="col-md-4">
                <input type="submit" name="" class="btn btn-primary">
             </div>
            

             </div>
           </form>
          </div>
         </div>
      </div>
      <?php summary($_SESSION['Department']); ?>
    </div>
    <?php $_SESSION['message'] = ' '; ?>

    <?php 
      //site= zimrentals.com/cpanel, username =zimrenta ,password dev2019
      if(isset($_POST['search']) && isset($_POST['assessment']))
      {
        require '../dbh/dbh.php';
        $search = $_POST['search'];
        $assessment = $_POST['assessment'];

        $sql = "SELECT * FROM  lecturer_assessment_marks WHERE Assessment_id = '$assessment' AND Project_id = '$search'";
        $result = mysqli_query($Conn,$sql);
        $confirm = mysqli_num_rows($result);
        if($confirm > 0)
        {
                 echo "<div class='row'>".
                            "<div class='col-md-12'>".
                              "<div class='tile'>".
                                 "<div class='tile-body'>";
                                 echo "<div class='row'>";
          while ($row = mysqli_fetch_assoc($result))
          {
            $staff_id = $row['Staff_id'];
            $Mark = $row['Mark'];
            $Total_mark = $row['Total_mark'];
            $Overal_mark = $row['Overal_mark'];
            $comment = $row['Comment'];
            $sql = "SELECT  Assessment_title,Level,Department,Year FROM assessment_details WHERE Assessment_id = '$assessment'";
                  $result1 = mysqli_query($Conn,$sql);
                  $confirm1 = mysqli_num_rows($result1);
                  if($confirm1 > 0)
                  {           
                                  

                    while ($row1 = mysqli_fetch_assoc($result1))
                      {

                        $sql = "SELECT Name,Surname FROM lecturers WHERE Staff_id = '$staff_id'";
                        $result2 = mysqli_query($Conn,$sql);
                        $confirm2 = mysqli_num_rows($result2);
                        if ($confirm2 > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2))
                                {
                                  $Name = $row2['Name'];
                                  $Surname = $row2['Surname'];
                                 }
                                # code...
                              }else{
                                echo "Error".$sql . "<br>" . $Conn->error;
                              }


                        $Assessment_title = $row1['Assessment_title'];
                        $level = $row1['Level'];
                        $dpt = $row1['Department'];
                        $year = $row1['Year'];

                       echo "<div class='col-md-6'>".
                            "<center>".
                              "<h4>".$Assessment_title."</h4>".
                            "</center>".
                            "<p>"."<b>"."Department: "."</b>".$dpt."</p>".
                            "<p>"."<b>"."Year: "."</b>".$year."</p>".
                            "<p>"."<b>"."course code: "."</b>". $level."</p>".
                            "<p>"."<b>"."Lecturer : "."</b>". $Name."  ".$Surname."</p>";


                        echo "<table class='table table-hover'>".
                              "<thead>".
                                "<th>"."Item"."</th>".
                                "<th>"."Mark"."</th>".
                                "<th>"."Out of "."</th>".
                                "<th>"."comment"."</th>".
                              "</thead>";
                              

                              $sql = "SELECT * FROM assessment_items WHERE Assessment_id = '$assessment'";
                              $result3 = mysqli_query($Conn,$sql);
                              $confirm3 = mysqli_num_rows($result3);
                              if ($confirm3 > 0) {
                                echo "<tbody>";
                                while ($row3 = mysqli_fetch_assoc($result3))
                                {
                                  $item = $row3['Item'];
                                  $Item_id = $row3['Item_id'];
                                  $Item_mark = $row3['Item_mark'];
            

                                  $sql1 = "SELECT Mark,Comment FROM assessment_marks WHERE Staff_id = '$staff_id' AND Project_id = '$search' AND Assessment_id = '$assessment' AND Item_id = '$Item_id'";
                                    $result5 = mysqli_query($Conn,$sql1);
                                    $confirm5 = mysqli_num_rows($result5);
                                    if ($confirm5 > 0)
                                    {
                                      while ($rows = mysqli_fetch_assoc($result5))
                                      {

                                          echo "<tr>".
                                              "<td>".$item."</td>".
                                              "<td>".$rows['Mark']."</td>".
                                              "<td>".$Item_mark."</td>".
                                              "<td>".$rows['Comment']."</td>".
                                          "</tr>";
                                      }
                                    }
                                  }
                                echo "</tbody>";
                                echo "</table>";

                                         echo "<p>"."<b>"."Scored Mark: "."</b>".$Mark."</p>".
                                          "<p>"."<b>"."Total Mark: "."</b>".$Total_mark."</p>".
                                          "<p>"."<b>"."Total Percentage: "."</b>".$Overal_mark."%"."</p>".
                                          "<p>"."<b>"."Over comment"."</b>"."<br>".
                                          "<p>".$comment."</p>";

                                echo "</div>";
                               

                              }
                              else{
                                echo "system Error: " . $sql . "<br>" . $Conn->error;
                              }




                      }

        }
              
          }
           echo "</div>".
                  "</div>".
                "</div>".
              "</div>";
        
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

  </body>
</html>