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
  <link rel="stylesheet" href="css/style.css" >
  <link href="css/users_profile.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
 include("include/connection.php");

if(!($_SESSION["email"])){
    header("location:index.php");
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

    if(isset($_GET["username"])){
        $admin_username=$_GET["username"];
    }

    if(isset($_GET["group_name"])){
        $group_name=$_GET["group_name"];
    }
?>

    <nav>
        <div class="logo">
            <a href="mychat.php?username=<?php echo $user_name?> & group_name=<?php echo $group_name ?>">
                <h2>We chat</h2>
            </a>
        </div>
    </nav>
        <?php
            $sql="SELECT * FROM users_group WHERE group_admin='$admin_username' AND group_name='$group_name'";
            $select=mysqli_query($con,$sql);
            $row_admin=mysqli_fetch_array($select);
            $admin_email=$row_admin["admin_email"];
            
            $sql1="SELECT * FROM users WHERE email='$admin_email' AND group_name='$group_name'";
            $select_admin=mysqli_query($con,$sql1);
            $row=mysqli_fetch_array($select_admin);

            $name=$row["username"];
            $user_profile=$row["profiles"];
            $user_email=$row["email"];
            $user_country=$row["country"];
            $user_gender=$row["gender"];
            $user_status=$row["users_status"];
            $user_group_name=$row["group_name"];
            $user_join_wechat_date=$row["Date"];


        ?>

        <div class="profile-background">
            <div class="users-profile">
                    <img src="img/<?php echo $user_profile?>" id="user_profile">
            </div>
            <div class="users-details">
             <ul class="list-group">
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Name :</span> <p id="details"><?php echo $name?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Email :</span> <p id="details-email"><?php echo $user_email?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Country :</span> <p id="details"><?php echo $user_country?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Gender :</span> <p id="details"><?php echo $user_gender?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>User status :</span> <p id="details"><?php echo $user_status?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Group Name :</span> <p id="details-groupname"><?php echo $user_group_name?></p>
                        </div> 
                    </li>
                    <li class="list-group-item">
                        <div class="md-v-line"></div>
                        <div class="user-datial-inner">
                        <span>Joint we chat :</span> <p id="details"><?php echo $user_join_wechat_date?></p>
                        </div> 
                    </li>
                </ul>
            </div>
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
