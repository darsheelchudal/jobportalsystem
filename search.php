<?php
include("include/navbar.php");
include("include/header.php");
include("include/script.php");


// Database connection
require('config/connection.php');

if (isset($_POST['job_search'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['job_search']);

    // Basic search query
    $sql = "SELECT * FROM vacancies WHERE (job_title LIKE '%$search_query%' OR job_desc LIKE '%$search_query%')";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['job_title']; ?></h5>
                                <p class="card-text"><?php echo $row['job_desc']; ?></p>
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
