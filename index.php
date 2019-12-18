<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <title>My Chat Login Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css" >
  <link rel="stylesheet" href="css/header.css" >
  <link rel="stylesheet" href="css/index.css" >
  <link rel="stylesheet" href="css/footer.css" >
</head>

<body>
<?php include("include/connection.php");?>
<?php include("include/login.php");?>

<?php include("include/header.php");?>

<section class="form-elegant" id="body_secttion">
  <div class="row"> 
  <div class="col-md-6 col-lg-6 col-xl-6">
    <img src="img/group_pic.jpg" id="gropu_pic" alt="">
  </div> 
    <div class="col-md-6 col-lg-6 col-xl-6">
        <?php
          if(isset($_GET["change_pass"]) && $_GET["change_pass"]==444){
            echo'
            <div class="alert alert-success" id="alert-for-succes" role="alert">
                Your password is changed. Please login.
            </div>
            ';
          }
        ?>
      <div class="card">
        <div class="card-body mx-4">
              <form action="" method="post">
                      <div class="text-center" id="login_header">
                        <h3>Login Here</h3>
                        <p>Welcome to login page</p>
                        </div>
                        <div class="md-form">
                          <input type="email" id="Form-email1" name="user_email" class="form-control" required>
                          <label for="Form-email1">Your email</label>
                        </div>

                        <div class="md-form">
                          <input type="password" name="user_pass" id="Form-pass1"class="form-control" required>
                          <label for="Form-pass1">Your password</label>
                        </div>
                        <div class="md-form">
                        <p class="font-small grey-text d-flex">Forgot Password? <a href="forgot_pass.php"  class="clik_here ml-1">
                            Click here</a></p>
                        </div>
                        <div class="text-center mb-3">
                          <button type="submit" name="login_submit"  class="btn blue-gradient btn-block btn-rounded z-depth-1a" id="login_buton">Login</button>
                          <span><?php echo $login_error?></span>
                        </div>

                      <div class="login_footer">
                        <p class="font-small grey-text">Don't have a account?<a href="sighup.php" class="clik_here ml-1">
                            Sign In</a></p>
                      </div>
              </form>
              

      </div>
    <!--/Form without header-->
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
</section>
<?php include("include/footer.php");?>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
