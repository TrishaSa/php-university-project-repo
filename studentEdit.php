<?php
include_once("db.php");
$id = $_GET['id'];
$query = "SELECT * FROM basic_info WHERE id = '$id'"; 
$result = mysqli_query($con, $query);
$student = mysqli_fetch_assoc($result);

$query = "SELECT * FROM district"; 
$result = mysqli_query($con, $query);


$district = $student['district']; 
$query1 = "SELECT * FROM thana WHERE district_id = '$district'"; 
$result1 = mysqli_query($con, $query1);

$query3 = "SELECT * FROM education_list WHERE app_id = '$id'"; 
$result3 = mysqli_query($con, $query3);
?>
  <style>
    /* Add your custom styles here */
    .error {
      color: red;
    }
  </style>
<!DOCTYPE html>
<html>
    <head>
        <title>Demo</title>
        <meta charset="utf-8">
        <!-- step js css link -->
        <link href="jquery.steps.css" rel="stylesheet">
        <!-- bootstarp css link  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
          <!--extra css link -->
        <link rel="stylesheet" href="style.css">
           <!--phone link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
         <!--Font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
     <header >
     <?php
include_once("nav.php");
?>
    </header> 

    <div class="container mt-5">
  <div class="panel">
    <div class="panel-body wizard-content">
    <form id="example-form"  action="editdb.php" method="post" enctype="multipart/form-data"  class="tab-wizard wizard-circle wizard clearfix">
    <h6>Account</h6>
  
 <section class="container form_1 data_info">
        <div>
       
            <div class="row g-3 mt-3">
                <div class="col-md-5">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" id="inputName" value="<?php echo $student['name']; ?>">
                  </div>
                <div class="col-md-5">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4"  placeholder="Email" value="<?php echo $student['email']; ?>">
                </div>
                <div class="col-md-5">
                    <label for="inputDob" class="form-label">Dob</label>
                    <input type="date" class="form-control" name="dob" id="inputAddress" value="<?php echo $student['dob']; ?>" >
                </div>
                <div class="col-md-5">
                  <label for="inputPhone" class="form-label">Phone</label>
                  <br>
                  <input type="tet" class="form-control" id="inputPhone" name="phone" value="<?php echo $student['phone']; ?>">
                </div>
                <div class="form-group col-md-5">
    <label for="exampleFormControlSelect1">District :</label>
    <select class="form-control" id="district" name="district">
        <option value="">Select District</option>
        <?php 
        if (mysqli_num_rows($result) > 0) { 
            while ($row = mysqli_fetch_assoc($result)) {  
                $selected = ($row['district_id'] == $student['district']) ? 'selected' : '';
                echo '<option value="' . $row['district_id'] . '" ' . $selected . '>' . $row['district_name'] . '</option>'; 
            } 
        } else { 
            echo '<option value="">District not available</option>'; 
        } 
        ?>
    </select> 
</div>

<div class="form-group col-md-5">
    <label for="thana">Thana:</label>
    <select class="form-control" id="thana" name="thana">
        <?php
        if (!empty($district_id)) {
            while ($row1 = mysqli_fetch_assoc($result1)) {  
                $selected = ($row1['thana_id'] == $student['thana']) ? 'selected' : ''; 
                echo '<option value="'.$row1['thana_id'].'" '.$selected.'>'.$row1['thana_name'].'</option>'; 
            }
        } else {
            echo '<option value="">Select district first</option>';
        }
        ?>
    </select>
