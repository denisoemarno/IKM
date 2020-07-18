<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="js/sweetalert2.min.css">

    <!-- Optional JavaScript -->
    <!-- SweetAlert2 -->
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        .mousechange:hover {
            cursor: pointer;
        }
    </style>
    <title>Indeks Kepuasan Masyarakat</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-info text-white">
        <div class="container text-center">
            <h1 class="display-4">Indeks Kepuasan Masyarakat</h1>
            <p class="lead">Terhadap Kepuasan Pelayanan RT 14 / RW 06 Warga KP DUKU </p>
        </div>
    </div>
    <style type="text/css">
        .box{
            padding:30px 40px;
            border-radius:5px;
        }
    </style>
    <!-- Awal Container -->
    <?php
        //koneksi ke db
        include "koneksi.php";

        //tampil data
        $tampil = mysqli_query($koneksi, "SELECT * from tb_ikm" );

        //set data
        $data = mysqli_fetch_array($tampil);

    ?>
    <div class="container">
        <div class="alert alert-primary" role="alert">
            Perhatian!! Untuk Memberikan Penilaian/Poling/suara Silahkan Klik Icon/Emoji
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="bg-success box text-white mousechange" onclick="simpan(1)" >
                    <div class="row">
                        <div class="col-md-6">
                            <h5>PUAS</h5>
                            <h2 id="hasil_puas"></h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <!-- <a href="simpan.php?ket=puas" title="Jika Anda Puas Dengan Pelayanan Kami, Klik Icon Ini"> -->
                            <a href="javascript:;" title="Jika Anda Puas Dengan Pelayanan Kami, Klik Icon Ini">
                            <img src="img/puas.png" alt="" style="width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-warning box text-white mousechange"  onclick="simpan(2)">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>CUKUP</h5>
                            <h2 id="hasil_cukup"></h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <!-- <a href="simpan.php?ket=cukup" title="Jika Anda Cukup Puas Dengan Pelayanan Kami, Klik Icon Ini"> -->
                            <a href="javascript:;" title="Jika Anda Cukup Puas Dengan Pelayanan Kami, Klik Icon Ini">
                            <img src="img/cukup.png" alt="" style="width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-danger box text-white mousechange"  onclick="simpan(3)">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>KURANG</h5>
                            <h2 id="hasil_kurang"></h2>
                            <h5>Suara</h5>
                        </div>
                        <div class="col-md-6">
                            <!-- <a href="simpan.php?ket=kurang" title="Jika Anda Kurang Puas Dengan Pelayanan Kami, Klik Icon Ini"> -->
                            <a href="javascript:;" title="Jika Anda Kurang Puas Dengan Pelayanan Kami, Klik Icon Ini">
                            <img src="img/kurang.png" alt="" style="width: 100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- akhir Container -->
    <footer class="bg-info text-center text-white mt-4 bt-4 pb-2">
        &copy Create By Densu 2020
    </footer>
    <!-- <script>
        Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
    </script>    -->

    <script>

        function injek(){
            $.ajax({
                type    : 'ajax',
                url     : 'get_data_survey.php',
                method  : 'get', 
                dataType: 'json',
                success : function(data,status){ 
                    $('#hasil_puas').html(data.puas);        
                    $('#hasil_cukup').html(data.cukup);        
                    $('#hasil_kurang').html(data.kurang);        
                },
                error   : function(data){ 
                    
                }
            });

             
        }

        // pas halaman awal diload jangan lupa load fungsi injek
        injek();


      





        function simpan(jenis){
            var keterangan = ''; // variable ini buat masukin ke url nya
            if (jenis==1) { //jika puas
                keterangan = 'puas';  
            }else if (jenis==2){  //jika cukup
                keterangan = 'cukup';
            }else{ // jika kurang
                keterangan = 'kurang';
            }

            $.ajax({
                type    : 'ajax',
                url     : 'simpan.php?ket='+keterangan,
                method  : 'get', //metode ky action form
                dataType: 'json',
                success : function(data,status){ //pokoknya format minimal ajax gini aja.success buat kalo manggil file simpan.php ga ada error dia lari ke success
                    // bisa lo tangkep disini -> data
                    var str = data.message; //jd data itu hasil return keseluruhan dr file simpan.php,karena datatype json jd dia otomatis format json bisa dipanggil data.pesan atau data.querynya
                    var stat = data.status; //tangkep aja hasil return dr simpan.php disini
                    
                    if (stat=='sukses'){
                        Swal.fire(
                            'Terima Kasih!',
                            str,
                            'success'
                        ).then((result) => {
                            // sudah ga perlu reload halaman,jadi ketika sukses simpan survey dia manggil fungsi injek
                            injek();
                        });
                    }else{
                        Swal.fire(
                            'Error!',
                            str,
                            'error'
                        );
                    }
                    
                    //udah paham kan?simple
                },
                error   : function(data){ //kalo ada error di file simpan.php dia lari kesini
                    Swal.fire(
                        'Gagal!',
                        'Error system...!',
                        'error'
                    )
                }
            });

            
        }









        






    </script>

    
  </body>
</html>