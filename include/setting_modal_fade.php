<!-- Modal -->
<div class="modal fade" id="forgottenpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <strong>What is your school best frend name ?</strong>
            <textarea name="content" class="form-control" id="text-area" cols="83" rows="4" placeholder="Someone"></textarea>
            <input type="submit" name="update" class="btn btn-primary" placeholder="Submit"></br></br>
            <pre>Answer the above question we will ask you this question if you forgot your <font color=blue>Password</font></pre>
        </form>
        <?php
            if(isset($_POST["update"])){
                $text_content=htmlspecialchars($_POST["content"]);
                if($text_content ==""){
                    echo"<script>alert('Please write something')</script>";
                    echo"<script>window.open('setting.php?user_id=$user_id & group_name=$user_group_name','_self')</script>";
                }else{
                    $sql="UPDATE users SET bestfreindname='$text_content' WHERE email='$user_email'";
                    $run=mysqli_query($con,$sql);
                    if($run){
                        echo"<script>alert('Your bestfrend is added')</script>";
                        echo"<script>window.open('setting.php?user_id=$user_id & group_name=$user_group_name','_self')</script>";
                    }else{
                        echo"<script>alert('Error while updating information.')</script>";
                        echo"<script>window.open('setting.php?user_id=$user_id & group_name=$user_group_name','_self')</script>";
                    }
                }
            }
        
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
