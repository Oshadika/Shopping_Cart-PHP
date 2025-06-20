<?php


// connection establishment
function dbConn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_cart";

    // Create connection as object  oriented
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
    //echo "Connected successfully";
}
