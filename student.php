<?php
include_once("db.php");
$query = "SELECT * FROM district"; 
$result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <!--extra css link -->
    <link rel="stylesheet" href="style.css">
    <!--phone link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
     <!--Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">


  </head>
<body>
    <header >
        <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="student.php">Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
               
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <form action="student_db.php" method="post" id="form" enctype="multipart/form-data" >
    <div class="progress_list mt-5">
      <div class="header">
        <ul>
          <li class="active form_1_progessbar">
            <div>
              <p>1</p>
            </div>
          </li>
          <li class="form_2_progessbar">
            <div>
              <p>2</p>
            </div>
          </li>
          <li class="form_3_progessbar">
            <div>
              <p>3</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  <div class="form_wrap">
  <section class="container form_1 data_info">
        <div>
            <h5 class="pt-5">Basic Information</h5>
            <div class="row g-3 mt-3">
                <div class="col-md-5">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" id="inputName">
                  </div>
                <div class="col-md-5">
                  <label for="inputEmail4" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail4"  placeholder="Email">
                </div>
                <div class="col-md-5">
                    <label for="inputDob" class="form-label">Dob</label>
                    <input type="date" class="form-control" name="dob" id="inputAddress" >
                  </div>
                <div class="col-md-5">
                  <label for="inputPhone" class="form-label">Phone</label>
                  <br>
                  <input type="tet" class="form-control" id="inputPhone" name="phone">
                </div>
                  <div class="form-group col-md-5">
                    <label for="exampleFormControlSelect1">District :</label>
                    <select class="form-control" id="district" name="district">
                      <option value="">Select District</option>
                      <?php 
                   if($result->num_rows > 0){ 
                    while($row = $result->fetch_assoc()){  
                        echo '<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>'; 
                   } 
                  }else{ 
                    echo '<option value="">district not available</option>'; 
                 } 
                   ?>
                      </select> 
                    </div>
                    <div class="form-group col-md-5">
                      <label for="inputthana4">Thana :</label>
                      <select class="form-control" id="thana" name="thana">
                      <option value="">select district first</option>
                      </select>
                    </div>
                <div class="col-md-5">
                    <label for="inputAddress" class="form-label">Address</label>
                    <textarea id="inputAddress" class="form-control" name="address"></textarea> 
                </div>
                  <div class=" col-md-5">
                    <div class="form-check-inline"  style="margin-top: 30px;">
                     <label class="form-check-label" for="gender">Gender :</label>
                    </div>
                    <div class="form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio1" value="Male" name="gender">
                      <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2" value="Female" name="gender">
                      <label class="form-check-label" for="inlineRadio3">Female</label>
                    </div>
                    <div class="form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineRadio2" value="Other" name="gender">
                      <label class="form-check-label" for="inlineRadio2">Other</label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="exampleFormControlFile1" >Profile picture :</label>
                     <input type="file" id="exampleFormControlFile1" class="form-control-file" onchange="previewImage(event);" name="image">
                     <img id="previewImg" style="height:150px"; width="150px" src="">
                    </div>
                </div>
         </div>
    </section>

    <section class="container form_2 data_info py-2"> 
       <div>
              <h5>Educational Information</h5>
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
                <tr>
                  <td><input type="text" class="form-control" name="institute[]"></td>
                  <td><input type="text" class="form-control" name="degree[]"></td>
                  <td><input type="text" class="form-control" name="year[]"></td>
                  <td><input type="text" class="form-control" name="result[]"></td>
                  <td>
  
                  </td>
              </tr>
         
              </tbody>
            </table>
        </div>
    </section>

    <section class="container form_3 data_info py-2"> 
       <div class="mt-5">
        <h5> Declaretion</h5>
        <form class="decleration mt-3 mx-5">
            <div class="row mb-3">
              <label for="inputFile" class="col-sm-2 col-form-label">File Name</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="inputFile">
              </div>
            </div>
            <div class="row mb-3">
                <label for="exampleFormControlFile1" >Signature</label>
                <div class="col-sm-5">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="row mb-3 ms-1">
                <div class="col-sm-5 form-check">
                  <input class="form-check-input" class="col-sm-2 col-form-label" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck">
                    I do here by declare that the information given above is true.
                  </label>
                </div>
              </div>
          </form>
       </div>
    </section>

    <div class="btns_wrap container">
    <div class="cmn_btn form_1_btn">
      <button type="button" class="btn btn-primary btn_next">Next</button>
    </div>
    <div class="cmn_btn form_2_btn">
      <button type="button" class="btn btn-primary btn_previous">Previous</button>
      <button type="button" class="btn btn-primary btn_next mx-3">Next</button>
    </div>
    <div class="cmn_btn form_3_btn">
      <button type="button" class="btn btn-primary btn_previous">Previous</button>
      <button type="submit" name="submit" class="btn btn-primary btn_submit">Submit</button>
    </div>
  </div>
