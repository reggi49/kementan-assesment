<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!--
      <h1>
       Grafik Keadaan Prakom Kemhan
      </h1>
      -->
    </section>

    <!-- Main content -->
    <section class="content">



          
              
              
             <div class="container">
    <div class="row reg-heading">
        <h1 class="text-center">Informasi</h1>
    </div>
</div>

<section class="form-cari">
    <div class="container">
         <div class="row">
            <h2>Daftar Pegawai Naik Pangkat Tahun Ini<h2>
            <ol>
                <li>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action.
                    </div>
                </li>
                <li>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action2.
                    </div>
                </li>
            </ol>
        </div>
        <hr>
        <div class="row">
            <h2>Daftar Pegawai Pensiun Tahun Ini<h2>
            <ol>
                <?php
                foreach($res->result() as $item):
                $biday = new DateTime($item->tgl_lahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
                if($diff->y >= 50)
                {
                    ?>
                    <li>
                    <div class="alert alert-warning">
                        <strong><?php echo $item->nama;?></strong> Akan Memasuki Pensiun Tahun ini.
                    </div>
                <?php
                }
                endforeach;
                ?>
                
            </ol>
        </div>
        <hr>
    </div>
</section>

<section>
    <div class="container">
            <!-- <php 
                $kelas  = backgurucode::kelas($user);
                if($kelas == 'xirpla'){
                    $guru_kelas = 'Off A';
                } else if($kelas == 'xirplb'){
                    $guru_kelas = 'Off B';
                } else if($kelas == 'xirplc'){
                    $guru_kelas = 'Off C';
                } else {
                    $guru_kelas = '';
                }
            ?> -->
            
        <!--
        <div class="row form-cari">
            <form name="cari_siswa" id="cari_siswa" method="post" action="index.php?p=carisiswa" role="form" class="form-group">
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <select name="type" form="cari_siswa" class="form-control">
                        <option value="">--- Kategori Pencarian ---</option>
                        <option value="nama_siswa">Nama</option>
                        <option value="materi">Materi</option>
                        <option value="no_absen">NIM</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <input type="text" name="searchid" value="" placeholder="Kata Kunci Pencarian" class="form-control">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <input type="submit" value="Cari" class="btn btn-default action">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="index.php?p=beranda" class="btn btn-default action">Tampilkan Semua</a>
                </div>
            </form>
        </div>
        -->
        
    </div>
</section>

            
      
 
            
 
            <div class="clearfix"></div>




</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->