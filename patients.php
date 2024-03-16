<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Patients</title>
</head>
<body>
<?php include('navbar.php'); ?>
<?php 
include('connection.php');
if (!isset($_SESSION['doctor_id'])){
  header('location:index.php');
}

?>
<h1 class="text-center text-info">Patients</h1>
<?php
      if (isset($_COOKIE['print_success'])){
?>
      <div class="container alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sheet Saved</strong> File is saved named as "Patient.txt" on desktop
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php
      }
?>
<a href="action.php?print=1" class="btn btn-outline-dark btn-block container mt-2 mb-2">Print</a>
<table class="table table-bordered container table-hover">
  <thead>
    <tr  class="table-info">
      <th scope="col">Patient ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Disease</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
      if(isset($_GET['search_btn'])){
            $user_search  = $_GET['user_search']; 
            
            $patient_records = "select * from patients where First_name like '%$user_search%'
            or Last_name like '%$user_search%' or Phone like '%$user_search%' or 
            Email like '%$user_search%'or Disease like '%$user_search%';";

            $patient_raw_data = mysqli_query($response,$patient_records);

            if ($patient_raw_data->num_rows>0){
                while($patient_data = mysqli_fetch_assoc($patient_raw_data)){
        ?>
                <tr>
                    <th scope="row"><?php echo $patient_data['Patient_id'] ?></th>
                    <td><?php echo $patient_data['First_name'] ?> <?php echo $patient_data['Last_name'] ?></td>
                    <td><?php echo $patient_data['Age'] ?></td>
                    <td><?php echo $patient_data['Phone'] ?></td>
                    <td><?php echo $patient_data['Email'] ?></td>
                    <td><?php echo $patient_data['Disease'] ?></td>
                    <td>
                        <a class="btn btn-outline-danger" href="action.php?id=<?php echo $patient_data['Patient_id']; ?>">Delete</a>
                        <a class="btn btn-outline-success" href="update_patient.php?id=<?php echo $patient_data['Patient_id']; ?>">Edit</a>
                    </td>
                </tr>
    <?php
                }
            }
      }else{
        $patient_records = "select * from patients;";
        $patient_raw_data = mysqli_query($response,$patient_records);

        if ($patient_raw_data->num_rows>0){
            while($patient_data = mysqli_fetch_assoc($patient_raw_data)){
    ?>
            <tr>
                <th scope="row"><?php echo $patient_data['Patient_id'] ?></th>
                <td><?php echo $patient_data['First_name'] ?> <?php echo $patient_data['Last_name'] ?></td>
                <td><?php echo $patient_data['Age'] ?></td>
                <td><?php echo $patient_data['Phone'] ?></td>
                <td><?php echo $patient_data['Email'] ?></td>
                <td><?php echo $patient_data['Disease'] ?></td>
                <td>
                    <a class="btn btn-outline-danger" href="action.php?id=<?php echo $patient_data['Patient_id']; ?>">Delete</a>
                    <a class="btn btn-outline-success" href="update_patient.php?id=<?php echo $patient_data['Patient_id']; ?>">Edit</a>
                </td>
            </tr>
    <?php
            }
        }
      }
    ?>
  </tbody>
</table>
</body>
</html>