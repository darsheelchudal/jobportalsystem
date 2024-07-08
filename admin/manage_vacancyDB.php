<?php
include('config/dbcon.php');
include('config/session_start.php');



?>


<!-- updating vacancy-->
<?php
if (isset($_POST['update'])) {
    $vacancy_id = $_POST['vacancy_id'];
    $job_title = $_POST['job_title'];
    $job_desc = $_POST['job_desc'];
    $deadline = $_POST['deadline'];
    $salary = $_POST['salary'];

    $currentDate = date('Y-m-d');
    if ($deadline > $currentDate) {
        $job_status = 1; // active
    } else {
        $job_status = 0; // inactive
    }

    if (empty($job_title) || empty($job_desc) || empty($deadline) || empty($salary)) {
        $_SESSION['status'] = "Field cannot be left empty";
        header("Location: manage_vacancy-edit.php?vacancy_id=" . $vacancy_id);
        exit(); // Stop further execution   
    }

    if ($salary < 0) {
        $_SESSION['status'] = "Salary must not be negative";
        header('Location: manage_vacancy-edit.php?vacancy_id=' . $vacancy_id);
        exit();
    }

    $sql = "UPDATE vacancies SET job_title='$job_title', job_desc='$job_desc', deadline='$deadline', salary=$salary, job_status=$job_status WHERE id='$vacancy_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Vacancy updated successfully";
        header("Location: manage_vacancy.php");
        exit();
    } else {
        $_SESSION['status'] = "Vacancy update failed!";
        header("Location: manage_vacancy.php");
        exit();
    }
}

?>

<!--creating a new vacancy-->
<?php
if (isset($_POST['submit'])) {
    $company_id = $_POST['company_id'];
    $job_title = $_POST['job_title'];
    $job_desc = $_POST['job_desc'];
    $deadline = $_POST['deadline'];
    $salary = $_POST['salary'];
    $category_id = $_POST['category_id'];

    $currentDate = date('Y-m-d');
    $job_status = ($deadline > $currentDate) ? 1 : 0; // active or inactive

    if ($salary < 0) {
        $_SESSION['status'] = "Salary must not be negative";
        header('Location: manage_vacancy-add.php');
        exit();
    }

    $sql = "INSERT INTO vacancies (job_title, job_desc, job_status, deadline, company_id, category_id, salary) 
            VALUES ('$job_title', '$job_desc', '$job_status', '$deadline', '$company_id', '$category_id', '$salary')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Vacancy created successfully";
        header('Location: manage_vacancy.php');
        exit();
    } else {
        $_SESSION['status'] = "Failed to create vacancy";
        header('Location: manage_vacancy-add.php');
        exit();
    }
}

?>