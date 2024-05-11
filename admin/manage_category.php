<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>


<?php
if (isset($_POST['delete'])) {
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE id='$category_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Category successfully Deleted";
    } else {
        $_SESSION['status'] = "Category deletion failed";
    }
}



?>

<div class="modal fade" id="AddCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage_categoryDB.php" method="post">
                <form action="manage_categoryDB.php" method="POST">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <input type="text" class="form-control" id="category" name="category">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Category</h3>
            <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddCategoryModal">Add Categories</a>
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
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {

                                    foreach ($res as $value) {
                                ?>
                                        <tr>
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['category'] ?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <a href="manage_category-edit.php?category_id=<?php echo $value['id'] ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                                    <input type="hidden" name="category_id" value="<?php echo $value['id']  ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php

                                    }
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