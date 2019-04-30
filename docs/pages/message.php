<?php
 require '../dbh/dbh.php';
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
            <img src="../images/logo.png" alt="logo">
            <h3 style="color: navy;">School Of Information Science and Technology</h3>
            <p style="font-weight: 300;color: #688a7e; font-size: 24px;">Success through inovation</p>
          </center>
      </div>
        <h1 style="color: #688a7e;"><i class="fa fa-exclamation-circle"></i> Operation could not proceed deadline passed on  <?php echo $_SESSION['message']; ?> days</h1>
        <p>Deadline rakapfuura shamwari</p>
        <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>