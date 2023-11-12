<?php
session_start();
include "../../db/koneksi.php";


$nama = $_SESSION['nama'];
$password = $_SESSION['password'];
$query = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama' AND password = '$password' ");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);




include "../layout/header_users.php"
?>

<style>
      .card-row{
    width: auto;
    height: auto;
    color: white;
    background: none;
    border: 0px;
    border-radius: 20px;
    padding-bottom: 20px;
}
  .btr{
    width: 80%;
    border-radius: 8px;
}
</style>

                <?php
                    foreach ($getData as $data) {
                ?>

              <div class="card-row">
                  <center><img src="../../assets/img/banner.jpg" class="banner" alt=""></center>
                </div>
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg width="30" height="30" fill="currentColor" viewBox="0 0 512 512"><path d="M399.9,80s0-27.88,0-48H112V80H32v38c0,32,9.5,62.79,26.76,86.61,13.33,18.4,34.17,31.1,52.91,37.21,5.44,29.29,20.2,57.13,50.19,79.83,22,16.66,48.45,28.87,72.14,33.86V436H160v44H352V436H278V355.51c23.69-5,50.13-17.2,72.14-33.86,30-22.7,44.75-50.54,50.19-79.83,18.74-6.11,39.58-18.81,52.91-37.21C470.5,180.79,480,150,480,118V80ZM94.4,178.8C83.72,164.12,77.23,144.4,76.16,124H112v67.37C108.06,190.23,99.08,185.25,94.4,178.8Zm323.2,0C413,185.41,406,191.38,400,191.38c0-22.4,0-46.29-.05-67.38h35.9C434.77,144.4,428,163.9,417.6,178.8Z"/></svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Trophy
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['no_lambung'] ?>
                  </p>
                </div>
              </div>

              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                  </svg>
                  <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"> <path d="M12 7a8 8 0 1 1 0 16 8 8 0 0 1 0-16zm0 3.5l-1.323 2.68-2.957.43 2.14 2.085-.505 2.946L12 17.25l2.645 1.39-.505-2.945 2.14-2.086-2.957-.43L12 10.5zm1-8.501L18 2v3l-1.363 1.138A9.935 9.935 0 0 0 13 5.049L13 2zm-2 0v3.05a9.935 9.935 0 0 0-3.636 1.088L6 5V2l5-.001z"/> </svg>
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Score
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['no_lambung'] ?>
                  </p>
                </div>
              </div>
            </div>

            <h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Profile
            </h2>

            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Nama
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['nama'] ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                </div>
                <div>
                  <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    No Lambung
                  </p>
                  <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['no_lambung'] ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Alamat
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['alamat'] ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    No HP
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                  <?= $data['no_hp'] ?>
                  </p>
                </div>
              </div>
            </div>
            <?php } ?>

<h2 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Riwayat
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Lap</th>
                    <th class="px-4 py-3">Finish</th>
                    <th class="px-4 py-3">Index</th>
                    <th class="px-4 py-3">Jam</th>
                    <!-- <th class="px-4 py-3">Lihat Detail</th> -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                foreach ($getData as $data) {

                ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['no_lambung'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['nama'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['alamat'] ?>
                            </span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <?= $data['no_hp'] ?>
                            </span>
                        </td>
                        <!-- <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="./lihat_riwayat.php?no_lambung=<?= $data['no_lambung'] ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                            </div>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../layout/footer.php" ?>