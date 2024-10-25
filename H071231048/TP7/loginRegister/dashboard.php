<?php
session_start();
include 'service/database.php';

// Check if user is logged in
if (!isset($_SESSION['is_login']) || !$_SESSION['is_login']) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Handle add user
if (isset($_POST['add']) && $_SESSION['role'] == 'admin') {
    $username = $db->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nim = $db->real_escape_string($_POST['nim']);
    $prodi = $db->real_escape_string($_POST['prodi']);
    $role = $db->real_escape_string($_POST['role']);
    
    $stmt = $db->prepare("INSERT INTO users (username, password, nim, prodi, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $nim, $prodi, $role);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "User berhasil ditambahkan";
    } else {
        $_SESSION['message'] = "Gagal menambahkan user";
    }
    header("Location: dashboard.php");
    exit();
}

// Handle delete user
if (isset($_GET['delete']) && $_SESSION['role'] == 'admin') {
    $id = (int)$_GET['delete'];
    
    $stmt = $db->prepare("DELETE FROM users WHERE id = ? AND username != 'admin'");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "User berhasil dihapus";
    } else {
        $_SESSION['message'] = "Gagal menghapus user";
    }
    header("Location: dashboard.php");
    exit();
}

if ($_SESSION['role'] == 'mahasiswa') {
    // For students, only get their own data
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
} else { 
    // For admin, retrieve all users and handle search
    $search = isset($_GET['search']) ? $db->real_escape_string($_GET['search']) : '';
    if ($search) {
        $query = "SELECT * FROM users WHERE username LIKE ? OR nim LIKE ? OR prodi LIKE ?";
        $stmt = $db->prepare($query);
        $searchParam = "%$search%";
        $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
    } else {
        $query = "SELECT * FROM users ORDER BY id ASC";
        $stmt = $db->prepare($query);
    }
}


// Handle search
$search = isset($_GET['search']) ? $db->real_escape_string($_GET['search']) : '';
if ($search) {
    $query = "SELECT * FROM users WHERE username LIKE ? OR nim LIKE ? OR prodi LIKE ?";
    $stmt = $db->prepare($query);
    $searchParam = "%$search%";
    $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
} else {
    $query = "SELECT * FROM users ORDER BY id ASC";
    $stmt = $db->prepare($query);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #481E14;
            --secondary-color: #9B3922;
        }

        body {
            background: url('assets/img/unhas.webp') center/cover no-repeat;
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .card {
            background: rgba(0,0,0,0.5);
            border: none;
            border-radius: 25px;
            backdrop-filter: blur(0px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }
        .card-header {
            background: #9B3922;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }

        .card-title {
            color: var(--primary-color);
            font-weight: 600;
            margin: 0;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
        }

        .table {
            margin-bottom: 0;
            background: rgba(0,0,0,0.5);
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
            background-color: rgba(255,255,255,0.1);
            color: #f8f9fa;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
            background-color: rgba(255,255,255,0.1);
            color: #f8f9fa;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(37,99,235,0.2);
            border-color: var(--primary-color);
        }

        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 15px 15px 0 0;
            border-bottom: none;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.4rem 1rem;
            border-radius: 6px;
        }

        .welcome-badge {
            background: rgba(255,255,255,0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        .footer {
            margin-top: auto;
        }

        .search-bar {
            max-width: 300px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top no-print">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-graduation-cap me-2"></i>
                Mahasiswa Sistem Informasi 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <span class="nav-link welcome-badge">
                            <i class="fas fa-user me-2"></i>
                            <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?> 
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="" method="POST" class="d-inline">
                            <button type="submit" name="logout" class="nav-link btn btn-link">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <div class="card mb-5 no-print">
            <div class="card-header">
                <h5 class="card-title text-white">
                    <i class="fas fa-user-plus me-2 text-white"></i>
                    Input Data Pengguna
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="" method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label for="username" class="form-label text-white">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nim" class="form-label text-white">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="col-md-4">
                        <label for="prodi" class="form-label text-white">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" required>
                    </div>
                    <div class="col-md-4">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="form-label text-white">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" name="add" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Data Table -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title text-white">
                    <i class="fas fa-list me-2 text-white"></i>Data Pengguna
                </h5>
                <!-- Add search form -->
                <form class="d-flex search-bar" method="GET">
                    <input class="form-control me-2" type="search" name="search" 
                           placeholder="Search..." value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : '' ?>">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover" id="studentTable">
                        <thead>
                            <tr>
                                <th class="px-4">No</th>
                                <th>Username</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th>Role</th>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                <th class="px-4 no-print">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($user = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="px-4"><?= $no++; ?></td>
                                     <td><?= htmlspecialchars($user['id']); ?></td>  <!-- Nama diubah menjadi nama -->
                                    <td><?= htmlspecialchars($user['username']); ?></td>
                                    <td><?= htmlspecialchars($user['nim']); ?></td>
                                    <td><?= htmlspecialchars($user['prodi']); ?></td>
                                    <td><?= htmlspecialchars($user['role']); ?></td>
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                                    <td class="px-4 no-print">
                                        <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?delete=<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>