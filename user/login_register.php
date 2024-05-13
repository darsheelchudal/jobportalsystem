<?php
// Database connection
require('config/connection.php');
// Start session
require('config/session_start.php');

// Login functionality
if (isset($_POST['login'])) {
    $email_username = mysqli_real_escape_string($conn, $_POST['email_username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $query = "SELECT * FROM registered_users WHERE email='$email_username' OR username='$email_username'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $row['username'];
            header("location:../index.php");
            exit();
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Incorrect password";
        }
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Email or username not registered";
    }
}

// Registration functionality
if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Check if username or email already exists
    $user_exist_query = "SELECT * FROM registered_users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $user_exist_query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Username or email already registered";
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into database
        $insert_query = "INSERT INTO registered_users (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Registration successful";
        } else {
            $_SESSION['status'] = "error";
            $_SESSION['message'] = "Error: Data cannot be inserted";
        }
    }
    
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
    