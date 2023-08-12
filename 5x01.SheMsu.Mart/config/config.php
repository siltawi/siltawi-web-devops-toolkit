<?php
    $hostName = "localhost";
    $username = "root";
    $password ="";
    $dbname ="shemsu";

    $conn =new mysqli($hostName, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:".$conn->connect_error);
    }
?>