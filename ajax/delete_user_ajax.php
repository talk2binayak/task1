<?php
    include("../db_connect.php");
    //Update User Details
    $id = $_POST['id'];
    $sql = "DELETE FROM tbl_users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    //Get the all user details
    $sql = "SELECT * FROM tbl_users";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "0";
    }
?>