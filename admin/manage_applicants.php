<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

//applications manage

if (isset($_POST['approve'])) {
    $application_id = $_POST['application_id'];
    $sql = "UPDATE applications SET status = 1 WHERE a_id = $application_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Application approved successfully.";
    } else {
        $_SESSION['status'] = "Error updating application status: " . mysqli_error($conn);
    }
}

if (isset($_POST['reject'])) {
    $application_id = $_POST['application_id'];
    $sql = "UPDATE applications SET status = 2 WHERE a_id = $application_id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['status'] = "Application rejected successfully.";
    } else {
        $_SESSION['status'] = "Error updating application status: " . mysqli_error($conn);
    }
}
?>

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
                                        // Correcting the resume path for view and download links
                                        $resume_path = '../' . $value['resume'];
                                ?>
                                        <tr>
                                            <td><?php echo $value['a_id'] ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['address'] ?></td>
                                            <td><?php echo $value['education'] ?></td>
                                            <td>
                                                <a href="<?php echo $resume_path; ?>" target="_blank">View</a> | 
                                                <a href="<?php echo $resume_path; ?>" download>Download</a>
                                            </td>
<td>
    <?php 
    switch ($value['status']) {
        case 1:
            echo 'Approved';
            break;
        case 2:
            echo 'Rejected';
            break;
        default:
            echo 'Pending';
            break;
    }
    ?>
</td>                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="application_id" value="<?php echo $value['a_id']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="approve">Approve</button>
                                                    <button type="submit" class="btn btn-sm btn-danger" name="reject">Reject</button>
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
