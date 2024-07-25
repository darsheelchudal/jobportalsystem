<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

// Fetch the total number of job applications from the database
$sql_applications = "SELECT COUNT(*) as total_applications FROM applications";
$result_applications = mysqli_query($conn, $sql_applications);

$row_applications = mysqli_fetch_assoc($result_applications);
$total_applications = $row_applications['total_applications'];

// Fetch the total number of registered users from the database
$sql_users = "SELECT COUNT(*) as total_users FROM registered_users";
$result_users = mysqli_query($conn, $sql_users);

$row_users = mysqli_fetch_assoc($result_users);
$total_users = $row_users['total_users'];

// Fetch the total number of companies from the database
$sql_companies = "SELECT COUNT(*) as total_companies FROM companies";
$result_companies = mysqli_query($conn, $sql_companies);

$row_companies = mysqli_fetch_assoc($result_companies);
$total_companies = $row_companies['total_companies'];

$sql_vacancies = "SELECT COUNT(*) as total_vacancies FROM vacancies";
$result_vacancies = mysqli_query($conn, $sql_vacancies);

$row_vacancies = mysqli_fetch_assoc($result_vacancies);
$total_vacancies = $row_vacancies['total_vacancies'];
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Applications</span>
                            <span class="info-box-number"><?php echo $total_applications; ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number"><?php echo $total_users; ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Companies</span>
                            <span class="info-box-number"><?php echo $total_companies; ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Vacancies</span>
                            <span class="info-box-number"><?php echo $total_vacancies; ?></span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
