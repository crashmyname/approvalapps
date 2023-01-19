<?php 
$page = 'laporan';
include('a_header.php');
// include('query.php');

if($_SESSION['role']!=='chief' && $_SESSION['role']!=='maintenance'){
    echo "<script>document.location='403.php';</script>";
}

if(isset($_POST['simpan'])){
    if(tambahuser($_POST)>0){
    }
}

if(isset($_POST['update'])){
    if(edituser($_POST)>0){
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
    <p class="mb-4">Data Laporan Pt. Angkasa.</p>

    <!-- DataTales Example -->
    
    <hr>
    <?php
        if(isset($_SESSION['berhasil']))
        {
            ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['berhasil']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['berhasil']);
        }?>
    <?php
        if(isset($_SESSION['gagal_input']))
        {
            ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['gagal_input']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['gagal_input']);
        }?>
    <?php
        if(isset($_SESSION['update']))
        {
            ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['update']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['update']);
        }?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Laporan Selesai Perbaikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Staff</th>
                            <th>Tanggal</th>
                            <th>Nama Perbaikan Alat/Kendaraan</th>
                            <th>Bagian Komponen Rusak</th>
                            <th>Tanggal Kerusakan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $laporan = $db->prepare("SELECT * FROM tb_perbaikan where status='Selesai'");
                        $laporan->execute();
                        $no = 1;
                        while($data = $laporan->fetch()){?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $data['nm_user']?></td>
                            <td><?= $data['tanggal']?></td>
                            <td><?= $data['nama_alat']?></td>
                            <td><?= $data['bagiankomponenrusak']?></td>
                            <td><?= $data['tgl_kerusakan']?></td>
                            <td><a target="_blank" href="print.php?id=<?= $data['id_perbaikan']?>" class="btn btn-warning"><i class="fas fa-print text-white"></i></a></td>
                        </tr>
                        <?php $no++;} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
<?php include('a_footer.php');?>