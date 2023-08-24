    <?php
    include("header.php");
    if ($_SESSION['login_role'] != "Super Admin") {
        echo '<script> location.replace("access-denied.html"); </script>';
    }
    include("sidebar.php");
    $user_id = $_GET['id'];
    //Get the all user details
    $sql = "SELECT * FROM tbl_users where id =" . $user_id . "";
    $result = mysqli_query($conn, $sql);
    $row_u = mysqli_fetch_array($result);
    ?>
    <title>Users - Jeeva Organic</title>

    <div class="toaster" id="flash_msg">
    </div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User</h5>
                            <!-- General Form Elements -->

                            <form action="" method="post" enctype="multipart/form-data" id="myform">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Full Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="fullname" id="fullname" required value="<?php echo $row_u['fullname']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $row_u['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputNumber" class="col-md-4 col-form-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="mobile" id="mobile" required value="<?php echo $row_u['mobile']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputNumber" class="col-md-4 col-form-label">Username</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="username" id="username" required value="<?php echo $row_u['username']; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Gender</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
                                                    <option selected value="">Select</option>
                                                    <option value="Male" <?php echo ($row_u['gender'] == "Male") ? "selected" : "" ?>>Male</option>
                                                    <option value="Female" <?php echo ($row_u['gender'] == "Female") ? "selected" : "" ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputEmail" class="col-md-4 col-form-label">DOB</label>
                                            <div class="col-sm-8">
                                            <input type="date" class="form-control" name="dob" id="dob" required value="<?php echo date('Y-m-d', strtotime($row_u['dob'])); ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputPassword" class="col-md-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" name="status" id="status">
                                                    <option value="active" <?php echo ($row_u['status'] == "active") ? "selected" : "" ?>>Active</option>
                                                    <option value="inactive" <?php echo ($row_u['status'] == "inactive") ? "selected" : "" ?>>In Active</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary float-end" id="submit">Submit Form</button>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>



                            </form><!-- End General Form Elements -->
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
            $("#submit").click(function(e) {
                e.preventDefault();
                var id = <?php echo $user_id; ?>;
                var username = $('#username').val();
                var email = $('#email').val();
                var fullname = $('#fullname').val();
                var mobile = $('#mobile').val();
                var dob = $('#dob').val();
                var gender = $('#gender').val();
                var status = $('#status').val();
                $.ajax({
                    url: "ajax/edit_user_ajax.php",
                    data: {
                        id: id,
                        email: email,
                        fullname: fullname,
                        username: username,
                        mobile: mobile,
                        dob: dob,
                        gender: gender,
                        status: status
                    },
                    type: "POST",
                    success: function(data) {
                        if (data == 0) {
                            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">User Updated Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                        }
                        else
                        {
                            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong. Please Try Again..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                        }
                    },
                    error: function() {}
                });

            });
        });
    </script>

</html>