  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jabatan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	<table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_jabatan/insert'); ?>">
              <tr>
                <td>Kode Jabatan</td>
                <td>:</td>
                <td><input type=text name='kd' required autofocus="autofocus" class="form-control"></td>
              </tr> 
              <tr>
                <td>Tingkat</td>
                <td>:</td>
                <td> <input type="radio" name="tk" value="Ahli" />Ahli   <br /> <input type="radio" name="tk" value="Terampil" />Terampil</td>
              </tr>
              <tr>
                <td>Nama Jabatan</td>
                <td>:</td>
                <td><input type=text name='nm' class="form-control"></td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    <input type="reset" name="reset" value="Cancel" class="btn btn-danger" />
                    </td>
              </tr>
            </form>
          </table>
          <hr>
    <?php 
	}
	?>
          <h2><u>Data Jabatan</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>Kode Jabatan </th>
                  <th>Tingkat</th>
                   <th>Nama Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->M_jabatan->list_jabatan();
				foreach($list_->result() as $row){
					echo 
          '<tr>
          <td>'.$row->kd_jabatan.'</td>
				  <td>'.$row->tingkat.'</td>
				  <td>'.$row->nama_jabatan.'</td>
          <td>';
				  if($permit['w']==1){
				  	echo '<a href="'.base_url('C_jabatan/edit/'.$row->kd_jabatan).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
				  }
				  if($permit['d']==1){
				  echo ' <a href="'.base_url('C_jabatan/delete/'.$row->kd_jabatan).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a>';
				  }
				  echo '</td>
                </tr>';
				}
				?>
                </tbody>
              </table>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->