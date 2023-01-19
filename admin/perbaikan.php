<?php 
$page = 'perbaikan';
include('a_header.php');
// include('query.php');

if($_SESSION['role']!=='maintenance'){
    echo "<script>document.location='403.php';</script>";
}

if(isset($_POST['tambah'])){
    if(tambahproses($_POST)>0){
    }
}

if(isset($_POST['update'])){
    if(updateperbaikan($_POST)>0){
    }
}

if(isset($_POST['updateproses'])){
    if(updateproses($_POST)>0){
    }
}

?>
<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Perbaikan</h1>
    <p class="mb-4">Data Perbaikan alat atau kendaraan.</p>
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
    <?php
        if(isset($_SESSION['tambah']))
        {
            ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['tambah']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['tambah']);
        }?>
    <?php
        if(isset($_SESSION['error']))
        {
            ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php 
                echo $_SESSION['error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
            unset($_SESSION['error']);
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
                                                        <label>ID PERBAIKAN</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select type="text" name="id" id="id" class="form-control"
                                                            required>
                                                            <option value="">-- Pilih --</option>
                                                            <?php 
                                                            $pb = $db->prepare("SELECT * FROM tb_perbaikan where status in('Pending','Proses')");
                                                            $pb->execute();
                                                            while($s = $pb->fetch()){?>
                                                            <option value="<?= $s['id_perbaikan']?>">
                                                                <?= $s['id_perbaikan']?></option>
                                                            <?php ;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <select type="text" name="status" id="satuan"
                                                            class="form-control" required>
                                                            <option value=""></option>
                                                            <option value="Proses Pengecekkan">Proses Pengecekkan
                                                            </option>
                                                            <option value="Proses Perbaikkan">Proses Perbaikan</option>
                                                            <option value="Selesai">Selesai</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Proses</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <textarea name="proses" id="" cols="30" rows="10"
                                                            class="form-control" placeholder="Proses"></textarea>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tanggal</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="tgl" value="<?php date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
echo date('Y-m-d'); // menampilkan jam sekarang"> ?>" readonly>
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
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $permintaan = $db->prepare("SELECT * FROM tb_perbaikan where status in ('Pending','Proses')");
                        $permintaan->execute();
                        while($data = $permintaan->fetch()){ ?>
                        <tr>
                            <td><?= $data['nm_user']?></td>
                            <td><?= $data['tanggal']?></td>
                            <td><?= $data['nama_alat']?></td>
                            <td><?= $data['bagiankomponenrusak']?></td>
                            <td><?= $data['penyebabkerusakan']?></td>
                            <td><?= $data['tgl_kerusakan']?></td>
                            <td><button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1<?= $data['id_perbaikan']?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1<?= $data['id_perbaikan']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Proses</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row match-height">
                                                    <div class="col-md-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Update Proses</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <form class="form form-horizontal" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label>Nama Staff</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="hidden" id="first-name"
                                                                                        class="form-control" name="id"
                                                                                        value="<?= $data['id_perbaikan']?>">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="nm_user"
                                                                                        value="<?= $data['nm_user']?>"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Tingkat Kerusakan</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <select type="text" name="kerusakan"
                                                                                        id="satuan" class="form-control"
                                                                                        required>
                                                                                        <option
                                                                                            value="<?= $data['kerusakan']?>">
                                                                                            <?= $data['kerusakan']?>
                                                                                        </option>
                                                                                        <?php 
                                                                                    $tingkatrusak = $db->prepare("SELECT * FROM tb_kategorikerusakan");
                                                                                    $tingkatrusak->execute();
                                                                                    while($datas = $tingkatrusak->fetch()){?>
                                                                                        <option
                                                                                            value="<?= $datas['id_kategori']?>">
                                                                                            <?= $datas['tingkatkerusakan']?>
                                                                                        </option>
                                                                                        <?php ;} ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Bagian Komponen Rusak</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="rusak"
                                                                                        value="<?= $data['bagiankomponenrusak']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Uraian Kerusakan</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <textarea name="uraiankerusakan"
                                                                                        id="" cols="30" rows="10"
                                                                                        class="form-control"
                                                                                        placeholder="Uraian Kerusakan"><?= $data['uraiankerusakan']?></textarea>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Tindakan</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="tindakan"
                                                                                        value="<?= $data['tindakan']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Penyebab Kerusakan</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="penyebab"
                                                                                        value="<?= $data['penyebabkerusakan']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Status Proses</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <select type="text" name="status"
                                                                                        id="satuan" class="form-control"
                                                                                        required>
                                                                                        <option
                                                                                            value="<?= $data['status']?>">
                                                                                            <?= $data['status']?>
                                                                                        </option>
                                                                                        <option value="Proses">
                                                                                            Proses
                                                                                        </option>
                                                                                        <option value="Selesai">
                                                                                            Selesai
                                                                                        </option>

                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 d-flex justify-content-end">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary me-1 mb-1"
                                                                                        name="update"
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> | <?php if($data['status']=='Pending'){?><button
                                    class="btn btn-warning">Pending</button><?php }else if($data['status']=='Proses'){?><button
                                    class="btn btn-secondary">Proses</button><?php } else{?><button
                                    class="btn btn-success">Selesai</button><?php }?> | <a
                                    onclick="return confirm('Apakah yakin data ingin dihapus?')"
                                    href="hapusdata/hapusperbaikan.php?id=<?= $data['id_perbaikan']?>"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Proses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Perbaikan</th>
                            <th>Status</th>
                            <th>Proses</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $permintaan = $db->prepare("SELECT * FROM tb_progress");
                        $permintaan->execute();
                        $data = $permintaan->rowCount();
                        if($data == 0){?>
                        <tr>
                            <td colspan=5 align='center'>Belum Ada Proses Pengerjaan</td>
                        </tr>
                        <?php }else{?>
                        <?php while($data = $permintaan->fetch()){ ?>
                        <tr>
                            <td><?= $data['id_perbaikan']?></td>
                            <td><?= $data['statusproses']?></td>
                            <td><?= $data['proses']?></td>
                            <td><?= $data['tgl']?></td>
                            <td><button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1<?= $data['id_progres']?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1<?= $data['id_progres']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Proses</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row match-height">
                                                    <div class="col-md-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Update Proses</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <form class="form form-horizontal" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label>ID</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="hidden" id="first-name"
                                                                                        class="form-control" name="ids"
                                                                                        value="<?= $data['id_progres']?>">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="id"
                                                                                        value="<?= $data['id_progres']?>"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Status</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <select type="text" name="status"
                                                                                        id="satuan" class="form-control"
                                                                                        required>
                                                                                        <option value="<?= $data['statusproses']?>"><?= $data['statusproses']?></option>
                                                                                        <option
                                                                                            value="Proses Pengecekkan">
                                                                                            Proses Pengecekkan
                                                                                        </option>
                                                                                        <option
                                                                                            value="Proses Perbaikan">
                                                                                            Proses Perbaikan</option>
                                                                                        <option value="Selesai">Selesai
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Proses</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <textarea name="proses" id=""
                                                                                        cols="30" rows="10"
                                                                                        class="form-control"
                                                                                        placeholder="Proses"><?= $data['proses']?></textarea>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Tanggal</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control" name="tgl"
                                                                                        value="<?php date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
echo date('Y-m-d'); // menampilkan jam sekarang"> ?>" readonly>
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-12 d-flex justify-content-end">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary me-1 mb-1"
                                                                                        name="updateproses"
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> | <?php if($data['statusproses']=='Pending'){?><button
                                    class="btn btn-warning">Pending</button><?php }else if($data['statusproses']=='Proses Pengecekkan'){?><button
                                    class="btn btn-secondary">Proses Pengecekkan</button><?php }else if($data['statusproses']=='Proses Perbaikan'){?><button
                                    class="btn btn-primary">Proses Perbaikan</button><?php } else{?><button
                                    class="btn btn-success">Selesai</button><?php } ?> | <a
                                    onclick="return confirm('Apakah yakin data ingin dihapus?')"
                                    href="hapusdata/hapusperbaikan.php?id=<?= $data['id_perbaikan']?>"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
<?php include('a_footer.php');?>