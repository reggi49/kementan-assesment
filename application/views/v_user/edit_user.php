  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
		
		foreach($res->result() as $r){
?>			
			<a href="<?php echo base_url('user'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
<?php
          
		echo form_open('user/update');
		echo form_hidden('idu', $r->user_id);
        ?>
         <div class="form-group">

<?php

					echo form_label('Unit', 'unit_id');

					$options = $this->base_model->selunit();

					echo form_dropdown('unit_id', $options, $r->unit_id, 'class="form-control" required');

?>

				  </div>

				  <div class="form-group">

<?php

					echo form_label('Role', 'role_id');

					$options = $this->base_model->selrole();

					echo form_dropdown('role_id', $options, $r->role_id, 'class="form-control" required');

?>

				  </div>

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

						<label for="exampleInputFile">Status</label>

<?php

					$data_i = array(

						'name'        => 'active',

						'value'       => '1',

						'style'       => 'margin:10px',
						
						'checked'     => ($r->active > 0) ? TRUE : '' 

					);



					echo form_checkbox($data_i);

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

					  'required'    => 'required',

					  'value'    => $r->email


					);

					echo form_input($data_i);

?>

					</div>

				  </div>
                  <div class="clearfix"></div>
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
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