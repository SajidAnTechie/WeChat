     <!--Navbar -->
     <nav class="mb-1 navbar navbar-expand-lg navbar-dark second_color lighten-1">
  <a class="navbar-brand" id="nav_bar" href="#">Wechat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link" href="#">Help</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img src="img/<?php echo $user_profile?>"  id="profile_img" class="rounded-circle z-depth-0"
            alt="avatar image">
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
          aria-labelledby="navbarDropdownMenuLink-55">
          <a class="dropdown-item" href="profile.php">Profile</a>
              <a  class="dropdown-item" href="home.php?email=<?php echo $user_email?>">
              Logout</a>
          <?php
                if(isset($_GET["email"])){
                    $email=$_GET["email"];
                    $sql2="UPDATE users SET users_status='offline' WHERE email='$email'";
                    $run_status_qury=mysqli_query($con,$sql2);
                    header("location:logout.php");
                    exit();
                    }
        ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->