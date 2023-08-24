<?php
include("db_connect.php");
//Update User Details
$id = $_POST['id'];
$currentPassword = md5($_POST['currentPassword']);
$newPassword = md5($_POST['newPassword']);

$sql = "SELECT * FROM tbl_users WHERE id = ".$id." and password = '$currentPassword'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count == 1)
{
    $sql = "UPDATE tbl_users SET password = '$newPassword' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
        echo "1";
    }
}
else
{
    echo "0";
}

?>