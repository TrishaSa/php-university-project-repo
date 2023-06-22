<?php
session_start();
include 'db.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $md5_user_password = md5($password);

  $sql = "SELECT * FROM registration WHERE email='$email' AND password='$md5_user_password'";
  $query = mysqli_query($con, $sql);
  if (mysqli_num_rows($query) > 0) { 
    $data = mysqli_fetch_array($query);
    $user_name = $data['name'];
    $_SESSION['name'] =  $user_name;
    header('location:datatable.php');
  } 
  else{
    echo" not match";
  }
}
?>