</div>
                <div class="col-md-5">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea id="inputAddress" class="form-control" name="address"><?php echo $student['address']; ?></textarea> 
                </div>
                  <div class=" col-md-5">
                    <div class="form-check-inline"  style="margin-top: 30px;">
                     <label class="form-check-label" for="gender">Gender :</label>
                    </div>
                    <div class="form-check-inline">
                       <input class="form-check-input" type="radio" id="inlineRadio1" value="Male" name="gender"
                        <?php
                      if ($student['gender'] == 'Male') {
                           echo 'checked';
                            }
                           ?>>
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2" value="Female" name="gender"
                      <?php
                      if ($student['gender'] == 'Female') {
                           echo 'checked';
                            }
                           ?>>
                      <label class="form-check-label" for="inlineRadio3">Female</label>
                    </div>
                    <div class="form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2" value="Other" name="gender"
                      <?php
                      if ($student['gender'] == 'Other') {
                           echo 'checked';
                            }
                           ?>>
                      <label class="form-check-label" for="inlineRadio2">Other</label>
                    </div>
                    <div>
                        <label for="gender" class="error"></label>
                      </div>
                  </div>
                  <div class="col-md-5">
                    <label for="exampleFormControlFile1" >Profile picture :</label>
                     <input type="file" id="exampleFormControlFile1" class="form-control-file" onchange="previewImage(event);" name="image">
                     <img id="previewImg" style="height:150px"; width="150px" src="http://localhost/PHP_PRAC/scl%20project/images/<?php echo $student['image']; ?>">
                    </div>
                    <div>
                      <input type="hidden" name="id" value="<?php echo $student['id']; ?>" >
                    </div>
                </div>
         </div>
    </section>
    <h6>Profile</h6>
    
    <section class="container form_2 data_info py-2"> 
    <div>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th scope="col">Institute Name</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Passing Year</th>
                    <th scope="col">Result</th>
                    <th scope="col">
                        <div class="action_container">
                            <button type="button" class="btn btn-success" onclick="create_tr('table_body')"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody id="table_body">
    <?php
    if (mysqli_num_rows($result3) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_assoc($result3)) {
            $count++;
    ?>
            <tr>
                <td><input type="text" class="form-control" name="institute[]" value="<?php echo $row['Institute_name']; ?>"></td>
                <td><input type="text" class="form-control" name="degree[]" value="<?php echo $row['degree']; ?>"></td>
                <td><input type="text" class="form-control" name="year[]" value="<?php echo $row['passing_year']; ?>"></td>
                <td><input type="text" class="form-control" name="result[]" value="<?php echo $row['result']; ?>"></td>
                <td>
                    <?php if ($count > 1) { ?>
                        <button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa-solid fa-minus"></i></button>
                    <?php } ?>
                </td>
            </tr>
    <?php
        }
    }
    else {
      ?>
      <tr>
          <td><input type="text" class="form-control" name="institute[]"></td>
          <td><input type="text" class="form-control" name="degree[]"></td>
          <td><input type="text" class="form-control" name="year[]"></td>
          <td><input type="text" class="form-control" name="result[]"></td>
          <td></td>
      </tr>
      <?php
  }
    ?>
</tbody>
        </table>
    </div>
</section>
    <h6>Warning</h6>
    <section class="container form_3 data_info py-2"> 
       <div class="mt-5">
        <h5> Declaretion</h5>
        <form class="decleration mt-3 mx-5">
            <div class="row mb-3">
              <label for="inputFile" class="col-sm-2 col-form-label">File Name</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputFile" name="fineName" value="<?php echo $student['file_name']; ?>">
              </div>
            </div>
            <div class="col-md-5">
                    <label for="exampleFormControlFile1" >Sign:</label>
                     <input type="file" id="exampleFormControlFile1" class="form-control-file" onchange="previewSign(event);" name="sign" value="<?php echo $student['sign']; ?>" >
                     <img id="previewSn" style="height:150px"; width="150px" src="http://localhost/PHP_PRAC/scl%20project/images/<?php echo $student['sign']; ?>">
                    </div>
                </div>
                <div class="row mb-3 ms-1">
    <div class="col-sm-5 form-check">
        <?php
        $terms = $student['terms'];
        $isChecked = ($terms == 1) ? 'checked' : '';
        ?>
        <label class="form-check-label" for="gridCheck">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="check" <?php echo $isChecked; ?>>
            I do hereby declare that the information given above is true.
        </label>
    </div>
