<?php
$servername = "localhost";
$username = "root";
$user_pwd = "";
$db = "customer";
$con = mysqli_connect($servername, $username, $user_pwd, $db);

if(!$con){
    die("Connection is failed". mysqli_connect_error());
}

if(isset($_GET['del'])){
    $id = $_GET['del'];
    $query = "DELETE from std where sid = '$id'";
    if(mysqli_query($con, $query)){
        echo "<script>alert('Customer is deleted......');</script>";
        echo "<script>window.open('index.php','_self');</script>";

    }
}
?>