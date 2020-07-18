<?php
    include "koneksi.php";

    //tampil data
    $tampil = mysqli_query($koneksi, "SELECT * FROM tb_ikm limit 1");
     //set data
    $data = mysqli_fetch_array($tampil);

    $id_ikm = $data['id_ikm'];
    $puas   = $data['puas'];
    $cukup  = $data['cukup'];
    $kurang = $data['kurang'];


    $response = [
        'message'     => 'get data sukses',
        'puas'  => $data['puas'],
        'cukup'  => $data['cukup'],
        'kurang'  => $data['kurang']
    ];

    header('Content-Type: application/json');

    echo json_encode($response);