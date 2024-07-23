<?php
include("include/navbar.php");
include("include/header.php");
include("include/script.php");

// Database connection
require('config/connection.php');

if (isset($_POST['job_search'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['job_search']);

    // Updated search query with joins to fetch company and category details
    $sql = "SELECT v.id, v.job_title, v.job_desc, v.deadline, v.company_id, v.category_id, 
                   c.name AS company_name, c.image AS company_image, 
                   cat.category AS category_name
            FROM vacancies v
            INNER JOIN companies c ON v.company_id = c.id
            INNER JOIN categories cat ON v.category_id = cat.id
            WHERE (v.job_title LIKE '%$search_query%' OR v.job_desc LIKE '%$search_query%')";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $vacancy_id = $row['id']; // Get the vacancy ID
                ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="admin/uploads/<?php echo htmlspecialchars($row['company_image']); ?>" alt="<?php echo htmlspecialchars($row['company_name']); ?>" height="100px" width="100px">
                                    <h5 class="card-title mb-0 ml-3"><?php echo htmlspecialchars($row['company_name']); ?></h5>
                                </div>
                                <h5 class="card-title"><?php echo htmlspecialchars($row['job_title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['job_desc']); ?></p>
                                <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($row['category_name']); ?></p>
                                <p class="card-text"><strong>Deadline:</strong> <?php echo htmlspecialchars($row['deadline']); ?></p>
                                <div class="text-center">
                                    <!-- Include vacancy_id in the URL -->
                                    <a href="apply.php?vacancy_id=<?php echo $vacancy_id; ?>" class="btn btn-primary btn-md">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        echo "<div class='container'><p class='text-center'>No results found.</p></div>";
    }
}

// Close database connection
mysqli_close($conn);
?>
