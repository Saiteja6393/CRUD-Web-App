<?php
session_start();

if(!isset($_SESSION['cid'])){
    echo "<script>window.open('login.php','_self')</script>";
} else{

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
<title>Customer Management System</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Management</b></h2></div>
                    <div class="col-sm-4">
                    <a href="add.php" role="button" class="btn btn-primary">Add Details</a>
                        <a href="logout.php" role="button" class="btn btn-primary">Logout</a>
                        <a href="profile.php" role="button" class="btn btn-primary">Profile</a>
 
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
				<thead>
					<tr>

						<th>First Name</th>
						<th>Last Name</th>
						<th>Father Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Subject</th>
						<th>Country</th>
						<th>City</th>
						<th>DOB</th>
						<th>Address</th>
						<th>Picture</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
                        <?php
                        $get_all_stds = "SELECT * from std where std.esid=$cid";

                        $objects = mysqli_query($con, $get_all_stds);
                        while($row = mysqli_fetch_array($objects)){
                            $sid =  $row['sid'];
                            $fname =  $row['fname'];
                            $lname =  $row['lname'];
                            $fathername =  $row['fathername'];
                            $email =  $row['email'];
                            $gender =  $row['gender'];
                            $subject =  $row['ssub'];
                            $country =  $row['country'];
                            $city =  $row['city'];
                            $dob =  $row['dob'];
                            $address =  $row['sadd'];
                            $picture =  $row['picture'];
                        ?>
						<td><?php echo $fname ?></td>
						<td><?php echo $lname ?></td>
						<td><?php echo $fathername ?></td>
						<td><?php echo $email ?></td>
						<td><?php echo $gender ?></td>
						<td><?php echo $subject ?></td>
						<td><?php echo $country ?></td>
						<td><?php echo $city ?></td>
						<td><?php echo $dob ?></td>
						<td><?php echo $address ?></td>
						<td>
						<img src="img/<?php echo $picture ?>" width="40px" height="40px" alt="img">
						</td>

				

						<td>
							<a href="edit.php?edit=<?php echo $sid; ?>" class="edit" data-toggle=""><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="del.php?del=<?php echo $sid; ?>" class="delete" data-toggle=""><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                        
                        <?php } ?>
				</tbody>
			</table>

        </div>
    </div>  
</div>   
</body>
</html>

<?php } ?>