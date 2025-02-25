<?php
include("connection.php");


if (isset($_GET["id"])) {
    $id = $_GET["id"];

    
    $sql = "SELECT * FROM client WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        
        $sqlInsert = "INSERT INTO deletework (name, Email, phoneNumber, address) VALUES (?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ssss", $row["name"], $row["Email"], $row["phoneNumber"], $row["address"]);
        $stmtInsert->execute();

        
        $sqlDelete = "DELETE FROM client WHERE id = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $id);
        $stmtDelete->execute();
    }
    
    header("Location: index1.php?deleted=1");
    exit;
}
?>
