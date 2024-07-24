<?php
session_start(); // Start the session first
if (isset($_SESSION['is_login'])) {
    $_SESSION['status'] = "You are already logged in";
    header("Location:layout.php");
}



include("includes/header.php");

require('config/dbcon.php');

//Admin login
$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_login WHERE username='$username'";
    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

      
        if (password_verify($password, $row['password'])) {
            $_SESSION['role'] = $row['role'];
            $_SESSION['is_login'] = true;







            // Redirect to the appropriate page based on the user's role
            if ($row['role'] == 1 || $row['role'] == 2 || $row['role'] == 3) {
                $_SESSION['status'] = "Logged in successfully";
                header('Location: layout.php');
                exit(); // Stop executing the current script
            } else {
                $error = 'Unauthorized access';
            }
        } else {
            $error = 'Incorrect Details';
        }
    } else {
        $error = 'User not found';
    }
}
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin Login</h3>

                    <div class="card-body">
                    </div>
                    <?php
                    if (isset($_SESSION['status'])) {
                        echo "<div class='alert alert-primary' role='alert'>"
                            . $_SESSION['status'] .
                            "</div>";
                    }

                    ?>
                    <form action="#" method="POST">
                        <p class="text-danger">

                            <?php
                            echo $error;
                            ?>
                        </p>
                        <div class="form-group">
                            <label for="text">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <br>



                </div>

                </form>
            </div>
        </div>
    </div>
</div>