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
	if($permit['w']){    
		echo form_open('user/insert');
        ?>
         <div class="form-group">

<?php

					echo form_label('Unit', 'unit_id');

					$options = $this->base_model->selunit();
					//var_dump($options);

					echo form_dropdown('unit_id', $options, '', 'class="form-control" required');

?>

				  </div>

				  <div class="form-group">

<?php

					echo form_label('Role', 'role_id');

					$options = $this->base_model->selrole();

					echo form_dropdown('role_id', $options,'', 'class="form-control" required');

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

					  'required'    => 'required',

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

					);



					echo form_checkbox($data_i);

?>

					</div>

				  </div>

				  

				  <div class="col-xs-12 col-md-6">
					

					<div class="form-group">

						<label for="exampleInputFile">Email</label>

<?php

					$data_i = array(

					  'name'        => 'email',

					  'type'        => 'text',

					  'class'       => 'form-control',

					  'required'    => 'required',


					);

					echo form_input($data_i);

?>

					</div>

					<div class="form-group">

						<label for="exampleInputFile">Phone</label>

<?php

					$data_i = array(

					  'name'        => 'telp',

					  'type'        => 'text',

					  'class'       => 'form-control',

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
          <hr>
    <?php 
	}
	?>
          <h2><u>Data Users</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
              	<thead>
                <tr>
                  <th >ID</th>
                  <th >User Name </th>
                  <th >User Fullname </th>
                  <th>Role ID</th>
                  <th>Unit </th>
                  <th>Status </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->user_model->list_user();
				foreach($list_->result() as $row){
					if($row->active==1){
						$ac = 'Active';
					}else{
						$ac = 'Inactive';	
					}
					echo '
                <tr>
                  <td>'.$row->user_id.'</td>
				  <td>'.$row->user_name.'</td>
                  <td>'.$row->user_fullname.'</td>
                  <td>'.$row->role_name.'</td>
                  <td>'.$row->nm_klinik.'</td>
                  <td>'.$ac.'</td>
                  <td>';
				  if($permit['w']==1){
				  	echo '<a href="'.base_url('user/edit/'.$row->user_id).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a>';
				  }
				  echo ' ';
				  if($permit['d']==1){
				  echo '<a href="'.base_url('user/delete/'.$row->user_id).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a>';
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