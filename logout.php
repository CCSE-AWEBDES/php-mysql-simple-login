<?php
    session_start();
    if(isset($_COOKIE['username'])){
      setcookie('username',$_COOKIE['username'],time() - 1000000); //Deleting a Cookie
      header('location: login.php');
    }else{
      header('location: login.php');
    }
?>
