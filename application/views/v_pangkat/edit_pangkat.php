  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit pangkat
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res->result() as $r){
?>      
      <a href="<?php echo base_url('C_pangkat'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_pangkat/update'); ?>">
              <input type="hidden" name="idu" value="<?php echo $r->kd_pangkat; ?>">
               <tr>
                <td>Kode Pangkat</td>
                <td>:</td>
                <td><input type=text name='kdp' class="form-control" value="<?php echo $r->kd_pangkat ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Golongan</td>
                <td>:</td>
                <td><input type=text name='glgn' class="form-control" value="<?php echo $r->golongan?>"></td>
              </tr>
              <tr>
                <td>Nama Pangkat</td>
                <td>:</td>
                <td><input type=text name='nmp' class="form-control" value="<?php echo $r->nama_pangkat?>"></td>
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