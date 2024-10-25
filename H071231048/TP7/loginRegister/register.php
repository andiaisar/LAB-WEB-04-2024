<?php
// Include file untuk koneksi database
include 'service/database.php';

// Variabel untuk menyimpan pesan pemberitahuan
$message = '';

if (isset($_POST['register'])) {
    // Ambil nilai dari form, dengan pemeriksaan untuk menghindari undefined index
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $nim = isset($_POST['nim']) ? trim($_POST['nim']) : ''; // Ambil NIM dan hilangkan spasi di awal dan akhir
    $prodi = isset($_POST['prodi']) ? trim($_POST['prodi']) : ''; // Ambil Prodi dan hilangkan spasi di awal dan akhir
    $role = 'mahasiswa'; // Set role default ke mahasiswa

    // Validasi: Pastikan NIM dan Prodi tidak kosong
    if (empty($nim) || empty($prodi)) {
        $message = '<i class="fa fa-times-circle"></i> NIM dan Program Studi tidak boleh kosong.';
    } else {
        // Query untuk memeriksa apakah username atau NIM sudah ada
        $sql = "SELECT * FROM users WHERE username = '$username' OR nim = '$nim'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // Jika username atau NIM sudah ada
            $message = '<i class="fa fa-times-circle"></i> Username atau NIM sudah terdaftar, silakan gunakan yang lain.';
        } else {
            // Hash password sebelum disimpan ke database
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Siapkan query untuk memasukkan data baru
            $sql = $db->prepare("INSERT INTO users (username, password, role, nim, prodi) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param('sssss', $username, $hashedPassword, $role, $nim, $prodi);

            if ($sql->execute()) {
                // Pendaftaran berhasil
                $message = '<i class="fa fa-check-circle"></i> Pendaftaran berhasil! Silakan login.';
            } else {
                // Gagal mendaftarkan pengguna
                $message = '<i class="fa fa-times-circle"></i> Gagal mendaftarkan pengguna. Silakan coba lagi.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Informasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url(assets/img/uh.png);
            background-size: cover;
            background-position: center;
        }
        .card-shadow {
            border: none;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
            transition: transform 0.3s;
            border-radius: 20px;
        }
        .card-shadow:hover {
            transform: scale(1.02);
        }
        .card-header {
            background-color: rgba(198, 46, 46, 0.9);
            color: white;
            padding: 30px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        h4 {
            font-weight: bold;
            margin-bottom: 0;
            text-align: center;
        }
        .card-body {
            max-width: 400px;
            padding: 30px;
            margin: auto;
            border-radius: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        button {
            padding: 12px;
            font-size: 16px;
            background-color: #C62E2E;
            border: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #A52A2A;
            transform: scale(1.02);
        }
        a {
            color: #C62E2E;
            text-decoration: underline;
            transition: color 0.3s;
        }
        a:hover {
            color: #A52A2A;
        }
        @media (max-width: 576px) {
            .card-body {
                padding: 20px;
            }
            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card-shadow">
                    <div class="card-header text-white">
                        <h4 class="mb-0">Register</h4>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan pesan pemberitahuan -->
                        <?php if ($message != ''): ?>
                            <div class="alert" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="register.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-danger">Register</button>
                            <a href="login.php" class="btn btn-link">Back to Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // (JavaScript yang ada tetap sama)
    </script>
</body>
</html>