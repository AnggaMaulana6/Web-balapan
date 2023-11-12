<?php
include "../db/koneksi.php";
session_start();

if(isset($_POST['registrasi'])){
    $no_lambung = $_POST['no_lambung'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $navigator = $_POST['navigator'];
    $domisili = $_POST['domisili'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $password = $_POST['password'];
    $id     = $_POST['id_event'];

    $sql= mysqli_query($con, "INSERT INTO user (id_event, no_lambung, nama, alamat, no_hp, jenis_mobil, password, level, status)
                        VALUES ('$id', '$no_lambung', '$nama', '$alamat', '$telp', '$jenis_mobil', '$password', 'user', 'proses');");

    if($sql){

		$query = mysqli_query($con, "INSERT INTO validasi (no_lambung, id_event, nama, kelas, navigator, domisili)
                            VALUES ('$no_lambung', '$id', '$nama', '$kelas', '$navigator', '$domisili') ");
        echo '<script>
        alert("Akun Anda Sedang Dalam Proses Validasi");
        window.location.replace("../index.php")
        </script>';
    }else{
        echo '<script>alert("Data Anda Salah")</script>';
    }
}


// if (isset($_POST['registrasi'])) {
//     $no_lambung = $_POST['no_lambung'];
//     $id     = $_POST['id_event'];
//     $nama = $_POST['nama'];

//     $query = mysqli_query($con, "INSERT INTO start (id_event, no_lambung, nama)
//     VALUES ('$id', '$no_lambung', '$nama') ");
//     if ($query) {
//         $sql = mysqli_query($con, "INSERT INTO finish (id_event, no_lambung)
//         VALUES ('$id', '$no_lambung') ");
//     } if($sql) {
//         echo '<script>
//         alert("Akun Anda Sedang Dalam Proses Validasi");
//         window.location.replace("../index.php")
//         </script>';
//         $sql = mysqli_query($con, "INSERT INTO timing (id_event, no_lambung)
//         VALUES ('$id', '$no_lambung') ");
//     } else {
//         echo '<script>alert("Data Anda Salah")</script>';
//     }
// }



?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script type="text/javascript" src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    
</head>

<body>
    <form action="" method="post">
        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/expedisi.jpg" alt="Office" />
                        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../assets/img/expedisi.jpg" alt="Office" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Buat Akun
                            </h1>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Nama Event
                                </span>
								<input type='hidden' value="'$data[nama_event]'" id='nama_event'/>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="id_event">
                                        <option>Pilih Event</option>
                                        <?php 
                                        $sql = $con -> query("SELECT * FROM event ORDER BY id_event");
                                        while ($data = $sql->fetch_assoc()) {
                                            echo "<option value='$data[id_event]'>$data[nama_event]</option>";
                                        } 
                                        ?>
                                    </select>
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">No Lambung</span>
                                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="No Lambung" type="number" name="no_lambung" required />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nama Lengkap Sesuai NIK" type="text" name="nama" required />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Alamat" type="text" name="alamat" required />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Domisili
                                    </span>
                                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="domisili">
                                            <option value="FFA">Pilih Domisili</option>
                                            <?php 
                                            $sql = $con -> query("SELECT * FROM provinsi ORDER BY prov_id asc");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo "<option value='$data[prov_name]'>$data[prov_name]</option>";
                                            } 
                                            ?>
                                        </select>
                                </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nomor Hp</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="08*******" type="number" name="telp" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Jenis Mobil</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Toyota Supra" type="jenis_mobil" name="jenis_mobil" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Kelas
                                </span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="kelas">
                                        <option value="FFA">Pilih Kelas</option>
                                        <?php 
                                        $sql = $con -> query("SELECT * FROM kelas ORDER BY kelas_id");
                                        while ($data = $sql->fetch_assoc()) {
                                            echo "<option value='$data[kelas_name]'>$data[kelas_name]</option>";
                                        } 
                                        ?>
                                    </select>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Navigator</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Navigator" type="text" name="navigator" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input class="form-passwordblock w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password" required />
                            </label>

                            <div class="flex mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required />
                                    <span class="ml-2">
                                        I agree to the
                                        <span class="underline">privacy policy</span>
                                    </span>
                                </label>
                            </div>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="registrasi" value="Daftar">
                                Buat Akun
                            </button>

                            <hr class="my-8" />


                            <p class="mt-4">
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./index.php">
                                    Sudah Punya Akun? Login
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>