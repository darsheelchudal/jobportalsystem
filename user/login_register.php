<?php
session_start();

// Database connection
require('config/connection.php');

// Login functionality
// Handle login functionality
if (isset($_POST['login'])) {
    $email_username = $_POST['email_username'];
    $password = $_POST['password'];

    // Check for empty fields
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
            $_SESSION['user_id'] = $row['id']; // Add this line
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Successfully logged in.";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Incorrect password.";
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email or username not registered.";
    }

    header("Location: login.php");
    exit();
}

// Registration functionality
if (isset($_POST['register'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


  



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
        $_SESSION['errors'] = $errors;
        header("location: register.php");
        exit();
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
