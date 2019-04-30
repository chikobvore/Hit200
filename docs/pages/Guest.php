<?php
require '../dbh/dbh.php';
require '../php/Php.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/guest.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<title>Harare Institute of Technology</title>
</head>
<body>

<div class="top">
	<div class="container">
		<ul>
			<li  class="toplink"><a href="tel:2634774142236" class="quick-call"><i class="icon fa fa-phone"></i>+263 4 7741 422 - 36</a> | <a href="mailto:sist@hit.ac.zw" class="quick-email"><i class="icon fa fa-envelope"></i>sist@hit.ac.zw</a>
			</li>
		 </ul>

	  <div class="head">
		<div class="row">
			<div class="col-md-2">
				<img src="../images/logo.png">
			</div>
			<div class="col-md-6">
				<h3 class="page-header" style="color: navy; display: inline;">School of information Science and Technology<br></h3>
                       <p style="display: inline; margin-right: 50px;">success through inovation</p>
			</div>
			<div class="col-md-4">
				<input type="text" name="search" class="search" placeholder="searh ....">
				<input type="submit" name="" class="searchbtn">
			</div>
		</div>	
	  </div>
	</div>
	<br><br>

	<div class="navbar1">
		<div class="navbar">
			<div class="container">
			   <ul>
				<li class="nav_items"><a href="">Home</a></li>
				<li class="nav_items"><a href="">Department</a></li>
			  </ul>
			</div>
		</div>
	</div>
</div>
<div class="container" style="padding-top: 250px;">
	<div class="row">

		<div class="col-md-8">
			<h5>Facial Recognition</h5>
				<center>
					<img src="../files/img.jpeg" style="width: 400px; height: 300px;" >
				</center>
			<p style="font-family: sans-serif; font-size: 18px;"><Lorem> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod...</Lorem><button onclick="show()">More</button></p>
			<p id="1" class="more"><Lorem> </Lorem></p>
				<div class="actions">
					<center>
						<button class="btn btn-default"><i class="fa fa-comment-o" aria-hidden="true"></i></button>
						<button class="btn btn-default"><i class="fa fa-envelope" aria-hidden="true"></i></button>
						<button class="btn btn-default"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
					</center>


					</div>
			
		<h5>Facial Recognition</h5>
				<center>
					<img src="../files/img.jpeg" style="width: 400px; height: 300px;" >
				</center>
			<p style="font-family: sans-serif; font-size: 18px;"><Lorem> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum...........<button onclick="show()">More</button>
					<p id="1" class="more"><Lorem> </Lorem></p>
					<div>
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<i class="fa fa-thumbs-up" aria-hidden="true"></i>


					</div>
		</div>

		<div class="col-md-4" style="margin-right: 0px; position: sticky;">
			<div class="title-header">
				<center>
					<h4 style="color: whitesmoke; font-family: sans-serif;">School of IST</h4>
				</center>
				<div style="padding-top: 20px;">
					<li><a href="">About us</a></li>	
					<li><a href="">School Researches</a></li>
					<li><a href="">Staff Profiles</a></li>
					<li><a href="">Departments</a></li>	
					<li><a href="">career prospects</a></li>		
				</div>	
			</div>	
		</div>
		
	</div>
</div>
<div class="footer">
	<center>
		<p style="color: whitesmoke;">Copyright. All rights reserved. </p>
	</center>
</div>

<script type="text/javascript">
	function show() {
		var a  = document.getElementById('1');
		a.textContent = "ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,";
		a.style.visibility = 'Visible';
		alert(a);
	}
</script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>


</body>
</html>