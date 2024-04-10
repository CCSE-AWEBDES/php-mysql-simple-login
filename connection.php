<?php
  /*Step 1: Database Connection*/
  $con = mysqli_connect('localhost:3306','root','rootroot');
  if(!$con){
    die(mysqli_error());
  }

  /*Step 2: Select a Database*/
  $db_select = mysqli_select_db($con, 'company');
  if(!$db_select){
    die(mysqli_error());
  }
?>