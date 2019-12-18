<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>My Chat Home Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css" >
  <link rel="stylesheet" href="css/profile.css" >
  <link rel="stylesheet" href="css/footer.css" >
  
</head>

<body>
<?php
session_start();
 include("include/connection.php");

 $user=$_SESSION["email"];
 $sql="SELECT * FROM users WHERE email='$user'";
 $select_db=mysqli_query($con,$sql);
 
 $row=mysqli_fetch_array($select_db);
 $user_name=$row["username"];
 $user_email=$row["email"];
 $user_profile=$row["profiles"];
 $user_gender=$row["gender"];
 $user_country=$row["country"];
 $user_pass=$row["password"];

if(!($_SESSION["email"])){
    header("location:index.php");
    exit;
}

?>

  <nav>
        <div class="logo">
            <a href="home.php">
                <h2 id="header-logo">We chat</h2>
            </a>
        </div>
    </nav>

  <?php
if(isset($_POST["upload_profile"])){
  $user_email=$_POST["email"];
  $files= $_FILES["files"];
  $filename= $files["name"];
  $filetmp= $files["tmp_name"];

  $fileext= explode(".", $filename);
  $filecheck= strtolower(end($fileext));

  $fileextstored= array("png","jpg","jpeg");

  if(empty($filetmp)) {
    $query = "SELECT * FROM users WHERE email= '$user_email'";
    $select_image = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($select_image)){
    $user_profile = htmlspecialchars($row["profiles"]);
    }
    $sql2="UPDATE users SET profiles='$user_profile' WHERE email= '$user_email'";
    mysqli_query($con, $sql2);
    header("location:profile.php");
  }elseif(in_array($filecheck,$fileextstored)){

  $destinationfile= "img/$filename";
  move_uploaded_file($filetmp,$destinationfile);
  
  $sql3="UPDATE users SET profiles='$filename' WHERE email= '$user_email'";
   mysqli_query($con, $sql3);
   header("location:profile.php");

}else{
  echo'
  <div class="alert alert-danger" role="alert">
      file extension is not valid
  </div>
  '; 
}

}
?>
    <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">       
            <form  method="post" action="" id="form_back" enctype="multipart/form-data">
                        <table class="table table-borderd table-hover" id="header-for-setting"> 
                              <div class="profile_img_back">
                                    <div class="profile_image">
                                        <img id="user_profile" src="img/<?php echo $user_profile?>" alt="">
                                      </div>
                                      <div class="form_upload_profile">
                                              <div class="form-group">
                                                <label id="choose_profile" class="btn btn-light" >Choose profile
                                                <input type="File" name="files" id="profile_pic" placeholder="Choose File">
                                                </label>   
                                              </div>
                                              <div class="form-group">
                                                <input type="hidden" name="email" value="<?php echo $user_email ?>">
                                                  <input type="submit" name="upload_profile" class="btn btn-primary" id="submit"  value="Uplaod">
                                              </div>
                                      </div>
                                  </div>  
                            <tr>
                                <td id="table-header">Username</td>
                                <td id="username">
                                <?php echo $user_name ?>
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Email</td>
                                <td>
                                <?php echo $user_email ?>
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Gender</td>
                                <td>
                                <?php echo $user_gender?>
                                </td>
                            </tr>
                            <tr>
                                <td id="table-header">Country</td>
                                <td>
                                <?php echo $user_country?>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>

            <div class="col-sm-3"></div>
        </div>

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
