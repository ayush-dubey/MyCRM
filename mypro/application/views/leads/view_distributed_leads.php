<div class="container">
<p style="color:red;"><?php print_r($this->session->flashdata('unassign'));?></p>
<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('update'));?></p>
</div>

<div class="col-sm-offset-4">
<p style="color:red;"><?php print_r($this->session->flashdata('delete'));?></p>
</div>
<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('insert'));?></p>
</div>
	<div class="form-group">
    	<form name="delete" class="form-horizontal" action="<?php echo base_url('leads/distribute_leads');?>"  method="POST">
				
			<input type="submit" name="delete" class="btn btn-success" value="Auto-Assign Leads">
		</form>
	</div>	
<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse">
      <tr>
		<th>SNo.</th>
        <th>Username</th>
        <th>Employee name</th>
		<th>Client name</th>
		 <th>Client Contact</th>
		<th>Status</th>
		<th>Disposed</th>
		<th></th>
		
      </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result  as $r): ?>
		<tr>
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->username;?>
			</td>
			<td><?php echo $r->fname.' '.$r->mname.' '.$r->lname;?>
			</td>
			<td><?php echo $r->first_name.' '.$r->middle_name.' '.$r->last_name;?>
			</td>
			<td><?php echo $r->mobile;?>
			</td>
			<td><?php echo $r->status;?>
			</td>
			<td><?php echo $r->disposed;?>
			</td>
			
			<td><form name="leadRegisterForm" class="form-horizontal" action="<?php echo base_url('leads/unassign_lead'); ?>"  onsubmit="return validateLeadRegisterForm()" method="POST">
				<input type="hidden" name="client_id" value="<?php echo $r->client_id;?>">
				<input type="submit" name="delete" class="btn btn-danger" value="Unassign Lead">
			</form>
			</td>
						
			
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>
</div>