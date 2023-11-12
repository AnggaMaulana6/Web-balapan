<?php
session_start();
include "../../db/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM event;");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['no_lambung'])){
    $id_event = $_GET['no_lambung'];

    $query = "UPDATE event SET status_event = 'berlangsung' WHERE id_event = '$id_event'";
    $exQuery = mysqli_query($con, $query);
    if($exQuery){
        echo '<script>
        alert("Status Event diubah menjadi Berlangsung");
        window.location.replace("./event.php")
        </script>';
    }else{
        echo '<script>alert("Gagal mengubah status")</script>';
    }
}
if(isset($_GET['id_lambung'])){
    $id_event = $_GET['id_lambung'];

    $query = "UPDATE event SET status_event = 'selesai' WHERE id_event = '$id_event'";
    $exQuery = mysqli_query($con, $query);
    if($exQuery){
        echo '<script>
        alert("Status Event diubah menjadi Selesai");
        window.location.replace("./event.php")
        </script>';
    }else{
        echo '<script>alert("Gagal mengubah status")</script>';
    }
}

if(isset($_GET['no_hapus'])){
    $id_event = $_GET['no_hapus'];

    $queryHapus = "DELETE FROM event WHERE id_event = '$id_event'";
    $exHapus = mysqli_query($con, $queryHapus);

    if($exHapus){

        $queryHapus = mysqli_query($con, "DELETE FROM user WHERE id_event = '$id_event'");

        $queryHapus1 = mysqli_query($con, "DELETE FROM validasi WHERE id_event = '$id_event'");

        $queryHapus2 = mysqli_query($con, "DELETE FROM timing WHERE id_event = '$id_event'");
        
        $queryHapus3 = mysqli_query($con, "DELETE FROM start WHERE id_event = '$id_event'");
        
        $queryHapus4 = mysqli_query($con, "DELETE FROM finish WHERE id_event = '$id_event'");

        $queryHapus5 = mysqli_query($con, "DELETE FROM tmp_tabel WHERE id_event = '$id_event'");
        echo '<script>
        alert("Data berhasil dihapus");
        window.location.replace("./dashboard.php")
        </script>';
    }else{
        echo '<script>alert("Gagal menghapus data")</script>';
    }
    
}

// if(isset($_GET['no_hapus'])){
//     $id_event = $_GET['no_hapus'];

//     $queryHapus = "DELETE FROM event WHERE id_event = '$id_event'";
//     $exHapus = mysqli_query($con, $queryHapus);
//     if($exHapus){
//         echo '<script>
//         alert("Data berhasil dihapus");
//         window.location.replace("./event.php")
//         </script>';
//     }else{
//         echo '<script>alert("Gagal menghaous data")</script>';
//     }
    
// }

?>
<?php include "../layout/header.php" ?>
<h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Data Event
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <div class="card-row" style="padding-bottom: 25px; padding-left: 20px;">
            <a href="./menu/tambah_event.php" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-500 rounded-full dark:bg-blue-700 dark:text-blue-100">Tambah Event</a>
        </div>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <!-- <th class="px-4 py-3">NO</th> -->
                    <th class="px-4 py-3">No Lambung</th>
                    <th class="px-4 py-3">Nama Event</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Alamat Event</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $no = 1;
                foreach ($getData as $data) {
                
                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <!-- <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $no++ ?>
                            </span>
                        </td> -->
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['id_event'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['nama_event'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['tanggal'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['tempat'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['status_event'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="./event.php?no_lambung=<?= $data['id_event'] ?>" onclick="return confirm('Yakin ingin mengubah status?')" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-black-100"> Berlangsung </a>
                                <a href="./event.php?id_lambung=<?= $data['id_event'] ?>" onclick="return confirm('Yakin ingin mengubah status?')" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-black-100"> Selesai </a>
                                <a href="./event.php?no_hapus=<?= $data['id_event'] ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-500 rounded-full dark:bg-red-700 dark:text-red-100" > Hapus </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

        <?php include "../layout/footer.php" ?>