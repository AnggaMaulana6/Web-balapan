<?php
include "../../../db/koneksi.php";
session_start();

if (isset($_GET['id_card'])) {
    $id_card = $_GET['id_card'];
    $query = mysqli_query($con, "SELECT * FROM finish JOIN tmp_tabel ON finish.id_card = tmp_tabel.id_card WHERE finish.id_card = '$id_card'");
    $getData = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

if (isset($_POST['registrasi'])) {
    $no_lambung = $_GET['no_lambung'];
    $trek = $_POST['nama_trek'];
    $lap = $_POST['lap'];
    $id_card = $_POST['id_card'];
    $start_time = $_POST['start_time'];
    $cek_point = $_POST['cek_point'];
    $finish = $_POST['finish'];
    $fastest = $_POST['fastest'];
    $point = $_POST['point'];

    $sql_user = $con->query("SELECT id_card, lap FROM tmp_tabel WHERE nama_trek = '$trek' AND status='start'"); 
    $numRow = mysqli_num_rows($sql_user);
    $data = $sql_user->fetch_array(MYSQLI_ASSOC);
    if ($numRow > 0) {
        $id_card = $data['id_card'];
        $lap = $data['lap'] - 1;
        $queryUpdateFinish = mysqli_query($con, "UPDATE finish SET finish='$finish', fastest='$fastest' WHERE id_card='$id_card' AND finish='xxx'");
        $queryUpdateStart = mysqli_query($con, "UPDATE start SET lap='$data[lap]' WHERE id_card='$id_card' AND lap='$lap'");
        $queryDeletetmp = mysqli_query($con, "DELETE FROM tmp_tabel WHERE nama_trek='$trek' AND id_card='$id_card'");
    } else {
        echo "No Start at Trek: " . $trek;
    }
}

// if (isset($_POST['registrasi'])) {
//     $no_lambung = $_GET['no_lambung'];
//     $pos = $_POST['pos'];
//     $lap = $_POST['lap'];
//     $id_card = $_POST['id_card'];
//     $start_time = $_POST['start_time'];
//     $cek_point = $_POST['cek_point'];
//     $finish = $_POST['finish'];
//     $fastest = $_POST['fastest'];
//     $point = $_POST['point'];


//     $queryUpd = mysqli_query($con, "UPDATE finish SET cek_point = '$cek_point', finish = '$finish', fastest = '$fastest', point = '$point' WHERE no_lambung = '$no_lambung'; ");
//     if ($queryUpd) {
//         echo '<script>
//         alert("Akun telah difinish");
//         window.location.replace("../start.php")
//         </script>';
//     } else {
//         echo '<script>alert("Akun tidak dapat difinish")</script>';
//     }
// }


?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finish</title>
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
                                Finish
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">POS</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="POS" type="number" name="pos" value="<?= $getData['nama_trek'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Lap</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Lap" type="number" name="lap" value="<?= $getData['lap'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Id Card</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="ID Card" type="text" name="id_card" value="<?= $getData['id_card'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No Lambung</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="No Lambung" type="number" name="no_lambung" value="<?= $getData['no_lambung'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Start Time</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Start Time" type="time" name="start_time" value="<?= $getData['start_time'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Cek Point</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Cek Point" type="text" name="cek_point" value="<?= $getData['cek_point'] ?>" readonly />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Finish</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Finish" type="text" name="finish" value="<?= $getData['finish'] ?>" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Fastest</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Fastest" type="text" name="fastest" value="<?= $getData['fastest'] ?>" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Point</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Point" type="number" name="point" required value="<?= $getData['point'] ?>" readonly />
                            </label>


                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="registrasi" value="Daftar">
                                Submit
                            </button>

                            <hr class="my-8" />


                            <p class="mt-4">
                                <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="../finish.php">
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