<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>


<!--DELETE QUERY-->
<?php
if (isset($_POST['delete'])) {
    $vacancy_id = $_POST['vacancy_id'];
    $sql = "DELETE FROM vacancies WHERE id='$vacancy_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Vacancy deleted successfully";
    } else {
        $_SESSION['status'] = "Vacancy deletion failed!";
    }
}
?>

<!--Content-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Vacancies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Vacancies</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Vacancies</h3>
            <a href="manage_vacancy-add.php" class="btn btn-primary btn-sm float-right">Add Vacancy</a>
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
                                    <th>Job Title</th>
                                    <th>Job Description</th>
                                    <th>Deadline</th>

                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM vacancies";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {
                                ?>
                                        <tr>
                                            <td><?php echo $value['id'] ?></td>
                                            <td><?php echo $value['job_title'] ?></td>
                                            <td><?php echo $value['job_desc'] ?></td>
                                            <td><?php echo $value['deadline'] ?></td>

                                            <td><?php echo $value['salary'] ?></td>
                                            <td><?php echo $value['job_status'] ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <a href="manage_vacancy-edit.php?vacancy_id= <?php echo $value['id'] ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                                    &nbsp;
                                                    <input type="hidden" name="vacancy_id" id="vacancy_id" value="<?php echo $value['id'] ?>">
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