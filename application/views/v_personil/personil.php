  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Personil
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	
         <div class="col-md-6"> 
        <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_personil/insert'); ?>">
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type=text name='nip' required autofocus="autofocus" class="form-control"></td>
              </tr> 
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type=text name='nm' required autofocus="autofocus" class="form-control"></td>
              </tr>
				<!-- <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td> <input type=text name='tgl_lhr' class="form-control"><br /> Isi dengan format YYYY-MM-DD</td>
              </tr>
               <tr>
              -->
              <td>Tanggal Lahir</td>
              <td>:</td>
              <td><select name="tgl" size="1" id="tgl">
          <?php
         for ($i=1;$i<=31;$i++)
       {
         echo "<option value=".$i.">".$i."</option>";
       }
      ?>
                </select>
                <select name="bln" size="1" id="bln">
          <?php
      $bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
         for ($i=1;$i<=12;$i++)
       {
         echo "<option value=".$i.">".$bulan[$i]."</option>";
       }
      ?>
                </select>
                <select name="thn" size="1" id="thn">
          <?php
         for ($i=1957;$i<=2025;$i++)
       {
         echo "<option value=".$i.">".$i."</option>";
       }
      ?>
				<tr>
                <td>Kode Pangkat</td>
                <td>:</td>
                <td><input type=text name='kdp' class="form-control"></td>
              </tr>
				<tr>
                <td>Kode Jabatan</td>
                <td>:</td>
                <td><input type=text name='kd' class="form-control"></td>
              </tr>
              <tr>
                <td>Bidang</td>
                <td>:</td>
                <td><input type=text name='bdg' class="form-control"></td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    <input type="reset" name="reset" value="Cancel" class="btn btn-danger" />
                    </td>
              </tr>
            </form>
          </table>
          </div>
          
         
    <?php 
	}
	?>
    
          <div class="col-md-12"> 
          <hr />   
          <h2><u>Data Personil</u></h2>
          <br />
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>Nip </th>
                  <th>Nama </th>
				          <th>TGL Lahir </th>
				          <th>Kode Pangkat </th>
				          <th>Kode Jabatan </th>
                  <th>Bidang </th> 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->M_personil->list_personil();
				foreach($list_->result() as $row){
					echo 
          '<tr>
				  <td>'.$row->nip.'</td>
          <td>'.$row->nama.'</td>
				  <td>'.$row->tgl_lahir.'</td>
				  <td>'.$row->kd_pangkat.'</td>
				  <td>'.$row->kd_jabatan.'</td>
          <td>'.$row->bidang.'</td>
          <td>';
				  if($permit['w']==1){
				  	echo '<a href="'.base_url('C_personil/edit/'.$row->nip).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
				  }
				  if($permit['d']==1){
				  echo ' <a href="'.base_url('C_personil/delete/'.$row->nip).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a>';
				  }
				  echo '</td>
                </tr>';
				}
				?>
          </tbody>
        </table>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->