</div>
              <div>
              <button type="submit" name="submit" class="btn btn-primary btn_submit">Submit</button>
              </div>
          </form>
       </div>
    </section>
 
    
</form>
      </div>
  </div>
</div>
         <!-- step js link -->
        <script src="jquery-1.9.1.min.js"></script>
        <script src="jquery.steps.js"></script>
      
        <!-- bootstarp link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     
        <!-- validation link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>             
        <!-- phone code link -->
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
        
       <script>
        // var form = $("#example-form");
        //    form.steps({
        //     headerTag: "h6",
        //     bodyTag: "section",
        //     transitionEffect: "fade",
        //     titleTemplate: '<span class="step">#index#</span> #title#'
            
        //   });
        
        var form = $("#example-form");
form.steps({
  headerTag: "h6",
  bodyTag: "section",
  transitionEffect: "fade",
  titleTemplate: '<span class="step">#index#</span> #title#',
  onStepChanging: function(event, currentIndex, newIndex) {
    // Validate the current step before proceeding
    return form.valid();
  },
  onFinishing: function(event, currentIndex) {
    // Validate the final step before submitting
    return form.valid();
  },
  onFinished: function(event, currentIndex) {
    // Handle the form submission
    form.submit();
  }
});

// $(document).ready(function() {
//   $.validator.addMethod("phone", function(value, element) {
//     return this.optional(element) || /(^([+]{1}[8]{2}|0088)?(01){1}[3-9]{1}\d{8})$/.test(value);
//   }, "Please enter a valid phone number");

//   $('#example-form').validate({
//     rules: {
//       name: {
//         required: true
//       },
//       email: {
//         required: true,
//         email: true
//       },
//       gender: {
//         required: true
//       },
//       phone: {
//         required: true,
//         phone: true
//       }
//       // Add more validation rules for other fields if needed
//     },
//     // Add custom messages if required
//     messages: {
//       name: {
//         required: 'Please enter your name'
//       },
//       email: {
//         required: 'Please enter your email',
//         email: 'Please enter a valid email address'
//       },
//       gender: {
//         required: "Please enter your gender"
//       },
//       phone: {
//         required: "Please enter your phone number"
//       }
//     },
//     // Add any other options or callbacks if needed
//   });
// });

       </script>

       <!-- district & thana -->
<script>
  $(document).ready(function(){
    $('#district').on('change', function(){
      var districtID = $(this).val();
      if (districtID) {
        $.ajax({
          type: 'POST',
          url: 'ajaxData.php',
          data: {
            district_id: districtID
          },
          success: function(html){
            $('#thana').html(html);     
          }
        }); 
      } else {
        $('#thana').html('<option value="">Select district first</option>');
      }
    }).trigger('change'); // Trigger change event on page load
  });
</script>

    
    <!-- photo upload -->
       <script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewImg').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- sign upload -->
<script>
    function previewSign(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewSn').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- telephone code -->
<script>
  var input = document.querySelector("#inputPhone");
  window.intlTelInput(input, {
    hiddenInput: "inputPhone",
            initialCountry: "BD",
            placeholderNumberType: "MOBILE",
            separateDialCode: true
  });
</script>


<!-- multiple row -->
<script>
 function create_tr(table_id) {
        let tableBody = document.getElementById(table_id);
        let firstRow = tableBody.querySelector('tr');
        let newRow = firstRow.cloneNode(true);
        // Reset the values of cloned input fields
        let inputs = newRow.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
        });

        tableBody.appendChild(newRow);

        newRow.lastElementChild.innerHTML = `<button type="button" class="btn btn-danger" onclick="removeRow(this)"><i class="fa-solid fa-minus"></i></button>`;
    }

    function removeRow(btn) {
        let row = btn.closest('tr');
        let tableBody = row.parentNode;
        tableBody.removeChild(row);
    }
</script>

<!-- validation -->
<script>
  
    
</script>
    </body>
</html>
