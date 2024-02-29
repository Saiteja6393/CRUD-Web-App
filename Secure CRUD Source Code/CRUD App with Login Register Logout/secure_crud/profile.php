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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <title>Profile</title>
    <style>
        .gradient-custom {
/* fallback for old browsers */
background: #f6d365;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
    </style>
</head>
<body>
                    <?php 
                    $id =  $_SESSION['cid'];
                    $query = "select * from customer_info where cid = '$id' ";
                    $obj = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($obj);

                    ?>
    <section class="vh-100" style="background-color: #f4f5f7;">
    
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
            <a href="index.php" role="button" class="btn btn-success">Homepage</a>
              <div class="card mb-3" style="border-radius: .5rem;">
                
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="img/<?php echo $row['cimg']; ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px; height:60px;" />
                   

                    <h5><?php echo $row['cname']; ?></h5>
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-4">
                      <h6>Email Address</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-8 mb-3">
                          <h6>Email</h6>
                          <p class="text-muted"><?php echo $row['cemail']; ?></p>
                        </div>
                        <div class="col-4 mb-3">
                          <h6>Order</h6>
                          <p class="text-muted"><?php echo $row['corder']; ?></p>
                        </div>
                      </div>
                      <h6>Address</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-8 mb-3">
                          <h6>Country</h6>
                          <p class="text-muted"><?php echo $row['ccountry']; ?></p>
                        </div>
                        <div class="col-4 mb-3">
                          <h6>City</h6>
                          <p class="text-muted"><?php echo $row['ccity']; ?></p>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>
