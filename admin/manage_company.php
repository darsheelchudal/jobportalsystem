<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>
<?php
if (isset($_POST['delete'])) {
    $company_id = $_POST['company_id'];
    $image = $_POST['image'];
    $sql = "DELETE FROM companies WHERE id='$company_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        unlink("uploads/" . $_POST['image']);
        $_SESSION['status'] = "Company Deleted Successfully";
    } else {
        $_SESSION['status'] = "Company Deletion Failed";
    }
}


?>
<div class="modal fade" id="AddCompanyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage_companyDB.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">


                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="name">Company Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Company Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Company Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>

                            <div class="form-group">
                                <label for="image">Company Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Company</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Company</h3>
            <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddCompanyModal">Add Company</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-primary" role="alert">
                        ' . $_SESSION['status'] . '</div>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Location</th>

                                    <th>Image</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM companies";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {
                                ?>
                                        <tr>
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['email'] ?></td>
                                            <td><?php echo $value['location'] ?></td>
                                            <td>
                                                <img src="<?php echo "uploads/" . $value['image'] ?>" width="100px" height="100px" alt="image">
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <a href="manage_company-edit.php?company_id=<?php echo $value['id'] ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                                    <input type="hidden" name="company_id" id="company_id" value="<?php echo $value['id'] ?>">
                                                    <input type="hidden" name="image" id="image" value="<?php echo $value['image'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>No record found</td>

                                    </tr>

                                <?php
                                }
                                ?>






                            </tbody>
                        </table>
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