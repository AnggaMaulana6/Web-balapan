<?php
include "../../../db/koneksi.php";
session_start();

if (isset($_GET['no_lambung'])) {
    $no_lambung = $_GET['no_lambung'];
    $query = mysqli_query($con, "SELECT * FROM start WHERE no_lambung = '$no_lambung'");
    $getData = mysqli_fetch_assoc($query);
}

if (isset($_POST['registrasi'])) {
    $no_lambung = $_POST['no_lambung']; 
    $pos = $_POST['nama_trek'];
    $lap = $_POST['lap'];
    $id_card = $_POST['id_card'];
    $nama = $_POST['nama'];
    $start_time = $_POST['start_time'];


    $queryUpd = mysqli_query($con, "UPDATE start SET nama_trek = '$pos', lap = '$lap', id_card = '$id_card', nama = '$nama', start_time = '$start_time' WHERE id_card = '$id_card'; ");
    if ($queryUpd) {
        // Read Table 'start' send to Arduino and save to 'tmp_tabel'
            $sql_user = $con->query("SELECT * FROM start WHERE id_card = '$id_card'"); 
            $numRow = mysqli_num_rows($sql_user);
            $rows = array();
    }if ($numRow > 0) {
            $rows = $sql_user->fetch_array(MYSQLI_ASSOC);
            print json_encode ($rows);						  // send to arduino
            $jam = date('H:i');	  							  // cek point time
            $query = mysqli_query($con, "INSERT INTO tmp_tabel (id_event, id_card, nama_trek, lap, no_lambung, nama, start_time, cek_point)
                        VALUES ('$rows[id_event]','$id_card', '$rows[nama_trek]', '$rows[lap]', '$rows[no_lambung]', '$rows[nama]', '$rows[start_time]', '$jam')");
        echo '<script>
        alert("Berhasil Menginput Data");
        window.location.replace("../start.php")
        </script>';
    	} else {
			echo "No Start with Id Card: " . $id_card;
	}
}

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Start</title>
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
                                Start
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">POS</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="POS" type="number" name="nama_trek" value="<?= $getData['nama_trek'] ?>" required/>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Lap</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Lap" type="number" name="lap" value="<?= $getData['lap'] ?>" required/>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Id Card</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="ID CARD" type="test" name="id_card" value="<?= $getData['id_card'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No Lambung</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="No Lambung" type="number" name="no_lambung" value="<?= $getData['no_lambung'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Nama" type="text" name="nama" value="<?= $getData['nama'] ?>" readonly />
                            </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Start Time</span>
                                    <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Start Time" type="time" name="start_time" value="<?= $getData['start_time'] ?>" required />
                                </label>


                                <!-- You should use a button here, as the anchor is only used for the example  -->
                                <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="registrasi" value="Daftar">
                                    Submit
                                </button>

                                <hr class="my-8" />


                                <p class="mt-4">
                                    <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="../start.php">
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