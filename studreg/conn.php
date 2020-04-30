<?php 

    function OpenCon() {
        
        $dbname="localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "course_reg";
        $conn = new mysqli($dbname, $dbuser, $dbpass, $db) 
        or die("Connection failed: " .$conn->connection_error);
        return $conn;
    }

    function CloseCon($conn) {
        $conn->close();
    }

?>