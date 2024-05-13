    <?php
    include("include/navbar.php");
    include("include/header.php");

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Job Application Form</title>
    </head>

    <body>
        <div class="container mt-5">
        <?php
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-primary" role="alert">
                ' . $_SESSION['status'] . '</div>';
        // Unset the session variable after displaying the message
        unset($_SESSION['status']);
    }
    ?>
            <h2 class="text-center mb-4">Job Application Form</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="applyDB.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="education">Educational Attainment</label>
                            <textarea class="form-control" id="education" name="education" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="resume">Resume (PDF or Word document less than 2 MB)</label>
                            <input type="file" class="form-control-file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

    </html>
