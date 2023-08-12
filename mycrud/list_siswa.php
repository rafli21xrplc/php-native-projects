<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mycrud siswa</title>
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
</head>

<style>
    body {
        background-color: lightpink;
    }
</style>

<body>
    <div class="container my-5">
        <center>
            <h2>List siswa</h2>
        </center>

        <a href="/mycrud/create.php"><button type="button" class="btn btn-outline-dark"><b>Tambah Data</b></button></a>
        <br>

        <table class="table table-success table-striped-columns">
            <thead>
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>jurusan</th>
                    <th>alamat</th>
                    <th>gender</th>
                    <th>foto</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "mycrud";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // read all row from database table
                $sql = "SELECT * FROM pkl";
                $result = $connection->query($sql);

                if (!$result) {
                    die("invalid query:" . $connection->error);
                }

                $no = 1; // Inisialisasi nomor urut
                // read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$row[nama]</td>
                        <td>$row[jurusan]</td>
                        <td>$row[alamat]</td>
                        <td>$row[gender]</td>
                        <td colspan='1'><img width='40' height='50' src='images/" . $row['gambar'] . "'></td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>edit</a>
                            <a onclick='return confirm(`yakin ingin menghapus?`)' class='btn btn-primary btn-sm' href='delete.php?id=$row[id]'>hapus</a>
                        </td>
                    </tr>
                    ";

                    $no++; // Increment nomor urut setiap iterasi
                }
                ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>

        </table>
    </div>
</body>

</html>
