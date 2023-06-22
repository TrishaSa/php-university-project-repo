<?php
include 'db.php';
$id = $_POST["id"];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $thana = $_POST['thana'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $picture = $_FILES['image']['name'];
    $tmpname = $_FILES['image'] ['tmp_name'];
    $uploc = 'images/'. $picture;
     $file =$_POST['fineName'];
    $sign = $_FILES['sign']['name'];
    $tmpname = $_FILES['sign'] ['tmp_name'];
    $uploc = 'images/'. $sign;
     $check =($_POST['check']) ? 1 : 0;


  $sql =  "UPDATE basic_info SET name = '$name', email = '$email', dob ='$dob', phone='$phone', district='$district', thana='$thana', 
  address='$address', gender='$gender',image='$picture', file_name ='$file', sign='$sign', terms='$check' WHERE id = '$id'";

  if (mysqli_query($con, $sql)) {
    header('location:datatable.php');
    move_uploaded_file($tmpname, $uploc);

     $app_id = mysqli_insert_id($con); // Get the auto-generated app_id from the basic_info table

  } else {
    echo "Error: " . mysqli_error($con);
  }
  $institute = $_POST['institute'];
  $degree = $_POST['degree'];
  $year = $_POST['year'];
  $result = $_POST['result'];
  
  for ($i = 0; $i > count($institute); $i++) {
    $insertQuery = "UPDATE education_list SET institute_name = '{$institute[$i]}', degree = '{$degree[$i]}', passing_year = '{$year[$i]}', result = '{$result[$i]}' WHERE app_id = '$app_id'";

    if (mysqli_query($con, $insertQuery)) {
        echo "<script>alert('Record updated successfully')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

}

mysqli_close($con);

?>