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
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary mr-4"> <a class="nav-link1" href="user/login.php"><i class="bi bi-people"></i>&nbsp Login / Signup</a></button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact number</label>
                    <input type="number" class="form-control" id="contact" placeholder="Enter your contact number">
                </div>
                <div class="mb-3">
                    <label for="question" class="form-label">Your Question</label>
                    <textarea class="form-control" id="question" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-5">
                <div class="mt-5 contact-info">
                    <div class="d-flex">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p class="ml-2">Lalchan Plaza, Hattisar, Kathmandu, Nepal</p>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-telephone-fill"></i>
                        <p class="ml-2">081540544</p>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-envelope"></i>
                        <p class="ml-2">sashangmagar20@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <?php
    include('include/footer.php');

    include('include/script.php')

    ?>
</body>

</html>

