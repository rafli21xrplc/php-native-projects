<?php include("config.php"); 

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Pendaftaran Baru</title>
</head>

<body>
    <header>
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                  <a class="navbar-brand text-uppercase fw-bold" href="#page-top">Daftar Siswa</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-siswa.php">Siswa</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-guru.php">Mapel Guru</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-jurusan.php">Jurusan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-ekstra.php">Ekstra</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="list-perpus.php">Perpus</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded text-uppercase fw-bold" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <nav>
        <div class="d-grid gap-2 col-6 mx-auto">
         <a class="btn btn-primary" href="form-daftar.php">[+] Tambah Baru</a>
         <a class="btn btn-primary" href="index.php">Close Windows</a>
        </div>
    </nav>

    <br>

    <table border="1" class="table table-blue table-striped">
    <thead>
        <tr>
            <th class="col">No</th>
            <th class="col">Nama Siswa</th>
            <th class="col">Jurusan</th>
            <th class="col">Alamat</th>
            <th class="col">Jenis Kelamin</th>
            <th class="col">Sekolah Asal</th>
            <th class="col">Foto</th>
            <th class="col">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM pkl";
        $query = mysqli_query($db, $sql);
        $no = 1;

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td colspan='1'>".$no++."</td>";
            echo "<td colspan='1'>".$siswa['nama']."</td>";
            echo "<td colspan='1'>".$siswa['jurusan']."</td>";
            echo "<td colspan='1'>".$siswa['alamat']."</td>";
            echo "<td colspan='1'>".$siswa['jenis_kelamin']."</td>";
            echo "<td colspan='1'>".$siswa['sekolah_asal']."</td>";
            echo "<td colspan='1'><img width='40' height='50' src='images/".$siswa['nameImage']."'></td>";

            echo "<td colspan='1'>";
            echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a onclick='return confirm(`yakin ingin menghapus?`)' href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p class="btn btn-primary">Total: <?php echo mysqli_num_rows($query) ?></p>

        <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>


    </body>
</html>