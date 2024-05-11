<?php
require('user/config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Contact Us</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar-custom-color {
            background: #254BBD;
        }

        .navbar-brand,
        .nav-link {
            color: #F2FFFA;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #F2FFFA;
        }

        .nav-link1 {
            color: #F2FFFA;
            text-decoration: none;
        }

        .nav-link1:hover {
            color: #F2FFFA;
            text-decoration: none;
        }

        .container {
            padding: 30px;
        }

        .form-control {
            height: 52px;
        }

        .contact-info {
            color: #fff;
        }

        @media only screen and (max-width: 768px) {
            .col-md-5 {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    // jobs.php

    // Assuming $conn is your database connection
    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];

        // Query to fetch jobs based on the selected category
        $sql = "SELECT * FROM vacancies WHERE category_id = $category_id";
        $res = mysqli_query($conn, $sql);
    ?>
        <nav class="navbar navbar-expand-lg navbar-custom-color">
            <img src="image/JagirAddaLogo.png" height="100px" width="100px">
            <a class="navbar-brand" href="index.php">JAAGIR ADDA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mr-auto">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link ml-4" href="index.php">Home</a>
                    </li>


                    <li class="nav-item active">
                        <a class="nav-link ml-4" href="about.php">About Us</a>
                    </li>


                    <li class="nav-item active">
                        <a class="nav-link ml-4" href="contact.php">Contact Us</a>
                    </li>








                </ul>
            </div>
            <div class="ml-auto d-flex justify-content-between">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <?php
                        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        ?>
                            <li class="nav-item active">
                                <a class="nav-link ml-4" href="#"><i class="bi bi-person"></i>' . $_SESSION['username'] . '</a>
                            </li>' . '

                            <li class="nav-item">
                                <button type="button" class="btn btn-primary mr-4"> <a class="nav-link1" href="user/logout.php">&nbsp Logout</a></button>

                            </li>';
                        <?php
                        } else { ?>

                            '<li class="nav-item">
                                <button type="button" class="btn btn-primary mr-4"><a class="nav-link1" href="user/login.php"><i class="bi bi-people"></i>&nbsp;Login / Signup</a></button>
                            </li>';
                        <?php } ?>








                    </ul>
                </div>
            </div>
        </nav>

        <h2 class="text-center mt-5">JOBS FOR SELECTED CATEGORY</h2>
        <div class="container-fluid mt-5 mb-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <?php
                            if (mysqli_num_rows($res) > 0) {
                                while ($job = mysqli_fetch_assoc($res)) {
                                    echo "<li>{$job['job_title']}</li>"; // Assuming 'job_title' is a column in your 'jobs' table
                                }
                            } else {
                                echo "<li>No jobs found for this category.</li>";
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    <?php
    } else {
        echo "Category ID is not specified.";
    }
    ?>



</body>
<?php
include('include/script.php');


?>

</html>