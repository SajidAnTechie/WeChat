<?php
    $username_error=""; $pass_error=""; $email_error=""; $username=""; $user_pass=""; $user_email="";
    if(isset($_POST["submit_singh"])){
        $username=htmlspecialchars($_POST["sighin_user"]);
        $user_pass=htmlspecialchars($_POST["sighin_password"]);
        $user_email=htmlspecialchars($_POST["sighin_email"]);
        $user_country=htmlspecialchars($_POST["sighup_country"]);
        $user_gender=htmlspecialchars($_POST["sighup_gender"]);
        $profile=rand(1,2);

        if($username ==""){
            $username_error="<font color=red> * username is reqiured</font>";
        }
        if(strlen($user_pass) <9){
            $pass_error="<font color=red> * password should be grater or equal to 9 character</font>";
        }
        if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$user_email))
        { 
            $email_error="<font color=red>* Email is invalid</font>";
        }
        $sql="SELECT * FROM users WHERE email='$user_email'";
        $select_db= mysqli_query($con,$sql);
        $select_all=mysqli_num_rows($select_db);
        if($select_all== 1){ 
            $email_error="<font color=red>* Email is alredy exist</font>";
        }
         
        if($profile==1 &  $user_gender=="Male"){
            $profile_img="boy1.png";
        }elseif($profile==2 &  $user_gender=="Male"){
            $profile_img="boy2.jpg";
        }

        if($profile==1 &  $user_gender=="female"){
            $profile_img="girl1.png";
        }elseif($profile==2 &  $user_gender=="female"){
            $profile_img="girl2.png";
        }
        
        if($profile==1 &  $user_gender=="others"){
            $profile_img="boy1.png";
        }elseif($profile==2 &  $user_gender=="others"){
            $profile_img="boy2.jpg";
        }

        if($username_error ==""& $pass_error==""&  $email_error==""){
            $sql2="INSERT INTO users(username,profiles,password,email,country,gender,Date)VALUES
            (' $username','$profile_img','$user_pass','$user_email','$user_country',' $user_gender',now())";
            $select_db=mysqli_query($con,$sql2);

            if($select_db){
                echo"<script>alert('Congratulation $username, your account has been succesfully created')</script>";
                echo"<script>window.open('sighup.php','_self')</script>";
            }else{
                echo"<script>alert('Register failed, try again')</script>";
            }
        }
    }
?>