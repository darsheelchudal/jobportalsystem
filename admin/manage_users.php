<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');


?>
<?php
include('config/dbcon.php');
//Delete operation of the  data
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM admin_login WHERE id='$user_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "User deleted successfully";
    } else {
        $_SESSION['status'] = "Failed to delete user";
    }
}
?>


<!-- Modal-->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="manage_usersDB.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="text">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <label for="role">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option selected>Choose</option>
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <option value="Admin">Admin</option>
                                    <option value="Employer">Employer</option>
                                <?php } ?>
                                <option value="HR Manager">HR Manager</option>
                            </select>
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
<!--Content-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Users</h3>
            <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#AddUserModal">Add Users</a>
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
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($_SESSION['role'] == 1) {
                                    $sql = "SELECT * FROM admin_login";
                                } else if ($_SESSION['role'] == 2) {
                                    $sql = "SELECT * FROM admin_login WHERE role=3";
                                }
                                $res = mysqli_query($conn, $sql);
                                function getRoleName($roleId)
                                {
                                    switch ($roleId) {
                                        case 1:
                                            return "Admin";
                                            break;
                                        case 2:
                                            return "Employer";
                                            break;
                                        case 3:
                                            return "HR Manager";
                                            break;
                                        default:
                                            return null;
                                    }
                                }
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {
                                ?>

                                        <tr>
                                            <td><?php echo $value['id']  ?></td>
                                            <td><?php echo $value['name']  ?></td>
                                            <td><?php echo $value['username']  ?></td>
                                            <td><?php echo getRoleName($value['role'])  ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <a href="manage_users-edit.php?user_id=<?php echo $value['id']  ?>"> <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                                    </a>
                                                    &nbsp;

                                                    <input type="hidden" name="user_id" value="<?php echo $value['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td> Cannot fetch data</td>
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