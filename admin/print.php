<?php
include('../inc/koneksi.php');

$id = $_GET['id'];
$lap = $db->prepare("SELECT * FROM tb_perbaikan where id_perbaikan='$id'");
$lap->execute();
$p = $lap->fetch();
$user = $db->prepare("SELECT * FROM tb_admin where role='Chief'");
$user->execute();
$ps = $user->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Print Laporan</title>

    <!-- Custom fonts for this template-->
    <link href="../sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid">
                <img src="../img/logo.jpg" class="img-fluid" width="100px" alt="" srcset="">
                <h1 class="h3 mb-2 text-gray-800 text-center">Laporan Perbaikan</h1>
                <p class="mb-4 text-center">laporan Perbaikan Alat atau Kendaraan</p><hr>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Pemeliharaan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table" id="dataTable" width="100%" cellspacing="0">
                                <!-- <thead> -->
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Data</th>
                                </tr>
                                <!-- </thead> -->
                                <!-- <tbody> -->
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Tanggal</td>
                                    <td><?= $p['tanggal']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Lokasi</td>
                                    <td><?= $p['lokasi']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Pleton</td>
                                    <td><?= $p['pleton']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>Nama Peralatan</td>
                                    <td><?= $p['nama_alat']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Merk</td>
                                    <td><?= $p['merk']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Satuan</td>
                                    <td><?= $p['satuan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">7</td>
                                    <td>Kategori Kerusakan</td>
                                    <td><?= $p['kerusakan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">8</td>
                                    <td>Bagian Komponen Rusak</td>
                                    <td><?= $p['bagiankomponenrusak']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">9</td>
                                    <td>Uraian Kerusakan</td>
                                    <td><?= $p['uraiankerusakan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">10</td>
                                    <td>Tindakan Yang Dilakukan</td>
                                    <td><?= $p['tindakan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">11</td>
                                    <td>Penyebab Kerusakan</td>
                                    <td><?= $p['penyebabkerusakan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">12</td>
                                    <td>Tanggal Kerusakan</td>
                                    <td><?= $p['tgl_kerusakan']?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">13</td>
                                    <td>Tanggal Selesai</td>
                                    <td><?= $p['tgl_selesai']?></td>
                                </tr>
                                <!-- </tbody> -->
                            </table>
                        </div>
                    </div>
                </div>

                <div class="text-end fs-5">
                    Tanggal <?php echo date('d-m-Y'); ?>
                </div><br><br>
                <div class="card border-0">
                <div class="text-start fs-5">
                    Mengetahui <br>
                    Officer <br><br><br>
                    <?= $p['nm_user'];?>
                </div>
                <div class="text-end position-absolute top-0 end-0 fs-5">
                    Mengetahui <br>
                    Chief<br><br><br>
                    <?= $ps['nm_user']?>
                </div>
                </div>
        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto fixed-bottom mb-2">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../sbadmin/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../sbadmin/js/demo/datatables-demo.js"></script> -->
    <script>
        window.print();
    </script>

</body>

</html>