<?php
include "../../db/koneksi.php";
session_start();

$query = mysqli_query($con, "SELECT * FROM start JOIN validasi ON start.no_lambung = validasi.no_lambung WHERE validasi.no_start > 0");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>
<?php include "../layout/header_users.php" ?>


<div class="card-row">
    <center><img src="../../assets/img/banner.jpg" style="width: 70%; border-radius: 8px;" alt=""></center>
</div></br></br>
<h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Laporan Start List
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <div class="card-row" style="padding-bottom: 25px; padding-left: 20px;">
            <a href="./cetak_lp_start_list.php" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-500 rounded-full dark:bg-green-700 dark:text-green-100">Cetak Laporan</a>
        </div>
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <!-- <th class="px-4 py-3">NO</th> -->
                    <th class="px-4 py-3">Pos</th>
                    <th class="px-4 py-3">No Lambung</th>
                    <th class="px-4 py-3">No Start</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Lap</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Start Time</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $no = 1;
                $pos = 1;
                foreach ($getData as $data) {

                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['nama_trek'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['no_lambung'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['no_start'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['kelas'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['lap'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['nama'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['start_time'] ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../layout/footer.php" ?>