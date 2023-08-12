<?php
$servername = "Localhost";
$username = "root";
$password = "";
$database = "mycrud";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);
$foto = "";
$id_guru = "";
$nama = "";
$mapel = "";
$alamat = "";
$gender = "";


$errorMessage = "";
$successMessage = "";


if (isset($_POST['submit'])) {     

    $id_guru = $_POST["id_guru"];
    $nama = $_POST["nama"];
    $mapel = $_POST["mapel"];
    $alamat = $_POST["alamat"];
    $gender = $_POST["gender"];
    $foto = $_FILES['foto']["name"];
    $tmpFile = $_FILES['foto']["tmp_name"];

    if (move_uploaded_file($tmpFile, "images/" . basename($foto))) {
        do {
            if (empty($id_guru) || empty($nama) || empty($mapel) || empty($alamat) || empty($gender)) {
                $errorMessage = "All the fields are required";
                break;
            }

            // add new pkl to datasabase
            $sql = "INSERT INTO guru " .
                "VALUES ('$id_guru','$nama','$mapel','$alamat','$gender', '$foto')";
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }

            $foto = "";
$id_guru = "";
$nama = "";
$mapel = "";
$alamat = "";
$gender = "";


            $successMessage = "data telah ditambahkan";

            header("location : /mycrud/list_guru.php");
            exit;
        } while (false);
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

<body>
    <div class="container my-5">
        <h2>Data guru</h2>


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

            <div class="form-group">
                <input class="form-control" type="file" name="foto" />
            </div>

            <table>
                <tr>
                     <td width="100">Id</td>
                    <td><input type="text" class="from-control" name="id_guru" placeholder="Masukan id..." value="<?php echo $id_guru; ?>"></td>
                </tr>

                <tr>
                    <td width="100">Nama</td>
                    <td><input type="text" class="from-control" name="nama" placeholder="Masukan nama..." value="<?php echo $nama; ?>"></td>
                </tr>


                <tr>
                    <td width="100">jurusan</td>
                    <td><select name="mapel" id="">
                            <option value="">--Pilih--</option>
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="IT">IT</option>
                        </select></td>
                </tr>

                <tr>
                    <td width="100">Alamat</td>
                    <td><input type="text" class="from-control" name="alamat" placeholder="Masukan Alamat..." value="<?php echo $alamat; ?>"></td>
                </tr>

                <tr>
                    <td width="102">Jenis Kelamin</td>
                    <td><input type="radio" class="from-control" name="gender" value="L">Laki-laki
                        <input type="radio" class="from-control" name="gender" value="P">Perempuan
                    </td>
                </tr>

            </table>




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
                    <input name="submit" type="submit" class="btn btn-primary" href="/mycrud/list_guru.php"></input>
                </div>
                <di class="col-sm-3 d-grid">
                    <a class="btn btn-ouline-primary"  role="button">Cancel</a>
            </div>
    </div>
    </form>
    </div>
</body>

</html>