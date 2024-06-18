      <div class="content">
        
               <div class="col-md-12"> 
            
          <h2><u>Rekap Tingkat Jabatan Personil</u></h2>
          <h3><strong><?php echo $this->base_model->getPersonil($this->session->units);?></strong></h3>
          <br />
        <table class="table table-responsive table-striped" id="dtable">
         <thead>
          <tr>
             <th>No</th>
             <th>Tahun</th>
              <th>Tingkat</th>
             <th>Jumlah</th>
           </tr>
           </thead>
            <tbody>
            <?php
			$no=1;
			$total=0;
			foreach($res->result() as $val) {
				$total = $total+$val->jumlah;
			?>
             <tr>
               <td><?php echo $no;?></td>
               <td><?php echo $val->tahun;?></td>
               <td><a href="<?php echo base_url('c_laporan/'.$val->tingkat); ?>" class="text-primary"><?php echo $this->base_model->getnmtingkat($val->tingkat); ?></a></td>
             <td><?php echo $val->jumlah;?> Personil</td>
             </tr>
             <?php
			  $no++;
			} ?>
            </tbody>
            <tfoot>
                <tr>
            	<th></th>
                <th></th>
                <th>Total</th>
                <th><?php echo $total;?> Personil</th>
                </tr>
             </tfoot>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>  