<?php

    // // var_dump($_POST);
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "adoo";
    //
    // // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    //
    // // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
