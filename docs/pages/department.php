<?php 
session_start();

if (empty($_SESSION['Role']) OR $_SESSION['Role'] !== 'co-ordinator')
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
    <title>School of IST</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <center>
      <p style="color: green; font: 36px;"><b><?php if (!empty($_SESSION['message'])) {
              echo $_SESSION['message'];
            }else{ echo " ";} ?></center></p></b>
      <div class="row">
        
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Part 4 Students</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Part 2 Students</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>lectures</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
            <div class="info">
              <h4>Projects</h4>
              <p><b>50</b></p>
            </div>
          </div>
        </div>
      </div>
        <?php  assessment_details($_SESSION['Department']); ?>
      <div class="row">
       <?php stages($_SESSION['Department']); 
      $_SESSION['message'] = '';?>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Quick Post</h3>
            <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title">
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">Content</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" id="content"></textarea>
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Audience</label>
                        <div class="col-lg-10">
                          <select class="form-control">
                                                  <option value="">- Choose Targeted Audiene -</option>
                                                  <option value="1">co-ordinators</option>
                                                  <option value="2">Supervisors</option>
                                                  <option value="3">Lecturers</option>
                                                  <option value="4">Students</option>
                                                </select>
                        </div>
                      </div>
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Tags</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags">
                        </div>
                      </div>

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary">Publish</button>
                          <button type="submit" class="btn btn-danger">Save Draft</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>
                    </form>
                 </div>
              </div>


                  
                <div class="modal fade bd-example-modal-lg" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 10px;">
                      <div class="modal-header">
                          <h4 class="modal-title">Scheduling a Presentation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <form method="POST" action="../php/add_assessment.php">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="control-label"> Title</label>
                          <input type="text" name="title" class="form-control">                        
                        </div>
                          <div class="col-md-6">
                            <label class="control-label">course code</label>
                             <select class="form-control" name="course">
                              <option value="hit200">Hit200</option>
                              <option value="hit400">Hit400</option>
                            </select>
                        </div>
                      </div>
                      <br>
                      <h4 class="modal-title">Items to be assessed</h4>

                    <div id="1">
                      <div class="row">
                        <div class="col-md-6">
                          <h6>Item</h6>
                         
                          <input type="text" name="input1" class="form-control input-lg m-bot15" required=""><br>
                          <input type="text" name="input2" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input3" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input4" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input5" class="form-control input-lg m-bot15"><br>
                         
                        </div>
                        <div class="col-md-6">
                          <h6>Mark</h6>
                          <input type="number" name="input6" class="form-control input-lg m-bot15" required=""><br>
                          <input type="number" name="input7" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input8" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input9" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input10" class="form-control input-lg m-bot15"><br>
                        </div> 
                      </div>
                    </div>
                    <div id="2" style="display: none;">              
                      <div class="row">
                        <div class="col-md-6">
                         
                          <input type="text" name="input11" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input12" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input13" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input14" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input15" class="form-control input-lg m-bot15"><br>
                         
                        </div>
                        <div class="col-md-6">
                          <input type="number" name="input16" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input17" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input18" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input19" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input20" class="form-control input-lg m-bot15"><br>
                        </div>                 
                      </div>
                    </div>

                      <div class="btn-group" role="group" aria-label="Third group" style="float: right;">
                          <button class="btn btn-secondary" type="button" onclick="addmore()">More</button>
                      </div>
                         <div class="row">
                                <div class="col-lg-6">
                                       <label class="form-group" style="float: left;" >Period of Asessment:</label>
                                          <select class="form-control" name="period">
                                            <option value="2018/2019">2018/2019</option>
                                            <option value="2019/2020">2019/2020</option>
                                          </select>
          
                                </div>
                                  <div class="col-lg-6">
                                  <label class="form-group">Proposed Date (Due date for student project update)</label>
                                 
                                  <input type="Date" name="assessment_date" id="1" class="form-control">
                                </div>
                              </div><br>
                               <div class="form-group">
                                <label class="form-group">Assessment Objectives</label>
                                  <textarea class="form-control" name="objectives">
                                    
                                  </textarea>
                                  
                                </div>  
                               
                       <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit">Save changes</button>
                      </div>
                      </form>
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
     <script type="text/javascript" src="../js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">
      function addmore() {
        document.getElementById('2').style.display = 'contents';
        // body...
      }
          </script>
  </body>
</html>