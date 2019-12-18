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
?>
    <nav>
        <div class="logo">
            <a href="home.php">
                <h2 id="header-logo-password-change">Back</h2>
            </a>
        </div>
    </nav>
        
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                        <?php 

                            if(isset($_POST["confirmation"])){
                                $user_email=htmlspecialchars($_POST["your_email"]);
                                $user_frend_name=htmlspecialchars($_POST["frend_name"]);
                                
                                $sql="SELECT * FROM users WHERE email='$user_email' AND bestfreindname='$user_frend_name'";
                                $select_db=mysqli_query($con,$sql);
                                $check=mysqli_num_rows($select_db);

                                if($check==1){
                                    session_start();
                                    $_SESSION["email"]=$user_email;
                                    header("location:create_pass.php");
                                }else{
                                    echo'
                                    <div class="alert alert-danger" id="alert-for-danger" role="alert">
                                        Your email or bestfrend name is incorrect.
                                    </div>
                                    ';
                                }
                            }
                            ?>
                    
                        <table class="table table-borderd table-hover" id="header-for-setting">
                            
                        <form action="" method="post">
                            <tr>
                                <td id="table-header">Your Email</td>
                                <td>
                                    <input type="email" class="form-control" name="your_email" placeholder="example:john@gmail.com">
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Your Frend Name</td>
                                <td>
                                    <input type="text" class="form-control" name="frend_name" placeholder="Your frend name">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <button type="submit" class="btn btn-primary" name="confirmation">Submit</button>
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
