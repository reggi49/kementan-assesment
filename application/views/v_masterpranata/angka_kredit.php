  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Angka Kredit
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	<table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_angka_kredit/insert'); ?>">
			<tr>
                <td>id</td>
                <td>:</td>
                <td><input type=text name='id' required autofocus="autofocus" class="form-control"></td>
              </tr> 
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type=text name='nip' required autofocus="autofocus" class="form-control"></td>
              </tr> 
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td></select>
                <select name="thn" size="1" id="thn">
		<?php
		     for ($i=2016;$i<=2019;$i++)
			 {
			   echo "<option value=".$i.">".$i."</option>";
			 }
		  ?>
		  </select></td>
              </tr>
              <tr>
                <td>Tingkat </td>
                <td>:</td>
                <td>
                  <label class="radio-inline">
                    <input type="radio" name="optradio" data-sel="even" checked>Ahli
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="optradio" data-sel="triple" >Terampil
                  </label>
                </td>
              </tr>
        <tr>
                <td>Unsur</td>
                <td>:</td>
                <td></select>
                  <select id="sel">
                      <option class="odd triples">pendidikan</option>
                      <option class="even">operasi teknologi informasi</option>
                      <option class="odd">implementasi teknologi informasi</option>
                      <option class="even">analisis dan perancangan sistem informasi</option>
                      <option class="odd">penyusunan kebijaksanaan sistim informasi</option>
                      <option class="even triple">pengembangan profesi</option>
                      <option class="even triple">pendukung kegiatan pranata komputer</option>
                  </select>
              </td>
              </tr>
              <tr>
              <tr>
                <td>Sub Unsur</td>
                <td>:</td>
                <td><input type=text name='pd1' class="form-control"></td>
              </tr>
			  <tr>
			  <tr>
              <tr>
                <td>Periode 1</td>
                <td>:</td>
                <td><input type=text name='pd1' class="form-control"></td>
              </tr>
			  <tr>
                <td>Periode 2</td>
                <td>:</td>
                <td><input type=text name='pd2' class="form-control"></td>
              </tr>
			  <tr>
                <td>Total</td>
                <td>:</td>
                <td><input type=text name='ttl' class="form-control"></td>
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
          <h2><u>Data Angka Kredit</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>id </th>
                  <th>Nip </th>
                  <th>Tahun</th>
                  <th>Periode 1</th>
				          <th>Periode 2</th>
				          <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->M_angka_kredit->list_angka_kredit();
				foreach($list_->result() as $row){
					echo 
          '<tr>
		  <td>'.$row->id.'</td>
          <td>'.$row->nip.'</td>
		  <td>'.$row->tahun.'</td>
		  <td>'.$row->ak1.'</td>
		  <td>'.$row->ak2.'</td>
		  <td>'.$row->jumlah.'</td>
          <td>';
				  if($permit['w']==1){
				  	echo '<a href="'.base_url('C_angka_kredit/edit/'.$row->id).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
				  }
				  if($permit['d']==1){
				  echo ' <a href="'.base_url('C_angka_kredit/delete/'.$row->id).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a>';
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
  <script>
    var $sel = $('#sel option').detach(); // global variable

$('a').on('click', function (e) {
    e.preventDefault();
    var c = $(this).data('sel');
    $('#sel').empty().append( $sel.filter('.'+c) );
});
</script>