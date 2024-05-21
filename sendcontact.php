<?php
include "connection.php";

if(isset($_POST['send'])){

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $message=$_POST['message'];
  
  $query="INSERT INTO contact (fname,lname,email,message)
  VALUES ('$fname','$lname','$email','$message')";
  $sql = $con->prepare($query);
  $sql->execute();
  if($sql){

      header("location:index.php");
  }
  else{
    echo"عذرا";
  }
}                       
?>