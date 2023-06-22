<?php
session_start();
$user_name = $_SESSION['name'] ;

include_once("db.php");
$query = "SELECT * FROM basic_info"; 
$result = mysqli_query($con, $query);
?>
<style>
  .bg-body-tertiary{
    background: #420dfd12;
  }
</style>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>students list</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  </head>
  <body>
     <header class="mb-5">
     <?php
include_once("nav.php");
?>
    </header>
   <div class="container mt-5 pt-5">
   <div class="d-flex justify-content-between">
    <h3>Student List</h3>
    <?php if( isset($user_name) && !empty($user_name) )
                  {
                    ?>
                      <a href="stepjs.php" class="btn btn-primary">Add new</a>
                      <?php 
}
else{
  header('location:login.php');
}
?>
  </div>
<div class="my-4">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">photo</th>
      <th scope="col">view</th>
      <th scope="col">edit</th>
    </tr>
  </thead>

  <tbody class="table-group-divider">

  <?php
  $num = mysqli_num_rows($result);
  $uniqueId = 1; 
  if ($num > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
          ?>
          <tr>
              <td><?php echo $uniqueId; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><img src="http://localhost/PHP_PRAC/scl%20project/images/<?php echo $row['image']; ?>" style="height:80px"; width="80px"></td>
              <td><a href="studentView.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
              <td><a href="studentEdit.php?id=<?php echo $id; ?>" class="btn btn-warning">Edit</a></td>
          </tr>
          <?php
          $uniqueId++;
      }
  }
  ?>
  </tbody>
</table>

</div>
</div>
   </div>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>  
$(document).ready(function () {
    $('.table').DataTable();
});
    </script>
 
  </body>
</html>
