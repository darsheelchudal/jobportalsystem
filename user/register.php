<!doctype html>
<html lang="en">

<?php

include('../include/header.php');

$errName = '';
$errPassword = '';
$errUsername = '';
$errEmail = '';

if (isset($_POST['submit'])) {
    $name = $_POST['full_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    if (empty($name)) {
        $errName = "Fill your name";
    }

    if (empty($username)) {
        $errName = "Fill your name";
    }

    if (empty($password)) {
        $errPassword = "Fill your password";
    } else {
        if (strlen($password) < 7) {
            echo "Must be at least 7";
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "email not in pattern";
    }
}
?>


<body>
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
                <li class="nav-item active">
                    <a class="nav-link ml-4" href="../about.php">About Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-4" href="../contact.php">Contact Us</a>
                </li>

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
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-person"></i>User Register</h3>
                    </div>
                    <div class="card-body">
                        <form action="login_register.php" method="post">
                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name">
                                <span class="text-danger"><?php echo $errName; ?></span>
                            </div>


                            <div class="form-group">
                                <label for="FullName">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                                <span class="text-danger"><?php echo $errUsername; ?></span>
                            </div>


                            <div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                <span class="text-danger"><?php echo $errEmail; ?></span>
                            </div>


                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <span class="text-danger"><?php echo $errPassword; ?></span>
                            </div>


                            <button type="submit" class="btn btn-primary" name="register">Submit</button>
                            <p class="text-muted mt-3">Already have an account?<a href="login.php"> Sign in </a></p>

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



</body>
<?php
include('../include/script.php');
include('../include/footer.php');


?>

</html>