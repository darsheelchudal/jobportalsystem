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
                    <h1 class="m-0">Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Users</h3>
                    <a href="manage_category.php" class="btn btn-primary btn-sm float-right">Return Back</a>
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
                            <form action="manage_categoryDB.php" method="POST">
                                <?php
                                if (isset($_GET['category_id'])) {
                                    $category_id = $_GET['category_id'];
                                    $sql = "SELECT * FROM categories WHERE id='$category_id' LIMIT 1";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        $value = mysqli_fetch_assoc($res);
                                ?>
                                        <div class="form-group">
                                            <input type="hidden" name="category_id" value="<?php echo $value['id'] ?>">
                                            <label for="name">Category</label>
                                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $value['category'] ?>">

                                        </div>
                                <?php
                                    } else {
                                        echo "Record not found";
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