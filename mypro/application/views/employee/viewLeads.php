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
 <form action="<?php echo base_url('leads/filter_leads_by');?>" method="POST">
      <label class="control-label col-sm-1">Filter By:  status </label>
      <div class="col-sm-2">          
        <select class="form-control branch" name="status">
     <option value="all">All</option>
     <option value="no status">no status</option>
     <option value="pending">pending</option>
     <option value="converted">converted</option>
     <option value="rejected">rejected</option>
    </select>
	
      </div>
	  <label class="control-label col-sm-1">Follow up on date: </label>
	   <div class="col-sm-2">          
        <input type="date" name="follow_up_date" placeholder="YYYY-MM-DD" >
      </div>
	  <input type="submit" value="GO" >
	  </form>
    </div>
	
	<br><br><br>

<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse">
      <tr>
		<th></th>
        <th>#</th>
        <th>Firstname</th>
		 <th>Middlename</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Mobile</th>
		<th>Address</th>
		<th>Professoin</th>
		<th>FollowUpDate</th>
		<th>Status</th>
		<th></th>
		<th></th>
      </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result  as $r): ?>
		<tr>
			<td>
			</td>
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->first_name;?>
			</td>
			<td><?php echo $r->middle_name;?>
			</td>
			<td><?php echo $r->last_name;?>
			</td>
			<td><?php echo $r->gender;?>
			</td>
			<td><?php echo $r->email;?>
			</td>
			<td><?php echo $r->mobile;?>
			</td>
			<td><?php echo $r->address;?>
			</td>
			<td><?php echo $r->profession;?>
			</td>
			<td><?php echo $r->follow_up_date;?>
			</td>
			<td><?php echo $r->status;?>
			</td>
			<td><form name="edit" class="form-horizontal" action="<?php echo base_url('leads/edit');?>"  method="POST">
					<input type="hidden" name="client" value="<?php echo $r->client_id;?>">
					<input type="submit" name="submit" class="btn btn-primary" value="Edit">
				</form>
			</td>
			
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>