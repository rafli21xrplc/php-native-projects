<?php
include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: list_guru.php');
    exit();
}

// ambil id dari query string
$id_guru = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM guru WHERE id_guru=$id_guru";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);

$id_guru = $row["id_guru"];
$nama = $row["nama"];
$mapel = $row["mapel"];
$alamat = $row["alamat"];
$gender = $row["gender"];
$fotolama = $row["foto"];

if (isset($_POST['submit'])) {
    $nama = $_POST["nama"];
    $mapel = $_POST["mapel"];
    $alamat = $_POST["alamat"];
    $gender = $_POST["gender"];
    
    // Cek apakah ada gambar baru yang diunggah
    if ($_FILES['foto']['error'] == 0) {
        // Jika ada gambar baru diunggah, hapus gambar lama (jika ada)
        if (!empty($fotolama)) {
            unlink("images/$fotolama");
        }

        // Generate nama file unik untuk gambar baru
        $foto = bin2hex(random_bytes(mt_rand(1, 20))) . "." . explode("/", $_FILES['foto']['type'])[1];

        // Pindahkan gambar yang diunggah ke folder 'images'
        if (move_uploaded_file($_FILES['foto']['tmp_name'], "images/" . $foto)) {
            $sqll = "UPDATE guru SET nama = '$nama', mapel='$mapel',alamat='$alamat',gender='$gender', foto='$foto' WHERE id_guru = $id_guru";
            $result = mysqli_query($db, $sqll);

            if (!$result) {
                $errorMessage = "Invalid query: " . $db->error;
            }
            if ($result) {
                header("location: list_guru.php");
                exit();
            }
        }
    } else {
        // Jika tidak ada gambar baru diunggah, gunakan kembali nama gambar lama
        $sqll = "UPDATE guru SET nama = '$nama', mapel='$mapel',alamat='$alamat',gender='$gender', foto='$fotolama' WHERE id_guru = $id_guru";
        $result = mysqli_query($db, $sqll);

        if (!$result) {
            $errorMessage = "Invalid query: " . $db->error;
        }
        if ($result) {
            header("location: list_guru.php");
            exit();
        }
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

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class ='alert alert-warning alert-dismissible fade show' role='alert>
            <strong>$errorMessage</strong>
            <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table-warning">
                <center>
                    <h2>EDIT GURU</h2>
                </center>
                <div class="container col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <center>
                                <h5>Edit Data Guru</h5>
                            </center>
                        </div>
                        <div class="form-group">
                            <label>
                                <h4>Foto</h4>
                            </label>
                            <?php if (!empty($fotolama)) { ?>
                                <img src="images/<?php echo $fotolama; ?>" alt="foto" style="width: 100px; border-radius: 6px; margin-top: 10px; margin-bottom: 100px;">
                            <?php } else { ?>
                                <img src="placeholder.jpg" alt="foto" style="width: 100px; border-radius: 6px; margin-top: 10px; margin-bottom: 100px;">
                            <?php } ?>

                            <input class="form-control" type="file" name="foto" />
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label><h4>Nama</h4></label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan nama..." value="<?php echo $nama; ?>">
                            </div>

                            <div class="form-group">
                                <label><h4>Alamat</h4></label>
                                <textarea class="form-control"  type="text" name="alamat" placeholder="Masukan Alamat..."><?php echo $alamat; ?></textarea>
                            </div>    

                            <div class="col-md-12">
                                <label class="form-label"><h4>mapel</h4></label>
                                <select name="mapel" id="" class="form-select">
                                    <option selected>Choose...</option>
                                    <option value="RPL" <?php if ($mapel == "RPL") echo "selected"; ?>>RPL</option>
                                    <option value="TKJ" <?php if ($mapel == "TKJ") echo "selected"; ?>>TKJ</option>
                                    <option value="Multimedia" <?php if ($mapel == "Multimedia") echo "selected"; ?>>Multimedia</option>
                                    <option value="IT" <?php if ($mapel == "IT") echo "selected"; ?>>IT</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><h4>Jenis Kelamin</h4></label>
                                <br>
                                <input type="radio" class="from-control" <?= $gender === "L" ? "checked" : "" ?> name="gender" value="L"><h5>Laki-laki</h5>
                                <input type="radio" class="from-control" <?= $gender === "P" ? "checked" : "" ?> name="gender" value="P"><h5>Perempuan</h5>
                                </br>

                                <?php
                                if (!empty($successMessage)) {
                                    echo "
                                        <div class ='row mb-3'>
                                        <div class ='offset-sm-3 col-sm-6'>
                                        <div class ='alert alert-success alert-dismissible fade show' role='alert>
                                        <strong>$successMessage</strong>
                                         <button type ='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        </div>
                                        </div>
                                        ";
                                }
                                ?>
                                <div class="row mb-3">
                                    <div class="offset=sm=3 col-sm-3 d-grid">
                                        <input name="submit" type="submit" class="btn btn-primary" href="http://localhost/mycrud/list_guru.php"></input>
                                    </div>
                                    <div class="col-sm-3 d-grid">
                                        <a class="btn btn-secondary" href="/mycrud/daftar_guru.php">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </form>
    </div>
</body>

</html>
