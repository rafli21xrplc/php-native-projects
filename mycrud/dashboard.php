<?php

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>

<head>
  <style>
    .container {
      height: 200px;
      position: relative;
      border: 3px solid blue;
    }

    .center {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    body {
      background-color: lightpink;
    }
  </style>
</head>

<body>

  <center>
    <h2>HOME</h2>
  </center>
  <br>
  <center>
    <h2>CRUD</h2>
  </center>
  <div class="container">
    <div class="center">

      <a href="http://localhost/mycrud/kelas/index.php"><button style="color:green;height:40px;width:250px;">
          <h3><b>Kelas</b>
        </button></a></h3>

      <a href="/mycrud/list_siswa.php"><button style="color:blue;height:40px;width:250px;">
          <h3><b>Siswa</b>
        </button></a></h3>

      <a href="/mycrud/list_guru.php"><button style="color:green;height:40px;width:250px;">
          <h3><b>Data Guru</b>
        </button></a></h3>

      <a href="/mycrud/absen/index.php"><button style="color:red;height:40px;width:250px;">
          <h3><b>Absen</b>
        </button></a></h3>


      <a href="/mycrud/logout.php"><button style="color:black;height:40px;width:250px;">
          <h3><b>logout</b>
        </button></a></h3>


    </div>

  </div>

</body>

</html>