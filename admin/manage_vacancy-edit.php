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
                    <h1 class="m-0">Edit Vacancy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Vacancy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Vacancy</h3>
                    <a href="manage_vacancy.php" class="btn btn-primary btn-sm float-right">Return Back</a>
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
                            <form action="manage_vacancyDB.php" method="POST" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['vacancy_id'])) {
                                    $vacancy_id = $_GET['vacancy_id'];

                                    $sql = "SELECT * FROM vacancies WHERE id='$vacancy_id'";
                                    $res = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                ?>
                                        <input type="hidden" name="vacancy_id" value="<?php echo $row['id']; ?>">
                                        <div class="form-group">
                                            <label for="job_title">Job title</label>
                                            <input type="text" class="form-control" id="job_title" name="job_title" value="<?php echo $row['job_title']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="job_desc">Job Description</label>
                                            <textarea class="form-control" id="job_desc" name="job_desc"><?php echo $row['job_desc']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deadline">Last Apply Date:</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="deadline" value="<?php echo $row['deadline'] ?>">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="salary">Salary:</label>
                                            <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $row['salary'] ?>">
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