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

    //ambil nilai keterangan
    $keterangan = $_GET['ket'];

    
    //uji jika keterangan tidak kosong
    if(isset($keterangan))
    {
        if ($keterangan == "puas") 
        {
            $puas = $puas + 1;
            //update nilai puas kedalam table bb_ikm
            $query = "UPDATE tb_ikm SET puas = '$puas' where id_ikm = '$id_ikm' ";
        }
        elseif($keterangan == "cukup")
        {
            $cukup = $cukup + 1;
            //update nilai cukup kedalam table tb_ikm
            $query = "UPDATE tb_ikm SET cukup = '$cukup' where id_ikm = '$id_ikm' ";
        }
        elseif($keterangan == "kurang")
        {
            $kurang = $kurang + 1;
            //update nilai kurang kedalam table tb_ikm
            $query = "UPDATE tb_ikm SET kurang = '$kurang' where id_ikm = '$id_ikm' ";
        }

          //update data sesuai query
            if(mysqli_query($koneksi, $query)){ //jika simpan db sukses
                $response = [
                    'message'     => 'Simpan data sukses',
                    'status'  => 'sukses'
                ];
    
                header('Content-Type: application/json');
    
                echo json_encode($response);
            }else{
                $response = [
                    'message'     => 'Simpan data gagal',
                    'status'    => 'gagal'
                ];
    
                header('Content-Type: application/json');
    
                echo json_encode($response);
            }

            // misal gw bikin format response ky gni,lu tiru copas2 di semua project jg gpp sama aja,tinggal diganti datanya aja
            






            // echo "<script>
                    // alert('Terima Kasih, anda berhasil memberikan penilaian');
                    // document.location='index.php';
                // </script>";
            
            
            
            // echo "<script type='text/javascript'>
            // setTimeout(function () {
            //             swal({ 
            //             title: 'Terima Kasih Telah Memberikan Penilaian',
            //             text:'ket = $query',
            //             type: 'success',
            //             timer:3200,
            //             showConfirmButton: true
            //             }) ;
            //         },10);
            //         window.setTimeout(function(){
            //             window.location.replace('index.php');
            //         },3000);
            //       </script>";
    }
?>