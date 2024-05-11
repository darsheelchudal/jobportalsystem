<?php
include('config/session_start.php');
include('config/dbcon.php');

?>

<!--Category Update-->
<?php
if (isset($_POST['update'])) {
    $category_id = $_POST['category_id'];
    $category = $_POST['category'];

    if (empty($category)) {
        $_SESSION['status'] = "Field cannot be left empty";
        header("Location:manage_category-edit.php?category_id=" . $category_id);
        exit();
    }
    $check_category = "SELECT * FROM categories WHERE category='$category'";
    $check_categoryRes = mysqli_query($conn, $check_category);
    if (mysqli_num_rows($check_categoryRes) > 0) {
        $_SESSION['status'] = "Category name cannot be same or repeated";
        header('Location:manage_category-edit.php?category_id=' . $category_id);
        exit();
    }
    $sql = "UPDATE categories SET category='$category' WHERE id='$category_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Category successfully updated";
        header("Location:manage_category.php");
        exit();
    } else {
        $_SESSION['status'] = "Category updation failed";
        header("Location:manage_category.php");
        exit();
    }
}

?>

<!--Category create-->
<?php
if (isset($_POST['submit'])) {
    $category = $_POST['category'];

    $check_category = "SELECT * FROM categories WHERE category='$category'";
    $check_categoryRes = mysqli_query($conn, $check_category);
    if (mysqli_num_rows($check_categoryRes) > 0) {
        $_SESSION['status'] = "Category name cannot be same or repeated";
        header('Location:manage_category.php');
        exit();
    }
    $sql = "INSERT INTO categories(category) VALUES('$category')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "Category added successfully";
        header("Location:manage_category.php");
        exit();
    } else {
        $_SESSION['status'] = "Category registration failed";
        header("Location:manage_category.php");
        exit();
    }
}


?>