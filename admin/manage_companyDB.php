<?php
include('config/session_start.php');
include('config/dbcon.php');
?>

<!--Updating data -->
<?php
if (isset($_POST['update'])) {
    $company_id = $_POST['company_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    if ($image != '') {
        $update_filename = $_FILES['image']['name'];
    } else {
        $update_filename = $old_image;
    }
    if (empty($name) || empty($email) || empty($location)) {
        $_SESSION['status'] = "Field cannot be left empty";
        header("Location:manage_company-edit.php?company_id=" . $company_id);
        exit();
    }
    $check_company = "SELECT * from companies WHERE name='$name' OR email='$email'";
    $check_companyRes = mysqli_query($conn, $check_company);

    if (mysqli_num_rows($check_companyRes) > 0) {
        $_SESSION['status'] = "Company name or email must not be same or repeated";
        header('Location:manage_company-edit.php?company_id=' . $company_id);
        exit();
    }


    $sql = "UPDATE companies SET name='$name',email='$email',location='$location',image='$update_filename' WHERE id='$company_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        if ($_FILES['image']['name'] != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name']);
            unlink("uploads/" . $old_image);
        }
        $_SESSION['status'] = "Company updated successfully";
        header("Location:manage_company.php");
        exit();
    } else {
        $_SESSION['status'] = "Company update failed";
        header("Location:manage_company.php");
        exit();
    }
}

?>






<!--Inserting data -->
<?php
if (isset($_POST['submit'])) {
    echo "File upload detected";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];
    //Image validation
    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    $check_company = "SELECT * from companies WHERE name='$name' OR email='$email'";
    $check_companyRes = mysqli_query($conn, $check_company);

    if (mysqli_num_rows($check_companyRes) > 0) {
        $_SESSION['status'] = "Company name or email must not be same";
        header('Location:manage_company.php');
        exit();
    }

    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "You are only allowed jpg, jpeg,png and gif";
        header("Location:manage_company.php");
    } else {


        //Image already exists
        if (file_exists("uploads/" . $_FILES['image']['name'])) {
            $filename = $_FILES['image']['name'];
            $_SESSION['status'] = "Image already exists " . $filename;
            header("Location:manage_company.php");
        } else {


            $sql = "INSERT INTO companies(name,email,location,image) VALUES('$name','$email','$location','$image')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name']);
                $_SESSION['status'] = "Company added successfully";
                header("Location:manage_company.php");
                exit();
            } else {
                $_SESSION['status'] = "Company Registration Failed";
                header("Location:manage_company.php");
                exit();
            }
        }
    }
}


?>