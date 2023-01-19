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
    $sql = "SELECT * FROM tb_user where username='$username' AND password='$password'";
    $result = $db->prepare($sql);
    $result->execute();
    $row = $result->rowCount();
    $cek = $result->fetch();
    // var_dump($cek);
    // $iduser = $cek['iduser'];
    if($row > 0){
        $_SESSION['auth'] = 1;
        // $_SESSION['iduser'] = $iduser;
        $_SESSION['user'] = $username;
        // $_SESSION['role'] = $cek['role'];
            echo "<script>document.location='index.php';</script>";
        }else{
            $_SESSION['error'] = 'username atau password anda salah';
            // header('location=login.php');
            // echo "<script>document.location='login.php';</script>";
            session_destroy();  
    }
}

function tambahperbaikan($data){
    $db = koneksi();
    $iduser = $data['iduser'];
    $user = $data['nm_user'];
    $tgl = $data['tgl'];
    $loc = $data['lokasi'];
    $plt = $data['pleton'];
    $alat = $data['alat'];
    $merk = $data['merk'];
    $satuan = $data['satuan'];
    $krsk = $data['kerusakan'];
    $bgn = $data['bagiankomponen'];
    $urk = $data['uraiankerusakan'];
    $tnd = $data['tindakan'];
    $pnb = $data['penyebab'];
    $tglr = $data['tglrusak'];

    $sql = "SELECT * FROM tb_perbaikan where tanggal='$tgl'";
    $data = $db->prepare($sql);
    $data->execute();
    $cek = $data->rowCount();
    // $data->fetch();
    if($cek > 0){
        $_SESSION['gagal'] = "Data Permintaan sudah ada, tidak bisa melakukan input data lagi, tunggu proses pengerjaan kelar";
    }
    else{
        $query = "INSERT INTO tb_perbaikan values('','$iduser','$user','$tgl','$loc','$plt','$alat','$merk','$satuan','$krsk','$bgn','$urk','$tnd','$pnb','$tglr','Pending')";
        $datas = $db->prepare($query);
        $datas->execute();
        var_dump($datas);
        $_SESSION['status_berhasil'] = 'Data Permintaan berhasil ditambah';
        header('location:../perbaikan.php');
        // echo "<script>document.location='perbaikan.php';</script>";
    }
}

function editperbaikan($data){
    $db = koneksi();
    $id = $data['id'];
    $catg = $data['kategori'];
    $sql = "UPDATE tb_kategori set nama_kategori='$catg' where id_kategori='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    if($result){
        $_SESSION['update'] = 'Data berhasil diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
    else{
        $_SESSION['errorupdate'] = 'Data Gagal Diubah';
        // echo "<script>document.location='kategori.php';</script>";
    }
}

function hapusperbaikan($id){
    $db = koneksi();
    $sql = "DELETE from tb_kategori where id_kategori='$id'";
    $result = $db->prepare($sql);
    $result->execute();
    // var_dump($result);
    if($result == true){
        $_SESSION['deletecatg'] = 'Data berhasil dihapus';
        echo "<script>document.location='../kategori.php';</script>";
    }
    else{
        $_SESSION['errordelete'] = 'Data Gagal dihapus';
        echo "<script>document.location='kategori.php';</script>";
    }
}

?>