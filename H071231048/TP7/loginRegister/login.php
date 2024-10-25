<?php
include "service/database.php";
session_start();

// Inisialisasi variable message di awal
$message = '';

function setupAdmin($db) {       
    $check = $db->query("SELECT * FROM users WHERE username = 'admin'");
    
    if ($check->num_rows == 0) {
        $admin_username = 'admin';
        $admin_password = 'admin123';
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
        $role = 'admin';

        $query = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $sql = $db->prepare($query);
        $sql->bind_param("sss", $admin_username, $hashed_password, $role); 
        $sql->execute();
        
        return [
            'username' => $admin_username,
            'password' => $admin_password
        ];
    }
    return null;
}

$adminCreated = setupAdmin($db);

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $db->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = $db->prepare("SELECT * FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['is_login'] = true;
            
            header("Location: dashboard.php"); 
            exit;
        } else {
            $message = "<div class='alert alert-danger' role='alert'>
                            <i class='fas fa-exclamation-circle'></i> Password yang Anda masukkan salah!
                        </div>";
        }
    } else {
        $message = "<div class='alert alert-warning' role='alert'>
                        <i class='fas fa-exclamation-triangle'></i> Username tidak ditemukan!
                    </div>";
    }
    $sql->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SI 23</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url(assets/img/uh.png);
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(2px);
            background: rgba(255, 255, 255, 0.3);
        }
        .card-header {
            background-color: rgba(198, 46, 46, 0.5); 
            color: white;
            padding: 20px;
            width: auto;
            height: 130px;
            backdrop-filter: blur(2px);
        }
        .card-body {
            padding: 30px;
        }
        .btn-primary {
            background-color: #C62E2E;
            border-color: #C62E2E;
        }
        .btn-primary:hover {
            background-color: #A52A2A;
            border-color: #A52A2A;
        }
        .form-control:focus {
            border-color: #C62E2E;
            box-shadow: 0 0 0 0.2rem rgba(198, 46, 46, 0.25);
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="assets/img/unhas.png" alt="UNHAS Logo" class="logo">
                        <h3>Information System Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Pemberitahuan login -->
                        <?php if (!empty($message)): ?>
                            <?php echo $message; ?>
                        <?php endif; ?>
                        
                        <!-- Form login -->
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="login" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <a href="register.php" class="text-decoration-none">Don't have an account? Register here</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>