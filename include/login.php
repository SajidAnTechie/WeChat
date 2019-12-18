<?php
session_start();

$login_error="";
    if(isset($_POST["login_submit"])){
        $user_email=htmlspecialchars($_POST["user_email"]);
        $user_pass=htmlspecialchars($_POST["user_pass"]);

        $sql="SELECT * FROM users WHERE email='$user_email' AND password='$user_pass'";
        $select_db=mysqli_query($con,$sql);
        $check=mysqli_num_rows($select_db);
        if($check== 1){
            $_SESSION["email"]=$user_email;
            $sql1="UPDATE users SET users_status='online' WHERE email='$user_email'";
            $select=mysqli_query($con,$sql1);

            $user=$_SESSION["email"];
            $sql2="SELECT * FROM users WHERE email='$user'";
            $select_db=mysqli_query($con,$sql2);

            $row=mysqli_fetch_array($select_db);
            $user_session=$row["username"];
            echo"<script>window.open('home.php?username=$user_session','_self')</script>";
            //header("location:mychat.php?username=$user_session");

        }else{
            $login_error= "* worng email or password";
        }
    }
?>