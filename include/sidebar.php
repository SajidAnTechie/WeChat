
<div class="text-center">
  <a href="" class="btn-rounded" id="side-bar-btn" data-toggle="modal" data-target="#fullHeightModalRight"><i class="fas fa-info"></i>
  <span>Conversation Info</span>
</a>
</div>
<!-- Full Height Modal Right -->
<div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-right" role="document">
    <div class="modal-content" id="for-madal-background">
      <div class="modal-header" id="madal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Wechat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  id="cross" aria-hidden="true">&times;</span>
        </button>
      </div>
   
      <div class="modal-body">
            <?php
              $user=$_SESSION["email"];
              $sql2="SELECT * FROM users WHERE email='$user'";
              $select_db=mysqli_query($con,$sql2);
        
              $row=mysqli_fetch_array($select_db);
              $side_barusername=$row["username"];
              $user_email=$row["email"];
              $user_id=$row["id"];


              if(isset($_GET["group_name"])){
                $get_group_name=$_GET["group_name"];
              }
              $sql="SELECT * FROM users_group WHERE group_name='$get_group_name'";
              $run=mysqli_query($con,$sql);
              $row=mysqli_fetch_array($run);
              $admin_name=htmlspecialchars($row["group_admin"]);
              $admin_profile=htmlspecialchars($row["profile_pic"]);
              $admin_email=htmlspecialchars($row["admin_email"]);
              $group_name=htmlspecialchars($row["group_name"]);
              
              
             echo' <!-- admin section -->
               <div class="dropdown">
                  <div class="naming-for-admin">
                      <p id="admin">Group Admin</p>
                      <hr id="horizontal">
                  </div>
                  <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <div id="profiles-for-admin">
                        <img src="img/'.$admin_profile.'" id="profile"> 
                        <span>'.$admin_name.'</span></div>
                  </button>
                  <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item"   href="admin_profile.php?username='.$admin_name.' & group_name='.$group_name.'">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Delete</a>
                  </div>
            </div>
        
            <!--  end of admin section -->';

            ?>
         
                               <div class="naming-for-admin">
                                    <p id="admin">Participants</p>
                                    <hr id="horizontal"> 
                                </div>
          <?php
            $sql1="SELECT * fROM  users WHERE group_name='$get_group_name' AND email !='$admin_email'";
            $run1=mysqli_query($con,$sql1);
            $num_participants=mysqli_num_rows($run1);
            if($num_participants >0){
              while($row=mysqli_fetch_array($run1)){
                $users_name=htmlspecialchars($row["username"]);
                $users_profile=htmlspecialchars($row["profiles"]);
                $users_group=htmlspecialchars($row["group_name"]);
                $users_id=htmlspecialchars($row["id"]);

                if($user_email==$admin_email){
                  echo'

                          <!--  Participants section -->
                          <div class="dropdown">
                               
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                      <div id="profiles-for-admin">
                                      <img src="img/'.$users_profile.'" id="profile"> 
                                      <span>'.$users_name.'</span></div>
                                </button>
                                <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                      <a  href="users_profile.php?user_id='.$users_id.' & group_name='.$users_group.'" class="dropdown-item" >Profile</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="mychat.php?remove_user_id='.$users_id.' & username='.$admin_name.' & group_name='.$get_group_name.'">Remove from group</a>
                                </div>
                          </div>
                          <!--  end of  Participants section -->

                  ';
                }elseif($user_email !=$admin_email){
                 
                  echo'

                        <!--  Participants section -->
                        <div class="dropdown">
                              <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    <div id="profiles-for-admin">
                                    <img src="img/'.$users_profile.'" id="profile"> 
                                    <span>'.$users_name.'</span></div>
                              </button>
                              <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                                    <a  href="users_profile.php?user_id='.$users_id.' & group_name='.$users_group.'" class="dropdown-item" >Profile</a>
                              </div>
                        </div>
                        <!--  end of  Participants section -->

                  ';

                }

            }
               

            }else{
              echo"<div id='Check-for-no-users'>No Users</div>";
            }
          ?>
       
	</div>

  
        <!--  footer section -->
      <div class="modal-footer justify-content-center">
            <a href="setting.php?user_id=<?php echo $user_id?> & group_name=<?php echo $get_group_name?>">
            <button type="button" id="setting-button">Settings</button>
            </a> 
          <?php
            if($user_email !=$admin_email){
                echo'
                <form action="" method="post">
                <button type="submit" id="logout-button" name="leave_group">Leave group</button>
                </form> 
                ';
            }
            if(isset($_POST["leave_group"])){
              $sql3="UPDATE users SET group_name='No',group_code='No' WHERE email='$user_email'";
              $runquery=mysqli_query($con,$sql3);
              echo"<script>window.open('home.php?username=$side_barusername','_self')</script>";
            }
          ?>
            

          <form action="" method="post">
              <button type="submit" id="logout-button" name="logout">Logout</button>
          </form> 
          <?php
                if(isset($_POST["logout"])){
                    $sql2="UPDATE users SET users_status='offline' WHERE username='$user_name'";
                    $run_status_qury=mysqli_query($con,$sql2);
                    header("location:logout.php");
                    exit();
                    }
        ?> 


      </div>
    </div>
  </div>
</div>