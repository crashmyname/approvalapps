<?php
session_start();
include('../../inc/koneksi.php');
require '../../inc/adminfunction.php';

$id = $_GET['id'];

    if(hapususer($id)>0){
        
    }

    ?>