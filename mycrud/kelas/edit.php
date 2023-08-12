<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mycrud";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = null;
$nama_kelas = "";
$wali_kelas = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kelas WHERE id = '$id'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_kelas = $row['nama_kelas'];
        $wali_kelas = $row['wali_kelas'];
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark p-2">
<div class="container-fluid">
                <a class="navbar-brand" href="#"><h1>ASIKKK</h1></a>
<ul class="nav nav-pills nav-fill navbar-nav ms-auto mb-2 mb-lg-0">
<li class="nav-item">
    <a class="nav-link " aria-current="page" href="http://localhost/mycrud/dashboard.php"><h2>home</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="http://localhost/mycrud/kelas/index.php"><h2>Kelas</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link a" aria-current="page" href="http://localhost/mycrud/list_siswa.php"><h2>siswa</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/mycrud/list_guru.php"><h2>guru</h2></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link " href="http://localhost/mycrud/absen/index.php"><h2>absensi</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="http://localhost/mycrud/index.php"><h2>logout</h2></a>
  </li>
</ul>
</nav>
<body>
<style>
        body {
            background-color: lightgreen;
        }
    </style>
    <div class="container my-5">
        <table class="table-warning">
            <center>
                <h2>EDIT ABSEN</h2>
            </center>
            <div class="container col-md-6 mt-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <center>
                            <h5>edit Data Absen</h5>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form method="POST" action="store.php">
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas:</label>
                                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $nama_kelas; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="wali_kelas">Wali Kelas:</label>
                                    <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?php echo $wali_kelas; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>
</body>
</html>
