	<div class="content">
    	
           <div class="col-md-9"> 
            
          <h2><u>Angka Kredit Personil Kemhan</u></h2>
          <br />
        <table class="table table-responsive table-striped" id="dtable">
         <thead>
          <tr>
             <th>No</th>
             <th>Tahun</th>
             <th>Nip</th>
             <th>Nama</th>
             <th>Pangkat</th>
			       <th>Jabatan</th>
             <th>Periode1</th>
             <th>Periode2</th>
             <th>Total</th>
            
                              
           </tr>
           </thead>
            <tbody>
            <?php
			$no=1;
			$total=0;
			foreach($res->result() as $val) {
				//$total = $total+$val->jumlah;
			?>
             <tr>
               <td><?php echo $no;?></td>
               <td><?php echo $val->tahun;?></td>
               <td><?php echo $val->nip;?></td>
               <td><?php echo $val->nama;?></td> 
               <td><?php echo $val->nama_pangkat;?></td>
               <td><?php echo $val->nama_jabatan;?></td>
               <td><?php echo $val->ak1;?></td>
               <td><?php echo $val->ak2;?></td>
               <td><?php echo $val->jumlah;?></td>
              
               
             </tr>
             <?php
			  $no++;
			} ?>
            </tbody>
            <tfoot>
               
             </tfoot>
            </table>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>  
	
