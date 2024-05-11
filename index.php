<?php
require('user/config/connection.php');
include('user/config/session_start.php');




?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-aA+bdzmyQ7XqbWQg8oYbZ6q5ZCq2I6B3i8cDFOZtCvq9e6dbkVQI6tdd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-vxCGwXMXdmsE8/SFICh0gRxngmTwLfFOZXwiGHkbIl6v5b76r9h6hqrq2ePUB1uOAqE75aAeOhVaNBs0lHG6TZw==" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Job Portal System</title>
    <style>
        .navbar-custom-color {
            background: #254BBD;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar-brand,
        .nav-link {
            color: #F2FFFA;
        }

        .nav-link1 {
            color: #F2FFFA;
            text-decoration: none;
        }

        .navbar-brand:hover,
        .nav-link:hover {
            color: #F2FFFA;
        }

        .navbar-brand:hover,
        .nav-link1:hover {
            color: #F2FFFA;
            text-decoration: none;
        }



        #search-form {
            position: absolute;
            top: 200px;
            left: 0;
            right: 0;
            max-width: 800px;
            padding: 20px 20px 0;
            text-align: center;
        }

        .home-image {
            text-align: center;
        }

        h1.home-image img {
            margin: 0 auto;


        }

        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .block .block-content {
            padding-top: 18px;
            clear: both;
        }

        .hero-form input[type=text] {
            height: 50px;
            width: 400px;
            margin: 0 10px 0 0;
            border-radius: 10px;

        }

        .hero-form select {
            height: 50px;
            width: 200px;
            margin: 0 10px 0 0;
            border-radius: 10px;

        }

        .hero-form input[type=submit] {
            font-size: 14px;
            background-color: #254BBD;
            height: 50px;
            width: 100px;
            border-radius: 20px;
            color: #F2FFFA;
        }

        .heroimage {
            background-size: cover;
            width: 100%;
            min-height: 500px;
        }

        @media screen and (max-width: 768px) {
            .hero-form select {
                width: 100%;
            }
        }
    </style>

</head>


<body>



    <?php



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


                    <li class="nav-item active">
                        <a class="nav-link ml-4" href="#"><i class="bi bi-person"></i></a>
                    </li>' . '

                    <li class="nav-item">
                        <button type="button" class="btn btn-primary mr-4"> <a class="nav-link1" href="user/logout.php">&nbsp Logout</a></button>

                    </li>;



                    '<li class="nav-item">
                        <button type="button" class="btn btn-primary mr-4"><a class="nav-link1" href="user/login.php"><i class="bi bi-people"></i>&nbsp;Login / Signup</a></button>
                    </li>';









                </ul>
            </div>
        </div>
    </nav>


    <div id="highlighted">
        <div id="search-form" class="container">
            <div class="row">
                <div class="cols-12">
                    <div class="mod-search block">




                        <div class="block-content">
                            <form action="#" class="hero-form form-inline" id="hero-form" method="post" role="form">


                                <div class="form-group">
                                    <label class="control-label sr-only" for="text">Enter Job Title</label>
                                    <input id="text" class="form-control" name="job_search" placeholder="Enter Job Title" type="text">
                                    <label class="control-label sr-only" for="services-select">Choose Categories</label>
                                    <select>
                                        <option value="">
                                            Choose Categories
                                        </option>
                                        <?php
                                        $sql = "SELECT * FROM categories";
                                        $res = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($res) > 0) {
                                            foreach ($res as $value) {
                                        ?>
                                                <option value="<?php echo $value['category'] ?>">
                                                    <?php echo $value['category'] ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>


                                    </select>

                                    <input id="Get Started" class="form-control btn btn-lg btn-default" type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="heroimage-wrapper">
            <div class="heroimage">

                <img src="image/hero1.jpg" alt="" srcset="" height="450px" width="100%">

            </div>

        </section>

    </div>
    <h2 class="text-center ">LISTED JOBS</h2>
    <div class="container-fluid mb-4">
        <div class="col-md-12 mt-5">
            <div class="row">
                <?php
                $sql = "SELECT * FROM vacancies";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    foreach ($res as $row) {
                        if ($row['job_status'] == 1) {
                            $company_id = $row['company_id'];
                            $company_sql = "SELECT name, image FROM companies WHERE id = $company_id";
                            $company_res = mysqli_query($conn, $company_sql);
                            $company_row = mysqli_fetch_assoc($company_res);
                            $company_name = $company_row['name'];
                            $company_image = $company_row['image'];
                            $category_id = $row['category_id'];
                            $category_sql = "SELECT category FROM categories WHERE id=$category_id";
                            $category_res = mysqli_query($conn, $category_sql);
                            $category_row = mysqli_fetch_assoc($category_res);
                            $category_name = $category_row['category'];

                ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                            <img src="<?php echo "admin/uploads/" . $company_image ?>" alt="<?php echo $company_name ?>" height="200    px" width="100%">
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <h3 class="card-title mb-0 ml-3"><i class="bi bi-building"></i> <?php echo $company_name ?></h3>
                                        </div>
                                        <div class="mb-3">
                                            <h5 class="card-title"><i class="bi bi-briefcase"></i> <?php echo $row['job_title'] ?></h5>

                                            <p class="card-text mb-1"><i class="bi bi-calendar4-event"></i> <b>&nbspDeadline:</b> <?php echo $row['deadline'] ?></p>

                                            <p class="card-text mb-1"><i class="bi bi-card-list"></i> <b>&nbspCategory:</b> <?php echo $category_name ?></p>

                                        </div>
                                        <div class="text-center">
                                            <?php

                                            ?>
                                            <a href="#" class="btn btn-primary btn-lg">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                } else {
                    echo "<p>No vacancies found</p>";
                }
                ?>
            </div>


        </div>
    </div>

    <h2 class="text-center ">COMPANY</h2>
    <div class="container-fluid mb-4">
        <div class="col-md-12 mt-5">
            <div class="row">
                <?php
                $sql = "SELECT * FROM companies";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    foreach ($res as $value) {
                ?>
                        <div class="col-md-3">
                            <div class="card h-100" style="width: 18rem;">
                                <img src="<?php echo "admin/uploads/" . $value['image'] ?>" class="card-img-top" alt="image" height="250px" width="250px">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="bi bi-building"></i> <?php echo $value['name'] ?></h5>
                                    <p class="card-text"><i class="bi bi-envelope"></i> <?php echo $value['email'] ?></p>
                                </div>
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i> <?php echo $value['location'] ?></li>
                                </ul>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <h2 class="text-center mt-10">CATEGORY</h2>
    <div class="container-fluid mt-5 mb-3">
        <div class="col-md-12">

            <div class="row">
                <?php
                $sql = "SELECT * FROM categories";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    foreach ($res as $value) {
                ?>
                        <div class="col-md-3">
                            <ul>
                                <b>
                                    <li>
                                        <a href="vacancy_category.php?category_id=<?php echo $value['id'] ?>">
                                            <?php echo $value['category'] ?>
                                    </li>
                                    </a>
                                </b>

                            </ul>
                        </div>
                <?php
                    }
                }

                ?>


            </div>
        </div>
    </div>


</body>


<?php
include('include/footer.php');
include('include/script.php');


?>

</html>