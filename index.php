
<?php
include "./db/koneksi.php";

$query = mysqli_query($con, "SELECT * FROM event");
$getData = mysqli_fetch_all($query, MYSQLI_ASSOC);

include "./layout/header.php";
?>

<style>
    .card-row{
    width: auto;
    height: auto;
    color: white;
    background: none;
    border: 0px;
    border-radius: 8px;
}
.table.table-dark{
    background: black;
    border-radius: 25px;
    border: 0px;
}
.banner{
    width: 80%;
    height: 10%;
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
        <div class="card-row">
            <center><img src="./assets/img/banner.jpg" class="banner" alt=""></center>
        </div>
        </br></br>
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-dark table-hover">
                <tbody>
                    <?php 
                    $no = 0;
                    foreach($getData as $data){
                    $no+=1;
                    
                    ?>
                    <tr>
                        <td>
                        <?php
                            if($data['status_event'] == 'selesai') { ?>
                            <img src="./assets/img/finish-line.png" alt="" width="50px">
                            <?php }elseif($data['status_event'] == 'menunggu') { ?>
                                <img src="./assets/img/clock.png" alt="" width="50px">
                             <?php }elseif($data['status_event'] == 'berlangsung') { ?>
                                <img src="./assets/img/live-streaming.png" alt="" width="50px">
                            <?php }else{ ?>
                                <img src="./assets/img/pdi.jpg" alt="" width="50px">
                            <?php } ?>
                        </td>
                        <td>
                            <a href="./event.php?id_event=<?=$data['id_event'] ?>" style='text-decoration:none;'><?= $data['nama_event'] ?></a>
                        </td>
                        <td>
                        <a href="./event.php?id_event=<?=$data['id_event'] ?>" style='text-decoration:none;'><?= $data['tanggal'] ?></a>
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