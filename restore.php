<?php
include("connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    
    $sql = "INSERT INTO client (name, Email, phoneNumber, address)
            SELECT name, Email, phoneNumber, address FROM deletework WHERE id=$id";
    $conn->query($sql);

    
    $sql = "DELETE FROM deletework WHERE id=$id";
    $conn->query($sql);

    
    header("Location: index1.php?restored=1");
    exit();
}
?>