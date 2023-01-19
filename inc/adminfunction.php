<?php

function koneksi(){
    $db = new PDO('mysql:host=localhost;dbname=dbperbaikan','root','');
    return $db;
}

function login($data){
    $db = koneksi();
    $username = $data['user'];
    $password = md5($data['pass']);
    // $password = md5($password);
    $sql = "SELECT * FROM tb_admin where username='$username' AND password='$password'";
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    $cek = $result->fetch();
    // var_dump($cek);
    if($row > 0){
        $_SESSION['auth'] = 1;
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $cek['role'];
            echo "<script>document.location='index.php';</script>";
        }else{
            $_SESSION['error'] = 'username atau password anda salah';
            // echo "<script>alert('Username atau Password Anda Salah');</script>";
            // echo "<script>document.location='login.php';</script>";
            session_destroy();
        }
    
}

function tambahalat($data){
    $db = koneksi();
    $alat = $data['nm_alat'];
    $merk = $data['merk'];
    $jml = $data['jumlah'];
    $satuan = $data['satuan'];

    $tbalat = $db->prepare("SELECT * FROM tb_alat where nama_alat='$alat'");
    $tbalat->execute();
    $cek = $tbalat->rowCount();
    // $data->fetch();
    if($cek > 0){
        $_SESSION['gagal_input'] = 'Data Alat sudah ada, tidak bisa melakukan input data yang sama';
    }
    else{
        $ialat = $db->prepare("INSERT INTO tb_alat values('','$alat','$merk','$jml','$satuan')");
        $ialat->execute();
        // var_dump($datas);
        $_SESSION['berhasil'] = 'Data Alat berhasil ditambah';
        // echo "<script>alert('Data Berhasil Ditambah');</script>";
        // echo "<script>document.location='../admin/alat.php';</script>";
    }
}

function editalat($data){
    $db = koneksi();
    $id = $data['id_alat'];
    $alat = $data['nm_alat'];
    $merk = $data['merk'];
    $jml = $data['jumlah'];
    $satuan = $data['satuan'];

    $upalat = $db->prepare("UPDATE tb_alat set `nama_alat`='$alat',`merk`='$merk',`jumlah`='$jml',`satuan`='$satuan' where `id_alat`='$id'");
    $upalat->execute();
    // var_dump($upalat);
    if($upalat){
        $_SESSION['update'] = 'Data berhasil diubah';
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';

    }
}

function hapusalat($id){
    $db = koneksi();
    $delalat = $db->prepare("DELETE from tb_alat where id_alat='$id'");
    $delalat->execute();
    // var_dump($delalat);
    if($delalat == true){
        // $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>alert('Data Berhasil dihapus');</script>";
        echo "<script>document.location='../../admin/alat.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        // echo "<script>document.location='kategori.php';</script>";
    }
}

function tambahkendaraan($data){
    $db = koneksi();
    $knd = $data['nm_kendaraan'];
    $merk = $data['merk'];
    $jns = $data['jenis'];
    $satuan = $data['satuan'];

    $tbknd = $db->prepare("SELECT * FROM tb_kendaraan where nama_kendaraan='$knd'");
    $tbknd->execute();
    $cek = $tbknd->rowCount();
    // $data->fetch();
    if($cek > 0){
        $_SESSION['gagal_input'] = 'Data Kendaraan sudah ada, tidak bisa melakukan input data yang sama';
    }
    else{
        $iknd = $db->prepare("INSERT INTO tb_kendaraan values('','$knd','$merk','$jns','$satuan')");
        $iknd->execute();
        // var_dump($datas);
        $_SESSION['berhasil'] = 'Data Kendaraan berhasil ditambah';
        // echo "<script>alert('Data Berhasil Ditambah');</script>";
        // echo "<script>document.location='../admin/alat.php';</script>";
    }
}

function editkendaraan($data){
    $db = koneksi();
    $id = $data['id_knd'];
    $knd = $data['nm_kendaraan'];
    $merk = $data['merk'];
    $jns = $data['jenis'];
    $satuan = $data['satuan'];

    $upknd = $db->prepare("UPDATE tb_kendaraan set `nama_kendaraan`='$knd',`merk`='$merk',`jenis_kendaraan`='$jns',`satuan`='$satuan' where `id_kendaraan`='$id'");
    $upknd->execute();
    // var_dump($upalat);
    if($upknd){
        $_SESSION['update'] = 'Data berhasil diubah';
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';

    }
}

function hapuskendaraan($id){
    $db = koneksi();
    $delknd = $db->prepare("DELETE from tb_kendaraan where id_kendaraan='$id'");
    $delknd->execute();
    // var_dump($delalat);
    if($delknd == true){
        // $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>alert('Data Berhasil dihapus');</script>";
        echo "<script>document.location='../../admin/kendaraan.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        // echo "<script>document.location='kategori.php';</script>";
    }
}

