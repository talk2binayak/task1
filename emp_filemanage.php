<?php
include("header.php");
include("sidebar.php");

$emp_id = $_GET['emp_id'];
//Get the Employee details
echo $sql = "SELECT * FROM tbl_employee WHERE id = '$emp_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<title>Users - Employees</title>


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
                        <h5 class="card-title">Employee File Management Section</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="emp_name" id="emp_name" value="<?php echo $row['emp_name']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-md-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mb-3 copy-text">
                                    <label for="inputPassword" class="col-md-4 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="address" value="<?php echo $row['address']; ?>" readonly name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-md-4 col-form-label">Mobile Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Employee Table</h5>
                        <div class="panel">
                            <div class="image_upload_div">
                                <form action="upload.php" class="dropzone">
                                    <div class="dz-message">
                                        Drop files here or click to upload.<br>
                                        <span class="note">(This is for demo purpose. Selected files are not actually uploaded.)</span>
                                    </div>

                                </form>
                                <br>
                                <button class="btn btn-primary" id="startUpload">UPLOAD</button>


                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Files</h5>
                        <div class="panel">
                            <div class="panel-body" id="uploaded_image">

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

</div>
<?php echo include("footer.php"); ?>

</body>
<script>
    var emp_id = "<?php echo $_GET["emp_id"]; ?>";
    //Disabling autoDiscover
    Dropzone.autoDiscover = false;

    $(function() {
        //Dropzone class
        var myDropzone = new Dropzone(".dropzone", {
            url: "ajax/file_upload.php",
            paramName: "file",
            maxFilesize: 2,
            maxFiles: 10,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false
        });
        myDropzone.on('sending', function(file, xhr, formData) {
            formData.append('emp_id', emp_id);
        });

        $('#startUpload').click(function() {
            myDropzone.processQueue();
        });
    });
</script>
<!-- To Load Images in a Section from Database as per Employee -->
<script type="text/javascript">
    load_images();

    function load_images() {
        $.ajax({
            url: "ajax/file_upload.php",
            type: 'post',
            data: {
                emp_id: emp_id
            },
            success: function(data) {
                $('#uploaded_image').html(data);
            }
        })
    }
</script>

</html>