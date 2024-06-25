<?php
session_start();

// Database connection
require('config/connection.php');

// Login functionality
if (isset($_POST['login'])) {
    $email_username = trim(mysqli_real_escape_string($conn, $_POST['email_username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    // Check for empty fields
    if (empty($email_username) || empty($password)) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Both fields are required.";
        header("location: login.php");
        exit();
    }

    $query = "SELECT * FROM registered_users WHERE email='$email_username' OR username='$email_username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['status'] = "success";
            $_SESSION['username'] = $row['username']; // Set username in session

            $_SESSION['message'] = "Successfully logged in.";
            header("location: ../index.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Incorrect password.";
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email or username not registered.";
    }

    header("location: login.php");
    exit();
}

// Registration functionality
if (isset($_POST['register'])) {
    $full_name = trim(mysqli_real_escape_string($conn, $_POST['full_name']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    // Perform validation again to prevent tampering
    $isValid = true;
    $errors = [];

    // Validate full name
    if (empty($full_name)) {
        $isValid = false;
        $errors[] = "Full name is required.";
    }

    // Validate username
    if (empty($username)) {
        $isValid = false;
        $errors[] = "Username is required.";
    }

    // Validate email
    if (empty($email)) {
        $isValid = false;
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors[] = "Invalid email format.";
    }

    // Validate password
    if (empty($password)) {
        $isValid = false;
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 7) {
        $isValid = false;
        $errors[] = "Password must be at least 7 characters long.";
    }

    if ($isValid) {
        // Process registration
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO registered_users (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Registration successful.";
            header("location: ../user/login.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Error: Data cannot be inserted.";
            header("location: register.php");
            exit();
        }
    } else {
        // Set error messages in session for display
        $_SESSION['status'] = "error";
        $_SESSION['message'] = implode("<br>", $errors);
        header("location: register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your header content here -->
</head>
<body>
    <!-- Your HTML content here -->
    
    <?php
    // Display status message
    if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
        echo "<script>alert('{$_SESSION['message']}');</script>";
        unset($_SESSION['status']);
        unset($_SESSION['message']);
    }
    ?>
    
    <!-- Include your footer content here -->
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
