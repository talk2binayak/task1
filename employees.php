<?php
include("header.php");
include("sidebar.php");

//Get the all user details
$sql = "SELECT * FROM tbl_users";
$result = mysqli_query($conn, $sql);
?>
<title>Users - Employees</title>
<div class="toaster" id="flash_msg">
</div>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Employees</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filter Section</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="emp_name" id="emp_name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mb-3 copy-text">
                                    <label for="inputPassword" class="col-md-4 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="address" value="" name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-md-4 col-form-label">Mobile Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="mobile" id="mobile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Employee Table</h5>
                            <!-- <a href="add_employee.php" type="button" class="btn btn-danger float-end">Add New</a> -->
                            <!-- Default Table -->
                            <table id="employee"  class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Emp Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">E-Mail</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">BG</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">DOJ</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
<?php echo include("footer.php"); ?>
</body>
<script>
    $(document).ready(function() {

        //Show all the Employee Data in Datatable with Ajax
        var table = $('#employee').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'searching': false,
            'ajax': {
                'url': 'ajax/employeedata_ajax.php',
                'data': function(data) {
                    // Read values
                    var gender = $('#address').val();
                    var name = $('#emp_name').val();
                    var email = $('#email').val();
                    var mobile = $('#mobile').val();

                    // Append to data
                    data.searchByAddress = gender;
                    data.searchByName = name;
                    data.searchByEmail = email;
                    data.searchByMobile = mobile;
                }
            },
            'columns': [{
                    data: 'id'
                },
                {
                    data: 'emp_name'
                },
                {
                    data: 'designation'
                },
                {
                    data: 'dob'
                },
                {
                    data: 'email'
                },
                {
                    data: 'mobile'
                },
                {
                    data: 'blood_group'
                },
                {
                    data: 'address'
                },
                {
                    data: 'doj'
                },
                {
                    data: 'action'
                },
            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                var oSettings = this.fnSettings();
                return nRow;
            },
        });

        $('#emp_name').keyup(function() {
            table.draw();
        });

        $('#mobile').change(function() {
            table.draw();
        });

        $('#email').change(function() {
            table.draw();
        });

        $('#address').change(function() {
            table.draw();
        });

    });


    $(document).ready(function() {
        $(document).on("click", ".delete_action", function() {

            // <?php
                // if (($_SESSION['login_role']) != "Admin" or ($_SESSION['login_role']) == "Super Admin") {
                // 
                ?>
            //     $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Only Admin and Super Admin allowed to Delete User.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
            //     return false;
            // <?php
                // }
                // 
                ?>
            var confirmation = confirm("are you sure you want to remove the user?");

            if (confirmation) {
                // execute ajax
                var id = $(this).data("id");
                $.ajax({
                    url: "delete_user_ajax.php",
                    data: {
                        id: id,
                    },
                    type: "POST",
                    success: function(data) {
                        $("tbody").empty().html(data);
                        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">User Deleted Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                    },
                    error: function() {}
                });
            }


        });
    });
</script>

</html>