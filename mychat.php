<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>My Chat Home Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css" >
  <link href="css/mychat.css" rel="stylesheet">
  <link href="css/sidebar.css" rel="stylesheet">
  <link href="css/getusers.css" rel="stylesheet">
</head>

<body>
<?php
session_start();
 include("include/connection.php");
if(!($_SESSION["email"])){
    header("location:index.php");
}
if(isset($_GET["group_name"])){
    $groupname=$_GET["group_name"];
}
?>

        <div class="main-section">
              <div class="row">
                  <div class="col-sm-3 col-md-3 col-xs-12 for-scroll" id="for-leftbar-background">
                    <div class="left-sidebar">
                        <div class="input-group md-form form-sm form-1 pl-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
                                    aria-hidden="true"></i></span>
                                </div>
                                <input class="form-control my-0 py-1" id="search" type="text" name="search" placeholder="Search" aria-label="Search">
                        </div>
                        <div class="left-chat">
                            <ul id="getusers"> 
                                <!-- <?php include("include/getusers.php");?> -->
                            </ul>
                             
                        </div>
                    </div>  
                  </div>
                  <!-- for-chat-box -->

                    <div class="col-sm-9  col-md-9 col-xs-12" id="right-header-back">
                        <div class="right-sidebar">
                            <div class="right-header-back">
                                <div class="row">
                                    <!-- getting users data who is logged in -->
                                    <?php
                                        $user_name=""; $user_id="";
                                        $user_email=$_SESSION["email"];
                                        $sql="SELECT * FROM users WHERE email='$user_email'";
                                        $run_selected=mysqli_query($con, $sql);
                                        $row= mysqli_fetch_array($run_selected);

                                        $user_name=$row["username"];
                                        $user_id=$row["id"];
                                    ?>
                                    <!-- getting user data on which login_user click in -->
                                    <?php
                                         $username=""; $get_username ="";
                                        if(isset($_GET["username"])){
                                            
                                                global $con;
                                           
                                                $get_username = $_GET["username"];
                                                //$group_name = $_GET["users_group"];
                                                $sql1="SELECT * FROM users WHERE username='$get_username'";
                                                $run_query=mysqli_query($con,$sql1);
                                                $row_user=mysqli_fetch_array($run_query);
      
                                                $username=$row_user["username"];
                                                $user_profile=$row_user["profiles"];
                                                $user_status=$row_user["users_status"];
                                                
                             
                                        }
                                        $total_massage="SELECT * FROM users_chat WHERE (sender_username='$user_name' AND receiver_username='$username' AND group_name='$groupname') OR (receiver_username='$user_name' AND sender_username='$username'AND group_name='$groupname')";
                                        $run_massages=mysqli_query($con,$total_massage);
                                        $total=mysqli_num_rows($run_massages);
                                    ?>
                                                <div class="col-sm-12">
                                                        <div class="for-flex">
                                                                <div class="right-header-img">
                                                                        <img id="profile_img" src="img/<?php echo $user_profile?>" alt="">
                                                                        <div class="right-header-detail">
                                                                        <p id="user_active_chat"><?php echo $get_username ?></p>
                                                                        <span id="total_massage"><?php echo $total ?> massages
                                                                            <i class="fas fa-angle-right"></i>
                                                                            <?php
                                                                            if($user_status=="online"){
                                                                                echo'<span id="for-online">'.$user_status.'</span>';
                                                                            }else{
                                                                                echo'<span id="for-offlie">'.$user_status.'</span>';
                                                                            }
                                                                               
                                                                            ?>
                                                                           
                                                                        </span>
                                                                        </div>
                                                                </div>
                                                                
                                                                    <div class="sidebar">
                                                                        <?php include("include/sidebar.php");?>
                                                                    </div>
                                                            </div>
                                             </div>       
                                     </div>
                            </div>
                                    <!-- massage_chat_box -->
                                    <div class="row">
                                          <div class="col-sm-12 right-header-content-chat" id="scrolling_to_bottom">
                                              <?php
                                                    $sql3="UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name' AND group_name='$groupname'";
                                                    $run_msg_status=mysqli_query($con,$sql3);
                                                ?>
                                                <ul id="massage_fetch"></ul>    
                                          </div>
                                    </div>
                                     <!--end of massage_chat_box -->
                                    <div class="row" >
                                            <div class="col-md-12 footer-background">
                                                    <div class="text-wrtteble_box">
                                                            <form action="" method="post">
                                                                <input autocomplete="off" id="massage-box" type="text" name="msg_content" placeholder="Write your massage......">
                                                                <button  id="send-btn" name="submit"><img src="img/telegram.png" id="telegram" alt=""></button>

                                                            </form>
                                                    </div>
                                            </div>
                                    </div>
                              </div>
                        </div>
                    </div>
              
        <?php
            if(isset($_POST["submit"])){
                $msg=htmlspecialchars($_POST["msg_content"]);

                if($msg==""){
                    echo"<div class='alert alert-danger'><strong><center>Massage was unable to send</center></strong></div>";
                }elseif(strlen($msg)>100){
                    echo"<div class='alert alert-danger'><strong><center>Massage is too long. Use only 100 charater</center></strong></div>";
                }else{
                    $inser_into_db="INSERT INTO users_chat(sender_username,receiver_username,msg_content,msg_status,msg_date,group_name)VALUES
                    ('$user_name','$username','$msg','unread',now(),'$groupname')";
                    $run_inserting_query=mysqli_query($con,$inser_into_db);
                    echo"<script>window.open('mychat.php?username=$username & group_name=$group_name','_self')</script>";
                }
              
            }
          ?>
          <?php
          if(isset($_GET["remove_user_id"])){
            $users_id=$_GET["remove_user_id"];

            

            $sql4="SELECT * FROM users WHERE id='$users_id'";
            $select_db=mysqli_query($con,$sql4);
           
            $row=mysqli_fetch_array($select_db);
            $user_block_username=$row["username"];
            $user_block_email=$row["email"];
            $user_block_group_name=$row["group_name"];
            $user_block_group_code=$row["group_code"];
            
            $sql5="INSERT INTO blocklist(username,email,group_name,group_code)VALUES('$user_block_username','$user_block_email','$user_block_group_name','$user_block_group_code')";
            $run_db=mysqli_query($con,$sql5);

            $sql="UPDATE users SET group_name='No',group_code='No' WHERE id='$users_id'";
            $run=mysqli_query($con,$sql);
            echo"<script>window.open('mychat.php?username=$username & group_name=$group_name','_self')</script>";
          }
      ?>

  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>

  <script type="text/javascript">
    var objDiv = document.getElementById("scrolling_to_bottom");
    objDiv.scrollTop = objDiv.scrollHeight;
  </script>

  <script>

