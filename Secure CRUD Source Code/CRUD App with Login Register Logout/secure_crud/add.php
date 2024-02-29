<?php
session_start();

if(!isset($_SESSION['cid'])){
    echo "<script>window.open('login.php','_self')</script>";
} else{

    //require 'vendor/autoload.php';
    
    //server, username, user pwd, db name
    $servername = "localhost";
    $username = "root";
    $user_pwd = "";
    $db = "customer";
    $con = mysqli_connect($servername, $username, $user_pwd, $db);

    if(!$con){
        die("Connection is failed". mysqli_connect_error());
    }

    $cid = $_SESSION['cid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Student Management CRUD App</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" name="fathername" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>	
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" class="form-control">
                            <option value="pak">Pakistan</option>
                            <option value="usa">USA</option>
                            <option value="ind">India</option>
                            <option value="iran">Iran</option>
                            <option value="UE">UE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control">
                    </div>						
                    <div class="form-group">
                        <label>DOB</label>
                        <input type="date" name="dob" class="form-control">
                    </div>	
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Picture</label>
                        <input type="file" name="picture" class="form-control">
                    </div>		
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" name="addstd" class="btn btn-success" value="Add">
                </div>
                
            </form>
        
            <?php
            
            if(isset($_POST['addstd'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $fathername = $_POST['fathername'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $subject = $_POST['subject'];
                $country = $_POST['country'];
                $city = $_POST['city'];
                $dob = $_POST['dob'];
                $address = $_POST['address'];
                $picture = $_FILES['picture']['name'];
                $picture_tmp = $_FILES['picture']['tmp_name'];
            
                move_uploaded_file($picture_tmp, "img/$picture");
            
                $query = "INSERT INTO std (esid, fname, lname, fathername, email, gender, ssub, country, city, dob, sadd, picture) values ('$cid','$fname', '$lname', '$fathername', '$email', '$gender', '$subject', '$country', '$city', '$dob', '$address', '$picture')";
                if (mysqli_query($con, $query)){
                    // If data is successfully inserted into the database

                    // Send email notification
                    $to = $email; // Recipient email address
                    $subject = 'Details Added Successfully';
                    $message = 'Your details have been added successfully.';
                    $headers = "From: vilesolid@gmail.com";

                    
                    // Send email using PHP's mail function
                    if(mail($to, $subject, $message, $headers)){
                        echo "<script>alert('Email notification sent successfully.')</script>";
                    } else {
                        echo "<script>alert('Failed to send email notification.')</script>";
                    }
                    
                    // Redirect the user to the homepage or any other page
                    echo "<script>window.open('index.php', '_self')</script>";
                } else {
                    // If data insertion fails, display an error message
                    echo "<script>alert('Failed to add student details.')</script>";
                }
            }
            
            ?>
        </div>
    </div>
</div>
</body>
</html>

<?php } ?>
