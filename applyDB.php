<?php
// Include database connection file
include("user/config/connection.php");
session_start();

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$education = mysqli_real_escape_string($conn, $_POST['education']);

// File upload
$file_name = $_FILES['resume']['name'];
$file_tmp = $_FILES['resume']['tmp_name'];
$file_size = $_FILES['resume']['size'];
$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$extensions = array("pdf", "doc", "docx");


// Check if form is submitted with valid data
if (!empty($name) && !empty($address) && !empty($education) && in_array($file_ext, $extensions) && $file_size < 2097152) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_name);

    // Move uploaded file to target directory
    if (move_uploaded_file($file_tmp, $target_file)) {
        // Insert data into database
        $sql = "INSERT INTO applications(name, address, education, resume) VALUES ('$name', '$address', '$education', '$file_name')";
        if (mysqli_query($conn, $sql)) {
            header('Location:apply.php');
            $_SESSION['status'] = "Application submitted successfully.";

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
