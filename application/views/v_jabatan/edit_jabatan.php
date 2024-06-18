  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Jabatan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res->result() as $r){
?>			
			<a href="<?php echo base_url('C_jabatan'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_jabatan/update'); ?>">
              <input type="hidden" name="idu" value="<?php echo $r->kd_jabatan; ?>">
               <tr>
                <td>Kode Jabatan</td>
                <td>:</td>
                <td><input type=text name='kd' class="form-control" value="<?php echo $r->kd_jabatan ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Tingkat</td>
                <td>:</td>
                <td> <input type="radio" name="tk" value="Ahli" />Ahli   <br /> <input type="radio" name="tk" value="Terampil" />Terampil</td>
              </tr>
              <tr>
                <td>Nama Jabatan</td>
                <td>:</td>
                <td><input type=text name='nm' class="form-control" value="<?php echo $r->nama_jabatan?>"></td>
              </tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    </td>
              </tr>
           </form>
           </table> 
<?php
}
?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->