<?php
session_start();

include("user/config/connection.php");

if (!isset($_SESSION['logged_in']) || !isset($_SESSION['user_id'])) {
    $_SESSION['status'] = "You must be logged in to apply.";
    header('Location: user/login.php');
    exit();
}


$user_id = $_SESSION['user_id'];
$vacancy_id = isset($_POST['vacancy_id']) ? $_POST['vacancy_id'] : null;

if (!$vacancy_id) {
    die("Vacancy ID is required.");
}

$name = $_POST['name'];
$address = $_POST['address'];
$education = $_POST['education'];

$file_name = $_FILES['resume']['name'];
$file_tmp = $_FILES['resume']['tmp_name'];
$file_size = $_FILES['resume']['size'];
$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$extensions = array("pdf", "doc", "docx");

// Check for existing application
$check_sql = "SELECT * FROM applications WHERE user_id = '$user_id' AND vacancy_id = '$vacancy_id'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    $_SESSION['status'] = "You have already applied for this vacancy.";
    // Redirect back to the apply page with the vacancy ID
    header('Location: apply.php?vacancy_id=' . $vacancy_id);
    exit();
}
// Proceed if no existing application
if (!empty($name) && !empty($address) && !empty($education) && in_array($file_ext, $extensions) && $file_size < 2097152) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_name);

    if (move_uploaded_file($file_tmp, $target_file)) {
        $sql = "INSERT INTO applications (name, address, education, resume, user_id, vacancy_id) 
                VALUES ('$name', '$address', '$education', '$target_file', '$user_id', '$vacancy_id')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['status'] = "Application submitted successfully.";
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Please provide all required information and choose a PDF or Word document file less than 2 MB.";
}

// Close connection
mysqli_close($conn);
?>
