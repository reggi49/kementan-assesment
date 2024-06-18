  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Personil
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res->result() as $r){
?>			
		<div class="col-md-6"> 
        	<a href="<?php echo base_url('C_personil'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
          
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_personil/update'); ?>">
              <input type="hidden" name="idu" value="<?php echo $r->nip; ?>">
             <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type=text name='nip' required autofocus="autofocus" class="form-control" disabled="disabled" value="<?php echo $r->nip; ?>"></td>
              </tr> 
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type=text name='nm' required autofocus="autofocus" class="form-control" value="<?php echo $r->nama; ?>"></td>
              </tr>
			       <?php
			  $tahun='';$bulan='';$tanggal='';$tgll='0000-00-00';
			  if(isset($r->tgl_lahir)){
				$tgll = $r->tgl_lahir;  
			  }
			   list($tahun,$bulan,$tanggal) = explode('-',$tgll);  
			  ?>
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                <div class="input-group pull-left">
                <?php echo $this->base_model->seltahun($tahun,1954); ?>
                </div>
                <div class="input-group pull-left">
                <?php echo $this->base_model->selbulan(intval($bulan)); ?>
                </div>
                <div class="input-group pull-left">
                <?php echo $this->base_model->seltgl($tanggal,31); ?>
                </div>
                <div class="clearfix"></div>
                </td>
              </tr>
			        <tr>
                <td>Kode Pangkat</td>
                <td>:</td>
                <td><input type=text name='kdp' class="form-control" value="<?php echo $r->kd_pangkat; ?>"></td>
              </tr>
			        <tr>
                <td>Kode Jabatan</td>
                <td>:</td>
                <td><input type=text name='kd' class="form-control" value="<?php echo $r->kd_jabatan; ?>"></td>
              </tr>  
              <tr>
                <td>Bidang</td>
                <td>:</td>
                <td><input type=text name='bdg' class="form-control" value="<?php echo $r->bidang; ?>"></td>
              </tr>  
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    </td>
              </tr>
           </form>
           </table> 
           </div>
<?php
}
?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->