$(document).ready(function(){

        var search =$('#search').val();
        var $groupname = "<?php echo $groupname ?>";
        var $user_name = "<?php echo $user_name ?>";
        var $username = "<?php echo $username ?>";

         //getuser_sidebar

        

            if(search!== null){

            $('#search').keyup(function(){
            var search =$(this).val();
                $.ajax({
                    url:"include/search.php",
                    method:"POST",
                    data:{search:search,group_name:$groupname},
                    dataType:"text",
                    success:function(data){
                        $('#getusers').html(data);
                    }
                });
            });  
        }


            if(search==''){
                var action = 'fetch_data';
                $.ajax({
                    url:"include/getusers.php",
                    method:"POST",
                    data:{action:action,group_name:$groupname},
                    success:function(data){
                        $('#getusers').html(data);
                    }
                });
            }
    
            

            //if(search==''){
            //setInterval(() => {
                //getusers();
                //}, 300);

            //}else{
                //if(search!==null){
                //setTimeout(function(){ getusers();  }, 300);
                //}
            //}

            //end of get users

            //massage_fetch

           function massage_fetch(){
            $.ajax({
                    url:"include/massage_fetch.php",
                    method:"POST",
                    data:{user_name:$user_name,username:$username,group_name:$groupname},
                    dataType:"text",
                    success:function(data){
                        $('#massage_fetch').html(data);
                    }
                });
           }
           
           
               
           setInterval(() => {
            massage_fetch();
           }, 50);         
});
    //$(window).load(function() {
        //var scroll= $('.right-header-content-chat');
        //scroll.animate({scrollTop: scroll.prop("scrollHeight")});
    //});
  
  </script>
</body>

</html>
