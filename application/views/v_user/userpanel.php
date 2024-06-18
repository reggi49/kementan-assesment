  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
		foreach($res->result() as $r){
?>		 
<?php 
          
		echo form_open('user/updatesetting','enctype="multipart/form-data"');
        ?>

				  <div class="form-group control-group">

					<div class="controls">

<?php

					echo form_label('Full Name', 'user_fullname');

					$data_i = array(

					  'name'        => 'user_fullname',

					  'type'        => 'text',

					  'class'       => 'form-control',

					  'required'    => 'required',

					  'value'    => $r->user_fullname

					);

					echo form_input($data_i);

?>

					</div>

				  </div>

				  <div class="col-xs-12 col-md-6">

					<div class="form-group">

						<label for="exampleInputFile">User Login</label>

<?php

					$data_i = array(

					  'name'        => 'user_name',

					  'type'        => 'text',

					  'class'       => 'form-control',

					  'required'    => 'required',

					  'value'    => $r->user_name

					);

					echo form_input($data_i);

?>

					</div>

<?php

?>					

					<div class="form-group">

						<label for="exampleInputFile">Password</label>

<?php

					$data_i = array(

					  'name'        => 'password',

					  'type'        => 'password',

					  'class'       => 'form-control',

					  'placeholder'       => 'Empty this form if not change',

					  'value'       => '',

					);

					echo form_input($data_i);

?>

					</div>

					<div class="form-group">

						<label for="exampleInputFile">Profile Picture</label>

<?php

					$data_i = array(

					  'name'        => 'profpict',

					  'type'        => 'file',

					  'class'       => 'form-control'

					);

					echo form_input($data_i);

?>

					</div>

				  </div>

				  

				  <div class="col-xs-12 col-md-6">

					

					<div class="form-group">

						<label for="exampleInputFile">Phone</label>

<?php

					$data_i = array(

					  'name'        => 'telp',

					  'type'        => 'text',

					  'class'       => 'form-control',

					  'value'    => $r->notelp

					);

					echo form_input($data_i);

?>

					</div>

					<div class="form-group">

						<label for="exampleInputFile">Email</label>

<?php

					$data_i = array(

					  'name'        => 'email',

					  'type'        => 'text',

					  'class'       => 'form-control',

					  'value'    => $r->email


					);

					echo form_input($data_i);

?>

					</div>

				  </div>
					<div class="clearfix"></div>
					<div class="form-group">
						
                    	<input name="Submit" type="submit" value="Save" class="btn btn-success" />

					</div>
        <?php
		echo form_close();
		?>
<?php
		}
?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->