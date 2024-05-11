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
                    <h1 class="m-0">Add Vacancy</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Vacancy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Vacancy</h3>
                    <a href="manage_vacancy.php" class="btn btn-primary btn-sm float-right">Return Back</a>

                </div>
                <div class="modal-body">
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo '<div class="alert alert-primary" role="alert">
                        ' . $_SESSION['status'] . '</div>';
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="row">

                        <div class="col-md-6">



                            <form action="manage_vacancyDB.php" method="POST">

                                <!--dropdown-->
                                <div class="form-group">
                                    <label for="company_id">Company Name</label>
                                    <select id="company_id" class="form-control" name="company_id">

                                        <?php
                                        $sql = "SELECT * FROM companies";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            foreach ($res as $value) {



                                        ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>


                                        <?php
                                            }
                                        }


                                        ?>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="job_title">Job title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title">
                                </div>
                                <div class="form-group">
                                    <label for="job_desc">Job Description</label>
                                    <textarea class="form-control" id="job_desc" name="job_desc"></textarea>
                                </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="deadline">Last Apply Date: </label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="deadline" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" name="deadline">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary: </label>
                                <input type="number" class="form-control" id="salary" name="salary">
                            </div>
                            <div class="form-group">
                                <label>Category</label><br>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    foreach ($res as $value) {


                                ?>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="category_id" id="category_id" value="<?php echo $value['id'] ?>">
                                            <label class="form-check-label" for="category_id"> <?php echo $value['category'] ?></label>
                                        </div>

                                <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-float-center" name="submit">Submit</a>

                    </div>

                </div>




                </form>









            </div>

        </div>
    </div>
</div>
</div>
<?php
include('includes/footer.php');
include('includes/script.php');
?>