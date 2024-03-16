<?php
session_start();
include('connection.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-center text-info" href="#">Hospital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="patients.php">Patients</a>
            </li>
        </ul>
        <form method="GET" action="patients.php" class="form-inline my-2 my-lg-0">
            <input name="user_search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button name="search_btn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php 
            if (isset($_SESSION['doctor_id'])){
        ?>
                <a class="btn btn-outline-danger ml-2" href="logout.php">Log Out</a>
                <div class='ml-3'>
                    <center>

                        <span>Hello</span>
                        <span>Dr. <?php echo $_SESSION['doctor_name'];?>
                            <!-- <?php 
                            $doctor_id = $_SESSION['doctor_id'];
                            
                            $select_doctor = "select * from doctors where Doctor_ID=$doctor_id;";
                            
                            $query_res = mysqli_query($response,$select_doctor);
                            
                            $doctor = mysqli_fetch_assoc($query_res);
                            
                            echo $doctor['First_name'];
                            ?> -->
                            </span>
                    </center>
                </div>
        <?php
            }else{
        ?>
                <a class="btn btn-outline-dark ml-2" href="login.php">Log In</a>
                <a class="btn btn-outline-primary ml-2" href="signup.php">Sign Up</a>
        <?php
            }
        ?>
    </div>
</nav>