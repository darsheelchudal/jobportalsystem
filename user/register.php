<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your header content here -->
    <title>User Registration</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<body>
    <?php
    session_start();
    include('../include/header.php');
    ?>

    <nav class="navbar navbar-expand-lg navbar-custom-color">
        <img src="../image/JagirAddaLogo.png" height="100px" width="100px">
        <a class="navbar-brand" href="#">JAAGIR ADDA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="mr-auto">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link ml-4" href="../index.php">Home</a>
                </li>
                <?php
                if (!isset($_SESSION['logged_in'])) { // If not logged in, display About Us and Contact Us
                ?>
                <li class="nav-item active">
                    <a class="nav-link ml-4" href="about.php">About Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-4" href="contact.php">Contact Us</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="ml-auto d-flex justify-content-between">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary mr-4"> <a class="nav-link1" href="../user/login.php"><i class="bi bi-people"></i>&nbsp Login / Signup</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card">
                    <?php
                    if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
                        $statusClass = $_SESSION['status'] === 'error' ? 'alert-danger' : 'alert-success';
                        echo "<div class='alert $statusClass' role='alert'>{$_SESSION['message']}</div>";
                        unset($_SESSION['status']);
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-person-plus"></i> User Registration</h3>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" action="login_register.php" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter full name">
                                <span id="nameError" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                <span id="usernameError" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                <span id="emailError" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span id="passwordError" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                            <p class="text-muted mt-3">Already have an account? <a href="../user/login.php"> Log in </a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your footer content here -->
    <?php
    include('../include/footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js
