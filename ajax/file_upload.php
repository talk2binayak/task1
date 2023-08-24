<?php 
include("../db_connect.php");
$emp_id = $_POST['emp_id'];
if(!empty($_FILES)){ 
    // Include the database configuration file 
    
    // File path configuration 
    $uploadDir = "../upload/"; 
    $fileName = basename($_FILES['file']['name']); 
    $uploadFilePath = $uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        $sql = "INSERT INTO tbl_empfile (emp_id, file_name, uploaded_on) VALUES ($emp_id , '".$fileName."', NOW())"; 
        $insert = $conn->query($sql);
    } 
} 


    $sql = "SELECT * FROM tbl_empfile WHERE emp_id = '$emp_id'";
    $result = mysqli_query($conn, $sql);
    // Assuming $images is an array containing image filenames
    // Replace this with your own logic to fetch images
    $images = array();
    while($row = $result->fetch_assoc()) {
        $images [] = $row['file_name'];
    }
    $output = '<div class="row">';
    foreach($images as $image)
    {
        $output .= '
        <div class="col-md-2" style="margin-bottom:16px;" align="center">
            <img src="upload/' . $image . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
            <a href="upload/' . $image . '" class="btn btn-success" id="' . $image . '" download>Download</a>
        </div>
        ';
    }
    $output .= '</div>';
    echo $output;
?>
 