function tambahuser($data){
    $db = koneksi();
    $nik = $data['nik'];
    $nama = $data['nm_user'];
    $user = $data['username'];
    $pass = md5($data['pass']);

    $tbuser = $db->prepare("SELECT * FROM tb_user where username='$user' OR nik='$nik'");
    $tbuser->execute();
    $cek = $tbuser->rowCount();

    if($cek > 0){
        $_SESSION['gagal_input'] = 'Data User sudah ada, tidak bisa melakukan input data yang sama';
    }
    else{
        $iuser = $db->prepare("INSERT INTO tb_user values('','$nik','$nama','$user','$pass')");
        $iuser->execute();
        // var_dump($datas);
        $_SESSION['berhasil'] = 'Data User berhasil ditambah';
        // echo "<script>alert('Data Berhasil Ditambah');</script>";
        // echo "<script>document.location='../admin/alat.php';</script>";
    }
}

function edituser($data){
    $db = koneksi();
    $id = $data['uid'];
    $nik = $data['nik'];
    $nama = $data['nm_user'];
    $user = $data['username'];
    $pass = md5($data['pass']);

    $cekuser = $db->prepare("SELECT * FROM tb_user where username='$user'");
    $cekuser->execute();
    $cek = $cekuser->rowCount();
    // var_dump($cek);
    // if($cek > 0){
    //     echo "<script>alert('Data Gagal Diubah Karena data yang anda inputkan sudah terdaftar');</script>";
    //     echo "<script>document.location='../admin/user.php';</script>";
    //     // $_SESSION['errorupdate'] = 'Data Gagal Diubah';
    // }else{
    $upuser = $db->prepare("UPDATE tb_user set `nik`='$nik',`nm_user`='$nama',`username`='$user',`password`='$pass' where `iduser`='$id'");
    $upuser->execute();
    // var_dump($upuser);
    if($upuser){
        $_SESSION['update'] = 'Data berhasil diubah';
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';

    }
// }
}

function hapususer($id){
    $db = koneksi();
    $deluser = $db->prepare("DELETE from tb_user where iduser='$id'");
    $deluser->execute();
    // var_dump($delalat);
    if($deluser == true){
        // $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>alert('Data Berhasil dihapus');</script>";
        echo "<script>document.location='../../admin/user.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        // echo "<script>document.location='kategori.php';</script>";
    }
}

function hapusperbaikan($id){
    $db = koneksi();
    $delperbaikan = $db->prepare("DELETE from tb_perbaikan where id_perbaikan='$id'");
    $delperbaikan->execute();
    // var_dump($delalat);
    if($delperbaikan){
        // $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>alert('Data Berhasil dihapus');</script>";
        echo "<script>document.location='../../admin/perbaikan.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        // echo "<script>document.location='kategori.php';</script>";
    }
}

function updateperbaikan($data){
    $db = koneksi();
    $id = $data['id'];
    $tingkat = $data['kerusakan'];
    $rusak = $data['rusak'];
    $uraian = $data['uraiankerusakan'];
    $tindakan = $data['tindakan'];
    $penyebab = $data['penyebab'];
    $status = $data['status'];
    $update = $db->prepare("UPDATE tb_perbaikan set kerusakan='$tingkat',bagiankomponenrusak='$rusak',uraiankerusakan='$uraian',tindakan='$tindakan',penyebabkerusakan='$penyebab',tgl_selesai=now(),status='$status' where id_perbaikan='$id'");

    if($update->execute()){
        $_SESSION['update'] = 'Anda Sudah Melakukan Update Perbaikan';
        // header('location=../admin/perbaikan.php');
    }else{
        $_SESSION['error'] = 'Gagal Melakukan update';
        // header('location=../admin/perbaikan.php');
    }
    // var_dump($update);
}

function tambahproses($data){
    $db = koneksi();
    $id = $data['id'];
    $status = $data['status'];
    $proses = $data['proses'];
    $tgl = $data['tgl'];
    $cek = $db->prepare("SELECT * FROM tb_progress where id_perbaikan ='$id'");
    $cek->execute();
    $cs = $cek->rowCount();
    $c = $cek->fetch();
    if($cs > 0){
        $_SESSION['gagal'] = 'Data yang diinput sudah ada';   
}else{
    $proses = $db->prepare("INSERT INTO tb_progress values('','$id','$status','$proses','$tgl')");
    if($proses->execute()){
        $_SESSION['tambah'] = 'Data proses telah ditambah';
    }else{
        $_SESSION['gagal'] = 'Gagal';
    }
}
    ;
    // var_dump($proses);
}

function updateproses($data){
    $db = koneksi();
    $id = $data['id'];
    $status = $data['status'];
    $proses = $data['proses'];
    $tanggal = $data['tgl'];
    $updates = $db->prepare("UPDATE tb_progress set statusproses='$status',proses='$proses',tgl='$tanggal' where id_progres='$id'");

    if($updates->execute()){
        $_SESSION['update'] = 'Anda Sudah Melakukan Update Proses';
        // header('location=../admin/perbaikan.php');
    }else{
        $_SESSION['error'] = 'Gagal Melakukan update';
        // header('location=../admin/perbaikan.php');
    }
    // var_dump($update);
}

?>