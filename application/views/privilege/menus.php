  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menus
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
switch($act){
	default:
?>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('menus/insert'); ?>">
              <tr>
                <td>Menu Name </td>
                <td>:</td>
                <td> 
                    <input type=text name='nm' required autofocus="autofocus" class="form-control"></td></tr> 
              <tr>
                <td>Menu icon </td>
                <td>:</td>
                <td><input type=text name='ico' class="form-control"></td>
              </tr>
              <tr>
                <td>Parent </td>
                <td>:</td>
                <td><select name="par" class="form-control"><?php echo $this->base_model->menuparent(1); ?></select></td>
              </tr>
              <tr>
                <td>Menu Slug </td>
                <td>:</td>
                <td><input type=text name='desc' class="form-control"></td>
              </tr>
              <tr>
                <td>Order </td>
                <td>:</td>
                <td><input type=text name='order' class="form-control"></td>
              </tr>
              <tr>
                <td>Link To </td>
                <td>:</td>
                <td><input type=text name='lnk' class="form-control"></td>
              </tr>
              <tr>
                <td>Publish? </td>
                <td>:</td>
                <td>Y</td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Simpan" class="btn btn-success" />
                    <input type="reset" name="reset" value="Batal" class="btn btn-danger" />
                    </td>
              </tr>
            </form>
          </table>
          <hr>
          
          <h2><u>Data Menu</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
              	<thead>
                <tr>
                  <th>Menu Name </th>
                  <th>Menu icon </th>
                  <th>Parent </th>
                  <th>Order </th>
                  <th>Status </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$list_ = $this->system_model->list_menus();
				foreach($list_->result() as $row){
					echo '
                <tr>
                  <td>'.$row->menu_name.'</td>
                  <td><i class="'.$row->menu_icon.'"></i></td>
                  <td>'.$row->parents.'</td>
                  <td>'.$row->menu_order.'</td>
                  <td>'.$row->enabled.'</td>
                  <td><a href="'.base_url('menus/edit/'.$row->menu_id).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i></a> <a href="'.base_url('menus/delete/'.$row->menu_id).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i></a></td>
                </tr>';
				}
				?>
                </tbody>
              </table>
<?php
	break;
	case "edit":
	$res = $this->system_model->list_menus($val);
	foreach($res->result() as $r){
?>			
			<a href="<?php echo base_url('menus'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('menus/update'); ?>">
              <tr><input type="hidden" name="idm" value="<?php echo $r->menu_id; ?>">
                <td>Menu Name </td>
                <td>:</td>
                <td> 
                    <input type=text name='nm' required autofocus="autofocus" class="form-control" value="<?php echo $r->menu_name; ?>"></td></tr> 
              <tr>
                <td>Menu icon </td>
                <td>:</td>
                <td><input type=text name='ico' class="form-control" value="<?php echo $r->menu_icon; ?>"></td>
              </tr>
              <tr>
                <td>Parent </td>
                <td>:</td>
                <td><select name="par" class="form-control" disabled><?php echo $this->base_model->menuparent($r->menu_parent_id); ?></select></td>
              </tr>
              <tr>
                <td>Menu Slug </td>
                <td>:</td>
                <td><input type=text name='desc' class="form-control" value="<?php echo $r->menu_info; ?>"></td>
              </tr>
              <tr>
                <td>Order </td>
                <td>:</td>
                <td><input type=text name='order' class="form-control" value="<?php echo $r->menu_order; ?>"></td>
              </tr>
              <tr>
                <td>Link To </td>
                <td>:</td>
                <td><input type=text name='lnk' class="form-control" value="<?php echo $r->menu_link; ?>"></td>
              </tr>
              <tr>
                <td>Publish? </td>
                <td>:</td>
                <td><?php echo $this->base_model->yorn($r->enabled);  ?></td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Simpan" class="btn btn-success" />
                    <input type="reset" name="reset" value="Batal" class="btn btn-danger" />
                    </td>
              </tr>
            </form>
          </table>
<?php
	}
	break;
}
?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->