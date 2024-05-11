<?php



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
                <div class="mb-5">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae consectetur nisi. Vivamus vitae eleifend massa. Fusce lobortis nunc nec quam eleifend, at tempor urna fermentum. Nam ut augue nec libero fermentum consectetur nec id lectus. Integer accumsan turpis non odio volutpat hendrerit.</p>
                    <p>Integer lobortis, elit ac interdum venenatis, felis tortor elementum libero, sit amet posuere justo dolor id tellus. Cras id elit nec neque pulvinar blandit. Nam tempus diam non est malesuada, a sollicitudin ex ultricies. Nullam ac mauris eget turpis interdum placerat. Praesent nec est sit amet metus commodo facilisis
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum est quos laudantium blanditiis vero voluptatibus, esse doloribus adipisci rem nostrum commodi ipsum voluptatum, amet cupiditate velit facere nisi? Quibusdam?.</p>
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