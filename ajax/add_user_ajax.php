<?php
include("../db_connect.php");
//Get the logged in user details
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$dob = (string) date("d-m-Y", strtotime($dob));
$status = $_POST['status'];
$created_at = date("Y-m-d h:i:s");

$sql = "SELECT * FROM tbl_users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count == 1)
{
    echo "1";
}
else
{
    $sql = "INSERT INTO tbl_users (fullname, gender, dob, username, password, email, mobile, status, role_type, created_at) VALUES ('$fullname','$gender','$dob', '$username', '$password', '$email', '$mobile', '$status', 'User', '$created_at')";
    $result = mysqli_query($conn, $sql);
    echo "0";
}
?>