<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>My Chat Home Page</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css" >
  <link href="css/home.css" rel="stylesheet">
  <link href="css/header.css" rel="stylesheet">
  <link href="css/footer.css" rel="stylesheet">
</head>

<body id="home">
<?php
session_start();
 include("include/connection.php");

 $user=$_SESSION["email"];
 $sql2="SELECT * FROM users WHERE email='$user'";
 $select_db=mysqli_query($con,$sql2);

 $row=mysqli_fetch_array($select_db);
 $user_session=$row["username"];
 $user_email=$row["email"];
 $user_profile=$row["profiles"];

if(!($_SESSION["email"])){
    header("location:index.php");
}

?>
<?php include("include/create_group.php");?>
<?php include("include/join_group.php");?>

<!-- header -->
<?php include("include/header_profile.php");?>


<!-- body section -->

<div class="body_background">
      <div class="body_flex">
              <div class="one_side_flex">
                  <div class="headers_and_paragraph">
                    <h3>Create-Group / Join-Group</h3>
                      <p>start chatt with your freinds and share feelings,enjoy <br/>unlimited memorable experiences !</p>
                  </div>
                  
                  <div class="button">
                      
                        <div id="fade_bottom"><a href="" class="btn-rounded waves-effect" data-toggle="modal" data-target="#darkModalForm">Create group</a></div>
                        <div id="fade_bottom"><a href="" class="btn-rounded waves-effect" data-toggle="modal" data-target="#darkModalFormforjoingroup">Join group</a></div>
                      
                    </div>
              </div>
                <div class="social_site_img">
                  <img src="img/social_site.png" id="social_img" class="img-responsive" alt="">
                </div>
      </div>
</div>


    <!-- coursal_sliderr -->
    <div class="container" id="corsoule">

        <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top" id="cousal_header">
  <div class="for_slider_header">
    <h3 id="header">Overview</h3>
  </div>
  <div class="pointer">
      <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
      <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
          class="fas fa-chevron-right"></i></a>
  </div>
</div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  <li data-target="#multi-item-example" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">
  <div class="row">
  <div class="col-md-4">
      <div class="card mb-2">
        <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg" data-size="1600x1067">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
          alt="Card image cap"></a>
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
  </div>
  

  </div>
  <!--/.First slide-->

  <!--Second slide-->
  <div class="carousel-item">
    <div class="row">
    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    </div>
  

  </div>
  <!--/.Second slide-->

  <!--Third slide-->
  <div class="carousel-item">
    <div class="row">
    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    </div>
    

  </div>
  <!--/.Third slide-->

</div>
<!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
    <!--end of coursal_sliderr -->
</div>

<?php include("include/footer.php");?>
<?php include("include/modal_fade.php");?>


  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
