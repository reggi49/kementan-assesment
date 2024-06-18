  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Angka Kredit
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res->result() as $r){
?>			
			<a href="<?php echo base_url('C_angka_kredit'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_angka_kredit/update'); ?>">
              <input type="hidden" name="idu" value="<?php echo $r->id; ?>">
               <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type=text name='id' class="form-control" value="<?php echo $r->id ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type=text name='nip' class="form-control" value="<?php echo $r->nip?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $this->base_model->seltahun($r->id);?></td>
              </tr>
              <tr>
                <td>Periode1</td>
                <td>:</td>
                <td><input type=text name='pd1' class="form-control" value="<?php echo $r->ak1?>"></td>
              </tr>
              <tr>
                <td>Periode 2</td>
                <td>:</td>
                <td><input type=text name='pd2' class="form-control" value="<?php echo $r->ak2?>"></td>
              </tr>
              <tr>
                <td>Total</td>
                <td>:</td>
                <td><input type=text name='ttl' class="form-control" value="<?php echo $r->jumlah?>"></td>
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