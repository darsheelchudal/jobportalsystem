<?php

session_start();
?>

<nav class="navbar navbar-expand-lg navbar-custom-color">
    <img src="image/JagirAddaLogo.png" height="100px" width="100px">
    <a class="navbar-brand" href="#">JAAGIR ADDA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="mr-auto">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link ml-4" href="index.php">Home</a>
            </li>
           
<?php
if (!isset($_SESSION['logged_in'])) { // If not logged in, display About Us and Contact Us
    ?>
    <li class="nav-item active">
        <a class="nav-link ml-4" href="about.php">About Us</a>
    </li>

    <li class="nav-item active">
        <a class="nav-link ml-4" href="contact.php">Contact Us</a>
    </li>
    <?php
} 
?>


        </ul>
    </div>
    <div class="ml-auto d-flex justify-content-between">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <?php
// Check if $_SESSION['logged_in'] is not set or is false, then display login/signup button
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
?>
    <li class="nav-item">
        <button type="button" class="btn btn-primary mr-4">
            <a class="nav-link1" href="user/login.php">
                <i class="bi bi-people"></i>&nbsp;Login / Signup
            </a>
        </button>
    </li>
<?php
} else {
?>
    <li class="nav-item">
        <button type="button" class="btn btn-primary mr-4">
            <a class="nav-link1" href="user/logout.php">
                &nbsp;Logout
            </a>
        </button>
    </li>
<?php
}
?>



              

            </ul>
        </div>
    </div>
</nav>