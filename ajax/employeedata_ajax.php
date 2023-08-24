<?php
include '../db_connect.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
//$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value

## Custom Field value
$searchByName = $_POST['searchByName'];
$searchByAddress = $_POST['searchByAddress'];
$searchByEmail = $_POST['searchByEmail'];
$searchByMobile = $_POST['searchByMobile'];


## Search 
// $searchQuery = " ";
// if($searchValue != ''){
//    $searchQuery = " and (fullname like '%".$searchValue."%' or 
//    mobile like '%".$searchValue."%' or 
//    email like '%".$searchValue."%') ";
// }


## Search 
$searchQuery = " ";
if($searchByName != ''){
      $searchQuery .= " and (emp_name like '%".$searchByName."%' ) ";
}
if($searchByAddress != ''){
      $searchQuery .= " and (gender='".$searchByAddress."') ";
}
if($searchByEmail != ''){
      $searchQuery .= " and (email like '%".$searchByEmail."%') ";
}
if($searchByMobile != ''){
   $searchQuery .= " and (mobile like '%".$searchByMobile."%') ";
}


## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tbl_employee");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from tbl_employee WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_employee WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "id"=>$row['id'],
      "emp_name"=>$row['emp_name'],
      "designation"=>$row['designation'],
      "dob"=>$row['dob'],
      "blood_group"=>$row['blood_group'],
      "email"=>$row['email'],
      "mobile"=>$row['mobile'],
      "doj"=>$row['doj'],
      "address"=>$row['address'],
      "action"=>'<a href="emp_filemanage.php?emp_id=' . $row['id'] . '"><span class="badge bg-primary"><i class="bi bi-pencil-square"></i> Upload File</span></a>',
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