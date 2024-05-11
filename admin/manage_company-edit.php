<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>



<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Company</h3>
                    <a href="manage_company.php" class="btn btn-primary btn-sm float-right">Return Back</a>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-8">
                            <?php
                            if (isset($_SESSION['status'])) {
                                echo '<div class="alert alert-primary" role="alert">
                        ' . $_SESSION['status'] . '</div>';
                                unset($_SESSION['status']);
                            }
                            ?>
                            <form action="manage_companyDB.php" method="POST" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['company_id'])) {
                                    $company_id = $_GET['company_id'];

                                    $sql = "SELECT * FROM companies WHERE id='$company_id'";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                ?>
                                        <input type="hidden" name="company_id" id="company_id" value="<?php echo $row['id'] ?>">

                                        <div class=" form-group">
                                            <label for="name">Company Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Company Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Company Location</label>
                                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $row['location'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Company Image</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                            <input type="hidden" name="old_image" id="old_image" value="<?php echo $row['image'] ?>">
                                        </div>
                                <?php
                                    }
                                }
                                ?>



                                <button type="submit" class="btn btn-primary" name="update">Update</button>

                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
include('includes/script.php');
?>