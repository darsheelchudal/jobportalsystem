<?php
$conn = mysqli_connect('localhost', 'root', '', 'jobportaldb');
if (!$conn) {
    die('Connection failed' . mysqli_connect_error());
}
