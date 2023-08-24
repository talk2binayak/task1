<?php
   session_start();
   $myusername = $_SESSION['login_user'];
   if(!isset($_SESSION['login_user'])){
      header("location:login.php?status=expired");
      die();
   }
?>