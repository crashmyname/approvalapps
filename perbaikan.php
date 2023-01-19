<?php
$page = 'perbaikan';
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
    <h1 class="h3 mb-2 text-gray-800">Data Perbaikan</h1>
    <p class="mb-4">Data Perbaikan alat atau kendaraan.</p>

    <!-- DataTales Example -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah perbaikan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">FORM PERBAIKAN ALAT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Perbaikan</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nama User</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <input type="hidden" id="first-name" class="form-control"
                                                            name="iduser" value="<?= $enduser['iduser']?>">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="nm_user" value="<?= $_SESSION['user']?>" readonly>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tanggal</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
echo date('Y-m-d'); // menampilkan jam sekarang"> ?>" readonly>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Lokasi</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="lokasi">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Pleton</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="pleton">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nama Alat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select type="text" name="alat" id="alat"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <?php $alat = $db->prepare("SELECT * FROM tb_alat");
                                                            $alat->execute();
                                                            while($alt = $alat->fetch()){?>
                                                            <option value="<?= $alt['nama_alat']?>"><?= $alt['nama_alat']?></option>
                                                            <?php ;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Merk</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select type="text" name="merk" id="alat"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <?php $alat = $db->prepare("SELECT * FROM tb_alat");
                                                            $alat->execute();
                                                            while($alt = $alat->fetch()){?>
                                                            <option value="<?= $alt['merk']?>"><?= $alt['merk']?></option>
                                                            <?php ;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Satuan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select type="text" name="satuan" id="satuan"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Buah">Buah</option>
                                                            <option value="Tabung">Tabung</option>
                                                            <option value="Box">Box</option>
                                                            <option value="Unit">Unit</option>
                                                            <option value="Set">Set</option>
                                                            <option value="Roll">Roll</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Kerusakan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <select type="text" name="kerusakan" id="satuan"
                                                            class="form-control" required>
                                                            <option value="">-- Pilih --</option>
                                                            <?php 
                                                            $tingkatrusak = $db->prepare("SELECT * FROM tb_kategorikerusakan");
                                                            $tingkatrusak->execute();
                                                            while($data = $tingkatrusak->fetch()){?>
                                                            <option value="<?= $data['id_kategori']?>"><?= $data['tingkatkerusakan']?></option>
                                                            <?php ;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Bagian Komponen Rusak</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="bagiankomponen" placeholder="Bagian Komponen Rusak">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Uraian Kerusakan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <textarea name="uraiankerusakan" id="" cols="30" rows="10" class="form-control" placeholder="Uraian Kerusakan"></textarea>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tindakan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="tindakan" placeholder="Tindakan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Penyebab Kerusakan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="penyebab" placeholder="Penyebab kerusakan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tanggal Kerusakan</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="date" id="first-name" class="form-control"
                                                            name="tglrusak" placeholder="tanggal kerusakan">
                                                    </div>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                                            name="tambah"
                                                            onclick="return confirm('Apakah data yang anda masukkan sudah benar?')">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
    <?php
        if(isset($_SESSION['status_berhasil']))
        {
            ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['status_berhasil']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['status_berhasil']);
        }?>
    <?php
        if(isset($_SESSION['gagal']))
        {
            ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['gagal']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['gagal']);
        }?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Perbaikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Staff</th>
                            <th>Tanggal</th>
                            <th>Alat</th>
                            <th>Komponen Rusak</th>
                            <th>Penyebab</th>
                            <th>Tanggal Rusak</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $permintaan = $db->prepare("SELECT * FROM tb_perbaikan where iduser='$enduser[iduser]'");
                        $permintaan->execute();
                        while($data = $permintaan->fetch()){ ?>
                        <tr>
                            <td><?= $data['nm_user']?></td>
                            <td><?= $data['tanggal']?></td>
                            <td><?= $data['nama_alat']?></td>
                            <td><?= $data['bagiankomponenrusak']?></td>
                            <td><?= $data['penyebabkerusakan']?></td>
                            <td><?= $data['tgl_kerusakan']?></td>
                            <td><?php if($data['status']=='Pending'){?><button class="btn btn-warning"><?= $data['status']?></button><?php } else if($data['status']=='Proses'){?><button class="btn btn-primary"><?= $data['status']?></button>
                            <?php } else{?><button class="btn btn-success"><?= $data['status']?></button><?php } ?></td>
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