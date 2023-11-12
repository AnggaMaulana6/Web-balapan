<?php
include "../../../db/koneksi.php";
session_start();

$query = mysqli_query($con, "SELECT * FROM kelas;");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>
<?php include "../../layout/header_master.php" ?>
<h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Tambah Kelas
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <div class="card-row" style="padding-bottom: 25px; padding-left: 20px;">
            <a href="./tambah_kelas.php" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-500 rounded-full dark:bg-blue-700 dark:text-blue-100">Tambah Kelas</a>
        </div>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <!-- <th class="px-4 py-3">NO</th> -->
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama Kelas</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $no = 1;
                foreach ($getData as $data) {

                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $no++ ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['kelas_name'] ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../../layout/footer.php" ?>