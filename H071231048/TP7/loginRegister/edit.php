<?php
session_start();
include 'service/database.php';

if (!isset($_SESSION['is_login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    
    if (!$user) {
        header("Location: dashboard.php");
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $username = $db->real_escape_string($_POST['username']);
    $nim = $db->real_escape_string($_POST['nim']);
    $prodi = $db->real_escape_string($_POST['prodi']);
    $role = $db->real_escape_string($_POST['role']);
    
    $query = "UPDATE users SET username = ?, nim = ?, prodi = ?, role = ? WHERE id = ?";
    if (!empty($_POST['password'])) {
        $query = "UPDATE users SET username = ?, password = ?, nim = ?, prodi = ?, role = ? WHERE id = ?";
    }
    
    $stmt = $db->prepare($query);
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("sssssi", $username, $password, $nim, $prodi, $role, $id);
    } else {
        $stmt->bind_param("ssssi", $username, $nim, $prodi, $role, $id);
    }
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Data user berhasil diupdate";
    } else {
        $_SESSION['message'] = "Gagal mengupdate data user";
    }
    header("Location: dashboard.php");
    exit();
}
?>