<?php
include("header.php");
include("sidebar.php");

//Generate Randon Password
function randomPassword()
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>
<title>Users - QC Record</title>

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
                        <h5 class="card-title">Add User</h5>
                        <!-- General Form Elements -->

                        <form action="" method="post" enctype="multipart/form-data" id="myform">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Full Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="fullname" id="fullname" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="row mb-3 copy-text">
                                        <label for="inputPassword" class="col-md-4 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="password" value="<?php echo randomPassword(); ?>" name="password" required>
                                                <span class="input-group-text" id="btnCopyToClipboard"><i class="bi bi-back"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-md-4 col-form-label">Mobile Number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="mobile" id="mobile" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-md-4 col-form-label">Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username" id="username" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Gender</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
                                                <option selected value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-md-4 col-form-label">DOB</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="dob" id="dob" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-md-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" aria-label="Default select example" name="status" id="status">
                                                <option value="active">Active</option>
                                                <option value="inactive">In Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="row mb-3">
                                            <label for="inputNumber" class="col-sm-4 col-form-label">File Upload</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" id="prof_pic" name="prof_pic">
                                            </div>
                                        </div> -->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-end" id="submit">Submit Form</button>
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
        function copyToClipboard(text) {

            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy', err);
            }
            document.body.removeChild(textArea);
        }

        $('#btnCopyToClipboard').click(function() {
            var clipboardText = "";
            clipboardText = $('#password').val();
            copyToClipboard(clipboardText);
            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">Copied to Clipboard.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
        });
        console.log("ready!");
    });

    $(document).ready(function() {
        $("#submit").click(function(e) {
            e.preventDefault();

            var username = $('#username').val();
            var password = $('#password').val();
            var email = $('#email').val();
            var fullname = $('#fullname').val();
            var mobile = $('#mobile').val();
            var gender = $('#gender').val();
            var dob = $('#dob').val();
            var status = $('#status').val();
            if (username == "") {
                $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Username can not be blank.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                exit;
            }
            if (fullname == "") {
                $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Fullname can not be blank.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                exit;

            }
            $.ajax({
                url: "ajax/add_user_ajax.php",

                data: {
                    username: username,
                    password: password,
                    email: email,
                    fullname: fullname,
                    mobile: mobile,
                    dob: dob,
                    gender: gender,
                    status: status
                },
                type: "POST",
                success: function(data) {
                    if (data == 1) {
                        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Username already exist.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                        e.preventDefault();
                    } else if (data == 0) {
                        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">User Added Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                        $('#myform')[0].reset();
                    } else {
                        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong. Please Try Again..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
                    }
                },
                error: function() {}
            });

        });
    });
</script>

</html>