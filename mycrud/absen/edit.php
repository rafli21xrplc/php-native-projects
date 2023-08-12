<?php
require('../config.php');

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM absen WHERE id=$id";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);

if (!$row) {
    die("Data tidak ditemukan...");
}

if (isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $tgl =  DATE ("Y-m-d H:i:s");
    $ket = $_POST["ket"];
    $bukti = $_FILES["bukti"]['name'];
    $tmpFile = $_FILES['bukti']["tmp_name"];
    $buktiLama = $row['bukti'];

    if ($_FILES['bukti']['error'] == 0) {
        unlink("images/$buktiLama");
        $bukti = bin2hex(random_bytes(16)) . "." . pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
        $targetFile = 'images/' . $bukti;

        if (!move_uploaded_file($tmpFile, $targetFile)) {
            die("Gagal mengupload gambar...");
        }
    } else {
        $bukti = $buktiLama;
    }

    $sql = "UPDATE absen SET nama=?, tgl=?, ket=?, bukti=? WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssi', $nama, $tgl, $ket, $bukti, $id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header('Location: index.php');
        exit;
    } else {
        die("Gagal menyimpan perubahan...");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycrud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table-warning">
                <center>
                    <h2>EDIT ABSEN</h2>
                </center>
                <body>
                    <div class="container col-md-6 mt-4">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <center>
                                    <h5>edit Data Absen</h5>
                                </center>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><h4>Nama</h4></label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama..."
                                        value="<?php echo $row['nama']; ?>">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label"> <h4>Keterangan</h4></label>
                                    <select name="ket" id="" class="form-select">
                                        <option value="hadir" <?php if ($row['ket'] == 'hadir') echo 'selected'; ?>>hadir
                                        </option>
                                        <option value="izin" <?php if ($row['ket'] == 'izin') echo 'selected'; ?>>izin
                                        </option>
                                        <option value="sakit" <?php if ($row['ket'] == 'sakit') echo 'selected'; ?>>sakit
                                        </option>
                                        <option value="alpa" <?php if ($row['ket'] == 'alpa') echo 'selected'; ?>>alpa
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><h4>Tanggal : </h4></label>
                                    <h5><?php echo DATE("Y-m-d H:i:s"); ?></h5>
                                </div>

                                <div class="form-group">
                                    <label><h4>Bukti</h4></label>
                                    <?php if (!empty($row['bukti'])) { ?>
                                    <img src="images/<?php echo $row['bukti']; ?>" alt="bukti"
                                        style="width: 100px; border-radius: 6px; margin-top: 10px; margin-bottom: 100px;">
                                    <?php } else { ?>
                                    <img src="placeholder.jpg" alt="bukti"
                                        style="width: 100px; border-radius: 6px; margin-top: 10px; margin-bottom: 100px;">
                                    <?php } ?>
                                    <input class="form-control" type="file" name="bukti" />
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3 d-grid">
                                        <input name="submit" type="submit" class="btn btn-primary" value="Simpan"></input>
                                    </div>
                                    <div class="col-sm-3 d-grid">
                                        <a class="btn btn-danger" href="index.php">Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </table>
        </form>
    </div>
</body>

</html>
