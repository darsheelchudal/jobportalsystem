<?php
session_start();

require('config/connection.php');

if (isset($_POST['login'])) {
    $email_username = $_POST['email_username'];
    $password = $_POST['password'];

    if (empty($email_username) || empty($password)) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Both fields are required.";
        header("Location: login.php");
        exit();
    }

    $query = "SELECT * FROM registered_users WHERE email='$email_username' OR username='$email_username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Successfully logged in.";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email or username not registered.";
        header("Location: login.php");
        exit();
    }
}

if (isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    if (empty($full_name)) {
        $errors[] = "Full name is required.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 7) {
        $errors[] = "Password must be at least 7 characters long.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO registered_users (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$hashed_password')";

        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Registration successful.";
            header("Location: ../user/login.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Error: Data cannot be inserted.";
            header("Location: register.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = implode("<br>", $errors);
        header("Location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    
    <?php
    if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
        echo "<script>alert('{$_SESSION['message']}');</script>";
        unset($_SESSION['status']);
        unset($_SESSION['message']);
    }
    ?>
    
</body>
</html>

<?php
mysqli_close($conn);
?>
