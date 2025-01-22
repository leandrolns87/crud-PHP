<?php
include('bd.php');

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Atualizar registro
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
    } else {
        // Criar novo registro
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
    }

    $stmt->execute();
    header('Location: index.php');
}
?>