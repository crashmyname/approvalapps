<?php
$page = 'progres';
include('inc/header.php');
// include('inc/query.php');

if(isset($_POST['tambah'])){
    if(tambahperbaikan($_POST)>0){

    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Progress</h1>
    <p class="mb-4">Data Progress Perbaikan alat atau kendaraan.</p>

    <hr>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Progress Perbaikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Alat / Kendaraan</th>
                            <th>Proses</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $proses = $db->prepare("SELECT * FROM tb_progress a inner join tb_perbaikan b on b.id_perbaikan = a.id_perbaikan where iduser='$enduser[iduser]'");
                        $proses->execute();
                        while($data = $proses->fetch()){ ?>
                        <tr>
                            <td><?= $data['nama_alat']?></td>
                            <td><?= $data['proses']?></td>
                            <td><?= $data['tgl']?></td>
                            <td><?= $data['statusproses']?></td>
                            <!-- <td>Opsi</td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<?php
include('inc/footer.php');
?>