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
session_start();
 include("include/connection.php");

if(!($_SESSION["email"])){
    header("location:index.php");
}
if(isset($_GET["user_id"])){
    $user_id=$_GET["user_id"];
}
if(isset($_GET["group_name"])){
    $user_group_name=$_GET["group_name"];
}
?>

<?php
$user=$_SESSION["email"];
$sql2="SELECT * FROM users WHERE email='$user'";
$select_db=mysqli_query($con,$sql2);

$row=mysqli_fetch_array($select_db);
$user_name=$row["username"];
$user_email=$row["email"];
$user_profile=$row["profiles"];
$user_gender=$row["gender"];
$user_country=$row["country"];
$user_pass=$row["password"];

   
?>

    <nav>
        <div class="logo">
            <a href="setting.php?user_id=<?php echo $user_id?> & group_name=<?php echo $user_group_name ?>">
                <h2 id="header-logo-password-change">go to settings</h2>
            </a>
        </div>
    </nav>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                        <?php 

                            if(isset($_POST["update_password"])){
                                $current_pass=htmlspecialchars($_POST["change_password"]);
                                $pass1=htmlspecialchars($_POST["pass1"]);
                                $pass2=htmlspecialchars($_POST["pass2"]);
                                

                                if($current_pass!=$user_pass){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                        Your old password dont matched.
                                    </div>
                                    ';
                                }
                                if(strlen($pass1)<9){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                         Password should be grater or equal to than 9 character.
                                    </div>
                                    ';
                                }
                                if($pass1!=$pass2){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                         Your new password dont matched with confirm password.
                                    </div>
                                    ';
                                }
                                
                                
                                    if($current_pass==$user_pass & $pass1==$pass2 ){
                                        $sql1="UPDATE users SET password='$pass1' WHERE email='$user_email'";
                                        $run2=mysqli_query($con,$sql1);
                                        if($run2){
                                            echo'
                                            <div class="alert alert-success" id="alert-for-danger" role="alert">
                                                 Your password has been changed.
                                            </div>
                                            ';
                                        }else{

                                            echo'
                                            <div class="alert alert-danger" role="alert">
                                                Sorry your passaowrd is not updated.Please try again.
                                            </div>
                                            ';
                                        }
                                    }
                                
                                
                            }

                            ?>
                    
                        <table class="table table-borderd table-hover" id="header-for-setting">
                            <tr align="center">
                                <td colspan="6" class="active" id="header-setting"><h2>Change Password</h2></td>
                            </tr>
                        <form action="" method="post">
                            <tr>
                                <td id="table-header">Current Password</td>
                                <td>
                                    <input type="password" class="form-control" name="change_password" placeholder="Current Password">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">New Password</td>
                                <td>
                                    <input type="password" class="form-control" name="pass1" placeholder="New Password">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Confirm Password</td>
                                <td>
                                    <input type="password" class="form-control" name="pass2" id="change_email" placeholder="Confirm Password">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary" name="update_password">Update</button>
                                </td>
                            </tr>
                        </form>
                    </table>
            </div>

            <div class="col-sm-2"></div>
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
