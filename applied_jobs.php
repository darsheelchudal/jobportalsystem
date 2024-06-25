<?php
session_start();
include("include/navbar.php");
include("include/header.php");
include("user/config/connection.php");

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "You must be logged in to view applied jobs.";
    header("Location: user/login.php");
    exit();
}

// Fetch user ID from session
if (!isset($_SESSION['user_id'])) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "User ID is missing from session.";
    header("Location: user/login.php");
}
$user_id = $_SESSION['user_id']; // Assuming user_id is correctly set in session

// Query to fetch applied jobs for the current user
$sql = "SELECT a.*, v.job_title, c.name AS company_name
        FROM applications a
        INNER JOIN vacancies v ON a.job_id = v.id
        INNER JOIN companies c ON v.company_id = c.id
        WHERE a.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_SESSION['status'])) {
            echo '<div class="alert alert-primary" role="alert">' . $_SESSION['status'] . '</div>';
            unset($_SESSION['status']);
        }
        ?>
        <h2 class="text-center mb-4">List of Applied Jobs</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Application Date</th>
                        <th>Resume</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['job_title']; ?></td>
                                <td><?php echo $row['company_name']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['application_date'])); ?></td>
                                <td><a href="<?php echo $row['resume']; ?>" target="_blank">View Resume</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="5" class="text-center">No applied jobs found.</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
include("include/footer.php");
include("include/script.php");
?>
