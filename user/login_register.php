<?php
require('config/connection.php');
require('config/session_start.php');



?>

<?php
//for login
if (isset($_POST['login'])) {
    $query = "SELECT * FROM registered_users WHERE email='$_POST[email_username]' 
    OR username='$_POST[email_username]'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                //if password  matched
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                header("location:../index.php");
            } else {
                // //incorrect password
                // echo "<script>
                // alert('Incorrect password');
                // window.location.href= 'login.php';
                // </script>";
            }
        } else {
            // echo "<script>
            // alert('Email or username not registered');
            // window.location.href= 'login.php';
            // </script>";
        }
    } else {
        echo "<script>
        alert('Cannot run query');
        window.location.href= 'login.php';
        </script>";
    }
}




//for registration
if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM registered_users WHERE username='{$_POST['username']}' OR
     email='{$_POST['email']}'";

    $result = mysqli_query($conn, $user_exist_query);
    if ($result) {
        //It will be executed when username or email is already taken
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            //     if ($result_fetch['username'] == $_POST['username']) {
            //         echo "<script>
            // alert('$result_fetch[username] - Username already taken');
            // window.location.href='register.php';
            // </script>";
            //     } else {
            //         // error for email already registered
            //         echo "<script>
            // alert('$result_fetch[email] Email is already registered');
            // window.location.href= 'register.php';
            // </script>";
            //     }
        } else { //It will be executed if no one has taken username or email before
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO registered_users(full_name,username,email,password)
             VALUES('$full_name','$username','$email','$password') 
           ";
            if (mysqli_query($conn, $query)) {
                echo "<script>
                alert('Registration successful');
                window.location.href= 'login.php';
                </script>";
            } else {
                echo "<script>
                alert('Data cannot be inserted');
                window.location.href= 'register.php';
                </script>";
            }
        }
    } else {
        echo "<script>
        alert('Cannot run query');
        window.location.href= 'register.php';
        </script>";
    }
}
