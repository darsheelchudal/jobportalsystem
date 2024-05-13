<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>



<!--Content-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Applications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Applications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Applications</h3>
        </div>
        <div class=" container">
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
                                    <th>Full Name</th>
                                    <th>Address</th>
                                    <th>Education</th>

                                    <th>Resume</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM applications";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {
                                ?>
                                        <tr>
                                            <td><?php echo $value['a_id'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['address'] ?></td>
                                            <td><?php echo $value['education'] ?></td>
    

                                            <td><a href="<?php echo $value['resume']; ?>" target="_blank">View</a> | <a href="../../uploads/<?php echo $value['resume']; ?>" download>Download</a></td>
                                            <td><?php echo $value['status'] ?></td>
                                            <td>
                                                <form action="" method="post">
                                                <button type="submit" class="btn btn-sm btn-primary" name="delete">Approve</button>
                                        
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete">Reject</button>

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