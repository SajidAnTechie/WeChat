<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    

<?php
 session_start();
 include("connection.php");
if(!($_SESSION["email"])){
    header("location:index.php");
}
if(isset($_POST["group_name"])){
    $group_name=$_POST["group_name"];
}
?>

<?php
                $sql4="SELECT * FROM users WHERE group_name='$group_name'";
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
                                '<span id="userstaus">';
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
                                </span>';
                        '
                        </div>

                </li>';

            } 
            }else{
                echo'<div class="no-users-found"><p>No Users</p></div>';
            }



?>
<script>
    $(ducument).ready(function(){
            alert("heelo");
    });
 var cacheData;
 var data=$('#userstaus').html();
 var auto_refresh = setInterval(() =>{
    $.ajax({
            url: 'getusers.php',
            type:'POST',
            data:data,
            dataType:'html',
            success:function(data){
                if(data != cacheData){
                    cacheData = data;
                    $('#userstaus').html(data);
                }
            }

    });
 },300)    
</script>
</body>
</html>