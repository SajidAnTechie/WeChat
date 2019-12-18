<?php
 session_start();
 include("connection.php");
if(!($_SESSION["email"])){
    header("location:index.php");
}
if(isset($_POST["group_name"])){
    $group_name=$_POST["group_name"];
}
if(isset($_POST["search"])){
    $searchval=$_POST["search"];
}
?>

<?php

                $sql4="SELECT * FROM users WHERE username LIKE '%$searchval%' AND group_name='$group_name'";
                $run_qury=mysqli_query($con,$sql4);
                $total_users=mysqli_num_rows($run_qury);

            if($total_users>0){
                while($row=mysqli_fetch_array($run_qury)){
                    $user_id=$row["id"];
                    $user_clickname=$row["username"];
                    $user_profile=$row["profiles"];
                    $user_stat=$row["users_status"];
                    $user_group=$row["group_name"];

                    
                
                echo'<li>
                        <div class="chat-left-img">
                            <img id="profile_img-left" src="img/'.$user_profile.'">
                        </div>
                        <div class="chat-left-details">
                            <p id="user-name"><a href="mychat.php?username='.$user_clickname.' & group_name='.$user_group.'">'.$user_clickname.'</a></p>';
                            
                                if($user_stat=="online"){
                                    echo'
                                        <span><i id="for-online"  class="fa fa-circle" aria-hiiden="true"></i>Online</span>
                                    ';
                                }else{
                                    echo'
                                        <span><i id="for-offline" class="fas fa-circle"></i>Offline</span>
                                    ';
                                }
                        '
                        </div>

                </li>';

            } 
            }else{
                echo'<div class="no-users-found"><p>Oops ! user not found</p></div>';
            }



?>