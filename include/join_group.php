<?php
        $user=$_SESSION["email"];
        $sql2="SELECT * FROM users WHERE email='$user'";
        $select_db=mysqli_query($con,$sql2);
  
        $row=mysqli_fetch_array($select_db);
        $user_session=$row["username"];
        $user_email=$row["email"];
        $user_group_name=$row["group_name"];
        $user_group_code=$row["group_code"];

        if(isset($_POST["join_group"])){
            $join_group_code=htmlspecialchars($_POST["join_group_code"]);

            $sql="SELECT * FROM users_group WHERE group_code='$join_group_code'";
            $run=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($run);
            $join_group_name=$row["group_name"];
            $check=mysqli_num_rows($run);

            if($join_group_code ==""){
                echo"<script>alert('Invalid Name or Code. Please try again')</script>";
                echo"<script>window.open('home.php','_self')</script>";
            }
            if($check==1){
                $sql6="SELECT * FROM blocklist WHERE email='$user_email' AND group_code='$join_group_code'";
                $run_db=mysqli_query($con,$sql6);
                $count=mysqli_num_rows($run_db);
                if($count==1){
                    echo"<script>window.open('blacklist_users.php?username=$user_session & group_name=$join_group_name','_self')</script>";
                    
                }elseif($user_group_code==$join_group_code){

                    echo"<script>window.open('mychat.php?username=$user_session & group_name=$join_group_name','_self')</script>";
                }else{
                    $update_join_group_column="UPDATE users SET group_name='$join_group_name',group_code='$join_group_code' WHERE email='$user_email'";
                    $run_join=mysqli_query($con,$update_join_group_column);

                    if($run_join){
                        echo"<script>window.open('mychat.php?username=$user_session & group_name=$join_group_name','_self')</script>";
                    }else{
                        echo"<script>alert('Join Group Action Failed. Please try again')</script>";
                    }
                }
            }else{
                echo"<script>alert('Sorry Group Not found. Please try again')</script>";
            }
        }
?>