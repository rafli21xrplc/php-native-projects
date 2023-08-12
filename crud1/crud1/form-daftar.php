 <!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <title>Formulir Pendaftaran Siswa Baru</title>
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

    <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data">

        <fieldset>

        <div class="card">
            <div class="card-header bg-secondary fst-italic text-white">
                Daftar
            </div>
            <div class="card-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>

                    <div class="col-md-12">
                        <label  class="form-label">Jurusan</label>
                            <select name="jurusan"  id="" class="form-select">
                                <option selected>Choose...</option>
                                <option>RPL</option>
                                <option>TKJ</option>
                                <option>ELIN</option>
                                <option>METRO</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
                        <label><input class="form-check-input" type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                    </div>

                    <div class="form-group">
                        <label>Sekolah Asal</label>
                        <input type="text" name="sekolah_asal" required="" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Foto</label>
                        <input class="form-control" type="file" name="file" id="formFile">
                    </div>

                    <input type="submit" value="Daftar" name="daftar" class="btn btn-primary mb-2"/>
                    <input type="button" value="Kembali" onclick="history.back(-1)" class="btn btn-primary mb-2" />

        </fieldset>

    </form>

    </body>
</html>