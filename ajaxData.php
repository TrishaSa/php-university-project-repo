<?php 
// Include the database config file 
include_once 'db.php'; 
 
if(!empty($_POST["district_id"])){ 
    // Fetch state data based on the specific district 
    $query = "SELECT * FROM thana WHERE district_id = ".$_POST['district_id']." "; 
    $result = mysqli_query($con, $query);
     
    // Generate HTML of state options list 
    if(mysqli_num_rows($result) > 0){ 
        echo '<option value="">Select thana</option>'; 
        while($row = mysqli_fetch_assoc($result)){  
            echo '<option value="'.$row['thana_id'].'">'.$row['thana_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Thana not available</option>'; 
    } 
}

?>