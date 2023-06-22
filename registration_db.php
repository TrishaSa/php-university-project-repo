<?php
include 'db.php';
if (isset($_REQUEST['submit'])) {
  $name = $_REQUEST['user_name'];
  $email = $_REQUEST['user_email'];
  $password = $_REQUEST['user_pass'];
  $password_again = $_REQUEST['user_pass2'];

  $md5_user_password = md5($password);

  $checkEmailQuery = "SELECT * FROM registration WHERE email = '$email'";
  $checkEmailResult = mysqli_query($con, $checkEmailQuery);

  if (mysqli_num_rows($checkEmailResult) > 0) {
    echo "Email address already exists";
  } else {
    $sql = "INSERT INTO registration(name, email, password) 
            VALUES ('$name', '$email', '$md5_user_password')";

    if (mysqli_query($con, $sql)) {
      header('location:login.php?userCreated');
    } else {
      echo "An error occurred while registering";
    }
  }
}
mysqli_close($con);

?>