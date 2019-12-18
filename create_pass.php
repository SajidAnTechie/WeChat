<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <title>My Chat Home Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/setting.css" rel="stylesheet">
</head>
<body>
<?php
include("include/connection.php");
session_start();
$user=$_SESSION["email"];
 $sql2="SELECT * FROM users WHERE email='$user'";
 $select_db=mysqli_query($con,$sql2);

 $row=mysqli_fetch_array($select_db);
 $user_session=$row["username"];
 $user_email=$row["email"];
 
?>
    <nav>
        <div class="logo">
            <a href="forgot_pass.php">
                <h2 id="header-logo-password-change">Back</h2>
            </a>
        </div>
    </nav>
        
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                        <?php 

                            if(isset($_POST["change_pass"])){
                                $user_new_pass=htmlspecialchars($_POST["new_pass"]);
                                $user_confirmation_pass=htmlspecialchars($_POST["confirm_pass"]);
                                
                                if(strlen($user_new_pass)<9){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                            Password should be greater or equals to 9.
                                    </div>
                                    ';
                                }
                                if($user_new_pass!=$user_confirmation_pass){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                            Your new and re-type password dont matched.
                                    </div>
                                    ';
                                }
                                if($user_new_pass ==$user_confirmation_pass && strlen($user_new_pass)>9){
                                    $sql="UPDATE users SET password='$user_new_pass' WHERE email='$user_email'";
                                    $run=mysqli_query($con,$sql);

                                    if($run){
                                        echo"<script>window.open('logout2.php','_self')</script>";
                                    }else{
                                        echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                        Your password dont changed.Please try again;
                                    </div>
                                    ';
                                    }
                                }
                            }
                            ?>
                    
                        <table class="table table-borderd table-hover" id="header-for-setting">
                            
                        <form action="" method="post">
                            <tr>
                                <td id="table-header">New Password</td>
                                <td>
                                    <input type="password" class="form-control" name="new_pass">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Re-type Password</td>
                                <td>
                                    <input type="password" class="form-control" name="confirm_pass">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary" name="change_pass">Change</button>
                                </td>
                            </tr>
                        </form>
                    </table>
            </div>

            <div class="col-sm-3"></div>
        </div>
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
