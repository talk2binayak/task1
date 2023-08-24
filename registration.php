<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign Up - Jeeva Organic</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon-jo.png" rel="icon">
  <link href="assets/img/favicon-jo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
        .icon i{
            font-size: 100px !important;
            color: #28a745;
        }

    </style>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">


              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.jpg" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3 signup_section">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Sign Up</h5>
                    <p class="text-center small">Please Fillup the form to Sign Up</p>
                  </div>
                  <div class="toaster" id="flash_msg"></div>

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
                              <input type="password" class="form-control" id="password" value="" name="password" required>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3 copy-text">
                          <label for="inputPassword" class="col-md-4 col-form-label">Confirm Password</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <input type="password" class="form-control" id="confirmPassword" value="" name="confirmPassword" required>
                            </div>
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
                          <label for="inputNumber" class="col-md-4 col-form-label">Mobile</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="mobile" id="mobile" required>
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
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end" id="submit">Submit Form</button>
                      </div>
                    </div>
                    <div class="col-12">
                        <p class="text-center small">Already Signed Up? Click Here to <a href="login.php">Login</a></p>
                    </div>
                  </form><!-- End General Form Elements -->

                </div>
              </div>

              <div class="card mb-3 success_section d-none">

                <div class="card-body text-center">

                  <div class="pt-4 pb-2">
                  <div class="icon text-center">
                    <i class="fas fa-check-circle"></i>
                </div>
                    <h5 class="card-title text-center pb-0 fs-4">Thank you for signing up!</h5>
                    <p class="text-center small">Your account has been created successfully. Please wait for admin approval.</p>
                    <a href="login.php" class="btn btn-primary">Click Here for Login</a>                  
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>
<script>
    var password = document.getElementById("password"),
      confirm_password = document.getElementById("confirmPassword");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;


    //Sign Up Ajax Call and Show Welcome Message
    $(document).ready(function() {
        $("#myform").submit(function(e) {

        var username = $('#username').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var fullname = $('#fullname').val();
        var mobile = $('#mobile').val();
        var gender = $('#gender').val();
        var dob = $('#dob').val();
        var status = 'inactive';
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
            status: status,
          },
          type: "POST",
          success: function(data) {
            if (data == 1) {
              $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Username already exist.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
              e.preventDefault();
            } else if (data == 0) {
              $(".signup_section").addClass('d-none');
              $(".success_section").removeClass('d-none');
              // $('#myform')[0].reset();
            } else {
              $("#flash_msg").empty().fadeIn().html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong. Please Try Again..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
            }
          },
          error: function() {}
        });
        e.preventDefault();

      });
    });
  </script>

</html>