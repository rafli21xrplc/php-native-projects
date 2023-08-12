<?php
require('../config.php');

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM perpus WHERE id=$id";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);

$id = $row["id"];
$nama = $row["nama"];
$judul_buku = $row["judul_buku"];
$tgl_pinjam = DATE("Y-m-d");



if (isset($_POST['submit'])) {
    // $id = $_POST["id"];
    $nama = $_POST["nama"];
    $judul_buku = $_POST["judul_buku"];
    $tgl_pinjam = DATE("Y-m-d");


    $sqll = "UPDATE perpus SET nama = '$nama', judul_buku='$judul_buku',tgl_pinjam='$tgl_pinjam' WHERE id = $id";

    $result = $db->query($sqll);
    // var_dump($sqll);die;
    if ($result)
    {
        header("location: index.php");
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
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <a class="nav-link a" aria-current="page" href="http://localhost/mycrud/list_siswa.php"><h2>siswa</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="http://localhost/mycrud/list_guru.php"><h2>guru</h2></a>
  </li>
  <li class="nav-item ">
    <a class="nav-link " href="http://localhost/mycrud/absen/index.php"><h2>absensi</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="http://localhost/mycrud/perpustakaan/index.php"><h2>perPustakaan</h2></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="http://localhost/mycrud/index.php"><h2>logout</h2></a>
  </li>
</ul>
</nav>
<body>
<style>
            body{
                background-color : lightgreen;
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
     <form method="POST" action="">

<table class="table-warning">
    <center><h2>EDIT PERPUSTAKAN</h2></center>

<body>
<div class="container col-md-6 mt-4">

<div class="card">
<div class="card-header bg-success text-white">
    <center><h5>Edit  Data Siswa</h5></center>
</div>

<div class="card-body">
    <form action="" method="post" role="form">
        <div class="form-group">
            <label><h4>Nama</h4></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan nama..." value="<?php echo $nama; ?>">
        </div>


        <div class="col-md-12">
        <label  class="form-label"> <h4>Judul buku</h4></label>
        <select name="judul_buku"  id="" class="form-select">
        <option selected>Choose...</option>
        <option value="malin_kundang"><h5>Malin kundang</h5></option>
        <option value="barbie"><h5>barbie</h5></option>
        <option value="romance">romance</option>
         <option value="dilan">dilan</option>
        <option value="timun_mas">timun mas</option>
</select>
</div>

        <div class="form-group">
            <label><h4>Tanggal</h4></label>
       <h5> <?php $tgl_pinjam=date("Y-m-d"); echo $tgl_pinjam ?></h5>
               
    </div>
            

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
                    <input name="submit" type="submit" class="btn btn-primary" href="/mycrud/index.php"></input>
                </div>
                <div class="col-sm-3 d-grid">
                <input type="submit" name="cancel"  href="/mycrud/create.php" value="cancel">
                        </div>
    </div>

           
             </div>

    </form>
    </div>
</body>

</html>