<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "You must be logged in to view applied jobs.";
    header("Location: user/login.php");
    exit();
}

// Check if user ID is set
if (!isset($_SESSION['user_id'])) {
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "User ID not set.";
    header("Location: user/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Database connection
include("user/config/connection.php");

// Query to fetch applied jobs with company and category details
$sql = "SELECT a.*, v.job_title, v.deadline, v.company_id, v.category_id, 
               c.name AS company_name, c.image AS company_image, 
               cat.category AS category_name
        FROM applications a
        INNER JOIN vacancies v ON a.vacancy_id = v.id
        INNER JOIN companies c ON v.company_id = c.id
        INNER JOIN categories cat ON v.category_id = cat.id
        WHERE a.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Fetch results
$applied_jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .card { margin-bottom: 20px; }
        .admin-message {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px;
            margin-top: 10px;
        }
        .company-image { max-height: 100px; width: auto; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">List of Applied Jobs</h2>
        
        <?php if (count($applied_jobs) > 0): ?>
            <?php foreach ($applied_jobs as $job): ?>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="admin/uploads/<?php echo htmlspecialchars($job['company_image']); ?>" alt="<?php echo htmlspecialchars($job['company_name']); ?>" class="company-image mr-3">
                            <div>
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($job['company_name']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($job['category_name']); ?></h6>
                            </div>
                        </div>
                        <h5 class="card-title"><?php echo htmlspecialchars($job['job_title']); ?></h5>
                        <p class="card-text">Deadline: <?php echo htmlspecialchars($job['deadline']); ?></p>
                        <p class="card-text">Address: <?php echo htmlspecialchars($job['address']); ?></p>
                        <p class="card-text">Education: <?php echo htmlspecialchars($job['education']); ?></p>
                        <p class="card-text">Resume: <a href="<?php echo htmlspecialchars($job['resume']); ?>" target="_blank">View Resume</a></p>
                        <p class="card-text">Status: <span class="badge badge-<?php echo $job['status'] == '1' ? 'success' : 'secondary'; ?>"><?php echo $job['status'] == '1' ? 'Accepted' : 'Pending'; ?></span></p>
                        <?php if (!empty($job['message'])): ?>
                            <div class="admin-message">
                                <strong>Admin Message:</strong> <?php echo nl2br(htmlspecialchars($job['message'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                No applied jobs found.
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
