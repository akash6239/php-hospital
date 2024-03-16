<?php include('connection.php'); ?>

<!-- Registering the user into database -->

<?php
if (isset($_POST['register'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $disease = $_POST['disease'];
    
    $register_query = "insert into patients(First_name,Last_name,Age,Phone,Email,Disease) 
    values ('$first_name','$last_name',$age,'$phone','$email','$disease');";
    
    $qurey_res = mysqli_query($response,$register_query);
    if ($qurey_res){
        setcookie('register_success','register done',time() + 10,"/");
                    header('location:index.php');
        
    }else{
        echo "please enter correct detail ";
    }

}
?>
<!-- Delete record -->
<?php
if (isset($_GET['id'])){
    $patient_id = $_GET['id'];
    $delete_query = "delete from patients where Patient_id='$patient_id';";
    $qurey_res = mysqli_query($response,$delete_query);
    if ($qurey_res){
        header('location:patients.php');
    }else{
        echo "Server Error";
    }
}

?>
<!-- Edit record -->
<?php
if (isset($_POST['update'])){
    $patient_id = $_POST['patient_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $disease = $_POST['disease'];
    
    $update_query = "update patients set First_name='$first_name',Last_name='$last_name',
    Age='$age',Phone='$phone',Email='$email',
    Disease='$disease' where Patient_id='$patient_id';";
    
    $qurey_res = mysqli_query($response,$update_query);
    if ($qurey_res){
        header('location:patients.php');
    }else{
        echo "Something went wrong";
    }

}
?>
<!-- Print Record -->
<?php
if (isset($_GET['print'])){
    $file = fopen('C:\\Users\\Sukh-e\\Desktop\\Patients.txt','w') or die('File not found');
    fclose($file);

    $patient_records = "select * from patients;";
    $patient_raw_data = mysqli_query($response,$patient_records);

    $headings = "Patient ID\t\tName\t\tAge\t\tEmail\t\t\tPhone\t\tDisease\n";
    
    $file = fopen('C:\\Users\\Sukh-e\\Desktop\\Patients.txt','a') or die('File not found');
    fwrite($file,$headings);
    if ($patient_raw_data->num_rows>0){
        while($patient_data = mysqli_fetch_assoc($patient_raw_data)){
            $patient_id = trim($patient_data['Patient_id'],"\t\n");
            $first_name = trim($patient_data['First_name'],"\t\n");
            $last_name = trim($patient_data['Last_name'],"\t\n");
            $age = trim($patient_data['Age'],"\t\n");
            $phone = trim($patient_data['Phone'],"\t\n");
            $email = trim($patient_data['Email'],"\t\n");
            $disease = trim($patient_data['Disease'],"\t\n");
            $patient_detail = "$patient_id\t\t$first_name $last_name \t$age \t$email\t\t$phone \t$disease\n";
            fwrite($file,$patient_detail);
        }
        fclose($file);
        setcookie('print_success',1,time() + 20,"/");
        header('location:patients.php');
    }
}
?>

<!-- Doctor Signup  -->
<?php
    if (isset($_POST['signup'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $check_email_query = "select * from doctors where Email='$email'";

        $check_qurey_res = mysqli_query($response,$check_email_query);

        if ($check_qurey_res->num_rows==0){

            if ($password==$confirm_password){
                
                $encrpyt_password = password_hash($password, PASSWORD_ARGON2I);

                $query = "insert into doctors(First_name,Last_name,Email,Password) values 
                ('$first_name','$last_name','$email','$encrpyt_password');";
        
                $qurey_res = mysqli_query($response,$query);
                if ($qurey_res){
                    setcookie('signup_success','signup done',time() + 10,"/");
                    header('location:signup.php');
                }else{
                    echo "Something went wrong";
                }
            }else{
                setcookie('signup_success','password not match',time() + 8,"/");
                header('location:signup.php');
            }

        }else{
            setcookie('signup_success','email not match',time() + 8,"/");
            header('location:signup.php');
        }
    }

?>

<!-- Doctor Login  -->

<?php
    if (isset($_POST['login'])){
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];

        $fatch_record_query = "select * from doctors where Email='$email';";

        $login_query_res = mysqli_query($response,$fatch_record_query);

        if ($login_query_res->num_rows==1){
            $doctor = mysqli_fetch_assoc($login_query_res);
            $doctor_password = $doctor['Password'];
            
            $password_check = password_verify($password,$doctor_password);
            if ($password_check){
                $_SESSION['doctor_id'] = $doctor['Doctor_ID'];
                $_SESSION['doctor_name'] = $doctor['First_name'];
                header('location:index.php');   
            }else{
                setcookie('login_success','doctor not found',time() + 8,"/");
                header('location:login.php');     
            }
        }else{
            setcookie('login_success','doctor not found',time() + 8,"/");
            header('location:login.php');     
        }
    }
?>


