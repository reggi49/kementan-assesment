  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pangkat
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	<table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_pangkat/insert'); ?>">
              <tr>
                <td>Kode Pangkat</td>
                <td>:</td>
                <td><input type=text name='kdp' required autofocus="autofocus" class="form-control"></td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td>:</td>
                <td><input type=text name='glgn' class="form-control"></td>
              </tr> 
              <tr>
                <td>Nama Pangkat</td>
                <td>:</td>
                <td><input type=text name='nmp' class="form-control"></td>
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
          <h2><u>Data Pangkat</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>Kode Pangkat </th>
                  <th>Golongan </th>
                  <th>Nama Pangkat </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->M_pangkat->list_pangkat();
				foreach($list_->result() as $row){
					echo '
                <tr>
                  <td>'.$row->kd_pangkat.'</td>
                  <td>'.$row->golongan.'</td>
				  <td>'.$row->nama_pangkat.'</td>
          
                  <td>';
				  if($permit['w']==1){
				  	echo '<a href="'.base_url('C_pangkat/edit/'.$row->kd_pangkat).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
				  }
				  if($permit['d']==1){
				  echo ' <a href="'.base_url('C_pangkat/delete/'.$row->kd_pangkat).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a>';
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