<!DOCTYPE html>
<?php include('connection.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update Patient</title>
</head>
<body>
<?php include('navbar.php'); ?>
<div  class="container">
    <div class="container ">
        <h2 class="text-center text-info mt-2">Update Record</h2>
        <?php
            if (isset($_GET['id'])){
                $patient_id = $_GET['id'];

                $select_patient = "select * from patients where Patient_id='$patient_id';";
                $patient_raw = mysqli_query($response,$select_patient);
                $patient = mysqli_fetch_assoc($patient_raw);
            }
        ?>
        <form class="border rounded  p-2" action="action.php" method="POST">
            <div class="form-row">
                <div class="col">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $patient['First_name']; ?>">
                    <input type="hidden" name="patient_id" class="form-control" placeholder="First name" value="<?php echo $patient['Patient_id']; ?>">
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $patient['Last_name']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $patient['Email']; ?>" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone" value="<?php echo $patient['Phone']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Age</label>
                <input type="number" name="age" class="form-control" id="exampleInputPassword1" placeholder="Age" value="<?php echo $patient['Age']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Disease</label>
                <textarea name="disease" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $patient['Disease']; ?></textarea>
            </div>
            <button name="update" type="submit" class="btn btn-outline-success btn-block">Update</button>
        </form>
    </div>
</div>
</body>
</html>