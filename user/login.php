<!doctype html>
<html lang="en">


<?php

include('../include/header.php');
require('config/connection.php');
require('config/session_start.php');


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
                        <button type="button" class="btn btn-primary mr-4"> <a class="nav-link1" href=" "><i class="bi bi-people"></i>&nbsp Login / Signup</a></button>

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
                        <h3 class="card-title"><i class="bi bi-person"></i>User Login</h3>
                    </div>
                    <div class="card-body">

                        <form action="login_register.php" method="post">
                            <div class="form-group">
                                <label for="email_username">Email Address/Username</label>
                                <input type="text" class="form-control" id="email_username" name="email_username" placeholder="Enter email/username">

                            </div>



                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                            </div>


                            <button type="submit" class="btn btn-primary" name="login">Submit</button>
                            <p class="text-muted mt-3">Don't have an account? <a href="register.php"> Sign up </a></p>

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