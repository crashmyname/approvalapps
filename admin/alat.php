<?php 
$page = 'alat';
include('a_header.php');
// include('query.php');

if($_SESSION['role']!=='manager'){
    echo "<script>document.location='403.php';</script>";
}

if(isset($_POST['simpan'])){
    if(tambahalat($_POST)>0){
    }
}

if(isset($_POST['update'])){
    if(editalat($_POST)>0){
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Alat dan Kendaraan</h1>
    <p class="mb-4">Data Alat dan Kendaraan Pt. Angkasa.</p>

    <!-- DataTales Example -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">FORM TAMBAH ALAT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah Alat</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Nama Alat</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="nm_alat" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Merk</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="merk">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Jumlah</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="first-name" class="form-control"
                                                            name="jumlah">
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
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                                            name="simpan"
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
            <h6 class="m-0 font-weight-bold text-primary">DataTables Alat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Alat</th>
                            <th>Merk</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $alat = $db->prepare("SELECT * FROM tb_alat");
                        $alat->execute();
                        while($data = $alat->fetch()){?>
                        <tr>
                            <td><?= $data['nama_alat']?></td>
                            <td><?= $data['merk']?></td>
                            <td><?= $data['jumlah']?></td>
                            <td><?= $data['satuan']?></td>
                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1<?= $data['id_alat']?>">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1<?= $data['id_alat']?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">FORM UBAH ALAT</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row match-height">
                                                    <div class="col-md-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Edit Alat</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <form class="form form-horizontal" method="post"
                                                                        enctype="multipart/form-data">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label>Nama Alat</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="hidden" id="first-name"
                                                                                        class="form-control"
                                                                                        name="id_alat" value="<?= $data['id_alat']?>">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="nm_alat" value="<?= $data['nama_alat']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Merk</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="merk" value="<?= $data['merk']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Jumlah</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <input type="text" id="first-name"
                                                                                        class="form-control"
                                                                                        name="jumlah" value="<?= $data['jumlah']?>">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label>Satuan</label>
                                                                                </div>
                                                                                <div class="col-md-8 form-group">
                                                                                    <select type="text" name="satuan"
                                                                                        id="satuan" class="form-control"
                                                                                        required>
                                                                                        <option value="<?= $data['satuan']?>"><?= $data['satuan']?>
                                                                                        </option>
                                                                                        <option value="Buah">Buah
                                                                                        </option>
                                                                                        <option value="Tabung">Tabung
                                                                                        </option>
                                                                                        <option value="Box">Box</option>
                                                                                        <option value="Unit">Unit
                                                                                        </option>
                                                                                        <option value="Set">Set</option>
                                                                                        <option value="Roll">Roll
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
                                </div> | <a href="hapusdata/hapusalat.php?id=<?= $data['id_alat']?>" name="hapus" onclick="return confirm('Apakah Yakin Alat ini akan dihapus???')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php ;} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
<?php include('a_footer.php');?>