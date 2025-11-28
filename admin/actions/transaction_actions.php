<?php
require '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE transactions SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $transaction_id);
    $stmt->execute();

    header('Location: ../transactions.php');
}
$conn->close();
?>