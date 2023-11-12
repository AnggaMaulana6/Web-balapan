
<?php
include "./db/koneksi.php";

if(isset($_GET['id_event'])){
    $id_event = $_GET['id_event'];
$queryEvent = mysqli_query($con, "SELECT * FROM event WHERE id_event = '$id_event'");
$getDataEvent = mysqli_fetch_assoc($queryEvent);

}

$query = mysqli_query($con, "SELECT * FROM event INNER JOIN user ON event.id_event = user.id_event WHERE event.id_event = event.id_event AND user.level = 'user'");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);




include "./layout/header.php";
?>

<style>
        .card{
    width: auto;
    height: auto;
    color: white;
    background: none;
    border: 0px;
    border-radius: 8px;
}
    .card-row{
    width: auto;
    height: auto;
    color: white;
    background: black;
    border: 0px;
    border-radius: 20px;
}
.table.table-dark{
    background: black;
    border-radius: 25px;
    border: 0px;
}
.banner{
    width: 80%;
    border-radius: 8px;
}
.hdr{
    font-family: 'Times New Roman', Times, serif;
    padding-left: 30px;
    padding-right: auto; 
}
</style>
<!-- Header -->
<header id="header" class="header">
    <div class="container">
    <div class="card">
            <center><img src="./assets/img/banner.jpg" class="banner" alt=""></center>
        </div>
        <br>
        <div class="card-row">
            <h4 style="padding-left: 30px; padding-top: 5px;">Event : <?= $getDataEvent['nama_event'] ?></h4>
            <h4 style="padding-left: 30px; padding-bottom: 10px;"> Tanggal : <?= $getDataEvent['tanggal'] ?></h4>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-dark">
                    <thead>
                        <div class="card-row" style="background: none;">
                            <h2 style="padding-top: 20px;">Peserta</h2>
                        </div>
                    <tr>
                        <th>No</th>
                        <th>NO Lambung</th>
                        <th>Nama</th>
                        <th>Point</th>
                        <th>Finish</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($getData as $data){
                    
                    
                    ?>
                    <tr>
                        <td><?=$no++ ?></td>
                        <td>
                            <?= $data['no_lambung'] ?>
                        </td>
                        <td>
                            <?= $data['nama'] ?>                    
                        </td>
                        <td>
                            <!-- <?= $data['point'] ?>                     -->
                        </td>
                        <td>
                            <!-- <?= $data['finish'] ?>                     -->
                        </td>
                    </tr>
                <?php } ?>
                
                </tbody>
            </table>

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of header -->

<?php include "./layout/footer.php"; ?>