<?php
session_start();
$user_name = $_SESSION['name'] ;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
      .navbar{
  background-color: #052e59;
      }
      .logo{
  height: 90px;
  width: 90px;
}

</style>
<nav class="navbar fixed-top navbar-expand-lg py-3 ">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <img src="images/aiub-logo.png" class="logo">
    <h4 class=" text-white mx-2">American International University of Bangladesh</h4>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     
      </ul>

              <div class="d-flex">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="datatable.php">Student</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="gellary.php">Gellary</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php">Contact</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="stepjs.php">stepjs</a>
                  </li> -->
                  <?php if( isset($user_name) && !empty($user_name) )
                  {
                    ?>
                     <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $user_name?>
                 </a>
                  <ul class="dropdown-menu">
                  <li class="nav-item">
                      <a class="nav-link" href="logOut.php">Log out</a>
                      </li>
                 </ul>
                </li>
                      <?php 
                    }
                    else{ 
                      ?>
                       <li class="nav-item">
                       <a class="nav-link text-white" aria-current="page" href="login.php">Log in</a>
                      </li>
                      <li class="nav-item">
                     <a class="nav-link text-white" href="registration.php">Registration</a>
                     </li>
<?php } ?>
             </ul>
</div>
            </div>
          </nav>

    <script src="https://kit.fontawesome.com/2b14fa03a7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>