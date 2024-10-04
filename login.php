<?php

$conn = new mysqli("localhost", "root", "", "health");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];


$sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    
    header("Location: home.html");
    exit();
} else {
    
    echo "<script>alert('Incorrect username or password.');
          window.location.href = 'login.html';</script>";
}

$conn->close();
?>
