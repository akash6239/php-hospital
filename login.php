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
    <title>Log in</title>
</head>
<body>
<?php include('navbar.php'); ?>
<h1 class="text-center text-info">Log in</h1>
<div class="container d-flex align-items-center justify-content-center">
    <form class="login_form" method='POST' action='action.php'>
        <?php
            if (isset($_COOKIE['login_success'])){
                if ($_COOKIE['login_success']=='doctor not found'){
        ?>
                    <div class="container alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email Or Password</strong> Doesn't Match !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        <?php
                }
            }
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name='password' type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <center>
                <p>If you don't have an account? <a href="signup.php">Sign Up</a></p>
                <button name='login' type="submit" class="btn btn-outline-primary pr-5 pl-5">Log In</button>
        </center>
        </form>
    </div>
</body>
</html>