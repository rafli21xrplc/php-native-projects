<?php
require 'coneksi.php';


$random = $_GET['id'];
$datas = mysqli_query($conn, "SELECT * FROM wisata WHERE id = '$random'");
$result = mysqli_fetch_assoc($datas);

// var_dump($_POST);
// die;
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $category = htmlspecialchars($_POST['category']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $body = htmlspecialchars($_POST['body']);
    $nama_gambar = htmlspecialchars($_FILES['file']['name']);
    $tmp_gambar = htmlspecialchars($_FILES['file']['tmp_name']);

    move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
    $query = "UPDATE wisata SET name='$name', alamat='$alamat', category='$category', deskripsi='$deskripsi' ,body='$body', gambar='$nama_gambar' WHERE id = '$random'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script> window.location.href = 'admin.php' </script>";
    } else {
        echo '<script>alert("Terjadi Kesalahan");</script>';
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,600;1,300&display=swap" rel="stylesheet">
    <title>admin update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="font-family: 'Open Sans', sans-serif;">


    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="sidebar-brand-text mx-3">NEUTUERAL</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="created.php">
                    <i class="fa-solid fa-plus"></i>
                    <span>Created</span></a>
            </li>


        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>

                <div class="container-fluid ">
                    <div class="card shadow mb-4">

                        <div class="container-md mx-5 my-5">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 text-gray-800">Update Page</h1>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input value="<?= $result['name'] ?>" name="name" style="width: 80%;" type="text" class="form-control" id="name" placeholder="Balekambang" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">alamat</label>
                                    <input value="<?= $result['alamat'] ?>" name="alamat" style="width: 80%;" type="text" class=" form-control" id="alamat" placeholder="Jalan Balekambang, Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Malang, Jawa Timur. " required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">category</label>
                                    <input value="<?= $result['category'] ?>" name="category" style="width: 80%;" type="text" class=" form-control" id="alamat" placeholder="Jalan Balekambang, Dusun Sumber Jambe, Desa Srigonco, Kecamatan Bantur, Malang, Jawa Timur. " required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">deskripsi</label>
                                    <div style="width: 80%;" class="input-group">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" aria-label="With textarea"><?= $result['body'] ?></textarea>
                                    </div>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="blog" class="form-label">body</label>
                                    <div style="width: 80%;" class="input-group">
                                        <textarea name="body" id="body" class="form-control" aria-label="With textarea"><?= $result['body'] ?></textarea>
                                    </div>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">gambar</label>
                                    <div class="input-group mb-3" style="width: 80%;">
                                        <input name="file" type="file" id="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Send..</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    </form>
</body>

</html>