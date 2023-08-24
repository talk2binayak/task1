<?php
include("header.php");
include("sidebar.php");
?>
<title>Users - Profile</title>
<div class="toaster" id="flash_msg">
</div>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <div class="image_area">
              <form method="post">
                <label for="upload_image">
                  <?php
                  $profile_pic = $row['prof_pic'];
                  if (empty($profile_pic)) {
                    $profile_pic = "upload/default.png";
                  }
                  ?>
                  <img src="<?php echo $profile_pic; ?>" id="uploaded_image" class="img-responsive rounded-circle" />
                  <div class="overlay">
                    <div class="text">Change Profile Image</div>
                  </div>
                  <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                </label>
              </form>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="img-container">
                      <div class="row">
                        <div class="col-md-8">
                          <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                          <div class="preview"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>



            <h2><?php echo $row['fullname']; ?></h2>
            <h3><span class="badge bg-success"><?php echo $row['role_type']; ?></span></h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo $row['fullname']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender</div>
                  <div class="col-lg-9 col-md-8"><?php echo $row['gender']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Mobile</div>
                  <div class="col-lg-9 col-md-8"><?php echo $row['mobile']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">E-Mail</div>
                  <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                  <div class="col-lg-9 col-md-8"><?php echo $row['dob']; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8">
                    <?php
                    if ($row['status'] == 'active') {
                      echo '<span class="badge rounded-pill bg-success">Active</span>';
                    } else {
                      echo '<span class="badge rounded-pill bg-danger">In Active</span>';
                    }
                    ?>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <form action="" method="post" enctype="multipart/form-data" id="myform">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Full Name</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="fullname" id="fullname" required value="<?php echo $row['fullname']; ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-md-4 col-form-label">Mobile Number</label>
                        <div class="col-sm-8">
                          <input type="number" class="form-control" name="mobile" id="mobile" required value="<?php echo $row['mobile']; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputNumber" class="col-md-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="username" id="username" required value="<?php echo $row['username']; ?>" disabled>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                          <select class="form-select" aria-label="Default select example" name="gender" id="gender" required>
                            <option selected value="">Select</option>
                            <option value="Male" <?php echo ($row['gender'] == "Male") ? "selected" : "" ?>>Male</option>
                            <option value="Female" <?php echo ($row['gender'] == "Female") ? "selected" : "" ?>>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-md-4 col-form-label">DOB</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" name="dob" id="dob" required value="<?php echo date('Y-m-d', strtotime($row['dob'])); ?>">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-md-4 col-form-label">Role</label>
                        <div class="col-sm-8">
                          <select class="form-select" aria-label="Default select example" name="role_type" id="role_type" required <?php echo ($row['role_type'] == "Super Admin") ? "disabled" : "" ?>>
                            <option selected value="">Select</option>
                            <option value="Super Admin" <?php echo ($row['role_type'] == "Super Admin") ? "selected" : "" ?>>Super Admin</option>
                            <option value="Tester" <?php echo ($row['role_type'] == "Tester") ? "selected" : "" ?>>Tester</option>
                            <option value="Marketing" <?php echo ($row['role_type'] == "Marketing") ? "selected" : "" ?>>Marketing</option>
                            <option value="Back Office" <?php echo ($row['role_type'] == "Back Office") ? "selected" : "" ?>>Back Office</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword" class="col-md-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                          <select class="form-select" aria-label="Default select example" name="status" id="status" <?php echo ($row['role_type'] == "Super Admin") ? "disabled" : "" ?>>
                            <option value="active" <?php echo ($row['status'] == "active") ? "selected" : "" ?>>Active</option>
                            <option value="inactive" <?php echo ($row['status'] == "inactive") ? "selected" : "" ?>>In Active</option>
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


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form id="change_pwd">
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="button" class="btn btn-primary" id="change_pwd_submit">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

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
      var id = <?php echo $row['id']; ?>;
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
            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">Profile Updated Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
          }
        },
        error: function() {}
      });

    });

    //Change Password Ajax
    $("#change_pwd_submit").click(function(e) {
      e.preventDefault();
      var id = <?php echo $row['id']; ?>;
      var currentPassword = $('#currentPassword').val();
      var newPassword = $('#newPassword').val();
      var renewPassword = $('#renewPassword').val();

      if (currentPassword == "") {
        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Current Password Field can not be blank.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
        exit;

      }
      if (newPassword == "") {
        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">New Password Field can not be blank.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
        exit;

      }
      if (newPassword != renewPassword) {
        $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Re-enter password mismatch.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
        exit;
      }
      $.ajax({
        url: "change_pwd_ajax.php",
        data: {
          id: id,
          currentPassword: currentPassword,
          newPassword: newPassword,
        },
        type: "POST",
        success: function(data) {
          if (data == 0) {
            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-warning alert-dismissible fade show" role="alert">Current Password does not match.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
          }
          if (data == 1) {
            $("#flash_msg").empty().fadeIn().html('<div class="alert alert-success alert-dismissible fade show" role="alert">Password Changed Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').delay(5000).fadeOut();
            $('#change_pwd')[0].reset();
          }
        },
        error: function() {}
      });

    });
  });
</script>


<script>
  $(document).ready(function() {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function(event) {
      var files = event.target.files;

      var done = function(url) {
        image.src = url;
        $modal.modal('show');
      };

      if (files && files.length > 0) {
        reader = new FileReader();
        reader.onload = function(event) {
          done(reader.result);
        };
        reader.readAsDataURL(files[0]);
      }
    });

    $modal.on('shown.bs.modal', function() {
      cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 2,
        preview: '.preview'
      });
    }).on('hidden.bs.modal', function() {
      cropper.destroy();
      cropper = null;
    });

    $('#crop').click(function() {
      canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400
      });

      canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function() {
          var base64data = reader.result;
          $.ajax({
            url: 'upload.php',
            method: 'POST',
            data: {
              image: base64data
            },
            success: function(data) {
              $modal.modal('hide');
              $('#uploaded_image').attr('src', data);
            }
          });
        };
      });
    });

  });
</script>

</html>