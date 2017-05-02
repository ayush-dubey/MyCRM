 <div align="center" class="alert alert-success"> 
<p style="color:green;"><?php print_r($this->session->flashdata('update'));?></p>
</div>

<div class="col-sm-offset-4">
<p style="color:red;"><?php print_r($this->session->flashdata('delete'));?></p>
</div>
<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('insert'));?></p>
</div>

<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse">
      <tr>
		
        <th>#</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Mobile</th>
		<th>Address</th>
		<th>Date of joining</th>
		<th>Last Login</th>
		<th></th>
		<th></th>
		
			
		
		
		
		
      </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result  as $r): ?>
		<tr>
			
			
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->first_name.' '.$r->middle_name.' '.$r->last_name;?>
			</td>
			<td><?php echo $r->role;?>
			</td>
			<td><?php echo $r->email;?>
			</td>
			<td><?php echo $r->mobile;?>
			</td>
			<td><?php echo $r->address;?>
			</td>
			<td><?php echo $r->doj;?>
			</td>
			<td><?php echo $r->last_login;?>
			</td>
			
			<td><form name="edit" class="form-horizontal" action="<?php echo base_url('ViewEmployee/edit');?>"  method="POST">
					<input type="hidden" name="employee_id" value="<?php echo $r->employee_id;?>">
					<input type="submit" name="submit" class="btn btn-primary" value="Edit">
				</form>
			</td>
			<td><form name="delete" class="form-horizontal" action="<?php echo base_url('ViewEmployee/delete_emp');?>"  method="POST">
			<input type="hidden" name="employee_id" value="<?php echo $r->employee_id;?>">
					<input type="submit" name="delete" class="btn btn-danger" value="Delete">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>