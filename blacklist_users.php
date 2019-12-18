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
include("include/connection.php");
if(!($_SESSION["email"])){
    header("location:index.php");
}
$user=$_SESSION["email"];
        $sql2="SELECT * FROM users WHERE email='$user'";
        $select_db=mysqli_query($con,$sql2);
  
        $row=mysqli_fetch_array($select_db);
        $user_session=$row["username"];
        $user_email=$row["email"];
        $user_group_name=$row["group_name"];
        $user_group_code=$row["group_code"];
?>
    <nav>
        <div class="logo">
            <a href="home.php">
                <h2 id="header-logo-password-change">Back</h2>
            </a>
        </div>
    </nav>
        <br/>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                        <?php 
                        if(isset($_GET["group_name"])){
                            $group_name=$_GET["group_name"];
                            $sql="SELECT * FROM users_group WHERE group_name='$group_name'";
                            $run=mysqli_query($con,$sql);

                            $row=mysqli_fetch_array($run);
                            $group_admin=$row["group_admin"];
                            $group_code=$row["group_code"];
                            echo'
                                <div class="group_admin_name">
                                    <div class="alert alert-warning" role="alert">
                                    You have been removed from '.$group_name.' group by <span style="text-transform:capitalize;">'.$group_admin.'</span> as Admin.
                                    Please contact him for block  code to re-join.
                                </div>
                                </div>
                            ';
                        }
                            
                            
                        ?>
                    
                        <table class="table table-borderd table-hover" id="header-for-setting">
                            
                        <form action="" method="post">
                            <tr>
                                <td id="table-header">Block code</td>
                                <td>
                                    <input type="text" class="form-control" name="block_code" placeholder="example:john@gmail.com">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary" name="block_code_check">Submit</button>
                                </td>
                            </tr>
                        </form>
                    </table>

                    <?php
                if(isset($_POST["block_code_check"])){
                    $block_code=htmlspecialchars($_POST["block_code"]);

                    $sql1="SELECT * FROM users_group WHERE group_name='$group_name' AND block_code='$block_code'";
                    $run=mysqli_query($con,$sql1);
                    $count=mysqli_num_rows($run);

                    if($count==1){
                        $update_join_group_column="UPDATE users SET group_name='$group_name',group_code='$group_code' WHERE email='$user_email'";
                        $run_db=mysqli_query($con,$update_join_group_column);

                        $delete="DELETE FROM blocklist WHERE group_name='$group_name'";
                        $run_delete_blocklist=mysqli_query($con,$delete);
                        
                        echo"<script>window.open('mychat.php?username=$user_session & group_name=$group_name','_self')</script>";
                    }else{
                        echo'
                        <div class="group_admin_name">
                        <div class="alert alert-danger" role="alert">
                            Block code dont matched.Please try again.
                        </div>
                        </div>
                    ';
                    }
                }
            ?>
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
