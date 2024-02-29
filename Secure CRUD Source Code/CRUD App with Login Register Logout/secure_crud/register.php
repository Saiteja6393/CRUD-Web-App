<!DOCTYPE html>
<?php
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
    <title>Register Customer</title>
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
                <h4 class="modal-title">Customer Registeration</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="cname" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="cemail" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="cpwd" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="ccity" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Order</label>
                    <input type="number" name="corder" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text" name="ccountry" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Picture</label>
                    <input type="file" name="cimg" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" name="register" class="btn btn-success" value="Register">
            </div>
        </form>
  <?php
if(isset($_POST['register'])) {
    $cname =  $_POST['cname'];
    $cemail =  $_POST['cemail'];
    $cpwd =  $_POST['cpwd'];
    $ccity =  $_POST['ccity'];
    $corder =  $_POST['corder'];
    $ccountry =  $_POST['ccountry'];
    $cimg =  $_FILES['cimg']['name'];
	$cimg_temp =  $_FILES['cimg']['tmp_name'];

	move_uploaded_file($cimg_temp, "img/$cimg");

    $query = "INSERT INTO customer_info (cname, cemail, cpwd, ccity, corder, ccountry, cimg) values ('$cname', '$cemail', '$cpwd', '$ccity', '$corder', '$ccountry', '$cimg')";
    if(mysqli_query($con, $query)){
        echo "<script>window.open('login.php', '_self')</script>";
    }
}
  
  
  ?>  
</div>
</body>
</html>