</div>
  </div>
  
  </form>


     <footer class="container-fluid footer mt-5">
      <div class="container text-center py-4">
        <p>Copyright © 2023 AIUB. All Rights Reserved.</p>
      </div>
  </footer>
     <!--bootstrap link -->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <!--phone link -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Font awesome link -->
    <script src="https://kit.fontawesome.com/2b14fa03a7.js" crossorigin="anonymous"></script>
     
    <!-- jquery validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  </body>

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
<script>
  var input = document.querySelector("#inputPhone");
  window.intlTelInput(input, {
    hiddenInput: "inputPhone",
            initialCountry: "BD",
            placeholderNumberType: "MOBILE",
            separateDialCode: true
  });
</script>

<script>
  $(document).ready(function(){
    $('#district').on('change', function(){
      var districtID = $(this).val();
      if (districtID !== '') {
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

<script>
  $(document).ready(function() {
      $('#form').validate({
        rules: {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          // Add more validation rules for other fields if needed
        },
        // Add custom messages if required
        messages: {
          name: {
            required: 'Please enter your name'
          },
          email: {
            required: 'Please enter your email',
            email: 'Please enter a valid email address'
          }
        },
        // Add any other options or callbacks if needed
      });
    });
    
</script>

<script>
  function create_tr(table_id){
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

  function removeRow(This) {   
      This.closest('tr').remove();
}
</script>
<script>
var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");

var form_1_btn = document.querySelector(".form_1_btn");
var form_2_btn = document.querySelector(".form_2_btn");
var form_3_btn = document.querySelector(".form_3_btn");

var form_1_next_btn = document.querySelector(".form_1_btn .btn_next");
var form_2_previous_btn = document.querySelector(".form_2_btn .btn_previous");
var form_2_next_btn = document.querySelector(".form_2_btn .btn_next");
var form_3_previous_btn = document.querySelector(".form_3_btn .btn_previous");

var form_1_progessbar = document.querySelector(".form_1_progessbar");
var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");

var btn_submit = document.querySelector(".btn_submit");

form_1_next_btn.addEventListener("click", function(){
  form_1.style.display = "none";
  form_2.style.display = "block";

  form_1_btn.style.display = "none";
  form_2_btn.style.display = "flex";

  form_1_progessbar.classList.remove("active");
  form_2_progessbar.classList.add("active");
});

form_2_previous_btn.addEventListener("click", function(){
  validateForm()
  form_1.style.display = "block";
  form_2.style.display = "none";

  form_1_btn.style.display = "flex";
  form_2_btn.style.display = "none";

  form_1_progessbar.classList.add("active");
  form_2_progessbar.classList.remove("active");
});

form_2_next_btn.addEventListener("click", function(){
  form_2.style.display = "none";
  form_3.style.display = "block";

  form_2_btn.style.display = "none";
  form_3_btn.style.display = "flex";

  form_2_progessbar.classList.remove("active");
  form_3_progessbar.classList.add("active");
});

form_3_previous_btn.addEventListener("click", function(){
  form_2.style.display = "block";
  form_3.style.display = "none";

  form_2_btn.style.display = "flex";
  form_3_btn.style.display = "none";

  form_2_progessbar.classList.add("active");
  form_3_progessbar.classList.remove("active");
});


</script>
</html>