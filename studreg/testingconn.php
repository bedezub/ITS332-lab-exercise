<?php 
    $servername="localhost";
    $username = "root";
    $password = "";
    $db = "course_reg";

    $conn = new mysqli($servername, $username, $password, $db);

    if($conn->connect_error) {
        die("Connection failed: " .$conn->connection_error);
    }
    
    echo "Connected successfully";
?>