<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "health"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in both username and password.');
              window.location.href = 'signup.html';</script>";
        exit();
    }

    
    $check_username_sql = "SELECT * FROM login WHERE username = '$username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        
        echo "<script>alert('Username already registered. Please choose a different username.');
              window.location.href = 'signup.html';</script>";
    } else {
        
        $insert_sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

        if ($conn->query($insert_sql) === TRUE) {
            
            header("Location: home.html");
            exit();
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}


$conn->close();
?>
