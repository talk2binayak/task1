<?php
include("header.php");
if ($_SESSION['login_role'] == "User") {
    echo '<script> location.replace("access-denied.html"); </script>';
}
include("sidebar.php");

//Get the all user details
$sql = "SELECT * FROM tbl_users";
$result = mysqli_query($conn, $sql);
?>
<title>Users - Jeeva Organic</title>
<div class="toaster" id="flash_msg">
</div>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Table</h5>
                        <a href="add_user.php" type="button" class="btn btn-danger float-end">Add New</a>
                        <!-- Default Table -->
                        <table class="table" id="user">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Created At</th>
                                        <th scope="col">Last Login At</th> -->
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

        //Show all the User Data in Datatable with Ajax
        $table = $('#user').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'ajax/userdata_ajax.php'
            },
            'columns': [{
                    data: 'id'
                },
                {
                    data: 'fullname'
                },
                {
                    data: 'gender'
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
                    data: 'status'
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

    });


    $(document).ready(function() {
        $(document).on("click", ".delete_action", function() {

            // <?php
            // if (($_SESSION['login_role']) != "Admin" or ($_SESSION['login_role']) == "Super Admin") {
            // ?>
            //     $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Only Admin and Super Admin allowed to Delete User.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
            //     return false;
            // <?php
            // }
            // ?>
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