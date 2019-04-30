<?php
require '../dbh/dbh.php';
require '../php/Php.php';
session_start();
if (empty($_SESSION['Role']) OR $_SESSION['Role'] !== 'Administrator')
{
  header('location: page-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Adminstration</title>
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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg">4</i></a>
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
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['Role']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">New</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#student_modal" data-toggle="modal"><i class="icon fa fa-users"></i>Student</a></li>
            <li><a class="treeview-item" href="#lecture_modal" data-toggle="modal"><i class="icon fa fa-user"></i>Staff</a></li>
          </ul>
        </li>
       
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Guests</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Projects</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#"><i class="app-menu__icon fa fa-file-text"></i>Hit200</a></li>
            <li><a class="treeview-item" href="#"><i class="app-menu__icon fa fa-file-text"></i>Hit400</a></li>
            <li><a class="treeview-item" data-toggle="modal" href="#mod9"><i class="icon fa fa-circle-o"></i>New</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Files</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>Hit200</a></li>
            <li><a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>Hit400</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">More</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <br>
          <img alt="" src="../images/logo.png">
          <h3 class="page-header" style="color: navy; display: inline;">&nbsp &nbsp&nbsp&nbspSchool of information Science and Technology<br></h3>
                                <p style="display: inline; margin-right: 50px;">&nbsp&nbsp&nbsp success through inovation</p><br><br>
          <!--
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>A free and open source Bootstrap 4 admin template</p>-->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-laptop fa-3x"></i>
            <div class="info">
              <h4>Software Engineering</h4>
              <p><b>5</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-barcode fa-3x"></i>
            <div class="info">
              <h4>Information Technology</h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-cogs fa-3x"></i>
            <div class="info">
              <h4>computer science</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-unlock-alt fa-3x"></i>
            <div class="info">
              <h4>Information security and assurance</h4>
              <p><b>500</b></p>
            </div>
          </div>
        </div>
      </div>
      <center>
            <p style="color: green; font: 36px;">
              <b><?php if (!empty($_SESSION['message']))
                  {
                        echo $_SESSION['message'];
                    }else{ echo " ";} ?>
                      
              </b>
            </p>
        </center>
      <div class="row">
         <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Statistics <i class="fa fa-icon_piechar"></i></h3>
           <label>Software Engineering: <input type="text" name="" style="background-color: navy; width: 15px; height: 15px;"></label><br>
           <label>Information Technology<input type="text" name="" style="background-color: orange; width: 15px; height: 15px;"></label><br>
           <label>Information Security and assurance<input type="text" name="" style="background-color: green; width: 15px; height: 15px;"></label><br>
            <label>computer science<input type="text" name="" style="background-color: red; width: 15px; height: 15px;"></label><br>
            <h4>description</h4>
            <Lorem> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</Lorem>

          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <label>
            <h3 class="tile-title" style="display: inline-block;">Passrate</h3>
            <p style="display: inline-block;">(Pass is consirded as 2.1 and /or above)</p></label>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
            </div>
          </div>
        </div>   
      </div>
      <!--
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Hit200 assessments 2018-2019</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="tile">
                    <h5>Software Engineering</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review</li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>12</b></label>
                  </div>
                </div>
                  <div class="col-md-6">
                <div class="tile">
                    <h5>Information Technology</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review <i class="fa fa-check"></i></li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>7</b></label>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                <div class="tile">
                    <h5>computer science</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review</li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>9</b></label>
                  </div>
                </div>
                  <div class="col-md-6">
                <div class="tile">
                    <h5>Information security</h5>
                    <label>Project phases</label>
                    <ul>
                      <table>
                        <tr>
                        <thead>
                          <th></th>
                          <th></th>
                          <th></th>
                        </thead>
                      </tr>

                        <tbody>
                          <tr>
                            <td>Proposals</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                          <tr>
                            <td>concept development </td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                          <tr>
                            <td>Progres Review </td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                              <tr>
                            <td>Prototype</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-times"></i></td>
                          </tr> 
                          <tr>
                            <td>Documenentation</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-times"></i></td>
                          </tr>       
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Hit400 assessments 2018-2019</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="tile">
                    <h5>Software Engineering</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review</li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>12</b></label>
                  </div>
                </div>
                  <div class="col-md-6">
                <div class="tile">
                    <h5>Information Technology</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review <i class="fa fa-check"></i></li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>7</b></label>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                <div class="tile">
                    <h5>computer science</h5>
                    <label>Project phases</label>
                    <ul>
                      <li>Proposals <i class="fa fa-check"></i></li>
                      <li>concept development <i class="fa fa-check"></i></li>
                      <li>Progres Review</li>
                      <li>prototype</li>
                      <li>Documentation</li>
                    </ul>
                    <label>Lectures: <b>9</b></label>
                  </div>
                </div>
                  <div class="col-md-6">
                <div class="tile">
                    <h5>Information security</h5>
                    <label>Project phases</label>
                    <ul>
                      <table>
                        <tr>
                        <thead>
                          <th></th>
                          <th></th>
                          <th></th>
                        </thead>
                      </tr>

                        <tbody>
                          <tr>
                            <td>Proposals</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                          <tr>
                            <td>concept development </td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                          <tr>
                            <td>Progres Review </td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-check"></i></td>
                          </tr> 
                              <tr>
                            <td>Prototype</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-times"></i></td>
                          </tr> 
                          <tr>
                            <td>Documenentation</td>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                            <td><i class="fa fa-times"></i></td>
                          </tr>       
                        </tbody>
                      </table>
                </div>
              </div>       
            </div> 
          </div>
                 -->                   
        <!---->
        <?php $_SESSION['message'] = ' ' ?>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Quick Post</h3>
            <div class="form quick-post">
                    <!--Edit profile form (not working)-->
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
                    </div>
                    </div>


                    <center>
                <div>
                <ul class="pagination pagination-lg">
                  <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#" data-toggle="flip">2015-2016</a></li>
                  <li class="page-item"><a class="page-link" href="#">2016-2017</a></li>
                  <li class="page-item"><a class="page-link" href="#">2017-2018</a></li>
                  <li class="page-item active"><a class="page-link" href="#">2018-2019</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </center>
        </div>
                


        <!--modal for adding students -->
              <div class="modal fade" id="student_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="width: 700px;">
                      <div class="modal-header">
                        <h4 class="title">New Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="../php/addstudent.php">
                          <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">First Name</label>
                <input type="text" class="form-control" id="full_name_id" name="name" placeholder="John" required="">
              </div>  

              <div class="form-group"> <!-- Street 1 -->
                <label for="street1_id" class="control-label">Surname</label>
                <input type="text" class="form-control" id="street1_id" name="surname" placeholder="deere" required="">
              </div>          
                          
              <div class="form-group"> <!-- Street 2 -->
                <label for="street2_id" class="control-label">Reg number</label>
                <input type="text" class="form-control" id="street2_id" name="reg_number" placeholder="h170xxxb" required="">
              </div>  
              <label class="control-label">Program</label>
                <select class="form-control" name="program">
                <option value="Software Engineering">Software Engineering</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Information security and assurance">Information security and assurance</option>
              </select>
        

                <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Email address</label><p id="1"></p>
                <input type="email" class="form-control" id="email_id" name="email" placeholder="me@example.com" required="">
              </div>

                <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Physical address</label>
                <input type="text" class="form-control" id="physical_address" name="physical_address" required="">
              </div>

                <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Phone number</label>
                <input type="text" class="form-control" id="phone_id" name="phone" placeholder="+263 770 000 000" required="">
              </div>

                <label class="control-label">Gender</label>
                          <select class="form-control" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <br>

                            <div class="form-group">
                <label for="city_id" class="control-label">Date of Birth</label>
                <input type="Date" class="form-control" min="01/01/2003" name="dob" placeholder="01/01/1945" required="">
              </div>
                               

                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit">Save changes</button>

                    </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->
                <!-- Modal  for adding lecturers -->
                <div class="modal fade" id="lecture_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="width: 700px;">
                      <div class="modal-header">
                        <h4>New Staff</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">
                        <form  onsubmit="return validate()" method="POST" action="../php/addlecturer.php">

                          <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">Title</label>
                <select class="form-control" name="title">
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Ms">Ms</option>
                  <option value="Miss">Miss</option>
                  <option value="prof">Prof</option>
                  <option value="Doc">Doc</option>
                  <option value="Dr">Dr</option>
                </select>
              </div>
                          <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">First Name</label>
                <input type="text" class="form-control" id="full_name_id" name="name" placeholder="John" required="">
              </div>  

              <div class="form-group"> <!-- Street 1 -->
                <label for="street1_id" class="control-label">Surname</label>
                <input type="text" class="form-control" id="street1_id" name="surname" placeholder="deere" required="">
              </div>          
                          
              <div class="form-group"> <!-- Street 2 -->
                <label for="street2_id" class="control-label">Staff id</label>
                <input type="text" class="form-control" id="street2_id" name="staff_id" placeholder="....." required="">
              </div>  
              <label class="control-label">Department</label>
                <select class="form-control" name="Department">
                <option>Software Engineering</option>
                <option>Computer Science</option>
                <option>Information Technology</option>
                <option>Information security and assurance</option>
              </select>
        

                <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Email address</label><p id="2"></p>
                <input type="email" class="form-control" id="email_id1" name="email" placeholder="me@example.com" required="">
              </div>

                <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Phone number</label>
                <input type="text" class="form-control" id="phone_id1" name="phone" placeholder="+263 770 000 000" required="">
              </div>

                <label class="control-label">Gender</label>
                          <select class="form-control" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                          <br>

                            <div class="form-group">
                <label for="city_id" class="control-label">Role</label>
                <select class="form-control" name="role">
                  <option value="Supervisor">Supervisor</option>
                  <option value="Chairperson">Chair Person</option>
                  <option value="co-ordinator">Co ordinator</option>
                </select>
              </div>
                               

                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit" name="submit">Save changes</button>

                    </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->
                 <div class="modal fade" id="mod9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content"  style="width: 700px;">
                      <div class="modal-header">
                        <h4>New Project</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">

                      <form action="fileupload.php" method="POST" enctype="multipart/form-data">

                         <label class="control-label">Period</label>
                        <select class="form-control" name="period">
                          <option value="2018/2019">2018/2019</option>
                          <option value="2019/2020">2019/2020</option>
                        </select>


                        <label class="control-label">Level</label>
                        <select class="form-control" name="Level">
                          <option value="Hit200">Hit200</option>
                          <option value="Hit400">Hit400</option>
                        </select>

                     <label class="control-label">Department</label>
                            <select class="form-control" name="program">
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Information security and assurance">Information security and assurance</option>
                            </select>

                          <label class="control-label">Developers</label>
                          <input type="text" class="form-control" id="physical_address" name="input1">
                          <input type="text" class="form-control" id="physical_address" name="input2">
                          <input type="text" class="form-control" id="physical_address" name="input3">
                          <input type="text" class="form-control" id="physical_address" name="input4">
                          <a class="btn btn-success" style="float: right;"><i class="icon_plus_alt"></i></a> 
                    <br><br>
                    <label class="control-label">Project Title</label>
                    <input type="text" class="form-control" id="physical_address" name="title">

                    <label class="control-label">Project Description</label>
                    <textarea class="form-control " id="ccomment" name="description"></textarea>
                     <label class="control-label">Field of study</label>
                            <select class="form-control" name="program">
                                <option value="Software Engineering">Artificial Intelligence</option>
                                <option value="Computer Science">Big Data analytics</option>
                                <option value="Information Technology">IOT</option>
                                <option value="Information security and assurance">Expect Systems</option>
                                <option></option>
                            </select>
                            <br>
                            <input type="text" name="" placeholder="specify if other" class="form-control">
                            <br>


                    <label class="control-label">Attachments</label>
                    <input type="file" name="file">
                      </div>
                      <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-success" type="submit" name="submit">Save changes</button>

                      </div>
                      </form>

                    </div>
                  </div>
                </div>
                <!-- modal -->
      
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
    <script type="text/javascript" src="../js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["2014-2015", "2015-2016", "2016-2017", "2017-2018", "2018-2019"],
      	datasets: [
      		{
      			label: "SE",
      			fillColor: "rgba(100,150,220,0.2)",
      			strokeColor: "navy",//"rgba(220,220,220,1)",
      			pointColor: "navy",//rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [60, 70, 75, 88]
      		},
          {
            label: "CS",
            fillColor: "rgba(220,150,100,0.2)",
            strokeColor: "red",//"rgba(220,220,220,1)",
            pointColor: "red",//"rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [55, 68, 75, 78]
          },
          {
            label: "ISA",
            fillColor: "rgba(150,220,100,0.2)",
            strokeColor: "green",//"rgba(220,220,220,1)",
            pointColor: "green",//"rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [58, 68, 75, 80 ]
          },
      		{
      			label: "IT",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "orange",//"rgba(151,187,205,1)",
      			pointColor: "orange",//"rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [54, 63, 69, 70]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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