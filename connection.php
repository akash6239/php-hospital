<?php
// $username = "root";
// $password = "";
// $server = "localhost";
// $database = "hospital";

// $response = mysqli_connect($server,$username,$password,$database);

// if (!$response){
//     echo "Sorry Brother";
// }


$response = mysqli_connect("localhost","root","","hospital") or die("connection failed");



?>