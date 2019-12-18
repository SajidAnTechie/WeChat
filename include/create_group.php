<?php
     

      if(isset($_POST["create_group"])){
          $group_name=$_POST["group_name"];
          $group_code=$_POST["group_code"];
          $block_code=$_POST["block_code"];

           $sql="SELECT * FROM users_group WHERE group_name='$group_name' OR group_code='$group_code'";
           $run=mysqli_query($con,$sql);
           $select=mysqli_num_rows($run);

           if($group_name =="" || $group_code ==""){
            echo"<script>alert('Invalid Name or Code. Please try again')</script>";
            echo"<script>window.open('home.php','_self')</script>";
           }

           if(strlen($group_name) <5) {
            echo"<script>alert('Group lenght must be greater than 5 character.')</script>";
            echo"<script>window.open('home.php','_self')</script>";
           }
           if(strlen($group_code) <4){
            echo"<script>alert('Group lenght must be greater than 4 character.')</script>";
            echo"<script>window.open('home.php','_self')</script>";
           }

           if($select ==1){
               echo"<script>alert('Group name or codes alredy exist. Please use another name or codes')</script>";
               echo"<script>window.open('home.php','_self')</script>";
           }else{
                
            $user=$_SESSION["email"];
            $sql2="SELECT * FROM users WHERE email='$user'";
            $select_db=mysqli_query($con,$sql2);
      
            $row=mysqli_fetch_array($select_db);
            $user_session=$row["username"];
            $user_email=$row["email"];
            $user_profile=$row["profiles"];

                //$update_into_users_table=mysqli_query($con,"UPDATE users SET group_name='$group_name' AND group_code='$group_code' WHERE email='$user_email'");
                 $update_into_users_table="UPDATE users SET group_name='$group_name', group_code='$group_code' WHERE email='$user_email'";
                 $create_in_users_table=mysqli_query($con,$update_into_users_table);

                $inert_into_users_group="INSERT INTO users_group(group_name,group_code,block_code,group_admin,admin_email,profile_pic,date)VALUES('$group_name','$group_code','$block_code','$user_session','$user_email','$user_profile',now())";
                $create_group=mysqli_query($con,$inert_into_users_group);

               if($create_group & $create_in_users_table){
                echo"<script>alert('Congratulation $user_session , group is successfully created.Click Ok to start chatting with your friends')</script>";
                echo"<script>window.open('mychat.php?username=$user_session & group_name=$group_name','_self')</script>";
               }else{
                echo"<script>alert('Creating Group failed')</script>";
                echo"<script>window.open('home.php','_self')</script>";
               }
           }

      }
?>