<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $dosen = $_POST['dosen'];
    $jurusan = $_POST['jurusan'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $radio = $_POST['radio'];

    $uuId = password_hash(rand(1, 5), PASSWORD_DEFAULT);
    $query = "insert into absensi_class values '', uuid='$uuId', username='$username', dosen='$dosen', subject='$jurusan', jurusan='$jurusan', date='$date', time='$time', isPresent='$radio'";

    $result = $conn->lastInsertId();
    if ($result) {
        header('Location: Homepage.php');
        $username = '';
        $email = '';
        $_POST['password'] = '';
        $_POST['passwordCheck'] = '';
    } else {
        echo "<script>alert('Terjadi kesalahan!')</script>";
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex items-center justify-center p-12 bg-gray-100">
        <div class="mx-auto w-full max-w-[550px]">
            <form method="post" action="">
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                Full Name
                            </label>
                            <input type="text" name="username" id="fName" placeholder="Full Name" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Dosen
                    </label>
                    <select name="dosen" id="" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        <?php
                        $sqlDosen = 'SELECT * FROM dosen';
                        foreach ($conn->query($sqlDosen) as $data) : ?>
                            <option value="<?= $data['username'] ?>"><?= $data['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                        Jurusan
                    </label>
                    <input type="text" id="guest" name="jurusan" placeholder="Teknik Infomatika" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                                Date
                            </label>
                            <input type="date" name="date" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                Time
                            </label>
                            <input type="time" name="time" id="time" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="mb-3 block text-base font-medium text-[#07074D]">
                        Are you coming to the class?
                    </label>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center">
                            <input type="radio" value="present" name="radio" id="radioButton1" class="h-5 w-5" />
                            <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                Yes
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" value="no present" name="radio" id="radioButton2" class="h-5 w-5" />
                            <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                No
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <input name="submit" type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    </input>
                </div>
            </form>
        </div>
    </div>
</body>

</html>