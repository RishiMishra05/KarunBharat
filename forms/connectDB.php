<?php
$hostName = "localhost:8111";
$userName = "root";
$password = "";
$dbName = "karunbharat_ngo";

// Create connection
$conn = mysqli_connect($hostName, $userName, $password, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

// Insert data into the database
$sql = "INSERT INTO donate_now (full_name, email_address, mobile_number, amount, address, remarks) VALUES ('$name', '$email', '$mobilenumber', '$amount', '$address', '$remarks')";

if(mysqli_query($conn, $sql)){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
