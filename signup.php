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
    <title>Sign Up</title>
</head>
<body>
<?php include('navbar.php'); ?>
<h1 class="text-center text-info ">Sign Up</h1>
<div class="container d-flex align-items-center justify-content-center">
    <form class="login_form" action='action.php' method='POST'>
        <?php
            if (isset($_COOKIE['signup_success'])){
                if ($_COOKIE['signup_success']=='signup done'){
        ?>
                    <div class="container alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sign Up</strong> Successfull !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        <?php
                }elseif ($_COOKIE['signup_success']=='email not match'){
        ?>
                    <div class="container alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email Already Exists !</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>            
        <?php
                }elseif ($_COOKIE['signup_success']=='password not match'){
        ?>
                    <div class="container alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Password Doesn't Matched !</strong>
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
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" name='first_name' class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name='last_name' class="form-control" placeholder="Last name">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name='confirm_password' class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
        </div>
        <center>
                <p>If you already have an account, just <a href="login.php">Log In</a></p>
                <button name='signup' type="submit" class="btn btn-outline-primary pr-5 pl-5">Sign Up</button>
        </center>
    </form>
    </div>
</body>
</html>