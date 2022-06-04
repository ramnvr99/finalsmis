<?php

$name = $_POST["name"];
$address = $_POST["address"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$size = $_POST["size"];
$design = $_POST["design"];
$terms = $_POST["terms"];

$host = 'localhost';
$dbname = 'dbdatabase';
$username = 'root';
$password = '';

//create connection
$conn = new mysqli($host, $username, $password, $dbname);

//check connection
if (mysqli_connect_errno()) {
    die("Connection Error: " . mysqli_connect_error());
}
/*
$sql = "INSERT INTO form (name,address,email,contact,size,design) VALUES ('$name', '$address, '$email', '$contact', '$size, '$design')";
*/

$sql = "INSERT INTO form (name,address,email,contact,size,design) VALUES (?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( !  mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"sssiii", $name,$address,$email,$contact,$size,$design);

mysqli_stmt_execute($stmt);

echo "Order has been submitted! Thank you for supporting us!";


$conn->close();

?>