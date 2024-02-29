<!DOCTYPE html>
<?php
session_start();
//server, username, user pwd, db name
$servername = "localhost";
$username = "root";
$user_pwd = "";
$db = "customer";
$con = mysqli_connect($servername, $username, $user_pwd, $db);

if(!$con){
    die("Connection is failed". mysqli_connect_error());
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title">Customer Login</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="cemail" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="cpwd" value="" class="form-control" >
                </div>
               
            <div class="modal-footer">
                <input type="submit" name="login" class="btn btn-success" value="Login">
            </div>
        </form>
        <p>Don't have account, then create your account at first.</p>
        <a href="register.php" role="button" class="btn btn-primary">Register</a>
<?php
if(isset($_POST['login'])){
    $cemail = $_POST['cemail'];
    $cpwd = $_POST['cpwd'];

    $query = "select * from customer_info where cemail = '$cemail' and cpwd='$cpwd'";
    $user_obj = mysqli_query($con, $query);
    $row = mysqli_fetch_array($user_obj);
    $id = $row['cid'];
    $num_of_obj = mysqli_num_rows($user_obj);
    // echo $num_of_obj;
    if($num_of_obj == 1){
        $_SESSION['cid'] = $id;
        echo "<script>window.open('index.php','_self');</script>";
    }
    else {
        echo "<script>alert('Your email or passowrd is incorrect, try again...');</script>";

    }

}


?>
</div>
</body>
</html>