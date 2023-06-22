<?php
include 'db.php';
if (isset($_REQUEST['submit'])) {
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $dob = $_REQUEST['dob'];
  $phone = $_REQUEST['phone'];
  $district = $_REQUEST['district'];
  $thana = $_REQUEST['thana'];
  $address = $_REQUEST['address'];
  $gender = $_REQUEST['gender'];
  $picture =  basename($_FILES["image"]["name"]); 
  $tmpname = $_FILES['image'] ['tmp_name'];
  $uploc = 'images/'. $picture;
  $file =$_REQUEST['fineName'];
  $sign = $_FILES['sign']['name'];
  $tmpname = $_FILES['sign'] ['tmp_name'];
  $uploc = 'images/'. $sign;
  $check = $_REQUEST['check'];

  if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
    }
}

  $sql = "INSERT INTO basic_info(name, email, dob, phone, district, thana, address, gender, image, file_name, sign, terms) 
          VALUES ('$name', '$email','$dob','$phone','$district', '$thana', '$address', '$gender', '$picture', '$file', '$sign', '$check')";

  if (mysqli_query($con, $sql)) {
    header('location:datatable.php');
    move_uploaded_file($tmpname, $uploc);

    $app_id = mysqli_insert_id($con); // Get the auto-generated app_id from the basic_info table

  } else {
    echo "Error: " . mysqli_error($con);
  }
  
$institute = $_REQUEST['institute'];
$degree = $_REQUEST['degree'];
$year = $_REQUEST['year'];
$result = $_REQUEST['result'];

for ($i = 0; $i < count($institute); $i++) {

  $insertQuery = "INSERT INTO education_list (institute_name, degree, passing_year, result, app_id) VALUES ('{$institute[$i]}', '{$degree[$i]}', '{$year[$i]}', '{$result[$i]}',$app_id)";
  
  if (mysqli_query($con, $insertQuery)) {
    echo "<script>alert('New record inserted')</script>";
  } else {
    echo "Error: " . mysqli_error($con);
  }
}

}

mysqli_close($con);

?>