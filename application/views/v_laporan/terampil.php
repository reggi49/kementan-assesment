	 <div class="content">
               <div class="col-md-12"> 
           
          <h2><u>Daftar Personil Tingkat Terampil</u></h2>
          
          <br />
        <table class="table table-responsive table-striped" id="dtable">
         <thead>
          <tr>
             <th>No</th>
             <th>Nip<br />
             Nama</th> 
            <th>Tanggal_Lahir</th>
            <th>Jabatan</th>  
           </tr>
          </thead>
           <tbody>
            <?php
			$no=1;
			$total=0;
			foreach($res->result() as $val) {
			?>
             <tr>
               <td><?php echo $no;?></td>
               <td><?php echo $val->nip;?><br />
               <?php echo $val->nama;?></td>
              <td><?php echo $this->base_model->gettglindo($val->tgl_lahir); ?></td>
              <td><?php echo $val->nama_jabatan; ?></td>         
             </tr>
             <?php
			  $no++;
			} ?>
            </tbody>
            <tfoot>
            <!--
                <tr>
            	<th></th>
                <th></th>
                <th></th>
                <th></th>
                 <th></th>
                <th>Total Personil Tingkat Terampil Kemhan </th>
                 <th></th>
                <th></th>
                <th>Personil</th>
                </tr> -->
          </tfoot>
         </table>           
        </div>
        </div>
        <div class="clearfix"></div>
    </div>  
	
