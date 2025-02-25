<?php
require("connection.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["Email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];

    $result = $conn->prepare("UPDATE client SET name = ?, Email = ?, phoneNumber = ?, address = ? WHERE id = ?");
    $result->bind_param("ssssi", $name, $email, $phoneNumber, $address, $id);
    
    if ($result->execute()) {
        header("Location: index1.php?success=1"); 
        exit;
    } else {
        echo "Error updating record.";
    }
}
?>
