<?php
include "../../../db/koneksi.php";
session_start();

if(isset($_POST['registrasi'])){
    $id = $_POST['id_event'];
    $no_lambung = $_POST['no_lambung'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $event = $_POST['nama_event'];
    $navigator = $_POST['navigator'];
    $kelas = $_POST['kelas'];
    $domisili = $_POST['domisili'];


    $queryUpd = mysqli_query($con, "UPDATE user SET id_event = '$id', no_lambung = '$no_lambung', nama = '$nama', alamat = '$alamat', no_hp = '$no_hp', jenis_mobil = '$jenis_mobil' WHERE no_lambung = '$no_lambung' ");
    if ($queryUpd) {

        $query = mysqli_query($con, "UPDATE validasi SET id_event = '$id', no_lambung = '$no_lambung', nama = '$nama', navigator = '$navigator', kelas = '$kelas', domisili = '$domisili' WHERE no_lambung = '$no_lambung' ");
        echo '<script>
        alert("Akun Telah Dikoreksi");
        window.location.replace("../validasi.php")
        </script>';
    } else {
        echo '<script>alert("Akun tidak dapat dikoreksi")</script>';
    }
}


if(isset($_GET['no_lambung'])){
    $no_lambung = $_GET['no_lambung'];
$query = mysqli_query($con, "SELECT * FROM user WHERE no_lambung = '$no_lambung'");
$getData = mysqli_fetch_assoc($query);

}

if(isset($_GET['no_lambung'])){
    $no_lambung = $_GET['no_lambung'];
$query = mysqli_query($con, "SELECT * FROM validasi WHERE no_lambung = '$no_lambung'");
$getvalidasi = mysqli_fetch_assoc($query);

}

?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../assets/js/init-alpine.js"></script>
    
</head>

<body>
    <form action="" method="post">
        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../../../assets/img/lamban.jpg" alt="Office" />
                        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../../../assets/img/lamban.jpg" alt="Office" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Koreksi Akun
                            </h1>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Pilih Event
                                </span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="id_event">
                                        
                                        <?php 
                                        $sql = $con -> query("SELECT * FROM event ORDER BY id_event");
                                        while ($data = $sql->fetch_assoc()) {                  
										 // echo "<option value='$data[id_event]'>$getData[id_event]. $data[nama_event]</option>";
											
											if ($getData['id_event'] == $data['id_event']){
												echo "<option value='$data[id_event]' selected>$data[nama_event]</option>";
											} else {
												echo "<option value='$data[id_event]'>$data[nama_event]</option>";
											}
											
                                        } 
                                        ?>
                                    </select>
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No Lambung</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="No Lambung" type="number" name="no_lambung" value="<?=$getData['no_lambung'] ?>" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nama Lengkap Sesuai NIK" type="text" name="nama" value="<?=$getvalidasi['nama'] ?>" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nama Lengkap Sesuai NIK" type="text" name="alamat" value="<?=$getData['alamat'] ?>" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nomor Hp</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="08*******" type="number" name="no_hp" value="<?=$getData['no_hp'] ?>" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Jenis Mobil</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Toyota Supra" type="text" name="jenis_mobil" value="<?=$getData['jenis_mobil'] ?>" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Kelas
                                </span>
                                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="kelas">
                                    <?="<option>$getvalidasi[kelas]</option>"?>
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
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Navigator" type="text" name="navigator" value="<?=$getvalidasi['navigator']?>" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Domisili
                                </span>
                                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="domisili">
                                        <?="<option>$getvalidasi[domisili]</option>"?>
                                        <?php 
                                        $sql = $con -> query("SELECT * FROM provinsi ORDER BY prov_id");
                                        while ($data = $sql->fetch_assoc()) {
                                            echo "<option value='$data[prov_name]'>$data[prov_name]</option>";
                                        } 
                                        ?>
                                    </select>
                            </label>

                            <!-- <div class="flex mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required />
                                    <span class="ml-2">
                                        I agree to the
                                        <span class="underline">privacy policy</span>
                                    </span>
                                </label>
                            </div> -->

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="registrasi" value="Daftar">
                                Submit
                            </button>

                            <hr class="my-8" />


                            <p class="mt-4">
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="../validasi.php">
                                    Kembali
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