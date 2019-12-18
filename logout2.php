<?php
//f(isset($_GET["user_n"])){
    //$username=$_GET["user_n"];
//}
session_start();
session_destroy();

header("location:index.php?change_pass=444");
exit;
?>