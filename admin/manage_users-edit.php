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
                    <h1 class="m-0">Edit Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Users</h3>
            <a href="manage_users.php" class="btn btn-primary btn-sm float-right">Return Back</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-primary" role="alert">
                        ' . $_SESSION['status'] . '</div>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-body">
                        <form action="manage_usersDB.php" method="POST">
                            <?php
                            function mapIDtoName($role)
                            {
                                switch ($role) {
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
                            if (isset($_GET['user_id'])) {
                                $user_id = $_GET['user_id'];
                                $sql = "SELECT * FROM admin_login WHERE id='$user_id' LIMIT 1";
                                $res = mysqli_query($conn, $sql);
                                if ($res && mysqli_num_rows($res) > 0) {
                                    $value = mysqli_fetch_assoc($res);
                            ?>
                                    <input type="hidden" name="user_id" value="<?php echo $value['id'] ?>">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $value['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $value['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password can't be shown">
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select id="role" class="form-control" name="role">
                                            <option selected><?php echo mapIDtoName($value['role']) ?></option>
                                            <?php if ($_SESSION['role'] == 1) { ?>
                                                <option value="Admin">Admin</option>
                                                <option value="Employer">Employer</option>
                                            <?php } ?>
                                            <option value="HR Manager">HR Manager</option>

                                        </select>
                                    </div>
                            <?php
                                } else {
                                    echo "<h4>Record not found</h4>";
                                }
                            }
                            ?>
                            <button type="submit" class="btn btn-info" name="update">Update</button>
                        </form>
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