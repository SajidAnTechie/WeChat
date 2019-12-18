<?php
session_start();
 include("connection.php");
if(!($_SESSION["email"])){
    header("location:index.php");
}
if(isset($_POST["user_name"])){
    $user_name=$_POST["user_name"];
}
if(isset($_POST["username"])){
    $username=$_POST["username"];
}
if(isset($_POST["group_name"])){
    $group_name=$_POST["group_name"];
}
?>
<?php
                                                    $sel_msg="SELECT * FROM users_chat WHERE (sender_username='$user_name' AND receiver_username='$username' AND group_name='$group_name') OR (receiver_username='$user_name' AND sender_username='$username'AND group_name='$group_name') ORDER BY 1 ASC";
                                                    $run_msg=mysqli_query($con,$sel_msg);

                                                    while($row=mysqli_fetch_array($run_msg)){
                                                        $sender_username=$row["sender_username"];
                                                        $receiver_username=$row["receiver_username"];
                                                        $msg_content=$row["msg_content"];
                                                        $msg_date=$row["msg_date"];
                                                    
                                                        
                                                            
                                                                if($user_name ==$sender_username & $username== $receiver_username){
                                                                    echo"
                                                                        <li id='right_chat'>
                                                                            <div class='rightside-right-chat'>
                                                                                <span id='right_chat_info'><font color=#8f8f8f>$user_name</font> -<small>$msg_date</small></span>
                                                                                <p id='right_chat_content'>$msg_content</p>
                                                                            </div>
                                                                        </li>
                                                                    ";
                                                                }else{
                                                                    if($user_name ==$receiver_username & $username== $sender_username){
                                                                        echo"
                                                                            <li id='left_chat'>
                                                                                <div class='rightside-left-chat'>
                                                                                    <span id='left_chat_info'><font color=#8f8f8f>$username</font>-<small>$msg_date</small></span>
                                                                                    <p id='left_chat_content'>$msg_content</p>
                                                                                </div>
                                                                            </li>
                                                                        ";
                                                                    }
                                                                }
                                                              } 
?>                                                  
