<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <center>
          <br>
            <img src="../images/logo.png">
            <h3 style="color: navy;">School Of Information Science and Technology</h3>
            <p style="font-weight: 300;color: #688a7e; font-size: 24px;">Success through inovation</p>
          </center>
      </div>
      <div class="login-box" style="height: 560px; width: 400px;">
        <center><p class="semibold-text mb-2" style="color: red;" id="p3"><?php if (!empty($_SESSION['login'])) {
              echo $_SESSION['login'];
            }else{ echo " ";} ?></p> </center> <br>
        <form class="login-form" method="POST" action="../php/signup.php" onsubmit="validate()"> 
          <h3 class="login-head"><i class="fa fa-lock"></i>SIGN UP</h3>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" placeholder="Email" name="email" autofocus required="">
          </div>
           <div class="form-group">
            <label class="control-label">Reg number</label>
            <input class="form-control" type="text" placeholder="Hit id " name="id" autofocus required="">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="p1" id="p1" required="">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Re-enter Password" name="p2" id="p2" required="">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock"></i>SIGN UP</button>
            <button class="btn btn-warning btn-block" href='page-login.php'><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>LOGIN </h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="id number" required="">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" required="">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to SIGN UP</a></p>
          </div>
        </form>
      </div>
      <?php $_SESSION['login'] = ' ' ?>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      var p1 = document.getElementById('p1').value;
      var p2 = document.getElementById('p2').value;

      if (p1 != p2) {
        document.getElementById('p3').textContent = "! Password mismatch"
      }
    </script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>