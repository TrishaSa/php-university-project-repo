<?php
include_once("db.php");
$student_id = $_GET['id'];
$query = "SELECT * FROM basic_info WHERE id = '$student_id'"; 
$result = mysqli_query($con, $query);
$student = mysqli_fetch_assoc($result);

$query1 = "SELECT basic_info.*, district.district_name
FROM basic_info
LEFT JOIN district ON basic_info.district = district.district_id where basic_info.id = '$student_id'";
$result1 = mysqli_query($con, $query1);
$district = mysqli_fetch_assoc($result1);

$query2 = "SELECT basic_info.*, thana.thana_name
FROM basic_info
LEFT JOIN thana ON basic_info.thana = thana.thana_id where basic_info.id = '$student_id'";
$result2 = mysqli_query($con, $query2);
$thana = mysqli_fetch_assoc($result2);

$query3 = "SELECT * FROM education_list WHERE app_id = '$student_id'"; 
$row = mysqli_query($con, $query3);
// $education = mysqli_fetch_assoc($row);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Demo</title>
        <meta charset="utf-8">
        <!-- Bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Font Awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            .panel{
                margin-top: 170px;
            }
        </style>
    </head>
    <body>
    <header >
    <?php
include_once("nav.php");
?>
    </header>
    <div class="container">
    <div class="panel">
        <div class="panel-body wizard-content">
            <div class="card" style="margin-top: 80px;">
                <h5 class="card-header text-white" style="background-color: #0d437cbd;">
                    Basic Information
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="v_label">Name</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-success label_tracking_no"><?php echo $student['name']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Email</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $student['email']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Dob</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $student['dob']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Phone</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $student['phone']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">District</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo  $district['district_name'];; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Thana</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $thana['thana_name']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Address</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $student['address']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Gender</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><?php echo $student['gender']; ?></span>
                        </div>
                        <div class="row mt-2">
                        <div class="col-md-3">
                            <span class="v_label">Profile Photo</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><img src="http://localhost/PHP_PRAC/scl%20project/images/<?php echo $student['image']; ?>" style="height:150px"; width="150px"></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-5">
                <h5 class="card-header text-white" style="background-color: #0d437cbd;">
                    Educational Information
                </h5>
                <section class="container form_2 data_info py-2"> 
       <div>
          <table class="table table-bordered mt-3">
          <thead>
            <tr>
                <th>Institute Name</th>
                <th>Degree</th>
                <th>Passing Year</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($education = mysqli_fetch_assoc($row)) {
                ?>
                <tr>
                    <td><?php echo $education['Institute_name']; ?></td>
                    <td><?php echo $education['degree']; ?></td>
                    <td><?php echo $education['passing_year']; ?></td>
                    <td><?php echo $education['result']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
            </table>
        </div>
    </section>
            </div>
            <div class="card my-5">
                <h5 class="card-header text-white" style="background-color: #0d437cbd;">
               Declaration
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="v_label">File Name</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label label-success label_tracking_no"><?php echo $student['file_name']; ?></span>
                        </div>
                        <div class="col-md-3">
                            <span class="v_label">Sign</span>
                        </div>
                        <div class="col-md-3">
                            <span class="label"><img src="http://localhost/PHP_PRAC/scl%20project/images/<?php echo $student['sign']; ?>" style="height:150px"; width="150px"></span>
                        </div>
                        <div class="col-sm-5 form-check">
    <?php
    $terms = $student['terms'];
    $isChecked = ($terms == 1) ? 'checked' : '';
    ?>
    <label class="form-check-label" for="gridCheck">
        <input class="form-check-input" type="checkbox" id="gridCheck" name="terms" <?php echo $isChecked; ?> disabled>
        I do hereby declare that the information given above is true.
    </label>
</div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



        <!-- Bootstrap JS link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
