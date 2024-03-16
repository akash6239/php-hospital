<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<?php include('navbar.php'); ?>
<div  class="container">
<p class=" text-center p-2">Welcome to our hospital's registration website. We offer a wide range 
        of services, including inpatient and outpatient care, surgery, and 
        diagnostic testing. To register for an appointment, please visit our 
        website and provide some basic information. We also offer online bill 
        pay, medical records requests, and patient education resources. We hope
         you find our website helpful.</p>

    <div class="container form_container">
        <h2 class="text-center text-info mt-2">Registration</h2>
        <form class="border rounded  p-2" action="action.php" method="POST">
        <?php
            if (isset($_COOKIE['register_success'])){
                if ($_COOKIE['register_success']=='register done'){
        ?>
                    <div class="container alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Your appointment </strong> Successfull !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

        <?php
                }
            }        
        ?>    
            <div class="form-row">
                <div class="col">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Age</label>
                <input type="number" name="age" class="form-control" id="exampleInputPassword1" placeholder="Age">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Disease</label>
                <textarea name="disease" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button name="register" type="submit" class="btn btn-outline-success btn-block">Register</button>
        </form>
    </div>
</div>
</body>
</html>