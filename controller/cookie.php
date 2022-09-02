<?php

include_once 'config.php';

   $user_check = $_COOKIE['email'];

   $ses_sql = mysqli_query($con,"SELECT * FROM auth WHERE email = '$user_check' ");
  
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   
if(!isset($_COOKIE['email'])){

     header("location:  ./index.php");

     die();

  }

?>