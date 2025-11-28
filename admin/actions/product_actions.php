<?php
require '../../config/database.php';

$action = $_REQUEST['action'] ?? '';

switch ($action) {
    case 'add':
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];

        // Handle file upload
        $target_dir = "../../public/img/"; // Kembali dua direktori lalu masuk ke public/img
        $image_name = basename($_FILES["img"]["name"]);
        $target_file = $target_dir . $image_name;
        $db_path = "public/img/" . $image_name; // Path untuk disimpan di database

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO products (`name`, `desc`, `price`, `img`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $name, $desc, $price, $db_path);
            $stmt->execute();
        }
        header('Location: ../products.php');
        break;

    case 'delete':
        $id = $_GET['id'];
        // Hapus juga file gambar jika perlu
        $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../products.php');
        break;
}
$conn->close();
?>