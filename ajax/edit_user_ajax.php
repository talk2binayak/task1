<?php
include("../db_connect.php");
//Update User Details
$id = $_POST['id'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$dob = (string) date("d-m-Y", strtotime($dob));
$status = $_POST['status'];
$sql = "UPDATE tbl_users SET status = '$status', fullname = '$fullname', gender = '$gender', dob = '$dob', email = '$email', mobile = '$mobile'  WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result)
{
    echo "0";
}
?>