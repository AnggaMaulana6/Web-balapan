<?php
session_start();
include "../../db/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM timing");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['no_hapus'])){
    $no_lambung = $_GET['no_hapus'];

    $queryHapus = "DELETE FROM timing WHERE no_lambung = '$no_lambung'";
    $exHapus = mysqli_query($con, $queryHapus);
    if($exHapus){
        echo '<script>
        alert("Data berhasil dihapus");
        window.location.replace("./timing.php")
        </script>';
    }else{
        echo '<script>alert("Gagal menghapus data")</script>';
    }
    
}

?>
<?php include "../layout/header.php" ?>
<h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Data Timing
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <div class="card-row" style="padding-bottom: 25px; padding-left: 20px;">
            <a href="./menu/cetak_lp_timing.php" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-500 rounded-full dark:bg-green-700 dark:text-green-100">Cetak Laporan</a>
        </div>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <!-- <th class="px-4 py-3">NO</th> -->
                    <th class="px-4 py-3">Pos</th>
                    <th class="px-4 py-3">No Lambung</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Finish</th>
                    <th class="px-4 py-3">Total Point</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $no = 1;
                foreach ($getData as $data) {
                
                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= $data['nama_trek'] ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= $data['no_lambung'] ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= $data['nama'] ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= $data['finish'] ?>
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= $data['total_point'] ?>
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="./menu/edit_timing.php?no_lambung=<?= $data['no_lambung'] ?>" class='px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-500 rounded-full dark:bg-blue-700 dark:text-blue-100'> ADD Timing </a>
                                    <a href="./timing.php?no_hapus=<?= $data['no_lambung'] ?>" onclick="return confirm('Yakin ingin menghapus data?')" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-500 rounded-full dark:bg-blue-700 dark:text-blue-100"> Hapus </a>
                                </div>
                            </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

        <?php include "../layout/footer.php" ?>