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
    <link rel="stylesheet" href="css/sigh_up.css">
    <link rel="stylesheet" href="css/header.css" >
  </head>
  <body>
    <?php include("include/connection.php");?>
    <?php include("include/singh.php");?>
    <?php include("include/sigh_up_header.php");?>

    <div class="sighup-form">
        <form action="" method="post">
                <div class="form-header">
                    <h2>Singh In</h2>
                    <p>Fill out all feilds and start chatting with your freinds</p>
                </div>
                <div class="form-content">
                    <div class="form-group">
                            <label id="lable_header">Username</label>
                            <input id="form_border" type="text" class="form-control" name="sighin_user" autocomplete="off" value="<?php echo $username?>"  placeholder="Example : John">
                            <span><?php echo $username_error?></span>
                    </div>
                    <div class="form-group">
                            <label id="lable_header">Password</label>
                            <input id="form_border" type="password" class="form-control" name="sighin_password" value="<?php echo $user_pass?>" autocomplete="off" >
                            <span><?php echo $pass_error?></span>
                    </div>
                    <div class="form-group">
                            <label id="lable_header"> Your Email</label>
                            <input id="form_border" type="email" class="form-control" name="sighin_email" value="<?php echo $user_email?>" autocomplete="off"  placeholder="something@site.com">
                            <span><?php echo $email_error?></span>
                    </div>
                  
                    <div class="form-group">
                            <label id="form_border" id="lable_header">Coutry</label>
                            <select id="form_border" class="form-control" value="<?php echo $user_country?>" name="sighup_country" required>
                                <option disabled="">Choose Your country</option>
                                <option>Nepal</option>
                                <option>Pakistan</option>
                                <option>India</option>
                                <option>Bangladesh</option>
                                <option>Bhutan</option>
                            </select>
                    </div> 
                    <div class="form-group">
                            <label id="lable_header">Gender</label>
                            <select id="form_border" class="form-control" value="<?php echo $user_gender?>" name="sighup_gender" >
                                <option disabled="">Choose a gender</option>
                                <option>Male</option>
                                <option>female</option>
                                <option>others</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="font-small grey-text"> <input type="checkbox" name="sighup_user" required > I accept the <a href="#">Term of use</a> & <a href="#">Privacy</a>
                        </label>
                    </div> 
                    <div class="form-group">
                        <input id="sigh_in_botton" type="submit" name="submit_singh" autocomplete="off"  placeholder="Sigh In">
                    </div> 
                    <div class="form-group">
                        <p class="font-small grey-text d-flex">Alredy have a account? 
                        <a href="index.php" class="clik_here ml-1">Click here</a></p>
                    </div> 
                </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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