<?php
include '../db_connect.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (fullname like '%".$searchValue."%' or 
   mobile like '%".$searchValue."%' or 
   email like '%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tbl_users WHERE role_type = 'User'");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tbl_users WHERE role_type = 'User' AND 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_users WHERE role_type = 'User' AND 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "id"=>$row['id'],
      "fullname"=>$row['fullname'],
      "gender"=>$row['gender'],
      "dob"=>$row['dob'],
      "email"=>$row['email'],
      "mobile"=>$row['mobile'],
      "status"=>$row['status'],
      "action"=>'<a href="edit_user.php?id=' . $row['id'] . '"><span class="badge bg-primary"><i class="bi bi-pencil-square"></i> Edit</span></a><a href="#" class="delete_action" data-id="' . $row['id'] . '"><span class="badge bg-danger"><i class="bi bi-x-square-fill"></i> Delete</span></a>',
   );
}

                                                
## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);