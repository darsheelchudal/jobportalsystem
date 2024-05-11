<?php
include('config/dbcon.php');
include('config/session_start.php');



//To update user
if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $roleID = mapRoleToID($role);

    if (empty($name) || empty($username) || empty($password) || empty($role)) {
        $_SESSION['status'] = "Field cannot be left empty";
        header("Location: manage_users-edit.php?user_id=" . $user_id);
        exit(); // Stop further execution   
    }

    $check_username = "SELECT * FROM admin_login WHERE username='$username'";
    $check_usernameRes = mysqli_query($conn, $check_username);
    if (mysqli_num_rows($check_usernameRes) > 0) {
        $_SESSION['status'] = "Username already exists, Try new username";
        header('Location:manage_users-edit.php?user_id=' . $user_id);
        exit();
    }


    $sql = "UPDATE admin_login SET name='$name',username='$username',password='$password',role='$roleID' WHERE id='$user_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['status'] = "User updated successfully";
        header("Location:manage_users.php");
        exit();
    } else {
        $_SESSION['status'] = "User updation failed";
        header("Location:manage_users.php");
        exit();
    }
}






//To create user
function mapRoleToID($role)
{
    switch ($role) {
        case 'Admin':
            return 1;
            break;
        case 'Employer':
            return 2;
            break;
        case 'HR Manager':
            return 3;
            break;
        default:
            return null;
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check_username = "SELECT * FROM admin_login WHERE username='$username'";
    $check_usernameRes = mysqli_query($conn, $check_username);
    if (mysqli_num_rows($check_usernameRes) > 0) {
        $_SESSION['status'] = "Username already exists, Try new username";
        header('Location:manage_users.php');
        exit();
    }

    $roleID = mapRoleToID($role);
    if ($roleID !== null) {
        $sql = "INSERT INTO admin_login(name,username,password,role) VALUES('$name','$username','$password','$roleID')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            $_SESSION['status'] = "User added successfully";
            header("Location:manage_users.php");
            exit();
        } else {
            $_SESSION['status'] = "User registration failed";
            header("Location:manage_users.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Invalid Role Selected";
        header("Location:manage_users.php");
        exit();
    }
}
