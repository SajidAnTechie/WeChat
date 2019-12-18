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
            <a href="mychat.php?username=<?php echo $user_name?> & group_name=<?php echo $user_group_name ?>">
                <h2 id="header-logo">We chat</h2>
            </a>
        </div>
    </nav>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                        <?php 

                            if(isset($_POST["update_info"])){
                                $username=htmlspecialchars($_POST["change_username"]);
                                $useremail=htmlspecialchars($_POST["change_email"]);
                                $usergender=htmlspecialchars($_POST["change_gender"]);
                                $usercountry=htmlspecialchars($_POST["change_country"]);

                                if($username==""){
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                        Username is invalid required .
                                    </div>
                                    ';
                                }
                                    if($useremail==""){
                                        echo'
                                        <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                            Email is invalid .PLease try again.
                                        </div>
                                        ';
                                    }
                                
                                    if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$user_email)){
                                        echo'
                                                <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                                    Email is invalid. PLease try again.
                                                </div>
                                        ';
                                    }
                                    if($username !=null & $useremail!=null ){
                                        $sql1="UPDATE users SET username='$username',email='$useremail',gender='$usergender',country='$usercountry' WHERE email='$user_email'";
                                        $run2=mysqli_query($con,$sql1);
                                        if($run2){
                                            echo"<script>window.open('setting.php?user_id=$user_id & group_name=$user_group_name','_self')</script>";
                                        }else{

                                            echo'
                                            <div class="alert alert-danger" role="alert">
                                                Sorry your account is not updated.Please try again.
                                            </div>
                                            ';
                                        }
                                    }
                                
                                
                            }

                            ?>
                    <form action="" method="post">
                        <table class="table table-borderd table-hover" id="header-for-setting">
                            <tr align="center">
                                <td colspan="6" class="active" id="header-setting"><h2>Change Settings</h2></td>
                            </tr>
                            <tr>
                                <td id="table-header">Change Username</td>
                                <td>
                                    <input type="text" class="form-control" name="change_username" id="change_username" value="<?php echo $user_name ?>">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Change Email</td>
                                <td>
                                    <input type="email" class="form-control" name="change_email" id="change_email" value="<?php echo $user_email ?>">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Change Gender</td>
                                <td>
                                    <select name="change_gender" class="form-control">
                                    <option><?php echo $user_gender?></option>
                                    <option>Male</option>
                                    <option>female</option>
                                    <option>others</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Change Country</td>
                                <td>
                                    <select name="change_country" class="form-control">
                                    <option><?php echo $user_country?></option>
                                    <option>Nepal</option>
                                    <option>Pakistan</option>
                                    <option>India</option>
                                    <option>Bangladesh</option>
                                    <option>Bhutan</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Forgotten Password</td>
                                <td>
                                <button type="button" id="for_text-trnasform" class="btn btn-light" data-toggle="modal" data-target="#forgottenpassword">
                                 Forgotten Password
                                </button>
                                <?php include("include/setting_modal_fade.php");?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <a href="change_password.php?user_id=<?php echo $user_id ?> & group_name=<?php echo $user_group_name?>" class="btn btn-link" id="for_text-trnasform"><font color=blue>Change Password</font> </a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary" name="update_info">Update</button>
                                </td>
                            </tr>
                        </table>
                    </form>
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
